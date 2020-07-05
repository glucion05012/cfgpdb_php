<?php
include 'header.php';
require_once ("include/membersite_config.php");

if(isset($_POST['submitted']))
{
  if($fgmembersite->MoveMember())
   {

	    echo '<script language="javascript">';
        echo 'alert("Member successfully moved!"); location.href="mem_menu.php"';
        echo '</script>';
 			
   }
}

?>

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="mem_menu.php">Members</a>
        </li>
        <li class="breadcrumb-item active">Move Church</li>
      </ol>
      <!-- Example DataTables Card-->
      	<div class="card mb-3">
	        <div class="card-header">
	          <i class="fa fa-home"></i> Move to another church
	        </div>
          	<div class="card-body">
				<form action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post'>

					<table>	

						<tr>
							<div>
							<td><label for='old_church_name'>Old Church:</label></td>
							<td><label for='old_church'><?php echo $_GET['chName']; ?></label></td>
						</tr>
						<tr>
							<td><label for='dtc_name'>New Church:</label></td>
							<td colspan=2><select class="form-control" name='ch_id'>
							<?php
							$fgmembersite->DBlogin();
							 if ($_SESSION['home_settings'] == "1")
                      			{
			                		$query = "SELECT a.ch_id, a.ch_name, b.dtc_name FROM tbl_church a INNER JOIN tbl_district b ON a.ch_dtc_id = b.dtc_id ORDER BY a.ch_name ASC";
					            }elseif ($_SESSION['home_settings'] == "0")
					            {
					            	$query = "SELECT a.ch_id, a.ch_name, b.dtc_name FROM tbl_church a INNER JOIN tbl_district b ON a.ch_dtc_id = b.dtc_id where b.dtc_name = '". $_SESSION['username_of_user'] ."' ORDER BY a.ch_name ASC";
					            }

			                $result = mysqli_query($fgmembersite->connection, $query);

			                if ($result->num_rows > 0)
			                	{
			                    while ($row = $result->fetch_assoc())
			                      {
			                     	echo "<option value='". $row["ch_id"] ."'>" . $row["ch_name"] . " - " . $row["dtc_name"] . "</option>";
			                      }
			                    }
						 		         
							?>
								</select></td>
							</div>
						</tr>
					</table>
					<input class="form-control" name='mem_id' maxlength="50" value="<?php echo $_GET['memID'] ?>" hidden/>
					<input class="form-control" name='old_ch_id' maxlength="50" value="<?php echo $_GET['chID'] ?>" hidden/>
						<br><br>

						<input class="btn btn-primary" type='submit' name='submitted' value='Submit'/>
						<input class="btn btn-primary" type="button" onclick="location.href='mem_menu.php';" value="Back" />	
				</form>	
			</div>
	  	</div>
	</div>
</div>
<?php
include 'footer.php';
?>