<?php

// set basic variables
$list=""; // parameter for the citation bibliography type, filename of your .bib file, stored under list in the database for filtering
$docroot = ""; // root folder of your docs
$email_adresses = "example@example.com"; // email adress for notifications of new submissions

// The variables below control the bibs.  Make sure to escape quotes!
$page_title=""; // title of your page, something like "Data Driven Bibliography"
$show_bibTeX = true; // toggle bibTeX link

// set database variables
// do not give this data to someone else!
$db_host=""; // domain of your database
$db_name=""; // name of your database
$username=""; // username to access your database
$db_password=""; // password of the user
$table_name=""; // tablename, where your data is stored in the database

// setup of the mysql connection
$db_con=mysql_connect($db_host,$username,$db_password);
$connection_string=mysql_select_db($db_name);
mysql_connect($db_host,$username,$db_password);
mysql_select_db($db_name);
?>