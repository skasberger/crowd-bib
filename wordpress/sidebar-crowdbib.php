<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary" style="margin:20px 20px 20px 20px; line-height:1.5em;">
			<p>This list has been started recently and is far away from being complete. Please feel free to add your own citations by submitting them above. The list is not methodologically or disciplinarily organized. Of great help were  collections by <a href="http://lilianabounegru.org/">Liliana Bounegru</a>, <a href="http://com.miami.edu/car/">Bruce Garrison</a>, <a href="http://www.hans-bredow-institut.de/de/mitarbeiter/pd-dr-wiebke-loosen">Wiebke Loosen</a> and <a href="http://www.cwanderson.org/">C.W. Anderson</a> and <a href="http://localhost/jonathanstray.com/a-computational-journalism-reading-list">Jonathan Stray</a>. I  do not host articles so only those hosted elsewhere are linked. Please contact the author if you want a copy of an article that is not linked.</p></br>
			<p>If you have a question or if you find factual errors in the bibliography, please <a href="http://ausserhofer.net/about/contact/">drop me a line</a>. If there is a software bug or if you have suggestions, please use the <a href="https://github.com/skasberger/crowd-bib">issue tracking function at github</a>.</p></br>
			<p><a href="http://www.danah.org/">danah boyd</a> and <a href="https://twitter.com/dylanjfield">Dylan Field</a> developed the initial version of this crowd-sourced bibliography for research on <a href="http://www.danah.org/researchBibs/sns.php">social network sites</a> and <a href="http://www.danah.org/researchBibs/twitter.php">Twitter</a>. danah also provided us with the source code. <a href="https://twitter.com/stefankasberger">Stefan Kasberger</a>, my friend and colleague at <a href="http://okfn.at/">OKFN Austria</a>, then developed it further and <a href="https://github.com/skasberger/crowd-bib">released it as open source</a> under the <a title="" href="http://opensource.org/licenses/MIT">MIT License</a>. Feel free to make your own bibliography for your own research interest. The project was started during my fellowship at <a href="http://hiig.de/">Alexander von Humboldt Institute for Internet and Society</a>.</p></div><!-- #secondary -->
	<?php endif; ?>


