<?php
require_once ("include/membersite_config.php");
$fgmembersite->tablename = 'tbl_ch_member';
$fgmembersite->DBlogin();
if(isset($_GET['minID'])){
	 $result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_minister where min_id = $_GET[minID]");
	 
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
		  $min_dtc_id = $row["min_dtc_id"];
		  $fgmembersite->DBlogin();
			$result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_district where dtc_id = '". $min_dtc_id ."'");
			while($row = $result->fetch_assoc()) 
			{
				$min_dtc_id = $row["dtc_name"];
			}
	}
}
//spouse
 if($cstatus != "Single")
        {
		$fgmembersite->tablename = 'tbl_min_spouse';
		$fgmembersite->DBlogin();
			 $sp_result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_min_spouse where sp_min_id = $_GET[minID]");
			 
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
		}


?>
<html>
<body>
	<table border=1>
		<tr>
			<td colspan=7 bgcolor='#76D7C4'><b><center>Minister Information</b></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='fullname'>Full Name:</label></td>
			<td colspan='4'><?php echo $fullname ?></td>
			<td bgcolor='#D5D8DC'><label for='min_dtc_id'>District:</label></td>
			<td><?php echo $min_dtc_id ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='nickname'>Nickname:</label></td>
			<td colspan=2><?php echo $nickname ?></td>
			<td bgcolor='#D5D8DC'><label for='bday'>Birthday:</label></td>
			<td><?php echo $bday ?></td>
			<td bgcolor='#D5D8DC'><label for='bplace'>Birthplace:</label></td>
			<td><?php echo $bplace ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='address'>Complete Address:</label></td>
			<td colspan=6><?php echo $address ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='cstatus'>Civil Status:</label></td>
			<td colspan=2><?php echo $cstatus ?></td>
			<td bgcolor='#D5D8DC'><label for='gender'>Gender:</label></td>
			<td colspan=3><?php echo $gender ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='occupation'>Occupation:</label></td>
			<td colspan=2><?php echo $occupation ?></td>
			<td bgcolor='#D5D8DC'><label for='bloodtype'>Blood Type.:</label></td>
			<td><?php echo $bloodtype ?></td>
			<td bgcolor='#D5D8DC'><label for='citizenship'>Citizenship:</label></td>
			<td><?php echo $citizenship ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='cnumber'>Credential:</label></td>
			<td><?php echo $category ?></td>
			<td bgcolor='#D5D8DC'><label for='cnumber'>Credential No:</label></td>
			<td colspan=2><?php echo $cnumber ?></td>
			<td bgcolor='#D5D8DC'><label for='yearordained'>Year Ordained:</label></td>
			<td><?php echo $yearordained ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='contact'>Contact #:</label></td>
			<td colspan=2><?php echo $contact ?></td>
			<td bgcolor='#D5D8DC'><label for='language'>Language/Dialect:</label></td>
			<td colspan=3><?php echo $language ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='tin'>TIN No.:</label></td>
			<td colspan=2><?php echo $tin ?></td>
			<td bgcolor='#D5D8DC'><label for='sss'>SSS No.:</label></td>
			<td colspan=3><?php echo $sss ?></td>
			
		</tr>	
		<tr>
			<td bgcolor='#D5D8DC'><label for='spiritualgift'>Spiritual Gifts:</label></td>
			<td colspan=6><?php echo $spiritualgift ?></td>
		</tr>	
		<tr>
			<td bgcolor='#D5D8DC'><label for='skills'>Skills:</label></td>
			<td colspan=6><?php echo $skills ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='hobbies'>Hobbies:</label></td>
			<td colspan=6><?php echo $hobbies ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='health'>Health Profile:</label></td>
			<td colspan=6><?php echo $health ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='otherinfo'>Other Info:</label></td>
			<td colspan=6><?php echo $otherinfo ?></td>
		</tr>
		<?php
		if($cstatus != "Single")
		{
			echo"
			<tr>
				<td colspan=7 bgcolor='#76D7C4'><b>Spouse Information</b></td>
			</tr>
			<tr>
				<td bgcolor='#D5D8DC'><label for='sp_fullname'>Full Name:</label></td>
				<td colspan=6>". $sp_fullname ."</td>
			</tr>
			<tr>
				<td bgcolor='#D5D8DC'><label for='sp_nickname'>Nickname:</label></td>
				<td colspan=2>". $sp_nickname ."</td>
			</tr>
			<tr>
				<td bgcolor='#D5D8DC'><label for='sp_bday'>Birthday:</label></td>
				<td colspan=2>". $sp_bday ."</td>
				<td bgcolor='#D5D8DC'><label for='sp_date_marriage'>Date of Marriage:</label></td>
				<td colspan=2>". $sp_date_marriage ."</td>
			</tr>
			<tr>
				<td bgcolor='#D5D8DC'><label for='sp_citizenship'>Citizenship:</label></td>
				<td colspan=2>". $sp_citizenship ."</td>
				<td bgcolor='#D5D8DC'><label for='sp_occupation'>Occupation:</label></td>
				<td colspan=2>". $sp_occupation ."</td>
				
			</tr>
			<tr>
				<td bgcolor='#D5D8DC'><label for='sp_email'>Email Add:</label></td>
				<td colspan=2>". $sp_email ."</td>
				<td bgcolor='#D5D8DC'><label for='sp_contact'>Contact #:</label></td>
				<td colspan=2>". $sp_contact ."</td>
			</tr>
			";
		}

		echo"
		<tr>
			<td colspan=7 bgcolor='#76D7C4'><b>Children Information</b></td>
		</tr>
		<tr bgcolor='#D5D8DC'>
			<th>Full Name</th>
			<th>Birthday</th>
			<th>Civil Status:</th>
			<th>Contact #</th>
			<th>Email Add</th>
			<th>School/Course</th>
			<th>Level/Occupation</th>
		</tr>
		";
		//minister children
		$fgmembersite->tablename = 'tbl_min_children';
		$fgmembersite->DBlogin();
			 $cdn_result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_min_children where cdn_min_id = $_GET[minID]");
			 
			while($row = $cdn_result->fetch_assoc()) 
			{
				echo"<tr><td>". $row["cdn_fullname"] ."</td>";
				echo"<td>". $row["cdn_bday"] ."</td>";
				echo"<td>". $row["cdn_cstatus"] ."</td>";
				echo"<td>". $row["cdn_contact"] ."</td>";
				echo"<td>". $row["cdn_email"] ."</td>";
				echo"<td>". $row["cdn_course"] ."</td>";
				echo"<td>". $row["cdn_occupation"] ."</td></tr>";
			}

		echo"
		<tr bgcolor='#76D7C4'>
			<td colspan=5><b>Educational Attainment</b></td>
		</tr>
		<tr bgcolor='#D5D8DC'>
			<th>Year</th>
			<th>Name of School</th>
			<th>Level/Course/Degree</th>
			<th>Remarks</th>
			<th>Category</th>
		</tr>
		";

		//minister educ attain
		$fgmembersite->tablename = 'tbl_min_education';
		$fgmembersite->DBlogin();
			 $educ_result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_min_education where educ_min_id = $_GET[minID]");
			 
			while($row = $educ_result->fetch_assoc()) 
			{
				echo"<tr><td>". $row["educ_year"] ."</td>";
				echo"<td>". $row["educ_school"] ."</td>";
				echo"<td>". $row["educ_level"] ."</td>";
				echo"<td>". $row["educ_remarks"] ."</td>";
				echo"<td>". $row["educ_category"] ."</td></tr>";
			}

		echo"
		<tr>
			<td colspan=4 bgcolor='#76D7C4'><b>Work Experience</b></td>
		</tr>
		<tr bgcolor='#D5D8DC'	>
			<th>Year</th>
			<th>Company</th>
			<th>Address</th>
			<th>Position</th>
		</tr>
		";

		//minister work exp
		$fgmembersite->tablename = 'tbl_min_work';
		$fgmembersite->DBlogin();
			 $wrk_result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_min_work where wrk_min_id = $_GET[minID]");
			 
			while($row = $wrk_result->fetch_assoc()) 
			{
				echo"<tr><td>". $row["wrk_year"] ."</td>";
				echo"<td>". $row["wrk_company"] ."</td>";
				echo"<td>". $row["wrk_address"] ."</td>";
				echo"<td>". $row["wrk_position"] ."</td></tr>";
			}

		echo"
		<tr>
			<td colspan=5 bgcolor='#76D7C4'><b>Ministry History</b></td>
		</tr>
		<tr bgcolor='#D5D8DC'>
			<th>Church/Organization</th>
			<th>Address</th>
			<th>Year</th>
			<th>Position</th>
			<th>Reason for Leaving</th>
		</tr>
		";

		//minister ministry history
		$fgmembersite->tablename = 'tbl_min_mty';
		$fgmembersite->DBlogin();
			 $mty_result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_min_mty where mty_min_id = $_GET[minID]");
			 
			while($row = $mty_result->fetch_assoc()) 
			{
				echo"<tr><td>". $row["mty_church"] ."</td>";
				echo"<td>". $row["mty_address"] ."</td>";
				echo"<td>". $row["mty_year"] ."</td>";
				echo"<td>". $row["mty_position"] ."</td>";
				echo"<td>". $row["mty_reason"] ."</td></tr>";
			}

		echo"
		<tr>
			<td colspan=3 bgcolor='#76D7C4'><b>Religious Backgroud</b></td>
		</tr>
		<tr bgcolor='#D5D8DC'>
			<th>Nurturing Church</th>
			<th>City/Municipality</th>
			<th>Mentoring Pastor</th>
		</tr>
		";

		//minister relb
		$fgmembersite->tablename = 'tbl_min_relb';
		$fgmembersite->DBlogin();
			 $relb_result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_min_relb where relb_min_id = $_GET[minID]");
			 
			while($row = $relb_result->fetch_assoc()) 
			{
				echo"<tr><td>". $row["relb_church"] ."</td>";
				echo"<td>". $row["relb_municipality"] ."</td>";
				echo"<td>". $row["relb_mentoring"] ."</td></tr>";
			}
		?>
	</table>

</body>
</html>