<?php
require_once("include/membersite_config.php");

		$fgmembersite->DBlogin();
		$id = intval($_GET['ministerID']);
	   	mysqli_query($fgmembersite->connection, "DELETE FROM tbl_minister WHERE min_id=$id");
	   	mysqli_query($fgmembersite->connection, "DELETE FROM tbl_min_spouse WHERE sp_min_id=$id"); 
	   	mysqli_query($fgmembersite->connection, "DELETE FROM tbl_min_children WHERE cdn_min_id=$id");
	   	mysqli_query($fgmembersite->connection, "DELETE FROM tbl_min_education WHERE educ_min_id=$id");
	   	mysqli_query($fgmembersite->connection, "DELETE FROM tbl_min_mty WHERE mty_min_id=$id");    
	   	mysqli_query($fgmembersite->connection, "DELETE FROM tbl_min_relb WHERE relb_min_id=$id"); 
	   	mysqli_query($fgmembersite->connection, "DELETE FROM tbl_min_work WHERE wrk_min_id=$id"); 

	    echo '<script language="javascript">';
        echo 'alert("Minister successfully deleted!"); location.href="min_menu.php"';
        echo '</script>';

?>