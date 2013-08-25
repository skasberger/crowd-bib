<?php

session_start();
if($_SESSION["login"]){
	if($_GET["key"]){
		$key = $_GET["key"];
		
		include 'config.php';
		
		$query = "DELETE FROM $table_name WHERE pubkey = '$key'";
		$result = mysql_query($query) or die (mysql_error());
		header( 'Location: moderation.php' );
	}
	else{
		header( 'Location: moderation.php' );
	}
}
else{
	header( 'Location: login.php' ) ;
}
?>