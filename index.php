<?php
session_start();
session_regenerate_id();

$_SESSION['admin_email'] = '';
$_SESSION['admin_password'] = '';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Book your Own - Admin Portal</title>
        <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="./assets/css/index.min.css" />
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.6/dist/flowbite.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.17/tailwind.min.css" />
    </head>
    <body>
        <section>
            <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 md:px-12 lg:px-24 lg:py-24">
                <div class="justify-center mx-auto text-left align-bottom transition-all transform bg-white rounded-lg sm:align-middle sm:max-w-2xl sm:w-full">
                    <div class="grid flex-wrap items-center justify-center grid-cols-1 mx-auto shadow-xl lg:grid-cols-2 rounded-xl">
                        <div class="w-full px-6 py-3">
                            <div>
                                <div class="mt-3 text-left sm:mt-5">
                                    <div class="inline-flex items-center w-full">
                                        <h3 class="text-lg font-bold text-neutral-600 l eading-6 lg:text-5xl">Sign in</h3>
                                    </div>
                                    <div class="mt-4 text-base text-gray-500">
                                        <p>Sign in to manage "Book your Own"</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 space-y-2">
                                <div>
                                    <label for="email" class="sr-only">Email</label>
                                    <input
                                        type="text"
                                        name="email"
                                        id="email"
                                        class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                        placeholder="Enter your email"
                                    />
                                </div>
                                <div>
                                    <label for="password" class="sr-only">Password</label>
                                    <input
                                        type="password"
                                        name="password"
                                        id="password"
                                        class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                        placeholder="Enter your password"
                                    />
                                </div>
                                <div class="flex flex-col mt-4 lg:space-y-2">
                                    <button
                                        type="button"
                                        id="signinBtn"
                                        class="flex items-center justify-center w-full px-10 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                    >
                                        Sign in
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="order-first hidden h-full bg-fill w-full lg:block">
                            <img class="object-cover h-full w-full bg-cover rounded-l-lg" src="./assets/images/admin-login-bg.jpg" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
<script src="https://unpkg.com/flowbite@1.4.6/dist/flowbite.js"></script>
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

    async function VerifyAdmin() {
        let email = _("email").value;
        let password = _("password").value;

        // let email = "vivek.verma.admin@byo.com";
        // let password = "admin";

        const querySnapshot = await getDocs(query(collection(db, "admin"), where("email", "==", email), where("password", "==", password)));

        if (querySnapshot.docs.length > 0) {
            sessionStorage.setItem("admin_email", email);
            sessionStorage.setItem("admin_password", password);
            window.location.replace("dashboard.php");
        } else {
            alert("Invalid Credentials!!");
        }
    }

    _("signinBtn").addEventListener("click", VerifyAdmin);
</script>
