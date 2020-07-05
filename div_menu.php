<?php
include 'header.php';
require_once ("include/membersite_config.php");
?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Divisions</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
         <a class='btn btn-primary, pull-right' href='div_add.php'>Add Division</a>
          </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead align=center bgcolor='#2ECC71'>
                <tr>
                  <th>Division</th>
                  <th>District</th>
                  <th>Superintendent</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr> 
              </thead>
              <tbody>
                <?php
                  $fgmembersite->DBlogin();
                  $query = "SELECT * FROM tbl_division";
                  $result = mysqli_query($fgmembersite->connection, $query);

                  if ($result->num_rows > 0)
                    {
                    while ($row = $result->fetch_assoc())
                      {

                      $dtcquery = "SELECT * FROM tbl_district where dtc_id = '". $row['div_dtc_id']."'"; 
                      $dtcresult = mysqli_query($fgmembersite->connection, $dtcquery);
                      while ($row1 = $dtcresult->fetch_assoc())
                        {
                            $dtc_name = $row1['dtc_name'];
                        }

                      echo "<tr>";
                      echo "<td align='center'>" . $row["div_name"] . "</td>";
                      echo "<td align='center'>" . $dtc_name . "</td>";
                      echo "<td>" . $row["div_supt"] . "</td>";
                      echo '<td align="center"><a href="div_edit.php?divisionID='. $row["div_id"] .'"><i class="fa fa-pencil" /></a></td>';
                      echo '<td align="center"><A HREF="div_delete.php?divisionID='. $row["div_id"] .'" onclick="return confirm(\'The file will be deleted when you click OK\')"><i class="fa fa-trash" /></A></td>';
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
