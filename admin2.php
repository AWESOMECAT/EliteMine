<?PHP
include('include.php');
db_connect();
//Set Variables
$username = $_POST['username'];
$userlevel = $_POST['userlevel'];
$levelchange = $_POST['levelchange'];
$namechange = $_POST['namechange'];
$newname = $_POST['newname'];
$passchange = $_POST['passchange'];
$newpass = md5($_POST['newpass']);
$postreset = $_POST['postreset'];
$time = 0;

//MySQL query
if($namechange == true){
$query = "UPDATE NSusers SET username='$newname' WHERE username='$username'";
mysql_query($query) or die(mysql_error());
}
if($levelchange == true){
$query = "UPDATE NSusers SET userlevel='$userlevel' WHERE username='$username'";
mysql_query($query) or die(mysql_error());
}
if($passchange == true){
$query = "UPDATE NSusers SET password='$newpass' WHERE username='$username'";
mysql_query($query) or die(mysql_error());
}
if($postreset == true){
$query = "UPDATE NSusers SET lastpost='$time' WHERE username='$username'";
mysql_query($query) or die(mysql_error());
}
mysql_close();
header( 'Location: /EliteMine/admin.php' );
?>