<?PHP
setcookie("user", "", time()-3600);
setcookie("userid", "", time()-3600);
setcookie("userlevel", "", time()-3600);
//Database Information

$dbhost = 'localhost';
$dbname = 'dsfarge1_em';
$dbuser = 'dsfarge1_dsfarge';
$dbpass = 'neurophage';

//Connect to database

mysql_connect ( $dbhost, $dbuser, $dbpass)or die("Could not connect: ".mysql_error());
mysql_select_db($dbname) or die(mysql_error());
$ip=@$REMOTE_ADDR;
$posttime = date('M j, Y g:i a', time()-(8*60*60));
$query = "INSERT INTO sitelog (userid, event, eventtime)VALUES('$userid', 'User logged out with IP $ip', '$posttime')";
mysql_query($query) or die(mysql_error());
header( 'Location: /EliteMine/' ) ;
?>