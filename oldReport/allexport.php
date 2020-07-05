<?php
require_once("include/membersite_config.php");
$fgmembersite->DBlogin();

$now = new DateTime(date("Y-m-d"));

if($_SESSION['exportType'] == "church"){
     if($_SESSION['churchExport'] == "all")
    {
        $query ="SELECT * FROM tbl_church";

         $total_query ="SELECT COUNT(*) as total FROM tbl_church";
        $filename = "CFGP Church " . $now->format("Y-m-d");        //File Name
    }elseif($_SESSION['churchExport'] == "cityLocation")
    {
        $query ="SELECT * FROM tbl_church where ch_address like '%City%'";

         $total_query ="SELECT COUNT(*) as total FROM tbl_church where ch_address like '%City%'";
        $filename = "CFGP Church Location in City " . $now->format("Y-m-d");        //File Name
    }elseif($_SESSION['churchExport'] == "munLocation")
    {
        $query ="SELECT * FROM tbl_church where ch_address not like '%City%'";

         $total_query ="SELECT COUNT(*) as total FROM tbl_church where ch_address not like '%City%'";
        $filename = "CFGP Church Location in Municipality " . $now->format("Y-m-d");        //File Name
    }elseif($_SESSION['churchExport'] == "memSize")
    {
        $query ="SELECT tbl_church.ch_id,tbl_church.ch_name, (SELECT COUNT(*) FROM tbl_ch_member WHERE tbl_ch_member.ch_mem_ch_id = tbl_church.ch_id) AS total FROM tbl_church";

         $total_query ="SELECT COUNT(*) as total FROM tbl_ch_member";
        $filename = "CFGP Church Total Member " . $now->format("Y-m-d");        //File Name
    }elseif($_SESSION['churchExport'] == "length")
    {
        $query ="SELECT ch_id, ch_name, ch_year_est FROM tbl_church";

         $total_query ="SELECT COUNT(*) as total FROM tbl_church";
        $filename = "CFGP Church Lenght of Existence " . $now->format("Y-m-d");        //File Name
    }  
}elseif($_SESSION['exportType'] == "mem"){
if($_SESSION['memExport'] == "all")
    {
        $query ="SELECT tbl_ch_member.ch_mem_id, tbl_ch_member.ch_mem_fullname, tbl_church.ch_name FROM tbl_ch_member INNER JOIN tbl_church ON tbl_ch_member.ch_mem_ch_id = tbl_church.ch_id";

        $total_query ="SELECT COUNT(*) as total FROM tbl_ch_member INNER JOIN tbl_church ON tbl_ch_member.ch_mem_ch_id = tbl_church.ch_id";
        $filename = "CFGP Members " . $now->format("Y-m-d");        //File Name
    }
}
       

//*******YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE*******/    
//create MySQL connection   

$result = mysqli_query($fgmembersite->connection, $query); 
$total_result = mysqli_query($fgmembersite->connection, $total_query); 
$file_ending = "xls";
//header info for browser
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");
/*******Start of Formatting for Excel*******/   
//define separator (defines columns in excel & tabs in word)
$sep = "\t"; //tabbed character

//start of printing column names as names of MySQL fields
//for ($i = 0; $i < mysqli_num_fields($result); $i++) {
//echo mysql_field_name($result,$i) . "\t";
//}
//print("\n");    
//end of printing column names  

print ("CHURCH OF THE FOURSQUARE GOSPEL IN THE PHILIPPINES");
print("\n");
print("\n");
print("\n");
if($_SESSION['exportType'] == "church"){
if($_SESSION['churchExport'] == "all")
    {
        print("ALL CHURCH");
        print("\n");
        print("\n");
        if ($total_result->num_rows > 0) {
              while($row = $total_result->fetch_assoc()) {
                print("TOTAL:". "\t" . $row["total"]);  
             }
         }
        print("\n");
        print("\n");
        
        echo("CHURCH NAME" . "\t");
        echo("ADDRESS" . "\t");
    }
elseif($_SESSION['churchExport'] == "cityLocation")
    {
        print("CHURCH LOCATION IN CITY");
        print("\n");
        print("\n");
        if ($total_result->num_rows > 0) {
              while($row = $total_result->fetch_assoc()) {
                print("TOTAL:". "\t" . $row["total"]);  
             }
         }
        print("\n");
        print("\n");
        
        echo("CHURCH NAME" . "\t");
        echo("ADDRESS" . "\t");
    }elseif($_SESSION['churchExport'] == "munLocation")
    {
        print("CHURCH LOCATION IN MUNICIPALITY");
        print("\n");
        print("\n");
        if ($total_result->num_rows > 0) {
              while($row = $total_result->fetch_assoc()) {
                print("TOTAL:". "\t" . $row["total"]);  
             }
         }
        print("\n");
        print("\n");
        
        echo("CHURCH NAME" . "\t");
        echo("ADDRESS" . "\t");
    }   
    elseif($_SESSION['churchExport'] == "memSize")
    {
        print("CHURCH TOTAL MEMBER");
        print("\n");
        print("\n");
        if ($total_result->num_rows > 0) {
              while($row = $total_result->fetch_assoc()) {
                print("TOTAL:". "\t" . $row["total"]);  
             }
         }
        print("\n");
        print("\n");
        
        echo("CHURCH NAME" . "\t");
        echo("Number of Members" . "\t");
    }elseif($_SESSION['churchExport'] == "length")
    {
        print("CHURCH LENGHT OF EXISTENCE");
        print("\n");
        print("\n");
        if ($total_result->num_rows > 0) {
              while($row = $total_result->fetch_assoc()) {
                print("TOTAL:". "\t" . $row["total"]);  
             }
         }
        print("\n");
        print("\n");
        
        echo("CHURCH NAME" . "\t");
        echo("Lenght of Existence" . "\t");
    }  
}elseif($_SESSION['exportType'] == "mem"){

    //unset session for print
    $_SESSION['churchExport'] = "";

    if($_SESSION['memExport'] == "all")
    {
        print("ALL MEMBERS");
        print("\n");
        print("\n");
        if ($total_result->num_rows > 0) {
              while($row = $total_result->fetch_assoc()) {
                print("TOTAL:". "\t" . $row["total"]);  
             }
         }
        print("\n");
        print("\n");
        
        echo("NAME" . "\t");
        echo("CHURCH NAME" . "\t");
    }
}


    print("\n"); 

//start while loop to get data
    while($row = mysqli_fetch_row($result))
    {
        $schema_insert = "";
        for($j=0; $j<mysqli_num_fields($result);$j++)
        {
            if(!isset($row[$j]))
                $schema_insert .= "NULL".$sep;
            elseif ($row[$j] != "")
             switch($j)
                {
                    case 1:
                        $schema_insert .=$row[$j].$sep;
                        break;
                    case 2:
                    if ($_SESSION['churchExport'] == "length"){
                        $yrExt = date("Y") - (int)$row[$j];
                        $schema_insert .=$yrExt.$sep;  
                    }else{
                        $schema_insert .=$row[$j].$sep;  
                    }
                        
                        break;      
                    
                    default:
                        break;
                    }
            else
                $schema_insert .= "".$sep;
        }
        $schema_insert = str_replace($sep."$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
    }  
    
$_SESSION['exportqry'] = "";
$_SESSION['export'] = "";
?>