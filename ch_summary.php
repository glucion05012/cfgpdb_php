<?php
require_once ("include/membersite_config.php");
$fgmembersite->tablename = 'tbl_church';
$fgmembersite->DBlogin();
if(isset($_GET['churchID'])){
	 $result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_church where ch_id = $_GET[churchID]");
	 
	while($row = $result->fetch_assoc()) 
	{
		  $ch_name = $row["ch_name"];
		  $ch_address = $row["ch_address"];
		  $ch_contact = $row["ch_contact"];
		  $ch_email = $row["ch_email"];
		  $ch_soc_acct = $row["ch_soc_acct"];				  
		  $ch_dtc_id = $row["ch_dtc_id"];
		  $ch_div_id = $row["ch_div_id"];
		  $ch_year_est = $row["ch_year_est"];
		  $ch_church_his = $row["ch_church_his"];
		  $ch_property = $row["ch_property"];
		  $ch_property_info = $row["ch_property_info"];
		  $ch_property_status = $row["ch_property_status"];
		  $ch_other_info = $row["ch_other_info"];
		  $ch_status = $row["ch_status"];
		  $ch_notes = $row["ch_notes"];
		  $ch_min_id = $row["ch_min_id"];
		  $fgmembersite->DBlogin();
			$result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_district where dtc_id = '". $ch_dtc_id ."'");
			while($row = $result->fetch_assoc()) 
			{
				$ch_dtc_name = $row["dtc_name"];
			}
		  $fgmembersite->DBlogin();
			$result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_division where div_id = '". $ch_div_id ."'");
			while($row = $result->fetch_assoc()) 
			{
				$ch_div_name = $row["div_name"];
			}
		  $fgmembersite->DBlogin();
			$result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_minister where min_id = '". $ch_min_id ."'");
			if ($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc()) 
				{	
					$ch_min_name = $row["min_fullname"];
				}
			}else
			{
				$ch_min_name = "N/A";
			}
	}
}
?>
<html>
<body>
	<table border=1>
		<tr>
			<td colspan=6 bgcolor='#76D7C4'><b><center>Church Information</b></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='ch_name'>Church Name:</label></td>
			<td colspan='5'><?php echo $ch_name ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='ch_address'>Complete Address:	:</label></td>
			<td colspan=5><?php echo $ch_address ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='ch_contact'>Contact #:</label></td>
			<td><?php echo $ch_contact ?></td>
			<td bgcolor='#D5D8DC'><label for='ch_email'>Email Add:</label></td>
			<td><?php echo $ch_email ?></td>
			<td bgcolor='#D5D8DC'><label for='ch_soc_acct'>Social Account:</label></td>
			<td><?php echo $ch_soc_acct ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='ch_dtc_name'>District:</label></td>
			<td><?php echo $ch_dtc_name ?></td>
			<td bgcolor='#D5D8DC'><label for='ch_div_name'>Division:</label></td>
			<td><?php echo $ch_div_name ?></td>
			<td bgcolor='#D5D8DC'><label for='ch_year_est'>Year Established:</label></td>
			<td><?php echo $ch_year_est ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='ch_church_his'>Church History:</label></td>
			<td colspan='2'><?php echo $ch_church_his ?></td>
			<td bgcolor='#D5D8DC'><label for='ch_property'>Church Property:</label></td>
			<td colspan='2'><?php echo $ch_property ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='ch_property_info'>Property Info:</label></td>
			<td colspan='2'><?php echo $ch_property_info ?></td>
			<td bgcolor='#D5D8DC'><label for='ch_property_status'>Property Status:</label></td>
			<td colspan='2'><?php echo $ch_property_status ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='ch_other_info'>Other Info:</label></td>
			<td colspan='2'><?php echo $ch_other_info ?></td>
			<td bgcolor='#D5D8DC'><label for='ch_notes'>Notes:</label></td>
			<td colspan='2'><?php echo $ch_notes ?></td>
			</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='ch_min_name'>Senior Pastor:</label></td>
			<td colspan='2'><?php echo $ch_min_name ?></td>		
			<td bgcolor='#D5D8DC'><label for='ch_status'>Status:</label></td>
			<td colspan='2'><?php echo $ch_status ?></td>
		</tr>
		
	</table>

</body>
</html>