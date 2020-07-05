<?php
require_once("include/membersite_config.php");
if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("index.php");
    exit;
}
?>  
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="home.php"><img src="style/4squareLogo.jpg" width="42" height="40">&nbsp; CFGP CENTRAL DATABASE - <?php echo $_SESSION['name_of_user'] ?></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="home.php">
            <i class="fa fa-fw fa-star"></i>
            <span class="nav-link-text">Home</span>
          </a>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">

          <?php
          if($_SESSION['home_settings']=="0")
          {
            $fgmembersite->DBlogin();
             $dtcquery = "SELECT * FROM tbl_district where dtc_name = '". $_SESSION['username_of_user'] ."'"; 
                            $dtcresult = mysqli_query($fgmembersite->connection, $dtcquery);
                            while ($row2 = $dtcresult->fetch_assoc())
                              {
                                  $dtcid = $row2['dtc_id'];
                                  $dtcName = $row2['dtc_name'];
                              }

          if($_SESSION['type_of_user']=="encoder")
            {
              echo"<a class='nav-link' href='ch_menu.php?chDivID=0&chDtcID=0&chDtcName=SELECT&chDivName=-'>";
            }else
            {
              echo"<a class='nav-link' href='ch_menu.php?chDivID=0&chDtcID=". $dtcid ."&chDtcName=". $dtcName ."&chDivName=SELECT'>";          
            }
          }
          elseif($_SESSION['home_settings']=="1")
          {
          echo"<a class='nav-link' href='ch_menu.php?chDivID=0&chDtcID=0&chDtcName=SELECT&chDivName=-'>";
          }
          ?>

            <i class="fa fa-fw fa-home"></i>
            <span class="nav-link-text">Churches</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="min_menu.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Ministers</span>
          </a>
        </li>
        
        <li class='nav-item' data-toggle='tooltip' data-placement='right' title='Tables'>
          <a class='nav-link' href='mem_menu.php'>
            <i class='fa fa-fw fa-user'></i>
            <span class='nav-link-text'>Members</span>
          </a>
        </li>
         <?php
         
          echo"
      <li class='nav-item' data-toggle='tooltip' data-placement='right' title='Reports'>
          <a class='nav-link nav-link-collapse collapsed' data-toggle='collapse' href='#collapseReports' data-parent='#exampleAccordion'>
            <i class='fa fa-fw fa-cog'></i>
            <span class='nav-link-text'>Reports</span>
          </a>
          <ul class='sidenav-second-level collapse' id='collapseReports'>
            <li>
              <a href='churchReports.php'>Churches</a>
            </li>
            <li>
              <a href='memberReports.php'>Members</a>
            </li>
            <li>
              <a href='ministersReports.php'>Ministers</a>
            </li>
          </ul>
        </li>
        
        <li class='nav-item' data-toggle='tooltip' data-placement='right' title='Settings'>
          <a class='nav-link nav-link-collapse collapsed' data-toggle='collapse' href='#collapseSettings' data-parent='#exampleAccordion'>
            <i class='fa fa-fw fa-cog'></i>
            <span class='nav-link-text'>Settings</span>
          </a>
          <ul class='sidenav-second-level collapse' id='collapseSettings'>
            <li>
              <a href='profile.php'>Profile</a>
            </li>
            ";
            if($_SESSION['home_settings']=="1" && $_SESSION['type_of_user']=="admin")
            {
            echo"
            <li>
              <a href='dtc_menu.php'>District</a>
            </li>
            <li>
              <a href='div_menu.php'>Division</a>
            </li>
            <li>
              <a href='undermaintenance.php'>Database</a>
            </li>
              ";
            }
            echo"
          </ul>
        </li>
        ";
        if($_SESSION['home_settings']=="1" && $_SESSION['type_of_user']=="admin")
        {

        echo"
        <li class='nav-item' data-toggle='tooltip' data-placement='right' title='Tables'>
          <a class='nav-link' href='backup.php'>
            <i class='fa fa-fw fa-database'></i>
            <span class='nav-link-text'>Backup</span>
          </a>
      </li>
        ";
        }
      ?>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
</nav>
     <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
  <body>