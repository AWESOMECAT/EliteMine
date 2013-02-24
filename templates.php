<?PHP
if(!isset($_COOKIE['user'])){
header('Location: /EliteMine/');
}
?>
<html>
<head>
<?PHP include_once('navbar.php'); include_once('include.php'); ?>
<title>NovusSententiae - Templates</title>
<link rel="stylesheet" type="text/css" media="screen" href="/NovusSententiae/main.css" >
<link rel="shortcut icon" href="/NovusSententiae/favicon.ico" type="image/x-icon" />
</head>
<body>
<center><a href="forgetemplate.php">Create A Template</a></center>
<?PHP
include('bbcode.php');
$username = $_COOKIE['user'];
$userid_query = "SELECT userid FROM NSusers WHERE username='$username'";

$userid = mysql_query($userid_query);
$userid = mysql_fetch_assoc($userid);
$userid = $userid['userid'];

$template_query = "SELECT * FROM templates WHERE templatecreator='$userid' ORDER BY templateid DESC";


$result = mysql_query($template_query);

while ($row = mysql_fetch_array($result)) {
$content = html_entity_decode($row['content']);
$content = bbcode_format($content);
echo "	<div title=\"",$row['templatename'],"\" class=\"thought\" thoughtid=\"",$row['thoughtid'],"\" name=\"",$row['thoughtid'],"\" style=\"float: left; margin: 3px; width: 100px; height: 100px; border-style: ",$row['borderstyle'],"; border-color:",$row['bordercolor'],"; background: ",$row['backgroundcolor'],";\" onclick=\"editTemplate('".$row['templateid']."')\">",$content,"</div>
"; 
}
?>
</body>
</html>