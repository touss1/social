
<html>
<head>
<title>Login</title>
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
<div class="topleft"><img src="img/logo.png" width="200" height="60" /></div>
</div>
<div class="bi">
</div>  
<div class="font">
<div class="right">
<form action="login.php" method="post">

<small style="color:#FF0000;margin:2px;">The login has failed,please re enter your username and password</small>
<hr>
<table>
<tr>
<td>Username:</td><td><input type="text" name="UserName" id = "UserName" class="textright" value="" required/></td>
</tr>
<tr>
<td>Password:</td><td><input type="password" name="Password" class="textright" value="" required/></td>
</tr>
<tr>
<td></td><td><input type="submit" class="greenButton" name="OK" value="Login"/><a href="index.php" class="t"> or sign up for netLinked</a> </td>
</tr>

 </table>
</form>
</div>
</div>

  <script>
     var usernameinput = document.getElementById("UserName");
	 usernameinput.focus();
	
  </script>
</body>
</html>
 