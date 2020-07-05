<?php
//disabled export cannot enable because of refresh
include 'header.php';
require_once ("include/membersite_config.php");

if(isset($_POST['ministerExport']))
{
            echo '<script language="javascript">';
            echo 'alert("Click OK to download."); location.href="allexport.php"';
            echo '</script>';
}
?>

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"> <b>Export</b></i>

          <form method="post">
              <table > 
                <tr>
                    <td><label for='member'>Ministers:</label></td>
                    <td><select name='minister_id' id="minister_id" onClick="typeChange()"/>
                    <option value="" selected>Select your option</option>
                    <option value="all">ALL</option>
                    <option value="credential">Credential</option>
                    <option value="gender">Gender</option>
                    <option value="age">Age</option>
                    <option value="cstatus">Civil Status</option>
                    <option value="yrAsMarried">Years Married</option>
                    </select></td>

                    <td><label for='type' id="labelCredential" hidden>Category:</label></td>
                    <td><select name='credential' id="credential" hidden/>
                    <option value="ATP">ATP</option>
                    <option value="CW">CW</option>
                    <option value="LM">LM</option>
                    <option value="OM">OM</option>
                    </select></td>

                    <td><label for='type' id="labelGender" hidden>Type:</label></td>
                    <td><select name='gender' id="gender" hidden/>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    </select></td>

                    <td><label for='type' id="labelCstatus" hidden>Type:</label></td>
                    <td><select name='cstatus' id="cstatus" hidden/>
                    <option value='Single'>Single</option>
                    <option value='Married'>Married</option>
                    <option value='Widow/er'>Widow/er</option>
                    <option value='Single Parent'>Single Parent</option>
                    <option value='Separated'>Separated</option>
                    <option value='Annulled'>Annulled</option>
                    </select></td>
                    
                    <td><label for='type' name="range" id="range" hidden>Range:</label></td>
                    <td><input class="form-control" type='number' name='range1' id='range1' onKeyDown="if(this.value.length==4 && event.keyCode!=8) return false;" style="width: 5em" hidden/></td>
                    <td><label id="to" hidden>to</label></td>
                    <td><input class="form-control" type='number' name='range2' id='range2' onKeyDown="if(this.value.length==4 && event.keyCode!=8) return false;" style="width: 5em" hidden/></td>
                    &nbsp;
                    <td><input type="submit" name="ministerSubmit" value="View" class="btn btn-primary" id="minister_btn_submit"></td>

                    <td><input type="submit" name="ministerExport" value="Export" class="btn btn-primary" id="minister_btn"></td>
                    
                </tr>
              </table>
          </form>        

        </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">   
          
        <?php 
        if(isset($_POST['ministerSubmit'])){
        echo '<script language="javascript">';
        echo 'document.getElementById("minister_id").value = "'. $_POST['minister_id'] .'"';
        echo '</script>';
        $var_mem = $_POST['minister_id'];
        $_SESSION['ministerExport'] = $var_mem;
        $_SESSION['churchExport'] = "NA";
        $_SESSION['memberExport'] = "NA";

            $fgmembersite->DBlogin();
           if ($var_mem == "all")
            {
                echo"<thead bgcolor='#2ECC71'>";    
                echo"<tr><font size ='5'><center><b>ALL</b></font></tr>";  
                echo"    <tr>";
                echo"      <th>Name</th>";
                echo"      <th>Church</th>";
                echo"      <th>District</th>";
                echo"    </tr>";
                echo"</thead>";
                echo"<tbody>";
               

                $fgmembersite->DBlogin();
                  if($_SESSION['district_report']=="1")
                  {
                      $dtcquery = "SELECT * FROM tbl_district where dtc_name = '". $_SESSION['username_of_user'] ."'";
                      $dtcresult = mysqli_query($fgmembersite->connection, $dtcquery);
                      while ($row = $dtcresult->fetch_assoc())
                      {
                        $dtcID = $row['dtc_id'];
                      }

                      $query = "SELECT mm.min_id, mm.min_fullname, ch.ch_name, dt.dtc_name, mm.min_status from tbl_minister mm left join tbl_district dt on mm.min_dtc_id = dt.dtc_id left join tbl_church ch on mm.min_ch_id = ch.ch_id where mm.min_dtc_id = '". $dtcID ."'";
                    
                  }
                  elseif($_SESSION['district_report']=="0")
                  {
                    $query = "SELECT mm.min_id, mm.min_fullname, ch.ch_name, dt.dtc_name, mm.min_status from tbl_minister mm left join tbl_district dt on mm.min_dtc_id = dt.dtc_id left join tbl_church ch on mm.min_ch_id = ch.ch_id";
                  }
                  
                  $result = mysqli_query($fgmembersite->connection, $query);

                  if ($result->num_rows > 0)
                    {
                    while ($row = $result->fetch_assoc())
                      {

                      echo "<tr>";
                      echo "<td>" . $row["min_fullname"] . "</td>";
                      echo "<td>" . $row["ch_name"] . "</td>";
                      echo "<td align=center>" . $row["dtc_name"] . "</td>";
                      echo "</tr>";
                      }
                    }
            }elseif ($var_mem == "credential"){
                $_SESSION['credential'] = $_POST['credential'];

                echo"<thead bgcolor='#2ECC71'>";    
                echo"<tr><font size ='5'><center><b>Credential - ". $_SESSION['credential'] ."</b></font></tr>";    
                echo"    <tr>";
                echo"      <th>Name</th>";
                echo"      <th>Church</th>";
                echo"      <th>District</th>";
                echo"    </tr>";
                echo"</thead>";
                echo"<tbody>";
               

                $fgmembersite->DBlogin();
                  if($_SESSION['district_report']=="1")
                  {
                      $dtcquery = "SELECT * FROM tbl_district where dtc_name = '". $_SESSION['username_of_user'] ."'";
                      $dtcresult = mysqli_query($fgmembersite->connection, $dtcquery);
                      while ($row = $dtcresult->fetch_assoc())
                      {
                        $dtcID = $row['dtc_id'];
                      }

                      $query = "SELECT mm.min_id, mm.min_credential, mm.min_fullname, ch.ch_name, dt.dtc_name, mm.min_status from tbl_minister mm left join tbl_district dt on mm.min_dtc_id = dt.dtc_id left join tbl_church ch on mm.min_ch_id = ch.ch_id where mm.min_dtc_id = '". $dtcID ."' and mm.min_credential = '". $_SESSION['credential'] ."'";
                    
                  }
                  elseif($_SESSION['district_report']=="0")
                  {
                    $query = "SELECT mm.min_id, mm.min_credential, mm.min_fullname, ch.ch_name, dt.dtc_name, mm.min_status from tbl_minister mm left join tbl_district dt on mm.min_dtc_id = dt.dtc_id left join tbl_church ch on mm.min_ch_id = ch.ch_id where mm.min_credential = '". $_SESSION['credential'] ."'";
                  }
                  
                  $result = mysqli_query($fgmembersite->connection, $query);

                  if ($result->num_rows > 0)
                    {
                    while ($row = $result->fetch_assoc())
                      {
                      
                      echo "<tr>";
                      echo "<td>" . $row["min_fullname"] . "</td>";
                      echo "<td>" . $row['ch_name'] . "</td>";
                      echo "<td align=center>" . $row['dtc_name'] . "</td>";
                      echo "</tr>";
                      }
                    }
              
            }elseif ($var_mem == "gender"){
                $_SESSION['gender'] = $_POST['gender'];

                echo"<thead bgcolor='#2ECC71'>";    
                echo"<tr><font size ='5'><center><b>Gender - ". $_SESSION['gender'] ."</b></font></tr>";  
                echo"    <tr>";
                echo"      <th>Name</th>";
                echo"      <th>Church</th>";
                echo"      <th>District</th>";
                echo"    </tr>";
                echo"</thead>";
                echo"<tbody>";
               

                $fgmembersite->DBlogin();
                  if($_SESSION['district_report']=="1")
                  {
                      $dtcquery = "SELECT * FROM tbl_district where dtc_name = '". $_SESSION['username_of_user'] ."'";
                      $dtcresult = mysqli_query($fgmembersite->connection, $dtcquery);
                      while ($row = $dtcresult->fetch_assoc())
                      {
                        $dtcID = $row['dtc_id'];
                      }

                      $query = "SELECT mm.min_id, mm.min_fullname, ch.ch_name, dt.dtc_name, mm.min_status from tbl_minister mm left join tbl_district dt on mm.min_dtc_id = dt.dtc_id left join tbl_church ch on mm.min_ch_id = ch.ch_id where mm.min_dtc_id = '". $dtcID ."' and mm.min_gender = '". $_SESSION['gender'] ."'";
                    
                  }
                  elseif($_SESSION['district_report']=="0")
                  {
                    $query = "SELECT mm.min_id, mm.min_fullname, ch.ch_name, dt.dtc_name, mm.min_status from tbl_minister mm left join tbl_district dt on mm.min_dtc_id = dt.dtc_id left join tbl_church ch on mm.min_ch_id = ch.ch_id where mm.min_gender = '". $_SESSION['gender'] ."'";
                  }
                  
                  $result = mysqli_query($fgmembersite->connection, $query);

                  if ($result->num_rows > 0)
                    {
                    while ($row = $result->fetch_assoc())
                      {
                      
                      echo "<tr>";
                      echo "<td>" . $row["min_fullname"] . "</td>";
                      echo "<td>" . $row["ch_name"] . "</td>";
                      echo "<td align=center>" . $row["dtc_name"] . "</td>";
                      echo "</tr>";
                      }
                    }
              
            }elseif ($var_mem == "age")
            {
              $_SESSION['range1'] = $_POST['range1'];
              $_SESSION['range2'] = $_POST['range2'];

                echo"<thead bgcolor='#2ECC71'>";    
                echo"<tr><font size ='5'><center><b>Age ". $_SESSION['range1'] ." - ". $_SESSION['range2'] ."</b></font></tr>"; 
                echo"    <tr>";
                echo"      <th>Name</th>";
                echo"      <th>Age</th>";
                echo"      <th>Church</th>";
                echo"      <th>District</th>";
                echo"    </tr>";
                echo"</thead>";
                echo"<tbody>";
               

                $fgmembersite->DBlogin();
                  if($_SESSION['district_report']=="1")
                  {
                      $dtcquery = "SELECT * FROM tbl_district where dtc_name = '". $_SESSION['username_of_user'] ."'";
                      $dtcresult = mysqli_query($fgmembersite->connection, $dtcquery);
                      while ($row = $dtcresult->fetch_assoc())
                      {
                        $dtcID = $row['dtc_id'];
                      }

                      $query = "SELECT FLOOR(DATEDIFF(now(),mm.min_bday) / 365.25) AS cnt, mm.min_id, mm.min_fullname, ch.ch_name, dt.dtc_name, mm.min_status from tbl_minister mm left join tbl_district dt on mm.min_dtc_id = dt.dtc_id left join tbl_church ch on mm.min_ch_id = ch.ch_id where mm.min_dtc_id = '". $dtcID ."' HAVING cnt >= '". $_SESSION['range1'] ."' AND cnt <= '". $_SESSION['range2'] ."'";
                    
                  }
                  elseif($_SESSION['district_report']=="0")
                  {
                    $query = "SELECT FLOOR(DATEDIFF(now(),mm.min_bday) / 365.25) AS cnt, mm.min_id, mm.min_fullname, ch.ch_name, dt.dtc_name, mm.min_status from tbl_minister mm left join tbl_district dt on mm.min_dtc_id = dt.dtc_id left join tbl_church ch on mm.min_ch_id = ch.ch_id HAVING cnt >= '". $_SESSION['range1'] ."' AND cnt <= '". $_SESSION['range2'] ."'";
                  }
                  
                  $result = mysqli_query($fgmembersite->connection, $query);

                  if ($result->num_rows > 0)
                    {
                    while ($row = $result->fetch_assoc())
                      {
                      
                      echo "<tr>";
                      echo "<td>" . $row["min_fullname"] . "</td>";
                      echo "<td>" . $row["cnt"] . "</td>";
                      echo "<td>" . $row["ch_name"] . "</td>";
                      echo "<td align=center>" . $row["dtc_name"] . "</td>";
                      echo "</tr>";
                      }
                    }
            }elseif ($var_mem == "cstatus"){
                $_SESSION['cstatus'] = $_POST['cstatus'];

                echo"<thead bgcolor='#2ECC71'>";    
                echo"<tr><font size ='5'><center><b>Civil Status - ". $_SESSION['cstatus'] ."</b></font></tr>";   
                echo"    <tr>";
                echo"      <th>Name</th>";
                echo"      <th>Church</th>";
                echo"      <th>District</th>";
                echo"    </tr>";
                echo"</thead>";
                echo"<tbody>";
               

                $fgmembersite->DBlogin();
                  if($_SESSION['district_report']=="1")
                  {
                      $dtcquery = "SELECT * FROM tbl_district where dtc_name = '". $_SESSION['username_of_user'] ."'";
                      $dtcresult = mysqli_query($fgmembersite->connection, $dtcquery);
                      while ($row = $dtcresult->fetch_assoc())
                      {
                        $dtcID = $row['dtc_id'];
                      }

                      $query = "SELECT mm.min_id, mm.min_fullname, ch.ch_name, dt.dtc_name, mm.min_status from tbl_minister mm left join tbl_district dt on mm.min_dtc_id = dt.dtc_id left join tbl_church ch on mm.min_ch_id = ch.ch_id where mm.min_dtc_id = '". $dtcID ."' and mm.min_cstatus = '".  $_SESSION['cstatus'] ."'";
                    
                  }
                  elseif($_SESSION['district_report']=="0")
                  {
                    $query = "SELECT mm.min_id, mm.min_fullname, ch.ch_name, dt.dtc_name, mm.min_status from tbl_minister mm left join tbl_district dt on mm.min_dtc_id = dt.dtc_id left join tbl_church ch on mm.min_ch_id = ch.ch_id where mm.min_cstatus = '".  $_SESSION['cstatus'] ."'";
                  }
                  
                  $result = mysqli_query($fgmembersite->connection, $query);

                  if ($result->num_rows > 0)
                    {
                    while ($row = $result->fetch_assoc())
                      {
                      
                      echo "<tr>";
                      echo "<td>" . $row["min_fullname"] . "</td>";
                      echo "<td>" . $row["ch_name"] . "</td>";
                      echo "<td align=center>" . $row["dtc_name"] . "</td>";
                      echo "</tr>";
                      }
                    }
              
            }elseif ($var_mem == "yrAsMarried")
            {
              $_SESSION['range1'] = $_POST['range1'];
              $_SESSION['range2'] = $_POST['range2'];

              echo"<thead bgcolor='#2ECC71'>";    
                 echo"<tr><font size ='5'><center><b>Years Married ". $_SESSION['range1'] ." - ". $_SESSION['range2'] ."</b></font></tr>"; 
                echo"    <tr>";
                echo"      <th>Name</th>";
                echo"      <th>Years Married</th>";
                echo"      <th>Church</th>";
                echo"      <th>District</th>";
                echo"    </tr>";
                echo"</thead>";
                echo"<tbody>";
               

                $fgmembersite->DBlogin();
                  if($_SESSION['district_report']=="1")
                  {
                      $dtcquery = "SELECT * FROM tbl_district where dtc_name = '". $_SESSION['username_of_user'] ."'";
                      $dtcresult = mysqli_query($fgmembersite->connection, $dtcquery);
                      while ($row = $dtcresult->fetch_assoc())
                      {
                        $dtcID = $row['dtc_id'];
                      }

                      $query = "SELECT FLOOR(DATEDIFF(now(),sp.sp_date_marriage) / 365.25) AS cnt, mm.min_id, mm.min_fullname, ch.ch_name, dt.dtc_name, mm.min_status from tbl_minister mm left join tbl_district dt on mm.min_dtc_id = dt.dtc_id left join tbl_min_spouse sp on mm.min_id = sp.sp_min_id left join tbl_church ch on mm.min_ch_id = ch.ch_id where mm.min_dtc_id = '". $dtcID ."' HAVING cnt >= '". $_SESSION['range1'] ."' AND cnt <= '". $_SESSION['range2'] ."'";
                    
                  }
                  elseif($_SESSION['district_report']=="0")
                  {
                    $query = "SELECT FLOOR(DATEDIFF(now(),sp.sp_date_marriage) / 365.25) AS cnt, mm.min_id, mm.min_fullname, ch.ch_name, dt.dtc_name, mm.min_status from tbl_minister mm left join tbl_district dt on mm.min_dtc_id = dt.dtc_id left join tbl_min_spouse sp on mm.min_id = sp.sp_min_id left join tbl_church ch on mm.min_ch_id = ch.ch_id HAVING cnt >= '". $_SESSION['range1'] ."' AND cnt <= '". $_SESSION['range2'] ."'";
                  }
                  
                  $result = mysqli_query($fgmembersite->connection, $query);

                  if ($result->num_rows > 0)
                    {
                    while ($row = $result->fetch_assoc())
                      {
                      
                      echo "<tr>";
                      echo "<td>" . $row["min_fullname"] . "</td>";
                      echo "<td>" . $row["cnt"] . "</td>";
                      echo "<td>" . $row["ch_name"] . "</td>";
                      echo "<td align=center>" . $row["dtc_name"] . "</td>";
                      echo "</tr>";
                      }
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

<script>
  //  function clickChurchSubmit() {
  //     //document.getElementById("church_btn").disabled = true;
  //     document.getElementById("church_btn_submit").click(); 
  // }
  function typeChange() {
    if($("#minister_id").val() == "gender"){
      document.getElementById("labelGender").hidden = false; 
      document.getElementById("gender").hidden = false; 

      document.getElementById("labelCstatus").hidden = true; 
      document.getElementById("cstatus").hidden = true; 

      document.getElementById("labelCredential").hidden = true; 
      document.getElementById("credential").hidden = true; 

      document.getElementById("range").hidden = true;
      document.getElementById("range1").hidden = true;
      document.getElementById("to").hidden = true; 
      document.getElementById("range2").hidden = true; 
    }else if($("#minister_id").val() == "age" || $("#minister_id").val() == "yrAsMarried" || $("#minister_id").val() == "noCdn"){
      document.getElementById("range").hidden = false;
      document.getElementById("range1").hidden = false;
      document.getElementById("to").hidden = false; 
      document.getElementById("range2").hidden = false; 

      document.getElementById("labelCstatus").hidden = true; 
      document.getElementById("cstatus").hidden = true; 

      document.getElementById("labelCredential").hidden = true; 
      document.getElementById("credential").hidden = true; 
      
      document.getElementById("labelGender").hidden = true; 
      document.getElementById("gender").hidden = true; 
    }else if($("#minister_id").val() == "cstatus"){
      document.getElementById("labelCstatus").hidden = false; 
      document.getElementById("cstatus").hidden = false; 

      document.getElementById("labelGender").hidden = true; 
      document.getElementById("gender").hidden = true; 

      document.getElementById("labelCredential").hidden = true; 
      document.getElementById("credential").hidden = true; 

      document.getElementById("range").hidden = true;
      document.getElementById("range1").hidden = true;
      document.getElementById("to").hidden = true; 
      document.getElementById("range2").hidden = true; 
    }else if($("#minister_id").val() == "credential"){
      document.getElementById("labelCredential").hidden = false; 
      document.getElementById("credential").hidden = false; 

      document.getElementById("labelCstatus").hidden = true; 
      document.getElementById("cstatus").hidden = true; 

      document.getElementById("labelGender").hidden = true; 
      document.getElementById("gender").hidden = true; 

      document.getElementById("range").hidden = true;
      document.getElementById("range1").hidden = true;
      document.getElementById("to").hidden = true; 
      document.getElementById("range2").hidden = true; 
    }
    else{
      document.getElementById("labelCredential").hidden = true; 
      document.getElementById("credential").hidden = true; 

      document.getElementById("labelCstatus").hidden = true; 
      document.getElementById("cstatus").hidden = true; 

      document.getElementById("labelGender").hidden = true; 
      document.getElementById("gender").hidden = true; 
      
      document.getElementById("range").hidden = true;
      document.getElementById("range1").hidden = true; 
      document.getElementById("to").hidden = true; 
      document.getElementById("range2").hidden = true; 
    }
  }
 
</script>
<?php
include 'footer.php';
?>

<script>
  $(document).ready(function (){
    // console.log(document.getElementById("equip_id"));
     if($("#minister_id").val() == ""){
      document.getElementById("minister_btn").disabled = true;
     }
  });
</script>