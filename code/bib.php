<?php

session_start();
include 'config.php';
include 'display.php';
$pagetitle = "Research on Social Network Sites";

?>

<!DOCTYPE html>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="style.css"></link>
	<script type="text/javascript" src="moderation.js"></script>
	<title><?php echo $page_title; ?></title>

	<?php echo $piwik; ?>

</head>
<body>
	<?php
	display($title, $list, $table_name);
	?>
	<div id="sidebar">
		<h2>Navigation</h2>
		<ul>
			<li><b><a href="index.php">About</a></b><br></li>
			<li><b><a href="submit.php">Submit new citation</a></b><br></li>
			<?php
			if($show_bibTeX){
				?>
				<li><b><a href="<?php echo $list; ?>.bib">bibTeX file</a></b><br></li>
				<?
			}
			?>
		</ul>
	</div>
</body>
</html>