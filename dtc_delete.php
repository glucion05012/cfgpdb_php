<?php
require_once("include/membersite_config.php");

		$fgmembersite->DBlogin();
		$id = intval($_GET['districtID']);
	   	mysqli_query($fgmembersite->connection, "DELETE FROM tbl_district WHERE dtc_id=$id");     
	    echo '<script language="javascript">';
        echo 'alert("District successfully deleted!"); location.href="dtc_menu.php"';
        echo '</script>';

?>