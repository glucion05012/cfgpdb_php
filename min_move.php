<?php
include 'header.php';
require_once ("include/membersite_config.php");

if(isset($_POST['submitted']))
{
  if($fgmembersite->MoveMinister())
   {

	    echo '<script language="javascript">';
        echo 'alert("Minister successfully moved!"); location.href="min_menu.php"';
        echo '</script>';
 			
   }
}
?>

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="min_menu.php"><b>Minister</b></a>
        </li>
        <li class="breadcrumb-item active"><b>Move Church</b></li>
      </ol>
      <!-- Example DataTables Card-->
      	<div class="card mb-3">
	        <div class="card-header">
	          <i class="fa fa-home"></i> Move to another church
	        </div>
          	<div class="card-body">
				<form action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post'>

					<table>	
						<?php
						$fgmembersite->DBlogin();
						 $query = "SELECT min_id, min_fullname FROM tbl_minister where min_id = '". $_GET['minID'] ."'";
						 $result = mysqli_query($fgmembersite->connection, $query);
						 if ($result->num_rows > 0)
						{
						while($row = $result->fetch_assoc()) 
							{
								$min_name = $row["min_fullname"];
							}
						}
						?>
						<tr>
							<div>
							<td><label for='min_name_label'>Name:</label></td>
							<td><label for='min_name'><?php echo $min_name; ?></label></td>
						</tr>
						<tr>
							<div>
							<td><label for='old_church_name'>Old Church:</label></td>
							<td><label for='old_church'><?php echo $_GET['chName']; ?></label></td>
						</tr>
						<tr>
							<td><label for='dtc_name'>New Church:</label></td>
							<td colspan=2><select class="form-control" name='ch_id'>
							<option value='0'>N/A</option>	
							<?php
							$fgmembersite->DBlogin();
							 if ($_SESSION['home_settings'] == "1")
                      			{
			                		$query = "SELECT a.ch_id, a.ch_name, b.dtc_name, a.ch_min_id FROM tbl_church a INNER JOIN tbl_district b ON a.ch_dtc_id = b.dtc_id ORDER BY a.ch_name ASC";
					            }elseif ($_SESSION['home_settings'] == "0")
					            {
					            	$query = "SELECT a.ch_id, a.ch_name, b.dtc_name, a.ch_min_id FROM tbl_church a INNER JOIN tbl_district b ON a.ch_dtc_id = b.dtc_id where b.dtc_name = '". $_SESSION['username_of_user'] ."' ORDER BY a.ch_name ASC";
					            }

			                $result = mysqli_query($fgmembersite->connection, $query);

			                if ($result->num_rows > 0)
			                	{
			                    while ($row = $result->fetch_assoc())
			                      {
			                      	if($row['ch_min_id']=="" OR $row['ch_min_id']==0){
			                     	echo "<option value='". $row["ch_id"] ."'>" . $row["ch_name"] . " - " . $row["dtc_name"] . "</option>";	
			                      	}
			                      }
			                    }
						 		         
							?>
								</select></td>
							</div>
						</tr>
					</table>
					<input class="form-control" name='min_id' maxlength="50" value="<?php echo $_GET['minID'] ?>" hidden/>
					<input class="form-control" name='old_ch_id' maxlength="50" value="<?php echo $_GET['chID'] ?>" hidden/>
					<input class="form-control" name='dtc_id' maxlength="50" value="<?php echo $dtcID ?>" hidden/>
						<br><br>

						<input class="btn btn-primary" type='submit' name='submitted' value='Submit'/>
						<input class="btn btn-primary" type="button" onclick="location.href='min_menu.php';" value="Back" />	
				</form>	
			</div>
	  	</div>
	</div>
</div>
<?php
include 'footer.php';
?>