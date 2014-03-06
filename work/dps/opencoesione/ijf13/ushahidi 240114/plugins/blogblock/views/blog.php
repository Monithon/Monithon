<?php
// Make sure SimplePie is included. You may need to change this to match the location of simplepie.inc.
require_once('php/simplepie.inc');
 
// We'll process this feed with all of the default options.
$feed = new SimplePie();
 
// Set the feed to process.
$feed->set_feed_url('http://praguewatch.wordpress.com/feed/');
 
// Run SimplePie.
$feed->init();
 
// This makes sure that the content is sent to the browser as text/html and the UTF-8 character set (since we didn't change it).
$feed->handle_content_type();
 
// Let's begin our XHTML webpage code.  The DOCTYPE is supposed to be the very first thing, so we'll keep it on the same line as the closing-PHP tag.
?>
<li><div class="content-block"><h5><?php echo 'Blog' ?></h5>

<table class="table-list">
 	<?php
	/*
	Here, we'll loop through all of the items in the feed, and $item represents the current item in the loop.
	*/
	
	foreach ($feed->get_items(0, 10) as $item):
	?>
 
<tr>
<td> <a href="<?php echo $item->get_permalink(); ?>" target="_blank"><?php echo $item->get_title(); ?></a> </td>
<td width="65" align="right"> <?php echo $item->get_date('j.n.Y'); ?> </td>
</tr>
 
	<?php endforeach; ?>
 </table>
 
<a class="more" href="http://praguewatch.wordpress.com/" target="_blank">Dal&#x0161;&iacute;</a>
<div class="clear:both;"></div>
