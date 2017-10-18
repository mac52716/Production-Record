<?php
session_start();	
if(!empty($_SESSION['errMsg'])) {
	echo "<script type='text/javascript'> function errorpw(){ alert ('Invalid password! Please try again.'); }</script>";
	echo "<script type='text/javascript'>errorpw()</script>";
} 
?>
<?php unset($_SESSION['errMsg']);?>
<!DOCTYPE html>
<html>
    <head>
		<!--Programmer: Victor Nacino-->
		<meta http-equiv="X-UA-Compatible" content="IE=Edge;">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="jquery.min.js"></script>
        <link rel="stylesheet" href="style.css">
        <title>TESTING PRODUCTION RECORD</title>
    </head>
    
	<div class="navigationbar">
	<div class="navibutton">
	<button class="mybutton" onclick="location.href='http://10.153.214.200:81/Default.aspx'">PROMIS</button>
	<button class="mybutton" onclick="location.href='/psir/index.php'">PSIR</button>
	<button class="mybutton" onclick="location.href='/gonogo/index.php'">GONOGO</button>
	<button class="mybutton" onclick="location.href='search.php'">SEARCH</button>
	</div>
	</div>
	<body>
	<div class="maincontent">

				<div class="logincontainer">
			<form id="formsubmit" action="authentication.php" method="post">
				<table  style='border: none;'>
				<caption><h2>Log in</h2></caption>
				<tr>
					<td  style='border: none;'>Username :</td>
					<td  style='border: none;'><input type="text" list="users" name='username' value="<?php if(!empty($_SESSION['login_user'])) {echo $_SESSION['login_user'];} ?>"/><datalist id="users"><?php include('names.php'); ?></datalist></td>
				</tr>
				<tr>
					<td  style='border: none;'>Password :</td>
					<td  style='border: none;'><input type='password' name='password' required /></td>
				</tr>
				<tr>
					<td colspan='2' style='border: none;'><input style="width: 70px;" type='submit' name='login' value='Log in' /></td>
				</tr>
				</table>
			</form>
			</div>
		<div id="loginfooter"><p style="text-align: center; color: white; padding: 15px;">&#9400; TEST APPLICATIONS ENGG.</p></div>
		</div>
    </body>
</html>