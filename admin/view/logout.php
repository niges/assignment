<?php 

session_start();
session_unset();
session_destroy();
ob_start();
header("Location:http://localhost/newassign/admin/login.php");
ob_end_flush();
exit();