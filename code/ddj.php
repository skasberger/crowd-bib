<?php
session_start();
include 'config-wordpress.php';
include 'display.php';
$pagetitle = "Research on Social Network Sites";
$title = "Bibliography of Research on Social Network Sites";
$list = "DDJ";
echo "<html>\n<head>\n<link type=\"text/css\" rel=\"stylesheet\" href=\"moderation.css\"></style>\n<script type=\"text/javascript\" src=\"moderation.js\"></script>\n<title>$pagetitle</title>\n</head>\n<body>\n";
echo "<div id=\"sidebar\">\n";?>
<u>Navigation</u>
<ul>
	<li><b><a href="submit.php">submit new citation</a></b><br></li>
	<?php
	if($show_bibTeX){
		?>
		<li><b><a href="DDJ.bib">bibTeX file</a></b><br></li>
		<?
	}
	?>
</ul>
<font size=\"2\">
	<p>This page provides a bibliography of articles concerning social network sites. For an overview of this space, including a definition of \"social network sites,\" a history of SNSs, and a literature review, see boyd & Ellison's 2007 introduction to the JCMC Special Issue on Social Network Sites, Social Network Sites: Definition, History, and Scholarship. Example social network sites addressed include: Friendster, MySpace, Facebook, Orkut, Cyworld, Mixi, Black Planet, Dodgeball, and LiveJournal. The research listed is focused specifically on social network sites (sometimes called \"social networking\" sites). Some of this is connected to social media, social software, Web2.0, social bookmarking, educational technologies, communities research, etc. but the organizing focus is specifically SNSs. This list is not methodologically or disciplinarily organized. There is work here from communications, information science, anthropology, sociology, economics, political science, cultural studies, computer science, etc.  For a social science-specific approach to Facebook, see <a href=\"http://psych.wustl.edu/robertwilson/A-Z.html\">Robert Wilson's list</a>. This list is not complete.  But please feel free to add your own citations by submitting them above. I do not host articles so only those hosted elsewhere are linked. Please contact the author if you want a copy of an article that is not linked.
</font>
<?php
display($title, $list, $table_name);
?>