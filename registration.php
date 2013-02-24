<?php
//Database Information

$dbhost = 'localhost';
$dbname = 'dsfarge1_em';
$dbuser = 'dsfarge1_dsfarge';
$dbpass = 'neurophage';

//Connect to database

mysql_connect ( $dbhost, $dbuser, $dbpass)or die("Could not connect: ".mysql_error());
mysql_select_db($dbname) or die(mysql_error());

$name = htmlentities(strip_tags($_POST['name']));
$email = htmlentities(strip_tags($_POST['email']));    
$username = htmlentities(strip_tags($_POST['user']));
$nmusername = htmlentities(strip_tags($_POST['nmuser']));
$password = md5(htmlentities($_POST['pass1']));
$requesttime = date('M j, Y g:i a', time()-(8*60*60));


$checkuser = mysql_query("SELECT username FROM NSusers WHERE username='$username'");

$username_exist = mysql_num_rows($checkuser);

if($username_exist > 0){
    header('Location: /EliteMine/registration2.php');
}


$query = "INSERT INTO NSusers (name, email, username, password)VALUES('$name', '$email', '$username', '$password')";
mysql_query($query) or die(mysql_error());
mysql_close();

header('Location: /EliteMine/login2.php?message=new');

/*
$yoursite = 'beastchan.freehostia.com';
$webmaster = 'DSFARGEG';
$youremail = 'Mr.hotwaffles@gmail.com';

$subject = "You have successfully registered at $yoursite...";
$message = "Dear $name, you are now registered at our web site.  
    To login, simply go to our web page and enter in the following details in the login form:
    Username: $username
    Password: $password
    
    Please print this information out and store it for future reference.
    
    Thanks,
    $webmaster";
    
mail($email, $subject, $message, "From: $yoursite <$youremail>\nX-Mailer:PHP/" . phpversion());

echo "Your information has been mailed to your email address.";
*/

?>