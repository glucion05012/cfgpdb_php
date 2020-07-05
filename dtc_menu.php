<?php
include 'header.php';
require_once ("include/membersite_config.php");
?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Districts</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
         <a class='btn btn-primary, pull-right' href='dtc_add.php'>Add District</a>
          </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead align=center bgcolor='#2ECC71'>
                <tr>
                  <th>District</th>
                  <th>Supervisor</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr> 
              </thead>
              <tbody>
                <?php
                  $fgmembersite->DBlogin();
                  $query = "SELECT * FROM tbl_district";
                  $result = mysqli_query($fgmembersite->connection, $query);

                  if ($result->num_rows > 0)
                    {
                    while ($row = $result->fetch_assoc())
                      {
                      echo "<tr>";
                      echo "<td align='center'>" . $row["dtc_name"] . "</td>";
                      echo "<td>" . $row["dtc_spvr"] . "</td>";
                      echo '<td align="center"><a href="dtc_edit.php?districtID='. $row["dtc_id"] .'"><i class="fa fa-pencil" /></a></td>';
                      echo '<td align="center"><A HREF="dtc_delete.php?districtID='. $row["dtc_id"] .'" onclick="return confirm(\'The file will be deleted when you click OK\')"><i class="fa fa-trash" /></A></td>';
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
