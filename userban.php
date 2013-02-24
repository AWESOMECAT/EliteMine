<?PHP
include('include.php');
db_connect();
$username = $_POST['username'];
$reason = $_POST['reason'];
$bantime = date('M j, Y g:i a', time()-(8*60*60));
$useridquery = "SELECT userid FROM NSusers WHERE username='$username'";
$userid = mysql_query($useridquery);
$userid = mysql_fetch_array($userid);
$userid = $userid['userid'];
$banquery = "INSERT INTO userbans (userid, reason, bantime)VALUES('$userid', '$reason', '$bantime')";
mysql_query($banquery);
header('Location: /EliteMine/ban.php');
?>