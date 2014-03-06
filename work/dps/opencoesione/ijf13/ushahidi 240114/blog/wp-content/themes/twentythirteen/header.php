<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->


<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>




	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
    


    <div class="rapidxwpr floatholder">
    
</head>



<body <?php body_class(); ?>>



	<div id="page" class="hfeed site">
   
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "8454dd28-ca11-44c0-aaaa-3f4b24b4b63f", doNotHash: true, doNotCopy: true, hashAddressBar: false});</script>




<div class="social">

<span class='st_twitter' displayText='Tweet'></span>

   &nbsp  Seguici su &nbsp <a href="http://www.twitter.com/monithon" target="_blank"><img src="http://www.monithon.it/media/tiny_twitter_icon.gif"/></a> &nbsp
   <a href="https://www.facebook.com/Monithon" target="_blank"><img src="http://www.monithon.it/media/tiny-facebook-icon.png"/></a>
    <!-- <span class='st_fblike' displayText='Facebook Like'></span>  -->

</div>



		<!-- <header id="masthead" class="site-header" role="banner">
			<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</a>  -->
            
    <div class="logo">

    <br></br>
    <br> </br>
 
    <a href="http://www.monithon.it/"><img src="http://www.monithon.it/blog/logo monithon opencoesione ushahidi 2014 VER6.png" alt="Monithon" /></a>

<?php
 $currentlang = get_bloginfo('language');
 if($currentlang=="en-US"):
 ?>
<!--

      		<div class="submit1">
            <div class="submit-incident">
                        <a href="http://www.monithon.it/reports/submit">SUBMIT A REPORT</a>
			</div>
            </div> 
            
            <div class="submit2">
            <div class="submit-incident">
                        <a href="http://www.monithon.it/page/index/7">SUGGEST A MONITHON<br />
IN YOUR TOWN</a>
			</div>
            </div>
            
            
        
           
            -->
              </div> 
              
			<div class="main_menu">

<ul>
	<li><a href="http://www.monithon.it/">HOME</a></li>
	
    <li ><a  href="#">HOW IT WORKS</a>
	<ul>
		<li ><a  href="http://www.monithon.it/page/index/2">About</a></li>
        <li ><a  href="http://www.monithon.it/page/index/1">The idea behind it [ITA]</a></li>
		<li ><a  href="http://www.monithon.it/page/index/4">Monithon Days [ITA]</a></li>
        <li ><a  href="http://www.monithon.it/page/index/6">Monithon toolkit [ITA]</a></li>		
    </ul>
    <li ><a  href="#">CITIZEN MONITORING REPORTS</a>
	<ul>
    	<li ><a  href="http://www.monithon.it/reports/submit">Submit a report</a></li>
		<li ><a  href="http://www.monithon.it/reports/">Approved reports</a></li>
		<li ><a  href="http://www.monithon.it/alerts">Get alerts</a></li>
        <li ><a  href="http://www.monithon.it/feeds">News on development projects</a></li>

	</ul>
    <li ><a  href="http://www.monithon.it/blog">BLOG</a>
    <ul>
		<li ><a  href="http://www.monithon.it/blog/it/">Italiano</a></li>
        <li ><a  href="http://www.monithon.it/blog/en/">English</a></li>
    </ul>
    <li ><a  href="http://www.monithon.it/page/index/9">CREDITS</a></li>
	
	

</ul>
			</div>
            
<?php else: ?>

<!--
      		<div class="submit1">
            <div class="submit-incident">
                        <a href="http://www.monithon.it/reports/submit">CREA UN REPORT</a>
			</div>
            </div>
            
            <div class="submit2">
            <div class="submit-incident">
                        <a href="http://www.monithon.it/page/index/7">PROPONI UN MONITHON<br />
NELLA TUA CITTA'</a>
			</div>
            </div>
            
            
           
            
            
            -->
             </div>
            
			<div class="main_menu">

<ul>
	<li><a href="http://www.monithon.it/">HOME</a></li>
	
    <li ><a  href="#">COME FUNZIONA MONITHON</a>
	<ul>
		<li ><a  href="http://www.monithon.it/page/index/2">About [EN]</a></li>
        <li ><a  href="http://www.monithon.it/page/index/1">L'idea</a></li>
		<li ><a  href="http://www.monithon.it/page/index/4">Monithon Days</a></li>
        <li ><a  href="http://www.monithon.it/page/index/6">Guida al Monithon</a></li>		
    </ul>
    <li ><a  href="#">I REPORT DI MONITORAGGIO</a>
	<ul>
    	<li ><a  href="http://www.monithon.it/reports/submit">Crea un nuovo report</a></li>
		<li ><a  href="http://www.monithon.it/reports/">I report approvati</a></li>
		<li ><a  href="http://www.monithon.it/alerts">Abbonati ai report della tua zona</a></li>
        <li ><a  href="http://www.monithon.it/feeds">News sui progetti finanziati</a></li>

	</ul>
    <li ><a  href="http://www.monithon.it/blog">BLOG</a>
    <ul>
		<li ><a  href="http://www.monithon.it/blog/it/">Italiano</a></li>
        <li ><a  href="http://www.monithon.it/blog/en/">English</a></li>
    </ul>
    <li ><a  href="http://www.monithon.it/page/index/9">CREDITS</a></li>
	
	

</ul>
			</div>

<?php endif; ?> 
    

    


    




		<div id="main" class="site-main">



