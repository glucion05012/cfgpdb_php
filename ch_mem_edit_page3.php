	<?php
	include 'header.php';
	require_once ("include/membersite_config.php");

	if(isset($_POST['submitted']))
	{
		if($fgmembersite->UpdateChurchMember())
   		{
			//page 3 variables on SESSION
			echo '<script language="javascript">';
		    echo 'alert("Member successfully updated!"); location.href="ch_mem_menu.php?churchID='. $_POST['churchID'] .'&churchName='. $_POST['churchName'] .'&chDivName='. $_SESSION['chDivName'] .'&chDtcName='. $_SESSION['chDtcName'] .'&chDivID='. $_SESSION['chDivID'] .'&chDtcID='. $_SESSION['chDtcID'] .'"';
		    echo '</script>';
		}
	   
	}
	else if(isset($_POST['back']))
	{
		  $_SESSION['ch_mem_ch'] = $_POST['ch_mem_ch'];
		  $_SESSION['ch_mem_yrmem'] = $_POST['ch_mem_yrmem'];
		  $_SESSION['ch_mem_position'] = $_POST['ch_mem_position'];
		  $_SESSION['ch_mem_yrconvert'] = $_POST['ch_mem_yrconvert'];
		  $_SESSION['ch_mem_yrbapt'] = $_POST['ch_mem_yrbapt'];
		  $_SESSION['ch_mem_prevrel'] = $_POST['ch_mem_prevrel'];
		  $_SESSION['ch_mem_prevch'] = $_POST['ch_mem_prevch'];
		  $_SESSION['ch_mem_spiritual_gift'] = $_POST['ch_mem_spiritual_gift'];
		  $_SESSION['ch_mem_skills'] = $_POST['ch_mem_skills'];
		  $_SESSION['ch_mem_hobbies'] = $_POST['ch_mem_hobbies'];
		  $_SESSION['ch_mem_health'] = $_POST['ch_mem_health'];
		  $_SESSION['ch_mem_other_info'] = $_POST['ch_mem_other_info'];
		  $_SESSION['ch_mem_interview'] = $_POST['ch_mem_interview'];
		  $_SESSION['ch_mem_approve'] = $_POST['ch_mem_approve'];
		  $_SESSION['ch_mem_date_accept'] = $_POST['ch_mem_date_accept'];
		  $_SESSION['ch_mem_place_accept'] = $_POST['ch_mem_place_accept'];
		  $_SESSION['ch_mem_status'] = $_POST['ch_mem_status'];

		  $_SESSION['back'] = "1";
		echo '<script language="javascript">';
	    echo 'location.href="ch_mem_edit_page2.php?churchID='. $_POST['churchID'] .'&churchName='. $_POST['churchName'] .'&memID='. $_POST['memID'] .'&chDivName='. $_SESSION['chDivName'] .'&chDtcName='. $_SESSION['chDtcName'] .'&chDivID='. $_SESSION['chDivID'] .'&chDtcID='. $_SESSION['chDtcID'] .'"';
	    echo '</script>';
	}

	$fgmembersite->tablename = 'tbl_ch_member';
		$fgmembersite->DBlogin();
		if(isset($_GET['memID'])){
			 $result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_ch_member where ch_mem_id = $_GET[memID]");
			 
			while($row = $result->fetch_assoc()) 
			{
				$ch_mem_ch_id = $row["ch_mem_ch_id"];
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
                $ch_mem_status = $row["ch_mem_status"];
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
	          <a href="ch_menu.php">Churches</a>
	        </li>
	        <li class="breadcrumb-item">
	          <a href="ch_mem_menu.php?churchID=<?php echo $_GET['churchID']; ?>&churchName=<?php echo $_GET['churchName']; ?>"><?php echo $_GET['churchName']; ?></a>
	        </li>
	         <li class="breadcrumb-item active"><?php echo $_SESSION['ch_mem_fullname']; ?></li>
	      </ol>
	      <!-- Example DataTables Card-->
	      	<div class="card mb-3">
		        <div class="card-header">
		          <i class="fa fa-home"></i> Member's Profile
		        </div>
	          	<div class="card-body">
					<form action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post'>

						<table align="center" >
							<tr>
								<div>
								<td colspan=2 bgcolor="gray"><font color="white"><label for='ch_mem_ch'>Name of Present Local Church:</label></td>
								<td colspan=2><select class="form-control" name='ch_mem_ch'>
								<?php
						 		echo "<option value='". $_GET["churchID"] ."'>" . $_GET["churchName"] . "</option>";         
								?>
								</select></td>
								</div>
								<div>
								<td bgcolor="gray"><font color="white"><label for='ch_mem_yrmem'>Year of Membership:</label></td>
								<td><input class="form-control" type='text' name='ch_mem_yrmem' maxlength="4" 
								<?php
								if($_SESSION['back'] == "0")
								{
									echo "value='". $ch_mem_yrmem ."'/></td>";
								}
								elseif($_SESSION['back'] == "1")
								{
									echo "value='". $_SESSION['ch_mem_yrmem'] ."'/></td>";
								}
								?>
								</div>
								<div>
								<td bgcolor="gray"><font color="white"><label for='ch_mem_position'>Ministry Position/Involvement:</label></td>
								<td><input class="form-control" type='text' name='ch_mem_position' maxlength="50" 
								<?php
								if($_SESSION['back'] == "0")
								{
									echo "value='". $ch_mem_position ."'/></td>";
								}
								elseif($_SESSION['back'] == "1")
								{
									echo "value='". $_SESSION['ch_mem_position'] ."'/></td>";
								}
								?>
								</div>
							</tr>
							<tr>
								<div>
								<td bgcolor="gray"><font color="white"><label for='ch_mem_yrconvert'>Year of Conversion:</label></td>
								<td><input class="form-control" type='text' name='ch_mem_yrconvert' maxlength="4" 
								<?php
								if($_SESSION['back'] == "0")
								{
									echo "value='". $ch_mem_yrconvert ."'/></td>";
								}
								elseif($_SESSION['back'] == "1")
								{
									echo "value='". $_SESSION['ch_mem_yrconvert'] ."'/></td>";
								}
								?>
								</div>
								<div>
								<td bgcolor="gray"><font color="white"><label for='ch_mem_yrbapt'>Year of Water Baptism:</label></td>
								<td><input class="form-control" type='text' name='ch_mem_yrbapt' maxlength="4" 
								<?php
								if($_SESSION['back'] == "0")
								{
									echo "value='". $ch_mem_yrbapt ."'/></td>";
								}
								elseif($_SESSION['back'] == "1")
								{
									echo "value='". $_SESSION['ch_mem_yrbapt'] ."'/></td>";
								}
								?>
								</div>
								<div>
								<td bgcolor="gray"><font color="white"><label for='ch_mem_prevrel'>Previous Religion:</label></td>
								<td><input class="form-control" type='text' name='ch_mem_prevrel' maxlength="50" 
								<?php
								if($_SESSION['back'] == "0")
								{
									echo "value='". $ch_mem_prevrel ."'/></td>";
								}
								elseif($_SESSION['back'] == "1")
								{
									echo "value='". $_SESSION['ch_mem_prevrel'] ."'/></td>";
								}
								?>
								</div>
								<div>
								<td bgcolor="gray"><font color="white"><label for='ch_mem_prevch'>Previous Church: <i>(if any)</i></label></td>
								<td><input class="form-control" type='text' name='ch_mem_prevch' maxlength="50" 
								<?php
								if($_SESSION['back'] == "0")
								{
									echo "value='". $ch_mem_prevch ."'/></td>";
								}
								elseif($_SESSION['back'] == "1")
								{
									echo "value='". $_SESSION['ch_mem_prevch'] ."'/></td>";
								}
								?>
								</div>
							</tr>
							<tr>
								<td bgcolor="gray"><font color="white"><label for="ch_mem_spiritual_gift">Spiritual Gifts:</label></td>
								<td colspan='5'><input class="form-control" placeholder="separate with comma (,)" type='text' name='ch_mem_spiritual_gift' maxlength="150" 
								<?php
								if($_SESSION['back'] == "0")
								{
									echo "value='". $ch_mem_spiritual_gift ."'/></td>";
								}
								elseif($_SESSION['back'] == "1")
								{
									echo "value='". $_SESSION['ch_mem_spiritual_gift'] ."'/></td>";
								}
								?>
							</tr>
							<tr>
								<td bgcolor="gray"><font color="white"><label for="ch_mem_skills">Skills:</label></td>
								<td colspan='5'><input class="form-control" placeholder="separate with comma (,)" type='text' name='ch_mem_skills' maxlength="150" 
								<?php
								if($_SESSION['back'] == "0")
								{
									echo "value='". $ch_mem_skills ."'/></td>";
								}
								elseif($_SESSION['back'] == "1")
								{
									echo "value='". $_SESSION['ch_mem_skills'] ."'/></td>";
								}
								?>
							</tr>
							<tr>
								<td bgcolor="gray"><font color="white"><label for="ch_mem_hobbies">Hobbies:</label></td>
								<td colspan='5'><input class="form-control" placeholder="separate with comma (,)" type='text' name='ch_mem_hobbies' maxlength="150" 
								<?php
								if($_SESSION['back'] == "0")
								{
									echo "value='". $ch_mem_hobbies ."'/></td>";
								}
								elseif($_SESSION['back'] == "1")
								{
									echo "value='". $_SESSION['ch_mem_hobbies'] ."'/></td>";
								}
								?>
							</tr>
							<tr>
								<td bgcolor="gray"><font color="white"><label for="ch_mem_health">Health:</label></td>
								<td colspan='5'><input class="form-control" placeholder="separate with comma (,)" type='text' name='ch_mem_health' maxlength="150" 
								<?php
								if($_SESSION['back'] == "0")
								{
									echo "value='". $ch_mem_health ."'/></td>";
								}
								elseif($_SESSION['back'] == "1")
								{
									echo "value='". $_SESSION['ch_mem_health'] ."'/></td>";
								}
								?>
							</tr>
							<tr>
								<td bgcolor="gray"><font color="white"><label for="ch_mem_other_info">Other Info:</label></td>
								<td colspan='5'>
								<?php
								if($_SESSION['back'] == "0")
								{
									echo "<textarea rows='4' cols='50' name='ch_mem_other_info' maxlength='1000'>" . $ch_mem_other_info . "</textarea></td>";
								}
								elseif($_SESSION['back'] == "1")
								{
									echo "<textarea rows='4' cols='50' name='ch_mem_other_info' maxlength='1000'>" . $_SESSION['ch_mem_other_info'] . "</textarea></td>";
								}
								?>
							</tr>
							<tr>
								<div>
								<td bgcolor="gray"><font color="white"><label for='ch_mem_interview'>Interviewed by:</label></td>
								<td><input class="form-control" type='text' name='ch_mem_interview' maxlength="50" 
								<?php
								if($_SESSION['back'] == "0")
								{
									echo "value='". $ch_mem_interview ."'/></td>";
								}
								elseif($_SESSION['back'] == "1")
								{
									echo "value='". $_SESSION['ch_mem_interview'] ."'/></td>";
								}
								?>
								</div>
								<div>
								<td bgcolor="gray"><font color="white"><label for='ch_mem_approve'>Approved by:</label></td>
								<td><input class="form-control" type='text' name='ch_mem_approve' maxlength="50" 
								<?php
								if($_SESSION['back'] == "0")
								{
									echo "value='". $ch_mem_approve ."'/></td>";
								}
								elseif($_SESSION['back'] == "1")
								{
									echo "value='". $_SESSION['ch_mem_approve'] ."'/></td>";
								}
								?>
								</div>
							</tr>
							<tr>
								<div>
								<td bgcolor="gray"><font color="white"><label for='ch_mem_date_accept'>Date of Acceptance:</label></td>
								<td><input class="form-control" type='date' name='ch_mem_date_accept' maxlength="50" 
								<?php
								if($_SESSION['back'] == "0")
								{
									echo "value='". $ch_mem_date_accept ."'/></td>";
								}
								elseif($_SESSION['back'] == "1")
								{
									echo "value='". $_SESSION['ch_mem_date_accept'] ."'/></td>";
								}
								?>
								</div>
								<div>
								<td bgcolor="gray"><font color="white"><label for='ch_mem_place_accept'>Place of Acceptance:</label></td>
								<td colspan=3><input class="form-control" type='text' name='ch_mem_place_accept' maxlength="50"
								<?php
								if($_SESSION['back'] == "0")
								{
									echo "value='". $ch_mem_place_accept ."'/></td>";
								}
								elseif($_SESSION['back'] == "1")
								{
									echo "value='". $_SESSION['ch_mem_place_accept'] ."'/></td>";
								}
								?>
								</div>
							</tr>
							<tr>
								<div>
								<td bgcolor="gray"><font color="white"><label for='ch_mem_status'>Status:</label></td>
								<td><select class="form-control" name='ch_mem_status'>
									<?php
									if($_SESSION['back'] == "0")
									{
										echo "<option value='". $ch_mem_status ."' selected>". $ch_mem_status ."</option>";
									}
									elseif($_SESSION['back'] == "1")
									{
										echo "<option value='". $_SESSION['ch_mem_status'] ."' selected>". $_SESSION['ch_mem_status'] ."</option>";
									}
									?>
								<option value='Active'>Active</option>
								<option value='Inactive'>Inactive</option>
								<option value='(Deceased)'>(Deceased)</option>
								</select></td>
								</div>
							</tr>
						</table>
							<br><br>
							<input class="form-control" name='churchID' maxlength="50" value="<?php echo $_GET['churchID'] ?>" hidden/>
							<input class="form-control" name='churchName' maxlength="50" value="<?php echo $_GET['churchName'] ?>" hidden/>
							<input class="form-control" name='memID' maxlength="50" value="<?php echo $_GET['memID'] ?>" hidden/>
							<input class="btn btn-primary" type='submit' name='submitted' value='Save'/>
							<input class="btn btn-primary" type='submit' name='back' value='Back'/>	
					</form>	
				</div>
		  	</div>
		</div>
	</div>
	<?php
	include 'footer.php';
	?>