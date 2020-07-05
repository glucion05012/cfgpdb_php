<?PHP
require_once("fg_membersite.php");
session_start();
$fgmembersite = new FGMembersite();

$fgmembersite->SetAdminEmail('admin@admin.com');

$fgmembersite->InitDB(/*hostname*/'localhost',
                      /*username*/'glucion',
                      /*password*/'Mrbean012',
                      /*database name*/'foursquare_master','');
$_SESSION['encryptionKey'] = '';
?>