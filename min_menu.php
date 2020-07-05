<?php
include 'header.php';
require_once ("include/membersite_config.php");
//page 1 variables on SESSION
  $_SESSION['fullname'] = "";
  $_SESSION['nickname'] = "";
  $_SESSION['bday'] = "";
  $_SESSION['address'] = "";
  $_SESSION['bplace'] = "";
  $_SESSION['citizenship'] = "";
  $_SESSION['occupation'] = "";
  $_SESSION['contact'] = "";
  $_SESSION['email'] = "";
  $_SESSION['cstatus'] = "Single";
  $_SESSION['gender'] = "Male";
  $_SESSION['category'] = "ATP";
  $_SESSION['cnumber'] = "";
  $_SESSION['yearordained'] = "";
  $_SESSION['language'] = "";
  $_SESSION['tin'] = "";
  $_SESSION['sss'] = "";
  $_SESSION['bloodtype'] = "";
  $_SESSION['spiritualgift'] = "";
  $_SESSION['skills'] = "";
  $_SESSION['hobbies'] = "";
  $_SESSION['health'] = "";
  $_SESSION['otherinfo'] = "";
  $_SESSION['min_dtc_id'] = "0";
  $_SESSION["min_dtc_name"] = "Select";
  $_SESSION["min_status"] = "Active";
  //spouse
  $_SESSION['sp_fullname'] = "";
  $_SESSION['sp_nickname'] = "";
  $_SESSION['sp_bday'] = "";
  $_SESSION['sp_date_marriage'] = "";
  $_SESSION['sp_citizenship'] = "";
  $_SESSION['sp_occupation'] = "";
  $_SESSION['sp_contact'] = "";
  $_SESSION['sp_email'] = "";
  $_SESSION['$min_ID'] = "";

  $_SESSION['back'] = "0";
?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><b>Ministers List</b></li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
         <a class='btn btn-primary, pull-right' href='min_add.php'><b>Add Minister</b></a>
          </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead align=center bgcolor='#2ECC71'>
                <tr>
                  <th>Name</th>
                  <th>Church</th>
                  <th>District</th>
                  <th>Status</th>
                  <th>Profile</th>
                  <?php
                  if ($_SESSION['edit_minister'] == "1")
                      {
                         echo "<th>Edit</th>";
                      }
                  if ($_SESSION['delete_minister'] == "1")
                      {
                         echo "<th>Delete</th>";
                      }
                  ?>
                  <th>Transfer</th>
                </tr> 
              </thead>
              <tbody>
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

                      $query = "SELECT * FROM tbl_minister where min_dtc_id = '". $dtcID ."'";
                    
                    $ch_id = 0;
                  }
                  elseif($_SESSION['home_settings']=="1")
                  {
                    $query = "SELECT * FROM tbl_minister";
                  }
                  
                  $result = mysqli_query($fgmembersite->connection, $query);

                  if ($result->num_rows > 0)
                    {
                    while ($row = $result->fetch_assoc())
                      {

                         $dtcquery = "SELECT * FROM tbl_district where dtc_id = '". $row['min_dtc_id']."'"; 
                      $dtcresult = mysqli_query($fgmembersite->connection, $dtcquery);
                       if ($dtcresult->num_rows > 0)
                        {
                      while ($row1 = $dtcresult->fetch_assoc())
                          {
                              $dtc_name = $row1['dtc_name'];
                          }
                        }
                        else
                        {
                          $dtc_name = "N/A";
                        }

                        $chquery = "SELECT * FROM tbl_church where ch_id = '". $row['min_ch_id']."'"; 
                        $chresult = mysqli_query($fgmembersite->connection, $chquery);
                        if ($chresult->num_rows > 0)
                        {
                           while ($row2 = $chresult->fetch_assoc())
                          {
                            $ch_id = $row2['ch_id'];
                             $ch_name = $row2['ch_name'];
                          }
                        }
                        else
                        {
                          $ch_name = "N/A";
                        }
                      
                      echo "<tr>";
                      echo "<td>" . $row["min_fullname"] . "</td>";
                      echo "<td>" . $ch_name . "</td>";
                      echo "<td align=center>" . $dtc_name . "</td>";
                      echo "<td align=center>" . $row["min_status"] . "</td>";
                      echo "<td align=center>
                      <a href='min_summary.php?minID=". $row["min_id"] ."' onclick='basicPopup(this.href);return false' class='fa fa-user'></a>
                      </td>";

                      if ($_SESSION['edit_minister'] == "1")
                      {
                      echo '<td align="center"><a href="min_edit.php?ministerID='. $row["min_id"] .'"><i class="fa fa-pencil" /></a></td>';
                      }
                      if ($_SESSION['delete_minister'] == "1")
                      {
                      echo '<td align="center"><A HREF="min_delete.php?ministerID='. $row["min_id"] .'" onclick="return confirm(\'The file will be deleted when you click OK\')"><i class="fa fa-trash" /></A></td>';
                      }
                      echo '<td align="center"><A HREF="min_move.php?minID='. $row["min_id"] .'&chID='. $ch_id .'&chName='. $ch_name .'"><i class="fa fa-arrow-right" /></A></td>';
                      echo "</tr>";
                      }
                    }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
include 'footer.php';
?>
