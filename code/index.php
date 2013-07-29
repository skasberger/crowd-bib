<?php
include 'config.php';
?>
<html>
   <head>
       <title><?php echo $page_title; ?></title>
       <!--<script src="http://api.simile-widgets.org/exhibit/2.2.0/exhibit-api.js" type="text/javascript"></script>-->
       <link rel="exhibit/data" href="<?php echo $list; ?>.bib" type="application/x-bibtex" />
       
       <style>
           body {
               font-family: Verdana, Arial, Helvetica, sans-serif;
           }
           div.publication {}
           div.title { font-weight: bold;}
		   span.grayed {color: gray;}
		   div a{
				color:black;
			}
			h1{
				font-size: medium;
			}
			div h2{
				font-size: 60%;
			}
       </style>
	</head>
	<body onLoad="Exhibit.create(null, 'Publication');">
		<div align="center">
			<h1>Bibliography of Research on Data Journalism</h1>
			<p>This page provides a bibliography of research publications concerning data journalism, computer assisted reporting and other forms of journalism dealing with structured information.</p>
			<p>This list collects scholarly work on this topic. If you are looking for outstanding projects, tools, tutorials or data platforms, this <a href="https://docs.google.com/spreadsheet/ccc?key=0Aps26R6VsRYUdHNGOVlyVlZfS2NLcHpSRElZMkhaV0E#gid=0">open list of websites about data journalism</a> might be a good start. Also, the <a href="https://twitter.com/search?q=%23ddj">Twitter hashtag (#ddj)</a> and the <a href="http://lists.okfn.org/mailman/listinfo/data-driven-journalism">OKFN</a> and <a href="http://legacy.ire.org/membership/subscribe/nicar-l.html">NICAR-L</a> mailing lists might be helpful resources.</p>
			<p>This list has been started recently and is far away from being complete. Please feel free to add your own citations by submitting them above. The list is not methodologically or disciplinarily organized. There is work here from communications, information science, anthropology, sociology, economics, political science, cultural studies, computer science, etc.. Of great help were the collections by <a href="http://lilianabounegru.org/">Liliana Bounegru</a>, <a href="http://com.miami.edu/car/">Bruce Garrison</a>, <a href="http://www.hans-bredow-institut.de/de/mitarbeiter/pd-dr-wiebke-loosen">Wiebke Loosen</a>, <a href="http://localhost/jonathanstray.com/a-computational-journalism-reading-list">Jonathan Stray</a> and <a href="http://dajoresearch.blogspot.fi/">Turo Uskali</a> I do not host articles so only those hosted elsewhere are linked. Please contact the author if you want a copy of an article that is not linked.</p>
			<p>If you have a question or if you find factual errors in the bibliography, please <a href="http://ausserhofer.net/about/contact/">drop me a line</a>. If there is a software bug or if you have suggestions, please use the <a href="https://github.com/skasberger/crowd-bib">issue tracking function at github</a>.</p>
			<p><a href="http://www.danah.org/">danah boyd</a> and <a href="https://twitter.com/dylanjfield">Dylan Field</a> developed the initial version of this crowd-sourced bibliography for research on <a href="http://www.danah.org/researchBibs/sns.php">social network sites</a> and <a href="http://www.danah.org/researchBibs/twitter.php">Twitter</a>. danah also provided us with the source code. <a href="https://twitter.com/stefankasberger">Stefan Kasberger</a>, my friend and colleague at <a href="http://okfn.at/">OKFN Austria</a>, then developed it further and <a href="https://github.com/skasberger/crowd-bib">released it as open source</a> under the <a href="http://opensource.org/licenses/MIT" title"MIT License">MIT License</a>. Feel free to make your own bibliography for your own research interests. The project was started during my fellowship at <a href="http://hiig.de/">Alexander von Humboldt Institute for Internet and Society</a>.</p>
			<div align="center">
				<table width="70%">
           			<tr valign="top">
               			<td>
							<div ex:role="collection" ex:itemTypes="Publication"></div>
								<div ex:role="exhibit-lens" ex:itemTypes="Publication" class="publication" style="display: none">
										
							
							<div>
								<span ex:content=".author" ></span>.
								(<span ex:content=".year"></span>).								
								<span ex:select=".peer">
									<span ex:case="false"><span class="grayed">
										<span ex:select=".url">
											<span ex:case="none"><b><span ex:content=".label"></span>.</b></span>
											<a style="color: gray" ex:if-exists=".url" ex:href-content=".url" target=""><b><span ex:content=".label"></span>.</b></a>
										</span>
									</span></span>
									<span ex:case="true">
										<span ex:select=".url">
											<span ex:case="none"><b><span ex:content=".label"></span>.</b></span>
											<a ex:if-exists=".url" ex:href-content=".url" target=""><b><span ex:content=".label"></span>.</b></a>
										</span>
									</span>
								</span>
								
								
								<span ex:if-exists=".journal">
									<i><span ex:content=".journal"></span></i><span ex:if-exists=".volume">,<span ex:content=".volume"></span></span><span ex:if-exists=".pages">,<span ex:content=".pages"></span></span>.
								</span>
								<span ex:if-exists=".editors">
									In <span ex:content=".editors"></span>(Eds.),
								</span>
								<span ex:if-exists=".booktitle">
									<i><span ex:content=".booktitle"></span></i>.
									<span ex:if-exists=".pages">
										(pp. <span ex:content=".pages"></span>).
									</span>
									<span ex:if-exists=".address">
										<span ex:content=".address"></span>.
									</span>
									<span ex:if-exists=".school">
										<span ex:content=".school"></span>.
									</span>
									<span ex:if-exists=".month">
										<span ex:content=".month"></span>.									
									</span>
									<span ex:if-exists=".publisher">
										<span ex:content=".publisher"></span>.
									</span>
								</span>
								
								<span ex:if-exists=".note">
									<span ex:content=".note"></span>.
								</span>
								
								<span ex:select=".pub-type">
									<span ex:case="article"><font color="royalblue"> (journal article) </font></span>
									<span ex:case="book"><font color="olivedrab"> (book chapter) </font></span>
									<span ex:case="inbook"><font color="olivedrab"> (book chapter) </font></span>
									<span ex:case="inproceedings"><font color="red"> (conference paper) </font></span>
									<span ex:case="mastersthesis"><font color="mediumvioletred"> (mastersthesis) </font></span>
									<span ex:case="misc"><font color="pink"> (misc) </font></span>
									<span ex:case="phdthesis"><font color="darkviolet"> (phdthesis) </font></span>
									<span ex:case="techreport"><font color="orange"> (techreport) </font></span>
									<span ex:case="unpublished"><font color="orange"> (unpublished) </font></span>									
								</span>
								
							<p></p></div>
                       	</div>

						<div ex:role="exhibit-lens" ex:itemTypes="Author" class="author" style="display: none">
						<span ex:control="copy-button" style="float: right"></span>
						<div class="title"><span ex:content=".label"></span></div>
						<ol class="publications" ex:content="!author">
							<li ex:content="value"></li>
							</ol>
							</div>
                       </div>
                       
                      <font size="-2"> <div ex:role="exhibit-view"
							ex:viewClass="Exhibit.TileView"
                           ex:orders=".firstauthor"
                           ex:possibleOrders=".pub-type, .firstauthor, .year, .label, .publisher, .booktitle, .editors, .journal, .volume"
						   ex:showAll = "true"
						   ex:grouped = "false"></div></font>
               </td>
				
           </tr>
       </table></div>
   </body>
</html>