<?php include "header.php";?>
<section class="text-gray-600 body-font">
    <div class="container px-5 py-5 mx-auto">
        <div class="lg w-full mx-auto overflow-auto">
            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 rounded-t-lg border-b-2 text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-500 border-blue-600 dark:border-blue-500"
                            id="pendingTrips-tab"
                            data-tabs-target="#pendingTrips"
                            type="button"
                            role="tab"
                            aria-controls="pendingTrips"
                            aria-selected="true"
                        >
                            Pending Trips
                        </button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                            id="activeTrips-tab"
                            data-tabs-target="#activeTrips"
                            type="button"
                            role="tab"
                            aria-controls="activeTrips"
                            aria-selected="false"
                        >
                            Active Trips
                        </button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                            id="cancelledTrips-tab"
                            data-tabs-target="#cancelledTrips"
                            type="button"
                            role="tab"
                            aria-controls="cancelledTrips"
                            aria-selected="false"
                        >
                            Cancelled Trips
                        </button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                            id="completedTrips-tab"
                            data-tabs-target="#completedTrips"
                            type="button"
                            role="tab"
                            aria-controls="completedTrips"
                            aria-selected="false"
                        >
                            Completed Trips
                        </button>
                    </li>
                </ul>
            </div>
            <div id="myTabContent">
                <div class="bg-gray-50 rounded-lg dark:bg-gray-800" id="pendingTrips" role="tabpanel" aria-labelledby="pendingTrips-tab">
                    <table class="table-auto w-full text-left whitespace-no-wrap">
                        <thead>
                            <tr>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Id</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Pick → Drop</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Driver</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Customer</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Vehicle</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Booked on</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Schedule</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">Action</th>
                            </tr>
                        </thead>
                        <tbody id="pendingTripsTable"></tbody>
                    </table>
                </div>
                <div class="hidden bg-gray-50 rounded-lg dark:bg-gray-800" id="activeTrips" role="tabpanel" aria-labelledby="activeTrips-tab">
                    <table class="table-auto w-full text-left whitespace-no-wrap">
                        <thead>
                            <tr>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Id</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Pick → Drop</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Driver</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Customer</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Vehicle</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Booked on</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Schedule</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">Action</th>
                            </tr>
                        </thead>
                        <tbody id="activeTripsTable"></tbody>
                    </table>
                </div>
                <div class="hidden bg-gray-50 rounded-lg dark:bg-gray-800" id="cancelledTrips" role="tabpanel" aria-labelledby="cancelledTrips-tab">
                    <table class="table-auto w-full text-left whitespace-no-wrap">
                        <thead>
                            <tr>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Id</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Pick → Drop</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Driver</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Customer</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Vehicle</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Booked on</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Schedule</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">Action</th>
                            </tr>
                        </thead>
                        <tbody id="cancelledTripsTable"></tbody>
                    </table>
                </div>
                <div class="hidden bg-gray-50 rounded-lg dark:bg-gray-800" id="completedTrips" role="tabpanel" aria-labelledby="completedTrips-tab">
                    <table class="table-auto w-full text-left whitespace-no-wrap">
                        <thead>
                            <tr>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Id</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Pick → Drop</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Driver</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Customer</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Vehicle</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Booked on</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Schedule</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">Action</th>
                            </tr>
                        </thead>
                        <tbody id="completedTripsTable"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!---------------------------------- Import Section ---------------------------------------------->
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

    GetPendingRides();
    GetActiveRides();
    GetCancelledRides();
    GetCompletedRides();

    async function GetPendingRides() {
        const querySnapshot = await getDocs(query(collection(db, "rideRequest"), where("status", "==", "Pending")));
        let rowCount = 0;
        querySnapshot.forEach((doc) => {
            rowCount++;
            var bookedOn = new Date(parseInt(doc.data()["bookedOn"]));
            var tripStartTime = new Date(parseInt(doc.data()["tripStartTime"]));
            var tripEndTime = new Date(parseInt(doc.data()["tripEndTime"]));
            let output =
                '<tr><td class="px-4 py-3">' +
                rowCount +
                '</td><td class="px-4 py-3">' +
                doc.data()["pickAddress"] +
                " → " +
                doc.data()["dropAddress"] +
                '</td><td class="px-4 py-3">' +
                doc.data()["driverName"] +
                ", " +
                doc.data()["driverMobile"] +
                '</td><td class="px-4 py-3">' +
                doc.data()["customerName"] +
                ", " +
                doc.data()["customerMobile"] +
                '</td><td class="px-4 py-3">' +
                doc.data()["vehicleType"] +
                ", " +
                doc.data()["vehicleName"] +
                ", " +
                doc.data()["vehicleNumber"] +
                '</td><td class="px-4 py-3">' +
                bookedOn.toLocaleString() +
                '</td><td class="px-4 py-3">' +
                tripStartTime.toLocaleString() +
                " - " +
                tripEndTime.toLocaleString() +
                '</td><td class="px-4 py-3"><button type="button" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">View</button></td></tr>';
            _("pendingTripsTable").insertAdjacentHTML("afterbegin", output);
        });
    }

    async function GetActiveRides() {
        const querySnapshot = await getDocs(query(collection(db, "rideRequest"), where("status", "==", "Active")));
        let rowCount = 0;
        querySnapshot.forEach((doc) => {
            rowCount++;
            var bookedOn = new Date(parseInt(doc.data()["bookedOn"]));
            var tripStartTime = new Date(parseInt(doc.data()["tripStartTime"]));
            var tripEndTime = new Date(parseInt(doc.data()["tripEndTime"]));
            let output =
                '<tr><td class="px-4 py-3">' +
                rowCount +
                '</td><td class="px-4 py-3">' +
                doc.data()["pickAddress"] +
                " → " +
                doc.data()["dropAddress"] +
                '</td><td class="px-4 py-3">' +
                doc.data()["driverName"] +
                ", " +
                doc.data()["driverMobile"] +
                '</td><td class="px-4 py-3">' +
                doc.data()["customerName"] +
                ", " +
                doc.data()["customerMobile"] +
                '</td><td class="px-4 py-3">' +
                doc.data()["vehicleType"] +
                ", " +
                doc.data()["vehicleName"] +
                ", " +
                doc.data()["vehicleNumber"] +
                '</td><td class="px-4 py-3">' +
                bookedOn.toLocaleString() +
                '</td><td class="px-4 py-3">' +
                tripStartTime.toLocaleString() +
                " - " +
                tripEndTime.toLocaleString() +
                '</td><td class="px-4 py-3"><button type="button" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">View</button></td></tr>';
            _("activeTripsTable").insertAdjacentHTML("afterbegin", output);
        });
    }

    async function GetCancelledRides() {
        const querySnapshot = await getDocs(query(collection(db, "rideRequest"), where("status", "==", "Cancelled")));
        let rowCount = 0;
        querySnapshot.forEach((doc) => {
            rowCount++;
            var bookedOn = new Date(parseInt(doc.data()["bookedOn"]));
            var tripStartTime = new Date(parseInt(doc.data()["tripStartTime"]));
            var tripEndTime = new Date(parseInt(doc.data()["tripEndTime"]));
            let output =
                '<tr><td class="px-4 py-3">' +
                rowCount +
                '</td><td class="px-4 py-3">' +
                doc.data()["pickAddress"] +
                " → " +
                doc.data()["dropAddress"] +
                '</td><td class="px-4 py-3">' +
                doc.data()["driverName"] +
                ", " +
                doc.data()["driverMobile"] +
                '</td><td class="px-4 py-3">' +
                doc.data()["customerName"] +
                ", " +
                doc.data()["customerMobile"] +
                '</td><td class="px-4 py-3">' +
                doc.data()["vehicleType"] +
                ", " +
                doc.data()["vehicleName"] +
                ", " +
                doc.data()["vehicleNumber"] +
                '</td><td class="px-4 py-3">' +
                bookedOn.toLocaleString() +
                '</td><td class="px-4 py-3">' +
                tripStartTime.toLocaleString() +
                " - " +
                tripEndTime.toLocaleString() +
                '</td><td class="px-4 py-3"><button type="button" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">View</button></td></tr>';
            _("cancelledTripsTable").insertAdjacentHTML("afterbegin", output);
        });
    }

    async function GetCompletedRides() {
        const querySnapshot = await getDocs(query(collection(db, "rideRequest"), where("status", "==", "Completed")));
        let rowCount = 0;
        querySnapshot.forEach((doc) => {
            rowCount++;
            var bookedOn = new Date(parseInt(doc.data()["bookedOn"]));
            var tripStartTime = new Date(parseInt(doc.data()["tripStartTime"]));
            var tripEndTime = new Date(parseInt(doc.data()["tripEndTime"]));
            let output =
                '<tr><td class="px-4 py-3">' +
                rowCount +
                '</td><td class="px-4 py-3">' +
                doc.data()["pickAddress"] +
                " → " +
                doc.data()["dropAddress"] +
                '</td><td class="px-4 py-3">' +
                doc.data()["driverName"] +
                ", " +
                doc.data()["driverMobile"] +
                '</td><td class="px-4 py-3">' +
                doc.data()["customerName"] +
                ", " +
                doc.data()["customerMobile"] +
                '</td><td class="px-4 py-3">' +
                doc.data()["vehicleType"] +
                ", " +
                doc.data()["vehicleName"] +
                ", " +
                doc.data()["vehicleNumber"] +
                '</td><td class="px-4 py-3">' +
                bookedOn.toLocaleString() +
                '</td><td class="px-4 py-3">' +
                tripStartTime.toLocaleString() +
                " - " +
                tripEndTime.toLocaleString() +
                '</td><td class="px-4 py-3"><button type="button" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">View</button></td></tr>';
            _("completedTripsTable").insertAdjacentHTML("afterbegin", output);
        });
    }
</script>
<?php include "footer.php";?>
