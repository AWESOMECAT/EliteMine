<?PHP
function db_connect(){
//Database Information

$dbhost = 'localhost';
$dbname = 'dsfarge1_em';
$dbuser = 'dsfarge1_dsfarge';
$dbpass = 'neurophage';

//Connect to database

mysql_connect ( $dbhost, $dbuser, $dbpass)or die("Could not connect: ".mysql_error());
mysql_select_db($dbname) or die(mysql_error());
}

function print_comments($thought){
db_connect();
$comment_query="SELECT * FROM comments WHERE thoughtid='$thought' ORDER BY commentid DESC";
$comments = mysql_query($comment_query);
while ($row = mysql_fetch_assoc($comments)){
	echo mysql_error($row);
	$rowuserid = $row['userid'];
	$query1 = "SELECT username FROM NSusers WHERE userid='$rowuserid'";
	$result2 = mysql_query($query1);
	$poster = mysql_fetch_assoc($result2); 
	$poster = $poster['username'];
	$comment = html_entity_decode($row['comment']);
	echo "	<div commentid=\"".$row['commentid']."\" style=\"min-width:100px;width:450px;margin-top:10px;\">
		&nbsp;&nbsp;<div style=\"border-bottom:#000000 solid 1px;\">&nbsp;<img src=\"/images/avatar.gif\">&nbsp;&nbsp;".$poster."&nbsp;&nbsp;&nbsp;".$row['posttime']."</div>
		<div style=\"margin-left:15px;\">".$comment."
		</div>
	</div>
";
}
}

function print_thoughts($all, $user, $page){
db_connect();
if($page != null){
$thoughts = 'LIMIT 60';
}
if($all == true){
$thought_query = "SELECT * FROM thoughts ORDER BY thoughtid DESC $thoughts";
} else if($all == false){
$userid_query = "SELECT userid FROM NSusers WHERE username='$user' $thoughts";
$userid = mysql_query($userid_query);
$userid = mysql_fetch_assoc($userid);
$userid = $userid['userid'];

$thought_query = "SELECT * FROM thoughts WHERE userid='$userid' ORDER BY thoughtid DESC";
}

$result = mysql_query($thought_query);


while ($row = mysql_fetch_array($result)) {
	$rowuserid = $row['userid'];
	$query1 = "SELECT username FROM NSusers WHERE userid='$rowuserid'";
	$result2 = mysql_query($query1);
	$poster = mysql_fetch_assoc($result2); 
	$poster = $poster['username'];
	
	$content = html_entity_decode($row['content']);
	if($all == true){
	echo "	<div title=\"[".$poster."] ".$row['posttime']." Comments: ".$row['comments']."\" class=\"thought\" thoughtid=\"",$row['thoughtid'],"\" name=\"",$row['thoughtid'],"\" style=\"position:relative;float: left; margin: 3px; width: 100px; height: 100px; border-style: ",$row['borderstyle'],"; border-color:",$row['bordercolor'],"; background: ",$row['backgroundcolor'],";\" onclick=\"goToThought('",$row['thoughtid'],"')\">",$content,"</div>
";
} else {
	echo "	<div title=\"[".$poster."] ".$row['posttime']." Comments: ".$row['comments']."\" class=\"thought\" thoughtid=\"",$row['thoughtid'],"\" name=\"",$row['thoughtid'],"\" style=\"position:relative;float: left; margin: 3px; width: 100px; height: 100px; border-style: ",$row['borderstyle'],"; border-color:",$row['bordercolor'],"; background: ",$row['backgroundcolor'],";\" onclick=\"goToThought('",$row['thoughtid'],"')\">",$content,"</div>
";
}
}
}
/*
function print_thought($number){
$thought_query = "SELECT * FROM thoughts WHERE thoughtid='$number'";
$result = mysql_query($thought_query);
$result = mysql_fetch_assoc($result);
$rowuserid = $result['userid'];
$query1 = "SELECT username FROM NSusers WHERE userid='$rowuserid'";
$result2 = mysql_query($query1);
$poster = mysql_fetch_assoc($result2); 
$poster = $poster['username'];
$content = html_entity_decode($result['content']);

echo "	<div title=\"[".$poster."] ".$result['posttime']."\" class=\"thought\" thoughtid=\"",$reslut['thoughtid'],"\" name=\"",$result['thoughtid'],"\" style=\"position:relative;float: left; margin: 3px; width: 100px; height: 100px; border-style: ",$row['borderstyle'],"; border-color:",$result['bordercolor'],"; background: ",$result['backgroundcolor'],";\" onclick=\"goToProfile('",$poster,"')\">",$content,"</div>";
}
*/
?>