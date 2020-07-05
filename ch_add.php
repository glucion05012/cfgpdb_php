<?php
include 'header.php';
require_once ("include/membersite_config.php");
$_SESSION["editPage"] = "0";
$_SESSION["menuPage"] = "0";
if(isset($_POST['submitted']))
{

	$_SESSION['ch_name'] = $_POST['ch_name'];
	$_SESSION['ch_address'] = $_POST['ch_address'];
	$_SESSION['ch_contact'] = $_POST['ch_contact'];
	$_SESSION['ch_email'] = $_POST['ch_email'];
	$_SESSION['ch_soc_acct'] = $_POST['ch_soc_acct'];
	$_SESSION['ch_dtc_id'] = $_POST['ch_dtc_id'];
	$fgmembersite->tablename = 'tbl_district';
		$fgmembersite->DBlogin();
		$result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_district where dtc_id = '". $_SESSION['ch_dtc_id'] ."'");
		while($row = $result->fetch_assoc()) 
			{
				$_SESSION["ch_dtc_name"] = $row["dtc_name"];
			}
	
 	$_SESSION['ch_div_id'] = $_POST['chDivID'];
  	$fgmembersite->tablename = 'tbl_division';
		$fgmembersite->DBlogin();
		$result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_division where div_id = '". $_SESSION['ch_div_id'] ."'");
		while($row = $result->fetch_assoc()) 
			{
				$_SESSION["ch_div_name"] = $row["div_name"];
			}
	
	$_SESSION['ch_year_est'] = $_POST['ch_year_est'];
	$_SESSION['ch_church_his'] = $_POST['ch_church_his'];
	$_SESSION['ch_property'] = $_POST['ch_property'];
	$_SESSION['ch_property_info'] = $_POST['ch_property_info'];
	$_SESSION['ch_pStatus'] = $_POST['ch_pStatus'];
	$_SESSION['ch_other_info'] = $_POST['ch_other_info'];
	$_SESSION['ch_notes'] = $_POST['ch_notes'];
	$_SESSION['ch_min_id'] = $_POST['ch_min_id'];
	$fgmembersite->tablename = 'tbl_minister';
		$fgmembersite->DBlogin();
		$result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_minister where min_id = '". $_SESSION['ch_min_id'] ."'");
		while($row = $result->fetch_assoc()) 
			{
				$_SESSION["ch_min_name"] = $row["min_fullname"];
			}

	$_SESSION['ch_status'] = $_POST['ch_status'];

    //if no division selected
    if($_POST['ch_div_id'] == 0)
    {
        echo '<script language="javascript">';
        echo 'alert("Please select division!"); location.href="ch_add.php?chDivID='. $_SESSION['chDivID'] .'&chDtcID='. $_SESSION['chDtcID'] .'&chDtcName='. $_SESSION['chDtcName'] .'&chDivName='. $_SESSION['chDivName'] .'"';
        echo '</script>';
    }else
    {

    $fgmembersite->tablename = 'tbl_church';
 	$fgmembersite->DBlogin();
	$queryd = "SELECT ch_name FROM tbl_church where ch_name = '". $_POST['ch_name'] ."' and ch_dtc_id = '". $_SESSION['ch_dtc_id'] ."'";
	$duplicate = mysqli_query($fgmembersite->connection, $queryd);

	if($duplicate->num_rows == 0)
	{
		if($fgmembersite->InsertChurch())
       {
    
    	    echo '<script language="javascript">';
            echo 'alert("Church successfully added!"); location.href="ch_menu.php?chDivID='. $_SESSION['chDivID'] .'&chDtcID='. $_SESSION['chDtcID'] .'&chDtcName='. $_SESSION['chDtcName'] .'&chDivName='. $_SESSION['chDivName'] .'"';
            echo '</script>';
     			
       }
	}else
	{
		$_SESSION['chDivID'] = 0;
    	$_SESSION['chDivName'] = "SELECT";
		echo '<script language="javascript">';
	    echo 'alert("Name exist."); location.href="ch_add.php?chDivID='. $_SESSION['chDivID'] .'&chDtcID='. $_SESSION['chDtcID'] .'&chDtcName='. $_SESSION['chDtcName'] .'&chDivName='. $_SESSION['chDivName'] .'"';
	    echo '</script>';
	}

    }
  
}

		$fgmembersite->tablename = 'tbl_district';
		$fgmembersite->DBlogin();
		$result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_district ORDER BY dtc_id LIMIT 1");
		while($row = $result->fetch_assoc()) 
			{
				$_SESSION["dtc_id"] = $row["dtc_id"];
			}

		$fgmembersite->tablename = 'tbl_division';
		$fgmembersite->DBlogin();	
		$resultDiv = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_division where div_dtc_id = '". $_SESSION["dtc_id"] ."'");
		if ($resultDiv->num_rows > 0)
			{
			while($row = $resultDiv->fetch_assoc()) 
				{
					$_SESSION["ch_div_name"] = $row["div_name"];
					$_SESSION["ch_div_id"] = $row["div_id"];
				}
			}

			$_SESSION["chDivName"] = $_GET["chDivName"];
			$_SESSION["chDivID"] = $_GET["chDivID"];
			$_SESSION["chDtcName"] = $_GET["chDtcName"];
			$_SESSION["chDtcID"] = $_GET["chDtcID"];

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
        		echo "<a href='ch_menu.php?chDivName=-&chDivID=0&chDtcName=". $_SESSION['username_of_user'] ."&chDtcID=". $_SESSION['dtc_id'] ."'><b>Church</b></a>";
        	}
        	else
        	{
        		echo "<a href='ch_menu.php?chDivName=". $_SESSION['chDivName']."&chDivID=". $_SESSION['chDivID'] ."&chDtcName=". $_SESSION['chDtcName'] ."&chDtcID=". $_SESSION['chDtcID'] ."'><b>Church</b></a>";
        	}
        	?>
        </li>
        <li class="breadcrumb-item active"><b>Add Church</b></li>
      </ol>
      <!-- Example DataTables Card-->
      	<div class="card mb-3">
	        <div class="card-header">
	          <i class="fa fa-home"></i> <b>Church</b>
	        </div>
          	<div class="card-body">
				<form action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post'>

					<table border=1>
						<tr>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_name'>Church Name:</label></td>
							<td colspan=5><input class="form-control" type='input' name='ch_name' value="<?php echo $_SESSION['ch_name'] ?>" required/></td>
							</div>
						</tr>
						<tr>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_address'>Complete Address:</label></td>
							<td colspan=5><input class="form-control" type='text' name='ch_address' maxlength="1000" value="<?php echo $_SESSION['ch_address'] ?>"/></td>
						</tr>
						<tr>
							<td bgcolor="gray"><font color="white"><label for='ch_contact'>Contact #:</label></td>
							<td><input class="form-control" type='text' name='ch_contact' maxlength="50" value="<?php echo $_SESSION['ch_contact'] ?>"/></td>
							<td bgcolor="gray"><font color="white"><label for='ch_email'>Email Add:</label></td>
							<td><input class="form-control" placeholder="email@email.com" type='email' name='ch_email' maxlength="50" value="<?php echo $_SESSION['ch_email'] ?>"/></td>
							<td bgcolor="gray"><font color="white"><label for='ch_soc_acct'>Social Account:</label></td>
							<td><input class="form-control" type='text' name='ch_soc_acct' maxlength="50" value="<?php echo $_SESSION['ch_soc_acct'] ?>"/></td>
						</tr>
							
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_dtc_id'>District:</label></td>
							<td colspan=2><select class="form-control" name='ch_dtc_id' id="ch_dtc_id" onchange="showDiv(this.value)">
								<option value='<?php echo $_SESSION['ch_dtc_id'] ?>' selected><?php echo $_SESSION['ch_dtc_name'] ?></option>
							<?php
							$fgmembersite->DBlogin();
			                $query = "SELECT * FROM tbl_district ";
			                $result = mysqli_query($fgmembersite->connection, $query);

			                if ($result->num_rows > 0)
			                	{
			                    while ($row = $result->fetch_assoc())
			                      {
			                      	$dtc_id = $row["dtc_id"];
			                     	
			                     	if($_SESSION['home_settings']=="0")
                                      {
                                        if($row["dtc_name"] == $_SESSION['username_of_user'])
                                        {
			                     			echo "<option value='". $row["dtc_id"] ."'>" . $row["dtc_name"] . "</option>";
			                     			$_SESSION['chDtcID'] = $row["dtc_id"];
			                      		}
			                      	  }
			                      	elseif($_SESSION['home_settings']=="1")
			                      	{
			                      		echo "<option value='". $row["dtc_id"] ."'>" . $row["dtc_name"] . "</option>";
			                      	}
			                      }
			                    }
						 		         
							?>
								</select></td>
							</div>
								
							<td>
							<?php
		    					if($_SESSION["home_settings"] == "1")
		    					{
		    						echo"
		    						<div id='txtHint'>
	    							</div>";	
		    					} 
		    					elseif($_SESSION["home_settings"] == "0")
		    					{
									$fgmembersite->DBlogin();
									$result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_division WHERE div_dtc_id = '".$_SESSION['chDtcID']."'");
									echo "<table><td bgcolor='gray'><font color='white'><label for='ch_div_id'>Division:</label></td>
									    <td><select class='form-control' name='ch_div_id'>
									    ";
									    if ($_SESSION['chDivName']!="")
									    {
											echo"<option value='". $_SESSION["chDivID"] ."' selected>" . $_SESSION["chDivName"] . "</option>";
									    }
										
										if ($result->num_rows > 0)
									    {
									    while ($row = $result->fetch_assoc())
									      {
									        echo "<option value='". $row["div_id"] ."'>" . $row["div_name"] . "</option>";
									      }
									    }

									echo "</select></td></table>";
		    					}
	    					?>
	    					</td>

	    					<td bgcolor="gray"><font color="white"><label for='ch_year_est'>Year Established:</label></td>
							<td><input class="form-control" type='text' name='ch_year_est' maxlength="4" value="<?php echo $_SESSION['ch_year_est'] ?>"/></td> 	
						</tr>

						<tr>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_church_his'>Church History:</label></td>
							<td colspan=2><textarea class="form-control" type='text' style="height:100px" name='ch_church_his' maxlength="1000" /><?php echo $_SESSION['ch_church_his'] ?></textarea></td>
							</div>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_property'>Church Property:</label></td>
							<td colspan=2><textarea class="form-control" type='text' style="height:100px" name='ch_property' maxlength="1000" /><?php echo $_SESSION['ch_property'] ?></textarea></td>
							</div>
						</tr>
						<tr>

							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_property_info'>Property Info:</label></td>
							<td colspan=2><textarea class="form-control" type='text' style="height:100px" name='ch_property_info' maxlength="1000" /><?php echo $_SESSION['ch_property_info'] ?></textarea></td>
							</div>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_pStatus'>Property Status:</label></td>
							<td colspan=2>
								<select class="form-control" name='ch_pStatus'>
									<option value='<?php echo $_SESSION['ch_pStatus'] ?>' selected><?php echo $_SESSION['ch_pStatus'] ?></option>
									<option value='Rented' selected="">Rented</option>
									<option value='Owned'>Owned</option>
									<option value='Free Use'>Free Use</option>
								</select>
							</td>
							</div>
							<div>
						</tr>
						<tr>
							
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_other_info'>Other Info:</label></td>
							<td colspan=2><textarea class="form-control" type='text' style="height:100px" name='ch_other_info' maxlength="1000" /><?php echo $_SESSION['ch_other_info'] ?></textarea></td>
							</div>
							<td bgcolor="gray"><font color="white"><label for='ch_notes'>Notes:</label></td>
							<td colspan=2><textarea class="form-control" type='text' style="height:100px" name='ch_notes' maxlength="1000" /><?php echo $_SESSION['ch_notes'] ?></textarea></td>
							</div>

							
						</tr>
						<tr>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_min_id'>Senior Pastor:</label></td>
							<td colspan=2><select class="form-control" name='ch_min_id'>	
							<option value=''>N/A</option>
							<option value='<?php echo $_SESSION['ch_min_id'] ?>' selected><?php echo $_SESSION['ch_min_name'] ?></option>
							<?php
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
								</select></td>
							</div>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_status'>Status:</label></td>
							<td colspan=2>
								<select class="form-control" name='ch_status'>
									<option value='<?php echo $_SESSION['ch_status'] ?>' selected><?php echo $_SESSION['ch_status'] ?></option>
									<option value='Active'>Active</option>
									<option value='Inactive'>Inactive</option>
								</select>
							</td>
							</div>
						</tr>
					</table>
						<br><br>

						<input class="btn btn-primary" type='submit' name='submitted' value='Save' />
						<?php if ($_SESSION["chDivName"]=="")
						{
							echo "<a class='btn btn-primary' href='ch_menu.php?chDivName=-&chDivID=0&chDtcName=". $_SESSION['username_of_user'] ."&chDtcID=". $_SESSION['dtc_id'] ."'>Back</a>";
						}
						else
						{
							echo "<a class='btn btn-primary' href='ch_menu.php?chDivName=". $_SESSION['chDivName']."&chDivID=". $_SESSION['chDivID'] ."&chDtcName=". $_SESSION['chDtcName'] ."&chDtcID=". $_SESSION['chDtcID'] ."'>Back</a>";
						}
						?>
				</form>	
			</div>
	  	</div>
	</div>
</div>
<?php
include 'footer.php';
?>