<?php
//disabled export cannot enable because of refresh
include 'header.php';
require_once ("include/membersite_config.php");


// $fgmembersite->DBlogin();
// mysqli_query($fgmembersite->connection, "DELETE FROM tbl_ch_mem_size");
// mysqli_query($fgmembersite->connection, "INSERT INTO tbl_ch_mem_size SELECT a.ch_name, (SELECT COUNT(mm.ch_mem_fullname) FROM tbl_ch_member mm WHERE mm.ch_mem_ch_id = a.ch_id) AS cnt FROM tbl_church a");   


if(isset($_POST['churchExport']))
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
                    <td><label for='churches'>Churches:</label></td>
                    <td><select name='church_id' id="church_id" onClick="typeChange()"/>
                    <option value="" selected>Select your option</option>
                    <option value="all">ALL</option>
                    <option value="location">Location</option>
                    <option value="propertyStat">Property Status</option>
                    <option value="memSize">Membership Size</option>
                    <option value="length">Length of Existence</option>
                    </select></td>

                    <td><label for='type' name="location" id="labelLocation" hidden>Type:</label></td>
                    <td><select name='location' id="location" hidden/>
                    <option value="cityLocation">City</option>
                    <option value="munLocation">Municipality</option>
                    </select></td>

                    <td><label for='type' name="propertyStat" id="labelPropertyStat" hidden>Status:</label></td>
                    <td><select name='propertyStat' id="propertyStat" hidden/>
                    <option value="Owned">Owned</option>
                    <option value="Rented">Rented</option>
                    <option value="Free Use">Free Use</option>
                    </select></td>

                    <td><label for='type' name="range" id="range" hidden>Range:</label></td>
                    <td><input class="form-control" type='number' name='range1' id='range1' onKeyDown="if(this.value.length==4 && event.keyCode!=8) return false;" style="width: 5em" hidden/></td>
                    <td><label id="to" hidden>to</label></td>
                    <td><input class="form-control" type='number' name='range2' id='range2' onKeyDown="if(this.value.length==4 && event.keyCode!=8) return false;" style="width: 5em" hidden/></td>
                    &nbsp;
                    <td><input type="submit" name="churchSubmit" value="View" class="btn btn-primary" id="church_btn_submit"></td>

                    <td><input type="submit" name="churchExport" value="Export" class="btn btn-primary" id="church_btn"></td>
                    
                </tr>
              </table>
          </form>        

        </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">   
          
        <?php 
        if(isset($_POST['churchSubmit'])){
        echo '<script language="javascript">';
        echo 'document.getElementById("church_id").value = "'. $_POST['church_id'] .'"';
        echo '</script>';
        $var_church = $_POST['church_id'];
        $_SESSION['churchExport'] = $var_church;
        $_SESSION['memberExport'] = "NA";
        $_SESSION['ministerExport'] = "NA";

            $fgmembersite->DBlogin();
           if ($var_church == "all")
            {
                echo"<thead bgcolor='#2ECC71'>";    
                echo"<tr><font size ='5'><center><b>ALL</b></font></tr>";  
                echo"    <tr>";
                echo"      <th>Name</th>";
                echo"      <th>District</th>";
                echo"      <th>Division</th>";
                echo"    </tr>";
                echo"</thead>";
                echo"<tbody>";
                if($_SESSION['district_report'] == "1")
                {
                $query ='SELECT ch.ch_name, dv.div_name, dt.dtc_name from tbl_church ch inner join tbl_division dv on ch.ch_div_id = dv.div_id inner join tbl_district dt on ch.ch_dtc_id = dt.dtc_id where dt.dtc_name = "'. $_SESSION['name_of_user'] .'"';
                }else
                {
                  $query ="SELECT ch.ch_name, dv.div_name, dt.dtc_name from tbl_church ch inner join tbl_division dv on ch.ch_div_id = dv.div_id inner join tbl_district dt on ch.ch_dtc_id = dt.dtc_id";
                }

                $result = mysqli_query($fgmembersite->connection, $query);
                  if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                           echo "<tr>";
                           echo "<td>". $row["ch_name"] ."</td>";
                           echo "<td>". $row["dtc_name"] ."</td>";
                           echo "<td>". $row["div_name"] ."</td>";
                           echo "</tr>";
                     }
                   }
            }elseif ($var_church == "location"){
              if ($_POST['location'] == "cityLocation")
              {
                $_SESSION['location'] = $_POST['location'];

                  echo"<thead bgcolor='#2ECC71'>";  
                  echo"<tr><font size ='5'><center><b>Location - City</b></font></tr>";  
                  echo"    <tr>";
                  echo"      <th>Name</th>";
                  echo"      <th>Address</th>";
                  echo"      <th>District</th>";
                  echo"    </tr>";
                  echo"</thead>";
                  echo"<tbody>";
                  if($_SESSION['district_report'] == "1")
                {
                $query ='SELECT ch.ch_id, ch.ch_name, ch.ch_address, dc.dtc_name FROM tbl_church ch INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id where ch.ch_address like "%City%" and dc.dtc_name = "'. $_SESSION['name_of_user'] .'"';
                }else
                {
                  $query ="SELECT ch.ch_id, ch.ch_name, ch.ch_address, dc.dtc_name FROM tbl_church ch INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id where ch.ch_address like '%City%'";
                }
                  
                  $result = mysqli_query($fgmembersite->connection, $query);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                             echo "<tr>";
                             echo "<td>". $row["ch_name"] ."</td>";
                             echo "<td>". $row["ch_address"] ."</td>";
                             echo "<td>". $row["dtc_name"] ."</td>";
                             echo "</tr>";
                       }
                     }
              }
              elseif ($_POST['location'] == "munLocation")
              {
                  $_SESSION['location'] = $_POST['location'];

                  echo"<thead bgcolor='#2ECC71'>";    
                  echo"<tr><font size ='5'><center><b>Location - Municipality</b></font></tr>";  
                  echo"    <tr>";
                  echo"      <th>Name</th>";
                  echo"      <th>Address</th>";
                  echo"      <th>District</th>";
                  echo"    </tr>";
                  echo"</thead>";
                  echo"<tbody>";
                  if($_SESSION['district_report'] == "1")
                {
                $query ='SELECT ch.ch_id, ch.ch_name, ch.ch_address, dc.dtc_name FROM tbl_church ch INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id where ch.ch_address not like "%City%" and dc.dtc_name = "'. $_SESSION['name_of_user'] .'"';
                }else
                {
                  $query ="SELECT ch.ch_id, ch.ch_name, ch.ch_address, dc.dtc_name FROM tbl_church ch INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id where ch.ch_address not like '%City%'";
                }
                  
                  $result = mysqli_query($fgmembersite->connection, $query);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                             echo "<tr>";
                             echo "<td>". $row["ch_name"] ."</td>";
                             echo "<td>". $row["ch_address"] ."</td>";
                             echo "<td>". $row["dtc_name"] ."</td>";
                             echo "</tr>";
                       }
                     }
              }
            }elseif ($var_church == "propertyStat"){
              $_SESSION['propertyStat'] = $_POST['propertyStat'];

                  echo"<thead bgcolor='#2ECC71'>";  
                  echo"<tr><font size ='5'><center><b>Status - ". $_POST['propertyStat'] ."</b></font></tr>";  
                  echo"    <tr>";
                  echo"      <th>Name</th>";
                  echo"      <th>Address</th>";
                  echo"      <th>District</th>";
                  echo"    </tr>";
                  echo"</thead>";
                  echo"<tbody>";
                  if($_SESSION['district_report'] == "1")
                {
                  $query ='SELECT ch.ch_id, ch.ch_name, ch.ch_address, dc.dtc_name FROM tbl_church ch INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id where ch.ch_property_status = "'. $_POST['propertyStat'] .'" and dc.dtc_name = "'. $_SESSION['name_of_user'] .'"';
                }else
                {
                  $query ="SELECT ch.ch_id, ch.ch_name, ch.ch_address, dc.dtc_name FROM tbl_church ch INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id where ch.ch_property_status = '". $_POST['propertyStat'] ."'";
                }
                  
                  $result = mysqli_query($fgmembersite->connection, $query);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                             echo "<tr>";
                             echo "<td>". $row["ch_name"] ."</td>";
                             echo "<td>". $row["ch_address"] ."</td>";
                             echo "<td>". $row["dtc_name"] ."</td>";
                             echo "</tr>";
                       }
                     }
            }
            elseif ($var_church == "memSize")
            {
            	$_SESSION['range1'] = $_POST['range1'];
            	$_SESSION['range2'] = $_POST['range2'];

	                  echo"<thead bgcolor='#2ECC71'>";    
	                  echo"<tr><font size ='5'><center><b>Member Size ". $_SESSION['range1'] ." - ". $_SESSION['range2'] ."</b></font></tr>"; 
	                  echo"    <tr>";
	                  echo"      <th>Name</th>";
	                  echo"      <th>Number of Members</th>";
	                  echo"      <th>District</th>";
	                  echo"    </tr>";
	                  echo"</thead>";
	                  echo"<tbody>";
	                  
	                  // DELETE FROM tbl_ch_mem_size;
                    //   INSERT INTO tbl_ch_mem_size SELECT a.ch_id, a.ch_name, (SELECT COUNT(mm.ch_mem_fullname) FROM tbl_ch_member mm WHERE mm.ch_mem_ch_id = a.ch_id) AS cnt FROM tbl_church a;  

                    if($_SESSION['district_report'] == "1")
                    {
                      $query = "SELECT a.memS_ch_name, a.memS_total, c.dtc_name FROM tbl_ch_mem_size a LEFT JOIN tbl_church b ON a.memS_ch_name = b.ch_name LEFT JOIN tbl_district c ON b.ch_dtc_id = c.dtc_id HAVING memS_total >= '". $_SESSION['range1'] ."' AND  memS_total <= '". $_SESSION['range2'] ."' and c.dtc_name = '". $_SESSION['name_of_user'] ."'";
                    }else
                    {
                    $query = "SELECT a.memS_ch_name, a.memS_total, c.dtc_name FROM tbl_ch_mem_size a LEFT JOIN tbl_church b ON a.memS_ch_name = b.ch_name LEFT JOIN tbl_district c ON b.ch_dtc_id = c.dtc_id HAVING memS_total >= '". $_SESSION['range1'] ."' AND  memS_total <= '". $_SESSION['range2'] ."'";
	                  }
	                  
                	$result = mysqli_query($fgmembersite->connection, $query);
                  if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                           echo "<tr>";
                           echo "<td>". $row["memS_ch_name"] ."</td>";
                           echo "<td>". $row["memS_total"] ."</td>";
                           echo "<td>". $row["dtc_name"] ."</td>";
                           echo "</tr>";
                     }
                   }
	            
            }elseif ($var_church == "length")
            {
            	$_SESSION['range1'] = $_POST['range1'];
            	$_SESSION['range2'] = $_POST['range2'];

                echo"<thead bgcolor='#2ECC71'>";    
                echo"<tr><font size ='5'><center><b>Length of Existence ". $_SESSION['range1'] ." - ". $_SESSION['range2'] ."</b></font></tr>"; 
                echo"    <tr>";
                echo"      <th>Name</th>";
                echo"      <th>Length of Existence</th>";
                echo"      <th>District</th>";
                echo"    </tr>";
                echo"</thead>";
                echo"<tbody>";
                if($_SESSION['district_report'] == "1")
                    {
                      $query ="SELECT ch.ch_id, ch.ch_name, (YEAR(CURRENT_TIMESTAMP) - ch.ch_year_est) as cnt, dc.dtc_name FROM tbl_church ch INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id HAVING cnt >= '". $_SESSION['range1'] ."' AND cnt <= '". $_SESSION['range2'] ."' and dc.dtc_name = '". $_SESSION['name_of_user'] ."'";
                    }else{
                    $query ="SELECT ch.ch_id, ch.ch_name, (YEAR(CURRENT_TIMESTAMP) - ch.ch_year_est) as cnt, dc.dtc_name FROM tbl_church ch INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id HAVING cnt >= '". $_SESSION['range1'] ."' AND cnt <= '". $_SESSION['range2'] ."'";
                    }
                $result = mysqli_query($fgmembersite->connection, $query);
                  if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                           echo "<tr>";
                           echo "<td>". $row["ch_name"] ."</td>";
                           echo "<td>". $row["cnt"] ."</td>";
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
    if($("#church_id").val() == "location"){
	    document.getElementById("labelLocation").hidden = false; 
	    document.getElementById("location").hidden = false; 

      document.getElementById("labelPropertyStat").hidden = true; 
      document.getElementById("propertyStat").hidden = true;

		  document.getElementById("range").hidden = true;
    	document.getElementById("range1").hidden = true;
    	document.getElementById("to").hidden = true; 
    	document.getElementById("range2").hidden = true; 
    }else if($("#church_id").val() == "propertyStat"){
      document.getElementById("labelPropertyStat").hidden = false; 
      document.getElementById("propertyStat").hidden = false; 

      document.getElementById("labelLocation").hidden = true; 
      document.getElementById("location").hidden = true; 

      document.getElementById("range").hidden = true;
      document.getElementById("range1").hidden = true;
      document.getElementById("to").hidden = true; 
      document.getElementById("range2").hidden = true;  
    }else if($("#church_id").val() == "memSize" || $("#church_id").val() == "length"){
    	document.getElementById("range").hidden = false;
    	document.getElementById("range1").hidden = false; 
    	document.getElementById("to").hidden = false; 
    	document.getElementById("range2").hidden = false; 

    	document.getElementById("labelLocation").hidden = true; 
	    document.getElementById("location").hidden = true; 

      document.getElementById("labelPropertyStat").hidden = true; 
      document.getElementById("propertyStat").hidden = true;
    }
    else{
    	document.getElementById("labelLocation").hidden = true; 
	    document.getElementById("location").hidden = true; 
	    
      document.getElementById("labelPropertyStat").hidden = true; 
      document.getElementById("propertyStat").hidden = true;

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
     if($("#church_id").val() == ""){
      document.getElementById("church_btn").disabled = true;
     }
  });
</script>