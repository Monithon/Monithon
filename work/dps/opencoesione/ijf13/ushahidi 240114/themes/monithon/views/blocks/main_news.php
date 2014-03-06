<?php blocks::open("news");?>
<?php blocks::title(Kohana::lang('ui_main.official_news'));?>
<table class="table-list">
	<thead>
		<tr>
			<th scope="col"><?php echo Kohana::lang('ui_main.title'); ?></th>
            <th scope="col"><?php echo Kohana::lang('ui_main.date'); ?></th>
			<th scope="col"></th>
		</tr>
	</thead>
	<tbody>
		<?php
		if ($feeds->count() != 0)
		{
			foreach ($feeds as $feed)
			{
					$feed_id = $feed->id;
					$feed_title = text::limit_chars($feed->item_title, 80, '...', True);
					$feed_link = $feed->item_link;
					$feed_date = date('j.n.Y', strtotime($feed->item_date));
					$feed_source = text::limit_chars($feed->feed->feed_name, 15, "...");
			?>
			
            
            <tr>
				<td><a href="<?php echo $feed_link; ?>" target="_blank"><?php echo $feed_title ?></a></td>
                <td><?php echo $feed_date; ?></td>
                <td> <b> <?php echo "<class=\"none-separator\"> <a href=\"".url::base().'reports/submit?fid='.$feed_id."\">".Kohana::lang('ui_main.create_report')."</a>";?> </b></td>
			
			</tr>
			<?php
			}
		}
		else
		{
			?>
			<tr><td colspan="3"></td></tr>
			<?php
		}
		?>
	</tbody>
</table>
<br><br />
<i> Source: Google News </i>
<a class="more" href="<?php echo url::site() . 'feeds' ?>"><?php echo Kohana::lang('ui_main.view_more'); ?></a>
<div class="clear:both;"></div>
<?php blocks::close();?>