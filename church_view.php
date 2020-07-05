<?php
include 'header.php';
require_once ("include/membersite_config.php");
$_SESSION["editDivCheck"] = "0";
$_SESSION["ch_div_id"] = "0";
$_SESSION["ch_div_name"] = "0";
$_SESSION["editPage"] = "0";
$_SESSION["menuPage"] = "1";

?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
        <i class="fa fa-home"> Churches</i>
        <br><br>
        <!--Select District-->
        <form method="post">
          <?php
          if(isset($_POST['ch_dtc_id']))
                {
                    $fgmembersite->tablename = 'tbl_district';
                    $fgmembersite->DBlogin();
                    $result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_district where dtc_id = '". $_POST['ch_dtc_id'] ."'");
                    if ($result->num_rows > 0)
                    {
                    while($row = $result->fetch_assoc()) 
                      {
                        $_SESSION["dtcLabel"] = $row["dtc_name"];
                        $_SESSION["dtcLabelID"] = $row["dtc_id"]; 
                      }
                    }
                }
                else
                    {
                      $_SESSION["dtcLabel"] = "";
                    }


                if(isset($_POST['ch_div_id']))
                {
                  $fgmembersite->tablename = 'tbl_division';
                  $fgmembersite->DBlogin();
                  $result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_division where div_id = '". $_POST['ch_div_id'] ."'");
                  if ($result->num_rows > 0)
                  {
                  while($row = $result->fetch_assoc()) 
                    {
                      $_SESSION["divLabel"] = $row["div_name"];
                      $_SESSION["divLabelID"] = $row["div_id"];
                    }
                  }
                   
                }
                else
                  {
                    $_SESSION["divLabel"] = "";
                  } 
          ?>
 
                <?php
                if(isset($_POST['viewSubmit']))
                {

                echo"
                <table border=1>
                <tr>
                  <td><label for='ch_dtc_id'>District:</label></td>
                  <td><select class='form-control' name='ch_dtc_id' id='ch_dtc_id' style='width: 150px;' onchange='showDiv(this.value)'>  
                  ";
                        $fgmembersite->DBlogin();
                                $query = 'SELECT * FROM tbl_district ';
                                $result = mysqli_query($fgmembersite->connection, $query);
                                 if($_SESSION['menuPage'] == '1')
                                  {
                                    echo "<option value=''>SELECT</option>";
                                  }
                                if ($result->num_rows > 0)
                                  {
                                    while ($row = $result->fetch_assoc())
                                      {
                                        $dtc_id = $row['dtc_id'];

                                      if($_SESSION['home_settings']=='0')
                                      {
                                        if($row['dtc_name'] == $_SESSION['username_of_user'])
                                        {
                                          echo "<option value=". $row['dtc_id'] ." selected>" . $row['dtc_name'] . "</option>";
                                        }  
                                      }
                                      elseif($_SESSION['home_settings']=='1')
                                      {
                                        echo "<option value=". $row['dtc_id'] .">" . $row['dtc_name'] . "</option>";  
                                      }
                                      
                                      }
                                    }
                    echo"   
                   </select></td>
                   <td>
                    <div id='txtHint'>
                    </div>
                   </td>

                   <td><input type='submit' id='viewSubmit' name='viewSubmit' value='View' class='btn btn-primary' hidden></td>
                  </tr>
                </table>
                <a class='btn btn-primary, pull-right' href='ch_add.php?chDivID=". $_SESSION['divLabelID'] ."&chDtcID=". $_SESSION['dtcLabelID'] ."&chDtcName=". $_SESSION['dtcLabel'] ."&chDivName=". $_SESSION['divLabel'] ."'>Add Church</a>
          </div>
          <div class='card-body'>
          <div class='table-responsive'>
            

                 <center><b>District: ". $_SESSION['dtcLabel'] ." <br>
                Division: ". $_SESSION['divLabel'] ."</center></b>

                <table class='table table-bordered' id='dataTable' width='100%'' cellspacing='0'>
                <thead>
                <tr>
                  <th>Church</th>
                  <th><center>Senior Pastor</th>
                  <th>Status</th>
                  <th><center>Members</th>
                  ";
                  if ($_SESSION['edit_church'] == "1")
                      {
                        echo"<th><center>Edit</th>";
                      }
                  if ($_SESSION['delete_church'] == "1")
                      {
                        echo"<th><center>Delete</th>";
                      }
                 "; 
                </tr>
              </thead>
              ";
                  if(isset($_POST['ch_div_id']))
                  {
                  echo"<tbody>";
                  echo '<script language="javascript">';
                  echo 'document.getElementById("ch_div_id").value = "'. $_POST['ch_div_id'] .'"';
                  echo '</script>';


                  $fgmembersite->DBlogin();
                  $divquery = "SELECT * FROM tbl_division where div_id = '". $_POST['ch_div_id'] ."'";
                  $divresult = mysqli_query($fgmembersite->connection, $divquery);
                  while ($row = $divresult->fetch_assoc())
                      {
                        $chDivName = $row['div_name'];
                      }

                  $fgmembersite->DBlogin();
                  $dtcquery = "SELECT * FROM tbl_district where dtc_id = '". $_POST['ch_dtc_id'] ."'";
                  $dtcresult = mysqli_query($fgmembersite->connection, $dtcquery);
                  while ($row = $dtcresult->fetch_assoc())
                      {
                        $chDtcName = $row['dtc_name'];
                      }

                  $fgmembersite->DBlogin();
                  $query = "SELECT * FROM tbl_church where ch_div_id = '". $_POST['ch_div_id'] ."'";
                  $result = mysqli_query($fgmembersite->connection, $query);

                  if ($result->num_rows > 0)
                    {
                    while ($row = $result->fetch_assoc())
                      {

                      $minquery = "SELECT * FROM tbl_minister where min_id = '". $row['ch_min_id']."'"; 
                      $minresult = mysqli_query($fgmembersite->connection, $minquery);
                     if ($minresult->num_rows > 0)
                      {
                        while ($row1 = $minresult->fetch_assoc())
                          {
                            $min_name = $row1['min_fullname'];
                          }
                      }
                      else
                      {
                            $min_name = "NA";
                      }
                      
                      echo "<tr>";
                      echo "<td>" . $row["ch_name"] . "</td>";
                      echo "<td>" . $min_name . "</td>";
                      echo "<td>" . $row["ch_status"] . "</td>";
                      echo '<td align="center"><a href="ch_mem_menu.php?churchID='. $row["ch_id"] .'&churchName='. $row["ch_name"] .'&chDivID='. $row["ch_div_id"] .'&chDtcID='. $row["ch_dtc_id"] .'&chDivName='. $chDivName .'&chDtcName='. $chDtcName .'">list</a></td>';
                      if ($_SESSION['edit_church'] == "1")
                      {
                      echo '<td align="center"><A HREF="ch_edit.php?churchID='. $row["ch_id"] .'&churchName='. $row["ch_name"] .'&chDivID='. $row["ch_div_id"] .'&chDtcID='. $row["ch_dtc_id"] .'&chDivName='. $chDivName .'&chDtcName='. $chDtcName .'">edit</A></td>';
                      }
                      if ($_SESSION['delete_church'] == "1")
                      {
                      echo '<td align="center"><A HREF="ch_delete.php?churchID='. $row["ch_id"] .'&churchName='. $row["ch_name"] .'&chDivID='. $row["ch_div_id"] .'&chDtcID='. $row["ch_dtc_id"] .'&chDivName='. $chDivName .'&chDtcName='. $chDtcName .'" onclick="return confirm(\'The church will be deleted when you click OK\')">delete</A></td>';
                      echo "</tr>";
                      }
                      }
                    }
                  }
                  echo "</tbody>";
                }
                else
                {

                echo"
                <table border=1>
                <tr>
                  <td><label for='ch_dtc_id'>District:</label></td>
                  <td><select class='form-control' name='ch_dtc_id' id='ch_dtc_id' style='width: 150px;' onchange='showDiv(this.value)'>  
                  ";
                        $fgmembersite->DBlogin();
                                $query = 'SELECT * FROM tbl_district ';
                                $result = mysqli_query($fgmembersite->connection, $query);
                                 if($_SESSION['menuPage'] == '1')
                                  {
                                    echo "<option value=". $_GET['chDtcID'] ." selected>". $_GET['chDtcName'] ."</option>";
                                  }
                                if ($result->num_rows > 0)
                                  {
                                    while ($row = $result->fetch_assoc())
                                      {
                                        $dtc_id = $row['dtc_id'];

                                      if($_SESSION['home_settings']=='0')
                                      {
                                        if($row['dtc_name'] == $_SESSION['username_of_user'])
                                        {
                                          echo "<option value=". $row['dtc_id'] .">" . $row['dtc_name'] . "</option>";
                                        }  
                                      }
                                      elseif($_SESSION['home_settings']=='1')
                                      {
                                        echo "<option value=". $row['dtc_id'] .">" . $row['dtc_name'] . "</option>";
                                      }
                                      
                                      }
                                    }
                    echo"   
                   </select></td>
                   <td>
                    <div id='txtHint'>
                    </div>
                   </td>

                   <td><input type='submit' id='viewSubmit' name='viewSubmit' value='View' class='btn btn-primary' hidden></td>
                  </tr>
                </table>
                <a class='btn btn-primary, pull-right' href='ch_add.php?chDivID=". $_GET['chDivID'] ."&chDtcID=". $_GET['chDtcID'] ."&chDtcName=". $_GET['chDtcName'] ."&chDivName=". $_GET['chDivName'] ."'>Add Church</a>
          </div>
          <div class='card-body'>
          <div class='table-responsive'>
            

                  <center><b>District: ". $_GET['chDtcName'] ." <br>
                Division: ". $_GET['chDivName'] ."</center></b>

                <table class='table table-bordered' id='dataTable' width='100%'' cellspacing='0'>
                <thead>
                <tr>
                  <th>Church</th>
                  <th>Senior Pastor</th>
                  <th>Status</th>
                  <th>Members</th>
                  ";
                  if ($_SESSION['edit_church'] == "1")
                      {
                        echo"<th>Edit</th>";
                      }
                  if ($_SESSION['delete_church'] == "1")
                      {
                        echo"<th>Delete</th>";
                      }
                 "; 
                </tr>
              </thead>
              ";

                  $fgmembersite->DBlogin();
                  $divquery = "SELECT * FROM tbl_division where div_id = '". $_GET['chDivID'] ."'";
                  $divresult = mysqli_query($fgmembersite->connection, $divquery);
                  while ($row = $divresult->fetch_assoc())
                      {
                        $chDivName = $row['div_name'];
                      }

                  $fgmembersite->DBlogin();
                  $dtcquery = "SELECT * FROM tbl_district where dtc_id = '". $_GET['chDtcID'] ."'";
                  $dtcresult = mysqli_query($fgmembersite->connection, $dtcquery);
                  while ($row = $dtcresult->fetch_assoc())
                      {
                        $chDtcName = $row['dtc_name'];
                      }

                  $fgmembersite->DBlogin();
                  $query = "SELECT * FROM tbl_church where ch_div_id = '". $_GET['chDivID'] ."'";
                  $result = mysqli_query($fgmembersite->connection, $query);
                  echo"<tbody>";
                  if ($result->num_rows > 0)
                    {
                    while ($row = $result->fetch_assoc())
                      {

                      $minquery = "SELECT * FROM tbl_minister where min_id = '". $row['ch_min_id']."'"; 
                      $minresult = mysqli_query($fgmembersite->connection, $minquery);
                     if ($minresult->num_rows > 0)
                      {
                        while ($row1 = $minresult->fetch_assoc())
                          {
                            $min_name = $row1['min_fullname'];
                          }
                      }
                      else
                      {
                            $min_name = "NA";
                      }
                      
                      echo "<tr>";
                      echo "<td>" . $row["ch_name"] . "</td>";
                      echo "<td>" . $min_name . "</td>";
                      echo "<td>" . $row["ch_status"] . "</td>";
                      echo '<td align="center"><a href="ch_mem_menu.php?churchID='. $row["ch_id"] .'&churchName='. $row["ch_name"] .'&chDivID='. $row["ch_div_id"] .'&chDtcID='. $row["ch_dtc_id"] .'&chDivName='. $_GET['chDivName'] .'&chDtcName='. $_GET['chDtcName'] .'">list</a></td>';
                       if ($_SESSION['edit_church'] == "1")
                      {
                      echo '<td align="center"><A HREF="ch_edit.php?churchID='. $row["ch_id"] .'&churchName='. $row["ch_name"] .'&chDivID='. $row["ch_div_id"] .'&chDtcID='. $row["ch_dtc_id"] .'&chDivName='. $_GET['chDivName'] .'&chDtcName='. $_GET['chDtcName'] .'">edit</A></td>';
                      }
                       if ($_SESSION['delete_church'] == "1")
                      {
                      echo '<td align="center"><A HREF="ch_delete.php?ch_mem_menu.php?churchID='. $row["ch_id"] .'&churchName='. $row["ch_name"] .'&chDivID='. $row["ch_div_id"] .'&chDtcID='. $row["ch_dtc_id"] .'&chDivName='. $_GET['chDivName'] .'&chDtcName='. $_GET['chDtcName'] .'">delete</A></td>';
                      }
                      echo "</tr>";
                      
                    }
                  }
                  echo "</tbody>";
                }
                ?>
              
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
include 'footer.php';
?>
