<?php
include 'header.php';
require_once ("include/membersite_config.php");
//page 1 variables on SESSION
  $_SESSION['ch_mem_fullname'] = "";
  $_SESSION['ch_mem_address'] = "";
  $_SESSION['ch_mem_bday'] = "";
  $_SESSION['ch_mem_bplace'] = "";
  $_SESSION['ch_mem_citizenship'] = "";
  $_SESSION['ch_mem_sss'] = "";
  $_SESSION['ch_mem_tin'] = "";
  $_SESSION['ch_mem_gender'] = "Male";
  $_SESSION['ch_mem_cstatus'] = "Single";
  $_SESSION['ch_mem_occupation'] = "";
  $_SESSION['ch_mem_business'] = "";
  $_SESSION['ch_mem_contact'] = "";
  $_SESSION['ch_mem_email'] = "";
  //spouse
  $_SESSION['sp_fullname'] = "";
  $_SESSION['sp_bday'] = "";
  $_SESSION['sp_date_marriage'] = "";
  $_SESSION['sp_place_marriage'] = "";
  $_SESSION['$mem_ID'] = "";
  //page3
  $_SESSION['ch_mem_ch'] = "";
  $_SESSION['ch_mem_yrmem'] = "";
  $_SESSION['ch_mem_position'] = "";
  $_SESSION['ch_mem_yrconvert'] = "";
  $_SESSION['ch_mem_yrbapt'] = "";
  $_SESSION['ch_mem_prevrel'] = "";
  $_SESSION['ch_mem_prevch'] = "";
  $_SESSION['ch_mem_spiritual_gift'] = "";
  $_SESSION['ch_mem_skills'] = "";
  $_SESSION['ch_mem_hobbies'] = "";
  $_SESSION['ch_mem_health'] = "";
  $_SESSION['ch_mem_other_info'] = "";
  $_SESSION['ch_mem_interview'] = "";
  $_SESSION['ch_mem_approve'] = "";
  $_SESSION['ch_mem_date_accept'] = "";
  $_SESSION['ch_mem_place_accept'] = "";
  $_SESSION['ch_mem_status'] = "Active";

  $_SESSION['backAdd'] = "0";
  $_SESSION['back1'] = "0";
  $_SESSION['back'] = "0";


  $fgmembersite->tablename = 'tbl_ch_mem_children';
  $fgmembersite->DBlogin();
  $query_cdn = "DELETE FROM tbl_ch_mem_children where cdn_mem_id = 'contain'";
  mysqli_query($fgmembersite->connection, $query_cdn);

  $fgmembersite->tablename = 'tbl_ch_mem_education';
  $fgmembersite->DBlogin();
  $query_educ = "DELETE FROM tbl_ch_mem_education where educ_mem_id = 'contain'";
  $result = mysqli_query($fgmembersite->connection, $query_educ);

  $fgmembersite->tablename = 'tbl_ch_mem_training';
  $fgmembersite->DBlogin();
  $query_trn = "DELETE FROM tbl_ch_mem_training where trn_mem_id = 'contain'";
  $result = mysqli_query($fgmembersite->connection, $query_trn);


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
            echo "<a href='ch_menu.php?chDivName=-&chDivID=0&chDtcName=". $_SESSION['username_of_user'] ."&chDtcID=". $_SESSION['dtc_id'] ."'><b>Churches</b></a>";
          }
          else
          {
            echo "<a href='ch_menu.php?chDivName=". $_SESSION['chDivName']."&chDivID=". $_SESSION['chDivID'] ."&chDtcName=". $_SESSION['chDtcName'] ."&chDtcID=". $_SESSION['chDtcID'] ."'><b>Churches</b></a>";
          }
          ?>
        </li>
        <li class="breadcrumb-item">
          <a href="ch_menu.php?chDivName=<?php echo $_GET['chDivName']; ?>&chDtcName=<?php echo $_GET['chDtcName']; ?>&chDivID=<?php echo $_GET['chDivID']; ?>&chDtcID=<?php echo $_GET['chDtcID']; ?>"><b><?php echo $_GET["chDivName"]; ?></b></a>
        </li>
        <li class="breadcrumb-item active"><b>Church Members</b></li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-home"></i> <b><?php echo $_GET['churchName']; ?></b>
         <a class='btn btn-primary, pull-right' href="ch_mem_add.php?churchID=<?php echo $_GET['churchID']; ?>&churchName=<?php echo $_GET['churchName']; ?>&chDivName=<?php echo $_GET['chDivName']; ?>&chDtcName=<?php echo $_GET['chDtcName']; ?>&chDivID=<?php echo $_GET['chDivID']; ?>&chDtcID=<?php echo $_GET['chDtcID']; ?>"><b>Add Member</b></a>
          </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead align = 'center' bgcolor='#2ECC71'>
                <tr>
                  <th>ID</th>
                  <th >Name</th>
                  <th>Status</th>
                  <th>Profile</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $fgmembersite->DBlogin();
                  $query = "SELECT * FROM tbl_ch_member where ch_mem_ch_id = '". $_GET['churchID'] ."'";
                  $result = mysqli_query($fgmembersite->connection, $query);

                  if ($result->num_rows > 0)
                    {
                    while ($row = $result->fetch_assoc())
                      {
                      echo "<tr>";
                      $num = $row["ch_mem_id"];
                      $num_padded = sprintf("%06d", $num);
                      
                      echo "<td>" . $num_padded . "</td>";
                      echo "<td>" . $row["ch_mem_fullname"] . "</td>";
                      echo "<td>" . $row["ch_mem_status"] . "</td>";
                      echo "<td align='center'>
                      <a href='ch_mem_summary.php?memID=". $row["ch_mem_id"] ."' onclick='basicPopup(this.href);return false' class='fa fa-user'></a>
                      </td>";
                      echo '<td align="center"><A HREF="ch_mem_edit.php?churchID='. $_GET['churchID'] .'&churchName='. $_GET['churchName'] .'&memID='. $row["ch_mem_id"] .'&chDtcName='. $_GET['chDtcName'] .'&chDivName='. $_GET['chDivName'] .'&chDivID='. $_GET['chDivID'] .'&chDtcID='. $_GET['chDtcID'] .'">  <i class="fa fa-pencil" /></A></td>';
                      echo '<td align="center"><A HREF="ch_mem_delete.php?churchID='. $_GET['churchID'] .'&churchName='. $_GET['churchName'] .'&memID='. $row["ch_mem_id"] .'&chDtcName='. $_GET['chDtcName'] .'&chDivName='. $_GET['chDivName'] .'&chDivID='. $_GET['chDivID'] .'&chDtcID='. $_GET['chDtcID'] .'" onclick="return confirm(\'The file will be deleted when you click OK\')">  <i class="fa fa-trash" /></A></td>';
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
