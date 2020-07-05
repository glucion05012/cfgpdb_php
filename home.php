<?php
include 'header.php';

//IF ADMIN
 if($_SESSION['home_settings']=="1")
 {
  //CHURCHES
  $fgmembersite->tablename = 'tbl_church';
  $fgmembersite->DBlogin();
  $query = "SELECT COUNT(*) FROM tbl_church where ch_status = 'Active'";
  $result = mysqli_query($fgmembersite->connection, $query);

  while ($row = $result->fetch_assoc())
    {
          $ch_active = $row["COUNT(*)"];                        
    }

  $query = "SELECT COUNT(*) FROM tbl_church where ch_status = 'Inactive'";
  $result = mysqli_query($fgmembersite->connection, $query);

  while ($row = $result->fetch_assoc())
    {
          $ch_inactive = $row["COUNT(*)"];                        
    }

  $query = "SELECT COUNT(*) FROM tbl_church";
  $result = mysqli_query($fgmembersite->connection, $query);

  while ($row = $result->fetch_assoc())
    {
          $ch_total = $row["COUNT(*)"];                        
    }

//MINISTERS
  $fgmembersite->tablename = 'tbl_minister';
  $fgmembersite->DBlogin();
  $query = "SELECT COUNT(*) FROM tbl_minister where min_status = 'Active'";
  $result = mysqli_query($fgmembersite->connection, $query);

  while ($row = $result->fetch_assoc())
    {
          $min_active = $row["COUNT(*)"];                        
    }

  $query = "SELECT COUNT(*) FROM tbl_minister where min_status = 'Inactive'";
  $result = mysqli_query($fgmembersite->connection, $query);

  while ($row = $result->fetch_assoc())
    {
          $min_inactive = $row["COUNT(*)"];                        
    }

  $query = "SELECT COUNT(*) FROM tbl_minister where min_status = '(Deceased)'";
  $result = mysqli_query($fgmembersite->connection, $query);

  while ($row = $result->fetch_assoc())
    {
          $min_deceased = $row["COUNT(*)"];                        
    }

  $query = "SELECT COUNT(*) FROM tbl_minister";
  $result = mysqli_query($fgmembersite->connection, $query);

  while ($row = $result->fetch_assoc())
    {
          $min_total = $row["COUNT(*)"];                        
    }

    //MEMBERS
  $fgmembersite->tablename = 'tbl_ch_member';
  $fgmembersite->DBlogin();
  $query = "SELECT COUNT(*) FROM tbl_ch_member where ch_mem_status = 'Active'";
  $result = mysqli_query($fgmembersite->connection, $query);

  while ($row = $result->fetch_assoc())
    {
          $ch_mem_active = $row["COUNT(*)"];                        
    }

  $query = "SELECT COUNT(*) FROM tbl_ch_member where ch_mem_status = 'Inactive'";
  $result = mysqli_query($fgmembersite->connection, $query);

  while ($row = $result->fetch_assoc())
    {
          $ch_mem_inactive = $row["COUNT(*)"];                        
    }

  $query = "SELECT COUNT(*) FROM tbl_ch_member where ch_mem_status = '(Deceased)'";
  $result = mysqli_query($fgmembersite->connection, $query);

  while ($row = $result->fetch_assoc())
    {
          $ch_mem_deceased = $row["COUNT(*)"];                        
    }

  $query = "SELECT COUNT(*) FROM tbl_ch_member";
  $result = mysqli_query($fgmembersite->connection, $query);

  while ($row = $result->fetch_assoc())
    {
          $ch_mem_total = $row["COUNT(*)"];                        
    }
  }elseif($_SESSION['home_settings']=="0"){
  //IF NOT ADMIN
  $dtc = $_SESSION['username_of_user'];

  //CHURCHES
  $fgmembersite->tablename = 'tbl_church';
  $fgmembersite->DBlogin();
  $query = "SELECT COUNT(*) FROM tbl_church a JOIN tbl_district b ON a.ch_dtc_id = b.dtc_id where b.dtc_name = '". $dtc ."' AND a.ch_status = 'Active'";
  $result = mysqli_query($fgmembersite->connection, $query);

  while ($row = $result->fetch_assoc())
    {
          $ch_active = $row["COUNT(*)"];                        
    }

   $query = "SELECT COUNT(*) FROM tbl_church a JOIN tbl_district b ON a.ch_dtc_id = b.dtc_id where b.dtc_name = '". $dtc ."' AND a.ch_status = 'Inactive'";
  $result = mysqli_query($fgmembersite->connection, $query);

  while ($row = $result->fetch_assoc())
    {
          $ch_inactive = $row["COUNT(*)"];                        
    }

  $query = "SELECT COUNT(*) FROM tbl_church a JOIN tbl_district b ON a.ch_dtc_id = b.dtc_id where b.dtc_name = '". $dtc ."'";
  $result = mysqli_query($fgmembersite->connection, $query);

  while ($row = $result->fetch_assoc())
    {
          $ch_total = $row["COUNT(*)"];                        
    }
  
//MINISTERS
  $fgmembersite->tablename = 'tbl_minister';
  $fgmembersite->DBlogin();
  $query = "SELECT COUNT(*) FROM tbl_minister a JOIN tbl_district b ON a.min_dtc_id = b.dtc_id where b.dtc_name = '". $dtc ."' AND a.min_status = 'Active'";
  $result = mysqli_query($fgmembersite->connection, $query);

  while ($row = $result->fetch_assoc())
    {
          $min_active = $row["COUNT(*)"];                        
    }

  $query = "SELECT COUNT(*) FROM tbl_minister a JOIN tbl_district b ON a.min_dtc_id = b.dtc_id where b.dtc_name = '". $dtc ."' AND a.min_status = 'Inactive'";
  $result = mysqli_query($fgmembersite->connection, $query);

  while ($row = $result->fetch_assoc())
    {
          $min_inactive = $row["COUNT(*)"];                        
    }

  $query = "SELECT COUNT(*) FROM tbl_minister a JOIN tbl_district b ON a.min_dtc_id = b.dtc_id where b.dtc_name = '". $dtc ."' AND a.min_status = '(Deceased)'";
  $result = mysqli_query($fgmembersite->connection, $query);

  while ($row = $result->fetch_assoc())
    {
          $min_deceased = $row["COUNT(*)"];                        
    }

  $query = "SELECT COUNT(*) FROM tbl_minister a JOIN tbl_district b ON a.min_dtc_id = b.dtc_id where b.dtc_name = '". $dtc ."'";
  $result = mysqli_query($fgmembersite->connection, $query);

  while ($row = $result->fetch_assoc())
    {
          $min_total = $row["COUNT(*)"];                        
    }

    //MEMBERS
  $fgmembersite->tablename = 'tbl_ch_member';
  $fgmembersite->DBlogin();
   $query = "SELECT COUNT(*) FROM tbl_ch_member a JOIN tbl_church b ON a.ch_mem_ch_id = b.ch_id JOIN tbl_district c ON b.ch_dtc_id = c.dtc_id where c.dtc_name = '". $dtc ."' AND ch_mem_status = 'Active'";
  $result = mysqli_query($fgmembersite->connection, $query);

  while ($row = $result->fetch_assoc())
    {
          $ch_mem_active = $row["COUNT(*)"];                        
    }

  $query = "SELECT COUNT(*) FROM tbl_ch_member a JOIN tbl_church b ON a.ch_mem_ch_id = b.ch_id JOIN tbl_district c ON b.ch_dtc_id = c.dtc_id where c.dtc_name = '". $dtc ."' AND ch_mem_status = 'Inactive'";
  $result = mysqli_query($fgmembersite->connection, $query);

  while ($row = $result->fetch_assoc())
    {
          $ch_mem_inactive = $row["COUNT(*)"];                        
    }

  $query = "SELECT COUNT(*) FROM tbl_ch_member a JOIN tbl_church b ON a.ch_mem_ch_id = b.ch_id JOIN tbl_district c ON b.ch_dtc_id = c.dtc_id where c.dtc_name = '". $dtc ."' AND ch_mem_status = '(Deceased)'";
  $result = mysqli_query($fgmembersite->connection, $query);

  while ($row = $result->fetch_assoc())
    {
          $ch_mem_deceased = $row["COUNT(*)"];                        
    }

   $query = "SELECT COUNT(*) FROM tbl_ch_member a JOIN tbl_church b ON a.ch_mem_ch_id = b.ch_id JOIN tbl_district c ON b.ch_dtc_id = c.dtc_id where c.dtc_name = '". $dtc ."'";
  $result = mysqli_query($fgmembersite->connection, $query);

  while ($row = $result->fetch_assoc())
    {
          $ch_mem_total = $row["COUNT(*)"];                        
    }
  }
  
  
  
?>

<style type="text/css"> 
.box{
  width:25px;
  height:25px;
}
 
.green{
  background:green;
}
.red{
  background:red;
}
.orange{
  background:orange;
} 
.floatedTable {
    float:left;
}
.inlineTable {
    display: inline-block;
}
</style>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><b>Home</b></a>
        </li>
        <li class="breadcrumb-item active"><b>Summary</b></li>
      </ol>

      <table class="inlineTable" border =1>
        <tr>
          <td colspan="3"><center><b>Churches</b></center></td>
        </tr>
        <tr>
        <td align="left" width="30"><div class="box green"></div></td>
        <td width="80"><label>Active: </label></td>
        <td valign="top"><a href="summary.php?col=ch_name&tbl=tbl_church&status=ch_status&statusVal='Active'&dtcID=ch_dtc_id" onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;"><?php echo $ch_active ?></a></td>
        </tr>
        <tr>
        <td align="left" width="30"><div class="box red"></div></td>
        <td width="80"><label>Inactive: </label></td>
        <td valign="top"><a href="summary.php?col=ch_name&tbl=tbl_church&status=ch_status&statusVal='Inactive'&dtcID=ch_dtc_id" onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;"><?php echo $ch_inactive ?></a></td>
        <tr>
        <td></td>
        <td width="80"><label><B>Total: </label></td>
        <td valign="top"><B><?php echo $ch_total ?></td>
        </tr>
        <tr>
        <td colspan=3 height="32"></td>
        </tr>
    
         <tr>
          <td colspan="3">
            <div>
              <canvas id="churchCanvas"></canvas>    
            </div>
          </td>
         </tr>
        </table>

        <table class="inlineTable"  border =1>
        <tr>
          <td colspan="3"><center><b>Ministers</b></center></td>
        </tr>
        <tr>
        <td align="left" width="30"><div class="box green"></div></td>
        <td width="80"><label>Active: </label></td>
        <td valign="top"><a href="summary.php?col=min_fullname&tbl=tbl_minister&status=min_status&statusVal='Active'&dtcID=min_dtc_id" onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;"><?php echo $min_active ?></a></td>
        </tr>
        <tr>
        <td align="left" width="30"><div class="box red"></div></td>
        <td width="80"><label>Inactive: </label></td>
        <td valign="top"><a href="summary.php?col=min_fullname&tbl=tbl_minister&status=min_status&statusVal='Inactive'&dtcID=min_dtc_id" onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;"><?php echo $min_inactive ?></a></td>
        </tr>
        <tr>
        <td align="left" width="30"><div class="box orange"></div></td>
        <td width="80"><label>Deceased: </label></td>
        <td valign="top"><a href="summary.php?col=min_fullname&tbl=tbl_minister&status=min_status&statusVal='(Deceased)'&dtcID=min_dtc_id" onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;"><?php echo $min_deceased ?></a></td>
        </tr>
        <tr>
        <td></td>
        <td width="80"><label><B>Total: </label></td>
        <td valign="top"><B><?php echo $min_total ?></td>
        </tr>
    
         <tr>
          <td colspan="3">
            <div>
              <canvas id="ministerCanvas"></canvas>    
            </div>
          </td>
         </tr>
        </table>

        <table class="inlineTable"  border =1>
        <tr>
          <td colspan="3"><center><b>Members</b></center></td>
        </tr>
        <tr>
        <td align="left" width="30"><div class="box green"></div></td>
        <td width="80"><label>Active: </label></td>
        <td valign="top"><a href="summary.php?col=ch_mem_fullname&tbl=tbl_ch_member&status=ch_mem_status&statusVal='Active'" onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;"><?php echo $ch_mem_active ?></a></td>
        </tr>
        <tr>
        <td align="left" width="30"><div class="box red"></div></td>
        <td width="80"><label>Inactive: </label></td>
        <td valign="top"><a href="summary.php?col=ch_mem_fullname&tbl=tbl_ch_member&status=ch_mem_status&statusVal='Inactive'" onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;"><?php echo $ch_mem_inactive ?></a></td>
        </tr>
        <tr>
        <td align="left" width="30"><div class="box orange"></div></td>
        <td width="80"><label>Deceased: </label></td>
        <td valign="top"><a href="summary.php?col=ch_mem_fullname&tbl=tbl_ch_member&status=ch_mem_status&statusVal='(Deceased)'" onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;"><?php echo $ch_mem_deceased ?></a></td>
        </tr>
        <tr>
        <td></td>
        <td width="80"><label><B>Total: </label></td>
        <td valign="top"><B><?php echo $ch_mem_total ?></td>
        </tr>
    
         <tr>
          <td colspan="3">
            <div>
              <canvas id="memberCanvas"></canvas>    
            </div>
          </td>
         </tr>
        </table>
    </div>
  </div>
<?php
include 'footer.php';
?>    
<script>
      $(document).ready(function(){
        var ctx = $("#churchCanvas").get(0).getContext("2d");
        var chart = new Chart(ctx);

        var data = [
          {
              value: <?php echo $ch_active ?>,
              color: "green",
              label: "Active"
          },
          {
              value: <?php echo $ch_inactive ?>,
              color: "red",
              label: "Inactive"
          }
        ];

        var pieOptions     = {
        //Boolean - Whether we should show a stroke on each segment
        segmentShowStroke    : true,
        //String - The colour of each segment stroke
        segmentStrokeColor   : '#fff',
        //Number - The width of each segment stroke
        segmentStrokeWidth   : 2,
        //Number - The percentage of the chart that we cut out of the middle
        percentageInnerCutout: 50, // This is 0 for Pie charts
        //Number - Amount of animation steps
        animationSteps       : 100,
        //String - Animation easing effect
        animationEasing      : 'easeOutBounce',
        //Boolean - Whether we animate the rotation of the Doughnut
        animateRotate        : true,
        //Boolean - Whether we animate scaling the Doughnut from the centre
        animateScale         : false,
        //Boolean - whether to make the chart responsive to window resizing
        responsive           : true,
        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio  : true,
        //String - A legend template
        legendTemplate       : '<ul class="chart-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
        }

        chart.Doughnut(data, pieOptions);

       var ctx = $("#ministerCanvas").get(0).getContext("2d");
        var chart = new Chart(ctx);

        var data = [
          {
              value: <?php echo $min_active ?>,
              color: "green",
              label: "Active"
          },
          {
              value: <?php echo $min_inactive ?>,
              color: "red",
              label: "Inactive"
          },
          {
              value: <?php echo $min_deceased ?>,
              color: "orange",
              label: "Deceased"
          }
        ];

        var pieOptions     = {
        //Boolean - Whether we should show a stroke on each segment
        segmentShowStroke    : true,
        //String - The colour of each segment stroke
        segmentStrokeColor   : '#fff',
        //Number - The width of each segment stroke
        segmentStrokeWidth   : 2,
        //Number - The percentage of the chart that we cut out of the middle
        percentageInnerCutout: 50, // This is 0 for Pie charts
        //Number - Amount of animation steps
        animationSteps       : 100,
        //String - Animation easing effect
        animationEasing      : 'easeOutBounce',
        //Boolean - Whether we animate the rotation of the Doughnut
        animateRotate        : true,
        //Boolean - Whether we animate scaling the Doughnut from the centre
        animateScale         : false,
        //Boolean - whether to make the chart responsive to window resizing
        responsive           : true,
        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio  : true,
        //String - A legend template
        legendTemplate       : '<ul class="chart-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
        }

        chart.Doughnut(data, pieOptions);

          
         var ctx = $("#memberCanvas").get(0).getContext("2d");
        var chart = new Chart(ctx);

        var data = [
          {
              value: <?php echo $ch_mem_active ?>,
              color: "green",
              label: "Active"
          },
          {
              value: <?php echo $ch_mem_inactive ?>,
              color: "red",
              label: "Inactive"
          },
          {
              value: <?php echo $ch_mem_deceased ?>,
              color: "orange",
              label: "Deceased"
          }
        ];

        var pieOptions     = {
        //Boolean - Whether we should show a stroke on each segment
        segmentShowStroke    : true,
        //String - The colour of each segment stroke
        segmentStrokeColor   : '#fff',
        //Number - The width of each segment stroke
        segmentStrokeWidth   : 2,
        //Number - The percentage of the chart that we cut out of the middle
        percentageInnerCutout: 50, // This is 0 for Pie charts
        //Number - Amount of animation steps
        animationSteps       : 100,
        //String - Animation easing effect
        animationEasing      : 'easeOutBounce',
        //Boolean - Whether we animate the rotation of the Doughnut
        animateRotate        : true,
        //Boolean - Whether we animate scaling the Doughnut from the centre
        animateScale         : false,
        //Boolean - whether to make the chart responsive to window resizing
        responsive           : true,
        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio  : true,
        //String - A legend template
        legendTemplate       : '<ul class="chart-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
        }

        chart.Doughnut(data, pieOptions);
      });
        
</script>
