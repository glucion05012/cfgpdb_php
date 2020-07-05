<?php
include 'header.php';
require_once ("include/membersite_config.php");

if(isset($_POST['submitted']))
{
	//page 1 variables on SESSION
	$_SESSION['ch_mem_fullname'] = $_POST['ch_mem_fullname'];
	$_SESSION['ch_mem_address'] = $_POST['ch_mem_address'];
	$_SESSION['ch_mem_bday'] = $_POST['ch_mem_bday'];
	$_SESSION['ch_mem_bplace'] = $_POST['ch_mem_bplace'];
	$_SESSION['ch_mem_citizenship'] = $_POST['ch_mem_citizenship'];
	$_SESSION['ch_mem_sss'] = $_POST['ch_mem_sss'];
	$_SESSION['ch_mem_tin'] = $_POST['ch_mem_tin'];
	$_SESSION['ch_mem_gender'] = $_POST['ch_mem_gender'];
	$_SESSION['ch_mem_cstatus'] = $_POST['ch_mem_cstatus'];
	$_SESSION['ch_mem_occupation'] = $_POST['ch_mem_occupation'];
	$_SESSION['ch_mem_business'] = $_POST['ch_mem_business'];
	$_SESSION['ch_mem_contact'] = $_POST['ch_mem_contact'];
	$_SESSION['ch_mem_email'] = $_POST['ch_mem_email'];
	
	//spouse
	$_SESSION['sp_fullname'] = $_POST['sp_fullname'];
	$_SESSION['sp_bday'] = $_POST['sp_bday'];
	$_SESSION['sp_date_marriage'] = $_POST['sp_date_marriage'];
	$_SESSION['sp_place_marriage'] = $_POST['sp_place_marriage'];
	

	$fgmembersite->tablename = 'tbl_ch_member';
 	$fgmembersite->DBlogin();
	$queryd = "SELECT ch_mem_fullname FROM tbl_ch_member where ch_mem_fullname = '". $_POST['ch_mem_fullname'] ."'";
	$duplicate = mysqli_query($fgmembersite->connection, $queryd);

	$queryold = "SELECT ch_mem_fullname FROM tbl_ch_member where ch_mem_id = '". $_POST['memID'] ."'";
	$result = mysqli_query($fgmembersite->connection, $queryold);
	while($row = $result->fetch_assoc()) 
			{
				$resultold = $row["ch_mem_fullname"];
			}

	if($duplicate->num_rows == 0 or $resultold == $_SESSION['ch_mem_fullname'])
	{
		echo '<script language="javascript">';
    	echo 'location.href="ch_mem_edit_page2.php?churchID='. $_POST['churchID'] .'&churchName='. $_POST['churchName'] .'&memID='. $_POST['memID'] .'&chDivName='. $_SESSION['chDivName'] .'&chDtcName='. $_SESSION['chDtcName'] .'&chDivID='. $_SESSION['chDivID'] .'&chDtcID='. $_SESSION['chDtcID'] .'"';
    	echo '</script>';
	}else
	{
		echo '<script language="javascript">';
	    echo 'alert("Name exist."); location.href="ch_mem_edit.php?churchID='. $_POST['churchID'] .'&churchName='. $_POST['churchName'] .'&memID='. $_POST['memID'] .'&chDivName='. $_SESSION['chDivName'] .'&chDtcName='. $_SESSION['chDtcName'] .'&chDivID='. $_SESSION['chDivID'] .'&chDtcID='. $_SESSION['chDtcID'] .'"';
	    echo '</script>';
	}

   
   
}
else if(isset($_POST['back']))
{
	echo '<script language="javascript">';
    echo 'location.href="ch_mem_menu.php?churchID='. $_POST['churchID'] .'&churchName='. $_POST['churchName'] .'&chDivName='. $_SESSION['chDivName'] .'&chDtcName='. $_SESSION['chDtcName'] .'&chDivID='. $_SESSION['chDivID'] .'&chDtcID='. $_SESSION['chDtcID'] .'"';
    echo '</script>';
}

$fgmembersite->tablename = 'tbl_ch_member';
		$fgmembersite->DBlogin();
		if(isset($_GET['memID'])){
			 $result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_ch_member where ch_mem_id = $_GET[memID]");
			 
			while($row = $result->fetch_assoc()) 
			{
				$ch_mem_fullname = $row["ch_mem_fullname"];
				$ch_mem_address = $row["ch_mem_address"];
				$ch_mem_bday = $row["ch_mem_bday"];
				$ch_mem_bplace = $row["ch_mem_bplace"];
				$ch_mem_citizenship = $row["ch_mem_citizenship"];
				$ch_mem_sss = $row["ch_mem_sss"];
				$ch_mem_tin = $row["ch_mem_tin"];
                $ch_mem_gender = $row["ch_mem_gender"];
                $ch_mem_cstatus = $row["ch_mem_cstatus"];
                $ch_mem_occupation = $row["ch_mem_occupation"];
                $ch_mem_business = $row["ch_mem_business"];
                $ch_mem_contact = $row["ch_mem_contact"];
                $ch_mem_email = $row["ch_mem_email"];

                if($ch_mem_cstatus != "Single")
		        {
				$fgmembersite->tablename = 'tbl_ch_mem_spouse';
				$fgmembersite->DBlogin();
					 $sp_result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_ch_mem_spouse where sp_mem_id = $_GET[memID]");
					 
					while($row = $sp_result->fetch_assoc()) 
					{
						  $sp_fullname = $row["sp_fullname"];
						  $sp_bday =  $row["sp_bday"];
						  $sp_date_marriage = $row["sp_date_marriage"];
						  $sp_place_marriage =  $row["sp_place_marriage"];
					 }
				} else
				{
						  $sp_fullname ="";
						  $sp_bday = "";
						  $sp_date_marriage = "";
						  $sp_place_marriage = "";				  
				}
			}
		}

		$_SESSION['chDivName'] = $_GET['chDivName'];
		$_SESSION['chDtcName'] = $_GET['chDtcName'];
		$_SESSION['chDivID'] = $_GET['chDivID'];
		$_SESSION['chDtcID'] = $_GET['chDtcID'];
?>
<style type='text/css'>
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
        <li class="breadcrumb-item">
          <a href="ch_mem_menu.php?churchID=<?php echo $_GET['churchID']; ?>&churchName=<?php echo $_GET['churchName']; ?>&chDivName=<?php echo $_GET['chDivName']; ?>&chDtcName=<?php echo $_GET['chDtcName']; ?>&chDivID=<?php echo $_GET['chDivID']; ?>&chDtcID=<?php echo $_GET['chDtcID']; ?>"><b><?php echo $_GET['churchName']; ?></b></a>
        </li>
        <li class="breadcrumb-item active"><b>Edit Church Member</b></li>
      </ol>
      <!-- Example DataTables Card-->
      	<div class="card mb-3">
	        <div class="card-header">
	          <i class="fa fa-home"></i> Member's Profile
	        </div>
          	<div class="card-body">
				<form action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post'>

					<table align="center">
						<tr>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_mem_fullname'>Full Name:</label></td>
							<td colspan='9'><input class="form-control" placeholder="Family, First Middle" type='text' name='ch_mem_fullname' maxlength="50" 
								<?php
								if($_SESSION['back1'] == "0")
								{
									echo "value='". $ch_mem_fullname ."'/></td>";
								}
								elseif($_SESSION['back1'] == "1")
								{
									echo "value='". $_SESSION['ch_mem_fullname'] ."'/></td>";
								}
								?>
							</div>
						</tr>
						<tr>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_mem_address'>Complete Address:</label></td>
							<td colspan='9'><input class="form-control" placeholder="Lot No.	 Blk No/House No.  		Street  Village/Subdivision  		Barangay  	City" type='text' name='ch_mem_address' maxlength="1000" 
								<?php
								if($_SESSION['back1'] == "0")
								{
									echo "value='". $ch_mem_address ."'/></td>";
								}
								elseif($_SESSION['back1'] == "1")
								{
									echo "value='". $_SESSION['ch_mem_address'] ."'/></td>";
								}
								?>
							</div>
						</tr>
						<tr>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_mem_bday'>Birthday:</label></td>
							<td><input class="form-control" type='date' name='ch_mem_bday' maxlength="50" 
								<?php
								if($_SESSION['back1'] == "0")
								{
									echo "value='". $ch_mem_bday ."'/></td>";
								}
								elseif($_SESSION['back1'] == "1")
								{
									echo "value='". $_SESSION['ch_mem_bday'] ."'/></td>";
								}
								?>
							</div>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_mem_bplace'>Birthplace:</label></td>
							<td><input class="form-control" type='text' name='ch_mem_bplace' maxlength="50" 
								<?php
								if($_SESSION['back1'] == "0")
								{
									echo "value='". $ch_mem_bplace ."'/></td>";
								}
								elseif($_SESSION['back1'] == "1")
								{
									echo "value='". $_SESSION['ch_mem_bplace'] ."'/></td>";
								}
								?>
							</div>		
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_mem_citizenship'>Citizenship:</label></td>
							<td><input class="form-control" type='text' name='ch_mem_citizenship' maxlength="50" 
								<?php
								if($_SESSION['back1'] == "0")
								{
									echo "value='". $ch_mem_citizenship ."'/></td>";
								}
								elseif($_SESSION['back1'] == "1")
								{
									echo "value='". $_SESSION['ch_mem_citizenship'] ."'/></td>";
								}
								?>
							</div>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_mem_sss'>GSIS/SSS No.:</label></td>
							<td><input class="form-control" type='text' name='ch_mem_sss' maxlength="50" 
								<?php
								if($_SESSION['back1'] == "0")
								{
									echo "value='". $ch_mem_sss ."'/></td>";
								}
								elseif($_SESSION['back1'] == "1")
								{
									echo "value='". $_SESSION['ch_mem_sss'] ."'/></td>";
								}
								?>
							</div>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_mem_tin'>TIN No.:</label></td>
							<td><input class="form-control" type='text' name='ch_mem_tin' maxlength="50" 
								<?php
								if($_SESSION['back1'] == "0")
								{
									echo "value='". $ch_mem_tin ."'/></td>";
								}
								elseif($_SESSION['back1'] == "1")
								{
									echo "value='". $_SESSION['ch_mem_tin'] ."'/></td>";
								}
								?>
							</div>
						</tr>
						<tr>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_mem_gender'>Gender:</label></td>
							<td><select class="form-control" name='ch_mem_gender'>
								<?php
								if($_SESSION['back1'] == "0")
								{
									echo "<option value='". $ch_mem_gender ."' selected>". $ch_mem_gender ."</option>";
								}
								elseif($_SESSION['back1'] == "1")
								{
									echo "<option value='". $_SESSION['ch_mem_gender'] ."' selected>". $_SESSION['ch_mem_gender'] ."</option>";
								}
								?>
							<option value='Male'>Male</option>
							<option value='Female'>Female</option>
							</select></td>
							</div>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_mem_cstatus'>Civil Status:</label></td>
							<td><select id="cstatus" class="form-control" name='ch_mem_cstatus'>
								<?php
								if($_SESSION['back1'] == "0")
								{
									echo "<option value='". $ch_mem_cstatus ."' selected>". $ch_mem_cstatus ."</option>";
								}
								elseif($_SESSION['back1'] == "1")
								{
									echo "<option value='". $_SESSION['ch_mem_cstatus'] ."' selected>". $_SESSION['ch_mem_cstatus'] ."</option>";
								}
								?>
							<option value='Single'>Single</option>
							<option value='Married'>Married</option>
							<option value='Widow/er'>Widow/er</option>
							<option value='Single Parent'>Single Parent</option>
							<option value='Separated'>Separated</option>
							<option value='Annulled'>Annulled</option>
							</select></td>
							</div>
						</tr>
						<tr>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_mem_occupation'>Occupation:</label></td>
							<td><input class="form-control" type='text' name='ch_mem_occupation' maxlength="50" 	<?php
								if($_SESSION['back1'] == "0")
								{
									echo "value='". $ch_mem_occupation ."'/></td>";
								}
								elseif($_SESSION['back1'] == "1")
								{
									echo "value='". $_SESSION['ch_mem_occupation'] ."'/></td>";
								}
								?>
							</div>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_mem_business'>Company/Business Name:</label></td>
							<td colspan="3"><input class="form-control" type='text' name='ch_mem_business' maxlength="50" 
								<?php
								if($_SESSION['back1'] == "0")
								{
									echo "value='". $ch_mem_business ."'/></td>";
								}
								elseif($_SESSION['back1'] == "1")
								{
									echo "value='". $_SESSION['ch_mem_business'] ."'/></td>";
								}
								?>
							</div>
						</tr>
						<tr>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_mem_contact'>Contact No.:</label></td>
							<td><input class="form-control" type='text' name='ch_mem_contact' maxlength="50" 
								<?php
								if($_SESSION['back1'] == "0")
								{
									echo "value='". $ch_mem_contact ."'/></td>";
								}
								elseif($_SESSION['back1'] == "1")
								{
									echo "value='". $_SESSION['ch_mem_contact'] ."'/></td>";
								}
								?>
							</div>
							<div>
							<td bgcolor="gray"><font color="white"><label for='ch_mem_email'>Email Address:</label></td>
							<td colspan="3"><input class="form-control" type='email' name='ch_mem_email' maxlength="50" 
								<?php
								if($_SESSION['back1'] == "0")
								{
									echo "value='". $ch_mem_email ."'/></td>";
								}
								elseif($_SESSION['back1'] == "1")
								{
									echo "value='". $_SESSION['ch_mem_email'] ."'/></td>";
								}
								?>
							</div>
						</tr>
					</table>

					<br><br>
					<table>
						<!--SPOUSE-->
						<tr>
						<td><label><font color=red>*If married</font></label></td>
						</tr>
						<tr>
						<td><label><b>Spouse Information</b></label></td>
						</tr>
						<div>	
							<tr>
								<div>
								<td bgcolor="gray"><font color="white"><label for='sp_fullname'>Full Name:</label></td>
								<td><input class="form-control" placeholder="First Initial Last" type='text' id="sp_fullname_input" name='sp_fullname' maxlength="50" 
								<?php
								if($_SESSION['back1'] == "0")
								{
									echo "value='". $sp_fullname ."'";
									if ($ch_mem_cstatus == "Single") { echo "disabled"; }
								}
								elseif($_SESSION['back1'] == "1")
								{
									echo "value='". $_SESSION['sp_fullname'] ."'";
									if ($_SESSION['ch_mem_cstatus'] == "Single") { echo "disabled"; }
								}
								
								?>
								/></td>	
								</div>
								<div>
								<td bgcolor="gray"><font color="white"><label for='sp_bday'>Birthday:</label></td>
								<td><input class="form-control" type='date' id="sp_bday_input" name='sp_bday' maxlength="50" 
								<?php
								if($_SESSION['back1'] == "0")
								{
									echo "value='". $sp_bday ."'";
									if ($ch_mem_cstatus == "Single") { echo "disabled"; }
								}
								elseif($_SESSION['back1'] == "1")
								{
									echo "value='". $_SESSION['sp_bday'] ."'";
									if ($_SESSION['ch_mem_cstatus'] == "Single") { echo "disabled"; }
								}
								
								?>
								/></td>
								</div>
							</tr>
							<tr>
								<td bgcolor="gray"><font color="white"><label for='sp_date_marriage'>Date of Marriage:</label></td>
								<td><input class="form-control" type='date' id="sp_date_marriage" name='sp_date_marriage' maxlength="50" 
								<?php
								if($_SESSION['back1'] == "0")
								{
									echo "value='". $sp_date_marriage ."'";
									if ($ch_mem_cstatus == "Single") { echo "disabled"; }
								}
								elseif($_SESSION['back1'] == "1")
								{
									echo "value='". $_SESSION['sp_date_marriage'] ."'";
									if ($_SESSION['ch_mem_cstatus'] == "Single") { echo "disabled"; }
								}
								
								?>
								/></td>
								<td bgcolor="gray"><font color="white"><label for='sp_place_marriage'>Place of Marriage:</label></td>
								<td><input class="form-control" type='text' id="sp_place_marriage" name='sp_place_marriage' maxlength="50" 
								<?php
								if($_SESSION['back1'] == "0")
								{
									echo "value='". $sp_place_marriage ."'";
									if ($ch_mem_cstatus == "Single") { echo "disabled"; }
								}
								elseif($_SESSION['back1'] == "1")
								{
									echo "value='". $_SESSION['sp_place_marriage'] ."'";
									if ($_SESSION['ch_mem_cstatus'] == "Single") { echo "disabled"; }
								}
								
								?>
									/></td>
							</tr>
						</div>
						<!--SPOUSE END-->
					</table>
						<br><br>
						<input class="form-control" name='churchID' maxlength="50" value="<?php echo $_GET['churchID'] ?>" hidden/>
						<input class="form-control" name='churchName' maxlength="50" value="<?php echo $_GET['churchName'] ?>" hidden/>
						<input class="form-control" name='memID' maxlength="50" value="<?php echo $_GET['memID'] ?>" hidden/>
						<input class="btn btn-primary" type='submit' name='submitted' value='Next'/>
						<input class="btn btn-primary" type='submit' name='back' value='Back'/>	
				</form>	
			</div>
	  	</div>
	</div>
</div>
<?php
include 'footer.php';
?>