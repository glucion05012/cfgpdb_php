<?php
include 'header.php';
require_once ("include/membersite_config.php");

if(isset($_POST['submitted']))
{
	if($fgmembersite->UpdateDivision())
		{
			echo '<script language="javascript">';
			echo 'alert("Division successfully updated!"); location.href="div_menu.php"';
			echo '</script>';
		}	
}

		$fgmembersite->tablename = 'tbl_division';
		$fgmembersite->DBlogin();
		//$id = intval($_GET['ID']);
		if(isset($_GET['divisionID'])){
			 $result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_division where div_id = $_GET[divisionID]");
			 
			while($row = $result->fetch_assoc()) 
			{
				  $name = $row["div_name"];
				  $supt =  $row["div_supt"];
				  $dtcID = $row["div_dtc_id"];

				  $fgmembersite->DBlogin();
			      $query = "SELECT * FROM tbl_district where dtc_id = '". $dtcID ."'";
			      $result = mysqli_query($fgmembersite->connection, $query);
			      while ($row = $result->fetch_assoc())
			        {
                		$dtcName = $row["dtc_name"];
                	}
			}
						 		         
echo"
<div class='content-wrapper'>
    <div class='container-fluid'>
      <!-- Breadcrumbs-->
      <ol class='breadcrumb'>
        <li class='breadcrumb-item'>
          <a href='div_menu.php'>Division</a>
        </li>
        <li class='breadcrumb-item active'>Edit Division</li>
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
							<td colspan=2><select class='form-control' name='dtc_id'>
							";
							$fgmembersite->DBlogin();
			                $query = "SELECT * FROM tbl_district ";
			                $result = mysqli_query($fgmembersite->connection, $query);
			                echo "<option value='". $dtcID ."' selected>". $dtcName ."</option>";
			                if ($result->num_rows > 0)
			                	{
			                    while ($row = $result->fetch_assoc())
			                      {
			                     	echo "<option value='". $row["dtc_id"] ."'>" . $row["dtc_name"] . "</option>";
			                      }
			                    }
						 		         
							echo"
								</select></td>
							</div>
						</tr>
						<tr>
							<div>
							<td><label for='div_name'>Division:</label></td>
							<td><input class='form-control' value='". $name ."' type='input' name='div_name' /></td>
							</div>
						</tr>	
						<tr>
							<div>
							<td><label for='div_supt'>Superintendent: </label></td>
							<td><textarea class='form-control' type='text' style='width:210px; height:50px' name='div_supt' maxlength='1000' />". $supt ."</textarea></td>
							</div>
						</tr>
					</table>
					<br><br>
						<input value= '". $_GET['divisionID'] ."' style='width:300px' type='hidden' name='div_id' maxlength='50'/>
						<input class='btn btn-primary' type='submit' name='submitted' value='Submit' onclick='return confirm('Are you sure you want to save Division?')'/>
				</form>
			</div>
	  	</div>
	</div>
</div>
";
}
include 'footer.php';
?>	