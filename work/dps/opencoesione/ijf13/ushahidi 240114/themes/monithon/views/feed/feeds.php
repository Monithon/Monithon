<div id="content">
	<div class="content-bg">
		<!-- start block -->
		<div class="big-block">
			<h1><?php echo Kohana::lang('ui_main.official_news'); ?> </h1>
			<div class="report_rowtitle">
				<div class="report_col12">
					<strong><?php echo Kohana::lang('feeds.title');?></strong>
				</div>
				<div class="report_col13">
					<strong><?php echo Kohana::lang('feeds.date');?></strong>
				</div>
                <div class="report_col14">
					<strong>Crea Report</strong>
				</div>
			</div>
			<?php
				foreach ($feeds as $feed)
				{
					$feed_id = $feed->id;
					$feed_title = text::limit_chars($feed->item_title, 240, '...', True);
					$feed_link = $feed->item_link;
					$feed_date = date('M j Y', strtotime($feed->item_date));


					print "<div class=\"report_row1\">";
					print "		<div class=\"report_details report_col12\">";
					print "			<h3><a href=\"$feed_link\">" . $feed_title . "</a></h3>";
					print "		</div>";
					print "		<div class=\"report_date report_col13\">";
					print $feed_date;
					print "		</div>";
					print "		<div class=\"report_source report_col14\">";
					echo "<class=\"none-separator\"> <a href=\"".url::base().'reports/submit?fid='.$feed_id."\">".Kohana::lang('ui_main.create_report')."</a>";
					print "		</div>";
					print "</div>";
				}
			?>
			<?php echo $pagination; ?>
		</div>
		<!-- end block -->
	</div>
</div>