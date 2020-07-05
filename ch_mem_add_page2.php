<?php
include 'header.php';
require_once ("include/membersite_config.php");

if(isset($_POST['submitted']))
{
	
//church member children
	$fgmembersite->tablename = 'tbl_ch_mem_children';
    $fgmembersite->DBlogin();
    $ch_mem_cdn_delete = mysqli_query($fgmembersite->connection, "DELETE from tbl_ch_mem_children where cdn_mem_id = 'contain'");
    mysqli_query($fgmembersite->connection, $ch_mem_cdn_delete);
        $cnt=1;
    
        do
        {
            $ch_mem_cdn_fullname =  'ch_mem_cdn_fullname' . $cnt;
            $ch_mem_cdn_bday =  'ch_mem_cdn_bday' . $cnt;
            $ch_mem_cdn_cstatus =  'ch_mem_cdn_cstatus' . $cnt;

            if (isset($_POST[$ch_mem_cdn_fullname]))
            {
                $ch_mem_cdn_insert_query = 'insert into tbl_ch_mem_children(
                    cdn_fullname,
                    cdn_bday,
                    cdn_cstatus,
                    cdn_mem_id
                    )
                    values
                    (
                    "' . $_POST[$ch_mem_cdn_fullname] . '",
                    "' . $_POST[$ch_mem_cdn_bday] . '",
                    "' . $_POST[$ch_mem_cdn_cstatus] . '",
                    "contain"
                    )';

                mysqli_query($fgmembersite->connection, $ch_mem_cdn_insert_query);
            }
            else
            {
                break;
            }

            $cnt++;

        } while (!empty($ch_mem_cdn_fullname));

        //church member education
	$fgmembersite->tablename = 'tbl_ch_mem_education';
    $fgmembersite->DBlogin();
    $ch_mem_educ_delete = mysqli_query($fgmembersite->connection, "DELETE from tbl_ch_mem_education where educ_mem_id = 'contain'");
    mysqli_query($fgmembersite->connection, $ch_mem_educ_delete);
        $cnt=1;
    
        do
        {
            $ch_mem_educ_school =  'ch_mem_educ_school' . $cnt;
            $ch_mem_educ_year =  'ch_mem_educ_year' . $cnt;
            $ch_mem_educ_course =  'ch_mem_educ_course' . $cnt;

            if (isset($_POST[$ch_mem_educ_school]))
            {
                $ch_mem_educ_insert_query = 'insert into tbl_ch_mem_education(
                    educ_school,
                    educ_year,
                    educ_level,
                    educ_mem_id
                    )
                    values
                    (
                    "' . $_POST[$ch_mem_educ_school] . '",
                    "' . $_POST[$ch_mem_educ_year] . '",
                    "' . $_POST[$ch_mem_educ_course] . '",
                    "contain"
                    )';

                mysqli_query($fgmembersite->connection, $ch_mem_educ_insert_query);
            }
            else
            {
                break;
            }

            $cnt++;

        } while (!empty($ch_mem_educ_school));

         //church member training
	$fgmembersite->tablename = 'tbl_ch_mem_training';
    $fgmembersite->DBlogin();
    $ch_mem_trn_delete = mysqli_query($fgmembersite->connection, "DELETE from tbl_ch_mem_training where trn_mem_id = 'contain'");
    mysqli_query($fgmembersite->connection, $ch_mem_trn_delete);
        $cnt=1;
    
        do
        {
            $ch_mem_train_name =  'ch_mem_train_name' . $cnt;
            $ch_mem_train_year =  'ch_mem_train_year' . $cnt;
            $ch_mem_train_title =  'ch_mem_train_title' . $cnt;

            if (isset($_POST[$ch_mem_train_name]))
            {
                $ch_mem_train_insert_query = 'insert into tbl_ch_mem_training(
                    trn_name,
                    trn_year,
                    trn_title,
                    trn_mem_id
                    )
                    values
                    (
                    "' . $_POST[$ch_mem_train_name] . '",
                    "' . $_POST[$ch_mem_train_year] . '",
                    "' . $_POST[$ch_mem_train_title] . '",
                    "contain"
                    )';

                mysqli_query($fgmembersite->connection, $ch_mem_train_insert_query);
            }
            else
            {
                break;
            }

            $cnt++;

        } while (!empty($ch_mem_train_name));

	echo '<script language="javascript">';
    echo 'location.href="ch_mem_add_page3.php?churchID='. $_POST['churchID'] .'&churchName='. $_POST['churchName'] .'&chDivName='. $_SESSION['chDivName'] .'&chDtcName='. $_SESSION['chDtcName'] .'&chDivID='. $_SESSION['chDivID'] .'&chDtcID='. $_SESSION['chDtcID'] .'"';
    echo '</script>';
}
	
		$_SESSION['chDivName'] = $_GET['chDivName'];
		$_SESSION['chDtcName'] = $_GET['chDtcName'];
		$_SESSION['chDivID'] = $_GET['chDivID'];
		$_SESSION['chDtcID'] = $_GET['chDtcID'];
?>

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <?php if ($_SESSION["chDivName"]=="")
					{
						echo "<a href='ch_menu.php?chDivName=-&chDivID=0&chDtcName=". $_SESSION['username_of_user'] ."&chDtcID=". $_SESSION['dtc_id'] ."'>Churches</a>";
					}
					else
					{
						echo "<a href='ch_menu.php?chDivName=". $_SESSION['chDivName']."&chDivID=". $_SESSION['chDivID'] ."&chDtcName=". $_SESSION['chDtcName'] ."&chDtcID=". $_SESSION['chDtcID'] ."'>Churches</a>";
					}
					?>
        </li>
         <li class="breadcrumb-item">
          <a href="ch_menu.php?chDivName=<?php echo $_GET['chDivName']; ?>&chDtcName=<?php echo $_GET['chDtcName']; ?>&chDivID=<?php echo $_GET['chDivID']; ?>&chDtcID=<?php echo $_GET['chDtcID']; ?>"><?php echo $_GET['chDivName']; ?></a>
        </li>
        <li class="breadcrumb-item">
          <a href="ch_mem_menu.php?churchID=<?php echo $_GET['churchID']; ?>&churchName=<?php echo $_GET['churchName']; ?>&chDivName=<?php echo $_GET['chDivName']; ?>&chDtcName=<?php echo $_GET['chDtcName']; ?>&chDivID=<?php echo $_GET['chDivID']; ?>&chDtcID=<?php echo $_GET['chDtcID']; ?>"><?php echo $_GET['churchName']; ?></a>
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

					<table id="ch_mem_cdn_data_table" frame="box">
						<tr>
						<td colspan='2' height="50" valign="top"><label><b>Children Living</b></label></td>
						<td align="right"><input class="btn btn-success btn-sm" type="button" class="Save" onclick="add_new_ch_mem_cdn();" value="Add"></td>
						<td><input class='btn btn-danger btn-sm' type='button' value='Remove' class='ch_mem_cdn_delete' onclick='ch_mem_cdn_delete_row()'></td>
						</tr>
						<div>
							<tr align=center>
								<th>Name of Children</th>
								<th>Date of Birth</th>
								<th>Civil Status</th>
								<th></th>
							</tr>
						</div>
						<div>
							<?php
							$fgmembersite->DBlogin();
			                  $query = "SELECT * FROM tbl_ch_mem_children where cdn_mem_id = 'contain'";
			                  $result = mysqli_query($fgmembersite->connection, $query);
			                  if ($result->num_rows > 0)
			                    {
			                    	$rcnt = 1;
			                    while ($row = $result->fetch_assoc())
			                      {
			                      echo "<tr id='ch_mem_cdn_row". $rcnt ."'>";
			                      echo "<td> <input class='form-control' type='text' name='ch_mem_cdn_fullname".$rcnt ."' value='". $row["cdn_fullname"] . "'</td>";
			                      echo "<td> <input class='form-control' type='date' name='ch_mem_cdn_bday".$rcnt ."' value='". $row["cdn_bday"] . "'</td>";
			                      echo "<td> <select class='form-control' name='ch_mem_cdn_cstatus".$rcnt."'><option value='". $row["cdn_cstatus"] ."'>". $row["cdn_cstatus"] ."</option><option value='Single'>Single</option><option value='Married'>Married</option><option value='Widow/er'>Widow/er</option><option value='Single Parent'>Single Parent</option><option value='Separated'>Separated</option><option value='Annulled'>Annulled</option></select></td>";
			                      echo "<td></td>";
			                      echo "</tr>";

			                      $rcnt ++;
			                      }
			                    }
							?>
							<tr>
							<td><input class="form-control" type="text" id="new_ch_mem_cdn_fullname" hidden></td>
							<td><input class="form-control" type="text" id="new_ch_mem_cdn_bday" hidden></td>
							<td><select class="form-control" id='new_ch_mem_cdn_cstatus' hidden>
							<option value='Single' selected>Single</option>
							<option value='Married'>Married</option>
							<option value='Widow/er'>Widow/er</option>
							<option value='Single Parent'>Single Parent</option>
							<option value='Separated'>Separated</option>
							<option value='Annulled'>Annulled</option>
							</select></td>
							<td><input class="btn btn-success btn-sm" type="button" class="add" onclick="add_new_ch_mem_cdn();" value="Save" hidden></td>
							</tr>
						</div>
					</table>
					<br><br>
					<table id="ch_mem_educ_data_table" frame="box">
						<tr>
						<td colspan='2' height="50" valign="top"><label><b>Educational Attainment</b></label></td>
						<td align="right"><input class="btn btn-success btn-sm" type="button" class="Save" onclick="add_new_ch_mem_educ();" value="Add"></td>
						<td><input class='btn btn-danger btn-sm' type='button' value='Remove' class='ch_mem_educ_delete' onclick='ch_mem_educ_delete_row()'></td>
						</tr>
						<div>
							<tr align=center>
								<th>Name of School</th>
								<th>Year Graduated</th>
								<th>Course/Degree</th>
								<th></th>
							</tr>
						</div>
						<div>
							<?php
							$fgmembersite->DBlogin();
			                  $query = "SELECT * FROM tbl_ch_mem_education where educ_mem_id = 'contain'";
			                  $result = mysqli_query($fgmembersite->connection, $query);
			                  if ($result->num_rows > 0)
			                    {
			                    	$rcnt = 1;
			                    while ($row = $result->fetch_assoc())
			                      {
			                      echo "<tr id='ch_mem_educ_row". $rcnt ."'>";
			                      echo "<td> <input class='form-control' type='text' name='ch_mem_educ_school".$rcnt ."' value='". $row["educ_school"] . "'</td>";
			                      echo "<td> <input class='form-control' type='text' name='ch_mem_educ_year".$rcnt ."' value='". $row["educ_year"] . "'</td>";
			                      echo "<td> <input class='form-control' type='text' name='ch_mem_educ_course".$rcnt ."' value='". $row["educ_level"] . "'</td>";
			                      echo "<td></td>";
			                      echo "</tr>";

			                      $rcnt ++;
			                      }
			                    }
							?>
							<tr>
							<td><input class="form-control" type="text" id="new_ch_mem_educ_school" hidden></td>
							<td><input class="form-control" type="text" id="new_ch_mem_educ_year" hidden></td>
							<td><input class="form-control" type="text" id="new_ch_mem_educ_course" hidden></td>
							<td><input class="btn btn-success btn-sm" type="button" class="add" onclick="add_new_ch_mem_educ();" value="Save" hidden></td>
							</tr>
						</div>
					</table>
					<br><br>
					<table id="ch_mem_train_data_table" frame="box">
						<tr>
						<td colspan='2' height="50" valign="top"><label><b>Training with Certificate</b></label></td>
						<td align="right"><input class="btn btn-success btn-sm" type="button" class="Save" onclick="add_new_ch_mem_train();" value="Add"></td>
						<td><input class='btn btn-danger btn-sm' type='button' value='Remove' class='ch_mem_train_delete' onclick='ch_mem_train_delete_row()'></td>
						</tr>
						<div>
							<tr align=center>
								<th>Name of Training</th>
								<th>Year Taken/Completed </th>
								<th>Title/Designation</th>
								<th></th>
							</tr>
						</div>
						<div>
							<?php
							$fgmembersite->DBlogin();
			                  $query = "SELECT * FROM tbl_ch_mem_training where trn_mem_id = 'contain'";
			                  $result = mysqli_query($fgmembersite->connection, $query);
			                  if ($result->num_rows > 0)
			                    {
			                    	$rcnt = 1;
			                    while ($row = $result->fetch_assoc())
			                      {
			                      echo "<tr id='ch_mem_train_row". $rcnt ."'>";
			                      echo "<td> <input class='form-control' type='text' name='ch_mem_train_name".$rcnt ."' value='". $row["trn_name"] . "'</td>";
			                      echo "<td> <input class='form-control' type='text' name='ch_mem_train_year".$rcnt ."' value='". $row["trn_year"] . "'</td>";
			                      echo "<td> <input class='form-control' type='text' name='ch_mem_train_title".$rcnt ."' value='". $row["trn_title"] . "'</td>";
			                      echo "<td></td>";
			                      echo "</tr>";

			                      $rcnt ++;
			                      }
			                    }
							?>
							<tr>
							<td><input class="form-control" type="text" id="new_ch_mem_train_name" hidden></td>
							<td><input class="form-control" type="text" id="new_ch_mem_train_year" hidden></td>
							<td><input class="form-control" type="text" id="new_ch_mem_train_title" hidden></td>
							<td><input class="btn btn-success btn-sm" type="button" class="add" onclick="add_new_ch_mem_train();" value="Save" hidden></td>
							</tr>
						</div>
					</table>
					
						<br><br>

						<font color=red size='2'>*Note: The information above will not be save when you go back to the previous page.</font>
						<br><br>
						<input class="form-control" name='churchID' maxlength="50" value="<?php echo $_GET['churchID'] ?>" hidden/>
						<input class="form-control" name='churchName' maxlength="50" value="<?php echo $_GET['churchName'] ?>" hidden/>
						<input class="btn btn-primary" type='submit' name='submitted' value='Next'/>
						<input class="btn btn-primary" type="button" onclick="location.href='ch_mem_add.php?churchID=<?php echo $_GET['churchID']; ?>&churchName=<?php echo $_GET['churchName']; ?>&chDivName=<?php echo $_GET['chDivName']; ?>&chDtcName=<?php echo $_GET['chDtcName']; ?>&chDivID=<?php echo $_GET['chDivID']; ?>&chDtcID=<?php echo $_GET['chDtcID']; ?>';" value="Back" />	
				</form>
			</div>
	  	</div>
	</div>
</div>
<?php
include 'footer.php';
?>