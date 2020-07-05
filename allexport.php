<?php
require_once("include/membersite_config.php");
$fgmembersite->DBlogin();

$now = new DateTime(date("Y-m-d"));

//DISTRICT REPORTS
//CHURCH EXPORT
if($_SESSION['district_report'] == "1")
{
    if($_SESSION['churchExport'] == "all")
    {
        $query ="SELECT ch.ch_id, ch.ch_name, dt.dtc_name, dv.div_name from tbl_church ch inner join tbl_division dv on ch.ch_div_id = dv.div_id inner join tbl_district dt on ch.ch_dtc_id = dt.dtc_id and dt.dtc_name = '". $_SESSION['name_of_user'] ."'";
        $filename = "CFGP Church " . $now->format("Y-m-d");        //File Name
    }elseif($_SESSION['churchExport'] == "location")
    {
        if($_SESSION['location'] == "cityLocation"){
            $query ="SELECT ch.ch_id, ch.ch_name, ch.ch_address, dc.dtc_name FROM tbl_church ch INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id where ch.ch_address like '%City%' and dc.dtc_name = '". $_SESSION['name_of_user'] ."'";
            $filename = "CFGP Church Location in City " . $now->format("Y-m-d");        //File Name
        }elseif($_SESSION['location'] == "munLocation"){
            $query ="SELECT ch.ch_id, ch.ch_name, ch.ch_address, dc.dtc_name FROM tbl_church ch INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id where ch.ch_address not like '%City%' and dc.dtc_name = '". $_SESSION['name_of_user'] ."'";
            $filename = "CFGP Church Location in Municipality " . $now->format("Y-m-d");        //File Name
        }   
        
    }elseif($_SESSION['churchExport'] == "propertyStat")
    {
            $query ="SELECT ch.ch_id, ch.ch_name, ch.ch_address, dc.dtc_name FROM tbl_church ch INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id where ch.ch_property_status = '". $_SESSION["propertyStat"] ."' and dc.dtc_name = '". $_SESSION['name_of_user'] ."'";
            $filename = "CFGP Church Poroperty Status " . $_SESSION["propertyStat"] . " " . $now->format("Y-m-d");        //File Name
    }elseif($_SESSION['churchExport'] == "memSize")
    {
        $query = "SELECT a.*, c.dtc_name FROM tbl_ch_mem_size a LEFT JOIN tbl_church b ON a.memS_ch_name = b.ch_name LEFT JOIN tbl_district c ON b.ch_dtc_id = c.dtc_id HAVING memS_total >= '". $_SESSION['range1'] ."' AND  memS_total <= '". $_SESSION['range2'] ."' and c.dtc_name = '". $_SESSION['name_of_user'] ."'";
        $filename = "CFGP Church Total Member Range " . $_SESSION["range1"] . " to ". $_SESSION["range2"] . " " . $now->format("Y-m-d");        //File Name
    }elseif($_SESSION['churchExport'] == "length")
    {
        $query ="SELECT ch.ch_id, ch.ch_name, (YEAR(CURRENT_TIMESTAMP) - ch.ch_year_est) as cnt, dc.dtc_name FROM tbl_church ch INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id HAVING cnt >= '". $_SESSION['range1'] ."' AND cnt <= '". $_SESSION['range2'] ."' and dc.dtc_name = '". $_SESSION['name_of_user'] ."'";
        $filename = "CFGP Church Lenght of Existence Range " . $_SESSION["range1"] . " to ". $_SESSION["range2"] . " " . $now->format("Y-m-d");        //File Name
    }  



    //MEMBER EXPORT    
    if($_SESSION['memberExport'] == "all")
    {
        $query ="SELECT mm.ch_mem_id, mm.ch_mem_fullname, ch.ch_name, dt.dtc_name, mm.ch_mem_status from tbl_church ch inner join tbl_ch_member mm on mm.ch_mem_ch_id = ch.ch_id inner join tbl_district dt on ch.ch_dtc_id = dt.dtc_id where dt.dtc_name = '". $_SESSION['name_of_user'] ."'";
        $filename = "CFGP Member " . $now->format("Y-m-d");        
        //File Name
    }elseif($_SESSION['memberExport'] == "gender")
    {
        $query ="SELECT mm.ch_mem_id, mm.ch_mem_fullname, ch.ch_name, dt.dtc_name, mm.ch_mem_status from tbl_church ch inner join tbl_ch_member mm on mm.ch_mem_ch_id = ch.ch_id inner join tbl_district dt on ch.ch_dtc_id = dt.dtc_id where mm.ch_mem_gender = '". $_SESSION['gender'] ."' and dt.dtc_name = '". $_SESSION['name_of_user'] ."'";
        $filename = "CFGP Member - ". $_SESSION['gender'] . " " . $now->format("Y-m-d");        
        //File Name
    }elseif($_SESSION['memberExport'] == "age")
    {
        $query ="SELECT mm.ch_mem_id, mm.ch_mem_fullname, FLOOR(DATEDIFF(now(),mm.ch_mem_bday) / 365.25) AS cnt, ch.ch_name, dc.dtc_name, mm.ch_mem_status FROM tbl_ch_member mm INNER JOIN tbl_church ch ON ch.ch_id = mm.ch_mem_ch_id INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id HAVING cnt >= '". $_SESSION['range1'] ."' AND cnt <= '". $_SESSION['range2'] ."' and dc.dtc_name = '". $_SESSION['name_of_user'] ."'";
        $filename = "CFGP Member Age Range " . $_SESSION["range1"] . " to ". $_SESSION["range2"] . " " . $now->format("Y-m-d");        //File Name
    }elseif($_SESSION['memberExport'] == "cstatus")
    {
        $query ="SELECT mm.ch_mem_id, mm.ch_mem_fullname, ch.ch_name, dc.dtc_name, mm.ch_mem_status from tbl_church ch inner join tbl_ch_member mm on mm.ch_mem_ch_id = ch.ch_id INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id where mm.ch_mem_cstatus = '". $_SESSION['cstatus'] ."' and dc.dtc_name = '". $_SESSION['name_of_user'] ."'";
         $filename = "CFGP Member Civil Status - ". $_SESSION['cstatus'] .  " " . $now->format("Y-m-d");        
    }elseif($_SESSION['memberExport'] == "yrAsMarried")
    {
        $query ="SELECT mm.ch_mem_id, mm.ch_mem_fullname, FLOOR(DATEDIFF(now(),sp.sp_date_marriage) / 365.25) AS cnt, ch.ch_name, dc.dtc_name, mm.ch_mem_status FROM tbl_ch_member mm inner join tbl_ch_mem_spouse sp on mm.ch_mem_id = sp.sp_mem_id INNER JOIN tbl_church ch ON ch.ch_id = mm.ch_mem_ch_id INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id HAVING cnt >= '". $_SESSION['range1'] ."' AND cnt <= '". $_SESSION['range2'] ."' and dc.dtc_name = '". $_SESSION['name_of_user'] ."'";
        $filename = "CFGP Member Years as Married Range " . $_SESSION["range1"] . " to ". $_SESSION["range2"] . " " . $now->format("Y-m-d");        //File Name
    }

    //MINISTER EXPORT    
    if($_SESSION['ministerExport'] == "all")
    {
       $query = "SELECT mm.min_id, mm.min_fullname, ch.ch_name, dt.dtc_name, mm.min_status from tbl_minister mm left join tbl_district dt on mm.min_dtc_id = dt.dtc_id left join tbl_church ch on mm.min_ch_id = ch.ch_id where dt.dtc_name = '". $_SESSION['name_of_user'] ."'";
        $filename = "CFGP Minister " . $now->format("Y-m-d");        
        //File Name
    }elseif($_SESSION['ministerExport'] == "credential")
    {
         $query = "SELECT mm.min_id, mm.min_fullname, ch.ch_name, dt.dtc_name, mm.min_status from tbl_minister mm left join tbl_district dt on mm.min_dtc_id = dt.dtc_id left join tbl_church ch on mm.min_ch_id = ch.ch_id where mm.min_credential = '". $_SESSION['credential'] ."' and dt.dtc_name = '". $_SESSION['name_of_user'] ."'";
         $filename = "CFGP Minister Credential - ". $_SESSION['credential'] .  " " . $now->format("Y-m-d");          
        //File Name
    }elseif($_SESSION['ministerExport'] == "gender")
    {
        $query = "SELECT mm.min_id, mm.min_fullname, ch.ch_name, dt.dtc_name, mm.min_status from tbl_minister mm left join tbl_district dt on mm.min_dtc_id = dt.dtc_id left join tbl_church ch on mm.min_ch_id = ch.ch_id where mm.min_gender = '". $_SESSION['gender'] ."' and dt.dtc_name = '". $_SESSION['name_of_user'] ."'";
        $filename = "CFGP Minister - ". $_SESSION['gender'] . " " . $now->format("Y-m-d");        
        //File Name
    }elseif($_SESSION['ministerExport'] == "age")
    {
        $query = "SELECT FLOOR(DATEDIFF(now(),mm.min_bday) / 365.25) AS cnt, mm.min_id, mm.min_fullname, ch.ch_name, dt.dtc_name, mm.min_status from tbl_minister mm left join tbl_district dt on mm.min_dtc_id = dt.dtc_id left join tbl_church ch on mm.min_ch_id = ch.ch_id HAVING cnt >= '". $_SESSION['range1'] ."' AND cnt <= '". $_SESSION['range2'] ."' and dt.dtc_name = '". $_SESSION['name_of_user'] ."'";
        $filename = "CFGP Minister Age Range " . $_SESSION["range1"] . " to ". $_SESSION["range2"] . " " . $now->format("Y-m-d");        //File Name
    }elseif($_SESSION['ministerExport'] == "cstatus")
    {
        $query = "SELECT mm.min_id, mm.min_fullname, ch.ch_name, dt.dtc_name, mm.min_status from tbl_minister mm left join tbl_district dt on mm.min_dtc_id = dt.dtc_id left join tbl_church ch on mm.min_ch_id = ch.ch_id where mm.min_cstatus = '".  $_SESSION['cstatus'] ."' and dt.dtc_name = '". $_SESSION['name_of_user'] ."'";
         $filename = "CFGP Minister Civil Status - ". $_SESSION['cstatus'] .  " " . $now->format("Y-m-d");        
    }elseif($_SESSION['ministerExport'] == "yrAsMarried")
    {
       $query = "SELECT FLOOR(DATEDIFF(now(),sp.sp_date_marriage) / 365.25) AS cnt, mm.min_id, mm.min_fullname, ch.ch_name, dt.dtc_name, mm.min_status from tbl_minister mm left join tbl_district dt on mm.min_dtc_id = dt.dtc_id left join tbl_min_spouse sp on mm.min_id = sp.sp_min_id left join tbl_church ch on mm.min_ch_id = ch.ch_id HAVING cnt >= '". $_SESSION['range1'] ."' AND cnt <= '". $_SESSION['range2'] ."' and dt.dtc_name = '". $_SESSION['name_of_user'] ."'";
        $filename = "CFGP Minister Years as Married Range " . $_SESSION["range1"] . " to ". $_SESSION["range2"] . " " . $now->format("Y-m-d");        //File Name
    }
}else
{
    //ADMIN REPORTS
    //CHURCH EXPORT

    if($_SESSION['churchExport'] == "all")
    {
        $query ="SELECT ch.ch_id, ch.ch_name, dt.dtc_name, dv.div_name from tbl_church ch inner join tbl_division dv on ch.ch_div_id = dv.div_id inner join tbl_district dt on ch.ch_dtc_id = dt.dtc_id";
        $filename = "CFGP Church " . $now->format("Y-m-d");        //File Name
    }elseif($_SESSION['churchExport'] == "location")
    {
        if($_SESSION['location'] == "cityLocation"){
            $query ="SELECT ch.ch_id, ch.ch_name, ch.ch_address, dc.dtc_name FROM tbl_church ch INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id where ch.ch_address like '%City%'";
            $filename = "CFGP Church Location in City " . $now->format("Y-m-d");        //File Name
        }elseif($_SESSION['location'] == "munLocation"){
            $query ="SELECT ch.ch_id, ch.ch_name, ch.ch_address, dc.dtc_name FROM tbl_church ch INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id where ch.ch_address not like '%City%'";
            $filename = "CFGP Church Location in Municipality " . $now->format("Y-m-d");        //File Name
        }   
        
    }elseif($_SESSION['churchExport'] == "propertyStat")
    {
            $query ="SELECT ch.ch_id, ch.ch_name, ch.ch_address, dc.dtc_name FROM tbl_church ch INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id where ch.ch_property_status = '". $_SESSION["propertyStat"] ."'";
            $filename = "CFGP Church Poroperty Status " . $_SESSION["propertyStat"] . " " . $now->format("Y-m-d");        //File Name
    }elseif($_SESSION['churchExport'] == "memSize")
    {
        $query = "SELECT a.*, c.dtc_name FROM tbl_ch_mem_size a LEFT JOIN tbl_church b ON a.memS_ch_name = b.ch_name LEFT JOIN tbl_district c ON b.ch_dtc_id = c.dtc_id HAVING memS_total >= '". $_SESSION['range1'] ."' AND  memS_total <= '". $_SESSION['range2'] ."'";
        $filename = "CFGP Church Total Member Range " . $_SESSION["range1"] . " to ". $_SESSION["range2"] . " " . $now->format("Y-m-d");        //File Name
    }elseif($_SESSION['churchExport'] == "length")
    {
        $query ="SELECT ch.ch_id, ch.ch_name, (YEAR(CURRENT_TIMESTAMP) - ch.ch_year_est) as cnt, dc.dtc_name FROM tbl_church ch INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id HAVING cnt >= '". $_SESSION['range1'] ."' AND cnt <= '". $_SESSION['range2'] ."'";
        $filename = "CFGP Church Lenght of Existence Range " . $_SESSION["range1"] . " to ". $_SESSION["range2"] . " " . $now->format("Y-m-d");        //File Name
    }  



    //MEMBER EXPORT    
    if($_SESSION['memberExport'] == "all")
    {
        $query ="SELECT mm.ch_mem_id, mm.ch_mem_fullname, ch.ch_name, dt.dtc_name, mm.ch_mem_status from tbl_church ch inner join tbl_ch_member mm on mm.ch_mem_ch_id = ch.ch_id inner join tbl_district dt on ch.ch_dtc_id = dt.dtc_id";
        $filename = "CFGP Member " . $now->format("Y-m-d");        
        //File Name
    }elseif($_SESSION['memberExport'] == "gender")
    {
        $query ="SELECT mm.ch_mem_id, mm.ch_mem_fullname, ch.ch_name, dt.dtc_name, mm.ch_mem_status from tbl_church ch inner join tbl_ch_member mm on mm.ch_mem_ch_id = ch.ch_id inner join tbl_district dt on ch.ch_dtc_id = dt.dtc_id where mm.ch_mem_gender = '". $_SESSION['gender'] ."'";
        $filename = "CFGP Member - ". $_SESSION['gender'] . " " . $now->format("Y-m-d");        
        //File Name
    }elseif($_SESSION['memberExport'] == "age")
    {
        $query ="SELECT mm.ch_mem_id, mm.ch_mem_fullname, FLOOR(DATEDIFF(now(),mm.ch_mem_bday) / 365.25) AS cnt, ch.ch_name, dc.dtc_name, mm.ch_mem_status FROM tbl_ch_member mm INNER JOIN tbl_church ch ON ch.ch_id = mm.ch_mem_ch_id INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id HAVING cnt >= '". $_SESSION['range1'] ."' AND cnt <= '". $_SESSION['range2'] ."'";
        $filename = "CFGP Member Age Range " . $_SESSION["range1"] . " to ". $_SESSION["range2"] . " " . $now->format("Y-m-d");        //File Name
    }elseif($_SESSION['memberExport'] == "cstatus")
    {
        $query ="SELECT mm.ch_mem_id, mm.ch_mem_fullname, ch.ch_name, dc.dtc_name, mm.ch_mem_status from tbl_church ch inner join tbl_ch_member mm on mm.ch_mem_ch_id = ch.ch_id INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id where mm.ch_mem_cstatus = '". $_SESSION['cstatus'] ."'";
         $filename = "CFGP Member Civil Status - ". $_SESSION['cstatus'] .  " " . $now->format("Y-m-d");        
    }elseif($_SESSION['memberExport'] == "yrAsMarried")
    {
        $query ="SELECT mm.ch_mem_id, mm.ch_mem_fullname, FLOOR(DATEDIFF(now(),sp.sp_date_marriage) / 365.25) AS cnt, ch.ch_name, dc.dtc_name, mm.ch_mem_status FROM tbl_ch_member mm inner join tbl_ch_mem_spouse sp on mm.ch_mem_id = sp.sp_mem_id INNER JOIN tbl_church ch ON ch.ch_id = mm.ch_mem_ch_id INNER JOIN tbl_district dc ON ch.ch_dtc_id = dc.dtc_id HAVING cnt >= '". $_SESSION['range1'] ."' AND cnt <= '". $_SESSION['range2'] ."'";
        $filename = "CFGP Member Years as Married Range " . $_SESSION["range1"] . " to ". $_SESSION["range2"] . " " . $now->format("Y-m-d");        //File Name
    }

    //MINISTER EXPORT    
    if($_SESSION['ministerExport'] == "all")
    {
       $query = "SELECT mm.min_id, mm.min_fullname, ch.ch_name, dt.dtc_name, mm.min_status from tbl_minister mm left join tbl_district dt on mm.min_dtc_id = dt.dtc_id left join tbl_church ch on mm.min_ch_id = ch.ch_id";
        $filename = "CFGP Minister " . $now->format("Y-m-d");        
        //File Name
    }elseif($_SESSION['ministerExport'] == "credential")
    {
         $query = "SELECT mm.min_id, mm.min_fullname, ch.ch_name, dt.dtc_name, mm.min_status from tbl_minister mm left join tbl_district dt on mm.min_dtc_id = dt.dtc_id left join tbl_church ch on mm.min_ch_id = ch.ch_id where mm.min_credential = '". $_SESSION['credential'] ."'";
         $filename = "CFGP Minister Credential - ". $_SESSION['credential'] .  " " . $now->format("Y-m-d");          
        //File Name
    }elseif($_SESSION['ministerExport'] == "gender")
    {
        $query = "SELECT mm.min_id, mm.min_fullname, ch.ch_name, dt.dtc_name, mm.min_status from tbl_minister mm left join tbl_district dt on mm.min_dtc_id = dt.dtc_id left join tbl_church ch on mm.min_ch_id = ch.ch_id where mm.min_gender = '". $_SESSION['gender'] ."'";
        $filename = "CFGP Minister - ". $_SESSION['gender'] . " " . $now->format("Y-m-d");        
        //File Name
    }elseif($_SESSION['ministerExport'] == "age")
    {
        $query = "SELECT FLOOR(DATEDIFF(now(),mm.min_bday) / 365.25) AS cnt, mm.min_id, mm.min_fullname, ch.ch_name, dt.dtc_name, mm.min_status from tbl_minister mm left join tbl_district dt on mm.min_dtc_id = dt.dtc_id left join tbl_church ch on mm.min_ch_id = ch.ch_id HAVING cnt >= '". $_SESSION['range1'] ."' AND cnt <= '". $_SESSION['range2'] ."'";
        $filename = "CFGP Minister Age Range " . $_SESSION["range1"] . " to ". $_SESSION["range2"] . " " . $now->format("Y-m-d");        //File Name
    }elseif($_SESSION['ministerExport'] == "cstatus")
    {
        $query = "SELECT mm.min_id, mm.min_fullname, ch.ch_name, dt.dtc_name, mm.min_status from tbl_minister mm left join tbl_district dt on mm.min_dtc_id = dt.dtc_id left join tbl_church ch on mm.min_ch_id = ch.ch_id where mm.min_cstatus = '".  $_SESSION['cstatus'] ."'";
         $filename = "CFGP Minister Civil Status - ". $_SESSION['cstatus'] .  " " . $now->format("Y-m-d");        
    }elseif($_SESSION['ministerExport'] == "yrAsMarried")
    {
       $query = "SELECT FLOOR(DATEDIFF(now(),sp.sp_date_marriage) / 365.25) AS cnt, mm.min_id, mm.min_fullname, ch.ch_name, dt.dtc_name, mm.min_status from tbl_minister mm left join tbl_district dt on mm.min_dtc_id = dt.dtc_id left join tbl_min_spouse sp on mm.min_id = sp.sp_min_id left join tbl_church ch on mm.min_ch_id = ch.ch_id HAVING cnt >= '". $_SESSION['range1'] ."' AND cnt <= '". $_SESSION['range2'] ."'";
        $filename = "CFGP Minister Years as Married Range " . $_SESSION["range1"] . " to ". $_SESSION["range2"] . " " . $now->format("Y-m-d");        //File Name
    }
    //END OF ADMIN REPORT
}

//*******YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE*******/    
//create MySQL connection   

$result = mysqli_query($fgmembersite->connection, $query); 
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

//CHURCH
if($_SESSION['churchExport'] == "all")
    {
        print("ALL CHURCH");
        print("\n");
        print("\n");
        print("TOTAL:". "\t" . $result->num_rows);
        print("\n");
        print("\n");
        
        echo("CHURCH NAME" . "\t");
        echo("DISTRICT" . "\t");
        echo("DIVISION" . "\t");
    }
    elseif($_SESSION['churchExport'] == "location")
    {
        if($_SESSION['location'] == "cityLocation"){
            print("CHURCH LOCATION IN CITY");
            print("\n");
            print("\n");
            print("TOTAL:". "\t" . $result->num_rows);
            print("\n");
            print("\n");
            
            echo("CHURCH NAME" . "\t");
            echo("ADDRESS" . "\t");
            echo("DISTRICT" . "\t");
        }elseif($_SESSION['location'] == "munLocation"){
            print("CHURCH LOCATION IN MUNICIPALITY");
            print("\n");
            print("\n");
            print("TOTAL:". "\t" . $result->num_rows);
            print("\n");
            print("\n");
            
            echo("CHURCH NAME" . "\t");
            echo("ADDRESS" . "\t");
            echo("DISTRICT" . "\t");
        }
    }
    elseif($_SESSION['churchExport'] == "propertyStat")
    {
        print("CHURCH TOTAL PROPERTY STATUS - " . $_SESSION["propertyStat"]);
        print("\n");
        print("\n");
        print("TOTAL:". "\t" . $result->num_rows);
        print("\n");
        print("\n");
        
        echo("CHURCH NAME" . "\t");
        echo("ADDRESS" . "\t");
        echo("DISTRICT" . "\t");
    }   
    elseif($_SESSION['churchExport'] == "memSize")
    {
        print("CHURCH TOTAL MEMBER Range " . $_SESSION["range1"] . " to ". $_SESSION["range2"]);
        print("\n");
        print("\n");
        print("TOTAL:". "\t" . $result->num_rows);
        print("\n");
        print("\n");
        
        echo("CHURCH NAME" . "\t");
        echo("Number of Members" . "\t");
        echo("DISTRICT" . "\t");
    }elseif($_SESSION['churchExport'] == "length")
    {
        print("CHURCH LENGHT OF EXISTENCE Range " . $_SESSION["range1"] . " to ". $_SESSION["range2"]);
        print("\n");
        print("\n");
        print("TOTAL:". "\t" . $result->num_rows);
        print("\n");
        print("\n");
        
        echo("CHURCH NAME" . "\t");
        echo("Lenght of Existence" . "\t");
        echo("DISTRICT" . "\t");
    } 

    //MEMBER 
    if($_SESSION['memberExport'] == "all")
    {
        print("ALL Member");
        print("\n");
        print("\n");
        print("TOTAL:". "\t" . $result->num_rows);
        print("\n");
        print("\n");
        
        echo("NAME" . "\t");
        echo("CHURCH NAME" . "\t");
        echo("DISTRICT" . "\t");
        echo("STATUS" . "\t");
    }elseif($_SESSION['memberExport'] == "gender")
    {
        
            print("CHURCH MEMBER - " . $_SESSION["gender"]);
            print("\n");
            print("\n");
            print("TOTAL:". "\t" . $result->num_rows);
            print("\n");
            print("\n");
            
            echo("NAME" . "\t");
            echo("CHURCH NAME" . "\t");
            echo("DISTRICT" . "\t");
            echo("STATUS" . "\t");
        
    }elseif($_SESSION['memberExport'] == "age")
    {
        
            print("CHURCH MEMBER AGE Range " . $_SESSION["range1"] . " to ". $_SESSION["range2"]);
            print("\n");
            print("\n");
            print("TOTAL:". "\t" . $result->num_rows);
            print("\n");
            print("\n");
            
            echo("NAME" . "\t");
            echo("AGE" . "\t");  
            echo("CHURCH NAME" . "\t");
            echo("DISTRICT" . "\t");
            echo("STATUS" . "\t");
    }elseif($_SESSION['memberExport'] == "cstatus")
    {
        
            print("CHURCH MEMBER - " . $_SESSION["cstatus"]);
            print("\n");
            print("\n");
            print("TOTAL:". "\t" . $result->num_rows);
            print("\n");
            print("\n");
            
            echo("NAME" . "\t");
            echo("CHURCH NAME" . "\t");   
            echo("DISTRICT" . "\t"); 
            echo("STATUS" . "\t");
    }elseif($_SESSION['memberExport'] == "yrAsMarried")
    {
        
            print("CHURCH MEMBER YEARS AS MARRIED Range " . $_SESSION["range1"] . " to ". $_SESSION["range2"]);
            print("\n");
            print("\n");
            print("TOTAL:". "\t" . $result->num_rows);
            print("\n");
            print("\n");
            
            echo("NAME" . "\t");
            echo("YEARS" . "\t");  
            echo("CHURCH NAME" . "\t");
            echo("DISTRICT" . "\t");
            echo("STATUS" . "\t");
    }
    //MINISTER 
    if($_SESSION['ministerExport'] == "all")
    {
        print("ALL MINISTER");
        print("\n");
        print("\n");
        print("TOTAL:". "\t" . $result->num_rows);
        print("\n");
        print("\n");
        
        echo("NAME" . "\t");
        echo("CHURCH NAME" . "\t");
        echo("DISTRICT" . "\t");
        echo("STATUS" . "\t");
    }elseif($_SESSION['ministerExport'] == "gender")
    {
        
            print("CHURCH MINISTER - " . $_SESSION["gender"]);
            print("\n");
            print("\n");
            print("TOTAL:". "\t" . $result->num_rows);
            print("\n");
            print("\n");
            
            echo("NAME" . "\t");
            echo("CHURCH NAME" . "\t");
            echo("DISTRICT" . "\t");
            echo("STATUS" . "\t");
        
    }elseif($_SESSION['ministerExport'] == "credential")
    {
        
            print("CHURCH MINISTER - " . $_SESSION["credential"]);
            print("\n");
            print("\n");
            print("TOTAL:". "\t" . $result->num_rows);
            print("\n");
            print("\n");
            
            echo("NAME" . "\t");
            echo("CHURCH NAME" . "\t");
            echo("DISTRICT" . "\t");
            echo("STATUS" . "\t");
        
    }elseif($_SESSION['ministerExport'] == "age")
    {
        
            print("CHURCH MINISTER AGE Range " . $_SESSION["range1"] . " to ". $_SESSION["range2"]);
            print("\n");
            print("\n");
            print("TOTAL:". "\t" . $result->num_rows);
            print("\n");
            print("\n");
            
            echo("NAME" . "\t");
            echo("AGE" . "\t");  
            echo("CHURCH NAME" . "\t");
            echo("DISTRICT" . "\t");
            echo("STATUS" . "\t");
    }elseif($_SESSION['ministerExport'] == "cstatus")
    {
        
            print("CHURCH MINISTER - " . $_SESSION["cstatus"]);
            print("\n");
            print("\n");
            print("TOTAL:". "\t" . $result->num_rows);
            print("\n");
            print("\n");
            
            echo("NAME" . "\t");
            echo("CHURCH NAME" . "\t");   
            echo("DISTRICT" . "\t"); 
            echo("STATUS" . "\t");
    }elseif($_SESSION['ministerExport'] == "yrAsMarried")
    {
        
            print("CHURCH MINISTER YEARS AS MARRIED Range " . $_SESSION["range1"] . " to ". $_SESSION["range2"]);
            print("\n");
            print("\n");
            print("TOTAL:". "\t" . $result->num_rows);
            print("\n");
            print("\n");
            
            echo("NAME" . "\t");
            echo("YEARS" . "\t");  
            echo("CHURCH NAME" . "\t");
            echo("DISTRICT" . "\t");
            echo("STATUS" . "\t");
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
                        $schema_insert .=$row[$j].$sep;          
                        break;      
                    case 3:
                        $schema_insert .=$row[$j].$sep;                       
                    break;    
                    case 4:
                    if($_SESSION['memberExport'] == "age" || $_SESSION['memberExport'] == "yrAsMarried" || $_SESSION['ministerExport'] == "age" || $_SESSION['ministerExport'] == "yrAsMarried")
                    {
                        $schema_insert .=$row[$j].$sep; 
                        break;
                    } 
                    case 5:
                    if($_SESSION['memberExport'] != "NA" || $_SESSION['ministerExport'] != "NA")
                    {
                        $schema_insert .=$row[$j].$sep; 
                        break;
                    }                         
                    
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