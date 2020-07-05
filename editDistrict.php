<?php
include 'header.php';
require_once ("include/membersite_config.php");

if(isset($_POST['submitted']))
{
	if($fgmembersite->UpdateDistrict())
		{
			echo '<script language="javascript">';
			echo 'alert("District successfully updated!"); location.href="district.php"';
			echo '</script>';
		}	
}

		$fgmembersite->tablename = 'tbl_district';
		$fgmembersite->DBlogin();
		//$id = intval($_GET['ID']);
		if(isset($_GET['districtID'])){
			 $result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_district where dtc_id = $_GET[districtID]");
			 
			while($row = $result->fetch_assoc()) 
			{
				  $ID = $row["dtc_id"];
				  $name = $row["dtc_name"];
				  $notes =  $row["dtc_notes"];
			}

echo"
<div class='content-wrapper'>
    <div class='container-fluid'>
      <!-- Breadcrumbs-->
      <ol class='breadcrumb'>
        <li class='breadcrumb-item'>
          <a href='district.php'>District</a>
        </li>
        <li class='breadcrumb-item active'>Edit District</li>
      </ol>
      <!-- Example DataTables Card-->
      	<div class='card mb-3'>
	        <div class='card-header'>
	          <i class='fa fa-table'></i> Items
	        </div>
          	<div class='card-body'>
				<form  action='". $fgmembersite->GetSelfScript() ."' method='post'>
					<table>
						<tr>
							<div>
							<td><label for='dtc_name'>District:</label></td>
							<td><input class='form-control' value='". $name ."' type='input' name='dtc_name' /></td>
							</div>
						</tr>	
						<tr>
							<div>
							<td><label for='dtc_notes'>Notes:</label></td>
							<td><textarea class='form-control' type='text' style='width:210px; height:50px' name='dtc_notes' maxlength='1000' />". $notes ."</textarea></td>
							</div>
						</tr>
					</table>
					<br><br>
						<input value= '". $_GET['districtID'] ."' style='width:300px' type='hidden' name='dtc_id' maxlength='50'/>
						<input class='btn btn-primary' type='submit' name='submitted' value='Submit' onclick='return confirm('Are you sure you want to save District?')'/>
				</form>
			</div>
	  	</div>
	</div>
</div>
";
}
include 'footer.php';
?>	