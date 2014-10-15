<?php
function display($title, $list, $table_name){
	$query = "SELECT * FROM $table_name WHERE approved = 'true' AND list = '$list' ORDER BY author ASC";	
	$result = mysql_query($query) or die (mysql_error());
	echo "</div>\n";
	echo "<div id=\"main\">\n";
	echo "<h1><u>$title</u></h1>\n";
	echo "<ol>\n";
	while ($row = mysql_fetch_object($result)){
		echo "<li>\n";
		$peer = $row->peer;
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
		$doi = $row->doi;

		$preview = "";
		$authors = $row->author;
		$authorArray = array();
		$authorArray = explode(" and ", $authors); //multiple authors 
		$authorPreview = "";
		//echo"<div style=\"width:80%\">";
		for ($i=0;$i<count($authorArray);$i++){
			if($i<count($authorArray)-1){
				$authorPreview = $authorPreview.$authorArray[$i].", ";
			}
			else if (count($authorArray) != 1){
				$authorPreview = $authorPreview."and ".$authorArray[$i];
			}
			else{
				$authorPreview = $authorPreview.$authorArray[$i];
			}
		}
		$preview = $preview.$authorPreview."."; // authors
		$preview = $preview." (".$year; // year
		if($month != ""){
			$preview = $preview.", ".$month;
		}
		$preview = $preview.")."; // year
		
		if($peer == "false"){ // peer review
			$preview = $preview."<font color=\"gray\">";
		}
		
		// URL
		if($url != "none"){
			$preview = $preview." <b><a href=\"".$url."\">".$title."</a>.</b>"; // title w/ url
		}
		else{
			$preview = $preview." <b>".$title.".</b>"; // title w/o url
		}
		// END URL

		// JOURNAL
		if($journal != ""){
			$preview = $preview." <i>".$journal."</i>"; // journal
			if ($volume != ""){
				$preview = $preview.", ".$volume; // volume
			}
			if ($pages != ""){
				$preview = $preview.", ".$pages;
			}
			$preview = $preview.".";
		}
		// END JOURNAL

		if($editors != ""){
			$preview = $preview."In ".$editors." (Eds.),";
		}

		if($booktitle != ""){
			$preview = $preview." <i>".$booktitle."</i>.";
			if($pages != ""){
				$preview = $preview." (pp. ".$pages.") .";
			}
			if($school != ""){
				$preview = $preview." ".$school.".";
			}
			if($address != ""){
				$preview = $preview." ".$address;
			}
			if($publisher != ""){
				$preview = $preview.":".$publisher.".";
			}
		}

		switch ($pubtype){
			case "misc":
				$preview = $preview." ".$address.".";
				break;
			case "techreport":
				if($address)	{
					$preview = $preview." ".$institution." ".$address.".";	
				}else{
					$preview = $preview." ".$institution.".";	
				}
				
				break;
			case "unpublished":
				$preview = $preview." ".$address.".";
				break;
		}

		if($booktitle != ""){
			$preview = $preview." <i>".$booktitle."</i>.";
			if($pages != ""){
				$preview = $preview." (pp. ".$pages.") .";
			}
			if($school != ""){
				$preview = $preview." ".$school.".";
			}
			if($address != ""){
				$preview = $preview." ".$address.".";
			}
			if($publisher != ""){
				$preview = $preview.":".$publisher.".";
			}
		}

		if($doi != ""){
			$preview = $preview." doi:".$doi."";
		}

		if($note != ""){
			$preview = $preview." ".$note;
		}
		if($peer == "false"){ // peer review TODO
			$preview = $preview."</font>";
		}

		switch ($pubtype){
			case "article":
				$preview = $preview."<font color=\"royalblue\"> (journal article) </font>";
				break;
			case "book":
				$preview = $preview."<font color=\"olivedrab\"> (book) </font>";
				break;
			case "inbook":
				$preview = $preview."<font color=\"olivedrab\"> (book chapter) </font>";
				break;
			case "conference":
				$preview = $preview."<font color=\"olivedrab\"> (conference proceedings) </font>";
				break;
			case "inproceedings":
				$preview = $preview."<font color=\"red\"> (conference paper) </font>";
				break;
			case "mastersthesis":
				$preview = $preview."<font color=\"mediumvioletred\"> (master's thesis) </font>";
				break;
			case "misc":
				$preview = $preview."<font color=\"pink\"> (misc) </font>";
				break;
			case "phdthesis":
				$preview = $preview."<font color=\"darkviolet\"> (phdthesis) </font>";
				break;
			case "techreport":
				$preview = $preview."<font color=\"orange\"> (techreport) </font>";
				break;
			case "unpublished":
				$preview = $preview."<font color=\"orange\"> (unpublished) </font>";
				break;
		}
		echo "<p>&nbsp;".$preview."</p>\n";
		//echo "</div>\n";
		echo "</li>\n";
		}
	echo "</ol>\n";
	echo "</div>\n";
}
?>