<?php
session_start();
//unset($_SESSION['user']);
if(isset($_SESSION['username'])){
	session_unset($_SESSION['username']);
	session_destroy();
	echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
}
//header('Location:../index.php');
exit;