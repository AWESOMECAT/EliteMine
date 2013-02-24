<?php
$userlevel = $_COOKIE['userlevel'];
if($userlevel != 3){
header('Location: /EliteMine/');
} else {
include_once('navbar.php');
}
?>
<html>
<head>
<title>NovusSententiae - Admin Utility</title>
<link rel="stylesheet" type="text/css" media="screen" href="/NovusSententiae/main.css" >
<link rel="stylesheet" type="text/css" media="screen" href="/NovusSententiae/prototip.css" >
<link rel="shortcut icon" href="/NovusSententiae/favicon.ico" type="image/x-icon" />
<script type="text/javascript" src="/NovusSententiae/js/prototip.js"></script>
</head>
<body>
<center>
<div><form name="useredit" action="admin2.php" method="post">Username: 
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
<br />
Change Userlevel <input type="checkbox" name="levelchange" value="true">
<br>
User Level:
<select style="width: 200px;" name="userlevel">
<option value="0">Normal User</option>
<option value="1">Gold Account™</option>
<option value="2">Moderator</option>
<option value="3">Admin</option>
</select>
<br>
Change Username <input type="checkbox" name="namechange" value="true">
<br>
New Username: <input type="text" name="newname" class="text">
<br>
Change Password <input type="checkbox" name="passchange" value="true">
<br />
New Password: <input type="text" name="newpass" class="text">
<br />
Reset Post Time <input type="checkbox" name="postreset" value="true">
<br />
<input type="submit" value="Submit">
</form>
</div>
</center>
</body>