<?php
include 'header.php';
require_once ("include/membersite_config.php");

if(isset($_POST['submitted']))
{
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
	$_SESSION['min_status'] = $_POST['min_status'];
	$fgmembersite->tablename = 'tbl_district';
		$fgmembersite->DBlogin();
		$result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_district where dtc_id = '". $_SESSION['min_dtc_id'] ."'");
		 if ($result->num_rows > 0)
                        {
						while($row = $result->fetch_assoc()) 
							{
								$_SESSION["min_dtc_name"] = $row["dtc_name"];
							}
						}
                        else
                        {
                         $_SESSION["min_dtc_name"] = "N/A";
                        }
	//spouse
	$_SESSION['sp_fullname'] = $_POST['sp_fullname'];
	$_SESSION['sp_nickname'] = $_POST['sp_nickname'];	
	$_SESSION['sp_bday'] = $_POST['sp_bday'];
	$_SESSION['sp_date_marriage'] = $_POST['sp_date_marriage'];
	$_SESSION['sp_citizenship'] = $_POST['sp_citizenship'];
	$_SESSION['sp_occupation'] = $_POST['sp_occupation'];
	$_SESSION['sp_contact'] = $_POST['sp_contact'];
	$_SESSION['sp_email'] = $_POST['sp_email'];
	$_SESSION['min_ID'] = $_POST['min_ID'];

	 
	$fgmembersite->tablename = 'tbl_minister';
 	$fgmembersite->DBlogin();
	$queryd = "SELECT min_fullname FROM tbl_minister where min_fullname = '". $_POST['fullname'] ."'";
	$duplicate = mysqli_query($fgmembersite->connection, $queryd);

	$queryold = "SELECT min_fullname FROM tbl_minister where min_id = '". $_SESSION['min_ID'] ."'";
	$result = mysqli_query($fgmembersite->connection, $queryold);
	while($row = $result->fetch_assoc()) 
			{
				$resultold = $row["min_fullname"];
			}

	if($duplicate->num_rows == 0 or $resultold == $_SESSION['fullname'])
	{
		echo '<script language="javascript">';
	    echo 'location.href="min_edit_page2.php"';
	    echo '</script>';
	}else
	{
		echo '<script language="javascript">';
	    echo 'alert("Name exist."); location.href="min_edit.php?ministerID='. $_SESSION['min_ID'] .'"';
	    echo '</script>';
	}
	 
    
   
}
elseif(isset($_POST['back']))
{
	echo '<script language="javascript">';
    echo 'location.href="min_menu.php"';
    echo '</script>';
}

		$fgmembersite->tablename = 'tbl_minister';
		$fgmembersite->DBlogin();
		if(isset($_GET['ministerID'])){
			 $result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_minister where min_id = $_GET[ministerID]");
			 
			while($row = $result->fetch_assoc()) 
			{
				  $fullname = $row["min_fullname"];
				  $nickname = $row["min_nickname"];
				  $bday = $row["min_bday"];
				  $bplace = $row["min_bplace"];
				  $address = $row["min_address"];				  
				  $cstatus = $row["min_cstatus"];
				  $gender = $row["min_gender"];
				  $citizenship = $row["min_citizenship"];
				  $occupation = $row["min_occupation"];
				  $contact = $row["min_contact"];
				  $email = $row["min_email"];
				  $category = $row["min_credential"];
				  $cnumber = $row["min_credential_no"];
				  $sss = $row["min_sss"];
				  $tin = $row["min_tin"];
				  $bloodtype = $row["min_blood_type"];
				  $yearordained = $row["min_year_ordained"];
				  $language = $row["min_language"];
				  $spiritualgift = $row["min_spiritual_gift"];
				  $skills = $row["min_skills"];
				  $hobbies = $row["min_hobbies"];
				  $health = $row["min_health"];
				  $otherinfo = $row["min_other_info"];
				  $min_ch_id = $row["min_ch_id"];
				  $ministerID = $row["min_id"];
				  $min_dtc_id = $row["min_dtc_id"];
				  $min_status = $row["min_status"];
				  $dtcquery = "SELECT * FROM tbl_district where dtc_id = '". $min_dtc_id ."'"; 
                      $dtcresult = mysqli_query($fgmembersite->connection, $dtcquery);
                       if ($dtcresult->num_rows > 0)
                        {
						while($row1 = $dtcresult->fetch_assoc()) 
							{
								$min_dtc_name = $row1["dtc_name"];
							}
						}
                        else
                        {
                         $min_dtc_name = "N/A";
                        }
			 }

		if($cstatus != "Single")
        {
		$fgmembersite->tablename = 'tbl_min_spouse';
		$fgmembersite->DBlogin();
			 $sp_result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_min_spouse where sp_min_id = $_GET[ministerID]");
			 
			while($row = $sp_result->fetch_assoc()) 
			{
				  $sp_fullname = $row["sp_fullname"];
				  $sp_nickname =  $row["sp_nickname"];
				  $sp_bday =  $row["sp_bday"];
				  $sp_date_marriage =  $row["sp_date_marriage"];
				  $sp_citizenship =  $row["sp_citizenship"];				  
				  $sp_contact =  $row["sp_contact"];
				  $sp_email =  $row["sp_email"];
				  $sp_occupation =  $row["sp_occupation"];
			 }
		} else
		{
				  $sp_fullname ="";
				  $sp_nickname = "";
				  $sp_bday = "";
				  $sp_date_marriage = "";
				  $sp_citizenship = "";				  
				  $sp_contact = "";
				  $sp_email = "";
				  $sp_occupation = "";
		}


echo"

<style type='text/css'>
	table,th,td
	{
		border:1px solid black;
	}	

</style>

<div class='content-wrapper'>
    <div class='container-fluid'>
      <!-- Breadcrumbs-->
      <ol class='breadcrumb'>
        <li class='breadcrumb-item'>
          <a href='min_menu.php'><b>Minister</b></a>
        </li>
        <li class='breadcrumb-item active'><b>Edit Minister</b></li>
      </ol>
      <!-- Example DataTables Card-->
      	<div class='card mb-3'>
	        <div class='card-header'>
	          <i class='fa fa-home'></i> <b>Minister</b>
	        </div>
          	<div class='card-body'>
				<form action='". $fgmembersite->GetSelfScript() ."' method='post'>

					<table align='center'>
						<tr>
							<div>
							<td bgcolor='gray'><font color='white'><label for='fullname'>Full Name:</label></td>
							";
							if($_SESSION['back'] == "0") 
							{ 
								echo "<td><input class='form-control' placeholder='Family, First Middle' type='text' name='fullname' maxlength='50' value='". $fullname ."' /></td>"; 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "<td><input class='form-control' placeholder='Family, First Middle' type='text' name='fullname' maxlength='50' value='". $_SESSION['fullname'] ."' /></td>"; 
							}

							echo"
							</div>
							<div>
							<td bgcolor='gray'><font color='white'><label for='nickname'>Nickname:</label></td>
							";
							if($_SESSION['back'] == "0") 
							{ 
								echo "<td><input class='form-control' type='text' name='nickname' maxlength='50' value='". $nickname ."'/></td>"; 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "<td><input class='form-control' type='text' name='nickname' maxlength='50' value='". $_SESSION['nickname'] ."'/></td>"; 
							}

							echo"
							</div>
							<div>
							<td bgcolor='gray'><font color='white'><label for='bday'>Birthday:</label></td>
							";
							if($_SESSION['back'] == "0") 
							{ 
								echo "<td><input class='form-control' type='date' name='bday' maxlength='50' value='". $bday ."'/></td>"; 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "<td><input class='form-control' type='date' name='bday' maxlength='50' value='". $_SESSION['bday'] ."'/></td>"; 
							}

							echo"
							</div>				
						</tr>
						<tr>
							<div>
							<td bgcolor='gray'><font color='white'><label for='address'>Complete Address:</label></td>
							";
							if($_SESSION['back'] == "0") 
							{ 
								echo "<td colspan='5'><input class='form-control' placeholder='Lot No.	 Blk No/House No.  		Street  Village/Subdivision  		Barangay  	City' type='text' name='address' maxlength='1000' value='". $address ."'/></td>"; 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "<td colspan='5'><input class='form-control' placeholder='Lot No.	 Blk No/House No.  		Street  Village/Subdivision  		Barangay  	City' type='text' name='address' maxlength='1000' value='". $_SESSION['address'] ."'/></td>"; 
							}

							echo"
							</div>
						</tr>
						<tr>
							<div>
							<td bgcolor='gray'><font color='white'><label for='bplace'>Birthplace:</label></td>
							";
							if($_SESSION['back'] == "0") 
							{ 
								echo "<td><input class='form-control' type='text' name='bplace' maxlength='50' value='". $bplace ."'/></td>"; 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "<td><input class='form-control' type='text' name='bplace' maxlength='50' value='". $_SESSION['bplace'] ."'/></td>"; 
							}

							echo"
							</div>		
							<div>
							<td bgcolor='gray'><font color='white'><label for='citizenship'>Citizenship:</label></td>
							";
							if($_SESSION['back'] == "0") 
							{ 
								echo "<td><input class='form-control' type='text' name='citizenship' maxlength='50' value='". $citizenship ."'/></td>"; 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "<td><input class='form-control' type='text' name='citizenship' maxlength='50' value='". $_SESSION['citizenship'] ."'/></td>"; 
							}

							echo"
							
							</div>
						</tr>
						<tr>
							<div>
							<td bgcolor='gray'><font color='white'><label for='occupation'>Occupation:</label></td>
							";
							if($_SESSION['back'] == "0") 
							{ 
								echo "<td><input class='form-control' placeholder='aside from CFGP' type='text' name='occupation' maxlength='50' value='". $occupation ."'/></td>"; 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "<td><input class='form-control' placeholder='aside from CFGP' type='text' name='occupation' maxlength='50' value='". $_SESSION['occupation'] ."'/></td>"; 
							}

							echo"

							</div>			
							<div>
							<td bgcolor='gray'><font color='white'><label for='contact'>Contact #:</label></td>
							";
							if($_SESSION['back'] == "0") 
							{ 
								echo "<td><input class='form-control' type='text' name='contact' maxlength='50' value='". $contact ."'/></td>"; 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "<td><input class='form-control' type='text' name='contact' maxlength='50' value='". $_SESSION['contact'] ."'/></td>"; 
							}

							echo"
							
							</div>
							<div>
							<td bgcolor='gray'><font color='white'><label for='email'>Email Add:</label></td>
							";
							if($_SESSION['back'] == "0") 
							{ 
								echo "<td><input class='form-control' placeholder='email@email.com' type='email' name='email' maxlength='50' value='". $email ."'/></td>"; 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "<td><input class='form-control' placeholder='email@email.com' type='email' name='email' maxlength='50' value='". $_SESSION['email'] ."'/></td>"; 
							}

							echo"
							
							</div>
						</tr>
						<tr>
							<div>
							<td bgcolor='gray'><font color='white'><label for='cstatus'>Civil Status:</label></td>
							<td><select id='cstatus' class='form-control' name='cstatus'>
							";
							if($_SESSION['back'] == "0") 
							{ 
								echo "<option value=". $cstatus ." selected>". $cstatus ."</option>"; 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "<option value=". $_SESSION['cstatus'] ." selected>". $_SESSION['cstatus'] ."</option>"; 
							}

							echo"
							
							<option value='Single'>Single</option>
							<option value='Married'>Married</option>
							<option value='Widow/er'>Widow/er</option>
							<option value='Single Parent'>Single Parent</option>
							<option value='Separated'>Separated</option>
							<option value='Annulled'>Annulled</option>
							</select></td>
							</div>
							<div>
							<td bgcolor='gray'><font color='white'><label for='gender'>Gender:</label></td>
							<td><select class='form-control' name='gender'>
							";
							if($_SESSION['back'] == "0") 
							{ 
								echo "<option value=". $gender ." selected>". $gender ."</option>"; 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "<option value=". $_SESSION['gender'] ." selected>". $_SESSION['gender'] ."</option>"; 
							}

							echo"
							
							<option value='Male'>Male</option>
							<option value='Female'>Female</option>
							</select></td>
							</div>
						</tr>
						<tr>
							<div>
							<td bgcolor='gray'><font color='white'><label for='category'>Credential:</label></td>
							<td><select class='form-control' name='category'>
							";
							if($_SESSION['back'] == "0") 
							{ 
								echo "<option value=". $category ." selected>". $category ."</option>"; 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "<option value=". $_SESSION['category'] ." selected>". $_SESSION['category'] ."</option>"; 
							}

							echo"
							
							<option value='ATP'>ATP</option>
							<option value='CW'>CW</option>
							<option value='LM'>LM</option>
							<option value='OM'>OM</option>
							</select>
							</div>
							<div>
							<td bgcolor='gray'><font color='white'><label for='cnumber'>Credential No:</label></td>
							";
							if($_SESSION['back'] == "0") 
							{ 
								echo "<td><input class='form-control' type='text' name='cnumber' maxlength='50' value='". $cnumber ."'/></td>"; 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "<td><input class='form-control' type='text' name='cnumber' maxlength='50' value='". $_SESSION['cnumber'] ."'/></td>"; 
							}

							echo"

							</div>
						</tr>
						<tr>
							<div>
							<td bgcolor='gray'><font color='white'><label for='yearordained'>Year Ordained:</label></td>
							";
							if($_SESSION['back'] == "0") 
							{ 
								echo "<td><input class='form-control' type='text' name='yearordained' maxlength='50' value='". $yearordained ."'/></td>"; 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "<td><input class='form-control' type='text' name='yearordained' maxlength='50' value='". $_SESSION['yearordained'] ."'/></td>"; 
							}

							echo"
							
							</div>
							<div>
							<td bgcolor='gray'><font color='white'><label for='language'>Language/<br>Dialect:</label></td>
							";
							if($_SESSION['back'] == "0") 
							{ 
								echo "<td><input class='form-control' type='text' name='language' maxlength='150' value='". $language ."'/></td>"; 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "<td><input class='form-control' type='text' name='language' maxlength='150' value='". $_SESSION['language'] ."'/></td>"; 
							}

							echo"
							
							</div>
						</tr>
						<tr>
							<div>
							<td bgcolor='gray'><font color='white'><label for='tin'>TIN No.:</label></td>
							";
							if($_SESSION['back'] == "0") 
							{ 
								echo "<td><input class='form-control' type='text' name='tin' maxlength='50' value='". $tin ."'/></td>"; 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "<td><input class='form-control' type='text' name='tin' maxlength='50' value='". $_SESSION['tin'] ."'/></td>"; 
							}

							echo"
							
							</div>

							<div>
							<td bgcolor='gray'><font color='white'><label for='sss'>SSS No.:</label></td>
							";
							if($_SESSION['back'] == "0") 
							{ 
								echo "<td><input class='form-control' type='text' name='sss' maxlength='50' value='". $sss ."'/></td>"; 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "<td><input class='form-control' type='text' name='sss' maxlength='50' value='". $_SESSION['sss'] ."'/></td>"; 
							}

							echo"
							
							</div>
							<div>
							<td bgcolor='gray'><font color='white'><label for='bloodtype'>Blood Type:</label></td>
							";
							if($_SESSION['back'] == "0") 
							{ 
								echo "<td><input class='form-control' type='text' name='bloodtype' maxlength='50' value='". $bloodtype ."'/></td>"; 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "<td><input class='form-control' type='text' name='bloodtype' maxlength='50' value='". $_SESSION['bloodtype'] ."'/></td>"; 
							}

							echo"
							
							</div>
						</tr>
						<tr>
							<td bgcolor='gray'><font color='white'><label for='spiritualgift'>Spiritual Gifts:</label></td>
							";
							if($_SESSION['back'] == "0") 
							{ 
								echo "<td colspan='5'><input class='form-control' placeholder='separate with comma (,)' type='text' name='spiritualgift' maxlength='150' value='". $spiritualgift ."'/></td>"; 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "<td colspan='5'><input class='form-control' placeholder='separate with comma (,)' type='text' name='spiritualgift' maxlength='150' value='". $_SESSION['spiritualgift'] ."'/></td>"; 
							}

							echo"
							
						<tr>
							<td bgcolor='gray'><font color='white'><label for='skills'>Skills:</label></td>
							";
							if($_SESSION['back'] == "0") 
							{ 
								echo "<td  colspan='5'><input class='form-control' placeholder='separate with comma (,)' type='text' name='skills' maxlength='150' value='". $skills ."'/></td>"; 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "<td  colspan='5'><input class='form-control' placeholder='separate with comma (,)' type='text' name='skills' maxlength='150' value='". $_SESSION['skills'] ."'/></td>"; 
							}

							echo"
							
						</tr>
						<tr>
							<td bgcolor='gray'><font color='white'><label for='hobbies'>Hobbies:</label></td>
							";
							if($_SESSION['back'] == "0") 
							{ 
								echo "<td colspan='5'><input class='form-control' placeholder='separate with comma (,)		-   	Sports or Recreational' type='text' name='hobbies' maxlength='150' value='". $hobbies ."'/></td>"; 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "<td colspan='5'><input class='form-control' placeholder='separate with comma (,)		-   	Sports or Recreational' type='text' name='hobbies' maxlength='150' value='". $_SESSION['hobbies'] ."'/></td>"; 
							}

							echo"
							
						</tr>
						<tr>
							<td bgcolor='gray'><font color='white'><label for='health'>Health Profile:</label></td>
							";
							if($_SESSION['back'] == "0") 
							{ 
								echo "<td colspan='5'><input class='form-control' placeholder='separate with comma (,)' type='text' name='health' maxlength='150' value='". $health ."'/></td>"; 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "<td colspan='5'><input class='form-control' placeholder='separate with comma (,)' type='text' name='health' maxlength='150' value='". $_SESSION['health'] ."'/></td>"; 
							}

							echo"
							
						</tr>
						<tr>
							<td bgcolor='gray'><font color='white'><label for='otherinfo'>Other Info:</label></td>
							";
							if($_SESSION['back'] == "0") 
							{ 
								echo "<td><textarea rows='4' cols='50' name='otherinfo' maxlength='1000'>". $otherinfo ."</textarea></td>"; 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "<td><textarea rows='4' cols='50' name='otherinfo' maxlength='1000'>". $_SESSION['otherinfo'] ."</textarea></td>"; 
							}

							echo"
						
						<div>
							";
							if($min_ch_id == "0") 
							{
								echo "<td bgcolor='gray'><font color='white'><label for='min_dtc_id'>District:</label></td>";
								echo "<td><select class='form-control' name='min_dtc_id'>";
							}else
							{	
								echo "<input value= '". $min_dtc_id ."' type='hidden' name='min_dtc_id'/>";
								echo "<td bgcolor='gray'><font color='white'><label for='min_dtc_id'>District:</label></td>";
								echo "<td><select class='form-control' name='min_dtc_id' disabled>";
							}

							if($_SESSION['back'] == "0") 
							{ 
								echo "<option value=". $min_dtc_id ." selected>". $min_dtc_name ."</option>"; 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "<option value=". $_SESSION['min_dtc_id'] ." selected>". $_SESSION['min_dtc_name'] ."</option>"; 
							}
							
							if($_SESSION['home_settings']=="1")
		                    {
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
			                }
			                 echo"
							</select></td>
							</div>	
							<div>
							<td bgcolor='gray'><font color='white'><label for='min_status'>Status:</label></td>
							<td><select class='form-control' name='min_status'>
							";
							if($_SESSION['back'] == "0") 
							{ 
								echo "<option value=". $min_status ." selected>". $min_status ."</option>"; 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "<option value=". $_SESSION['min_status'] ." selected>". $_SESSION['min_status'] ."</option>"; 
							}

							echo"
							
							<option value='Active'>Active</option>
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
								<td bgcolor='gray'><font color='white'><label for='sp_fullname'>Full Name:</label></td>
								<td><input class='form-control' placeholder='First Initial Last' type='text' id='sp_fullname_input' name='sp_fullname' maxlength='50' 
								";
							if($_SESSION['back'] == "0") 
							{ 
								echo "value='". $sp_fullname ."'"; 
								if ($cstatus == "Single") { echo "disabled"; }
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "value='". $_SESSION['sp_fullname'] ."'";
								if ($_SESSION['cstatus'] == "Single") { echo "disabled"; } 
							}

							echo"/></td>
								</div>			
								<div>
								<td bgcolor='gray'><font color='white'><label for='sp_nickname'>Nickname:</label></td>
								<td><input class='form-control' type='text' id='sp_nickname_input' name='sp_nickname' maxlength='50' 
								";
							if($_SESSION['back'] == "0") 
							{ 
								echo "value='". $sp_nickname ."'";
								if ($cstatus == "Single") { echo "disabled"; } 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "value='". $_SESSION['sp_nickname'] ."'"; 
								if ($_SESSION['cstatus'] == "Single") { echo "disabled"; } 
							}

							echo"/></td>
								</div>
								<div>
								<td bgcolor='gray'><font color='white'><label for='sp_bday'>Birthday:</label></td>
								<td><input class='form-control' type='date' id='sp_bday_input' name='sp_bday' maxlength='50' 
								";
							if($_SESSION['back'] == "0") 
							{ 
								echo "value='". $sp_bday ."'"; 
								if ($cstatus == "Single") { echo "disabled"; } 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "value='". $_SESSION['sp_bday'] ."'"; 
								if ($_SESSION['cstatus'] == "Single") { echo "disabled"; } 
							}

							echo"/></td>
								</div>
							</tr>
							<tr>
								<div>
								<td bgcolor='gray'><font color='white'><label for='sp_date_marriage'>Date of Marriage:</label></td>
								<td><input class='form-control' type='date' id='sp_date_marriage_input' name='sp_date_marriage' maxlength='50'
								";
							if($_SESSION['back'] == "0") 
							{ 
								echo "value='". $sp_date_marriage ."'"; 
								if ($cstatus == "Single") { echo "disabled"; } 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "value='". $_SESSION['sp_date_marriage'] ."'"; 
								if ($_SESSION['cstatus'] == "Single") { echo "disabled"; } 
							}

							echo"/></td>
								</div>
								<div>
								<td bgcolor='gray'><font color='white'><label for='sp_citizenship'>Citizenship:</label></td>
								<td><input class='form-control' type='text' id='sp_citizenship_input' name='sp_citizenship' maxlength='50'
								";
							if($_SESSION['back'] == "0") 
							{ 
								echo "value='". $sp_citizenship ."'"; 
								if ($cstatus == "Single") { echo "disabled"; } 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "value='". $_SESSION['sp_citizenship'] ."'"; 
								if ($_SESSION['cstatus'] == "Single") { echo "disabled"; } 
							}

							echo"/></td>
								</div>
								<div>
								<td bgcolor='gray'><font color='white'><label for='sp_occupation'>Occupation:</label></td>
								<td><input class='form-control' type='text' id='sp_occupation_input' name='sp_occupation' maxlength='50'
								";
							if($_SESSION['back'] == "0") 
							{ 
								echo "value='". $sp_occupation ."'"; 
								if ($cstatus == "Single") { echo "disabled"; } 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "value='". $_SESSION['sp_occupation'] ."'"; 
								if ($_SESSION['cstatus'] == "Single") { echo "disabled"; } 
							}

							echo"/></td>
								</div>
							</tr>
							<tr>
								<div>
								<td bgcolor='gray'><font color='white'><label for='sp_contact'>Contact #:</label></td>
								<td><input class='form-control' type='text' id='sp_contact_input' name='sp_contact' maxlength='50' 
								";
							if($_SESSION['back'] == "0") 
							{ 
								echo "value='". $sp_contact ."'"; 
								if ($cstatus == "Single") { echo "disabled"; } 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "value='". $_SESSION['sp_contact'] ."'"; 
								if ($_SESSION['cstatus'] == "Single") { echo "disabled"; } 
							}
							echo"/></td>
								</div>
								<div>
								<td bgcolor='gray'><font color='white'><label for='sp_email'>Email Add:</label></td>
								<td><input class='form-control' placeholder='email@email.com' type='email' id='sp_email_input' name='sp_email' maxlength='50'
								";
							if($_SESSION['back'] == "0") 
							{ 
								echo "value='". $sp_email ."'"; 
								if ($cstatus == "Single") { echo "disabled"; } 
							}
							elseif ($_SESSION['back'] == "1") 
							{
								echo "value='". $_SESSION['sp_email'] ."'"; 
								if ($_SESSION['cstatus'] == "Single") { echo "disabled"; } 
							}

							echo"/></td>
								</div>
							</tr>
						</div>
						<!--SPOUSE END-->
						<input value= '". $ministerID ."' style='width:300px' type='hidden' name='min_ID' maxlength='50'/>
					</table>
						<br><br>


						<input class='btn btn-primary' type='submit' name='submitted' value='Next'/>
						<input class='btn btn-primary' type='submit' name='back' value='Back'/>	
				</form>	
			</div>
	  	</div>
	</div>
</div>
";
}
include 'footer.php';
?>