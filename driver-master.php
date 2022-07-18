<?php include "header.php";?>
<section class="text-gray-600 body-font">
    <div class="container px-5 py-5 mx-auto">
        <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto py-5">
            <a class="text-blue-500 inline-flex items-center md:mb-2 lg:mb-0">
                Recruit a driver
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </a>
            <button
                type="button"
                class="flex ml-auto text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                onclick="location.href='add-driver.php'"
            >
                Click to add Driver
            </button>
        </div>
        <!-- <input type="hidden" id="driverStatusBtn"> -->
        <div class="lg w-full mx-auto overflow-auto">
            <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                    <tr>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Id</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Fullname</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Mobile</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Email</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Vehicle</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Status</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Since</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">Action</th>
                    </tr>
                </thead>
                <tbody id="driversTable"></tbody>
            </table>
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

    GetDrivers();

    async function GetDrivers() {
        const querySnapshot = await getDocs(collection(db, "drivers"));
        let rowCount = 0;
        querySnapshot.forEach((doc) => {
            rowCount++;

            let output =
                '<tr><td class="px-4 py-3">' +
                rowCount +
                '</td><td class="px-4 py-3">' +
                doc.data()["fullname"] +
                '</td><td class="px-4 py-3">' +
                doc.data()["mobile"] +
                '</td><td class="px-4 py-3">' +
                doc.data()["email"] +
                '</td><td class="px-4 py-3">' +
                doc.data()["vehicleType"] +
                ", " +
                doc.data()["vehicleName"] +
                ", " +
                doc.data()["vehicleNumber"] +
                '<td class="px-4 py-3"><select id="driverStatusBtn" data-id=\'' +
                doc.data()["id"] +
                '\' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">';

            if (doc.data()["bookingStatus"] == "Available") {
                output += "<option selected>Available</option>";
            } else {
                output += "<option>Available</option>";
            }

            if (doc.data()["bookingStatus"] == "Busy") {
                output += "<option selected>Busy</option>";
            } else {
                output += "<option>Busy</option>";
            }

            var registeredOn = new Date(parseInt(doc.data()["registeredOn"]));

            output +=
                '</select></td><td class="px-4 py-3">' +
                registeredOn.toLocaleDateString() +
                '</td><td class="w-10 text-center"> <button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">View</button></td></tr>';

            _("driversTable").insertAdjacentHTML("afterbegin", output);
        });
        var buttons = document.querySelectorAll("#driverStatusBtn");
        for (var i = 0; i < buttons.length; i++) {
            buttons[i].addEventListener(
                "change",
                function (event) {
                    var driverStatus = event.target.value;
                    // alert(this.getAttribute("data-id") + " -> " + driverStatus);
                    ChangeDriverStatus(this.getAttribute("data-id"), driverStatus);
                },
                false
            );
        }
    }

    async function ChangeDriverStatus(docId, driverStatus) {
        var ref = doc(db, "drivers", docId);

        await updateDoc(ref, {
            bookingStatus: driverStatus,
        })
            .then(() => {
                alert("Success");
            })
            .catch((error) => {
                alert("Unsuccessful operation, error: " + error);
            });
    }
</script>
<?php include "footer.php";?>
