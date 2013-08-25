<?php
session_start();
include 'config.php';

if($_SESSION["login"]){
	if($_GET["view"] == "approved"){
		$query = "SELECT * FROM $table_name WHERE approved = 'true'";
	}
	else if($_GET["view"] == "denied"){
		$query = "SELECT * FROM $table_name WHERE approved = 'false'";
	}
	else{
		$query = "SELECT * FROM $table_name WHERE approved = 'null'";
	}

	if($_GET["key"] && $_GET["action"]){
		$key = $_GET["key"];
		if($_GET["action"] == "approve"){
			// approve for key
			$approveQuery = "UPDATE $table_name SET approved = 'true' WHERE pubkey = '$key'";
			$newResult = mysql_query($approveQuery) or die (mysql_error());
			$message = "Entry with key \"".$key."\" approved.";
		}
		else if($_GET["action"] == "deny"){
			// deny for key
			$denyQuery = "UPDATE $table_name SET approved = 'false' WHERE pubkey = '$key'";
			$newResult = mysql_query($denyQuery) or die (mysql_error());
			$message = "Entry with key \"".$key."\" denied.";
		}
	}
	
	$result = mysql_query($query) or die (mysql_error()); ?>
	<!DOCTYPE html>
	<html>
	<head>
		<link type="text/css" rel="stylesheet" href="style.css"></link>
		<script type="text/javascript" src="moderation.js"></script>
		<title>Moderation</title>
	</head>
	<body>
		<div id="sidebar">
		You are logged in as "<?php echo $_SESSION["login"]; ?>"... (<a href="logout.php"><i>logout</i></a>)<br><br>
		(<a href="moderation.php"><i>view unprocessed entries</i></a>)<br>
		(<a href="moderation.php?view=approved"><i>view approved entries</i></a>)<br>
		(<a href="moderation.php?view=denied"><i>view denied entries</i></a>)<br>
		<br><br><br><a href="generate.php" onclick="return confirmation()"><b>Push Changes to bibTeX File</b></a>
		<h2>Navigation</h2>
		<ul>
			<li><a href="index.php">About</a></li>
			<li><a href="submit.php">Submit</a></li>
			<li><a href="bib.php">View</a></li>
			<li><a href="<?php echo $list; ?>.bib">Get bibTeX</a></li>
		</ul>
	</div>
	<div id="main">
		<h1>Research List Moderation Interface</h1> 
		<?php 
		if($message){
			echo "<font style=\"BACKGROUND-COLOR: yellow\">".$message."</font><br><br>\n";
		}
		if($_SESSION["changesMade"]){
			$_SESSION["changesMade"] = false;
			echo "<font style=\"BACKGROUND-COLOR: yellow\">Changes have been made to the <b>$list</b> lists.</font><br><br>\n";
		}
		echo "<i>Warning: Citations may differ slightly from how they are displayed via Exhibit.</i><br>\n";
		echo "<ol>\n";
	
		while ($row = mysql_fetch_object($result)){
			echo "<li>\n";
			$key = $row->pubkey;
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
			$openaccess = $row->openaccess;
			$doi = $row->doi;
		
			$preview = "";
			$authors = $row->author;
			$authorArray = array();
			$authorArray = explode(" and ", $authors); //multiple authors 
			$authorPreview = "";
			echo "Submitted by <i>".$email."</i> for list \"".$list.".\" Citation of type \"".$pubtype.".\"<br><br>\n";
			echo"<div style=\"width:80%;border:2px dashed red\">";
			
			for ($i=0;$i<count($authorArray);$i++){
				if($i<count($authorArray)-1){
					$authorPreview = $authorPreview."<u>".$authorArray[$i]."</u>, ";
				}
				else if (count($authorArray) != 1){
					$authorPreview = $authorPreview."and <u>".$authorArray[$i]."</u>";
				}
				else{
					$authorPreview = $authorPreview."<u>".$authorArray[$i]."</u>";
				}
			}
			$preview = $preview.$authorPreview."."; // authors
			$preview = $preview." (".$year; // year
			if($month != ""){
				$preview = $preview.", ".$month;
			}
			$preview = $preview.")."; // year
			
			if($url != "none"){
				$preview = $preview." <b><a href=\"".$url."\">".$title."</a>.</b>"; // title w/ url
			}
			else{
				$preview = $preview." <b>".$title.".</b>"; // title w/o url
			}
			if($journal != ""){
				$preview = $preview.", ".$volume;
			}
			if($pages != ""){
				if($booktitle == ""){
					$preview = $preview.", ".$pages;
				}
			}
			if($volume != ""){
				$preview = $preview.".";
			}
			if($editors != ""){
				$preview = $preview." In ".$editors."(Eds.),";
			}
			if($booktitle != ""){
				$preview = $preview." <i>".$booktitle."</i>.";
				if($pages != ""){
					$preview = $preview." (pp. ".$pages.").";
				}
			}
			if($address != ""){
				$preview = $preview." ".$address.".";
			}
			if($school != ""){
				$preview = $preview." ".$school.".";
			}
			if($organization != ""){
				$preview = $preview." ".$organization.".";
			}
			if($institution != ""){
				$preview = $preview." ".$institution.".";
			}
			if($month != ""){
				$preview = $preview." ".$month.".";
			}
			if($openaccess != ""){
				$preview = $preview." openaccess:".$openaccess.".";
			}
			if($doi != ""){
				$preview = $preview." doi:".$doi.".";
			}
			if($booktitle != ""){
				if($publisher != ""){
					$preview = $preview." ".$publisher.".";
				}
			}
			if($note != ""){
				$preview = $preview." ".$publisher.".";
			}
			echo "<p>&nbsp;".$preview."</p>\n";
			echo "</div><br>\n";
			echo "(<a href=\"moderation.php?key=".$key."&action=approve\"><i>approve</i></a>) | (<a href=\"moderation.php?key=".$key."&action=deny\"><i>deny</i></a>) | (<a href=\"edit.php?key=".$key."\"><i>edit</i></a> | (<a href=\"delete.php?key=".$key."\"><i>delete</i></a>)<br><br>\n";
		}
	echo "</ol>\n";
	echo "</div>\n";
}
else{
	header( 'Location: '.$docroot.'login.php' ) ;
}

?>