<?php
require_once ("include/membersite_config.php");
?>
<html>
<body>
	<table border=1>
		
			<?php
			if($_GET["tbl"] == "tbl_church" and $_SESSION['home_settings']=="1")
			{
				echo"
				<thead>
					<td><center><b>Name</td>
					<td><center><b>District</td>
				</thead>
					";	
			}elseif($_GET["tbl"] == "tbl_ch_member")
			{
				echo"
				<thead>
					<td><center><b>Name</td>
					<td><center><b>Church</td>
				</thead>
					";	
			}elseif($_GET["tbl"] == "tbl_minister" and $_SESSION['home_settings']=="1")
			{
				echo"
				<thead>
					<td><center><b>Name</td>
					<td><center><b>District</td>
				</thead>
					";	
			}
			elseif($_GET["tbl"] == "tbl_church" and $_SESSION['home_settings']=="0")
			{
				echo"
				<thead>
					<td><center><b>Name</td>
					<td><center><b>Division</td>
				</thead>
					";	
			}
			else
			{
				echo"
				<thead>
					<td><center><b>Name</td>
				</thead>
					";		
			}
			
			$dtc = $_SESSION['username_of_user'];
				$fgmembersite->tablename = $_GET["tbl"];
				$fgmembersite->DBlogin();
				if(isset($_GET['statusVal'])){
					 if($_SESSION['home_settings']=="1"){
					 	if($_GET["tbl"] == "tbl_church")
					 	{
					 		$query = "SELECT ".$_GET['tbl'].".*, tbl_district.dtc_name FROM ".$_GET['tbl']." INNER JOIN tbl_district ON ".$_GET['tbl'].".ch_dtc_id = tbl_district.dtc_id where ".$_GET['tbl'].".".$_GET['status']." = ".$_GET['statusVal']." ORDER BY ".$_GET['tbl'].".".$_GET['col']."";
					 	}
					 	else if($_GET["tbl"] == "tbl_minister")
					 	{
					 		$query = "SELECT ".$_GET['tbl'].".*, tbl_district.dtc_name FROM ".$_GET['tbl']." INNER JOIN tbl_district ON ".$_GET['tbl'].".min_dtc_id = tbl_district.dtc_id where ".$_GET['tbl'].".".$_GET['status']." = ".$_GET['statusVal']." ORDER BY ".$_GET['tbl'].".".$_GET['col']."";
					 	}elseif($_GET["tbl"] == "tbl_ch_member")
					 	{
					 		$query = "SELECT ".$_GET['tbl'].".ch_mem_fullname, tbl_church.ch_name FROM ".$_GET['tbl']." INNER JOIN tbl_church ON ".$_GET['tbl'].".ch_mem_ch_id = tbl_church.ch_id where ".$_GET['tbl'].".".$_GET['status']." = ".$_GET['statusVal']." ORDER BY ".$_GET['tbl'].".".$_GET['col']."";
					 	}
					 }
					 elseif($_SESSION['home_settings']=="0"){
					 	if($_GET["tbl"] == "tbl_ch_member")
					 	{
					 		$query = "SELECT a.ch_mem_fullname, b.ch_name, c.dtc_name FROM tbl_ch_member a INNER JOIN tbl_church b ON a.ch_mem_ch_id = b.ch_id INNER JOIN tbl_district c ON b.ch_dtc_id = c.dtc_id
					 					where a.".$_GET['status']." = ".$_GET['statusVal']." 
					 					AND c.dtc_name = '". $dtc ."' 
					 					ORDER BY a.".$_GET['col']."";
					 	}
					 	elseif($_GET["tbl"] == "tbl_church")
						{
							$query = "SELECT a.ch_name, b.div_name FROM tbl_church a INNER JOIN tbl_division b ON a.ch_div_id = b.div_id INNER JOIN tbl_district c ON a.ch_dtc_id = c.dtc_id where c.dtc_name = '". $dtc ."' ORDER BY a.ch_name";
						}
					 	else
					 	{
					 	$query = "SELECT * FROM ".$_GET["tbl"]." a JOIN tbl_district b ON a.".$_GET["dtcID"]." = b.dtc_id where b.dtc_name = '". $dtc ."' AND a.".$_GET['status']." = ".$_GET['statusVal']." ORDER BY ".$_GET['col']."";

					 	}
					 }
				
				 	$result = mysqli_query($fgmembersite->connection, $query);
					 
					while($row = $result->fetch_assoc()) 
					{
						if($_GET["tbl"] == "tbl_ch_member")
					 	{
					 		echo"<tr><td>".$row['ch_mem_fullname']."</td>";
					 		echo"<td>".$row['ch_name']."</td></tr>";
					 	}
					 	elseif($_GET["tbl"] == "tbl_church" and $_SESSION['home_settings']=="1")
					 	{
					 		echo"<tr><td>".$row['ch_name']."</td>";
					 		echo"<td>".$row['dtc_name']."</td></tr>";
					 	}
					 	elseif($_GET["tbl"] == "tbl_minister" and $_SESSION['home_settings']=="1")
					 	{
					 		echo"<tr><td>".$row['min_fullname']."</td>";
					 		echo"<td>".$row['dtc_name']."</td></tr>";
					 	}
					 	elseif($_GET["tbl"] == "tbl_church" and $_SESSION['home_settings']=="0")
						{
							echo"<tr><td>".$row['ch_name']."</td>";
					 		echo"<td>".$row['div_name']."</td></tr>";
						}
					 	else{
						  echo"<tr><td>".$row[$_GET['col']]."</td></tr>";
					 	}
					}

					

				}
			?>
		
		
	</table>

</body>
</html>