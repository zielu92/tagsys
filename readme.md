Simple tag system based on JS/jQuery, Ajax, PHP, MySQL, CSS; with autocomplete fature based on Bootstrap.

<b>creating database for out tags with columns: id, tag.</b>

<code>
  CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tag` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

INSERT INTO `tags` (`id`, `tag`) VALUES
(1, 'Test'),
(2, 'New');
</code>

<b>Setting up DB</b> 
We can config connection with DB in database.php file. 

Is it worth something for you? You can support me and send some btc for coffee :) 14Qaw1shp8ccg2n5jxzHD1DSfyTkYoKNqe

Polish version: http://mzielinski.pl/tag-system-jquery-ajax-php-mysql/ 
