<?PHP
$userlevel = $_COOKIE['userlevel'];
if($userlevel < 3){
header('Location: /EliteMine/');
}
?>
<html>
<head>
<?PHP include_once('navbar.php'); include_once('include.php'); ?>
<title>NovusSententiae - All Templates</title>
<link rel="stylesheet" type="text/css" media="screen" href="/NovusSententiae/main.css" >
<link rel="shortcut icon" href="/NovusSententiae/favicon.ico" type="image/x-icon" />
</head>
<body>
<?PHP
include('bbcode.php');
$template_query = "SELECT * FROM templates ORDER BY templateid DESC";
$templates = mysql_query($template_query);

while ($row = mysql_fetch_array($templates)) {
$creatorid = $row['templatecreator'];
$query = "SELECT * FROM NSusers WHERE userid=$creatorid";
$result = mysql_query($query);
$result = mysql_fetch_assoc($result);
$creator = $result['username'];
$content = html_entity_decode($row['content']);
$content = bbcode_format($content);
echo "	<div title=\"[".$creator."] ",$row['templatename'],"\" class=\"thought\" thoughtid=\"",$row['thoughtid'],"\" name=\"",$row['thoughtid'],"\" style=\"float: left; margin: 3px; width: 100px; height: 100px; border-style: ",$row['borderstyle'],"; border-color:",$row['bordercolor'],"; background: ",$row['backgroundcolor'],";\" onclick=\"editTemplate('".$row['templateid']."')\">",$content,"</div>
"; 
}
?>
</body>
</html>