<?PHP
include_once('bbcode.php');

//Database Information

$dbhost = 'localhost';
$dbname = 'dsfarge1_em';
$dbuser = 'dsfarge1_dsfarge';
$dbpass = 'neurophage';

//Connect to database

mysql_connect ( $dbhost, $dbuser, $dbpass)or die("Could not connect: ".mysql_error());
mysql_select_db($dbname) or die(mysql_error());

$username = $_COOKIE['user'];
$query = "SELECT lastpost FROM NSusers WHERE username='$username'";
$result = mysql_query($query);
$array = mysql_fetch_assoc($result);
$lastpost = $array['lastpost'];

if($lastpost + (5 * 60) >= time()){
header( 'Location: /EliteMine/');
}else{
//Set Variables
$userid = $_COOKIE['userid'];
$userlevel = $_COOKIE['userlevel'];
$borderstyle = $_POST['borderstyle'];
$bordercolor = htmlentities(strip_tags($_POST['bordercolor']));
$backgroundcolor = htmlentities(strip_tags($_POST['backgroundcolor']));
if($userlevel == 3){
$contents = htmlentities($_POST['contents']);
} else {
$contents = htmlentities(bbcode_format(strip_tags($_POST['contents'], '<br><3>')));
}
$posttime = date('M j, Y g:i a', time()-(8*60*60));
//MySQL query
$query = "INSERT INTO thoughts (userid, content, borderstyle, bordercolor, backgroundcolor, posttime)VALUES(\"$userid\", \"$contents\", \"$borderstyle\", \"$bordercolor\", \"$backgroundcolor\", \"$posttime\")";
mysql_query($query) or die(mysql_error());
$butts = time();
$userlevel = $_COOKIE['userlevel'];
if($userlevel >= 2){
$time = $butts - (5 * 60);
} else if($userlevel >= 1) {
$time = $butts - (5 * 60);
} else {
$time = $butts;
}
$query = "UPDATE NSusers SET lastpost='$time' WHERE userid='$userid'";
mysql_query($query) or die(mysql_error());
$ip=@$REMOTE_ADDR;
$query = "INSERT INTO sitelog (userid, event, eventtime)VALUES('$userid', 'User posted a thought with IP $ip', '$posttime')";
mysql_query($query) or die(mysql_error());
mysql_close();
header( 'Location: /EliteMine/' );
}
include_once('include.php');
?>