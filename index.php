<html>
<head>
<?php
include_once('navbar.php');
?>
<title>EliteMine</title>
<link rel="stylesheet" type="text/css" media="screen" href="main.css" >
<link rel="stylesheet" type="text/css" media="screen" href="prototip.css" >
<link rel="shortcut icon" href="/NovusSententiae/favicon.ico" type="image/x-icon" />
</head>
<body> 
<center>
<div style="color:black;width:450px;border-color:#303030;border-style:solid;border-width:1px;background-color:#87988D;padding:4px;margin-bottom:20px;text-align:left;font-size:9pt;"><b>Welcome to EliteMine!</b><br />If you have any questions check out the <a href="faq.php">FAQ</a>.<br /><span style="color:#FF0000;">READ THE RULES BEFORE YOU POST. THEY CAN BE FOUND <a href="rules.php">HERE</a>.</span><br /><b>Updates</b>:<br />&nbsp;&nbsp;&nbsp;&#8226;COMMENT SYSTEM FULLY FUNCTIONAL<br />&nbsp;&nbsp;&nbsp;&#8226;Profile pages are now able to be edited. Go to your stream<br>&nbsp;&nbsp;&nbsp;and click "Edit" to do so.<br />&nbsp;&nbsp;&nbsp;&#8226;Clicking on a thought takes you to the comments for that<br>&nbsp;&nbsp;&nbsp;&nbsp;thought, and clicking on it there takes you to their profile.<br>&nbsp;&nbsp;&nbsp;&#8226;Editing Templates now works.</div>
</center>
<br />
<div style="float: right; margin: 20px; height: 100%;">
<?PHP
include_once('cbox.php');
?>
</div>
<div style="margin-right: 200px;margin-left: 20px;">
<?PHP
db_connect();
print_thoughts(true, null, 1);
?>
</div>
</body>
</html>