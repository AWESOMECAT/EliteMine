<html>
<head>
<?PHP
include_once('navbar.php');
if(isset($_COOKIE['user'])){
header('Location: /EliteMine/');
}
?>
<?php include_once('navbar.php');?>
<title>NovusSententiae - Account Registration</title>
<script language="JavaScript" src="gen_validatorv31.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" media="screen" href="/NovusSententiae/main.css" />
<link rel="shortcut icon" href="/NovusSententiae/favicon.ico" type="image/x-icon" />
<script language="JavaScript" type="text/javascript">
<!--
// Author: Carey Walker (carey.walker@citicorp.com)
function checkPw(form) {
pw1 = document.register.pass1.value;
pw2 = document.register.pass2.value;

if (pw1 != pw2)
{
alert ("You did not enter the same password twice. Please re-enter your password.")
return false;
}
else return true;
}
//-->
</script>
</head>
<body>
<center>
<form name="register" method="post" action="registration.php" onSubmit="return checkPw(this)">
<table border="0" width="225" align="center">
    <tr>
        <td width="219" >
            <center><img src="/images/register.png"></center>
        </td>
    </tr>
    <tr>
        <td width="219">
            <table border="0" width="400" align="center">
            		<tr>
                        <td width="116"><span style="font-size:10pt;">Name:</span></td>
                        <td width="156"><input type="text" name="name" maxlength="100" class="text"></td>
                    </tr>
                    <tr>
                        <td width="116"><span style="font-size:10pt;">Email:</span></td>
                        <td width="156"><input type="text" name="email" maxlength="100" class="text"></td>
                    </tr>
                <tr>
                    <td width="116"><span style="font-size:10pt;">Username:</span></td>
                    <td width="156"><input type="text" name="user" class="text"></td>
                </tr>
                <tr>
                    <td width="116"><span style="font-size:10pt;">Password:</span></td>
                    <td width="156"><input type="password" name="pass1" class="text"></td>
                </tr>
	            <!-- 
	            <tr>
                	<td width="116"><span style="font-size:10pt;">Notemine Username:</span></td>
                	<td width="156"><input type="text" name="nmuser" class="text"></td>
                </tr>
                
                <tr>
                	<td colspan="2" style="color:#FF0000;text-align:justify;">To apply for EliteMine membership, please post a thought on your Notemine stream which reads "EliteMine Membership Request" and comment it with "@EliteMine" to verify ownership of the Notemine stream you provided.</td>
                </tr>
                -->
	            <tr>
                    <td width="116">&nbsp;</td>
                    <td width="156"><p align="right"><input type="submit" value="Submit"></p></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</form>
<script language="JavaScript" type="text/javascript">
var frmvalidator = new Validator("register");
//frmvalidator.addValidation("doCustomValidation");
frmvalidator.addValidation("name","req","Please enter your full name.");

frmvalidator.addValidation("email","req","Please enter your email.");
frmvalidator.addValidation("email","email");

frmvalidator.addValidation("user","max=20","Your selected username is too long.");
frmvalidator.addValidation("user","req","Please enter a username.");

frmvalidator.addValidation("pass","min=6","Your password must be at least 6 characters long.");
frmvalidator.addValidation("pass","req","Please enter a password.");

</script>
</center>
</body>
</html>