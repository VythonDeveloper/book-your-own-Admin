<?php include "header.php";?>
<section class="text-gray-600 body-font">
    <div class="container px-5 py-5 mx-auto">
        <div class="lg w-full mx-auto overflow-auto">
            <div class="xl:w-1/1 md:w-1/1 p-4">
                <div class="shadow-lg rounded-lg overflow-hidden">
                    <div class="py-3 px-5 bg-gray-50">Drivers and Customers Statistics</div>
                    <canvas class="p-10" id="chartLine"></canvas>
                </div>
            </div>
            <div class="xl:w-1/1 md:w-1/1 p-4">
                <div class="shadow-lg rounded-lg overflow-hidden">
                    <div class="py-3 px-5 bg-gray-50">Trips Statistics</div>
                    <canvas class="p-10" id="chartBar"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "footer.php";?>
<script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.11/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.11/firebase-analytics.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyD_abwBsLCd00IFrjfPPyoQPq0AxSTBWY4",
        authDomain: "book-your-own.firebaseapp.com",
        projectId: "book-your-own",
        storageBucket: "book-your-own.appspot.com",
        messagingSenderId: "469273282029",
        appId: "1:469273282029:web:64f63b0c24bb9e229793e4",
        measurementId: "G-PBZNF9B4MB",
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);

    import { query, where, getFirestore, doc, getDoc, onSnapshot, getDocs, setDoc, collection, addDoc, updateDoc, deleteDoc, deleteField } from "https://www.gstatic.com/firebasejs/9.6.11/firebase-firestore.js";

    const db = getFirestore();

    function _(el) {
        return document.getElementById(el);
    }

    var months = ["0", "0", "0", "0", "0"];
    for (var i = 5; i > 0; i--) {
        const current = new Date();
        current.setMonth(current.getMonth() - (5 - i));
        var previousMonth = current.toLocaleString("default", { month: "long" });
        months[i - 1] = previousMonth;
    }

    GetDriver_CustomerCount();

    GetTripsCount();

    async function GetDriver_CustomerCount() {
        var driverData = [0, 0, 0, 0, 0];
        var customerData = [0, 0, 0, 0, 0];

        for (var i = 0; i < months.length; i++) {
            var date = new Date();
            var demoDate = "1-" + months[i] + "-" + date.getFullYear();
            var specDate = new Date(demoDate);
            var firstDay = new Date(specDate.getFullYear(), specDate.getMonth(), 1).getTime();
            var lastDay = new Date(specDate.getFullYear(), specDate.getMonth() + 1, 0).getTime();
            const driverQuerySnapshot = await getDocs(query(collection(db, "drivers"), where("registeredOn", ">=", firstDay), where("registeredOn", "<=", lastDay)));
            const customerQuerySnapshot = await getDocs(query(collection(db, "users"), where("registeredOn", ">=", firstDay), where("registeredOn", "<=", lastDay)));

            driverData[i] = driverQuerySnapshot.docs.length;
            customerData[i] = customerQuerySnapshot.docs.length;

            // console.log(months[i]+" : "+driverQuerySnapshot.docs.length+", "+customerQuerySnapshot.docs.length);
        }

        const labels = months;
        const data = {
            labels: labels,
            datasets: [
                {
                    label: "Customers",
                    backgroundColor: "hsl(147, 50%, 47%)",
                    borderColor: "hsl(147, 50%, 47%)",
                    data: customerData,
                },
                {
                    label: "Drivers",
                    backgroundColor: "hsl(39, 100%, 50%)",
                    borderColor: "hsl(39, 100%, 50%)",
                    data: driverData,
                },
            ],
        };

        const configLineChart = {
            type: "line",
            data,
            options: {},
        };

        var chartLine = new Chart(document.getElementById("chartLine"), configLineChart);
    }

    async function GetTripsCount() {
        var pendingTripsData = [0, 0, 0, 0, 0];
        var activeTripsData = [0, 0, 0, 0, 0];
        var cancelledTripsData = [0, 0, 0, 0, 0];
        var completeTripsData = [0, 0, 0, 0, 0];

        for (var i = 0; i < months.length; i++) {
            var date = new Date();
            var demoDate = "1-" + months[i] + "-" + date.getFullYear();
            var specDate = new Date(demoDate);
            var firstDay = new Date(specDate.getFullYear(), specDate.getMonth(), 1).getTime();
            var lastDay = new Date(specDate.getFullYear(), specDate.getMonth() + 1, 0).getTime();
            const driverQuerySnapshot = await getDocs(query(collection(db, "drivers"), where("registeredOn", ">=", firstDay), where("registeredOn", "<=", lastDay)));
            const customerQuerySnapshot = await getDocs(query(collection(db, "users"), where("registeredOn", ">=", firstDay), where("registeredOn", "<=", lastDay)));

            const pendingTripQuerySnapshot = await getDocs(query(collection(db, "rideRequest"), where("bookedOn", ">=", firstDay), where("bookedOn", "<=", lastDay), where("status", "==", "Pending")));
            const activeTripQuerySnapshot = await getDocs(query(collection(db, "rideRequest"), where("bookedOn", ">=", firstDay), where("bookedOn", "<=", lastDay), where("status", "==", "Active")));
            const cancelledTripQuerySnapshot = await getDocs(query(collection(db, "rideRequest"), where("bookedOn", ">=", firstDay), where("bookedOn", "<=", lastDay), where("status", "==", "Cancelled")));
            const completeTripQuerySnapshot = await getDocs(query(collection(db, "rideRequest"), where("bookedOn", ">=", firstDay), where("bookedOn", "<=", lastDay), where("status", "==", "Completed")));

            pendingTripsData[i] = pendingTripQuerySnapshot.docs.length;
            activeTripsData[i] = activeTripQuerySnapshot.docs.length;
            cancelledTripsData[i] = cancelledTripQuerySnapshot.docs.length;
            completeTripsData[i] = completeTripQuerySnapshot.docs.length;

            // console.log(months[i]+" : "+pendingTripQuerySnapshot.docs.length+", "+activeTripQuerySnapshot.docs.length+", "+completeTripQuerySnapshot.docs.length);
        }

        // <!-- Chart bar -->

        const labelsBarChart = months;
        const dataBarChart = {
            labels: labelsBarChart,
            datasets: [
                {
                    label: "Pending Trips",
                    backgroundColor: "hsl(0, 100%, 78%)",
                    borderColor: "hsl(0, 100%, 78%)",
                    data: pendingTripsData,
                },
                {
                    label: "Active Trips",
                    backgroundColor: "hsl(191, 95%, 45%)",
                    borderColor: "hsl(191, 95%, 45%)",
                    data: activeTripsData,
                },
                {
                    label: "Cancelled Trips",
                    backgroundColor: "hsl(356, 98%, 51%)",
                    borderColor: "hsl(356, 98%, 51%)",
                    data: cancelledTripsData,
                },
                {
                    label: "Completed Trips",
                    backgroundColor: "hsl(127, 84%, 70%)",
                    borderColor: "hsl(127, 84%, 70%)",
                    data: completeTripsData,
                },
            ],
        };

        const configBarChart = {
            type: "bar",
            data: dataBarChart,
            options: {},
        };

        var chartBar = new Chart(document.getElementById("chartBar"), configBarChart);
    }
</script>
<!-- Required chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
