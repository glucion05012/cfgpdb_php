<?php
require_once("include/membersite_config.php");
		$_SESSION['chDivName'] = $_GET['chDivName'];
		$_SESSION['chDtcName'] = $_GET['chDtcName'];
		$_SESSION['chDivID'] = $_GET['chDivID'];
		$_SESSION['chDtcID'] = $_GET['chDtcID'];

		$fgmembersite->DBlogin();
		$id = intval($_GET['churchID']);
	   	mysqli_query($fgmembersite->connection, "DELETE FROM tbl_church WHERE ch_id=$id");

	   	mysqli_query($fgmembersite->connection, "UPDATE tbl_minister SET min_ch_id = '0' WHERE min_ch_id=$id");

	   	mysqli_query($fgmembersite->connection, "DELETE FROM tbl_ch_mem_size WHERE memS_ch_id=$id");
	

	   echo '<script language="javascript">';
        echo 'alert("Church successfully deleted!"); location.href="ch_menu.php?chDivName='. $_SESSION['chDivName'] .'&chDtcName='. $_SESSION['chDtcName'] .'&chDivID='. $_SESSION['chDivID'] .'&chDtcID='. $_SESSION['chDtcID'] .'"';
        echo '</script>';

?>