<?PHP
include('include.php');
$backgroundcolor = $_POST['backgroundcolor'];
$bordercolor = $_POST['bordercolor'];
$borderstyle = $_POST['borderstyle'];
$templatename = $_POST['templatename'];
$default = $_POST['default'];
$contents = htmlentities($_POST['contents']);
$templatecreator = $_COOKIE['userid'];
$templateid = $_POST['templateid'];
db_connect();
$template_query = "UPDATE templates SET templatecreator='$templatecreator', content=\"$contents\", borderstyle='$borderstyle', bordercolor='$bordercolor', backgroundcolor='$backgroundcolor', templatename='$templatename' WHERE templateid=$templateid";
mysql_query($template_query);
if($default == 'yes'){
$defaultid = mysql_insert_id();
$default_query = "UPDATE NSusers SET defaultid='$templateid' WHERE userid='$templatecreator'";
mysql_query($default_query);
}
header( 'Location: /EliteMine/templates.php' );
?>