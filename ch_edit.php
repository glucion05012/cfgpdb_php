<?php
include 'header.php';
require_once ("include/membersite_config.php");
$_SESSION["editPage"] = "1";
$_SESSION["menuPage"] = "0";

if(isset($_POST['submitted']))
{	

	$fgmembersite->tablename = 'tbl_church';
 	$fgmembersite->DBlogin();
	$queryd = "SELECT ch_name FROM tbl_church where ch_name = '". $_POST['ch_name'] ."' and ch_dtc_id = '". $_POST['ch_dtc_id'] ."'";
	$duplicate = mysqli_query($fgmembersite->connection, $queryd);

	$queryold = "SELECT ch_name FROM tbl_church where ch_id = '". $_POST['ch_id'] ."'";
	$result = mysqli_query($fgmembersite->connection, $queryold);
	while($row = $result->fetch_assoc()) 
			{
				$resultold = $row["ch_name"];
			}

	if($duplicate->num_rows == 0 or $resultold == $_POST['ch_name'])
	{

	  if($fgmembersite->UpdateChurch())
	   {	

		    echo '<script language="javascript">';
	        echo 'alert("Church successfully updated!"); location.href="ch_menu.php?chDivName='. $_SESSION['chDivName'] .'&chDtcName='. $_SESSION['chDtcName'] .'&chDivID='. $_SESSION['chDivID'] .'&chDtcID='. $_SESSION['chDtcID'] .'"';
	        echo '</script>';
	 			
	   }
	}else
	{
		echo '<script language="javascript">';
	    echo 'alert("Name exist."); location.href="ch_edit.php?churchID='. $_POST['ch_id'] .'&churchName='. $_POST['ch_name'] .'&chDivID='. $_SESSION['chDivID'] .'&chDtcID='. $_SESSION['chDtcID'] .'&chDivName='. $_SESSION['chDivName'] .'&chDtcName='. $_SESSION['chDtcName'] .'"';
	    echo '</script>';
	}
}
		$fgmembersite->tablename = 'tbl_church';
		$fgmembersite->DBlogin();

		$result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_church where ch_id = $_GET[churchID] ");
		while($row = $result->fetch_assoc()) 
			{
				$ch_name = $row["ch_name"];
				$ch_address = $row["ch_address"];
				$ch_contact = $row["ch_contact"];
				$ch_email = $row["ch_email"];
				$ch_soc_acct = $row["ch_soc_acct"];
				$ch_dtc_id = $row["ch_dtc_id"];
				$_SESSION["ch_div_id"] = $row["ch_div_id"];
                $ch_year_est = $row["ch_year_est"];
                $ch_church_his = $row["ch_church_his"];
                $ch_property = $row["ch_property"];
                $ch_property_info = $row["ch_property_info"];
                $ch_property_status = $row["ch_property_status"];
                $ch_other_info = $row["ch_other_info"];
                $ch_status = $row["ch_status"];
                $ch_notes = $row["ch_notes"];
                $_SESSION["oldMinID"] = $row["ch_min_id"];
                $ch_min_id = $row["ch_min_id"];
            }

		$fgmembersite->tablename = 'tbl_division';
		$fgmembersite->DBlogin();
		
		$resultDiv = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_division where div_id = '". $_SESSION["ch_div_id"] ."'");
		if ($resultDiv->num_rows > 0)
			{
			while($row = $resultDiv->fetch_assoc()) 
				{
					$_SESSION["ch_div_name"] = $row["div_name"];
				}
			}

		$_SESSION['chDivName'] = $_GET['chDivName'];
		$_SESSION['chDtcName'] = $_GET['chDtcName'];
		$_SESSION['chDivID'] = $_GET['chDivID'];
		$_SESSION['chDtcID'] = $_GET['chDtcID'];


$ch_name = str_replace("'","&#039;", $ch_name);
?>
<style type="text/css">
	table,th,td
	{
		border:1px solid black;
	}	

</style>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
      	 <li class="breadcrumb-item">
          <?php if ($_SESSION["chDivName"]=="")
					{
						echo "<a href='ch_menu.php?chDivName=-&chDivID=0&chDtcName=". $_SESSION['username_of_user'] ."&chDtcID=". $_SESSION['dtc_id'] ."'><b>Churches</b></a>";
					}
					else
					{
						echo "<a href='ch_menu.php?chDivName=". $_SESSION['chDivName']."&chDivID=". $_SESSION['chDivID'] ."&chDtcName=". $_SESSION['chDtcName'] ."&chDtcID=". $_SESSION['chDtcID'] ."'><b>Churches</b></a>";
					}
					?>
        </li>
        <li class="breadcrumb-item">
          <a href="ch_menu.php?chDivName=<?php echo $_GET['chDivName']; ?>&chDtcName=<?php echo $_GET['chDtcName']; ?>&chDivID=<?php echo $_GET['chDivID']; ?>&chDtcID=<?php echo $_GET['chDtcID']; ?>"><b><?php echo $_GET['chDivName']; ?></b></a>
        </li>
        <li class="breadcrumb-item active"><b>Edit Church</b></li>
      </ol>
      <!-- Example DataTables Card-->
      	<div class="card mb-3">
	        <div class="card-header">
	          <i class="fa fa-home"></i> Church
	        </div>
          	<div class="card-body">
				<form action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post'>

					<table>	
						<tr>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_name'>Church Name:</label></td>
							<td colspan=5><input class="form-control" type='input' name='ch_name' <?php echo "value='". $ch_name ."'"; ?> /></td>
							</div>
						</tr>
						<tr>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_address'>Complete Address:</label></td>
							<td colspan=5><input class="form-control" type='text' name='ch_address' maxlength="1000" <?php echo "value='". $ch_address ."'"; ?> /></td>
						<tr>
						<tr>
							<td bgcolor="gray"><font color="white"><label for='ch_contact'>Contact #:</label></td>
							<td><input class="form-control" type='text' name='ch_contact' maxlength="50" <?php echo "value='". $ch_contact ."'"; ?> /></td>
							<td bgcolor="gray"><font color="white"><label for='ch_email'>Email Add:</label></td>
							<td><input class="form-control" placeholder="email@email.com" type='email' name='ch_email' maxlength="50" <?php echo "value='". $ch_email ."'"; ?> /></td>
							<td bgcolor="gray"><font color="white"><label for='ch_soc_acct'>Social Account:</label></td>
							<td><input class="form-control" type='text' name='ch_soc_acct' maxlength="50" <?php echo "value='". $ch_soc_acct ."'"; ?> /></td>
						</tr>
							
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_dtc_id'>District:</label></td>
							<td colspan=2><select class="form-control" name='ch_dtc_id' id="ch_dtc_id" onchange="showDiv(this.value)">
							<?php 
							$fgmembersite->tablename = 'tbl_district';
							$fgmembersite->DBlogin();
								 $sp_result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_district where dtc_id = '". $ch_dtc_id ."'");
								 
								while($row = $sp_result->fetch_assoc()) 
								{
									$ch_dtc_name = $row["dtc_name"];
								}


								if($_SESSION['home_settings']=="0")
                                      {
                                        if($ch_dtc_name == $_SESSION['username_of_user'])
                                        {
											echo"<option value='". $ch_dtc_id ."' selected>". $ch_dtc_name ."</option>"; 
										}
									  }
									  elseif($_SESSION['home_settings']=="1")
									  {
									  		echo"<option value='". $ch_dtc_id ."' selected>". $ch_dtc_name ."</option>"; 
									  }
						 		         
							?>
								</select></td>
							</div>
							<td>
		    					<div id="txtHint">
	    						</div>
	    					</td>

	    					<td bgcolor="gray"><font color="white"><label for='ch_year_est'>Year Established:</label></td>
							<td><input class="form-control" type='text' name='ch_year_est' maxlength="4" <?php echo "value='". $ch_year_est ."'"; ?>/></td> 	
						</tr>

						<tr>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_church_his'>Church History:</label></td>
							<td colspan=2><textarea class="form-control" type='text' style="height:100px" name='ch_church_his' maxlength="1000" /><?php echo $ch_church_his; ?></textarea></td>
							</div>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_property'>Church Property:</label></td>
							<td colspan=2><textarea class="form-control" type='text' style="height:100px" name='ch_property' maxlength="1000" /><?php echo $ch_property; ?></textarea></td>
							</div>
						</tr>
						<tr>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_property_info'>Property Info:</label></td>
							<td colspan=2><textarea class="form-control" type='text' style="height:100px" name='ch_property_info' maxlength="1000" /><?php echo $ch_property_info; ?></textarea></td>
							</div>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_property_status'>Property Status:</label></td>
							<td colspan=2>
								<select class="form-control" name='ch_property_status'>
									<option value=<?php echo $ch_property_status ?> selected><?php echo $ch_property_status ?></option>
									<option value='Rented'>Rented</option>
									<option value='Owned'>Owned</option>
									<option value='Free Use'>Free Use</option>
								</select>
							</td>
						</div>	
						</tr>
						<tr>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_other_info'>Other Info:</label></td>
							<td colspan=2><textarea class="form-control" type='text' style="height:100px" name='ch_other_info' maxlength="1000" /><?php echo $ch_other_info; ?></textarea></td>
							</div>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_notes'>Notes:</label></td>
							<td colspan=2><textarea class="form-control" type='text' style="height:100px" name='ch_notes' maxlength="1000" /><?php echo $ch_notes; ?></textarea></td>
							</div>
						</tr>
						<tr>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_min_id'>Senior Pastor:</label></td>
							<td colspan=2>
								<select class="form-control" name='ch_min_id'>
									<option value=''>N/A</option>
									<?php 
									$fgmembersite->tablename = 'tbl_minister';
									$fgmembersite->DBlogin();
										 $min_result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_minister where min_ch_id = '". $_GET[churchID] ."'");

										if ($min_result->num_rows > 0)
					                	{
											while($row = $min_result->fetch_assoc()) 
											{
												$ch_min_name = $row["min_fullname"];
											}
											echo"<option value='". $ch_min_id ."' selected>". $ch_min_name ."</option>";
										}
										else
										{
											echo"<option value='' selected>N/A</option>";
										}	

									 
							

									$fgmembersite->DBlogin();
					                if($_SESSION['home_settings']=="0")
  {
      $dtcquery = "SELECT * FROM tbl_district where dtc_name = '". $_SESSION['username_of_user'] ."'";
      $dtcresult = mysqli_query($fgmembersite->connection, $dtcquery);
      while ($row = $dtcresult->fetch_assoc())
      {
        $dtcID = $row['dtc_id'];
      }

      $query = "SELECT * FROM tbl_minister where min_ch_id = '0' AND min_dtc_id = '". $dtcID ."'";
    
  }
  elseif($_SESSION['home_settings']=="1")
  {
    $query = "SELECT * FROM tbl_minister where min_ch_id = '0'";
  }
					                $result = mysqli_query($fgmembersite->connection, $query);

					                if ($result->num_rows > 0)
					                	{
					                    while ($row = $result->fetch_assoc())
					                      {
					                     	echo "<option value='". $row["min_id"] ."'>" . $row["min_fullname"] . "</option>";
					                      }
					                    }
								 		         
									?>
								</select>
							</td>
						</div>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_status'>Status:</label></td>
							<td colspan=2>
								<select class="form-control" name='ch_status'>
									<option value=<?php echo $ch_status ?> selected><?php echo $ch_status ?></option>
									<option value='Active'>Active</option>
									<option value='Inactive'>Inactive</option>
								</select>
							</td>
						</div>
						</tr>
					</table>
						<br><br>
						<input value=<?php echo $_GET['churchID'] ?> style='width:300px' type='hidden' name='ch_id' maxlength='50'/>
						<input class="btn btn-primary" type='submit' name='submitted' value='Submit' onclick="return confirm('Are you sure you want to update Church?')"/>
				</form>	
			</div>
	  	</div>
	</div>
</div>
<?php
include 'footer.php';
?>