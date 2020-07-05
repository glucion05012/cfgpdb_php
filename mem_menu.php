<?php
include 'header.php';
require_once ("include/membersite_config.php");
  $_SESSION['backAdd'] = "0";
  $_SESSION['back1'] = "0";
  $_SESSION['back'] = "0";
?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><b>Members List</b></li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <form method="post">
          <table>
            <tr>
              <td><i class="fa fa-search"> Search Name: </i></td>
              <td><input class="form-control" type='input' name='mem_search' /></td>
              <td><input type="submit" name="searchSubmit" value="Search" class="btn btn-primary" /></td>
            </tr>
            </table>
          </form>
        </div>
      </div>

        <div class="card mb-3">
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead align=center bgcolor='#2ECC71' >
                <tr>
                <?php 
                  if(isset($_POST['searchSubmit'])){
                  echo '<script language="javascript">';
                  echo 'document.getElementById("mem_search").value = "'. $_POST['mem_search'] .'"';
                  echo '</script>';
                  $var_search = $_POST['mem_search'];

                  $fgmembersite->DBlogin();

                  echo"<th>ID</th>";
                  echo"<th>Name</th>";
                  echo"<th>Church</th>";
                  if($_SESSION['home_settings']=="0")
                  {
                    echo "<th>Division</th>";
                  }
                  elseif($_SESSION['home_settings']=="1")
                  {
                    echo "<th>District</th>";
                  }

                  echo"     <th>Status</th>";
                  echo"      <th>Profile</th>";
                  echo"      <th>Edit</th>";
                  echo"      <th>Transfer</th>";
                  echo"    </tr> ";
                  echo"  </thead>";
                  echo"  <tbody>";


                  if($_SESSION['home_settings']=="0")
                  {
                      $query = "SELECT * FROM tbl_ch_member a JOIN tbl_church b ON a.ch_mem_ch_id = b.ch_id JOIN tbl_district c ON b.ch_dtc_id = c.dtc_id where c.dtc_name = '". $_SESSION['username_of_user'] ."' AND a.ch_mem_fullname LIKE '%". $var_search ."%'";
                  }
                  elseif($_SESSION['home_settings']=="1")
                  {
                    $query = "SELECT * FROM tbl_ch_member where ch_mem_fullname LIKE '%". $var_search ."%'";
                  }
                  
                  $result = mysqli_query($fgmembersite->connection, $query);

                  if ($result->num_rows > 0)
                    {
                    while ($row = $result->fetch_assoc())
                      {

                          $chquery = "SELECT * FROM tbl_church where ch_id = '". $row['ch_mem_ch_id']."'"; 
                          $chresult = mysqli_query($fgmembersite->connection, $chquery);
                          
                          if ($chresult->num_rows > 0)
                          {
                            while ($row1 = $chresult->fetch_assoc())
                              {
                                  $chName = $row1['ch_name'];
                                  $chID = $row1['ch_id'];
                                  $dtcID = $row1['ch_dtc_id'];
                                  $divID = $row1['ch_div_id'];
                              }
                            
                            $dtcquery = "SELECT * FROM tbl_district where dtc_id = '". $dtcID ."'"; 
                            $dtcresult = mysqli_query($fgmembersite->connection, $dtcquery);
                            while ($row2 = $dtcresult->fetch_assoc())
                              {
                                  $dtcName = $row2['dtc_name'];
                              }

                            $divquery = "SELECT * FROM tbl_division where div_id = '". $divID ."'"; 
                            $divresult = mysqli_query($fgmembersite->connection, $divquery);
                            while ($row3 = $divresult->fetch_assoc())
                              {
                                  $divName = $row3['div_name'];
                              }
                          }
                          else
                          {
                             $chName = "";
                             $dtcName = "";
                             $divName = "";
                          }
                        

                      echo "<tr>";
                      $num = $row["ch_mem_id"];
                      $num_padded = sprintf("%06d", $num);
                      
                      echo "<td>" . $num_padded . "</td>";
                      echo "<td>" . $row["ch_mem_fullname"] . "</td>";
                      echo "<td>" . $chName . "</td>";
                       if($_SESSION['home_settings']=="0")
                        {
                          echo "<td><center>" . $divName . "</td>";
                        }
                      elseif($_SESSION['home_settings']=="1")
                        {
                          echo "<td><center>" . $dtcName . "</td>";
                        }
                      
                      echo "<td><center>" . $row["ch_mem_status"] . "</td>";
                      echo "<td><center>
                      <a href='ch_mem_summary.php?memID=". $row["ch_mem_id"] ."' onclick='basicPopup(this.href);return false' class='fa fa-user'></a>
                      </td>";
                      echo '<td align="center"><A HREF="ch_mem_edit.php?churchID='. $chID .'&churchName='. $chName .'&memID='. $row["ch_mem_id"] .'&chDivName='. $divName .'&chDivID='. $divID .'&chDtcName='. $dtcName .'&chDtcID='. $dtcID .'"><i class="fa fa-pencil" /></A></td>';
                      echo '<td align="center"><A HREF="move_church.php?memID='. $row["ch_mem_id"] .'&chName='. $chName .'&chID='. $chID .'"><i class="fa fa-arrow-right" /></A></td>';
                     
                      echo "</tr>";
                      }
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
