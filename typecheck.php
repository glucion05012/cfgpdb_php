<?php
session_start();
if($_SESSION['type_of_user']=="admin")
{
	$_SESSION['district_report'] = "0";
	$_SESSION['home_settings'] = "1";
	$_SESSION['home_members'] = "1";
	$_SESSION['edit_minister'] = "1";
	$_SESSION['delete_minister'] = "1";
	$_SESSION['edit_church'] = "1";
	$_SESSION['delete_church'] = "1";

	header("location: home.php");

}
else if($_SESSION['type_of_user']=="encoder")
{
	$_SESSION['district_report'] = "0";
	$_SESSION['home_settings'] = "1";
	$_SESSION['home_members'] = "1";
	$_SESSION['edit_minister'] = "1";
	$_SESSION['delete_minister'] = "1";
	$_SESSION['edit_church'] = "1";
	$_SESSION['delete_church'] = "1";

	header("location: home.php");

}
else if($_SESSION['type_of_user']=="district")
{
	$_SESSION['district_report'] = "1";
	$_SESSION['home_settings'] = "0";
	$_SESSION['home_members'] = "0";
	$_SESSION['edit_minister'] = "1";
	$_SESSION['delete_minister'] = "0";
	$_SESSION['edit_church'] = "1";
	$_SESSION['delete_church'] = "0";
	
	header("location: home.php");
}

// if($_SESSION['home_settings']=="1")
?>