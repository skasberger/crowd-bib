<?php
session_start();
include 'config.php';

if($_SESSION["login"]){
	createBibTeXFile($list, $table_name);
	$_SESSION["changesMade"] = true;
	header( 'Location: moderation.php' ) ;
}
else{
	header( 'Location: login.php' ) ;
}

function createBibTeXFile($list, $table_name){
	$query = "select * FROM $table_name WHERE list = '$list' AND approved = 'true'";

	$result = mysql_query($query) or die (mysql_error());
	$targetfile = $docroot.$list.".bib";
	echo $targetfile;
	$f = fopen($targetfile, "w") or die ("cannot open file");
	while ($row = mysql_fetch_object($result)){
		fwrite($f,"@".$row->pubtype."{ ".$row->pubkey.",\n");
		fwrite($f,"peerreview = \"".$row->peer."\",\n");
		fwrite($f,"openaccess = \"".$row->openaccess."\",\n");
		fwrite($f,"firstauthor = \"".$row->first_author."\",\n");
		fwrite($f,"title = \"".$row->title."\",\n");
		fwrite($f,"author = \"".$row->author."\",\n");
		fwrite($f,"year = \"".$row->year."\",\n");
		fwrite($f,"url = \"".$row->url."\",\n");
		if($row->journal != ""){
			fwrite($f,"journal = \"".$row->journal."\",\n");
		}
		if($row->volume != ""){
			fwrite($f,"volume = \"".$row->volume."\",\n");
		}
		if($row->pages != ""){
			fwrite($f,"pages = \"".$row->pages."\",\n");
		}
		if($row->editors != ""){
			fwrite($f,"editors = \"".$row->editors."\",\n");
		}
		if($row->book_title != ""){
			fwrite($f,"booktitle = \"".$row->book_title."\",\n");
		}
		if($row->address != ""){
			fwrite($f,"address = \"".$row->address."\",\n");
		}
		if($row->school != ""){
			fwrite($f,"school = \"".$row->school."\",\n");
		}
		if($row->institution != ""){
			fwrite($f,"institution = \"".$row->institution."\",\n");
		}
		if($row->organization != ""){
			fwrite($f,"organization = \"".$row->organization."\",\n");
		}
		if($row->month != ""){
			fwrite($f,"month = \"".$row->month."\",\n");
		}
		if($row->publisher != ""){
			fwrite($f,"publisher = \"".$row->publisher."\",\n");
		}
		if($row->note != ""){
			fwrite($f,"note = \"".$row->note."\",\n");
		}
		fwrite($f, "}\n\n");
	}
	fclose($f);
}
/*
function createRSSFeed($list, $target){
	include 'config.php';
	$query = "select * FROM biblioEntries WHERE list = '$list' AND approved = 'true'";
	$result = mysql_query($query) or die (mysql_error());
	$targetfile = "/home/dylan/public_html/dylanfield.com/public/msr/biblio/".$target.".rss";
	$f = fopen($targetfile, "w") or die ("cannot open file");
	while ($row = mysql_fetch_object($result)){
		fwrite($f, "testing...");
	}
	
}*/

?>