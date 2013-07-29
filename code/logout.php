<?php
session_start();
if($_SESSION["login"]){
	session_destroy();
	header( 'Location: login.php' ) ;
}
?>