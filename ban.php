<?php
$userlevel = $_COOKIE['userlevel'];
if($userlevel < 2){
header('Location: /EliteMine/');
} else {
include_once('navbar.php');
}
?>
<html>
<head>
<title>NovusSententiae - Ban Utility</title>
<link rel="stylesheet" type="text/css" media="screen" href="/NovusSententiae/main.css" >
<link rel="stylesheet" type="text/css" media="screen" href="/NovusSententiae/prototip.css" >
<link rel="shortcut icon" href="/NovusSententiae/favicon.ico" type="image/x-icon" />
<script type="text/javascript" src="/NovusSententiae/js/prototip.js"></script>
</head>
<body>
<center>
<div><form name="userban" action="userban.php" method="post">Username:
<select style="width: 200px;" name="username">
<?PHP
db_connect();

//Retrieve Users 
$query = 'SELECT * FROM `NSusers` ORDER BY userid DESC';
$result = mysql_query($query);


while ($row = mysql_fetch_array($result)) {
	echo "<option value=\"".$row['username']."\">".$row['username']." User Level:".$row['userlevel']."</option>
	"; 
}
?>
</select>
<br /><br />
Reason:<input type="text" name="reason" value="Reason for ban" id="reason"></input>
<br /><br />
<button type="submit"><span style="font-size:36pt;">BAN 'EM!</span></button>
</form>
</div>
</center>
</body>
</html>