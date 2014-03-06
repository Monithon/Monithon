

<script type="text/javascript">
$(function(){
	
	// show/hide report filters and layers boxes on home page map
	$("a.toggle").toggle(
		function() { 
			$($(this).attr("href")).show();
			$(this).addClass("active-toggle");
		},
		function() { 
			$($(this).attr("href")).hide();
			$(this).removeClass("active-toggle");
		}  
	);
	
});

</script>


<!-- main body -->
<div id="main" class="clearingfix">
	<div id="mainmiddle">




        
        
        <!-- INSTERT REMOVED CODE HERE! -->
        
   <div id="report-map-filter-box" class="clearingfix">
        
        
			
			<?php
			if ($layers)
			{
				?>
				<div id="layers-box">
					<!--<a class="btn toggle" id="layers-menu-toggle" class="" href="#kml_switch"><?php echo Kohana::lang('ui_main.financed_projects');?> <span class="btn-icon ic-right">&raquo;</span></a>
					<!-- Layers (KML/KMZ) -->
                    
                    <div id="layers-menu-toggle">
                                
                    
					<ul id="kml_switch" class="category-filters map-menu-box"> 
                    
                    	<div id="istruzioni">
                    		<h5>
      						<p>Invia il tuo report di monitoraggio civico!</p>
 							</h5>
                        <p><h7> I pallini colorati nella mappa rappresentano i report di monitoraggio gia' inviati, su vari progetti tracciati sul portale pubblico <a href="http://www.opencoesione.gov.it">OpenCoesione</a>.</h7> </p><br/>
                        <p><h7>Per creare un nuovo report: </h7> </p>
                    	
                        <p>1. <a href="http://www.monithon.it/login">Registrati o accedi</a> a Monithon.it</p>

                    	<p>2. Clicca su una delle seguenti tipologie di progetto su cui sono gia' avviate collaborazioni con associazioni (es. Libera, Action Aid) o amministrazioni (es. MIUR - @PONREC):
                       
              
                		</div>
                        
                        
						<?php
					
						 foreach ($layers as $layer => $layer_info)
						{
							$layer_name = $layer_info[0];
							
							$layer_url = $layer_info[2];
							$layer_file = $layer_info[3];
							$layer_link = (!$layer_url) ?
								url::base().Kohana::config('upload.relative_directory').'/'.$layer_file :
								$layer_url;
							echo '<li><a href="#" id="layer_'. $layer .'">
							
							<span class="layer-name">'.$layer_name.'</span></a></li>';
						}
						?>
                        </p>
                    	<div id="istruzioni">
                    	<p> 3. Sulla mappa appariranno nuove icone: ogni icona rappresenta un progetto. Clicca sull'icona poi su "Crea un report!"</p>
                    	<p><br/>...OPPURE <a href="http://www.monithon.it/reports/submit">crea un report partendo da zero su qualasiasi progetto finanziato con fondi pubblici</a><h7>: scegli un progetto su <a href="http://www.opencoesione.gov.it">OpenCoesione</a> e copia nel report il titolo e il CUP (Codice Unico Progetto)</h7></p> </br>
                        <p><h7> Per supporto e proposte scrivici a redazione@monithon.it </h7></div>

					</ul>

                    </div>
				</div>
				<!-- /Layers -->
				<?php
			}
			?>
			
			
			
		</div>
            


			<!-- / additional content -->
		</div>
		<!-- / right column -->

		<!-- content column -->
		<div id="content" class="clearingfix">
				<?php
				// Map and Timeline Blocks
				echo $div_map;
				echo $div_timeline;
				?>
			</div>
		</div>
		<!-- / content column -->

	</div>
</div>






 <div class="content-big-container">
 <div class="content-container">
<div class="content-blocks clearingfix">



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



<div class="content-blockblog"><h5><a href="http://www.monithon.it/blog/it/">Monithon Blog</a></h5>


<table class="table-list">



 	<?php
	/*
	Here, we'll loop through all of the items in the feed, and $item represents the current item in the loop.
	*/
	
	
	foreach ($bfeed->get_items(0, 4) as $item):
	$feedDescription = $item->get_content();
    $description = $item->get_description();
	?>
    
  


<tr> <td>

<a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a> <br><br /> <h4> <?php echo $item->get_date('j.n.Y'); ?> <br><br /> </h4><?php echo $item->get_description(); ?> <br><br /> 

</tr> </td>



 
	<?php endforeach; ?>
 </table>
 

    
<a class="more" href="http://monithon.it/blog/" target="_blank">Vedi tutti i post</a> <a class="more" href="http://monithon.it/blog/en" target="_blank">Monithon Blog in English</a> <a class="more" href="http://monithon.it/blog/it/feed/" target="_blank">RSS</a><div style="clear:both;"></div></div>

</div>
</div>  	





<!-- content -->
<div class="content-container">

	<!-- content blocks -->
	<div class="content-blocks clearingfix">
		<ul class="content-column">
			<?php blocks::render(); ?>
		</ul>
	</div>
	<!-- /content blocks -->

</div>
</div>
<!-- content -->



