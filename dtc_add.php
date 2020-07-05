<?php
include 'header.php';
require_once ("include/membersite_config.php");

if(isset($_POST['submitted']))
{
  if($fgmembersite->InsertDistrict())
   {

	    echo '<script language="javascript">';
        echo 'alert("District successfully added!"); location.href="dtc_menu.php"';
        echo '</script>';
 			
   }
}

?>

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="dtc_menu.php">District</a>
        </li>
        <li class="breadcrumb-item active">Add District</li>
      </ol>
      <!-- Example DataTables Card-->
      	<div class="card mb-3">
	        <div class="card-header">
	          <i class="fa fa-home"></i> District
	        </div>
          	<div class="card-body">
				<form action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post'>

					<table>	

						<tr>
							<div>
							<td><label for='dtc_name'>District:</label></td>
							<td><input class="form-control" type='input' name='dtc_name' /></td>
							</div>
						</tr>

						<tr>
							<div>
							<td><label for='dtc_spvr'>Supervisor: </label></td>
							<td><textarea class="form-control" type='text' style="width:210px; height:50px" name='dtc_spvr' maxlength="1000" /></textarea></td>
							</div>
						</tr>
					</table>
						<br><br>

						<input class="btn btn-primary" type='submit' name='submitted' value='Submit'/>
						<input class="btn btn-primary" type="button" onclick="location.href='dtc_menu.php';" value="Back" />	
				</form>	
			</div>
	  	</div>
	</div>
</div>
<?php
include 'footer.php';
?>