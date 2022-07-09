<?php
session_start();
session_regenerate_id();
?>

<script type="text/javascript">
	let admin_email = sessionStorage.getItem("admin_email");
	let admin_password = sessionStorage.getItem("admin_password");
	// console.log(admin_email+', '+admin_password);
	if(admin_email != '' && admin_password != '' && admin_email != null && admin_password != null){
		// Just go on
	}else{
		window.location.replace("index.php");
	}
</script>