<?php
require_once("include/membersite_config.php");

		$fgmembersite->DBlogin();
		$id = intval($_GET['divisionID']);
	   	mysqli_query($fgmembersite->connection, "DELETE FROM tbl_division WHERE div_id=$id");     
	    echo '<script language="javascript">';
        echo 'alert("Division successfully deleted!"); location.href="div_menu.php"';
        echo '</script>';

?>