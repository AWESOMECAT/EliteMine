<html>
<head>
<link rel="shortcut icon" href="/EliteMine/favicon.ico" />
<script type="text/javascript">
function goToProfile(user) {
window.location = "/EliteMine/profile.php?user=" + user;
}
function editTemplate(template) {
window.location = "/EliteMine/edittemplate.php?id=" + template;
}
function goToThought(thought) {
window.location = "/EliteMine/thought.php?id=" + thought;
}
</script>
<script type="text/javascript">
function mouseOver1()
{
document.b1.src ="/images/thoughts.png";
}
function mouseOut1()
{
document.b1.src ="/images/thoughts.png";
}
function mouseOver2()
{
document.b2.src ="/images/templates.png";
}
function mouseOut2()
{
document.b2.src ="/images/templates.png";
}
function mouseOver3()
{
document.b3.src ="/images/login.png";
}
function mouseOut3()
{
document.b3.src ="/images/login.png";
}
function mouseOver4()
{
document.b4.src ="/images/post.png";
}
function mouseOut4()
{
document.b4.src ="/images/post.png";
}
</script>
<link rel="stylesheet" type="text/css" media="screen" href="main.css" >
</head>
<body style="font: 8pt;" onload="timedCount()">
<div style="height:80px;background: url('/images/repeat.png'); background-repeat: repeat-x; width:100%;display:block;">
<div style="padding-top:8px;">
<?PHP
//include_once('banned.php');
$userlevel = $_COOKIE['userlevel'];

if($userlevel >= 1){
echo "<a style=\"margin-left: 100px;\" href=\"/EliteMine/\"><img src=\"/images/elitegold.png\"></a>";
} else {
echo "<a style=\"margin-left: 100px;\" href=\"/EliteMine/\"><img src=\"/images/elitebanner.png\"></a>";
}
?>
<a href="<?PHP echo "profile.php?user=" . $_COOKIE['user'] ?>" style="text-decoration: none;">
<img src="/images/thoughts.png" name="b1" onmouseover="mouseOver1()" onmouseout="mouseOut1()"></a>
<a href="templates.php" style="text-decoration: none;">
<img src="/images/templates.png" name="b2" onmouseover="mouseOver2()" onmouseout="mouseOut2()"></a>
<?PHP
include('include.php');
if(isset($_COOKIE['user'])){
db_connect();
$username = $_COOKIE['user'];

$query = "SELECT lastpost FROM NSusers WHERE username='$username'";
$result = mysql_query($query);
$array = mysql_fetch_assoc($result);
$lastpost = $array['lastpost'];
$posttime = $lastpost + (5 * 60);
$date = date('n/j/Y g:i A', $posttime);
$endtime = $date;
$timeleft = ($posttime - time())/60;
$minutes = floor($timeleft);
$seconds = ($timeleft - floor($timeleft))*60;
?>
<script type="text/javascript">
var post = "<a href=\"forge.php\">";
post += "<img src=\"/images/post.png\" name=\"b4\" onmouseover=\"mouseOver4()\" onmouseout=\"mouseOut4()\"></a>";
var s= Math.ceil(<?PHP echo $seconds;?>);
var m= <?PHP echo $minutes;?>;
function timedCount()
{
document.getElementById("timer").innerHTML = m + " Minutes ";
document.getElementById("timer").innerHTML += s + " Seconds";
s-=1;
if(s < 0)
{
s = 59;
m -= 1;
}
if(m < 0)
{
document.getElementById("timer").innerHTML = post;
return;
}
setTimeout('timedCount()',1000);
}
document.onLoad(timedCount());
</script>
<?PHP

if($lastpost + (30 * 60) <= time()){
echo "<a href=\"/EliteMine/forge.php\">
<img src=\"/images/post.png\" name=\"b4\" onmouseover=\"mouseOver4()\" onmouseout=\"mouseOut4()\"></a>";
} else {
echo "<a href=\"#\" style=\"color:#0c1f14;text-decoration:none;padding-bottom:13px;\" id=\"timer\"></a>";
}
} else {
echo "<a href=\"login2.php\">
<img src=\"/images/login.png\" name=\"b3\" onmouseover=\"mouseOver3()\" onmouseout=\"mouseOut3()\"></a><a href=\"registration2.php\" style=\"text-decoration: none;\">
<img src=\"/images/register.png\"></a>";
}

?>
</div>
</div>
<?PHP

if (isset ($_COOKIE['user'])){
	echo "<div style=\"padding-right: 10px;padding-bottom: 4px;;padding-top: 4px;text-align: right;\">Logged in as: <a href=\"profile.php?user=" . $_COOKIE['user'] . "\">" . $_COOKIE['user'] . "</a> | <a href=\"logout.php\">Logout</a></div>";
}

?>

<div><div style="width:600px;height:20px;background: url('/images/divider.png');margin:0px auto;"></div></div>
<br>