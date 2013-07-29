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
		}
		echo "<html>\n<head>\n<link type=\"text/css\" rel=\"stylesheet\" href=\"moderation.css\"></style>\n<script type=\"text/javascript\" src=\"moderation.js\"></script>\n<title>Moderation</title>\n</head>\n<body>\n";
		echo "<div id=\"sidebar\">\n";
		echo "You are logged in as ".$_SESSION["login"]."... (<a href=\"logout.php\"><i>logout</i></a>)<br><br>\n";
		echo "(<a href=\"moderation.php\"><i>view unprocessed entries</i></a>)<br>\n";
		echo "(<a href=\"moderation.php?view=approved\"><i>view approved entries</i></a>)<br>\n";
		echo "(<a href=\"moderation.php?view=denied\"><i>view denied entries</i></a>)<br>\n";
		echo "<br><br><br><a href=\"generate.php\" onclick=\"return confirmation()\"><b>Push Changes to bibTeX File</b></a>";
		echo "</div>\n";
		echo "<div id=\"main\">\n";
		echo "<h1><u>Edit Entry</u></h1>\n";
		echo "<form action=\"update.php\" method=\"post\">\n";
		echo "<input type=\"hidden\" name=\"originalkey\" value=\"$key\">\n";
		echo "Peer:<br> <input type=\"text\" name=\"peer\" value=\"$peer\"><br>\n";
		echo "First Author:<br> <input type=\"text\" name=\"firstauthor\" value=\"$firstauthor\"><br>\n";
		echo "Author:<br> <input type=\"text\" name=\"author\" value=\"$author\"><br>\n";
		echo "Pubtype:<br> <input type=\"text\" name=\"pubtype\" value=\"$pubtype\"><br>\n";
		echo "Key<br> <input type=\"text\" name=\"pubkey\" value=\"$key\"><br>\n";
		echo "Email<br> <input type=\"text\" name=\"email\" value=\"$email\"><br>\n";
		echo "List<br> <input type=\"text\" name=\"list\" value=\"$list\"><br>\n";
		echo "Title<br> <input type=\"text\" name=\"title\" value=\"$title\"><br>\n";
		echo "Year<br> <input type=\"text\" name=\"year\" value=\"$year\"><br>\n";
		echo "URL<br> <input type=\"text\" name=\"url\" value=\"$url\"><br>\n";
		echo "Journal<br> <input type=\"text\" name=\"journal\" value=\"$journal\"><br>\n";
		echo "Volume<br> <input type=\"text\" name=\"volume\" value=\"$volume\"><br>\n";
		echo "Pages<br> <input type=\"text\" name=\"pages\" value=\"$pages\"><br>\n";
		echo "Editors<br> <input type=\"text\" name=\"editors\" value=\"$editors\"><br>\n";
		echo "Booktitle<br> <input type=\"text\" name=\"booktitle\" value=\"$booktitle\"><br>\n";
		echo "Address<br> <input type=\"text\" name=\"address\" value=\"$address\"><br>\n";
		echo "School<br> <input type=\"text\" name=\"school\" value=\"$school\"><br>\n";
		echo "Institution<br> <input type=\"text\" name=\"institution\" value=\"$institution\"><br>\n";
		echo "Organization<br> <input type=\"text\" name=\"organization\" value=\"$organization\"><br>\n";
		echo "Month<br> <input type=\"text\" name=\"month\" value=\"$month\"><br>\n";
		echo "Publisher<br> <input type=\"text\" name=\"publisher\" value=\"$publisher\"><br>\n";
		echo "Note<br> <input type=\"text\" name=\"note\" value=\"$note\"><br>\n";
		echo "<br><input type=\"submit\" value=\"update\"></form>\n</div>\n</body>\n</html>";
	}
	else{
		header( 'Location: moderation.php' ) ;
	}
}
else{
	header( 'Location: login.php' ) ;
}
?>