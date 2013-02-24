<?PHP
include('bbcode.php');
include('include.php');
db_connect();
$userid = $_COOKIE['userid'];
//echo $userid;
$posttime = date('M j, Y g:i a', time()-(8*60*60));
$comment = htmlentities(bbcode_format(strip_tags($_POST['content'], '<br><3>')));
$thoughtid = $_POST['thoughtid'];
$comment_query = "INSERT INTO comments (userid, posttime, thoughtid, comment)VALUES('$userid', '$posttime', '$thoughtid', '$comment')";
//echo $comment_query;
mysql_query($comment_query);
$update_query = "SELECT comments FROM thoughts WHERE thoughtid='$thoughtid'";
$result = mysql_query($update_query);
$result = mysql_fetch_assoc($result);
$comments = $result['comments'];
$comments += 1;
//echo $comments;
$add_query = "UPDATE thoughts SET comments='$comments' WHERE thoughtid='$thoughtid'";
mysql_query($add_query);
$ip=@$REMOTE_ADDR;
$posttime = date('M j, Y g:i a', time()-(8*60*60));
$query = "INSERT INTO sitelog (userid, event, eventtime)VALUES('$userid', 'User commented on Thought# $thoughtid with IP $ip', '$posttime')";
mysql_query($query) or die(mysql_error());
header('Location:/EliteMine/thought.php?id='.$thoughtid);
?>