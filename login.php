<?php
//Database Information

$dbhost = 'localhost';
$dbname = 'dsfarge1_em';
$dbuser = 'dsfarge1_dsfarge';
$dbpass = 'neurophage';

//Connect to database

mysql_connect ( $dbhost, $dbuser, $dbpass)or die("Could not connect: ".mysql_error());
mysql_select_db($dbname) or die(mysql_error());

session_start();
$email = $_POST['email'];
$password = md5(htmlentities($_POST['password']));

$query = "select * from NSusers where email='$email' and password='$password'";

$result = mysql_query($query);

if (mysql_num_rows($result) != 1) {
$error = "Bad Login";
    header("Location: /EliteMine/login2.php");

} else {
	$posttime = date('M j, Y g:i a', time()-(8*60*60));
	$query = "select username from NSusers where email='$email' and password='$password'";
	$result = mysql_query($query);
	$result = mysql_fetch_assoc($result);
	$username = $result['username'];
    $_SESSION['username'] = "$username";
    $expire=time()+60*60*24;
	setcookie("user", $username, $expire);
	$query2 = "select userid from NSusers where username='$username'";
	$result = mysql_query($query2);
	while ($row = mysql_fetch_assoc($result)){
		$userid = $row['userid'];
	}
	$_SESSION['userid'] = "$userid";
	setcookie("userid", $userid, $expire);
	$query3 = "SELECT userlevel FROM NSusers WHERE username='$username'";
	$result = mysql_query($query3);
	while ($row = mysql_fetch_assoc($result)){
		$userlevel = $row['userlevel'];
	}
	$_SESSION['userlevel'] = "$userlevel";
	setcookie("userlevel", $userlevel, $expire);
	header( 'Location: /EliteMine/' );
	$ip=@$REMOTE_ADDR;
	$query = "INSERT INTO sitelog (userid, event, eventtime)VALUES('$userid', 'User logged in with IP $ip', '$posttime')";
	mysql_query($query) or die(mysql_error());
}

?>
