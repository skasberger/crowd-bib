<?php
session_start();
include 'config.php';
include 'display.php';
$pagetitle = "Research on Social Network Sites";
$title = "Bibliography of Research on Social Network Sites";
echo "<html>\n<head>\n<link type=\"text/css\" rel=\"stylesheet\" href=\"moderation.css\"></style>\n<script type=\"text/javascript\" src=\"moderation.js\"></script>\n<title>$pagetitle</title>\n</head>\n<body>\n";
echo "<div id=\"sidebar\">\n";?>
<u>Navigation</u>
<ul>
	<li><b><a href="submit.php">submit new citation</a></b><br></li>
	<?php
	if($show_bibTeX){
		?>
		<li><b><a href="<?php echo $list; ?>.bib">bibTeX file</a></b><br></li>
		<?
	}
	?>
</ul>
<?php
display($title, $list, $table_name);
?>