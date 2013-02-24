<?PHP
include('include.php');
db_connect();
$requestquery = 'SELECT * FROM requests';
$requests = mysql_query('SELECT * FROM requests');
echo mysql_error();
if (!$requests) {
die('Invalid query: ' . mysql_error());
}
while ($row = mysql_fetch_array($requests)){
echo $row['username']."<br>";
}
?>