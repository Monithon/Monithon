        <?php
		class OCFeed_Item_Model extends ORM
		{
		protected $belongs_to = array('OCfeed','location');
	
		// Database table name
		protected $table_name = 'OCfeed_item';
		} 

?>

<div id="content">
	<div class="content-bg">

		<?php if ($site_submit_report_message != ''): ?>
			<div class="green-box">
				<h3><?php echo $site_submit_report_message; ?></h3>
			</div>
		<?php endif; ?>

		<!-- start report form block -->
        <?php					
		


		if ( isset($_GET['fid']) AND intval($_GET['fid']) > 0 )
		{
				$feed_item_id = intval($_GET['fid']);
				$feed_item = ORM::factory('feed_item', $feed_item_id);

				if ($feed_item->loaded)
				{
				
					$form['incident_title'] = $feed_item->item_title;
					$form['incident_description'] = $feed_item->item_description;
					$form['incident_date'] = date('m/d/Y', strtotime($feed_item->item_date));
					$form['incident_hour'] = date('h', strtotime($feed_item->item_date));
					$form['incident_minute'] = date('i', strtotime($feed_item->item_date));
					$form['incident_ampm'] = date('a', strtotime($feed_item->item_date));

					// News Link
					$form['incident_news'][0] = $feed_item->item_link;

					// Does this newsfeed have a geolocation?
					if ($feed_item->location_id)
					{
						$form['location_id'] = $feed_item->location_id;
						$form['latitude'] = $feed_item->location->latitude;
						$form['longitude'] = $feed_item->location->longitude;
						$form['location_name'] = $feed_item->location->location_name;
					}
				}
		else
		{
		$feed_item_id = "";
		$incident_CUP = "";
		}
		
		}
        ?>
		

        
        <!-- start report form OC  -->
        <?php					
		
		if ( isset($_GET['OCid']) AND intval($_GET['OCid']) > 0 )
		{
				$OCfeed_item_id = intval($_GET['OCid']);
				$OCfeed_item = ORM::factory('OCfeed_item', $OCfeed_item_id);

				if ($OCfeed_item->loaded)
				{
				
					$form['incident_title'] = $OCfeed_item->item_title;
					$form['incident_description'] = $OCfeed_item->item_description;
					$form['incident_CUP'] = $OCfeed_item->item_CUP;
					
					

					$form['incident_news'][0] = $OCfeed_item->item_link;

					// Does this newsfeed have a geolocation?
					if ($OCfeed_item->location_id)
					{
						$form['location_name'] = $OCfeed_item->location->location_name;
						$form['location_id'] = $OCfeed_item->location_id;
						$form['latitude'] = $OCfeed_item->location->latitude;
						$form['longitude'] = $OCfeed_item->location->longitude;
						$form['location_name'] = $OCfeed_item->location->location_name;
					}
				}
		else
		{
		$ICfeed_item_id = "";
		$incident_CUP = "";
		}
		
		}
        ?>
        
        
        
        
		<?php print form::open(NULL, array('enctype' => 'multipart/form-data', 'id' => 'reportForm', 'name' => 'reportForm', 'class' => 'gen_forms')); ?>
		<input type="hidden" name="latitude" id="latitude" value="<?php echo $form['latitude']; ?>">
		<input type="hidden" name="longitude" id="longitude" value="<?php echo $form['longitude']; ?>">
		<input type="hidden" name="country_name" id="country_name" value="<?php echo $form['country_name']; ?>" />
		<input type="hidden" name="incident_zoom" id="incident_zoom" value="<?php echo $form['incident_zoom']; ?>" />

		<div class="big-block">
			<h1><?php echo Kohana::lang('ui_main.reports_submit_new'); ?></h1>
			<?php if ($form_error): ?>
			<!-- red-box -->
			<div class="red-box">
				<h3>Error!</h3>
				<ul>
					<?php
						foreach ($errors as $error_item => $error_description)
						{
							print (!$error_description) ? '' : "<li>" . $error_description . "</li>";
						}
					?>
				</ul>
			</div>
			<?php endif; ?>
			<div class="row">
				<input type="hidden" name="form_id" id="form_id" value="<?php echo $id?>">
			</div>
			<div class="report_left">
				<div class="report_row">
					<?php if(count($forms) > 1): ?>
					<div class="row">
						<h4><span><?php echo Kohana::lang('ui_main.select_form_type');?></span>
						<span class="sel-holder">
							<?php print form::dropdown('form_id', $forms, $form['form_id'],
						' onchange="formSwitch(this.options[this.selectedIndex].value, \''.$id.'\')"') ?>
						</span>
						<div id="form_loader"></div>
						</h4>
					</div>
					<?php endif; ?>
					<h4><?php echo Kohana::lang('ui_main.reports_title'); ?>  <span class="required">*</span> 
                    <span class="example"> </br>Il titolo del report di solito equivale al titolo del progetto su cui il report si concentra. In alcuni casi, pero', un report puo' avere ad oggetto piu' progetti. </span></h4>
					<?php print form::input('incident_title', $form['incident_title'], ' class="text long"'); ?>  
                    
                    <div class="report_row">
                    </br> <h4><?php echo Kohana::lang('ui_main.reports_CUP'); ?> 
                    <span class="example"> </br>Qui si puo' inserire, se gia' non presente, il CUP del progetto che si puo' trovare, ad esempio, su OpenCoesione nelle pagine dedicate a ciascun progetto </span></h4>
                    <?php print form::input('incident_CUP' , $form['incident_CUP'], 'class="text long"');?>
                     
                    </div>             
                    
                    
                    
				</div>
				<div class="report_row">
					<h4><?php echo Kohana::lang('ui_main.reports_description'); ?> <span class="required">*</span> 
                    <span class="example"> </br> Inserire in modo sintetico e il piu' possibile esaustivo i tratti salienti del progetto. Alcune informazioni di base potrebbero essere gia' presenti su OpenCoesione, altrimenti potete scrivere una sintesi di cio' di cui siete a conoscenza a partire dagli obiettivi, il tipo di attivita' realizzate e da realizzare, i destinatari, ecc.. </span></h4>
					<span class="allowed-html"></br><?php echo html::allowed_html(); ?></span>
					<?php print form::textarea('incident_description', $form['incident_description'], ' rows="20" class="textarea long" ') ?>
				</div>
				<div class="report_row" id="datetime_default">
					<h4>
						<a href="#" id="date_toggle" class="show-more"><?php echo Kohana::lang('ui_main.modify_date'); ?></a>
						<?php echo Kohana::lang('ui_main.date_time'); ?>: 
						<?php echo Kohana::lang('ui_main.today_at')." "."<span id='current_time'>".$form['incident_hour']
							.":".$form['incident_minute']." ".$form['incident_ampm']."</span>"; ?>
						<?php if($site_timezone): ?>
							<small>(<?php echo $site_timezone; ?>)</small>
						<?php endif; ?>
					</h4>
				</div>
				<div class="report_row hide" id="datetime_edit">
					<div class="date-box">
						<h4><?php echo Kohana::lang('ui_main.reports_date'); ?></h4>
						<?php print form::input('incident_date', $form['incident_date'], ' class="text short"'); ?>
						<script type="text/javascript">
							$().ready(function() {
								$("#incident_date").datepicker({ 
									showOn: "both", 
									buttonImage: "<?php echo url::file_loc('img'); ?>media/img/icon-calendar.gif", 
									buttonImageOnly: true 
								});
							});
						</script>
					</div>
					<div class="time">
						<h4><?php echo Kohana::lang('ui_main.reports_time'); ?></h4>
						<?php
							for ($i=1; $i <= 12 ; $i++)
							{
								// Add Leading Zero
								$hour_array[sprintf("%02d", $i)] = sprintf("%02d", $i);
							}
							for ($j=0; $j <= 59 ; $j++)
							{
								// Add Leading Zero
								$minute_array[sprintf("%02d", $j)] = sprintf("%02d", $j);
							}
							$ampm_array = array('pm'=>'pm','am'=>'am');
							print form::dropdown('incident_hour',$hour_array,$form['incident_hour']);
							print '<span class="dots">:</span>';
							print form::dropdown('incident_minute',$minute_array,$form['incident_minute']);
							print '<span class="dots">:</span>';
							print form::dropdown('incident_ampm',$ampm_array,$form['incident_ampm']);
						?>
						<?php if ($site_timezone != NULL): ?>
							<small>(<?php echo $site_timezone; ?>)</small>
						<?php endif; ?>
					</div>
					<div style="clear:both; display:block;" id="incident_date_time"></div>
				</div>
				<div class="report_row">
					<!-- Adding event for endtime plugin to hook into -->
				<?php Event::run('ushahidi_action.report_form_frontend_after_time'); ?>
				</div>
				<div class="report_row">
					<h4><?php echo Kohana::lang('ui_main.reports_categories'); ?> <span class="required">*</span></h4>
					<div class="report_category" id="categories">
					<?php
						$selected_categories = (!empty($form['incident_category']) AND is_array($form['incident_category']))
							? $selected_categories = $form['incident_category']
							: array();
							
						
						echo category::form_tree('incident_category', $selected_categories, 2);
						?>
					</div>
				</div>


				<?php
				// Action::report_form - Runs right after the report categories
				Event::run('ushahidi_action.report_form');
				?>

				
                
                <?php echo $custom_forms ?>

		
                
                <!-- INSERT HERE CUSTOM FORMS CODE!! -->
                
                
                
                
                
                
                
                
                
			</div>
			<div class="report_right">
 
            
                         
				<?php if (count($cities) > 1): ?>
                
				<div class="report_row">
					<h4><?php echo Kohana::lang('ui_main.reports_find_location'); ?></h4>
					<?php print form::dropdown('select_city',$cities,'', ' class="select" '); ?>
				</div>
				<?php endif; ?>
				<div class="report_row">
					<div id="divMap" class="report_map">
						<div id="geometryLabelerHolder" class="olControlNoSelect">
							<div id="geometryLabeler">
								<div id="geometryLabelComment">
									<span id="geometryLabel">
                                    
										<label><?php echo Kohana::lang('ui_main.geometry_label');?>:</label> 
										<?php print form::input('geometry_label', '', ' class="lbl_text"'); ?>
									</span>
									<span id="geometryComment">
										<label><?php echo Kohana::lang('ui_main.geometry_comments');?>:</label> 
										<?php print form::input('geometry_comment', '', ' class="lbl_text2"'); ?>
									</span>
								</div>
								<div>
									<span id="geometryColor">
										<label><?php echo Kohana::lang('ui_main.geometry_color');?>:</label> 
										<?php print form::input('geometry_color', '', ' class="lbl_text"'); ?>
									</span>
									<span id="geometryStrokewidth">
										<label><?php echo Kohana::lang('ui_main.geometry_strokewidth');?>:</label> 
										<?php print form::dropdown('geometry_strokewidth', $stroke_width_array, ''); ?>
									</span>
									<span id="geometryLat">
										<label><?php echo Kohana::lang('ui_main.latitude');?>:</label> 
										<?php print form::input('geometry_lat', '', ' class="lbl_text"'); ?>
									</span>
									<span id="geometryLon">
										<label><?php echo Kohana::lang('ui_main.longitude');?>:</label> 
										<?php print form::input('geometry_lon', '', ' class="lbl_text"'); ?>
									</span>
								</div>
							</div>
							<div id="geometryLabelerClose"></div>
						</div>
					</div>
					<div class="report-find-location">
						<div id="panel" class="olControlEditingToolbar"></div>
						<div class="btns">
							<ul>
								<li><a href="#" class="btn_del_last"><?php echo utf8::strtoupper(Kohana::lang('ui_main.delete_last'));?></a></li>
								<li><a href="#" class="btn_del_sel"><?php echo utf8::strtoupper(Kohana::lang('ui_main.delete_selected'));?></a></li>
								<li><a href="#" class="btn_clear"><?php echo utf8::strtoupper(Kohana::lang('ui_main.clear_map'));?></a></li>
							</ul>
						</div>
						<div style="clear:both;"></div>
						<?php 
						if ($form['latitude'] != 0)
						{
						print form::input('location_find', ($form['latitude'].', '.$form['longitude']), 'class="findtext"'); 
						}
						else
						{
						print form::input('location_find', '', ' title="'.Kohana::lang('ui_main.location_example').'" class="findtext"');
						}
						?>
						<input type="button" name="button" id="button" value="<?php echo Kohana::lang('ui_main.find_location'); ?>" class="btn_find" />
						<div id="find_loading" class="report-find-loading"></div>
						<div style="clear:both;" id="find_text"></br><?php echo Kohana::lang('ui_main.pinpoint_location'); ?>.</div>
					</div>
				</div>
                
                
 
                
                
				<?php Event::run('ushahidi_action.report_form_location', $id); ?>
				<div class="report_row">
					<h4>
						<?php echo Kohana::lang('ui_main.reports_location_name'); ?> 
						<span class="required">*</span><br />
						<span class="example"><?php echo Kohana::lang('ui_main.detailed_location_example'); ?></span>
					</h4>
					<?php print form::input('location_name', $form['location_name'], ' class="text long"'); ?>
				</div>

				<!-- News Fields -->
				<div id="divNews" class="report_row">
					<h4><?php echo Kohana::lang('ui_main.reports_news'); ?>  
                    <span class="example"> </br>
                    Inserite qui tutti i link utili per approfondire la conoscenza sul progetto e le evidenze raccolte. </span></h4></h4>
					
					<?php 
						// Initialize the counter
						$i = (empty($form['incident_news'])) ? 1 : 0;
					?>

					<?php if (empty($form['incident_news'])): ?>
						<div class="report_row">
							<?php print form::input('incident_news[]', '', ' class="text long2"'); ?>
							<a href="#" class="add" onClick="addFormField('divNews','incident_news','news_id','text'); return false;">add</a>
						</div>
					<?php else: ?>
						<?php foreach ($form['incident_news'] as $value): ?>
						<div class="report_row" id="<?php echo $i; ?>">
							<?php echo form::input('incident_news[]', $value, ' class="text long2"'); ?>
							<a href="#" class="add" onClick="addFormField('divNews','incident_news','news_id','text'); return false;">add</a>

							<?php if ($i != 0): ?>
								<?php $css_id = "#incident_news_".$i; ?>
								<a href="#" class="rem"	onClick="removeFormField('<?php echo $css_id; ?>'); return false;">remove</a>
							<?php endif; ?>

						</div>
						<?php $i++; ?>

						<?php endforeach; ?>
					<?php endif; ?>

					<?php print form::input(array('name'=>'news_id', 'type'=>'hidden', 'id'=>'news_id'), $i); ?>
				</div>


				<!-- Video Fields -->
				<div id="divVideo" class="report_row">
					<h4><?php print Kohana::lang('ui_main.external_video_link'); ?></h4>
					<?php 
						// Initialize the counter
						$i = (empty($form['incident_video'])) ? 1 : 0;
					?>

					<?php if (empty($form['incident_video'])): ?>
						<div class="report_row">
							<?php print form::input('incident_video[]', '', ' class="text long2"'); ?>
							<a href="#" class="add" onClick="addFormField('divVideo','incident_video','video_id','text'); return false;">add</a>
						</div>
					<?php else: ?>
						<?php foreach ($form['incident_video'] as $value): ?>
							<div class="report_row" id="<?php  echo $i; ?>">

							<?php print form::input('incident_video[]', $value, ' class="text long2"'); ?>
							<a href="#" class="add" onClick="addFormField('divVideo','incident_video','video_id','text'); return false;">add</a>

							<?php if ($i != 0): ?>
								<?php $css_id = "#incident_video_".$i; ?>
								<a href="#" class="rem"	onClick="removeFormField('<?php echo $css_id; ?>'); return false;">remove</a>
							<?php endif; ?>

							</div>
							<?php $i++; ?>
						
						<?php endforeach; ?>
					<?php endif; ?>

					<?php print form::input(array('name'=>'video_id','type'=>'hidden','id'=>'video_id'), $i); ?>
				</div>
				
				<?php Event::run('ushahidi_action.report_form_after_video_link'); ?>

				<!-- Photo Fields -->
				<div id="divPhoto" class="report_row">
					<h4><?php echo Kohana::lang('ui_main.reports_photos'); ?>
                    <span class="example"> </br>
                    Le immagini non devono superare 1Mb. Nel caso fossero presenti persone nelle vostre fotografie, dovreste aver ottenuto il consenso alla loro pubblicazione. Non pubblicate foto dove siano presenti minori se non opportunamente oscurate affinche' i soggetti non siano riconoscibili. </br> </span></h4>
					<?php 
						// Initialize the counter
						$i = (empty($form['incident_photo']['name'][0])) ? 1 : 0;
					?>

					<?php if (empty($form['incident_photo']['name'][0])): ?>
					<div class="report_row">
                    
						<?php print form::upload('incident_photo[]', '', ' class="file long2"'); ?>
						<a href="#" class="add" onClick="addFormField('divPhoto', 'incident_photo','photo_id','file'); return false;">add</a>
					</div>
					<?php else: ?>
						<?php foreach ($form['incident_photo']['name'] as $value): ?>

							<div class="report_row" id="<?php echo $i; ?>">
								<?php print form::upload('incident_photo[]', $value, ' class="file long2"'); ?>
								<a href="#" class="add" onClick="addFormField('divPhoto','incident_photo','photo_id','file'); return false;">add</a>

								<?php if ($i != 0): ?>
									<?php $css_id = "#incident_photo_".$i; ?>
									<a href="#" class="rem"	onClick="removeFormField('<?php echo $css_id; ?>'); return false;">remove</a>
								<?php endif; ?>

							</div>

							<?php $i++; ?>

						<?php endforeach; ?>
					<?php endif; ?>

					<?php print form::input(array('name'=>'photo_id','type'=>'hidden','id'=>'photo_id'), $i); ?>
				</div>
									
				<div class="report_row">
					<input name="submit" type="submit" value="<?php echo Kohana::lang('ui_main.reports_btn_submit'); ?>" class="btn_submit" /> 
				</div>
			</div>
		</div>
		<?php print form::close(); ?>
		<!-- end report form block -->
	</div>
</div>
