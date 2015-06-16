<?php include("connect.php") ;?>

 <?php
    
	
   if(isset($_POST['email'])){
    
	 $email = mysql_real_escape_string($_POST['email']);
     $query = mysql_query("SELECT * FROM members WHERE Url = '$email'");
	 
	 if(mysql_num_rows($query)==0){
	     $error = "the email [".$email."] is not associated to any account";
	  }
	 else{
	     
	     /*$res = mysql_fetch_object($query);
		 $email = $res->Url;*/
		 $newpass = md5("SLAU".rand());
		 
		 $query = mysql_query("UPDATE members SET Password ='$newpass' WHERE UserName = '$email '");
		 $subject = "SLAU CONNECT-password recovery";
	     $message = "Dear slau connect user,your password is now [ ".$newpass." ] you can change it when you want.Thank you.";
		 
		 $sendmail = mail($email,$subject,$message,"From:info@slauConnect.com");
		 if($sendmail){
		     $msg = "Hello , Your password has been reset.An email has been sent to ".$res->Url."";
		    }
		 else{
		    $error = "Oups ,The email could not be sent to  ".$res->Url.".Please Try again later";
		 }	
	    } 
   }
  
?>


<html>
<head>
<title>Password recovery</title>
</head>
<style type="text/css">
<!--
body {
	background-image: url(bg/bg3.jpg);
	background-repeat:repeat-x;
	background-color:#d9deeb;

}
-->
</style>
<link href="errorlogin.css" rel="stylesheet" type="text/css" />

<body>
<div class="mainr">
<div class="lefttop1" > <div class="lefttopleft"><a href="img/slaulogo.jpg" rel="facebox"><img src="img/slaulogo.jpg" width="150" height="100"  style="margin:10px 0 10px 0;border:1px solid #ccc;padding:1px;position:relative" /></a></div></div>
</div>
<div class="bi">
</div>  
<div class="font">
<div class="right">
<form action="" method="post">

<small style="color:#FF0000;margin:2px;">&nbsp;<?php if(isset($error)) {echo $error ;}?></small>
<hr>
<table>
<tr>
Please enter the email address you used when you created your slau connect account.
<h2></h2>
<td>Email:</td><td><input type="email" name="email" class="textright" value="" required/></td>
</tr>
<tr>

</tr>
<tr>
<td></td><td><input type="submit" class="greenButton" name="OK" value="Reset my password"/><a href="index.php" class="t"> Remembered? Login now.</a> </td>
</tr>

 </table>
</form>
</div>
</div>
</body>
</html>
 