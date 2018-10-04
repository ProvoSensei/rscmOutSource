<?php
	include 'connection.php';
	session_start();
	if (isset($_SESSION['login']))
	{
		unset($_SESSION);
		session_destroy();

		echo "<script>alert('Berhasil Logout')</script>";
	}
		header("location: index.php");
?>