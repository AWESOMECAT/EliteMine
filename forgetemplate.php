<?PHP
if(!isset($_COOKIE['user'])){
header('Location: /EliteMine/');
}
?>
<html>
<head>
<?PHP include_once('navbar.php'); ?>
<title>NovusSententiae - Create A Template</title>
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
   document.template.submit();
 }
}
//-->
</SCRIPT>
<script type="text/javascript">
<!--
document.onLoad(textWrite());
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
</head>
<body>
<center>
<form name="template" action="addtemplate.php" method="post">
<table border="0" width="350" align="center">
	<tr>
		<td colspan="2">
			<center>Create A Template</center>
		</td>
	</tr>
	<tr>
		<td rowspan="3">
		<div id="preview" class="thought"></div>
		</td>
		<td width="175">
			Border Style:<br />
			<select name="borderstyle" id="borderstyle" onchange="textWrite()">
				<option value="solid">Solid</option>
				<option value="dashed">Dashed</option>
				<option value="dotted">Dotted</option>
				<option value="double">Double</option>
				<option value="groove">Groove</option>
				<option value="inset">Inset</option>
				<option value="outset">Outset</option>
				<option value="ridge">Ridge</option>
			</select>
		</td>
	</tr>
	<tr>
		<td width="175">
			Border Color:<br />
			<input type="text" name="bordercolor" id="bordercolor" value="#000000" onchange="textWrite()">
		</td>
	</tr>
	<tr>
		<td width="175">
			Background Color:<br />
			<input type="text" name="backgroundcolor" id="backgroundcolor" value="#FFFFFF" onchange="textWrite()">
		</td>
	</tr>
	<tr>
		<td>
		</td>
		<td>
		Template Name:<br />
		<input type="text" name="templatename">
		</td>
	</tr>
	<tr>
		<td>
			<br /><textarea rows="10" cols="25" style="font-family: Tahoma, Geneva, Verdana, Arial, Helvetica, sans-serif; font-size: 8pt;" name="contents" id="contents" onchange="textWrite()" onfocus="textWrite()">[br][br][a:center][c:#000000]Thought Contents Here[/c][/a]</textarea>
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