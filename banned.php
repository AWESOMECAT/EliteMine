<?PHP
//Database Information

$dbhost = 'localhost';
$dbname = 'dsfarge1_em';
$dbuser = 'dsfarge1_dsfarge';
$dbpass = 'neurophage';

//Connect to database

mysql_connect ( $dbhost, $dbuser, $dbpass)or die("Could not connect: ".mysql_error());
mysql_select_db($dbname) or die(mysql_error());
$ip=@$REMOTE_ADDR;
$userid = $_COOKIE['userid'];
$ipbanquery = "SELECT * FROM ipbans WHERE ip='$ip'";
$userbanquery = "SELECT * FROM userbans WHERE userid='$userid'";
$ipban = mysql_query($ipbanquery);
$userban = mysql_query($userbanquery);
if (mysql_num_rows($ipban) == 1){
header("Location: /EliteMine/banned.html");
//echo 'wat';
}
if (mysql_num_rows($userban) == 1){
header("Location: /EliteMine/banned.html");
//echo 'wat';
}
?>