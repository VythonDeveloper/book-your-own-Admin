<?php include "header.php";?>
<section class="text-gray-600 body-font">
    <div class="container px-5 py-5 mx-auto">
        <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto py-5">
            <a class="text-blue-500 inline-flex items-center md:mb-2 lg:mb-0">
                Create a new Coupon
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </a>
            <button
                type="button"
                class="flex ml-auto text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                onclick="location.href='add-coupon.php'"
            >
                Click to add Coupon
            </button>
        </div>
        <!-- <input type="hidden" id="driverStatusBtn"> -->
        <div class="lg w-full mx-auto overflow-auto">
            <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                    <tr>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Id</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Coupon-name</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Coupon-code</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Discount(%)</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Description</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Scratched : Redeemed</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Valid from</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Expiry on</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">Action</th>
                    </tr>
                </thead>
                <tbody id="couponsTable"></tbody>
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

    GetCoupons();

    async function GetCoupons() {
        const querySnapshot = await getDocs(collection(db, "coupons"));
        let rowCount = 0;
        querySnapshot.forEach((doc) => {
            rowCount++;

            var validFrom = new Date(parseInt(doc.data()["validFrom"]));
            var expiryOn = new Date(parseInt(doc.data()["expiryOn"]));
            let scratchedBy = doc.data()["scratchedBy"].length;
            let redeemedBy = doc.data()["redeemedBy"].length;

            let output =
                "<tr id='" +
                doc.data()["id"] +
                '\' ><td class="px-4 py-3">' +
                rowCount +
                '</td><td class="px-4 py-3">' +
                doc.data()["coupon_name"] +
                '</td><td class="px-4 py-3">' +
                doc.data()["coupon_code"] +
                '</td><td class="px-4 py-3">' +
                doc.data()["discount"] +
                '</td><td class="px-4 py-3">' +
                doc.data()["description"] +
                '</td><td class="px-4 py-3">' +
                scratchedBy +
                " : " +
                redeemedBy +
                '</td><td class="px-4 py-3">' +
                validFrom.toLocaleDateString() +
                '</td><td class="px-4 py-3">' +
                expiryOn.toLocaleDateString() +
                '</td><td class="w-10 text-center"> <button type="button" id="deleteCouponBtn" data-id=\'' +
                doc.data()["id"] +
                '\' class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Delete</button></td></tr>';

            _("couponsTable").insertAdjacentHTML("afterbegin", output);
        });

        var buttons = document.querySelectorAll("#deleteCouponBtn");
        for (var i = 0; i < buttons.length; i++) {
            buttons[i].addEventListener(
                "click",
                function (event) {
                    DeleteCoupon(this.getAttribute("data-id"));
                },
                false
            );
        }
    }

    async function DeleteCoupon(docId) {
        var ref = doc(db, "coupons", docId);
        const docSnapshot = await getDoc(ref);

        if (!docSnapshot.exists()) {
            alert("Coupon not exists");
            return;
        }

        await deleteDoc(ref)
            .then(() => {
                var row = _(docId);
                row.parentNode.removeChild(row);
                alert("Deleted!!");
            })
            .catch((error) => {
                alert("Something went wrong, error: " + error);
            });
    }
</script>
<?php include "footer.php";?>
