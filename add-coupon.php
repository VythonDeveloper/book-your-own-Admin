<?php include "header.php";?>
<section class="text-blueGray-700">
    <div class="container items-center px-5">
        <div class="flex flex-col w-full p-10 my-6 transition duration-500 ease-in-out transform bg-white rounded-lg md:mt-0">
            <div class="mt-6">
                <form action="" method="POST" class="space-y-6" onsubmit="AddCoupon(); return false;">
                    <div class="grid grid-cols-1 gap-2 lg:grid-cols-3">
                        <div>
                            <label for="coupon-name" class="block text-sm font-medium text-neutral-600"> Coupon Name </label>
                            <div class="mt-1">
                                <input
                                    id="coupon-name"
                                    name="coupon-name"
                                    type="text"
                                    required=""
                                    placeholder="Coupon Name"
                                    class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                />
                            </div>
                        </div>
                        <div>
                            <label for="coupon-code" class="block text-sm font-medium text-neutral-600"> Coupon Code </label>
                            <div class="mt-1">
                                <input
                                    id="coupon-code"
                                    name="coupon-code"
                                    type="text"
                                    size="8"
                                    maxlength="8"
                                    style="text-transform: uppercase;"
                                    required=""
                                    placeholder="Coupon Code"
                                    class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                />
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label for="Discount(%)" class="block text-sm font-medium text-neutral-600"> Discount(%) </label>
                            <div class="mt-1">
                                <input
                                    id="discount"
                                    name="discount"
                                    type="number"
                                    step="0.5"
                                    required=""
                                    placeholder="Discount(%)"
                                    class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-2 lg:grid-cols-3">
                        <div class="space-y-1 span-col-2">
                            <label for="description" class="block text-sm font-medium text-neutral-600"> Description </label>
                            <div class="mt-1">
                                <textarea
                                    id="description"
                                    name="description"
                                    type="text"
                                    required=""
                                    placeholder="Coupon description"
                                    class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                ></textarea>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label for="validFrom" class="block text-sm font-medium text-neutral-600"> Valid from </label>
                            <div class="mt-1">
                                <input
                                    id="validFrom"
                                    name="validFrom"
                                    type="date"
                                    min="<?php echo date('Y-m-d');?>"
                                    required=""
                                    placeholder="dd-mm-yyyy"
                                    class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                />
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label for="expiryOn" class="block text-sm font-medium text-neutral-600"> Expiry on </label>
                            <div class="mt-1">
                                <input
                                    id="expiryOn"
                                    name="expiryOn"
                                    type="date"
                                    min="<?php echo date('Y-m-d');?>"
                                    required=""
                                    placeholder="dd-mm-yyyy"
                                    class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                />
                            </div>
                        </div>
                    </div>
                    <div>
                        <button
                            type="button"
                            id="registerBtn"
                            class="inline-flex text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                        >
                            Create Coupon
                            <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </form>
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
        apiKey: "<Your Firebase API Key>",
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

    async function AddCoupon() {
        const uniqueId = Date.now().toString();

        // alert(typeof(uniqueId));

        let coupon_name = _("coupon-name").value;
        let coupon_code = _("coupon-code").value.toUpperCase();
        let discount = _("discount").value;
        let description = _("description").value;
        let validFrom = Date.parse(_("validFrom").value + " 0:0:0");
        let expiryOn = Date.parse(_("expiryOn").value + " 23:59:59");

        var ref = doc(db, "coupons", uniqueId);

        const docRef = await setDoc(ref, {
            id: uniqueId,
            coupon_name: coupon_name,
            coupon_code: coupon_code,
            discount: discount,
            description: description,
            validFrom: validFrom,
            expiryOn: expiryOn,
            scratchedBy: [],
            redeemedBy: [],
            addedOn: uniqueId,
        })
            .then(() => {
                alert("Success");
                window.location.replace("coupon-master.php");
            })
            .catch((error) => {
                alert("Unsuccessful operation, error: " + error);
            });
    }

    _("registerBtn").addEventListener("click", AddCoupon);
</script>
<?php include "footer.php";?>
