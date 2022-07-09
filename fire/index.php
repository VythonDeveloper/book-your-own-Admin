<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Firebase</title>
</head>
<body>
	<input type="text" id="fname" placeholder="First Name">
	<input type="text" id="lname" placeholder="Last Name">
	<input type="text" id="age" placeholder="Age">
	<hr>
	<button id="inBtn">Insert</button>
	<button id="upBtn">Update</button>
	<button id="deBtn">Delete</button>
	<button id="seBtn">Select</button>
	<hr>
	<h3 id="dataPart"></h3>

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
	    measurementId: "G-PBZNF9B4MB"
	  };

	  // Initialize Firebase
	  const app = initializeApp(firebaseConfig);
	  const analytics = getAnalytics(app);

	  import {
	  	query, where, getFirestore, doc, getDoc, onSnapshot, getDocs, setDoc, collection, addDoc, updateDoc, deleteDoc, deleteField
	  }
	  from "https://www.gstatic.com/firebasejs/9.6.11/firebase-firestore.js";

	  const db = getFirestore();

	  // References

	  let fname = document.getElementById('fname');
	  let lname = document.getElementById('lname');
	  let age = document.getElementById('age');

	  let inBtn = document.getElementById('inBtn');
	  let upBtn = document.getElementById('upBtn');
	  let deBtn = document.getElementById('deBtn');
	  let seBtn = document.getElementById('seBtn')

	  let dataPart = document.getElementById("dataPart");

	  // Adding Document

	  async function AddDocument_AutoId(){
	  	var ref = collection(db, "thestud");

	  	const docRef = await addDoc(
	  		ref, {
	  			fname: fname.value,
	  			lname: lname.value,
	  			age: age.value
	  		}
	  	).then(()=>{
	  	alert("Success with id: " + docRef.id);
	  		
	  	}).catch((error)=>{
	  		alert("Unsuccessful operation, error: " + error);
	  	});
	  }

	  // Adding Document by custom id

	  async function AddDocument_CustomId(){
	  	var ref = doc(db, "thestud/123/sub/anothr");

	  	const docRef = await setDoc(
	  		ref, {
	  			sub1: 'Math',
	  			sub2: 'Sc',
	  			sub3: 'Math'
	  		}
	  	).then(()=>{
	  		alert("Success");
	  	}).catch((error)=>{
	  		alert("Unsuccessful operation, error: " + error);
	  	});

	  }

	  // Get Document

	  async function GetADocument(){
	  	var ref = doc(db, "thestud", "Cy6XuQUdssBzWdhX33NW");
	  	const docSnapshot = await getDoc(ref);

	  	if(docSnapshot.exists()){
	  		fname.value = docSnapshot.data().fname;
	  		lname.value = docSnapshot.data().lname;
	  		age.value = docSnapshot.data().age;
	  	}else{
	  		alert("NO such doc");
	  	}
	  }

	  // Update Document

	  async function UpdateADocument(){
	  	var ref = doc(db, "thestud", "123");

	  	await updateDoc(
	  		ref, {
	  			fname: fname.value,
	  			lname: lname.value,
	  			age: age.value
	  		}
	  	).then(()=>{
	  		alert("Success");
	  	}).catch((error)=>{
	  		alert("Unsuccessful operation, error: " + error);
	  	});
	  }

	  // Delete Document

	  async function DeleteADocument(){
	  	var ref = doc(db, "thestud", "123");
	  	const docSnapshot = await getDoc(ref);

	  	if(!docSnapshot.exists()){
	  		alert("Document not exists");
	  		return;
	  	}

	  	await deleteDoc(ref)
	  	.then(()=>{
	  		alert("Deleted!!");
	  	})
	  	.catch((error)=>{
	  		alert("Something went wrong, error: " + error);
	  	});
	  }

	  async function GetDocuments(){
	  	const querySnapshot = await getDocs(collection(db, "thestud"));

	  	querySnapshot.forEach((doc)=> {
	  		console.log(doc.data());
	  	});
	  }

	  async function StreamSnapshot(){
	  	const unsub = onSnapshot(doc(db, "thestud", "Cy6XuQUdssBzWdhX33NW"), (doc) => {
	  		dataPart.innerHTML = doc.data()['fname'];
		    console.log("Current data: ", doc.data());
		});
	  }

	  async function MultiStream(){
	  	const qq = query(collection(db, 'thestud'));

	  	const stream = onSnapshot(qq, (querySnapshot)=>{
	  		const users = [];
	  		querySnapshot.forEach((doc)=>{
	  			users.push(doc.data().fname);
	  		});
	  		dataPart.innerHTML = users.join(", ");
	  	});
	  }



	  // Events
	  inBtn.addEventListener("click", AddDocument_CustomId);
	  upBtn.addEventListener("click", UpdateADocument);
	  deBtn.addEventListener("click", DeleteADocument);
	  seBtn.addEventListener("click", MultiStream);

	</script>
</body>
</html>