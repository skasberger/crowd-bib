<?php

session_start();
include 'config.php';
include 'display.php';

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
	display($page_title, $list, $table_name);
	?>
	<div id="sidebar">
		<h2>Navigation</h2>
		<ul>
			<li><b><a href="submit.php">Submit new citation</a></b></li>
			<li><b><a href="http://b00mbl1tz.weblog.mur.at/ddjbib/">DDJ Bib</a></b></li>
			<?php
			if($show_bibTeX){
				?>
				<li><b><a href="<?php echo $list; ?>.bib">bibTeX file</a></b></li>
				<?
			}
			?>
		</ul>
	</div>
</body>
</html>