<?php
session_start();

include 'config.php';

function check_email_address($email) {
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	    // invalid emailaddress
	    return false;
	}else {
		return true;
	}
}

//
// get variables from form
//
$pubtype = mysql_real_escape_string($_POST["pubtype"]);

// Check if inproceeding.  If so, change pubtype
$firstAuthor = mysql_real_escape_string($_POST["firstAuthor"]);
$author = mysql_real_escape_string($_POST["author"]);

if($_POST["booktitle"] != ""){
		$booktitle = mysql_real_escape_string($_POST["booktitle"]);
}
else if($_POST["conftitle"] != ""){
		$booktitle = mysql_real_escape_string($_POST["conftitle"]);
}
else if($_POST["proctitle"] != ""){
		$booktitle = mysql_real_escape_string($_POST["proctitle"]);
}

$peer = mysql_real_escape_string($_POST["peer"]);
$title = mysql_real_escape_string($_POST["title"]);
$year = mysql_real_escape_string($_POST["year"]);
$url = mysql_real_escape_string($_POST["url"]);
$journal = mysql_real_escape_string($_POST["journal"]);
$volume = mysql_real_escape_string($_POST["volume"]);
$pages = mysql_real_escape_string($_POST["pages"]);
$openaccess = mysql_real_escape_string($_POST["openaccess"]);
$editors = mysql_real_escape_string($_POST["editors"]);
$address = mysql_real_escape_string($_POST["address"]);
$school = mysql_real_escape_string($_POST["school"]);
$institution = mysql_real_escape_string($_POST["institution"]);
$organization = mysql_real_escape_string($_POST["organization"]);
$month = mysql_real_escape_string($_POST["month"]);
$publisher = mysql_real_escape_string($_POST["publisher"]);
$note = mysql_real_escape_string($_POST["note"]);
$email = mysql_real_escape_string($_POST["email"]);
$nospam = mysql_real_escape_string($_POST["nospam"]);
$key = mysql_real_escape_string($_POST["key"]);
$doi = mysql_real_escape_string($_POST["doi"]);

$errors = array();

// set errors for empty fields
if(!check_email_address($email)){
	$errors["email"]=true;
}
//check universally required fields
if($firstAuthor == ""){
	$errors["noFirstAuthor"] = true;
}
if($author == ""){
	$errors["noAuthor"] = true;
}
if($peer == ""){
	$errors["peer"] = true;
}
if($title == ""){
	$errors["title"] = true;
}
if($year == ""){
	$errors["year"] = true;
}
if($pubtype == "article"){
	if($journal == ""){
		$errors["noJournal"] = true;
	}
	if($volume == ""){
		$errors["noVolume"] = true;
	}
}
else if($pubtype == "book"){
	//no additional required fields
}
else if($pubtype == "inbook"){
	if($booktitle == ""){
		$errors["noBooktitle"] = true;
	}
}
else if($pubtype == "conference"){
	if($booktitle == ""){
		$errors["noConftitle"] = true;
	}
}
else if($pubtype == "inproceedings"){
	if($booktitle == ""){
	$errors["noProcTitle"] = true;
	}
}
else if($pubtype == "mastersthesis"){
	//no additional required fields
}
else if($pubtype == "misc"){
	//no additional required fields
}
else if($pubtype == "phdthesis"){
	//no additional required fields
}
else if($pubtype == "techreport"){
	if($institution == ""){
		$errors["noInstitution"] = true;
	}
}
else if($pubtype == "unpublished"){
	//no additional required fields
}
else{
	$errors["nopubtype"] = true;
}

// format date of publication
$timestamp = time();
$pubdate = date('D, d M Y H:i:s O', strtotime($timestamp));

// insert variables into database
if($errors == array()){
	$query = "INSERT INTO $table_name VALUES ('$pubtype', '$email', '$peer', '$list','$key', '$peer', '$firstAuthor', '$title', '$author', '$year', '$url', '$journal','$volume', '$pages', '$editors', '$booktitle', '$address', '$school', '$institution', '$organization', '$month', '$publisher', '$note', CURDATE(), '$openaccess', '$doi')";

	$result = mysql_query($query) or die(mysql_error());

	if($result == true){
		// send email
		$sendto = $email_adresses;
		$subject = "Entry for ".$list." list";
		$body = "New citation from: ".$email."\n\nAuthor: ".$firstAuthor."\nTitle: ".$title."\n\nLogin ($docroot/login.php) to approve!";
		$header = "From: ".$email."\r\n".
			"Reply-To: ".$email."\r\n".
			'X-Mailer: PHP/'.phpversion();
		mail($sendto, $subject, $body, $header);
		$_SESSION["success"]= true; 
	}
	else {
		$_SESSION["success"]= "error";  
	}
	header('Location: '.$docroot.'generate.php');
	header('Location: '.$docroot.'submit.php');
}
else {
	$_SESSION["errors"]= $errors;
	header('Location: '.$docroot.'submit.php');
}
?>