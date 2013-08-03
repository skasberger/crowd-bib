<?php
include 'config.php';
?>

<!DOCTYPE html>
<html>
   <head>
		<title><?php echo $page_title; ?></title>
		<!--<script src="http://api.simile-widgets.org/exhibit/2.2.0/exhibit-api.js" type="text/javascript"></script>-->
		<link rel="exhibit/data" href="<?php echo $list; ?>.bib" type="application/x-bibtex" />
		<link rel="stylesheet" type="text/css" href="style.css">

	<?php echo $piwik; ?>

	</head>
	<body onLoad="Exhibit.create(null, 'Publication');">
		<div id="main">
			<h1 align="center">Bibliography of Research on Data Journalism</h1>
			<p>This page provides a bibliography of research publications concerning data journalism, computer assisted reporting and other forms of journalism dealing with structured information.</p>
			<p>This list collects scholarly work on this topic. If you are looking for outstanding projects, tools, tutorials or data platforms, this <a href="https://docs.google.com/spreadsheet/ccc?key=0Aps26R6VsRYUdHNGOVlyVlZfS2NLcHpSRElZMkhaV0E#gid=0">open list of websites about data journalism</a> might be a good start. Also, the <a href="https://twitter.com/search?q=%23ddj">Twitter hashtag (#ddj)</a> and the <a href="http://lists.okfn.org/mailman/listinfo/data-driven-journalism">OKFN</a> and <a href="http://legacy.ire.org/membership/subscribe/nicar-l.html">NICAR-L</a> mailing lists might be helpful resources.</p>
			<p>This list has been started recently and is far away from being complete. Please feel free to add your own citations by submitting them above. The list is not methodologically or disciplinarily organized. There is work here from communications, information science, anthropology, sociology, economics, political science, cultural studies, computer science, etc.. Of great help were the collections by <a href="http://lilianabounegru.org/">Liliana Bounegru</a>, <a href="http://com.miami.edu/car/">Bruce Garrison</a>, <a href="http://www.hans-bredow-institut.de/de/mitarbeiter/pd-dr-wiebke-loosen">Wiebke Loosen</a>, <a href="http://localhost/jonathanstray.com/a-computational-journalism-reading-list">Jonathan Stray</a> and <a href="http://dajoresearch.blogspot.fi/">Turo Uskali</a> I do not host articles so only those hosted elsewhere are linked. Please contact the author if you want a copy of an article that is not linked.</p>
			<p>If you have a question or if you find factual errors in the bibliography, please <a href="http://ausserhofer.net/about/contact/">drop me a line</a>. If there is a software bug or if you have suggestions, please use the <a href="https://github.com/skasberger/crowd-bib">issue tracking function at github</a>.</p>
			<p><a href="http://www.danah.org/">danah boyd</a> and <a href="https://twitter.com/dylanjfield">Dylan Field</a> developed the initial version of this crowd-sourced bibliography for research on <a href="http://www.danah.org/researchBibs/sns.php">social network sites</a> and <a href="http://www.danah.org/researchBibs/twitter.php">Twitter</a>. danah also provided us with the source code. <a href="https://twitter.com/stefankasberger">Stefan Kasberger</a>, my friend and colleague at <a href="http://okfn.at/">OKFN Austria</a>, then developed it further and <a href="https://github.com/skasberger/crowd-bib">released it as open source</a> under the <a href="http://opensource.org/licenses/MIT" title"MIT License">MIT License</a>. Feel free to make your own bibliography for your own research interests. The project was started during my fellowship at <a href="http://hiig.de/">Alexander von Humboldt Institute for Internet and Society</a>.</p>
		</div>
		<div id="sidebar">
			<h2>Navigate</h2>
			<ul>
				<li><a href="submit.php">Submit</a></li>
				<li><a href="bib.php">View</a></li>
				<li><a href="<?php echo $list; ?>.bib">Get bibTeX</a></li>
				<li><a href="http://www.github.com/skasberger/crowd-bib">Sourcecode @ GitHub</a></li>
			</ul>
			<h2>Open Data</h2>
			Creative Commons
			<a href="https://creativecommons.org/licenses/by/3.0/at/"><img src="images/cc-by.png" title="Creative Commons CC-BY-SA" alt="Creative Commons CC-BY-SA" width="88"></a>
		</div>
   </body>
</html>
