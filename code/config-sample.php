<?php

// set basic variables
$list=""; // parameter for the citation bibliography type, stored in the database
$docroot = ""; // root folder of your docs
$email_adresses = "example@example.com"; // email adress for notifications of new submissions
$show_bibTeX = true; // toggle bibTeX link

// set database variables
// do not give this data to someone else!
$db_host="";
$db_name="";
$username="";
$db_password="";
$table_name="";

// setup the mysql connection
$db_con=mysql_connect($db_host,$username,$db_password);
$connection_string=mysql_select_db($db_name);
mysql_connect($db_host,$username,$db_password);
mysql_select_db($db_name);
?>