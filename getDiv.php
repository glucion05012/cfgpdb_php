<?php
require_once ("include/membersite_config.php");
$q = intval($_GET['q']);

$fgmembersite->tablename = 'div_dtc_id';
$fgmembersite->DBlogin();


$result = mysqli_query($fgmembersite->connection, "SELECT * FROM tbl_division WHERE div_dtc_id = '".$q."'");

echo "<table><td bgcolor='gray'><font color='white'><label for='ch_div_id'>Division:</label></td>
    <td><select class='form-control' name='ch_div_id' id='ch_div_id' onchange='viewTable()'>";
    
  if($_SESSION["menuPage"] == "1")
  {
    echo "<option value=''>SELECT</option>";
  }
	if($_SESSION["editDivCheck"] == "1")
	{
        if ($_SESSION["ch_div_id"] == "0")
        {
          echo "<option value='0' selected>SELECT</option>";
        }else
        {
    		  echo "<option value='". $_SESSION["ch_div_id"] ."' selected>" . $_SESSION["ch_div_name"] . "</option>";
        }
    	 $_SESSION['editDivCheck'] = "0";
	}

	if ($result->num_rows > 0)
    {
    while ($row = $result->fetch_assoc())
      {
        echo "<option value='". $row["div_id"] ."'>" . $row["div_name"] . "</option>";
      }
    }

echo "</select></td>";
?>

