<?php

session_start();
include 'config.php';		

if($_SESSION["login"]){
	if($_GET["key"]){
		$key = $_GET["key"];
		
		$query = "SELECT * FROM $table_name WHERE pubkey = '$key'";
		$result = mysql_query($query) or die (mysql_error());
		while ($row = mysql_fetch_object($result)){
			$peer = $row->peer;
			$firstauthor = $row->first_author;
			$author = $row->author;
			$pubtype = $row->pubtype;
			$email = $row->email;
			$list = $row->list;
			$title = $row->title;
			$year = $row->year;
			$url = $row->url;
			$journal = $row->journal;
			$volume = $row->volume;
			$pages = $row->pages;
			$editors = $row->editors;
			$booktitle = $row->book_title;
			$address = $row->address;
			$school = $row->school;
			$institution = $row->institution;
			$organization = $row->organization;
			$month = $row->month;
			$publisher = $row->publisher;
			$note = $row->note;
		} ?>
		<!DOCTYPE html>
		<html>
		<head>
			<link type="text/css" rel="stylesheet" href="style.css"></link>
			<script type="text/javascript" src="moderation.js"></script>
			<title>Moderation</title>
		</head>
		<body>
			<div id="sidebar">
				You are logged in as <?php echo .$_SESSION["login"]; ?>... (<a href="logout.php"><i>logout</i></a>)<br><br>
				(<a href="moderation.php"><i>view unprocessed entries</i></a>)<br>
				(<a href="moderation.php?view=approved"><i>view approved entries</i></a>)<br>
				(<a href="moderation.php?view=denied"><i>view denied entries</i></a>)<br>
				<br><br><br>
				<a href="generate.php" onclick="return confirmation()"><b>Push Changes to bibTeX File</b></a>
			</div>
			<div id="main">
				<h1>Edit Entry</h1>
				<form action="update.php" method="post">
					<input type="hidden" name="originalkey" value="<?php echo $key; ?>">
					Peer:<br> 
					<input type="text" name="peer" value="$peer"><br>
					First Author:<br> 
					<input type="text" name="firstauthor" value="<?php echo $firstauthor; ?>"><br>
					Author:<br> 
					<input type="text" name="author" value="<?php echo $author; ?>"><br>
					Pubtype:<br>
					<input type="text" name="pubtype" value="<?php echo $pubtype; ?>"><br>
					Key<br> 
					<input type="text" name="pubkey" value="$key"><br>
					Email<br> <input type="text" name="email" value="<?php echo $email; ?>"><br>
					List<br> <input type="text" name="list" value="<?php echo $list; ?>"><br>
					Title<br> <input type="text" name="title" value="<?php echo $title; ?>"><br>
					Year<br> <input type="text" name="year" value="<?php echo $year; ?>"><br>
					URL<br> <input type="text" name="url" value="<?php echo $url; ?>"><br>
					Journal<br> <input type="text" name="journal" value="<?php echo $journal; ?>"><br>
					Volume<br> <input type="text" name="volume" value="<?php echo $volume; ?>"><br>
					Pages<br> <input type="text" name="pages" value="<?php echo $pages; ?>"><br>
					Editors<br> <input type="text" name="editors" value="<?php echo $editors; ?>"><br>
					Booktitle<br> <input type="text" name="booktitle" value="<?php echo $booktitle; ?>"><br>
					Address<br> <input type="text" name="address" value="<?php echo $address; ?>"><br>
					School<br> <input type="text" name="school" value="<?php echo $school; ?>"><br>
					Institution<br> <input type="text" name="institution" value="<?php echo $institution; ?>"><br>
					Organization<br> <input type="text" name="organization" value="<?php echo $organization; ?>"><br>
					Month<br> <input type="text" name="month" value="<?php echo $month; ?>"><br>
					Publisher<br> <input type="text" name="publisher" value="<?php echo $publisher; ?>"><br>
					Note<br> <input type="text" name="note" value="<?php echo $note; ?>"><br><br>
					<input type="submit" value="update">
				</form>
			</div>
		</body>
		</html>
	}
	else{
		header( 'Location: moderation.php' ) ;
	}
}
else{
	header( 'Location: login.php' ) ;
}
?>