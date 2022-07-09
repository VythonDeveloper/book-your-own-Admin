<?php include "header.php";?>
<section class="text-blueGray-700">
    <div class="container items-center px-5">
        <div class="flex flex-col w-full p-10 my-6 transition duration-500 ease-in-out transform bg-white rounded-lg md:mt-0">
            <section class="flex flex-col w-full h-full p-1 overflow-auto">
                <header
                    class="flex flex-col items-center justify-center py-12 text-base transition duration-500 ease-in-out transform bg-white border border-dashed rounded-lg text-blueGray-500 focus:border-blue-500 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2"
                >
                    <p class="flex flex-wrap justify-center mb-3 text-base leading-7 text-blueGray-500"><span>Drag and drop your</span>&nbsp;<span>files anywhere or</span></p>
                    <button
                        class="w-auto px-2 py-1 my-2 mr-2 transition duration-500 ease-in-out transform border rounded-md text-blueGray-500 hover:text-blueGray-600 text-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blueGray-100"
                    >
                        Upload a file
                    </button>
                </header>
            </section>
            <div class="mt-6">
                <form action="" method="POST" class="space-y-6" onsubmit="AddDriver(); return false;">
                    <div class="grid grid-cols-1 gap-2 lg:grid-cols-3">
                        <div>
                            <label for="fullname" class="block text-sm font-medium text-neutral-600"> Fullname </label>
                            <div class="mt-1">
                                <input
                                    id="fullname"
                                    name="fullname"
                                    type="text"
                                    required=""
                                    placeholder="Driver's Fullname"
                                    class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                />
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label for="mobile" class="block text-sm font-medium text-neutral-600"> Mobile </label>
                            <div class="mt-1">
                                <input
                                    id="mobile"
                                    name="mobile"
                                    type="number"
                                    required=""
                                    placeholder="Driver's Mobile"
                                    class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                />
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label for="email" class="block text-sm font-medium text-neutral-600"> Email </label>
                            <div class="mt-1">
                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    required=""
                                    placeholder="Driver's Email"
                                    class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-2 lg:grid-cols-3">
                        <div>
                            <label for="vehicleName" class="block text-sm font-medium text-neutral-600"> Vehicle Name </label>
                            <div class="mt-1">
                                <input
                                    id="vehicleName"
                                    name="vehicleName"
                                    type="text"
                                    required=""
                                    placeholder="Vehicle Name"
                                    class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                />
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label for="vehicleType" class="block text-sm font-medium text-neutral-600"> Vehicle Type </label>
                            <div class="mt-1">
                                <select
                                    id="vehicleType"
                                    name="vehicleType"
                                    class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                >
                                    <option>Rickshaw</option>
                                    <option>Tractor</option>
                                    <option>Mini Truck</option>
                                    <option>Truck</option>
                                    <option>Delivery Truck</option>
                                </select>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label for="vehicleNumber" class="block text-sm font-medium text-neutral-600"> Vehicle Number </label>
                            <div class="mt-1">
                                <input
                                    id="vehicleNumber"
                                    name="vehicleNumber"
                                    type="text"
                                    required=""
                                    placeholder="Vehicle Number"
                                    class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-2 lg:grid-cols-3">
                        <div>
                            <label for="initialRating" class="block text-sm font-medium text-neutral-600"> Initial Ratings </label>
                            <div class="mt-1">
                                <input
                                    id="initialRating"
                                    name="initialRating"
                                    type="number"
                                    step="0.1"
                                    min="1"
                                    max="5"
                                    required=""
                                    placeholder="Initial Ratings"
                                    class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                />
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label for="status" class="block text-sm font-medium text-neutral-600"> Status </label>
                            <div class="mt-1">
                                <select
                                    id="status"
                                    name="status"
                                    class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                >
                                    <option>Available</option>
                                    <option>Busy</option>
                                    <option>Travelling</option>
                                </select>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label for="password" class="block text-sm font-medium text-neutral-600"> Password </label>
                            <div class="mt-1">
                                <input
                                    id="password"
                                    name="password"
                                    type="text"
                                    attern="\d*"
                                    maxlength="5"
                                    required=""
                                    placeholder="Driver's Password"
                                    class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                />
                            </div>
                        </div>
                    </div>
                    <div>
                        <button
                            type="button"
                            id="registerBtn"
                            class="flex items-center justify-center float-right px-10 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        >
                            Create Driver's Profile
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

    async function AddDriver() {
        const uniqueId = Date.now().toString();

        // alert(typeof(uniqueId));

        let fullname = _("fullname").value;
        let mobile = _("mobile").value;
        let email = _("email").value;
        let vehicleName = _("vehicleName").value;
        let vehicleType = _("vehicleType").value;
        let vehicleNumber = _("vehicleNumber").value;
        let rating = _("initialRating").value;
        let status = _("status").value;
        let password = _("password").value;

        var ref = doc(db, "drivers", uniqueId);

        const docRef = await setDoc(ref, {
            id: uniqueId,
            fullname: fullname,
            mobile: mobile,
            email: email,
            vehicleName: vehicleName,
            vehicleType: vehicleType,
            vehicleNumber: vehicleNumber,
            rating: rating,
            status: status,
            password: password,
            registered_on: uniqueId,
        })
            .then(() => {
                alert("Success");
                window.location.replace("driver-master.php");
            })
            .catch((error) => {
                alert("Unsuccessful operation, error: " + error);
            });
    }

    _("registerBtn").addEventListener("click", AddDriver);
</script>
<?php include "footer.php";?>
