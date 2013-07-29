<?php
/**
 * Template Name: DDB
 * Description: A Page Template for the results of the data driven bibliography project
 *
 */

include 'config-ddb.php';
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
		$insitution = $row->institution;
		$note = $row->note;

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
		$preview = $preview." (".$year.")."; // year
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
				$preview = $preview." (pp. ".$pages.").";
			}
			if($address != ""){
				$preview = $preview.$address;
			}
			if($school != ""){
				$preview = $preview." ".$school.".";
			}
			if($month != ""){
				$preview = $preview." ".$month.".";
			}
			if($publisher != ""){
				$preview = $preview." ".$publisher.".";
			}
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
				$preview = $preview."<font color=\"olivedrab\"> (book chapter) </font>";
				break;
			case "inbook":
				$preview = $preview."<font color=\"olivedrab\"> (book chapter) </font>";
				break;
			case "inproceedings":
				$preview = $preview."<font color=\"red\"> (conference paper) </font>";
				break;
			case "mastersthesis":
				$preview = $preview."<font color=\"mediumvioletred\"> (mastersthesis) </font>";
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

get_header(); ?>

<style type="text/css">body {
       font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 80%;
   }
	a{
		color:black;
	}
   div.title { font-weight: bold;}
   div a{
		color:black;
	}
	h1{
		font-size: medium;
	}
	div h2{
		font-size: 60%;
	}
	.required{
		font-size: 120%;
		color:red;
	}
	#main {
		float:left;
		width: 85%;
	}
	#sidebar {
		float: right;
		position: absolute;
		left: 75%;
	}
	div input{
		width: 300px;
		height: 20px;
	}
	ol{width:80%;}
	ol li{padding:0px;margin-left: 40px;}

</style>

<script type="text/javascript">
	function confirmation(){
	var answer = confirm("Are you sure you want to push changes? This cannot be undone.");
	if (answer){
		return true;
	}
	else{
		return false;
	}
}
</script>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>

				<div class="entry-content">
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); 
					session_start();
					include 'config-wordpress.php';
					$pagetitle = "Research on Social Network Sites";
					$title = "Bibliography of Research on Social Network Sites";
					$list = "DDJ"; 
					?>
					<u>Navigation</u>
					<ul>
						<li><b><a href="submit.php">submit new citation</a></b><br></li>
						<li><b><a href="DDJ.bib">bibTeX file</a></b><br></li>
					</ul>
					<font size=\"2\">
						<p>This page provides a bibliography of articles concerning social network sites. For an overview of this space, including a definition of \"social network sites,\" a history of SNSs, and a literature review, see boyd & Ellison's 2007 introduction to the JCMC Special Issue on Social Network Sites, Social Network Sites: Definition, History, and Scholarship. Example social network sites addressed include: Friendster, MySpace, Facebook, Orkut, Cyworld, Mixi, Black Planet, Dodgeball, and LiveJournal. The research listed is focused specifically on social network sites (sometimes called \"social networking\" sites). Some of this is connected to social media, social software, Web2.0, social bookmarking, educational technologies, communities research, etc. but the organizing focus is specifically SNSs. This list is not methodologically or disciplinarily organized. There is work here from communications, information science, anthropology, sociology, economics, political science, cultural studies, computer science, etc.  For a social science-specific approach to Facebook, see <a href=\"http://psych.wustl.edu/robertwilson/A-Z.html\">Robert Wilson's list</a>. This list is not complete.  But please feel free to add your own citations by submitting them above. I do not host articles so only those hosted elsewhere are linked. Please contact the author if you want a copy of an article that is not linked.
					</font>
					<?php
					display($title, $list, $table_name);
					?>
				</div><!-- .entry-content -->

				<div>
					<h2><?php echo get_lang($short_lang, "revisions"); ?></h2>
					<?php the_revision_note_prd() ?>
					<?php the_revision_list_prd() ?>
					<?php the_revision_diffs_prd() ?>
				</div>

				<footer class="entry-meta">
					<?php echo get_lang($short_lang, "publishedat") . the_date() ?>, <?php the_time(); ?><br/>
					<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' );
					if ( function_exists('socialshareprivacy') ) { socialshareprivacy(); } ?>
				</footer><!-- .entry-meta -->
			</article><!-- #post -->
			<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar('course_overview'); ?>
<?php get_footer(); ?>

