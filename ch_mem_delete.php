<?php
require_once("include/membersite_config.php");

		$fgmembersite->DBlogin();
		$id = intval($_GET['memID']);
		$ch_id = intval($_GET['churchID']);
	   	mysqli_query($fgmembersite->connection, "DELETE FROM tbl_ch_member WHERE ch_mem_id=$id");
	   	mysqli_query($fgmembersite->connection, "DELETE FROM tbl_ch_mem_spouse WHERE sp_mem_id=$id"); 
	   	mysqli_query($fgmembersite->connection, "DELETE FROM tbl_ch_mem_children WHERE cdn_mem_id=$id");
	   	mysqli_query($fgmembersite->connection, "DELETE FROM tbl_ch_mem_education WHERE educ_mem_id=$id");
	   	mysqli_query($fgmembersite->connection, "DELETE FROM tbl_ch_mem_training WHERE trn_mem_id=$id");   
	   	mysqli_query($fgmembersite->connection,'UPDATE tbl_ch_mem_size SET memS_total = memS_total - 1 where memS_ch_id = "'. $ch_id.'"'); 
	    echo '<script language="javascript">';
        echo 'alert("Member successfully deleted!"); location.href="ch_mem_menu.php?churchID='. $_GET['churchID'] .'&churchName='. $_GET['churchName'] .'&chDtcName='. $_GET['chDtcName'] .'&chDivName='. $_GET['chDivName'] .'&chDivID='. $_GET['chDivID'] .'&chDtcID='. $_GET['chDtcID'] .'"';
        echo '</script>';

?>