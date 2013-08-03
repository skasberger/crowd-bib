# creates the table for the bibliographic database 
# enter a proper tablename (same as in config.php!)

CREATE TABLE `TABLENAME` (
  `pubtype` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `approved` varchar(255) NOT NULL,
  `list` varchar(255) NOT NULL,
  `pubkey` varchar(255) NOT NULL,
  `peer` varchar(255) NOT NULL,
  `first_author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `journal` varchar(255) NOT NULL,
  `volume` varchar(255) NOT NULL,
  `pages` varchar(255) NOT NULL,
  `editors` varchar(255) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `pubdate` varchar(255) NOT NULL,
  `openaccess` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8
