<?PHP
if(!isset($_COOKIE['user'])){
header('Location: /EliteMine/');
}
?>
<html>
<head>
<?PHP include_once('navbar.php');?>
<title>Profile Settings</title>
<link rel="stylesheet" type="text/css" media="screen" href="/NovusSententiae/main.css" >
<link rel="stylesheet" type="text/css" media="screen" href="/NovusSententiae/prototip.css" >
<link rel="shortcut icon" href="/NovusSententiae/favicon.ico" type="image/x-icon" />
<script type="text/javascript" src="/NovusSententiae/js/prototip.js"></script>
</head>
<body>
<center>
<?PHP 
$message = $_GET['message'];
if($message == 'updated'){
echo '<b>Stream Updated</b>';
}
$username = $_COOKIE['user'];

$query = "SELECT * FROM NSusers WHERE username='$username'";

$result = mysql_query($query);
$userinfo = mysql_fetch_assoc($result);
?>
<br /><br />
<div><form name="settings" action="settings2.php" method="post">
Stream Width:
<select name="width">
<option value="">Adjustable Width</option>
<option value="350px">3 Thoughts Wide</option>
<option value="450px">4 Thoughts Wide</option>
<option value="550px">5 Thoughts Wide</option>
</select>
<br /><br />
Location:
<input type="text" name="location" value="<? echo $userinfo['location']; ?>">
<br /><br />
About:<br />
<textarea name="about" cols="40" rows="8" style="font-family:Verdana, Arial, Helvetica;"><? echo $userinfo['about1']; ?></textarea>
<br /><br />
<input type="submit" value="Submit">
</div>
</center>
</body>
</html>
