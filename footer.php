
<style type="text/css">
    .breadcrumb
{
  background-color:rgb(179,217,217);
}
</style>
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © CFGPI 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
  </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
    <script src="js/add_data_table.js"></script>
    <script type="text/javascript" src="js/Chart.js"></script>
    <script>
    $(document).ready(function() {
        $('#cstatus').change(function() {
        if( $(this).val() == "Single") 
        {
            $('#sp_fullname_input').prop( "disabled", true );
            $('#sp_nickname_input').prop( "disabled", true );
            $('#sp_bday_input').prop( "disabled", true );
            $('#sp_date_marriage_input').prop( "disabled", true );
            $('#sp_citizenship_input').prop( "disabled", true );
            $('#sp_occupation_input').prop( "disabled", true );
            $('#sp_contact_input').prop( "disabled", true );
            $('#sp_email_input').prop( "disabled", true );
            $('#sp_date_marriage').prop( "disabled", true );
            $('#sp_place_marriage').prop( "disabled", true );

            $('#sp_fullname_input').prop("value", "");
            $('#sp_nickname_input').prop("value", "");
            $('#sp_bday_input').prop("value", "");
            $('#sp_date_marriage_input').prop("value", "");
            $('#sp_citizenship_input').prop("value", "");
            $('#sp_occupation_input').prop("value", "");
            $('#sp_contact_input').prop("value", "");
            $('#sp_email_input').prop("value", "");
            $('#sp_date_marriage').prop("value", "");
            $('#sp_place_marriage').prop("value", "");
        } 
        else 
        {       
            $('#sp_fullname_input').prop( "disabled", false );
            $('#sp_nickname_input').prop( "disabled", false );
            $('#sp_bday_input').prop( "disabled", false );
            $('#sp_date_marriage_input').prop( "disabled", false );
            $('#sp_citizenship_input').prop( "disabled", false );
            $('#sp_occupation_input').prop( "disabled", false );
            $('#sp_contact_input').prop( "disabled", false );
            $('#sp_email_input').prop( "disabled", false );
            $('#sp_date_marriage').prop( "disabled", false );
            $('#sp_place_marriage').prop( "disabled", false );
        }
        });
    });
    </script>
    <script>
    $(document).ready(function(){
        $("#addsg").change(function(){
            if( $("#addspiritualgift").val() == "")
            {
                $("#addspiritualgift").val($("#addspiritualgift").val() + $("#addsg").val());
            } else
            {
                $("#addspiritualgift").val($("#addspiritualgift").val() + ", " + $("#addsg").val());
            }
        });
    });
    </script>
    <script>
    $(document).ready(function(){
        $("#addsk").change(function(){
            if( $("#addskills").val() == "")
            {
                $("#addskills").val($("#addskills").val() + $("#addsk").val());
            } else
            {
                $("#addskills").val($("#addskills").val() + ", " + $("#addsk").val());
            }
        });
    });
    </script>
    <script>
    $(document).ready(function(){
        $("#addho").change(function(){
            if( $("#addhobbies").val() == "")
            {
                $("#addhobbies").val($("#addhobbies").val() + $("#addho").val());
            } else
            {
                $("#addhobbies").val($("#addhobbies").val() + ", " + $("#addho").val());
            }
        });
    });
    </script>
    <script>
    $(document).ready(function(){
        $("#addhp").change(function(){
            if( $("#addhealth").val() == "")
            {
                $("#addhealth").val($("#addhealth").val() + $("#addhp").val());
            } else
            {
                $("#addhealth").val($("#addhealth").val() + ", " + $("#addhp").val());
            }
        });
    });
    </script>
    <script>
    // JavaScript popup window function
        function basicPopup(url) {
             popupWindow = window.open(url,'popUpWindow','height=300,width=700,left=50,top=50,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes')
        }
    </script>

<!--getdivision   $_SESSION["editDivCheck"] = "1";      -->
<script>
$( document ).ready(function() {
    <?php 
    if ($_SESSION["editPage"] == "1")
    {
        $_SESSION['editDivCheck'] = "1";    
    }
    ?>
    showDiv($("#ch_dtc_id").val());
    
});

function showDiv(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }

  xmlhttp.open("GET","getDiv.php?q="+str,true);
  xmlhttp.send();
}

function viewTable() {
     document.getElementById("viewSubmit").click(); // Click on the checkbox
    }
</script>
</body>
</html>