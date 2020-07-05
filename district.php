<?php
include 'header.php';
require_once ("include/membersite_config.php");
?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">District</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
         <a class='btn btn-primary, pull-right' href='addDistrict.php'>Add District</a>
          </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead align=center>
                <tr>
                  <th>District</th>
                  <th>Notes</th>
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
                      echo "<td align='center'>" . $row["dtc_notes"] . "</td>";
                      echo '<td align="center"><a href="editDistrict.php?districtID='. $row["dtc_id"] .'">edit</a></td>';
                      echo '<td align="center"><A HREF="deleteDistrict.php?districtID='. $row["dtc_id"] .'">delete</A></td>';
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
