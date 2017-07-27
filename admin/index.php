<?php
ob_start();
session_start();
if(!isset($_SESSION["name"])){
	header("location:login.php");
}
include('../config.php');
?>
<?php include("header.php"); ?>
						<h2>Welcome to Admin Panel</h2>
						<div style="font-weight: bold;color: #3D9CCD;font-size: 28px;text-align: center;padding-top: 50px">
							Welcome To the Dashboard Of 
							Hall Management System
						</div>
<?php include("footer.php"); ?>	