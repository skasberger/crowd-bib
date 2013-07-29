<?php
session_start();
if($_SESSION["login"]){
	if($_POST["originalkey"]){
		$peer = $_POST["peer"];
		$firstauthor = $_POST["firstauthor"];
		$author = $_POST["author"];
		$originalkey = $_POST["originalkey"];
		$pubkey = $_POST["pubkey"];
		$pubtype = $_POST["pubtype"];
		$email = $_POST["email"];
		$list = $_POST["list"];
		$title = $_POST["title"];
		$year = $_POST["year"];
		$url = $_POST["url"];
		$journal = $_POST["journal"];
		$volume = $_POST["volume"];
		$pages = $_POST["pages"];
		$editors = $_POST["editors"];
		$booktitle = $_POST["booktitle"];
		$address = $_POST["address"];
		$school = $_POST["school"];
		$institution = $_POST["institution"];
		$organization = $_POST["organization"];
		$month = $_POST["month"];
		$publisher = $_POST["publisher"];
		$note = $_POST["note"];
		
		include 'config.php';
		
		$query = "UPDATE $table_name SET pubtype = '$pubtype', email='$email', list = '$list', pubkey = '$pubkey', title = '$title', author = '$author', first_author='$firstauthor', year = '$year', url = '$url', journal = '$journal', volume = '$volume', pages = '$pages', editors = '$editors', book_title = '$booktitle', address = '$address', school = '$school', institution = '$institution', organization = '$organization', month = '$month', publisher = '$publisher', note = '$note' WHERE pubkey = '$originalkey'";
		$result = mysql_query($query) or die (mysql_error());
		header( 'Location: moderation.php' ) ;
	}
	else{
		header( 'Location: moderation.php' ) ;
	}
}
else{
	header( 'Location: login.php' ) ;
}
?>