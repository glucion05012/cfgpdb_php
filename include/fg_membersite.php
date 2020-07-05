<?PHP
require_once("class.phpmailer.php");
require_once("formvalidator.php");

class FGMembersite
{	
	var $error_message;
	var $rand_key;
	    
	
	function InitDB($host,$uname,$pwd,$database,$tablename)
    {
        $this->db_host  = $host;
        $this->username = $uname;
		$this->pwd  = $pwd;
		$this->database  = $database;
        $this->tablename = $tablename;
        
    }
	  
	 function Login()
    {
		$this->tablename = 'login';
        if(empty($_POST['username']))
        {
            $this->HandleError("UserName is empty!");
            return false;
        }
        
        if(empty($_POST['password']))
        {
            $this->HandleError("Password is empty!");
            return false;
        }
        
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
		
		$username =  strtoupper($username);
        
        if(!isset($_SESSION)){ session_start(); }
        if(!$this->CheckLoginInDB($username,$password))
        {
            return false;
        }
        
        $_SESSION[$this->GetLoginSessionVar()] = $username;
        
        return true;
    }
	
	 function HandleError($err)
    {
        $this->error_message .= $err."\r\n";
    }
	
	function HandleDBError($err)
    {
        $this->HandleError($err."\r\n mysqlierror:".mysqli_error());
    }
	
	function CheckLoginInDB($username,$password)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }          
        $username = $this->SanitizeForSQL($username);
        $pwdmd5 = md5($password);
       
		
		$qry = "Select name, email, type from $this->tablename where username='$username' and password='$pwdmd5' and confirmcode='y'";	
			
				
        $result = mysqli_query($this->connection, $qry);
		
        if(!$result || mysqli_num_rows($result) <= 0)
        {
            $this->HandleError("Invalid username or password");
            return false;
        }
        
        $row = mysqli_fetch_assoc($result);
        
        
        $_SESSION['name_of_user']  = $row['name'];
        $_SESSION['email_of_user'] = $row['email'];
        $_SESSION['username_of_user']  = $username;
		$_SESSION['type_of_user'] = $row['type'];
		
        return true;
    }
	
	function DBLogin()
    {

        $this->connection = new mysqli ($this->db_host,$this->username,$this->pwd);

        if(!$this->connection)
        {   
            $this->HandleDBError("Database Login failed! Please make sure that the DB login credentials provided are correct");
            return false;
        }
        if(!mysqli_select_db($this->connection, $this->database))
        {
            $this->HandleDBError('Failed to select database: '.$this->database.' Please make sure that the database name provided is correct');
            return false;
        }
        if(!mysqli_set_charset($this->connection,"UTF8"))
        {
            $this->HandleDBError('Error setting utf8 encoding');
            return false;
        }
        return true;
    }

	function SanitizeForSQL($str)
    {
        if( function_exists( "mysqli_real_escape_string" ) )
        {
              $ret_str = mysqli_real_escape_string($this->connection, $str );
        }
        else
        {
              $ret_str = addslashes( $str );
        }
        return $ret_str;
    }	
	
	function CheckLogin()
    {
         if(!isset($_SESSION)){ session_start(); }

         $sessionvar = $this->GetLoginSessionVar();
         
         if(empty($_SESSION[$sessionvar]))
         {
            return false;
         }
         return true;
    }

	 function LogOut()
    {
        session_start();
        
        $sessionvar = $this->GetLoginSessionVar();
        
        $_SESSION[$sessionvar]=NULL;
        
        unset($_SESSION[$sessionvar]);
    }
	
	function GetLoginSessionVar()
    {
        $retvar = md5($this->rand_key);
        $retvar = 'usr_'.substr($retvar,0,10);
        return $retvar;
    }
	
	function SetWebsiteName($sitename)
    {
        $this->sitename = $sitename;
    }
	
	 function SetAdminEmail($email)
    {
        $this->admin_email = $email;
    }
	
	 function GetSelfScript()
    {
        return htmlentities($_SERVER['PHP_SELF']);
    }    
	
	 function GetErrorMessage()
    {
        if(empty($this->error_message))
        {
            return '';
        }
        $errormsg = nl2br(htmlentities($this->error_message));
        return $errormsg;
    }    
	
	 function SafeDisplay($value_name)
    {
        if(empty($_POST[$value_name]))
        {
            return'';
        }
        return htmlentities($_POST[$value_name]);
    }
	 
     function RedirectToURL($url)
    {
        header("Location: $url");
        exit;
    }
	
     //change password
    function ChangePassword()
    {
        if(!isset($_POST['submitted']))
        {
           return false;
        }

         if(!$this->ChangeIntoPassword($formvars))
        {
            $this->HandleError("Update to Database failed!");
            return false;
        }
        return true;
    }

    function ChangeIntoPassword(&$formvars)
    {
        $update_pw = 'UPDATE login SET 
                password = "' . md5($_POST['newpwd']) . '"
                where id_user = "' . $_POST['userID'] . '"';

        $this->tablename = 'login';
          if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        } 

          if(!mysqli_query($this->connection, $update_pw))
        {
           $this->HandleDBError("Error inserting data to the table\nquery:$update_pw");
            return false;
        }       
            return true;
    }

	//insert district
	function InsertDistrict()
    {
		if(!isset($_POST['submitted']))
        {
           return false;
        }
		 if(!$this->InsertIntoDistrict($formvars))
        {
            $this->HandleError("Inserting to Database failed!");
            return false;
        }
		return true;
	}
	
	function InsertIntoDistrict(&$formvars)
    {
        $insert_query = 'insert into tbl_district(
                dtc_name,
                dtc_spvr
                )
                values
                (
                "' . $_POST['dtc_name'] . '",
                "' . $_POST['dtc_spvr'] . '"
				)';			

		$this->tablename = 'tbl_district';

		  if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        } 
		
          if(!mysqli_query($this->connection, $insert_query))
        {
           $this->HandleDBError("Error inserting data to the table\nquery:$insert_query");
            return false;
        }                   
        	return true;
	}

    //update district
    function UpdateDistrict()
    {
        if(!isset($_POST['submitted']))
        {
           return false;
        }

         if(!$this->UpdateIntoDistrict($formvars))
        {
            $this->HandleError("Update to Database failed!");
            return false;
        }
        return true;
    }

    function UpdateIntoDistrict(&$formvars)
    {
        $update_query = 'UPDATE tbl_district SET 
                dtc_name = "' . $_POST['dtc_name'] . '",
                dtc_spvr = "' . $_POST['dtc_spvr'] . '"
                where dtc_id = "' . $_POST['dtc_id'] . '"';

        $this->tablename = 'tbl_district';
          if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        } 

          if(!mysqli_query($this->connection, $update_query))
        {
           $this->HandleDBError("Error inserting data to the table\nquery:$update_query");
            return false;
        }       
            return true;
    }

    //insert division
    function InsertDivision()
    {
        if(!isset($_POST['submitted']))
        {
           return false;
        }
         if(!$this->InsertIntoDivision($formvars))
        {
            $this->HandleError("Inserting to Database failed!");
            return false;
        }
        return true;
    }
    
    function InsertIntoDivision(&$formvars)
    {
        $insert_query = 'insert into tbl_division(
                div_name,
                div_supt,
                div_dtc_id
                )
                values
                (
                "' . $_POST['div_name'] . '",
                "' . $_POST['div_supt'] . '",
                "' . $_POST['dtc_id'] . '"
                )';         

        $this->tablename = 'tbl_division';

          if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        } 
        
          if(!mysqli_query($this->connection, $insert_query))
        {
           $this->HandleDBError("Error inserting data to the table\nquery:$insert_query");
            return false;
        }                   
            return true;
    }

    //update division
    function UpdateDivision()
    {
        if(!isset($_POST['submitted']))
        {
           return false;
        }

         if(!$this->UpdateIntoDivision($formvars))
        {
            $this->HandleError("Update to Database failed!");
            return false;
        }
        return true;
    }

    function UpdateIntoDivision(&$formvars)
    {
        $update_query = 'UPDATE tbl_division SET 
                div_dtc_id = "' . $_POST['dtc_id'] . '",
                div_name = "' . $_POST['div_name'] . '",
                div_supt = "' . $_POST['div_supt'] . '"
                where div_id = "' . $_POST['div_id'] . '"';

        $this->tablename = 'tbl_district';
          if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        } 

          if(!mysqli_query($this->connection, $update_query))
        {
           $this->HandleDBError("Error inserting data to the table\nquery:$update_query");
            return false;
        }       
            return true;
    }

    //insert minister
    function InsertMinister()
    {
        if(!isset($_POST['submitted']))
        {
           return false;
        }
         if(!$this->InsertIntoMinister($formvars))
        {
            $this->HandleError("Inserting to Database failed!");
            return false;
        }
            return true;
    }
    
    function InsertIntoMinister(&$formvars)
    {
        $insert_query = 'insert into tbl_minister(
                min_fullname,
                min_nickname,
                min_bday,
                min_bplace,
                min_address,
                min_cstatus,
                min_gender,
                min_citizenship,
                min_occupation,
                min_contact,
                min_email,
                min_credential,
                min_credential_no,
                min_sss,
                min_tin,
                min_blood_type,
                min_year_ordained,
                min_language,
                min_spiritual_gift,
                min_skills,
                min_hobbies,
                min_health,
                min_other_info,
                min_ch_id,
                min_dtc_id,
                min_status
                )
                values
                (
                "' . $_SESSION['fullname'] . '",
                "' . $_SESSION['nickname'] . '",
                "' . $_SESSION['bday'] . '",
                "' . $_SESSION['bplace'] . '",
                "' . $_SESSION['address'] . '",
                "' . $_SESSION['cstatus'] . '",
                "' . $_SESSION['gender'] . '",
                "' . $_SESSION['citizenship'] . '",
                "' . $_SESSION['occupation'] . '",
                "' . $_SESSION['contact'] . '",
                "' . $_SESSION['email'] . '",
                "' . $_SESSION['category'] . '",
                "' . $_SESSION['cnumber'] . '",
                "' . $_SESSION['sss'] . '",
                "' . $_SESSION['tin'] . '",
                "' . $_SESSION['bloodtype'] . '",
                "' . $_SESSION['yearordained'] . '",
                "' . $_SESSION['language'] . '",
                "' . $_SESSION['spiritualgift'] . '",
                "' . $_SESSION['skills'] . '",
                "' . $_SESSION['hobbies'] . '",
                "' . $_SESSION['health'] . '",
                "' . $_SESSION['otherinfo'] . '",
                "0",
                "' . $_SESSION['min_dtc_id'] . '",
                "' . $_SESSION['min_status'] . '"
                )';         

        $this->tablename = 'tbl_minister';

          if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        } 
        
          if(!mysqli_query($this->connection, $insert_query))
        {
           $this->HandleDBError("Error inserting data to the table\nquery:$insert_query");
            return false;
        }            

//Minister ID
        $minID = 'SELECT * FROM tbl_minister ORDER BY min_id DESC LIMIT 1';
        $min_ID = mysqli_query($this->connection, $minID);
        while($row = $min_ID->fetch_assoc()) 
            {
                $_SESSION['$min_ID'] = $row["min_id"];
            }
//spouse
        if($_SESSION['cstatus'] != "Single")
        {
                $sp_insert_query = 'insert into tbl_min_spouse(
                    sp_fullname,
                    sp_nickname,
                    sp_bday,
                    sp_date_marriage,
                    sp_citizenship,
                    sp_contact,
                    sp_email,
                    sp_occupation,
                    sp_min_id
                    )
                    values
                    (
                    "' . $_SESSION['sp_fullname'] . '",
                    "' . $_SESSION['sp_nickname'] . '",
                    "' . $_SESSION['sp_bday'] . '",
                    "' . $_SESSION['sp_date_marriage'] . '",
                    "' . $_SESSION['sp_citizenship'] . '",
                    "' . $_SESSION['sp_contact'] . '",
                    "' . $_SESSION['sp_email'] . '",
                    "' . $_SESSION['sp_occupation'] . '",
                    "' . $_SESSION['$min_ID'] .'"

                    )';         

            $this->tablename = 'tbl_min_spouse';

              if(!$this->DBLogin())
            {
                $this->HandleError("Database login failed!");
                return false;
            } 
            
              if(!mysqli_query($this->connection, $sp_insert_query))
            {
               $this->HandleDBError("Error inserting data to the table\nquery:$sp_insert_query");
                return false;
            } 
        }

       //Children Info
        $cnt=1;
        
        do
        {
            $cdn_fullname =  'cdn_fullname' . $cnt;
            $cdn_bday =  'cdn_bday' . $cnt;
            $cdn_cstatus =  'cdn_cstatus' . $cnt;
            $cdn_contact =  'cdn_contact' . $cnt;
            $cdn_email =  'cdn_email' . $cnt;
            $cdn_course =  'cdn_course' . $cnt;
            $cdn_occupation =  'cdn_occupation' . $cnt;

            if (isset($_POST[$cdn_fullname]))
            {
                $cdn_insert_query = 'insert into tbl_min_children(
                    cdn_fullname,
                    cdn_bday,
                    cdn_cstatus,
                    cdn_contact,
                    cdn_email,
                    cdn_course,
                    cdn_occupation,
                    cdn_min_id
                    )
                    values
                    (
                    "' . $_POST[$cdn_fullname] . '",
                    "' . $_POST[$cdn_bday] . '",
                    "' . $_POST[$cdn_cstatus] . '",
                    "' . $_POST[$cdn_contact] . '",
                    "' . $_POST[$cdn_email] . '",
                    "' . $_POST[$cdn_course] . '",
                    "' . $_POST[$cdn_occupation] . '",
                    "' . $_SESSION['$min_ID'] .'"
                    )';


                     $this->tablename = 'tbl_min_children';
                          if(!$this->DBLogin())
                        {
                            $this->HandleError("Database login failed!");
                            return false;
                        } 
                        
                          if(!mysqli_query($this->connection, $cdn_insert_query))
                        {
                           $this->HandleDBError("Error inserting data to the table\nquery:$cdn_insert_query");
                            return false;
                        } 
            
            }
            else
            {
                break;
            }

            $cnt++;

        } while (!empty($cdn_fullname));


        //Educational Attainment
        $cnt=1;
        
        do
        {
            $educ_year =  'educ_year' . $cnt;
            $educ_school =  'educ_school' . $cnt;
            $educ_level =  'educ_level' . $cnt;
            $educ_remarks =  'educ_remarks' . $cnt;
            $educ_category =  'educ_category' . $cnt;

            if (isset($_POST[$educ_year]))
            {
                $educ_insert_query = 'insert into tbl_min_education(
                    educ_year,
                    educ_school,
                    educ_level,
                    educ_remarks,
                    educ_category,
                    educ_min_id
                    )
                    values
                    (
                    "' . $_POST[$educ_year] . '",
                    "' . $_POST[$educ_school] . '",
                    "' . $_POST[$educ_level] . '",
                    "' . $_POST[$educ_remarks] . '",
                    "' . $_POST[$educ_category] . '",
                    "' . $_SESSION['$min_ID'] .'"
                    )';


                     $this->tablename = 'tbl_min_education';
                          if(!$this->DBLogin())
                        {
                            $this->HandleError("Database login failed!");
                            return false;
                        } 
                        
                          if(!mysqli_query($this->connection, $educ_insert_query))
                        {
                           $this->HandleDBError("Error inserting data to the table\nquery:$educ_insert_query");
                            return false;
                        } 
            
            }
            else
            {
                break;
            }

            $cnt++;

        } while (!empty($educ_year));


        //Work Experience
        $cnt=1;
        
        do
        {
            $work_year =  'work_year' . $cnt;
            $work_company =  'work_company' . $cnt;
            $work_address =  'work_address' . $cnt;
            $work_position =  'work_position' . $cnt;

            if (isset($_POST[$work_year]))
            {
                $work_insert_query = 'insert into tbl_min_work(
                    wrk_year,
                    wrk_company,
                    wrk_address,
                    wrk_position,
                    wrk_min_id
                    )
                    values
                    (
                    "' . $_POST[$work_year] . '",
                    "' . $_POST[$work_company] . '",
                    "' . $_POST[$work_address] . '",
                    "' . $_POST[$work_position] . '",
                    "' . $_SESSION['$min_ID'] .'"
                    )';


                     $this->tablename = 'tbl_min_work';
                          if(!$this->DBLogin())
                        {
                            $this->HandleError("Database login failed!");
                            return false;
                        } 
                        
                          if(!mysqli_query($this->connection, $work_insert_query))
                        {
                           $this->HandleDBError("Error inserting data to the table\nquery:$work_insert_query");
                            return false;
                        } 
            
            }
            else
            {
                break;
            }

            $cnt++;

        } while (!empty($work_year));


        //Ministry History
        $cnt=1;
        
        do
        {
            $mty_church =  'mty_church' . $cnt;
            $mty_address =  'mty_address' . $cnt;
            $mty_year =  'mty_year' . $cnt;
            $mty_position =  'mty_position' . $cnt;
            $mty_reason =  'mty_reason' . $cnt;

            if (isset($_POST[$mty_church]))
            {
                $mty_insert_query = 'insert into tbl_min_mty(
                    mty_church,
                    mty_address,
                    mty_year,
                    mty_position,
                    mty_reason,
                    mty_min_id
                    )
                    values
                    (
                    "' . $_POST[$mty_church] . '",
                    "' . $_POST[$mty_address] . '",
                    "' . $_POST[$mty_year] . '",
                    "' . $_POST[$mty_position] . '",
                    "' . $_POST[$mty_reason] . '",
                    "' . $_SESSION['$min_ID'] .'"
                    )';


                     $this->tablename = 'tbl_min_mty';
                          if(!$this->DBLogin())
                        {
                            $this->HandleError("Database login failed!");
                            return false;
                        } 
                        
                          if(!mysqli_query($this->connection, $mty_insert_query))
                        {
                           $this->HandleDBError("Error inserting data to the table\nquery:$mty_insert_query");
                            return false;
                        } 
            
            }
            else
            {
                break;
            }

            $cnt++;

        } while (!empty($mty_church));

        //Relegious Background
        $cnt=1;
        
        do
        {
            $relb_church =  'relb_church' . $cnt;
            $relb_municipality =  'relb_municipality' . $cnt;
            $relb_mentoring =  'relb_mentoring' . $cnt;

            if (isset($_POST[$relb_church]))
            {
                $relb_insert_query = 'insert into tbl_min_relb(
                    relb_church,
                    relb_municipality,
                    relb_mentoring,
                    relb_min_id
                    )
                    values
                    (
                    "' . $_POST[$relb_church] . '",
                    "' . $_POST[$relb_municipality] . '",
                    "' . $_POST[$relb_mentoring] . '",
                    "' . $_SESSION['$min_ID'] .'"
                    )';


                     $this->tablename = 'tbl_min_relb';
                          if(!$this->DBLogin())
                        {
                            $this->HandleError("Database login failed!");
                            return false;
                        } 
                        
                          if(!mysqli_query($this->connection, $relb_insert_query))
                        {
                           $this->HandleDBError("Error inserting data to the table\nquery:$relb_insert_query");
                            return false;
                        } 
            
            }
            else
            {
                break;
            }

            $cnt++;

        } while (!empty($relb_church));

            return true;
    }

    //update minister
    function UpdateMinister()
    {
        if(!isset($_POST['submitted']))
        {
           return false;
        }

         if(!$this->UpdateIntoMinister($formvars))
        {
            $this->HandleError("Update to Database failed!");
            return false;
        }
        return true;
    }

    function UpdateIntoMinister(&$formvars)
    {
        $update_query = 'UPDATE tbl_minister SET 
                min_fullname = "' . $_SESSION['fullname'] . '",
                min_nickname = "' . $_SESSION['nickname'] . '",
                min_bday = "' . $_SESSION['bday'] . '",
                min_bplace = "' . $_SESSION['bplace'] . '",
                min_address = "' . $_SESSION['address'] . '",
                min_cstatus = "' . $_SESSION['cstatus'] . '",
                min_gender = "' . $_SESSION['gender'] . '",
                min_citizenship = "' . $_SESSION['citizenship'] . '",
                min_occupation = "' . $_SESSION['occupation'] . '",
                min_contact = "' . $_SESSION['contact'] . '",
                min_email = "' . $_SESSION['email'] . '",
                min_credential = "' . $_SESSION['category'] . '",
                min_credential_no = "' . $_SESSION['cnumber'] . '",
                min_sss = "' . $_SESSION['sss'] . '",
                min_tin = "' . $_SESSION['tin'] . '",
                min_blood_type = "' . $_SESSION['bloodtype'] . '",
                min_year_ordained = "' . $_SESSION['yearordained'] . '",
                min_language = "' . $_SESSION['language'] . '",
                min_spiritual_gift = "' . $_SESSION['spiritualgift'] . '",
                min_skills = "' . $_SESSION['skills'] . '",
                min_hobbies = "' . $_SESSION['hobbies'] . '",
                min_health = "' . $_SESSION['health'] . '",
                min_other_info = "' . $_SESSION['otherinfo'] . '",
                min_dtc_id = "' . $_SESSION['min_dtc_id'] . '",
                min_status = "' . $_SESSION['min_status'] . '"
                where min_id = "' . $_SESSION['min_ID'] . '"';

        $this->tablename = 'tbl_minister';
          if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        } 

          if(!mysqli_query($this->connection, $update_query))
        {
           $this->HandleDBError("Error inserting data to the table\nquery:$update_query");
            return false;
        }     

        //spouse
        if($_SESSION['cstatus'] != "Single")
        {
                 $sp_update_query = 'UPDATE tbl_min_spouse SET 
                    sp_fullname = "' . $_SESSION['sp_fullname'] . '",
                    sp_nickname = "' . $_SESSION['sp_nickname'] . '",
                    sp_bday = "' . $_SESSION['sp_bday'] . '",
                    sp_date_marriage = "' . $_SESSION['sp_date_marriage'] . '",
                    sp_citizenship = "' . $_SESSION['sp_citizenship'] . '",
                    sp_contact = "' . $_SESSION['sp_contact'] . '",
                    sp_email = "' . $_SESSION['sp_email'] . '",
                    sp_occupation = "' . $_SESSION['sp_occupation'] . '" where sp_min_id = "' . $_SESSION['min_ID'] . '"';

            $this->tablename = 'tbl_min_spouse';
              if(!$this->DBLogin())
            {
                $this->HandleError("Database login failed!");
                return false;
            } 

              if(!mysqli_query($this->connection, $sp_update_query))
            {
               $this->HandleDBError("Error inserting data to the table\nquery:$sp_update_query");
                return false;
            }     
        }


        //delete min page 2
        $min_ID = intval($_SESSION['min_ID']);

        $this->tablename = 'tbl_min_children';
        $this->DBlogin();
        $cdn_delete_query = "DELETE FROM  tbl_min_children where cdn_min_id = '". $min_ID ."'";
        mysqli_query($this->connection, $cdn_delete_query);

        $this->tablename = 'tbl_min_education';
        $this->DBlogin();
        $educ_delete_query = "DELETE FROM tbl_min_education where educ_min_id = '". $min_ID ."'";
        mysqli_query($this->connection, $educ_delete_query);

        $this->tablename = 'tbl_min_work';
        $this->DBlogin();
        $wrk_delete_query = "DELETE FROM tbl_min_work where wrk_min_id = '". $min_ID ."'";
        mysqli_query($this->connection, $wrk_delete_query);

        $this->tablename = 'tbl_min_mty';
        $this->DBlogin();
        $mty_delete_query = "DELETE FROM tbl_min_mty where mty_min_id = '". $min_ID ."'";
        mysqli_query($this->connection, $mty_delete_query);

        $this->tablename = 'tbl_min_relb';
        $this->DBlogin();
        $relb_delete_query = "DELETE FROM tbl_min_relb where relb_min_id = '". $min_ID ."'";
        mysqli_query($this->connection, $relb_delete_query);

        //Children Info
        $cnt=1;
        
        do
        {
            $cdn_fullname =  'cdn_fullname' . $cnt;
            $cdn_bday =  'cdn_bday' . $cnt;
            $cdn_cstatus =  'cdn_cstatus' . $cnt;
            $cdn_contact =  'cdn_contact' . $cnt;
            $cdn_email =  'cdn_email' . $cnt;
            $cdn_course =  'cdn_course' . $cnt;
            $cdn_occupation =  'cdn_occupation' . $cnt;

            if (isset($_POST[$cdn_fullname]))
            {
                $cdn_insert_query = 'insert into tbl_min_children(
                    cdn_fullname,
                    cdn_bday,
                    cdn_cstatus,
                    cdn_contact,
                    cdn_email,
                    cdn_course,
                    cdn_occupation,
                    cdn_min_id
                    )
                    values
                    (
                    "' . $_POST[$cdn_fullname] . '",
                    "' . $_POST[$cdn_bday] . '",
                    "' . $_POST[$cdn_cstatus] . '",
                    "' . $_POST[$cdn_contact] . '",
                    "' . $_POST[$cdn_email] . '",
                    "' . $_POST[$cdn_course] . '",
                    "' . $_POST[$cdn_occupation] . '",
                    "' . $min_ID .'"
                    )';


                     $this->tablename = 'tbl_min_children';
                          if(!$this->DBLogin())
                        {
                            $this->HandleError("Database login failed!");
                            return false;
                        } 
                        
                          if(!mysqli_query($this->connection, $cdn_insert_query))
                        {
                           $this->HandleDBError("Error inserting data to the table\nquery:$cdn_insert_query");
                            return false;
                        } 
            
            }
            else
            {
                break;
            }

            $cnt++;

        } while (!empty($cdn_fullname));


        //Educational Attainment
        $cnt=1;
        
        do
        {
            $educ_year =  'educ_year' . $cnt;
            $educ_school =  'educ_school' . $cnt;
            $educ_level =  'educ_level' . $cnt;
            $educ_remarks =  'educ_remarks' . $cnt;
            $educ_category =  'educ_category' . $cnt;

            if (isset($_POST[$educ_year]))
            {
                $educ_insert_query = 'insert into tbl_min_education(
                    educ_year,
                    educ_school,
                    educ_level,
                    educ_remarks,
                    educ_category,
                    educ_min_id
                    )
                    values
                    (
                    "' . $_POST[$educ_year] . '",
                    "' . $_POST[$educ_school] . '",
                    "' . $_POST[$educ_level] . '",
                    "' . $_POST[$educ_remarks] . '",
                    "' . $_POST[$educ_category] . '",
                    "' . $min_ID .'"
                    )';


                     $this->tablename = 'tbl_min_education';
                          if(!$this->DBLogin())
                        {
                            $this->HandleError("Database login failed!");
                            return false;
                        } 
                        
                          if(!mysqli_query($this->connection, $educ_insert_query))
                        {
                           $this->HandleDBError("Error inserting data to the table\nquery:$educ_insert_query");
                            return false;
                        } 
            
            }
            else
            {
                break;
            }

            $cnt++;

        } while (!empty($educ_year));


        //Work Experience
        $cnt=1;
        
        do
        {
            $work_year =  'work_year' . $cnt;
            $work_company =  'work_company' . $cnt;
            $work_address =  'work_address' . $cnt;
            $work_position =  'work_position' . $cnt;

            if (isset($_POST[$work_year]))
            {
                $work_insert_query = 'insert into tbl_min_work(
                    wrk_year,
                    wrk_company,
                    wrk_address,
                    wrk_position,
                    wrk_min_id
                    )
                    values
                    (
                    "' . $_POST[$work_year] . '",
                    "' . $_POST[$work_company] . '",
                    "' . $_POST[$work_address] . '",
                    "' . $_POST[$work_position] . '",
                    "' . $min_ID .'"
                    )';


                     $this->tablename = 'tbl_min_work';
                          if(!$this->DBLogin())
                        {
                            $this->HandleError("Database login failed!");
                            return false;
                        } 
                        
                          if(!mysqli_query($this->connection, $work_insert_query))
                        {
                           $this->HandleDBError("Error inserting data to the table\nquery:$work_insert_query");
                            return false;
                        } 
            
            }
            else
            {
                break;
            }

            $cnt++;

        } while (!empty($work_year));


        //Ministry History
        $cnt=1;
        
        do
        {
            $mty_church =  'mty_church' . $cnt;
            $mty_address =  'mty_address' . $cnt;
            $mty_year =  'mty_year' . $cnt;
            $mty_position =  'mty_position' . $cnt;
            $mty_reason =  'mty_reason' . $cnt;

            if (isset($_POST[$mty_church]))
            {
                $mty_insert_query = 'insert into tbl_min_mty(
                    mty_church,
                    mty_address,
                    mty_year,
                    mty_position,
                    mty_reason,
                    mty_min_id
                    )
                    values
                    (
                    "' . $_POST[$mty_church] . '",
                    "' . $_POST[$mty_address] . '",
                    "' . $_POST[$mty_year] . '",
                    "' . $_POST[$mty_position] . '",
                    "' . $_POST[$mty_reason] . '",
                    "' . $min_ID .'"
                    )';


                     $this->tablename = 'tbl_min_mty';
                          if(!$this->DBLogin())
                        {
                            $this->HandleError("Database login failed!");
                            return false;
                        } 
                        
                          if(!mysqli_query($this->connection, $mty_insert_query))
                        {
                           $this->HandleDBError("Error inserting data to the table\nquery:$mty_insert_query");
                            return false;
                        } 
            
            }
            else
            {
                break;
            }

            $cnt++;

        } while (!empty($mty_church));

        //Relegious Background
        $cnt=1;
        
        do
        {
            $relb_church =  'relb_church' . $cnt;
            $relb_municipality =  'relb_municipality' . $cnt;
            $relb_mentoring =  'relb_mentoring' . $cnt;

            if (isset($_POST[$relb_church]))
            {
                $relb_insert_query = 'insert into tbl_min_relb(
                    relb_church,
                    relb_municipality,
                    relb_mentoring,
                    relb_min_id
                    )
                    values
                    (
                    "' . $_POST[$relb_church] . '",
                    "' . $_POST[$relb_municipality] . '",
                    "' . $_POST[$relb_mentoring] . '",
                    "' . $min_ID .'"
                    )';


                     $this->tablename = 'tbl_min_relb';
                          if(!$this->DBLogin())
                        {
                            $this->HandleError("Database login failed!");
                            return false;
                        } 
                        
                          if(!mysqli_query($this->connection, $relb_insert_query))
                        {
                           $this->HandleDBError("Error inserting data to the table\nquery:$relb_insert_query");
                            return false;
                        } 
            
            }
            else
            {
                break;
            }

            $cnt++;

        } while (!empty($relb_church));  
            return true;
    }

    //insert church member
    function InsertChurchMember()
    {
        if(!isset($_POST['submitted']))
        {
           return false;
        }
         if(!$this->InsertIntoChurchMember($formvars))
        {
            $this->HandleError("Inserting to Database failed!");
            return false;
        }
            return true;
    }
    
    function InsertIntoChurchMember(&$formvars)
    {
        $insert_mem_query = 'insert into tbl_ch_member(
                ch_mem_fullname,
                ch_mem_address,
                ch_mem_bday,
                ch_mem_bplace,
                ch_mem_citizenship,
                ch_mem_sss,
                ch_mem_tin,
                ch_mem_gender,
                ch_mem_cstatus,
                ch_mem_occupation,
                ch_mem_business,
                ch_mem_contact,
                ch_mem_email,
                ch_mem_ch_id,
                ch_mem_yrmem,
                ch_mem_position,
                ch_mem_yrconvert,
                ch_mem_yrbapt,
                ch_mem_prevrel,
                ch_mem_prevch,
                ch_mem_spiritual_gift,
                ch_mem_skills,
                ch_mem_hobbies,
                ch_mem_health,
                ch_mem_other_info,
                ch_mem_interview,
                ch_mem_approve,
                ch_mem_date_accept,
                ch_mem_place_accept,
                ch_mem_status
                )
                values
                (
                "' . $_SESSION['ch_mem_fullname'] . '",
                "' . $_SESSION['ch_mem_address'] . '",
                "' . $_SESSION['ch_mem_bday'] . '",
                "' . $_SESSION['ch_mem_bplace'] . '",
                "' . $_SESSION['ch_mem_citizenship'] . '",
                "' . $_SESSION['ch_mem_sss'] . '",
                "' . $_SESSION['ch_mem_tin'] . '",
                "' . $_SESSION['ch_mem_gender'] . '",
                "' . $_SESSION['ch_mem_cstatus'] . '",
                "' . $_SESSION['ch_mem_occupation'] . '",
                "' . $_SESSION['ch_mem_business'] . '",
                "' . $_SESSION['ch_mem_contact'] . '",
                "' . $_SESSION['ch_mem_email'] . '",
                "' . $_POST['ch_mem_ch'] . '",
                "' . $_POST['ch_mem_yrmem'] . '",
                "' . $_POST['ch_mem_position'] . '",
                "' . $_POST['ch_mem_yrconvert'] . '",
                "' . $_POST['ch_mem_yrbapt'] . '",
                "' . $_POST['ch_mem_prevrel'] . '",
                "' . $_POST['ch_mem_prevch'] . '",
                "' . $_POST['ch_mem_spiritual_gift'] . '",
                "' . $_POST['ch_mem_skills'] . '",
                "' . $_POST['ch_mem_hobbies'] . '",
                "' . $_POST['ch_mem_health'] . '",
                "' . $_POST['ch_mem_other_info'] . '",
                "' . $_POST['ch_mem_interview'] . '",
                "' . $_POST['ch_mem_approve'] . '",
                "' . $_POST['ch_mem_date_accept'] . '",
                "' . $_POST['ch_mem_place_accept'] . '",
                "' . $_POST['ch_mem_status'] . '"
                )';         

        $this->tablename = 'tbl_ch_member';

          if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        } 
        
          if(!mysqli_query($this->connection, $insert_mem_query))
        {
           $this->HandleDBError("Error inserting data to the table\nquery:$insert_mem_query");
            return false;
        }

        //Update church member count
        
            mysqli_query($this->connection,'UPDATE tbl_ch_mem_size SET memS_total = memS_total + 1 where memS_ch_id = "'. $_POST['ch_mem_ch'] .'"');
        

        //member ID
        $memID = 'SELECT * FROM tbl_ch_member ORDER BY ch_mem_id DESC LIMIT 1';
        $mem_ID = mysqli_query($this->connection, $memID);
        while($row = $mem_ID->fetch_assoc()) 
            {
                $_SESSION['$mem_ID'] = $row["ch_mem_id"];
            }
        //spouse
        if($_SESSION['ch_mem_cstatus'] != "Single")
        {
                $sp_mem_insert_query = 'insert into tbl_ch_mem_spouse(
                    sp_fullname,
                    sp_bday,
                    sp_date_marriage,
                    sp_place_marriage,
                    sp_mem_id
                    )
                    values
                    (
                    "' . $_SESSION['sp_fullname'] . '",
                    "' . $_SESSION['sp_bday'] . '",
                    "' . $_SESSION['sp_date_marriage'] . '",
                    "' . $_SESSION['sp_place_marriage'] . '",
                    "' . $_SESSION['$mem_ID'] .'"
                    )';         

            $this->tablename = 'tbl_ch_mem_spouse';

              if(!$this->DBLogin())
            {
                $this->HandleError("Database login failed!");
                return false;
            } 
            
              if(!mysqli_query($this->connection, $sp_mem_insert_query))
            {
               $this->HandleDBError("Error inserting data to the table\nquery:$sp_mem_insert_query");
                return false;
            } 
        }
        //church member children
        $cdn_mem_update_query = 'UPDATE tbl_ch_mem_children SET
            cdn_mem_id = "'. $_SESSION['$mem_ID'] .'"
            where cdn_mem_id = "contain"';

         $this->tablename = 'tbl_ch_mem_children';
              if(!$this->DBLogin())
            {
                $this->HandleError("Database login failed!");
                return false;
            } 
            
              if(!mysqli_query($this->connection, $cdn_mem_update_query))
            {
               $this->HandleDBError("Error inserting data to the table\nquery:$cdn_mem_update_query");
                return false;
            }

        //church member education
        $educ_mem_update_query = 'UPDATE tbl_ch_mem_education SET
            educ_mem_id = "'. $_SESSION['$mem_ID'] .'"
            where educ_mem_id = "contain"';

         $this->tablename = 'tbl_ch_mem_education';
              if(!$this->DBLogin())
            {
                $this->HandleError("Database login failed!");
                return false;
            } 
            
              if(!mysqli_query($this->connection, $educ_mem_update_query))
            {
               $this->HandleDBError("Error inserting data to the table\nquery:$educ_mem_update_query");
                return false;
            }  

            //church member training
        $trn_mem_update_query = 'UPDATE tbl_ch_mem_training SET
            trn_mem_id = "'. $_SESSION['$mem_ID'] .'"
            where trn_mem_id = "contain"';

         $this->tablename = 'tbl_ch_mem_training';
              if(!$this->DBLogin())
            {
                $this->HandleError("Database login failed!");
                return false;
            } 
            
              if(!mysqli_query($this->connection, $trn_mem_update_query))
            {
               $this->HandleDBError("Error inserting data to the table\nquery:$trn_mem_update_query");
                return false;
            }
            
        return true;
    }

    //update church member
    function UpdateChurchMember()
    {
        if(!isset($_POST['submitted']))
        {
           return false;
        }
         if(!$this->UpdateIntoChurchMember($formvars))
        {
            $this->HandleError("Inserting to Database failed!");
            return false;
        }
            return true;
    }
    
    function UpdateIntoChurchMember(&$formvars)
    {
        $update_mem_query = 'UPDATE tbl_ch_member SET
                ch_mem_fullname =  "' . $_SESSION['ch_mem_fullname'] . '",
                ch_mem_address = "' . $_SESSION['ch_mem_address'] . '",
                ch_mem_bday = "' . $_SESSION['ch_mem_bday'] . '",
                ch_mem_bplace = "' . $_SESSION['ch_mem_bplace'] . '",
                ch_mem_citizenship = "' . $_SESSION['ch_mem_citizenship'] . '",
                ch_mem_sss = "' . $_SESSION['ch_mem_sss'] . '",
                ch_mem_tin = "' . $_SESSION['ch_mem_tin'] . '",
                ch_mem_gender = "' . $_SESSION['ch_mem_gender'] . '",
                ch_mem_cstatus = "' . $_SESSION['ch_mem_cstatus'] . '",
                ch_mem_occupation = "' . $_SESSION['ch_mem_occupation'] . '",
                ch_mem_business = "' . $_SESSION['ch_mem_business'] . '",
                ch_mem_contact = "' . $_SESSION['ch_mem_contact'] . '",
                ch_mem_email = "' . $_SESSION['ch_mem_email'] . '",
                ch_mem_ch_id = "' . $_POST['ch_mem_ch'] . '",
                ch_mem_yrmem = "' . $_POST['ch_mem_yrmem'] . '",
                ch_mem_position = "' . $_POST['ch_mem_position'] . '",
                ch_mem_yrconvert = "' . $_POST['ch_mem_yrconvert'] . '",
                ch_mem_yrbapt = "' . $_POST['ch_mem_yrbapt'] . '",
                ch_mem_prevrel = "' . $_POST['ch_mem_prevrel'] . '",
                ch_mem_prevch = "' . $_POST['ch_mem_prevch'] . '",
                ch_mem_spiritual_gift = "' . $_POST['ch_mem_spiritual_gift'] . '",
                ch_mem_skills = "' . $_POST['ch_mem_skills'] . '",
                ch_mem_hobbies = "' . $_POST['ch_mem_hobbies'] . '",
                ch_mem_health = "' . $_POST['ch_mem_health'] . '",
                ch_mem_other_info = "' . $_POST['ch_mem_other_info'] . '",
                ch_mem_interview = "' . $_POST['ch_mem_interview'] . '",
                ch_mem_approve = "' . $_POST['ch_mem_approve'] . '",
                ch_mem_date_accept = "' . $_POST['ch_mem_date_accept'] . '",
                ch_mem_place_accept = "' . $_POST['ch_mem_place_accept'] . '",
                ch_mem_status = "' . $_POST['ch_mem_status'] . '"
                where ch_mem_id = "'. $_POST['memID'] .'"';         

        $this->tablename = 'tbl_ch_member';

          if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        } 
        
          if(!mysqli_query($this->connection, $update_mem_query))
        {
           $this->HandleDBError("Error inserting data to the table\nquery:$update_mem_query");
            return false;
        }

        //spouse
        if($_SESSION['ch_mem_cstatus'] != "Single")
        {
                $sp_mem_update_query = 'UPDATE tbl_ch_mem_spouse SET
                    sp_fullname =  "' . $_SESSION['sp_fullname'] . '",
                    sp_bday = "' . $_SESSION['sp_bday'] . '",
                    sp_date_marriage = "' . $_SESSION['sp_date_marriage'] . '",
                    sp_place_marriage = "' . $_SESSION['sp_place_marriage'] . '"
                    where sp_mem_id = "'. $_POST['memID'] .'"';         

            $this->tablename = 'tbl_ch_mem_spouse';

              if(!$this->DBLogin())
            {
                $this->HandleError("Database login failed!");
                return false;
            } 
            
              if(!mysqli_query($this->connection, $sp_mem_update_query))
            {
               $this->HandleDBError("Error inserting data to the table\nquery:$sp_mem_update_query");
                return false;
            } 
        }
        //church member children
        $cdn_mem_delete_query = 'DELETE FROM tbl_ch_mem_children where cdn_mem_id = "'. $_POST['memID'] .'"';
         $this->tablename = 'tbl_ch_mem_children';
              if(!$this->DBLogin())
            {
                $this->HandleError("Database login failed!");
                return false;
            } 
            
              if(!mysqli_query($this->connection, $cdn_mem_delete_query))
            {
               $this->HandleDBError("Error inserting data to the table\nquery:$cdn_mem_delete_query");
                return false;
            }

        $cdn_mem_update_query1 = 'UPDATE tbl_ch_mem_children SET
            cdn_mem_id = "'. $_POST['memID'] .'"
            where cdn_mem_id = "contain"';

         $this->tablename = 'tbl_ch_mem_children';
              if(!$this->DBLogin())
            {
                $this->HandleError("Database login failed!");
                return false;
            } 
            
              if(!mysqli_query($this->connection, $cdn_mem_update_query1))
            {
               $this->HandleDBError("Error inserting data to the table\nquery:$cdn_mem_update_query1");
                return false;
            }

        //church member education
        $educ_mem_delete_query = 'DELETE FROM tbl_ch_mem_education where educ_mem_id = "'. $_POST['memID'] .'"';
        $this->tablename = 'tbl_ch_mem_education';
              if(!$this->DBLogin())
            {
                $this->HandleError("Database login failed!");
                return false;
            } 
            
              if(!mysqli_query($this->connection, $educ_mem_delete_query))
            {
               $this->HandleDBError("Error inserting data to the table\nquery:$educ_mem_delete_query");
                return false;
            }

        $educ_mem_update_query1 = 'UPDATE tbl_ch_mem_education SET
            educ_mem_id = "'. $_POST['memID'] .'"
            where educ_mem_id = "contain"';

         $this->tablename = 'tbl_ch_mem_education';
              if(!$this->DBLogin())
            {
                $this->HandleError("Database login failed!");
                return false;
            } 
            
              if(!mysqli_query($this->connection, $educ_mem_update_query1))
            {
               $this->HandleDBError("Error inserting data to the table\nquery:$educ_mem_update_query1");
                return false;
            }  

            //church member training
        $trn_mem_delete_query = 'DELETE FROM tbl_ch_mem_training where trn_mem_id = "'. $_POST['memID'] .'"';
        $this->tablename = 'tbl_ch_mem_training';
              if(!$this->DBLogin())
            {
                $this->HandleError("Database login failed!");
                return false;
            } 
            
              if(!mysqli_query($this->connection, $trn_mem_delete_query))
            {
               $this->HandleDBError("Error inserting data to the table\nquery:$trn_mem_delete_query");
                return false;
            }

        $trn_mem_update_query1 = 'UPDATE tbl_ch_mem_training SET
            trn_mem_id = "'. $_POST['memID'] .'"
            where trn_mem_id = "contain"';

         $this->tablename = 'tbl_ch_mem_training';
              if(!$this->DBLogin())
            {
                $this->HandleError("Database login failed!");
                return false;
            } 
            
              if(!mysqli_query($this->connection, $trn_mem_update_query1))
            {
               $this->HandleDBError("Error inserting data to the table\nquery:$trn_mem_update_query1");
                return false;
            }
            
        return true;
    }

    //insert church
    function InsertChurch()
    {
        if(!isset($_POST['submitted']))
        {
           return false;
        }
         if(!$this->InsertIntoChurch($formvars))
        {
            $this->HandleError("Inserting to Database failed!");
            return false;
        }
        return true;
    }
    
    function InsertIntoChurch(&$formvars)
    {

            $this->tablename = 'tbl_district';
            $this->DBlogin();
            $result = mysqli_query($this->connection, "SELECT * FROM tbl_district WHERE dtc_id = '". $_POST['ch_dtc_id'] ."'");
            while($row = $result->fetch_assoc()) 
            {
                $_SESSION["chDtcID"] = $row["dtc_id"];
                $_SESSION["chDtcName"] = $row["dtc_name"];
            }

            $this->tablename = 'tbl_division';
            $this->DBlogin();
            $result = mysqli_query($this->connection, "SELECT * FROM tbl_division WHERE div_id = '". $_POST['ch_div_id'] ."'");
            while($row = $result->fetch_assoc()) 
            {
                $_SESSION["chDivID"] = $row["div_id"];
                $_SESSION["chDivName"] = $row["div_name"];
            }

        $insert_query = 'insert into tbl_church(
                ch_name,
                ch_address,
                ch_contact,
                ch_email,
                ch_soc_acct,
                ch_dtc_id,
                ch_div_id,
                ch_year_est,
                ch_church_his,
                ch_property,
                ch_property_info,
                ch_property_status,
                ch_other_info,
                ch_status,
                ch_notes,
                ch_min_id
                )
                values
                (
                "' . $_POST['ch_name'] . '",
                "' . $_POST['ch_address'] . '",
                "' . $_POST['ch_contact'] . '",
                "' . $_POST['ch_email'] . '",
                "' . $_POST['ch_soc_acct'] . '",
                "' . $_POST['ch_dtc_id'] . '",
                "' . $_POST['ch_div_id'] . '",
                "' . $_POST['ch_year_est'] . '",
                "' . $_POST['ch_church_his'] . '",
                "' . $_POST['ch_property'] . '",
                "' . $_POST['ch_property_info'] . '",
                "' . $_POST['ch_pStatus'] . '",
                "' . $_POST['ch_other_info'] . '",
                "' . $_POST['ch_status'] . '",
                "' . $_POST['ch_notes'] . '",
                "' . $_POST['ch_min_id'] . '"
                )';         

        $this->tablename = 'tbl_church';

          if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        } 
        
          if(!mysqli_query($this->connection, $insert_query))
        {
           $this->HandleDBError("Error inserting data to the table\nquery:$insert_query");
            return false;
        }        

        //Church ID
        $chID = 'SELECT * FROM tbl_church ORDER BY ch_id DESC LIMIT 1';
        $ch_ID = mysqli_query($this->connection, $chID);
        while($row = $ch_ID->fetch_assoc()) 
            {
                $_SESSION['$ch_ID'] = $row["ch_id"];
            }
        //update minister
         $update_min_query = 'UPDATE tbl_minister SET 
         min_ch_id = "'. $_SESSION['$ch_ID'] .'", min_dtc_id = "' . $_POST['ch_dtc_id'] . '"
         where min_id = "'. $_POST['ch_min_id'] .'"';  

         $this->tablename = 'tbl_minister';
          if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        } 

          if(!mysqli_query($this->connection, $update_min_query))
        {
           $this->HandleDBError("Error inserting data to the table\nquery:$update_min_query");
            return false;
        }     
        
        //ch mem count
        mysqli_query($this->connection, 'INSERT INTO tbl_ch_mem_size (memS_ch_id, memS_ch_name, memS_total) VALUES  ("'. $_SESSION['$ch_ID'] .'","'. $_POST['ch_name'] .'", 0)');  
        
          $this->tablename = 'tbl_ch_mem_size';
          if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        } 
               
            return true;
    }

    //update church
    function UpdateChurch()
    {
        if(!isset($_POST['submitted']))
        {
           return false;
        }

         if(!$this->UpdateIntoChurch($formvars))
        {
            $this->HandleError("Update to Database failed!");
            return false;
        }
        return true;
    }

    function UpdateIntoChurch(&$formvars)
    {
        $update_query = 'UPDATE tbl_church SET 
                ch_name = "' . $_POST['ch_name'] . '",
                ch_address = "' . $_POST['ch_address'] . '",
                ch_contact = "' . $_POST['ch_contact'] . '",
                ch_email = "' . $_POST['ch_email'] . '",
                ch_soc_acct = "' . $_POST['ch_soc_acct'] . '",
                ch_dtc_id = "' . $_POST['ch_dtc_id'] . '",
                ch_div_id = "' . $_POST['ch_div_id'] . '",
                ch_year_est = "' . $_POST['ch_year_est'] . '",
                ch_church_his = "' . $_POST['ch_church_his'] . '",
                ch_property = "' . $_POST['ch_property'] . '",
                ch_property_info = "' . $_POST['ch_property_info'] . '",
                ch_property_status = "' . $_POST['ch_property_status'] . '",
                ch_other_info = "' . $_POST['ch_other_info'] . '",
                ch_status = "' . $_POST['ch_status'] . '",
                ch_notes = "' . $_POST['ch_notes'] . '",
                ch_min_id = "' . $_POST['ch_min_id'] . '"
                where ch_id = "' . $_POST['ch_id'] . '"';

        $this->tablename = 'tbl_church';
          if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        } 

          if(!mysqli_query($this->connection, $update_query))
        {
           $this->HandleDBError("Error inserting data to the table\nquery:$update_query");
            return false;
        }    

        //update old minister
         $update_old_min = 'UPDATE tbl_minister SET min_ch_id = "0" where min_id = "'. $_SESSION["oldMinID"] .'"';

         $this->tablename = 'tbl_minister';
          if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        } 

          if(!mysqli_query($this->connection, $update_old_min))
        {
           $this->HandleDBError("Error inserting data to the table\nquery:$update_old_min");
            return false;
        }   
        //update new minister
         $update_min_query = 'UPDATE tbl_minister SET 
         min_ch_id = "'. $_POST['ch_id'] .'", min_dtc_id = "'. $_POST['ch_dtc_id'] .'" 
         where min_id = "'. $_POST['ch_min_id'] .'"';  

         $this->tablename = 'tbl_minister';
          if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        } 

          if(!mysqli_query($this->connection, $update_min_query))
        {
           $this->HandleDBError("Error inserting data to the table\nquery:$update_min_query");
            return false;
        }       

        //update ch count
         mysqli_query($this->connection, 'UPDATE tbl_ch_mem_size SET memS_ch_name = "'. $_POST['ch_name'] .'" where memS_ch_id = "'. $_POST['ch_id'] .'"');

         $this->tablename = 'tbl_ch_mem_size';
          if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }     
            return true;
    }

 //move member
    function MoveMember()
    {
        if(!isset($_POST['submitted']))
        {
           return false;
        }

         if(!$this->MoveIntoMember($formvars))
        {
            $this->HandleError("Update to Database failed!");
            return false;
        }
        return true;
    }
    function MoveIntoMember(&$formvars)
    {
        $update_query = 'UPDATE tbl_ch_member SET 
                ch_mem_ch_id = "' . $_POST['ch_id'] . '"
                where ch_mem_id = "' . $_POST['mem_id'] . '"';

        $this->tablename = 'tbl_ch_member';

          if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        } 

          if(!mysqli_query($this->connection, $update_query))
        {
           $this->HandleDBError("Error inserting data to the table\nquery:$update_query");
            return false;
        }   

        //Update church member count
            mysqli_query($this->connection,'UPDATE tbl_ch_mem_size SET memS_total = memS_total - 1 where memS_ch_id = "'. $_POST['old_ch_id'] .'"');
            mysqli_query($this->connection,'UPDATE tbl_ch_mem_size SET memS_total = memS_total + 1 where memS_ch_id = "'. $_POST['ch_id'] .'"');
            $this->tablename = 'tbl_ch_mem_size';

          if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        } 
            return true;
    }

    //move minister
    function MoveMinister()
    {
        if(!isset($_POST['submitted']))
        {
           return false;
        }

         if(!$this->MoveIntoMinister($formvars))
        {
            $this->HandleError("Update to Database failed!");
            return false;
        }
        return true;
    }
    function MoveIntoMinister(&$formvars)
    {

        $update_query = 'UPDATE tbl_minister SET 
                min_ch_id = "' . $_POST['ch_id'] . '"
                where min_id = "' . $_POST['min_id'] . '"';

        $this->tablename = 'tbl_minister';

          if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        } 

          if(!mysqli_query($this->connection, $update_query))
        {
           $this->HandleDBError("Error inserting data to the table\nquery:$update_query");
            return false;
        }   

        //Update church
            $this->DBlogin();
            $result = mysqli_query($this->connection, 'SELECT * FROM tbl_church where ch_id = "'. $_POST['ch_id'] .'"');
                if ($result->num_rows > 0)
                {
                while ($row = $result->fetch_assoc())
                    {
                        $dtcID = $row['ch_dtc_id'];
                    }
                }

            mysqli_query($this->connection,'UPDATE tbl_church SET ch_min_id = 0 where ch_id = "'. $_POST['old_ch_id'] .'"');
            mysqli_query($this->connection,'UPDATE tbl_church SET ch_min_id = "'. $_POST['min_id'] .'" where ch_id = "'. $_POST['ch_id'] .'"');

            $this->tablename = 'tbl_church';

          if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        } 
        //update district
        $dtc_query = 'UPDATE tbl_minister SET
                min_dtc_id = "' . $dtcID . '"
                where min_id = "' . $_POST['min_id'] . '"';

        $this->tablename = 'tbl_minister';

          if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        } 

          if(!mysqli_query($this->connection, $dtc_query))
        {
           $this->HandleDBError("Error inserting data to the table\nquery:$update_query");
            return false;
        }   
            return true;
    }
}
?>