<?php
session_start();
session_regenerate_id();
?>

<script type="text/javascript">
    sessionStorage.clear();
    window.location.replace("index.php");
</script>
