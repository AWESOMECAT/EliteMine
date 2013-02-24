<?PHP
if(!isset($_COOKIE['user'])){
header('Location: /EliteMine/login2.php');
}
include_once('navbar.php');
$thoughtid = $_GET['id'];
?>
<html>
<head>
<title>EliteMine - View A Thought</title>
<link rel="stylesheet" type="text/css" media="screen" href="/NovusSententiae/main.css" >
<link rel="stylesheet" type="text/css" media="screen" href="/NovusSententiae/prototip.css" >
<link rel="shortcut icon" href="/NovusSententiae/favicon.ico" type="image/x-icon" />
<script type="text/javascript" src="/NovusSententiae/js/prototip.js"></script>
</head>
<body>
<div>
	<div style="margin:0px auto;width:450px;">
		<div style="width:450px;height:200px;">
			<?
			$thought_query = "SELECT * FROM thoughts WHERE thoughtid='$thoughtid'";
			$result = mysql_query($thought_query);
			$result = mysql_fetch_assoc($result);
			$rowuserid = $result['userid'];
			$query1 = "SELECT username FROM NSusers WHERE userid='$rowuserid'";
			$result2 = mysql_query($query1);
			$poster = mysql_fetch_assoc($result2); 
			$poster = $poster['username'];
			$content = html_entity_decode($result['content']);
			echo "	<div title=\"[".$poster."] ".$result['posttime']."\" class=\"thought\" thoughtid=\"",$reslut['thoughtid'],"\" name=\"",$result['thoughtid'],"\" style=\"position:relative;float: left; margin: 3px; width: 100px; height: 100px; border-style: ",$row['borderstyle'],"; border-color:",$result['bordercolor'],";background: ",$result['backgroundcolor'],";\" onclick=\"goToProfile('",$poster,"')\">",$content,"</div>
";
			?>
			<div style="float:left;width:280px;margin-left:50px;">
				<form style="" name="comment" action="comment.php" method="post">
				<input type="hidden" name="thoughtid" value="<? echo $thoughtid; ?>">
				<textarea name="content" cols="30" rows="8" style="font-family:Verdana, Arial, Helvetica;"></textarea>
				<input type="submit" value="Post Comment">
				</form>
			</div>
		</div>
		<?
		print_comments($thoughtid);
		?>
	</div>
</div>
</body>
</html>