<?php
include 'header.php';
require_once ("include/membersite_config.php");

if(isset($_POST['submitted']))
{
	if($fgmembersite->UpdateMinister())
	{
		echo '<script language="javascript">';
	    echo 'alert("Minister successfully updated!"); location.href="min_menu.php"';
	    echo '</script>';			
	}
} elseif (isset($_POST['back'])) 
	{
		$_SESSION['back'] = "1";
		echo '<script language="javascript">';
	    echo 'location.href="min_edit.php?ministerID='. $_SESSION['min_ID'] .'"';
	    echo '</script>';
	}

echo"
<div class='content-wrapper'>
    <div class='container-fluid'>
      <!-- Breadcrumbs-->
      <ol class='breadcrumb'>
        <li class='breadcrumb-item'>
          <a href='min_menu.php'>Minister</a>
        </li>
        <li class='breadcrumb-item'>
          <a href='min_edit.php?ministerID=". $_SESSION['min_ID'] ."'>Edit Minister</a>
        </li>
        <li class='breadcrumb-item active'>". $_SESSION['fullname'] ."</li>
      </ol>
      <!-- Example DataTables Card-->
      	<div class='card mb-3'>
	        <div class='card-header'>
	          <i class='fa fa-home'></i> Minister
	        </div>
          	<div class='card-body'>
				<form action='". $fgmembersite->GetSelfScript() ."' method='post'>

					<table id='cdn_data_table' frame='box'>
						<tr>
						<td colspan='6' height='50' valign='top'><label><b>Children Information</b></label></td>
						<td align='right'><input class='btn btn-success btn-sm' type='button' class='Save' onclick='add_new_cdn();' value='Add'></td>
						<td><input class='btn btn-danger btn-sm' type='button' value='Remove' class='cdn_delete' onclick='cdn_delete_row()'></td>
						</tr>
						<div>
							<tr align=center>
								<th>Full Name</th>
								<th>Birthday</th>
								<th>Civil Status:</th>
								<th>Contact #</th>
								<th>Email Add</th>
								<th>School/Course</th>
								<th>Level/Occupation</th>
								<th></th>
							</tr>
						</div>
						<div>
							";
							 $fgmembersite->DBlogin();
			                  $query = "SELECT * FROM tbl_min_children where cdn_min_id = $_SESSION[min_ID]";
			                  $result = mysqli_query($fgmembersite->connection, $query);
			                  if ($result->num_rows > 0)
			                    {
			                    	$rcnt = 1;
			                    while ($row = $result->fetch_assoc())
			                      {
			                      echo "<tr id='cdn_row". $rcnt ."'>";
			                      echo "<td> <input class='form-control' type='text' name='cdn_fullname".$rcnt ."' value='". $row["cdn_fullname"] . "'</td>";
			                      echo "<td> <input class='form-control' type='text' name='cdn_bday".$rcnt ."' value='". $row["cdn_bday"] . "'</td>";
			                      echo "<td> <select class='form-control' name='cdn_cstatus".$rcnt."'><option value='". $row["cdn_cstatus"] ."'>". $row["cdn_cstatus"] ."</option><option value='Single'>Single</option><option value='Married'>Married</option><option value='Widow/er'>Widow/er</option><option value='Single Parent'>Single Parent</option><option value='Separated'>Separated</option><option value='Annulled'>Annulled</option></select></td>";
			                      echo "<td> <input class='form-control' type='text' name='cdn_contact".$rcnt ."' value='". $row["cdn_contact"] . "'</td>";
			                      echo "<td> <input class='form-control' type='text' name='cdn_email".$rcnt ."' value='". $row["cdn_email"] . "'</td>";
			                      echo "<td> <input class='form-control' type='text' name='cdn_course".$rcnt ."' value='". $row["cdn_course"] . "'</td>";
			                      echo "<td> <input class='form-control' type='text' name='cdn_occupation".$rcnt ."' value='". $row["cdn_occupation"] . "'</td>";
			                      echo "<td></td>";
			                      echo "</tr>";

			                      $rcnt ++;
			                      }
			                    }
							echo"
							<tr>
							<td><input class='form-control' type='text' id='new_cdn_fullname'  hidden></td>
							<td><input class='form-control' type='date' id='new_cdn_bday' hidden></td>
							<td><select class='form-control' id='new_cdn_cstatus' hidden>
							<option value='Single' selected>Single</option>
							<option value='Married'>Married</option>
							<option value='Widow/er'>Widow/er</option>
							<option value='Single Parent'>Single Parent</option>
							<option value='Separated'>Separated</option>
							<option value='Annulled'>Annulled</option>
							</select></td>
							<td><input class='form-control' type='text' id='new_cdn_contact' hidden></td>
							<td><input class='form-control' type='email' id='new_cdn_email' hidden></td>
							<td><input class='form-control' type='text' id='new_cdn_course' hidden></td>
							<td><input class='form-control' type='text' id='new_cdn_occupation' hidden></td>
							<td><input class='btn btn-success btn-sm' type='button' class='add' onclick='add_new_cdn();' value='Save' hidden></td>
							</tr>
						</div>
					</table>
					<br><br>
					<table id='educ_data_table' frame='box'>
						<tr>
						<td colspan='4' height='50' valign='top'><label><b>Educational Attainment</b></label></td>
						<td align='right'><input class='btn btn-success btn-sm' type='button' class='Save' onclick='add_new_educ();' value='Add'></td>
						<td><input class='btn btn-danger btn-sm' type='button' value='Remove' class='educ_delete' onclick='educ_delete_row()'></td>
						</tr>
						<div>
							<tr align=center>
								<th>Year</th>
								<th>Name of School</th>
								<th>Level/Course/Degree</th>
								<th>Remarks</th>
								<th>Category</th>
								<th></th>
							</tr>
						</div>
						<div>
							";
							 $fgmembersite->DBlogin();
			                  $query = "SELECT * FROM tbl_min_education where educ_min_id = $_SESSION[min_ID]";
			                  $result = mysqli_query($fgmembersite->connection, $query);
			                  if ($result->num_rows > 0)
			                    {
			                    	$rcnt = 1;
			                    while ($row = $result->fetch_assoc())
			                      {
			                      echo "<tr id='educ_row". $rcnt ."'>";
			                      echo "<td> <input class='form-control' type='text' name='educ_year".$rcnt ."' value='". $row["educ_year"] . "'</td>";
			                      echo "<td> <input class='form-control' type='text' name='educ_school".$rcnt ."' value='". $row["educ_school"] . "'</td>";
			                      echo "<td> <input class='form-control' type='text' name='educ_level".$rcnt ."' value='". $row["educ_level"] . "'</td>";
			                      echo "<td> <input class='form-control' type='text' name='educ_remarks".$rcnt ."' value='". $row["educ_remarks"] . "'</td>";
			                      echo "<td> <select class='form-control' name='educ_category".$rcnt."'><option value='". $row["educ_category"] ."'>". $row["educ_category"] ."</option><option value='Theological'>Theological</option><option value='Secular'>Secular</option></select></td>";
			                      echo "<td></td>";
			                      echo "</tr>";

			                      $rcnt ++;
			                      }
			                    }
							echo"
							<tr>
							<td><input class='form-control' type='text' id='new_educ_year' hidden></td>
							<td><input class='form-control' type='text' id='new_educ_school' hidden></td>
							<td><input class='form-control' type='text' id='new_educ_level' hidden></td>
							<td><input class='form-control' type='text' id='new_educ_remarks' hidden></td>
							<td><select class='form-control' id='new_educ_category' hidden>
							<option value='Theological' selected>Theological</option>
							<option value='Secular'>Secular</option>
							</select></td>

							<td><input class='btn btn-success btn-sm' type='button' class='add' onclick='add_new_educ();' value='Save' hidden></td>
							</tr>
						</div>
					</table>
						<br><br>
					<table id='work_data_table' frame='box'>
						<tr>
						<td colspan='3' height='50' valign='top'><label><b>Work Experience (Past to Present)</b></label></td>
						<td align='right'><input class='btn btn-success btn-sm' type='button' class='Save' onclick='add_new_work();' value='Add'></td>
						<td><input class='btn btn-danger btn-sm' type='button' value='Remove' class='work_delete' onclick='work_delete_row()'></td>
						</tr>
						<div>
							<tr align=center>
								<th>Year</th>
								<th>Company</th>
								<th>Address</th>
								<th>Position</th>
								<th></th>
							</tr>
						</div>
						<div>
						";
							 $fgmembersite->DBlogin();
			                  $query = "SELECT * FROM tbl_min_work where wrk_min_id = $_SESSION[min_ID]";
			                  $result = mysqli_query($fgmembersite->connection, $query);
			                  if ($result->num_rows > 0)
			                    {
			                    	$rcnt = 1;
			                    while ($row = $result->fetch_assoc())
			                      {
			                      echo "<tr id='work_row". $rcnt ."'>";
			                      echo "<td> <input class='form-control' type='text' name='work_year".$rcnt ."' value='". $row["wrk_year"] . "'</td>";
			                      echo "<td> <input class='form-control' type='text' name='work_company".$rcnt ."' value='". $row["wrk_company"] . "'</td>";
			                      echo "<td> <input class='form-control' type='text' name='work_address".$rcnt ."' value='". $row["wrk_address"] . "'</td>";
			                      echo "<td> <input class='form-control' type='text' name='work_position".$rcnt ."' value='". $row["wrk_position"] . "'</td>";
			                      echo "<td></td>";
			                      echo "</tr>";

			                      $rcnt ++;
			                      }
			                    }
							echo"
							<tr>
							<td><input class='form-control' type='text' id='new_work_year' hidden></td>
							<td><input class='form-control' type='text' id='new_work_company' hidden></td>
							<td><input class='form-control' type='text' id='new_work_address' hidden></td>
							<td><input class='form-control' type='text' id='new_work_position' hidden></td>
							<td><input class='btn btn-success btn-sm' type='button' class='add' onclick='add_new_work();' value='Save' hidden></td>
							</tr>
						</div>
					</table>
						<br><br>
					<table id='mty_data_table' frame='box'>
						<tr>
						<td colspan='4' height='50' valign='top'><label><b>Ministry History</b></label></td>
						<td align='right'><input class='btn btn-success btn-sm' type='button' class='Save' onclick='add_new_mty();' value='Add'></td>
						<td><input class='btn btn-danger btn-sm' type='button' value='Remove' class='mty_delete' onclick='mty_delete_row()'></td>
						</tr>
						<div>
							<tr align=center>
								<th>Church/Organization</th>
								<th>Address</th>
								<th>Year</th>
								<th>Position</th>
								<th>Reason for Leaving</th>
								<th></th>
							</tr>
						</div>
						<div>
						";
							 $fgmembersite->DBlogin();
			                  $query = "SELECT * FROM tbl_min_mty where mty_min_id = $_SESSION[min_ID]";
			                  $result = mysqli_query($fgmembersite->connection, $query);
			                  if ($result->num_rows > 0)
			                    {
			                    	$rcnt = 1;
			                    while ($row = $result->fetch_assoc())
			                      {
			                      echo "<tr id='mty_row". $rcnt ."'>";
			                      echo "<td> <input class='form-control' type='text' name='mty_church".$rcnt ."' value='". $row["mty_church"] . "'</td>";
			                      echo "<td> <input class='form-control' type='text' name='mty_address".$rcnt ."' value='". $row["mty_address"] . "'</td>";
			                      echo "<td> <input class='form-control' type='text' name='mty_year".$rcnt ."' value='". $row["mty_year"] . "'</td>";
			                      echo "<td> <input class='form-control' type='text' name='mty_position".$rcnt ."' value='". $row["mty_position"] . "'</td>";
			                      echo "<td> <input class='form-control' type='text' name='mty_reason".$rcnt ."' value='". $row["mty_reason"] . "'</td>";
			                      echo "<td></td>";
			                      echo "</tr>";
			                      $rcnt ++;
			                      }
			                    }
							echo"
							<tr>
							<td><input class='form-control' type='text' id='new_mty_church' hidden></td>
							<td><input class='form-control' type='text' id='new_mty_address' hidden></td>
							<td><input class='form-control' type='text' id='new_mty_year' hidden></td>
							<td><input class='form-control' type='text' id='new_mty_position' hidden></td>
							<td><input class='form-control' type='text' id='new_mty_reason' hidden></td>
							<td><input class='btn btn-success btn-sm' type='button' class='add' onclick='add_new_mty();' value='Save' hidden></td>
							</tr>
						</div>
					</table>
						<br><br>
					<table id='relb_data_table' frame='box'>
						<tr>
						<td colspan='2' height='50' valign='top'><label><b>Religious Backgroud</b></label></td>
						<td align='right'><input class='btn btn-success btn-sm' type='button' class='Save' onclick='add_new_relb();' value='Add'></td>
						<td><input class='btn btn-danger btn-sm' type='button' value='Remove' class='relb_delete' onclick='relb_delete_row()'></td>
						</tr>
						<div>
							<tr align=center>
								<th>Nurturing Church</th>
								<th>City/Municipality</th>
								<th>Mentoring Pastor</th>
								<th></th>
							</tr>
						</div>
						<div>
						";
							 $fgmembersite->DBlogin();
			                  $query = "SELECT * FROM tbl_min_relb where relb_min_id = $_SESSION[min_ID]";
			                  $result = mysqli_query($fgmembersite->connection, $query);
			                  if ($result->num_rows > 0)
			                    {
			                    	$rcnt = 1;
			                    while ($row = $result->fetch_assoc())
			                      {
			                      echo "<tr id='relb_row". $rcnt ."'>";
			                      echo "<td> <input class='form-control' type='text' name='relb_church".$rcnt ."' value='". $row["relb_church"] . "'</td>";
			                      echo "<td> <input class='form-control' type='text' name='relb_municipality".$rcnt ."' value='". $row["relb_municipality"] . "'</td>";
			                      echo "<td> <input class='form-control' type='text' name='relb_mentoring".$rcnt ."' value='". $row["relb_mentoring"] . "'</td>";
			                      echo "<td></td>";
			                      echo "</tr>";
			                      $rcnt ++;
			                      }
			                    }
							echo"
							<tr>
							<td><input class='form-control' type='text' id='new_relb_church' hidden></td>
							<td><input class='form-control' type='text' id='new_relb_municipality' hidden></td>
							<td><input class='form-control' type='text' id='new_relb_mentoring' hidden></td>
							<td><input class='btn btn-success btn-sm' type='button' class='add' onclick='add_new_relb();' value='Save' hidden></td>
							</tr>
						</div>
					</table>
						<br><br>

						<font color=red size='2'>*Note: The information above will not be save when you go back to the previous page.</font>
						<br><br>
						<input class='btn btn-primary' type='submit' name='submitted' value='Save' onclick='return confirm('Are you sure you want to add Minister?')'/>

						<input class='btn btn-primary' type='submit' name='back' value='Back' />	
				</form>
			</div>
	  	</div>
	</div>
</div>

";
include 'footer.php';
?>