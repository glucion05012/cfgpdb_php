<?php
include 'header.php';
require_once ("include/membersite_config.php");
?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Profile Management</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">

        <!-- <?php
        if($_SESSION['type_of_user']=="admin"){
        echo"
        <div class='card-header'>
         <a class='btn btn-primary, pull-right' href='addUser.php'>Add User</a>
          </div>
        ";
        }
        ?> -->

          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead align=center bgcolor='#2ECC71'>
                <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Password</th>
                </tr> 
              </thead>
              <tbody>
                <?php
                  $fgmembersite->DBlogin();
                  if($_SESSION['type_of_user']=="admin")
                  {
                    $query = "SELECT * FROM login";  
                  }else
                  {
                    $query = "SELECT * FROM login where username = '". $_SESSION['username_of_user'] ."'";
                  }
                  
                  $result = mysqli_query($fgmembersite->connection, $query);

                  if ($result->num_rows > 0)
                    {
                    while ($row = $result->fetch_assoc())
                      {
                      echo "<tr>";
                      echo "<td align='center'>" . $row["id_user"] . "</td>";
                      echo "<td align='center'>" . $row["username"] . "</td>";
                      echo '<td align="center"><a href="pw_edit.php?userID='. $row["id_user"] .'&name='. $row["name"] .'"><i class="fa fa-pencil" /></a></td>';
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
