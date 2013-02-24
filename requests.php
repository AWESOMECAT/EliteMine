<?php
$userlevel = $_COOKIE['userlevel'];
if($userlevel != 3){
header('Location: /EliteMine/');
}
?>
<html>
<head>
<?php
//include_once('navbar.php');
include('include.php');
$accept = $_GET['accept'];
$decline = $_GET['decline'];
?>
<title>EliteMine - Registration Requests</title>
<link rel="stylesheet" type="text/css" media="screen" href="/NovusSententiae/main.css" >
<link rel="stylesheet" type="text/css" media="screen" href="/NovusSententiae/prototip.css" >
<link rel="shortcut icon" href="/NovusSententiae/favicon.ico" type="image/x-icon" />
<script type="text/javascript" src="/NovusSententiae/js/prototip.js"></script>
</head>
<body>
<br><br><br><br><br>
<div>
<table style="margin:0px auto;border:1px black solid;" border="1" rules="rows" cellpadding="2">
<tr><td><b>Accepted:</b></td><td><b>Name:</b></td><td><b>Email:</b></td><td><b>Username:</b></td><td><b>NM Username:</b></td><td><b>Password:</b></td><td><b>Request Time:</b></td><td><b>Accept:</b></td><td><b>Decline:</b></td></tr>
<?PHP
db_connect();
if($accept != null){
$requestquery = "SELECT * FROM requests WHERE requestid='$accept'";
$request = mysql_query($requestquery);
$request = mysql_fetch_array($request);
$acceptquery = "UPDATE requests SET accepted='Yes' WHERE requestid='$accept'";
mysql_query($acceptquery);
$name = $request['name'];
$email = $request['email'];
$username = $request['username'];
$password = md5($request['password']);
$acceptquery2 = "INSERT INTO NSusers (name, email, username, password)VALUES('$name', '$email', '$username', '$password')";
mysql_query($acceptquery2);
}
if($decline != null){
$requestquery = "SELECT * FROM requests WHERE requestid='$decline'";
$request = mysql_query($requestquery);
$request = mysql_fetch_array($request);
$declinequery = "UPDATE requests SET accepted='Declined' WHERE requestid='$decline'";
mysql_query($declinequery);
}
$requestquery = 'SELECT * FROM requests ORDER BY requestid DESC';
$requests = mysql_query($requestquery);
echo mysql_error();
if (!$requests) {
die('Invalid query: ' . mysql_error());
}
while ($row = mysql_fetch_array($requests)){
if($row['accepted']=='Yes'){
$color = 'green';
}elseif($row['accepted']=='Declined'){
$color = 'red';
} else {
$color = null;
}
if($row['accepted']=='Declined'){
$color = 'red';
}
echo '<tr bgcolor="'.$color.'"><td>'.$row['accepted'].'</td><td>'.$row['name'].'</td><td>'.$row['email'].'</td><td>'.$row['username'].'</td><td>'.$row['nmusername'].'</td><td>'.$row['password'].'</td><td>'.$row['requesttime'].'</td><td><a href="?accept='.$row['requestid'].'">X</a></td><td><a href="?decline='.$row['requestid'].'">X</a></td></tr>
';
}
?>
</table>
</div>
</div>
</body>
</html>