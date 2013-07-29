<?php
session_start();
include 'config-user.php';

if($_SESSION["login"]){
	header( 'Location: moderation.php' );	
}
if($_POST["login"] && $_POST["password"]){
	if($_POST["login"] == $user_name && md5($_POST["password"]) == md5($user_password_md5)) {
			$_SESSION["login"] = $user_name;
			header( 'Location: moderation.php' ) ;
			}
		else{ ?>
			<html>
			<head>
				<title>Login Error - Try Again</title>
			</head>
			<body>
				There was an error.  Please try again.
				<form action="login.php" method="post">
					Login:
					<input type="text" name="login" /><br />
					Password:
					<input type="password" name="password" /><br />
					<input type="submit" value="login">
				</form>
			</body>
			</html>
		<?php }
}
else{ ?>
	<html>
	<head>
		<title>Login</title>
	</head>
	<body>
		<form action="login.php" method="post">
			Login:
			<input type="text" name="login" /><br />
			Password:
			<input type="password" name="password" /><br />
			<input type="submit" value="login">
		</form>
	</body>
	</html>
<?php }
?>