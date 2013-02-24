<?PHP
include('include.php');
$backgroundcolor = $_POST['backgroundcolor'];
$bordercolor = $_POST['bordercolor'];
$borderstyle = $_POST['borderstyle'];
$templatename = $_POST['templatename'];
$default = $_POST['default'];
$contents = htmlentities($_POST['contents']);
$templatecreator = $_COOKIE['userid'];
db_connect();
$template_query = "INSERT INTO templates (templatecreator, content, borderstyle, bordercolor, backgroundcolor, templatename)VALUES('$templatecreator', \"$contents\", '$borderstyle', '$bordercolor', '$backgroundcolor', '$templatename')";
mysql_query($template_query);
if($default == 'yes'){
$defaultid = mysql_insert_id();
$default_query = "UPDATE NSusers SET defaultid='$defaultid' WHERE userid='$templatecreator'";
mysql_query($default_query);
}
header( 'Location: /EliteMine/templates.php' );
?>