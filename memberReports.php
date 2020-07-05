<?php
//disabled export cannot enable because of refresh
include 'header.php';
require_once ("include/membersite_config.php");

if(isset($_POST['memberExport']))
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
                    <td><label for='member'>Members:</label></td>
                    <td><select name='member_id' id="member_id" onClick="typeChange()"/>
                    <option value="" selected>Select your option</option>
                    <option value="all">ALL</option>
                    <option value="gender">Gender</option>
                    <option value="age">Age</option>
                    <option value="cstatus">Civil Status</option>
                    <option value="yrAsMarried">Years Married</option>
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
                    <td><input type="submit" name="memberSubmit" value="View" class="btn btn-primary" id="member_btn_submit"></td>

                    <td><input type="submit" name="memberExport" value="Export" class="btn btn-primary" id="member_btn"></td>
                    
                </tr>
              </table>
          </form>        

        </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">   
          
        <?php 
        if(isset($_POST['memberSubmit'])){
        echo '<script language="javascript">';
        echo 'document.getElementById("member_id").value = "'. $_POST['member_id'] .'"';
        echo '</script>';
        $var_mem = $_POST['member_id'];
        $_SESSION['memberExport'] = $var_mem;
        $_SESSION['churchExport'] = "NA";
        $_SESSION['ministerExport'] = "NA";

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
                if($_SESSION['district_report'] == "1")
                {
                $query ="SELECT mm.ch_mem_fullname, ch.ch_name, dt.dtc_name from tbl_church ch inner join tbl_ch_member mm on mm.ch_mem_ch_id = ch.ch_id inner join tbl_district dt on ch.ch_dtc_id = dt.dtc_id where dt.dtc_name = '". $_SESSION['name_of_user'] ."'";
                }else
                {
                $query ="SELECT mm.ch_mem_fullname, ch.ch_name, dt.dtc_name from tbl_church ch inner join tbl_ch_member mm on mm.ch_mem_ch_id = ch.ch_id inner join tbl_district dt on ch.ch_dtc_id = dt.dtc_id";
                }
                $result = mysqli_query($fgmembersite->connection, $query);
                  if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                           echo "<tr>";
                           echo "<td>". $row["ch_mem_fullname"] ."</td>";
                           echo "<td>". $row["ch_name"] ."</td>";
                           echo "<td>". $row["dtc_name"] ."</td>";
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
                  if($_SESSION['district_report'] == "1")
                  {
                  $query ="SELECT mm.ch_mem_fullname, ch.ch_name, dt.dtc_name, mm.ch_mem_gender from tbl_church ch inner join tbl_ch_member mm on mm.ch_mem_ch_id = ch.ch_id inner join tbl_district dt on ch.ch_dtc_id = dt.dtc_id where mm.ch_mem_gender = '". $_SESSION['gender'] ."' and dt.dtc_name = '". $_SESSION['name_of_user'] ."'";
                  }else
                  {
                  $query ="SELECT mm.ch_mem_fullname, ch.ch_name, dt.dtc_name, mm.ch_mem_gender from tbl_church ch inner join tbl_ch_member mm on mm.ch_mem_ch_id = ch.ch_id inner join tbl_district dt on ch.ch_dtc_id = dt.dtc_id where mm.ch_mem_gender = '". $_SESSION['gender'] ."'";
                  }
                  $result = mysqli_query($fgmembersite->connection, $query);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                             echo "<tr>";
                             echo "<td>". $row["ch_mem_fullname"] ."</td>";
                             echo "<td>". $row["ch_name"] ."</td>";
                             echo "<td>". $row["dtc_name"] ."</td>";
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
                    
                    if($_SESSION['district_report'] == "1")
                    {
                    $query ="SELECT mm.ch_mem_id, mm.ch_mem_fullname, FLOOR(DATEDIFF(now(),mm.ch_mem_bday) / 365.25) AS cnt, ch.ch_name, dc.dtc_name FROM tbl_ch_member mm INNER JOIN tbl_church ch ON ch.ch_id = mm.ch_mem_ch_id INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id HAVING cnt >= '". $_SESSION['range1'] ."' AND cnt <= '". $_SESSION['range2'] ."' and dc.dtc_name = '". $_SESSION['name_of_user'] ."'";
                    }else
                    {
                    $query ="SELECT mm.ch_mem_id, mm.ch_mem_fullname, FLOOR(DATEDIFF(now(),mm.ch_mem_bday) / 365.25) AS cnt, ch.ch_name, dc.dtc_name FROM tbl_ch_member mm INNER JOIN tbl_church ch ON ch.ch_id = mm.ch_mem_ch_id INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id HAVING cnt >= '". $_SESSION['range1'] ."' AND cnt <= '". $_SESSION['range2'] ."'";
                    }
                    
                  $result = mysqli_query($fgmembersite->connection, $query);
                  if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                           echo "<tr>";
                           echo "<td>". $row["ch_mem_fullname"] ."</td>";
                           echo "<td>". $row["cnt"] ."</td>";
                           echo "<td>". $row["ch_name"] ."</td>";
                           echo "<td>". $row["dtc_name"] ."</td>";
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

                if($_SESSION['district_report'] == "1")
                    {
                    $query ="SELECT mm.ch_mem_id, mm.ch_mem_fullname, ch.ch_name, dc.dtc_name from tbl_church ch inner join tbl_ch_member mm on mm.ch_mem_ch_id = ch.ch_id INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id where mm.ch_mem_cstatus = '". $_SESSION['cstatus'] ."' and dc.dtc_name = '". $_SESSION['name_of_user'] ."'";
                    }
                    else
                    {
                    $query ="SELECT mm.ch_mem_id, mm.ch_mem_fullname, ch.ch_name, dc.dtc_name from tbl_church ch inner join tbl_ch_member mm on mm.ch_mem_ch_id = ch.ch_id INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id where mm.ch_mem_cstatus = '". $_SESSION['cstatus'] ."'";
                    }
                    
                $result = mysqli_query($fgmembersite->connection, $query);
                  if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                           echo "<tr>";
                           echo "<td>". $row["ch_mem_fullname"] ."</td>";
                           echo "<td>". $row["ch_name"] ."</td>";
                           echo "<td>". $row["dtc_name"] ."</td>";
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
                    
                    if($_SESSION['district_report'] == "1")
                    {
                    $query ="SELECT mm.ch_mem_id, mm.ch_mem_fullname, FLOOR(DATEDIFF(now(),sp.sp_date_marriage) / 365.25) AS cnt, ch.ch_name, dc.dtc_name FROM tbl_ch_member mm inner join tbl_ch_mem_spouse sp on mm.ch_mem_id = sp.sp_mem_id INNER JOIN tbl_church ch ON ch.ch_id = mm.ch_mem_ch_id INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id HAVING cnt >= '". $_SESSION['range1'] ."' AND cnt <= '". $_SESSION['range2'] ."' and dc.dtc_name = '". $_SESSION['name_of_user'] ."'";
                    }else
                    {
                    $query ="SELECT mm.ch_mem_id, mm.ch_mem_fullname, FLOOR(DATEDIFF(now(),sp.sp_date_marriage) / 365.25) AS cnt, ch.ch_name, dc.dtc_name FROM tbl_ch_member mm inner join tbl_ch_mem_spouse sp on mm.ch_mem_id = sp.sp_mem_id INNER JOIN tbl_church ch ON ch.ch_id = mm.ch_mem_ch_id INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id HAVING cnt >= '". $_SESSION['range1'] ."' AND cnt <= '". $_SESSION['range2'] ."'"; 
                    }
                    //if not single
                    
                  $result = mysqli_query($fgmembersite->connection, $query);
                  if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                           echo "<tr>";
                           echo "<td>". $row["ch_mem_fullname"] ."</td>";
                           echo "<td>". $row["cnt"] ."</td>";
                           echo "<td>". $row["ch_name"] ."</td>";
                           echo "<td>". $row["dtc_name"] ."</td>";
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
    if($("#member_id").val() == "gender"){
      document.getElementById("labelGender").hidden = false; 
      document.getElementById("gender").hidden = false; 

      document.getElementById("labelCstatus").hidden = true; 
      document.getElementById("cstatus").hidden = true; 

      document.getElementById("range").hidden = true;
      document.getElementById("range1").hidden = true;
      document.getElementById("to").hidden = true; 
      document.getElementById("range2").hidden = true; 
    }else if($("#member_id").val() == "age" || $("#member_id").val() == "yrAsMarried" || $("#member_id").val() == "noCdn"){
      document.getElementById("range").hidden = false;
      document.getElementById("range1").hidden = false;
      document.getElementById("to").hidden = false; 
      document.getElementById("range2").hidden = false; 

      document.getElementById("labelCstatus").hidden = true; 
      document.getElementById("cstatus").hidden = true; 
      
      document.getElementById("labelGender").hidden = true; 
      document.getElementById("gender").hidden = true; 
    }else if($("#member_id").val() == "cstatus"){
      document.getElementById("labelCstatus").hidden = false; 
      document.getElementById("cstatus").hidden = false; 

      document.getElementById("labelGender").hidden = true; 
      document.getElementById("gender").hidden = true; 

      document.getElementById("range").hidden = true;
      document.getElementById("range1").hidden = true;
      document.getElementById("to").hidden = true; 
      document.getElementById("range2").hidden = true; 
    }
    else{
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
     if($("#member_id").val() == ""){
      document.getElementById("member_btn").disabled = true;
     }
  });
</script>