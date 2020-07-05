<?php
//ENABLE DISABLE SPOUSE ON DROPDOWN CHANGE

include 'header.php';
require_once ("include/membersite_config.php");


if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}


if(isset($_POST['submitted']))
{

		

	//$_SESSION['min_dtc_name'] = "'SELECT'";
	//page 1 variables on SESSION
	$_SESSION['fullname'] = $_POST['fullname'];
	$_SESSION['nickname'] = $_POST['nickname'];
	$_SESSION['bday'] = $_POST['bday'];
	$_SESSION['address'] = $_POST['address'];
	$_SESSION['bplace'] = $_POST['bplace'];
	$_SESSION['citizenship'] = $_POST['citizenship'];
	$_SESSION['occupation'] = $_POST['occupation'];
	$_SESSION['contact'] = $_POST['contact'];
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['cstatus'] = $_POST['cstatus'];
	$_SESSION['gender'] = $_POST['gender'];
	$_SESSION['category'] = $_POST['category'];
	$_SESSION['cnumber'] = $_POST['cnumber'];
	$_SESSION['yearordained'] = $_POST['yearordained'];
	$_SESSION['language'] = $_POST['language'];
	$_SESSION['tin'] = $_POST['tin'];
	$_SESSION['sss'] = $_POST['sss'];
	$_SESSION['bloodtype'] = $_POST['bloodtype'];
	$_SESSION['spiritualgift'] = $_POST['spiritualgift'];
	$_SESSION['skills'] = $_POST['skills'];
	$_SESSION['hobbies'] = $_POST['hobbies'];
	$_SESSION['health'] = $_POST['health'];
	$_SESSION['otherinfo'] = $_POST['otherinfo'];
	$_SESSION['min_dtc_id'] = $_POST['min_dtc_id'];
	$fgmembersite->tablename = 'tbl_district';
		$fgmembersite->DBlogin();
		$result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_district where dtc_id = '". $_SESSION['min_dtc_id'] ."'");
		while($row = $result->fetch_assoc()) 
			{
				$_SESSION["min_dtc_name"] = $row["dtc_name"];
			}
	$_SESSION['min_status'] = $_POST['min_status'];
	//spouse
	$_SESSION['sp_fullname'] = $_POST['sp_fullname'];
	$_SESSION['sp_nickname'] = $_POST['sp_nickname'];
	$_SESSION['sp_bday'] = $_POST['sp_bday'];
	$_SESSION['sp_date_marriage'] = $_POST['sp_date_marriage'];
	$_SESSION['sp_citizenship'] = $_POST['sp_citizenship'];
	$_SESSION['sp_occupation'] = $_POST['sp_occupation'];
	$_SESSION['sp_contact'] = $_POST['sp_contact'];
	$_SESSION['sp_email'] = $_POST['sp_email'];


	$fgmembersite->tablename = 'tbl_minister';
 	$fgmembersite->DBlogin();
	$queryd = "SELECT min_fullname FROM tbl_minister where min_fullname = '". $_POST['fullname'] ."'";
	$duplicate = mysqli_query($fgmembersite->connection, $queryd);

	if($duplicate->num_rows == 0)
	{
		echo '<script language="javascript">';
	    echo 'location.href="min_add_page2.php"';
	    echo '</script>';
	}else
	{
		echo '<script language="javascript">';
	    echo 'alert("Name exist."); location.href="min_add.php"';
	    echo '</script>';
	}
	
    
}
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
          <a href="min_menu.php"><b>Minister</b></a>
        </li>
        <li class="breadcrumb-item active"><b>Add Minister</b></li>
      </ol>
      <!-- Example DataTables Card-->
      	<div class="card mb-3">
	        <div class="card-header">
	          <i class="fa fa-home"></i> Minister
	        </div>
          	<div class="card-body">
				<form action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post'>

					<table align="center" border=1>
						<tr>
							<div>
							<td bgcolor="gray"><font color="white"><label for='fullname'>Full Name:</label></td>
							<td><input class="form-control" placeholder="Family, First Middle" type='text' name='fullname' maxlength="50" value="<?php echo $_SESSION['fullname'] ?>" required/></td>
							</div>
							<div>
							<td bgcolor="gray"><font color="white"><label for='nickname'>Nickname:</label></td>
							<td><input class="form-control" type='text' name='nickname' maxlength="50" value="<?php echo $_SESSION['nickname'] ?>"/></td>
							</div>
							<div>
							<td bgcolor="gray"><font color="white"><label for='bday'>Birthday:</label></td>
							<td><input class="form-control" type='date' name='bday' maxlength="50" value="<?php echo $_SESSION['bday'] ?>"/></td>
							</div>				
						</tr>
						<tr>
							<div>
							<td bgcolor="gray"><font color="white"><label for='address'>Complete Address:</label></td>
							<td colspan='5'><input class="form-control" placeholder="Lot No.	 Blk No/House No.  		Street  Village/Subdivision  		Barangay  	City" type='text' name='address' maxlength="1000" value="<?php echo $_SESSION['address'] ?>"/></td>
							</div>
						</tr>
						<tr>
							<div>
							<td bgcolor="gray"><font color="white"><label for='bplace'>Birthplace:</label></td>
							<td><input class="form-control" type='text' name='bplace' maxlength="50" value="<?php echo $_SESSION['bplace'] ?>"/></td>
							</div>		
							<div>
							<td bgcolor="gray"><font color="white"><label for='citizenship'>Citizenship:</label></td>
							<td><input class="form-control" type='text' name='citizenship' maxlength="50" value="<?php echo $_SESSION['citizenship'] ?>"/></td>
							</div>
						</tr>
						<tr>
							<div>
							<td bgcolor="gray"><font color="white"><label for='occupation'>Occupation:</label></td>
							<td><input class="form-control" placeholder="aside from CFGP" type='text' name='occupation' maxlength="50" value="<?php echo $_SESSION['occupation'] ?>"/></td>
							</div>			
							<div>
							<td bgcolor="gray"><font color="white"><label for='contact'>Contact #:</label></td>
							<td><input class="form-control" type='text' name='contact' maxlength="50" value="<?php echo $_SESSION['contact'] ?>"/></td>
							</div>
							<div>
							<td bgcolor="gray"><font color="white"><label for='email'>Email Add:</label></td>
							<td><input class="form-control" placeholder="email@email.com" type='email' name='email' maxlength="50" value="<?php echo $_SESSION['email'] ?>"/></td>
							</div>
						</tr>
						<tr>
							<div>
							<td bgcolor="gray"><font color="white"><label for='cstatus'>Civil Status:</label></td>
							<td><select id="cstatus" class="form-control" name='cstatus'>
							<option value='<?php echo $_SESSION['cstatus'] ?>' selected><?php echo $_SESSION['cstatus'] ?></option>
							<option value='Single'>Single</option>
							<option value='Married'>Married</option>
							<option value='Widow/er'>Widow/er</option>
							<option value='Single Parent'>Single Parent</option>
							<option value='Separated'>Separated</option>
							<option value='Annulled'>Annulled</option>
							</select></td>
							</div>
							<div>
							<td bgcolor="gray"><font color="white"><label for='gender'>Gender:</label></td>
							<td><select class="form-control" name='gender'>
							<option value='<?php echo $_SESSION['gender'] ?>' selected><?php echo $_SESSION['gender'] ?></option>
							<option value='Male'>Male</option>
							<option value='Female'>Female</option>
							</select></td>
							</div>
						</tr>	
						<tr>
							<div>
							<td bgcolor="gray"><font color="white"><label for='category'>Credential:</label></td>
							<td><select class="form-control" name='category'>
							<option value='<?php echo $_SESSION['category'] ?>' selected><?php echo $_SESSION['category'] ?></option>
							<option value='ATP'>ATP</option>
							<option value='CW'>CW</option>
							<option value='LM'>LM</option>
							<option value='OM'>OM</option>
							</select>
							</div>
							<div>
							<td bgcolor="gray"><font color="white"><label for='cnumber'>Credential No:</label></td>
							<td><input class="form-control" type='text' name='cnumber' maxlength="50" value="<?php echo $_SESSION['cnumber'] ?>"/></td>
							</div>
						</tr>
						<tr>
							<div>
							<td bgcolor="gray"><font color="white"><label for='yearordained'>Year Ordained:</label></td>
							<td><input class="form-control" type='text' name='yearordained' maxlength="50" value="<?php echo $_SESSION['yearordained'] ?>"/></td>
							</div>
							<div>
							<td bgcolor="gray"><font color="white"><label for='language'>Language/<br>Dialect:</label></td>
							<td><input class="form-control" type='text' name='language' maxlength="150" value="<?php echo $_SESSION['language'] ?>"/></td>
							</div>
						</tr>
						<tr>
							<div>
							<td bgcolor="gray"><font color="white"><label for='tin'>TIN No.:</label></td>
							<td><input class="form-control" type='text' name='tin' maxlength="50" value="<?php echo $_SESSION['tin'] ?>"/></td>
							</div>

							<div>
							<td bgcolor="gray"><font color="white"><label for='sss'>SSS No.:</label></td>
							<td><input class="form-control" type='text' name='sss' maxlength="50" value="<?php echo $_SESSION['sss'] ?>"/></td>
							</div>
							<div>
							<td bgcolor="gray"><font color="white"><label for='bloodtype'>Blood Type:</label></td>
							<td><input class="form-control" type='text' name='bloodtype' maxlength="50" value="<?php echo $_SESSION['bloodtype'] ?>"/></td>
							</div>
						</tr>
						<tr>
							<td bgcolor="gray"><font color="white"><label for="spiritualgift">Spiritual Gifts:</label></td>
							<td colspan='3'><input class="form-control" placeholder="separate with comma (,)" type='text' id="addspiritualgift" name='spiritualgift' maxlength="150"  value="<?php echo $_SESSION['spiritualgift'] ?>"/></td>
							<td bgcolor="gray"><font color="white"><label>Select:</label></td>
							<td><select id="addsg" class="form-control">
							<option disabled selected value>Please select</option>	
							<option value='Shepherding'>Shepherding</option>
							<option value='Organizing'>Organizing</option>
							<option value='Teaching'>Teaching</option>
							<option value='Leadership'>Leadership</option>
							<option value='Counseling'>Counseling</option>
							<option value='Preaching'>Preaching</option>
							<option value='Prophecy'>Prophecy</option>
							<option value='Healing'>Healing</option>
							<option value='Speaking in Tongues'>Speaking in Tongues</option>
							<option value='Word of wisdom & knowledge'>Word of wisdom & knowledge</option>
							</select></td>
						<tr>
							<td bgcolor="gray"><font color="white"><label for="skills">Skills:</label></td>
							<td  colspan='3'><input class="form-control" placeholder="separate with comma (,)" type='text' name='skills' id='addskills' maxlength="150" value="<?php echo $_SESSION['skills'] ?>"/></td>
							<td bgcolor="gray"><font color="white"><label>Select:</label></td>
							<td><select id="addsk" class="form-control">
							<option disabled selected value>Please select</option>
							<option value='Driving'>Driving</option>
							<option value='Doing Computer-related Tasks'>Doing Computer-related Tasks</option>
							<option value='Writing'>Writing</option>
							<option value='Cooking'>Cooking</option>
							<option value='Doing Electrical Jobs'>Doing Electrical Jobs</option>
							<option value='Selling/Marketing'>Selling/Marketing</option>
							<option value='Doing Agricultural work'>Doing Agricultural work</option>
							<option value='Making Handicrafts'>Making Handicrafts</option>
							</select></td>
						</tr>
						<tr>
							<td bgcolor="gray"><font color="white"><label for="hobbies">Hobbies:</label></td>
							<td colspan='3'><input class="form-control" placeholder="separate with comma (,)		-   	Sports or Recreational" type='text' name='hobbies' id='addhobbies' maxlength="150" value="<?php echo $_SESSION['hobbies'] ?>"/></td>
							<td bgcolor="gray"><font color="white"><label>Select:</label></td>
							<td><select id="addho" class="form-control">
							<option disabled selected value>Please select</option>
							<option value='Basketball'>Basketball</option>
							<option value='Golf'>Golf</option>
							<option value='Bowling'>Bowling</option>
							<option value='Volleyball'>Volleyball</option>
							<option value='Swimming'>Swimming</option>
							<option value='Lawn Tennis'>Lawn Tennis</option>
							<option value='Table Tennis'>Table Tennis</option>
							<option value='Jogging/Exercise'>Jogging/Exercise</option>
							<option value='Chess'>Chess</option>
							<option value='Dama'>Dama</option>
							<option value='Games of the Gen.'>Games of the Gen.</option>
							<option value='Scrabble'>Scrabble</option>
							<option value='Word Factory'>Word Factory</option>
							<option value='Gym work-out'>Gym work-out</option>
							<option value='Travelling'>Travelling</option>
							</select></td>
						</tr>
						<tr>
							<td bgcolor="gray"><font color="white"><label for="health">Health Profile:</label></td>
							<td colspan='3'><input class="form-control" placeholder="separate with comma (,)" type='text' name='health' id='addhealth' maxlength="150" value="<?php echo $_SESSION['health'] ?>"/></td>
							<td bgcolor="gray"><font color="white"><label>Select:</label></td>
							<td><select id="addhp" class="form-control">
							<option disabled selected value>Please select</option>
							<option value='Using eyeglasses'>Using eyeglasses</option>
							<option value='Not yet using eyeglasses'>Not yet using eyeglasses</option>
							<option value='With denture/false teeth'>With denture/false teeth</option>
							<option value='With HMO, other than SSS & Philhealth'>With HMO, other than SSS & Philhealth</option>
							<option value='Diabetes'>Diabetes</option>
							<option value='High Blood Pressure'>High Blood Pressure</option>
							<option value='Athritis'>Athritis</option>
							<option value='Migraine'>Migraine</option>
							<option value='Lung Disease'>Lung Disease</option>
							<option value='Asthma'>Asthma</option>
							<option value='Cysts'>Cysts</option>
							<option value='Heart Disease'>Heart Disease</option>
							<option value='Dysmenorrhea'>Dysmenorrhea</option>
							<option value='Liver Disease'>Liver Disease</option>
							<option value='Skin Disease'>Skin Disease</option>
							</select></td>
						</tr>
						<tr>
							<td bgcolor="gray"><font color="white"><label for="otherinfo">Other Info:</label></td>
							<td><textarea rows="4" cols="50" name='otherinfo' maxlength="1000"><?php echo $_SESSION['otherinfo'] ?></textarea></td>
						
						<td bgcolor="gray"><font color="white"><label for='min_dtc_id'>District:</label></td>
		                  <td><select class="form-control" name='min_dtc_id' style="width: 150px;" onchange="showDiv(this.value)">
		                  	<?php  
		                  		if($_SESSION['home_settings']=="1")
		                        {
		                        	echo"<option value=".  $_SESSION['min_dtc_id'] ." selected>".  $_SESSION['min_dtc_name'] ." </option>";
		                        }            
		                    ?>
		                  	
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
		                                        }  
		                                      }
		                                      elseif($_SESSION['home_settings']=="1")
		                                      {
		                                      	//echo "<option value=". $_SESSION['min_dtc_id'] ." selected>". $_SESSION['min_dtc_name'] ."</option>";
		                                        echo "<option value='". $row["dtc_id"] ."'>" . $row["dtc_name"] . "</option>";  
		                                      }
		                                      
		                                      }
		                                    }
		                        ?>     
		                   </select></td>
		                   	<div>
							<td bgcolor="gray"><font color="white"><label for='min_status'>Status:</label></td>
							<td><select class="form-control" name='min_status'>
							<option value='<?php echo $_SESSION['min_status'] ?>' selected><?php echo $_SESSION['min_status'] ?></option>
							<option value='Inactive'>Inactive</option>
							<option value='(Deceased)'>(Deceased)</option>
							</select></td>
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
								<td><input class="form-control" placeholder="First Initial Last" type='text' id="sp_fullname_input" name='sp_fullname' maxlength="50" value="<?php echo $_SESSION['sp_fullname'] ?>" <?php if ($_SESSION['cstatus'] == "Single") { echo "disabled"; }?>/></td>	
								</div>
								<div>
								<td bgcolor="gray"><font color="white"><label for='sp_nickname'>Nickname:</label></td>
								<td><input class="form-control" type='text' id="sp_nickname_input" name='sp_nickname' maxlength="50" value="<?php echo $_SESSION['sp_nickname'] ?>" <?php if ($_SESSION['cstatus'] == "Single") { echo "disabled"; }?>/></td>
								</div>
								<div>
								<td bgcolor="gray"><font color="white"><label for='sp_bday'>Birthday:</label></td>
								<td><input class="form-control" type='date' id="sp_bday_input" name='sp_bday' maxlength="50" value="<?php echo $_SESSION['sp_bday'] ?>" <?php if ($_SESSION['cstatus'] == "Single") { echo "disabled"; }?>/></td>
								</div>
							</tr>
							<tr>
								<div>
								<td bgcolor="gray"><font color="white"><label for='sp_date_marriage'>Date of Marriage:</label></td>
								<td><input class="form-control" type='date' id="sp_date_marriage_input" name='sp_date_marriage' maxlength="50" value="<?php echo $_SESSION['sp_date_marriage'] ?>" <?php if ($_SESSION['cstatus'] == "Single") { echo "disabled"; }?>/></td>
								</div>		
								<div>
								<td bgcolor="gray"><font color="white"><label for='sp_citizenship'>Citizenship:</label></td>
								<td><input class="form-control" type='text' id="sp_citizenship_input" name='sp_citizenship' maxlength="50" value="<?php echo $_SESSION['sp_citizenship'] ?>" <?php if ($_SESSION['cstatus'] == "Single") { echo "disabled"; }?>/></td>
								</div>	
							</tr>
							<tr>
								<div>
								<td bgcolor="gray"><font color="white"><label for='sp_occupation'>Occupation:</label></td>
								<td><input class="form-control" type='text' id="sp_occupation_input" name='sp_occupation' maxlength="50" value="<?php echo $_SESSION['sp_occupation'] ?>" <?php if ($_SESSION['cstatus'] == "Single") { echo "disabled"; }?>/></td>
								</div>			
								<div>
								<td bgcolor="gray"><font color="white"><label for='sp_contact'>Contact #:</label></td>
								<td><input class="form-control" type='text' id="sp_contact_input" name='sp_contact' maxlength="50" value="<?php echo $_SESSION['sp_contact'] ?>" <?php if ($_SESSION['cstatus'] == "Single") { echo "disabled"; }?>/></td>
								</div>
								<div>
								<td bgcolor="gray"><font color="white"><label for='sp_email'>Email Add:</label></td>
								<td><input class="form-control" placeholder="email@email.com" type='email' id="sp_email_input" name='sp_email' maxlength="50" value="<?php echo $_SESSION['sp_email'] ?>" <?php if ($_SESSION['cstatus'] == "Single") { echo "disabled"; }?>/></td>
								</div>
							</tr>
						</div>
						<!--SPOUSE END-->
					</table>
						<br><br>

						<input class="btn btn-primary" type='submit' name='submitted' value='Next'/>
						<input class="btn btn-primary" type="button" onclick="location.href='min_menu.php';" value="Back" />	
				</form>	
			</div>
	  	</div>
	</div>
</div>
<?php
include 'footer.php';
?>