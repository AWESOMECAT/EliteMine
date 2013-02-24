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
$username = $_GET['user'];

$query = "SELECT * FROM NSusers WHERE username='$username'";

$result = mysql_query($query);
$userinfo = mysql_fetch_assoc($result);
$width = $userinfo['width'];

if (mysql_num_rows($result) != 1) {
header('Location: /EliteMine/');

}
?>
<html>
<head>
<?PHP include_once('navbar.php'); ?>
<title>EliteMine - <?PHP $user = $_GET["user"]; echo $user; ?>'s Profile</title>
<link rel="stylesheet" type="text/css" media="screen" href="/NovusSententiae/main.css" >
<link rel="shortcut icon" href="/NovusSententiae/favicon.ico" type="image/x-icon" />
</head>
<body>
<div style="background:url('/images/hedge.png') repeat-x;height:40px;width:100%;position:relative;float:left;position:relative;"></div>
<div style="background:url('/images/vedge.png') repeat-y right;height:100%; width:300px;position:absolute;">
	<div style="background: url('/images/corner.png') top right no-repeat;font-size:12pt;">
		<br><br>&nbsp;&nbsp;&nbsp;<?PHP echo $userinfo['username'];?>'s Profile<?PHP if($userinfo['username'] == $_COOKIE['user']){
		echo " <a href=\"settings.php\">Edit</a>";
		} ?><br><br>
		<div style="border:1px black solid;width:175px;height:200px;margin-left:40px;position:relative;">
			<div style="position:absolute;left:0pt;top:0pt;z-index:1;">
			<img src="/images/noprofile.png" >
			</div>
<?PHP
if($userinfo['userlevel']>=1){
echo "<div style=\"position:absolute;left:0pt;top:-17px;z-index:2;\">
<img src=\"/images/crown.png\">
</div>";
}
			?>
		</div>
		<div style="margin:20px;font-size:9pt;">
			Location<br>&nbsp;<? echo $userinfo['location']; ?><br><br>
			About<br>
			<div style="width:200px;background:#FFFFFF;min-height:150px;border:#000000 1px solid;">
			<? echo html_entity_decode($userinfo['about']); ?>
			</div>
		</div>
	</div>
</div>
<div style="text-align:center;position:relative;margin:20px;margin-right:30px;margin-left:300px;">
	<div style="text-align:left;margin:0px auto;width:<?PHP echo $width;?>;">
	<?PHP
	mysql_connect ( $dbhost, $dbuser, $dbpass)or die("Could not connect: ".mysql_error());
	mysql_select_db($dbname) or die(mysql_error());
	
	print_thoughts(false, $user, 1);
	?>
	</div>
</div>
</body>
</html>