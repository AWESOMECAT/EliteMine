<?PHP
if(!isset($_COOKIE['user'])){
header('Location: /EliteMine/');
}
$id = $_GET['id'];
?>
<html>
<head>
<?PHP
//Database Information

$dbhost = 'localhost';
$dbname = 'dsfarge1_em';
$dbuser = 'dsfarge1_dsfarge';
$dbpass = 'neurophage';

//Connect to database

mysql_connect ( $dbhost, $dbuser, $dbpass)or die("Could not connect: ".mysql_error());
mysql_select_db($dbname) or die(mysql_error());

$username = $_COOKIE['user'];
$query = "SELECT templatecreator FROM templates WHERE templateid='$id'";
$result = mysql_query($query);
$result = mysql_fetch_assoc($result);
$creator = $result['templatecreator'];
$query = "SELECT username FROM NSusers WHERE userid='$creator'";
$result = mysql_query($query);
$result = mysql_fetch_assoc($result);
$creator = $result['username'];
if($creator != $username){
header('Location: /EliteMine/');
}
?>
<title>NovusSententiae - Edit Template</title>
<script type="text/javascript" src="bbcode.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="/NovusSententiae/main.css" >
<link rel="shortcut icon" href="/NovusSententiae/favicon.ico" type="image/x-icon" />
<SCRIPT language="JavaScript">
<!--
function go_there()
{
 var where_to= confirm("Are you happy with your template?");
 if (where_to== true)
 {
   document.thought.submit();
 }
}
//-->
</SCRIPT>
<script type="text/javascript">
<!--

function textWrite(){
	var contents = new String(document.getElementById("contents").value);
	document.getElementById("preview").style.backgroundColor = document.getElementById("backgroundcolor").value;
	document.getElementById("preview").style.borderColor = document.getElementById("bordercolor").value;
	document.getElementById("preview").style.borderStyle = document.getElementById("borderstyle").value;
	document.getElementById("preview").innerHTML = bbcode(contents);
	document.getElementById("preview").reload();
}
//-->
</script>
<?PHP include_once('navbar.php');
include_once('bbcode.php'); ?>
</head>
<body>
<?PHP
db_connect();

$template_query = "SELECT * FROM templates WHERE templateid='$id'";
$template = mysql_query($template_query);
$template = mysql_fetch_assoc($template);
$bordercolor = $template['bordercolor'];
$borderstyle = $template['borderstyle'];
$backgroundcolor = $template['backgroundcolor'];
$content = $template['content'];
$templatename = $template['templatename'];

if($borderstyle == "solid"){
$solid = "selected = \"selected\"";
}
if($borderstyle == "dashed"){
$dashed = "selected = \"selected\"";
}
if($borderstyle == "dotted"){
$dotted = "selected = \"selected\"";
}
if($borderstyle == "double"){
$double = "selected = \"selected\"";
}
if($borderstyle == "groove"){
$groove = "selected = \"selected\"";
}
if($borderstyle == "inset"){
$inset = "selected = \"selected\"";
}
if($borderstyle == "outset"){
$outset = "selected = \"selected\"";
}
if($borderstyle == "ridge"){
$ridge = "selected = \"selected\"";
}

?>
<center>
<form name="thought" action="updatetemplate.php" method="post">
<table border="0" width="350" align="center">
	<tr>
		<td colspan="2">
			<center>Post A Thought</center>
		</td>
	</tr>
	<tr>
		<td rowspan="3">
		<div style="border-style: <?PHP echo $borderstyle?>; border-color: <?PHP echo $bordercolor?>; background-color: <?PHP echo $backgroundcolor?>;" id="preview" class="thought"><?php echo bbcode_format($content);?></div>
		</td>
		<td width="175">
			Border Style:<br />
			<select name="borderstyle" id="borderstyle" onchange="textWrite()">
				<option value="solid" <?PHP echo $solid;?>>Solid</option>
				<option value="dashed" <?PHP echo $dashed;?>>Dashed</option>
				<option value="dotted" <?PHP echo $dotted;?>>Dotted</option>
				<option value="double" <?PHP echo $double;?>>Double</option>
				<option value="groove" <?PHP echo $groove;?>>Groove</option>
				<option value="inset" <?PHP echo $inset;?>>Inset</option>
				<option value="outset" <?PHP echo $outset;?>>Outset</option>
				<option value="ridge" <?PHP echo $ridge;?>>Ridge</option>
			</select>
		</td>
	</tr>
	<tr>
		<td width="175">
			Border Color:<br />
			<input type="text" name="bordercolor" id="bordercolor" value="<?PHP echo $bordercolor;?>" onchange="textWrite()">
		</td>
	</tr>
	<tr>
		<td width="175">
			Background Color:<br />
			<input type="text" name="backgroundcolor" id="backgroundcolor" value="<?PHP echo $backgroundcolor;?>" onchange="textWrite()">
			<input type="hidden" name="templateid" id="templateid" value="<?PHP echo $id;?>">
		</td>
	</tr>
	<tr>
		<td>
		</td>
		<td>
		Template Name:<br />
		<input type="text" name="templatename" value="<?PHP echo $templatename;?>">
		</td>
	</tr>
	<tr>
		<td>
			<br /><textarea rows="10" cols="25" style="font-family: Tahoma, Geneva, Verdana, Arial, Helvetica, sans-serif; font-size: 8pt;" name="contents" id="contents" onchange="textWrite()" onfocus="textWrite()"><?PHP echo $content;?></textarea>
		<br><input type="button" value="Forge" onclick="go_there()">
		</td>
		<td>
		Default:<input type="checkbox" name="default" value="yes">
		</td>
	</tr>
</table>
</form>
</center>
</body>
</html>