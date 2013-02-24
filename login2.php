<html>
<head>
<?PHP
include_once('navbar.php');
if(isset($_COOKIE['user'])){
header('Location: /EliteMine/');
}
?>
<title>DSFARGEG - Account Login</title>
<link rel="stylesheet" type="text/css" media="screen" href="main.css" >
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
</head>
<body>
<center>
<?PHP 
$message = $_GET['message'];
if($message == "new"){
echo "You have registered and may now log in.";
}
?>
<form name="login" method="post" action="login.php">
<table border="0" width="225" align="center">
    <tr>
        <td width="219">
            <p align="center"><b><img src="/images/login.png"></b></p>
        </td>
    </tr>
    <tr>
        <td width="219">
            <table border="0" width="220" align="center">
                <tr>
                    <td width="71"><span style="font-size:10pt;">Email:</span></td>
                    <td width="139"><input type="text" name="email" class="text"></td>
                </tr>
                <tr>
                    <td width="71"><span style="font-size:10pt;">Password:</span></td>
                    <td width="139"><input type="password" name="password" class="text"></td>
                </tr>
                <tr>
                    <td width="71">&nbsp;</td>
                        <td width="139">
                            <p align="right"><input type="submit" name="submit" value="Submit" class="submit"></p>
                        </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td width="250"><center>Not&nbsp;Registered?&nbsp;<a href="registration2.php" target="_self"><font color="#14221A">Register&nbsp;Here!</font></a><center></center></td>
    </tr>
</table>
</form>
</center>
</body>
</html>