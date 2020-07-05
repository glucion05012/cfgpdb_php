<?php
include 'header.php';
require_once ("include/membersite_config.php");

if(isset($_POST['submitted']))
{
  if($fgmembersite->ChangePassword())
   {

	    echo '<script language="javascript">';
        echo 'alert("Password successfully changed!"); location.href="profile.php"';
        echo '</script>';
 			
   }
}

?>

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="profile.php">Profile Management</a>
        </li>
        <li class="breadcrumb-item active">Change Password</li>
      </ol>
      <!-- Example DataTables Card-->
      	<div class="card mb-3">
	        <div class="card-header">
	          <i class="fa fa-home"></i> Change Password
	        </div>
          	<div class="card-body">
				<form action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post'>

					<table>	

						<tr>
							<div>
							<td><label for='dtc_name'>Name:</label></td>
							<td><?php echo $_GET['name'] ?></td>
							</div>
						</tr>

						<tr>
							<div>
								<td><label for='newpwd' >New Password*:</label></td>
							    <td><input class="form-control" type='password' name='newpwd' maxlength="50" required /></td>
							</div>
							<input value= '<?php echo $_GET['userID'] ?>' type='hidden' name='userID' maxlength='50'/>
						</tr>
					</table>
						<br><br>

						<input class="btn btn-primary" type='submit' name='submitted' value='Submit'/>
						<input class="btn btn-primary" type="button" onclick="location.href='profile.php';" value="Back" />	
				</form>	
			</div>
	  	</div>
	</div>
</div>
<?php
include 'footer.php';
?>