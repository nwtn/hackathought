<?php
	blocks::open("reports");
	blocks::title(Kohana::lang('ui_main.reports_listed'));
?>

<table class="table-list">
	<thead>
		<tr>
			<th scope="col" class="title"><?php echo Kohana::lang('ui_main.title'); ?></th>
			<th scope="col" class="location"><?php echo Kohana::lang('ui_main.location'); ?></th>
			<th scope="col" class="date"><?php echo Kohana::lang('ui_main.date'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php
			if ($incidents->count() == 0) {
		?>
			<tr>
				<td colspan="3"><?php echo Kohana::lang('ui_main.no_reports'); ?></td>
			</tr>
		<?php
			}
			$i = 0;
			foreach ($incidents as $incident) {
				if (++$i > 5) break;
				$incident_id = $incident->id;
				$incident_title = text::limit_chars(strip_tags($incident->incident_title), 100, '...', True);
				$incident_date = $incident->incident_date;
				$incident_date = date('M j Y', strtotime($incident->incident_date));
				$incident_location = $incident->location->location_name;
		?>
		<tr>
			<td><a href="<?php echo url::site() . 'reports/view/' . $incident_id; ?>"> <?php echo html::specialchars($incident_title) ?></a></td>
			<td><?php echo html::specialchars($incident_location) ?></td>
			<td><?php echo $incident_date; ?></td>
		</tr>
		<?php
			}
		?>
	</tbody>
</table>
<div class="button">
	<a class="more button" href="<?php echo url::site() . 'reports/' ?>"><?php echo Kohana::lang('ui_main.view_more'); ?></a>
</div>
<?php blocks::close();?>
