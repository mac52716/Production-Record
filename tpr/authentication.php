<?php
session_start();
include('dbcon.php');

		 if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			// username and password sent from form
			$username=mysqli_real_escape_string($conn,$_POST['username']);
			$password=mysqli_real_escape_string($conn,MD5($_POST['password']));
			$selectsql="SELECT * FROM users WHERE Email_Address='$username' and Password='$password'";

			$result=mysqli_query($conn,$selectsql);

			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

			//$active=$row['active'];

			$count=mysqli_num_rows($result);
			$_SESSION['login_user']=$username;
			// If result matched $username and $password, table row must be 1 row
			if($count>0)
			{
				header("location: home.php");
				exit;
			}else{
					$_SESSION['errMsg'] = "*Invalid password! Please try again.*";
					//echo "<script type='text/javascript'> function errorpw(){ alert ('asdf'); }</script>";
					header("Location: index.php"); //Redirect user back to your login form
					exit;
				}
		}
?>