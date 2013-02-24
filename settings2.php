<?PHP
include('include.php');
include('bbcode.php');
db_connect();
$width = $_POST['width'];
$username = $_COOKIE['user'];
$location = strip_tags($_POST['location']);
$about = htmlentities(bbcode_format(strip_tags($_POST['about'])));
$about1 = strip_tags($_POST['about']);
$query = "UPDATE NSusers SET width='$width', location=\"$location\", about=\"$about\", about1=\"$about1\" WHERE username='$username'";
mysql_query($query);
header('Location: /EliteMine/settings.php?message=updated');
?>