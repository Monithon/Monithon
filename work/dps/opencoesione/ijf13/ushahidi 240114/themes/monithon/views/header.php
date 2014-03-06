

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">



<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>



<head>

	<title><?php echo $page_title.$site_name; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel="stylesheet" type="text/css">
	<?php echo $header_block; ?>
		<?php
	// Action::header_scripts - Additional Inline Scripts from Plugins
	Event::run('ushahidi_action.header_scripts');
	?>
</head>


<?php
  // Add a class to the body tag according to the page URI
  // we're on the home page
  if (count($uri_segments) == 0)
  {
    $body_class = "page-main";
  }
  // 1st tier pages
  elseif (count($uri_segments) == 1)
  {
    $body_class = "page-".$uri_segments[0];
  }
  // 2nd tier pages... ie "/reports/submit"
  elseif (count($uri_segments) >= 2)
  {
    $body_class = "page-".$uri_segments[0]."-".$uri_segments[1];
  }

?>


<body id="page" class="<?php echo $body_class; ?>">



<?php echo $header_nav; ?>

  


  <!-- top bar-->
  <div class="site">
  <div id="top-bar">
  

<div id="toolkit">
<a href="http://www.monithon.it/media/css/Toolkit Monithon.pdf" target="_blank"><img src="http://www.monithon.it/media/css/toolkit.png" width="252" height="90"></a>
</div>


<!-- <div id="infografica">
<a href="http://www.monithon.it/page/index/13"><img src="http://www.monithon.it/media/banner infografica.png"></a>
</div>
-->


<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "8454dd28-ca11-44c0-aaaa-3f4b24b4b63f", doNotHash: true, doNotCopy: true, hashAddressBar: false});</script>




<div id="social">

<span class='st_twitter' displayText='Tweet'></span>
<!-- <span class='st_twitterfollow' displayText='Twitter Follow' st_username='monithon'></span> -->
<!-- <span class='st_fblike' displayText='Facebook Like'></span> -->
   &nbsp  <?php echo Kohana::lang('ui_main.monithon_follow'); ?> &nbsp <a href="http://www.twitter.com/monithon" target="_blank"><img src="http://www.monithon.it/media/tiny_twitter_icon.gif"/></a> &nbsp
   <a href="https://www.facebook.com/Monithon" target="_blank"><img src="http://www.monithon.it/media/tiny-facebook-icon.png"/></a>

</div>



<div id="fb-root">

</div>


    <!-- searchbox -->
		<div id="searchbox">

			<!-- languages -->
			<?php echo $languages;?>
			<!-- / languages -->

			<!-- searchform -->
			<?php echo $search; ?>
			<!-- / searchform -->

	    </div>
  </div>
  <!-- / searchbox -->


	<!-- wrapper -->
	<div class="rapidxwpr floatholder">

		<!-- header -->
		<div id="header">

			<!-- logo -->
			<?php if ($banner == NULL): ?>
			<div id="logo">
				<h1><a href="<?php echo url::site();?>"><?php echo $site_name; ?></a></h1>
				<span><?php echo $site_tagline; ?></span>
			</div>
			<?php else: ?>
			<a href="<?php echo url::site();?>"><img src="<?php echo $banner; ?>" alt="<?php echo $site_name; ?>" /></a>
			<?php endif; ?>
			<!-- / logo -->


			<?php
				// Action::main_sidebar - Add Items to the Entry Page Sidebar
				Event::run('ushahidi_action.main_sidebar');
			?>

	
        </div>
       
        





	<!-- / main body -->





<div class="main_menu">

<ul>
	<li><a href="http://www.monithon.it/">HOME</a></li>
	
    <li ><a  href="#"><?php echo Kohana::lang('ui_main.monithon_works'); ?></a>
	<ul>
		<li ><a  href="http://www.monithon.it/page/index/2"><?php echo Kohana::lang('ui_main.monithon_about'); ?></a></li>
        <li ><a  href="http://www.monithon.it/page/index/1"><?php echo Kohana::lang('ui_main.monithon_idea'); ?></a></li>
		<li ><a  href="http://www.monithon.it/page/index/4"><?php echo Kohana::lang('ui_main.monithon_days'); ?></a></li>
        <li ><a  href="http://www.monithon.it/page/index/6"><?php echo Kohana::lang('ui_main.monithon_toolkit'); ?></a></li>
		
    </ul>
    <li ><a  href="#"><?php echo Kohana::lang('ui_main.monithon_citizen_monitoring'); ?></a>
	<ul>
    	<li ><a  href="http://www.monithon.it/reports/submit"><?php echo Kohana::lang('ui_main.submit'); ?></a></li>
		<li ><a  href="http://www.monithon.it/reports/"><?php echo Kohana::lang('ui_main.monithon_reports'); ?></a></li>
		<li ><a  href="http://www.monithon.it/alerts"><?php echo Kohana::lang('ui_main.alerts'); ?></a></li>
        <li ><a  href="http://www.monithon.it/feeds"><?php echo Kohana::lang('ui_main.monithon_report_news'); ?></a></li>
        
	</ul>
    <li ><a  href="http://www.monithon.it/blog">BLOG</a>
    <ul>
		<li ><a  href="http://www.monithon.it/blog/it/">Italiano</a></li>
        <li ><a  href="http://www.monithon.it/blog/en/">English</a></li>
    </ul>
    <li ><a  href="http://www.monithon.it/page/index/9">CREDITS</a></li>
	
	

</ul>
</div>



		<div id="middle">
			 <div class="background layoutleft"> 
 