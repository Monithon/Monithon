<?php
// Make sure SimplePie is included. You may need to change this to match the location of simplepie.inc.
require_once('themes/monithon/simplepie/autoloader.php');
 
// We'll process this feed with all of the default options.
$bfeed = new SimplePie();
 
// Set the feed to process.
$bfeed->set_feed_url('http://www.monithon.it/blog/it/feed/');

// Set cache location that must be server writable
$bfeed->set_cache_location('application/cache/');

// Run SimplePie.
$bfeed->init();
 
// This makes sure that the content is sent to the browser as text/html and the UTF-8 character set (since we didn't change it).
$bfeed->handle_content_type();
 
// Let's begin our XHTML webpage code.  The DOCTYPE is supposed to be the very first thing, so we'll keep it on the same line as the closing-PHP tag.
?>

<?php
function returnImage ($text) {
    $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
    $pattern = "/<img[^>]+\>/i";
    preg_match($pattern, $text, $matches);
    $text = $matches[0];
    return $text;
}


    //This function will filter out image url which we got from previous returnImage() function

    function scrapeImage($text) {
        $pattern = '/src=[\'"]?([^\'" >]+)[\'" >]/';
        preg_match($pattern, $text, $link);
        $link = $link[1];
        $link = urldecode($link);
        return $link;

    }
	
?>


<div class="content-blockblog"><h5><?php echo 'Monithon Blog' ?></h5>


<table class="table-list">



 	<?php
	/*
	Here, we'll loop through all of the items in the feed, and $item represents the current item in the loop.
	*/
	
	
	foreach ($bfeed->get_items(0, 5) as $item):
	$feedDescription = $item->get_content();
    $image = returnImage($feedDescription);
    $image = scrapeImage($image);
    $image_url= $item->get_permalink();
    $description = $item->get_description();
	?>
    
  
<!-- 
<tr>
<td > <td width="140">  <?php echo '<a href="' . $image_url . '"><img src="' . $image . '" width="135" height="85" /></a>'."\n";?>
            </td>
<td> <td width="750"> <br><br /> <a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a> <br><br /> <?php echo $item->get_date('j.n.Y'); ?> <br><br /> <?php echo $item->get_description(); ?> </td>

-->

<tr> <td>

<a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a> <br><br /> <h4> <?php echo $item->get_date('j.n.Y'); ?> <br><br /> </h4><?php echo $item->get_description(); ?> <br><br /> 

</tr> </td>






 
	<?php endforeach; ?>
 </table>
 

    
<a class="more" href="http://monithon.it/blog/" target="_blank">Vedi tutti i post</a> <a class="more" href="http://monithon.it/blog/en" target="_blank">Monithon Blog in English</a> <a class="more" href="http://monithon.it/blog/it/feed/" target="_blank">RSS</a><div style="clear:both;"></div></div>
