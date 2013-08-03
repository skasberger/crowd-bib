<?php

include 'config.php';

session_start();
$_SESSION['name'] = "YourSession";

if (!isset($_SESSION['initiated']))
{
    session_regenerate_id();
    $_SESSION['initiated'] = true;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $page_title; ?> - Submit New Citation</title>
	<link type="text/css" rel="stylesheet" href="style.css"></style>
	<script type="text/javascript" src="submit.js"></script>

	<?php echo $piwik; ?>

</head>
<body onLoad="onLoadScript()">
	<div align="center">
		<h1><u>Submit New Citation</u></h1>
		<a href="bib.php">Data Journalism</a>
	</div>
	<div class="colmask threecol">
		<div class="colmid">
			<div class="colleft">
				<form action="process.php" method="post">
					<div class ="col1">
						<h1>Step 2</h1>
							
						<span id="success"><p>
							<?php 
							if (isset($_SESSION['success'])) {
								if($_SESSION["success"] == true){
									$_SESSION["success"] = "";
									echo "<hr><b>Thanks for your submission!</b><br>I will review it shortly.<hr>";
								}
								else if($_SESSION["success"] == "error"){
									$_SESSION["success"] = "";
									echo "<hr><b>There was an error</b><br>For some reason there was an error in your submission.  Try again later, or email me.<hr>";
								} 
							} ?>
						</p></span>

						<span id="errors"><p>
							<?php
							if($_SESSION["errors"]){
								$errors = $_SESSION["errors"];
								$_SESSION["errors"] = array();
								echo "<hr><span class=\"required\">There were errors in your submission!</span><br>";
								echo "<ul>";
								if($errors["email"]){
									echo "<li>Please enter a valid email.</li>";
								}
								if($errors["noAuthor"]){
									echo "<li>Please add an author.</li>";
								}
								if($errors["title"]){
									echo "<li>Please enter a value in the 'Title' field.</li>";
								}
								if($errors["year"]){
									echo "<li>Please enter a value in the 'Year' field.</li>";
								}
								if($errors["noJournal"]){
									echo "<li>Please enter a value in the 'Journal' field.</li>";
								}
								if($errors["noVolume"]){
									echo "<li>Please enter a value in the 'Volume' field.</li>";
								}
								if($errors["noBooktitle"]){
									echo "<li>Please enter a value in the 'Book Title' field.</li>";
								}
								if($errors["noConftitle"]){
									echo "<li>Please enter a value in the 'Conference Name' field.</li>";
								}
								if($errors["noProctitle"]){
									echo "<li>Please enter a value in the 'In Proceedings' field.</li>";
								}
								if($errors["noInstitution"]){
									echo "<li>Please enter a value in the 'Institution' field.</li>";
								}
								echo "</ul><hr>";
							}
							?>
						<b>Publication Type</b><span class="required">*</span><br>
						<select id="pubtype" name="pubtype" onchange="redisplayForm()">
							<option value="article">article</option>
							<option value="book">book</option>
							<option value="inbook">book chapter</option>
							<option value="conference">conference</option>
							<option value="inproceedings">inproceedings</option>
							<option value="mastersthesis">master's thesis</option>
							<option value="misc">misc</option>
							<option value="phdthesis">phd thesis</option>
							<option value="techreport">tech report</option>
							<option value="unpublished">unpublished</option>
						</select>
						<br><br>
						
						<b>Is it peer reviewed?</b><br>
						<select name="peer" id="peer">
							<option value="true">yes</option>
							<option value="false">no</option>
						</select><br>
						
						<input type="hidden" name="key" id="key"></input>
						<input type="hidden" name="firstAuthor" id="firstAuthor"></input>
						<input type="hidden" name="author" id="author">
						
						<p><b>Author Name</b>
						<span class="required">*</span><br>
						<i>(click "Add Author" after entering each author name)</i><br>
						<input type="text" name="author1" id="newAuthor" onkeyup="autosuggest()">							
						<div id="results"></div>
						<a href="javascript:addAuthor()">Add Author</a></p>
						
						<span id="booktitle">
							<b>Book Title</b>
							<span class="required">*</span><br>
							<input name="booktitle" id="booktitleValue" type="text" onkeyup="refreshPreview()"></input><br><br>
						</span>
						
						<span id="conftitle">
							<b>Conference Name</b>
							<span class="required">*</span><br>
							<input name="conftitle" id="conftitleValue" type="text" onkeyup="refreshPreview()"></input><br><br>
						</span>
						
						<span id="proctitle">
							<b>In Proceedings</b>
							<span class="required">*</span><br>
							<i>(example: "Proceedings of WPES'05")</i><br>
							<input name="proctitle" id="proctitleValue" type="text" onkeyup="refreshPreview()"></input><br><br>
						</span>
						
						<b>Title</b>
						<span class="required">*</span><br>
						<input name="title" id="title" type="text" onkeyup="refreshPreview()"></input><br><br>
						
						<b>Year</b>
						<span class="required">*</span><br>
						<input name="year" id="year" type="text" onkeyup="refreshPreview()"></input><br><br>
						
						<b>URL</b><br>
						<i>(type "none" if you do not have the URL)</i><br>
						<input name="url" id="url" type="text" onkeyup="refreshPreview()"></input><br><br>
						
						<span id="journal">
							<b>Journal</b>
							<span class="required">*</span><br>
							<input name="journal" id="journalValue" type="text" onkeyup="refreshPreview()"></input><br><br>
						</span>
						
						<span id="volume">
							<b>Volume (Issue)</b>
							<span class="required">*</span><br>
							<i>(example: "8 (6)")</i><br>
							<input name="volume" id="volumeValue" type="text" onkeyup="refreshPreview()"></input><br><br>
						</span>
						
						<span id="pages">
							<b>Pages</b><br>
							<input name="pages" id="pagesValue" type="text" onkeyup="refreshPreview()"></input><br><br>
						</span>

						<b>Open Access?</b><span class="required">*</span> (<a href="http://access.okfn.org/definition/" title"Budapest Open Access Initiative">BOAI</a>)<br>
						<select id="openaccess" name="openaccess">
							<option value="yes">Yes</option>
							<option value="no">No</option>
						</select>
						<br><br>

						<span id="editors">
							<b>Editors</b><br>
							<input name="editors" id="editorsValue" type="text" onkeyup="refreshPreview()"></input><br><br>
						</span>
						
						<span id="address">
							<b>Location</b><br>
							<input name="address" id="addressValue" type="text" onkeyup="refreshPreview()"></input><br><br>
						</span>
						
						<span id="school">
							<b>School</b><br>
							<input name="school" id="schoolValue" type="text" onkeyup="refreshPreview()"></input><br><br>
						</span>
						
						<span id="institution">
							<b>Institution</b>
							<span class="required">*</span><br>
							<input name="institution" id="institutionValue" type="text" onkeyup="refreshPreview()"></input><br><br>
						</span>
						
						<span id="organization">
							<b>Organization</b><br>
							<input name="organization" id="organizationValue" type="text" onkeyup="refreshPreview()"></input><br><br>
						</span>
						
						<span id="month">
							<b>Month</b><br>
							<input name="month" id="monthValue" type="text" onkeyup="refreshPreview()"></input><br><br>
						</span>
						
						<span id="publisher">
							<b>Publisher</b><br>
							<input name="publisher" id="publisherValue" type="text" onkeyup="refreshPreview()"></input><br><br>
						</span>
						
						<span id="note">
							<b>Notes</b><br>
							<textarea rows ="4" cols="50" name="note" id="noteValue" type="text" onkeyup="refreshPreview()"></textarea><br><br>
						</span>
						<br><br>
					</div>
					<div class ="col2">
						<h1>Step 1</h1>
						<i>Please submit additional publications as you learn of them. I do not host articles so only those hosted elsewhere are linked.</i><br><br>
						
						<b>Your Email</b>
						<span class="required">*</span><br>
						<input name="email" type="text"></input><br><br>
					</div>
					<div class = "col3">
						<h1>Step 3</h1>
						
						<p id="authorBoxTitle"><br>
						<b>Authors</b> - <a href="javascript:resetAuthors()">(reset)</a></p>
						<p id="authorBox"></p>
						
						<p id="previewBoxTitle"><br>
						<b>Citation Preview</b> - <a href="javascript:refreshPreview()"> (refresh)</a></p>							
						
						<p id="previewBox"></p>
						<b>Type "open knowledge"<span class="required">*</span><br></b>
						<i>(to prevent spam)</i><br><br>
						<input name="nospam" id="nospam" type="text" onkeyup="noSpam()"></input><br><br>
						<input type="submit" id="submit" value="Submit"></input>
						<div align="right">
							<p><a href="javascript:resetAllElements()">(reset all elements)</a></p>
							<p><span class="required">*</span> designates required fields</p>
						</div>
						<div>
							<h2 style="margin-top:200px;">Navigate</h2>
							<ul>
								<li><a href="index.php">About</a></li>
								<li><a href="bib.php">View</a></li>
								<li><a href="<?php echo $list; ?>.bib">Get bibTeX</a></li>
								<li><a href="http://www.github.com/skasberger/crowd-bib">Sourcecode @ GitHub</a></li>
							</ul>
						</div>	
					</div>
				</form>
			</div>








