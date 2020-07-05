<?php
include 'header.php';
require_once ("include/membersite_config.php");

if(isset($_POST['submitted']))
{
  if($fgmembersite->InsertDivision())
   {

	    echo '<script language="javascript">';
        echo 'alert("Division successfully added!"); location.href="div_menu.php"';
        echo '</script>';
 			
   }
}

?>

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="div_menu.php">Division</a>
        </li>
        <li class="breadcrumb-item active">Add Division</li>
      </ol>
      <!-- Example DataTables Card-->
      	<div class="card mb-3">
	        <div class="card-header">
	          <i class="fa fa-home"></i> Division
	        </div>
          	<div class="card-body">
				<form action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post'>

					<table>	

						<tr>
							<div>
							<td><label for='dtc_name'>District:</label></td>
							<td colspan=2><select class="form-control" name='dtc_id'>
							<?php
							$fgmembersite->DBlogin();
			                $query = "SELECT * FROM tbl_district ";
			                $result = mysqli_query($fgmembersite->connection, $query);

			                if ($result->num_rows > 0)
			                	{
			                    while ($row = $result->fetch_assoc())
			                      {
			                     	echo "<option value='". $row["dtc_id"] ."'>" . $row["dtc_name"] . "</option>";
			                      }
			                    }
						 		         
							?>
								</select></td>
							</div>
						</tr>
						<tr>
							<div>
							<td><label for='div_name'>Division:</label></td>
							<td><input class="form-control" type='input' name='div_name' /></td>
							</div>
						</tr>

						<tr>
							<div>
							<td><label for='div_supt'>Superintendent:</label></td>
							<td><textarea class="form-control" type='text' style="width:210px; height:50px" name='div_supt' maxlength="1000" /></textarea></td>
							</div>
						</tr>
					</table>
						<br><br>

						<input class="btn btn-primary" type='submit' name='submitted' value='Submit'/>
						<input class="btn btn-primary" type="button" onclick="location.href='div_menu.php';" value="Back" />	
				</form>	
			</div>
	  	</div>
	</div>
</div>
<?php
include 'footer.php';
?>