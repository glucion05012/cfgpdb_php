<?php
require_once ("include/membersite_config.php");
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

        //page3
        

        $ch_mem_yrmem = $row["ch_mem_yrmem"];
        $ch_mem_position = $row["ch_mem_position"];
        $ch_mem_yrconvert = $row["ch_mem_yrconvert"];
        $ch_mem_yrbapt = $row["ch_mem_yrbapt"];
        $ch_mem_prevrel = $row["ch_mem_prevrel"];
        $ch_mem_prevch = $row["ch_mem_prevch"];
        $ch_mem_spiritual_gift = $row["ch_mem_spiritual_gift"];
        $ch_mem_skills = $row["ch_mem_skills"];
        $ch_mem_hobbies = $row["ch_mem_hobbies"];
        $ch_mem_health = $row["ch_mem_health"];
        $ch_mem_other_info = $row["ch_mem_other_info"];
        $ch_mem_interview = $row["ch_mem_interview"];
        $ch_mem_approve = $row["ch_mem_approve"];
        $ch_mem_date_accept = $row["ch_mem_date_accept"];
        $ch_mem_place_accept = $row["ch_mem_place_accept"];

        $fgmembersite->DBlogin();
	      $query = "SELECT * FROM tbl_church where ch_id = '".  $row["ch_mem_ch_id"] ."'";
	      $result = mysqli_query($fgmembersite->connection, $query);
	        if ($result->num_rows > 0)
            {
		        while ($row = $result->fetch_assoc())
		          {
		          	$ch_mem_ch_id = $row["ch_name"];
		          }
		    }
		    else
          	{
             $ch_mem_ch_id = "";
          	}
	}
}
//spouse
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
		}


?>
<html>
<body>
	<table border=1>
		<tr>
			<td colspan=4  bgcolor='#76D7C4'><b><center>Member Information</b></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='ch_mem_fullname'>Full Name:</label></td>
			<td colspan='3'><?php echo $ch_mem_fullname ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='ch_mem_address'>Address:</label></td>
			<td colspan='3'><?php echo $ch_mem_address ?></td>
		</tr>
		<tr>
		<td bgcolor='#D5D8DC'><label for='ch_mem_citizenship'>Citizenship:</label></td>
		<td><?php echo $ch_mem_citizenship ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='ch_mem_bday'>Birthday:</label></td>
			<td><?php echo $ch_mem_bday ?></td>
			<td bgcolor='#D5D8DC'><label for='ch_mem_bplace'>Birthplace:</label></td>
			<td><?php echo $ch_mem_bplace ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='ch_mem_sss'>SSS:</label></td>
			<td><?php echo $ch_mem_sss ?></td>
			<td bgcolor='#D5D8DC'><label for='ch_mem_tin'>TIN:</label></td>
			<td><?php echo $ch_mem_tin ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='ch_mem_gender'>Gender:</label></td>
			<td><?php echo $ch_mem_gender ?></td>
			<td bgcolor='#D5D8DC'><label for='ch_mem_cstatus'>Civil Status:</label></td>
			<td><?php echo $ch_mem_cstatus ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='ch_mem_occupation'>Occupation:</label></td>
			<td><?php echo $ch_mem_occupation ?></td>
			<td bgcolor='#D5D8DC'><label for='ch_mem_business'>Company/Business Name:</label></td>
			<td><?php echo $ch_mem_business ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'><label for='ch_mem_contact'>Contact No.:</label></td>
			<td><?php echo $ch_mem_contact ?></td>
			<td bgcolor='#D5D8DC'><label for='ch_mem_email'>Email Address:</label></td>
			<td><?php echo $ch_mem_email ?></td>
		</tr>	
		<?php
		if($ch_mem_cstatus != "Single")
		{
			echo"
			<tr>
				<td colspan=4><b>Spouse Information</b></td>
			</tr>
			<tr>
				<td bgcolor='#D5D8DC'><label for='sp_fullname'>Full Name:</label></td>
				<td>". $sp_fullname ."</td>
				<td bgcolor='#D5D8DC'><label for='sp_bday'>Birthday:</label></td>
				<td>". $sp_bday ."</td>
			</tr>
			<tr>
				<td bgcolor='#D5D8DC'><label for='sp_date_marriage'>Date of Marriage:</label></td>
				<td>". $sp_date_marriage ."</td>
				<td bgcolor='#D5D8DC'><label for='sp_place_marriage'>Place of Marriage:</label></td>
				<td>". $sp_place_marriage ."</td>
			</tr>
			";
		}
		
		echo"
		<tr>
			<td colspan=4  bgcolor='#76D7C4'><b>Other Information</b></td>
		</tr>
		<tr>
			<td colspan=2  bgcolor='#D5D8DC'><center>Name of Children</td>
			<td bgcolor='#D5D8DC'><center>Date of Birth</td>
			<td bgcolor='#D5D8DC'><center>Civil Status</td>
		</tr>
		";

		//church member children
		$fgmembersite->tablename = 'tbl_ch_mem_children';
		$fgmembersite->DBlogin();
			 $cdn_result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_ch_mem_children where cdn_mem_id = $_GET[memID]");
			 
			while($row = $cdn_result->fetch_assoc()) 
			{
				echo"<tr><td colspan=2>". $row["cdn_fullname"] ."</td>";
				echo"<td>". $row["cdn_bday"] ."</td>";
				echo"<td>". $row["cdn_cstatus"] ."</td></tr>";
			}

		echo"
		<tr>
			<td colspan=2><center>Name of School</td>
			<td><center>Year Graduated</td>
			<td><center>Course/Degree</td>
		</tr>
		";
		//church member education
		$fgmembersite->tablename = 'tbl_ch_mem_education';
		$fgmembersite->DBlogin();
			 $educ_result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_ch_mem_education where educ_mem_id = $_GET[memID]");
			 
			while($row = $educ_result->fetch_assoc()) 
			{
				echo"<tr><td colspan=2>". $row["educ_school"] ."</td>";
				echo"<td>". $row["educ_year"] ."</td>";
				echo"<td>". $row["educ_level"] ."</td></tr>";
			}

		echo"
		<tr>
			<td colspan=2><center>Name of Training</td>
			<td><center>Year Taken/Completed</td>
			<td><center>Title/Designation</td>
		</tr>
		";
		//church member education
		$fgmembersite->tablename = 'tbl_ch_mem_training';
		$fgmembersite->DBlogin();
			 $trn_result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_ch_mem_training where trn_mem_id = $_GET[memID]");
			 
			while($row = $trn_result->fetch_assoc()) 
			{
				echo"<tr><td colspan=2>". $row["trn_name"] ."</td>";
				echo"<td>". $row["trn_year"] ."</td>";
				echo"<td>". $row["trn_title"] ."</td></tr>";
			}	
		?>

		<tr>
				<td colspan=4  bgcolor='#76D7C4'><b>Church Information</b></td>
		</tr>
		<tr>
			<td colspan=2 bgcolor='#D5D8DC'>Name of Present Local Church:</td>
			<td colspan=2><?php echo $ch_mem_ch_id ?></td>
		</tr>	
		<tr>
			<td bgcolor='#D5D8DC'>Year of Membership:</td>
			<td><?php echo $ch_mem_yrmem ?></td>
			<td bgcolor='#D5D8DC'>Ministry Position/Involvement:</td>
			<td><?php echo $ch_mem_position ?></td>
			
		</tr>	
		<tr>
			<td bgcolor='#D5D8DC'>Year of Conversion:</td>
			<td><?php echo $ch_mem_yrconvert ?></td>
			<td bgcolor='#D5D8DC'>Year of Water Baptism:</td>
			<td><?php echo $ch_mem_yrbapt ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'>Previous Religion:</td>
			<td><?php echo $ch_mem_prevrel ?></td>
			<td bgcolor='#D5D8DC'>Previous Church:</td>
			<td><?php echo $ch_mem_prevch ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'>Spiritual Gifts:</td>
			<td colspan=3><?php echo $ch_mem_spiritual_gift ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'>Skills:</td>
			<td colspan=3><?php echo $ch_mem_skills ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'>Hobbies:</td>
			<td colspan=3><?php echo $ch_mem_hobbies ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'>Health:</td>
			<td colspan=3><?php echo $ch_mem_health ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'>Other Info:</td>
			<td colspan=3><?php echo $ch_mem_other_info ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'>Interviewed by:</td>
			<td><?php echo $ch_mem_interview ?></td>
			<td bgcolor='#D5D8DC'>Approved by:</td>
			<td><?php echo $ch_mem_approve ?></td>
		</tr>
		<tr>
			<td bgcolor='#D5D8DC'>Date of Acceptance:</td>
			<td><?php echo $ch_mem_date_accept ?></td>
			<td bgcolor='#D5D8DC'	>Place of Acceptance:</td>
			<td><?php echo $ch_mem_place_accept ?></td>
		</tr>

	</table>

</body>
</html>