<?php
//disabled export cannot enable because of refresh
include 'header.php';
require_once ("include/membersite_config.php");
$_SESSION['exportType'] = "";

if(isset($_POST['churchExport']))
{
			$_SESSION['exportType'] = "church";
            echo '<script language="javascript">';
            echo 'alert("Click OK to download."); location.href="allexport.php"';
            echo '</script>';
}elseif(isset($_POST['memExport']))
{			
			$_SESSION['exportType'] = "mem";
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
          <i class="fa fa-table"> Export</i>

          <form method="post">
              <table >
                <tr>
                    <!--CHURCHES-->
                    <td><label for='churches'>Churches:</label></td>
                    <td><select name='church_id' id="church_id" onchange="clickChurchSubmit()"/>
                    <option value="" selected>Select your option</option>
                    <option value="all">ALL</option>
                    <option value="cityLocation">City-Location</option>
                    <option value="munLocation">Municipality-Location</option>
                    <option value="memSize">Membership Size</option>
                    <option value="length">Length of Existence</option>
                    </select></td>
                    &nbsp;
                    <td><input type="submit" name="churchSubmit" value="View" class="btn btn-primary" id="church_btn_submit" hidden></td>

                    <td width="12%"><input type="submit" name="churchExport" value="Export" class="btn btn-primary" id="church_btn"></td>


                    <!--MEMBERS-->
                    <td><label for='members'>Members:</label></td>
                    <td><select name='mem_id' id="mem_id" onchange="clickMemSubmit()"/>
                        <option value="" selected>Select your option</option>
                        <option value="all">ALL</option>
                        </select></td>
                  
                    <td><input type="submit" name="memSubmit" value="View" class="btn btn-primary" id="mem_btn_submit" hidden></td>

                    <td width="35%"><input type="submit" name="memExport" value="Export" class="btn btn-primary" id="mem_btn"></td>

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

            $fgmembersite->DBlogin();
           if ($var_church == "all")
            {
                echo"<thead>";    
                echo"    <tr>";
                echo"      <th>Name</th>";
                echo"      <th>Address</th>";
                echo"    </tr>";
                echo"</thead>";
                echo"<tbody>";
                $query ="SELECT * FROM tbl_church";
                $result = mysqli_query($fgmembersite->connection, $query);
                  if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                           echo "<tr>";
                           echo "<td>". $row["ch_name"] ."</td>";
                           echo "<td>". $row["ch_address"] ."</td>";
                           echo "</tr>";
                     }
                   }
            }
           elseif ($var_church == "cityLocation")
            {
                echo"<thead>";    
                echo"    <tr>";
                echo"      <th>Name</th>";
                echo"      <th>Address</th>";
                echo"      <th>Location</th>";
                echo"    </tr>";
                echo"</thead>";
                echo"<tbody>";
                $query ="SELECT * FROM tbl_church where ch_address like '%City%'";
                $result = mysqli_query($fgmembersite->connection, $query);
                  if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                           echo "<tr>";
                           echo "<td>". $row["ch_name"] ."</td>";
                           echo "<td>". $row["ch_address"] ."</td>";
                           echo "<td>City</td>";
                           echo "</tr>";
                     }
                   }
            }
            elseif ($var_church == "munLocation")
            {
                echo"<thead>";    
                echo"    <tr>";
                echo"      <th>Name</th>";
                echo"      <th>Address</th>";
                echo"      <th>Location</th>";
                echo"    </tr>";
                echo"</thead>";
                echo"<tbody>";
                $query ="SELECT * FROM tbl_church where ch_address not like '%City%'";
                $result = mysqli_query($fgmembersite->connection, $query);
                  if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                           echo "<tr>";
                           echo "<td>". $row["ch_name"] ."</td>";
                           echo "<td>". $row["ch_address"] ."</td>";
                           echo "<td>Municipality</td>";
                           echo "</tr>";
                     }
                   }
            }elseif ($var_church == "memSize")
            {
                echo"<thead>";    
                echo"    <tr>";
                echo"      <th>Name</th>";
                echo"      <th>Number of Members</th>";
                echo"    </tr>";
                echo"</thead>";
                echo"<tbody>";
                $query ="SELECT tbl_church.ch_name, (SELECT COUNT(*) FROM tbl_ch_member WHERE tbl_ch_member.ch_mem_ch_id = tbl_church.ch_id) AS total FROM tbl_church";
                $result = mysqli_query($fgmembersite->connection, $query);
                  if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                           echo "<tr>";
                           echo "<td>". $row["ch_name"] ."</td>";
                           echo "<td>". $row["total"] ."</td>";
                           echo "</tr>";
                     }
                   }
            }elseif ($var_church == "length")
            {
                echo"<thead>";    
                echo"    <tr>";
                echo"      <th>Name</th>";
                echo"      <th>Length of Existence</th>";
                echo"    </tr>";
                echo"</thead>";
                echo"<tbody>";
                $query ="SELECT ch_name, ch_year_est FROM tbl_church";
                $result = mysqli_query($fgmembersite->connection, $query);
                  if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                           echo "<tr>";
                           echo "<td>". $row["ch_name"] ."</td>";
                           $yrExt = date("Y") - (int)$row["ch_year_est"];
                           if($yrExt != date("Y"))
                           {
                            echo "<td>". $yrExt ."</td>";
                           }else
                           {
                            echo "<td></td>";
                           }
                           echo "</tr>";
                     }
                   }
            }
        } elseif(isset($_POST['memSubmit'])){
        	echo '<script language="javascript">';
	        echo 'document.getElementById("mem_id").value = "'. $_POST['mem_id'] .'"';
	        echo '</script>';
	        $var_mem = $_POST['mem_id'];
	        $_SESSION['memExport'] = $var_mem;

	            $fgmembersite->DBlogin();
	           if ($var_mem == "all")
	            {
	                echo"<thead>";    
	                echo"    <tr>";
	                echo"      <th>Name</th>";
	                echo"      <th>Church</th>";
	                echo"    </tr>";
	                echo"</thead>";
	                echo"<tbody>";
	                $query ="SELECT tbl_ch_member.ch_mem_fullname, tbl_church.ch_name FROM tbl_ch_member INNER JOIN tbl_church ON tbl_ch_member.ch_mem_ch_id = tbl_church.ch_id";
	                $result = mysqli_query($fgmembersite->connection, $query);
	                  if ($result->num_rows > 0) {
	                      while($row = $result->fetch_assoc()) {
	                           echo "<tr>";
	                           echo "<td>". $row["ch_mem_fullname"] ."</td>";
	                           echo "<td>". $row["ch_name"] ."</td>";
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
   	function clickChurchSubmit() {
      //document.getElementById("church_btn").disabled = true;
      document.getElementById("church_btn_submit").click(); 
  }
	function clickMemSubmit() {
      //document.getElementById("church_btn").disabled = true;
      document.getElementById("mem_btn_submit").click(); 
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

      if($("#mem_id").val() == ""){
      document.getElementById("mem_btn").disabled = true;
     }
  });
</script>