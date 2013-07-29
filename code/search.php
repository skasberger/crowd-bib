<?php 
	include 'config.php';
	$SQL_WHERE = 'first_author';
	$searchq		=	strip_tags($_GET['q']);
	$getRecord_sql	=	'SELECT * FROM '.$table_name.' WHERE '.$SQL_WHERE.' LIKE "'.$searchq.'%"';
	$getRecord		=	mysql_query($getRecord_sql);
	if(strlen($searchq)>0){
	echo '<ul>';
	$list = array();
	while ($row = mysql_fetch_array($getRecord)) {
		if(!in_array($row['first_author'], $list)){
		?>
		<li><a href="javascript:setAuthor('<?php
		echo $row['first_author'];
		?>')"><?php 
		$list[] = $row['first_author'];
		echo $row['first_author']; 
		?></a></li>
	<?php }} 
	echo '</ul>';
	?>
<?php } ?>