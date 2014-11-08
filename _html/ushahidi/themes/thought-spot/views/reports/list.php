<h2 class="spots-header">Showing <?php echo $stats_breadcrumb; ?></h2>

<div class="rb_nav-controls r-5 pagination-top">
	<ul class="link-toggle lt-icons-only link-toggle-prev">
		<li><a href="#page_<?php echo $previous_page; ?>" class="prev"><?php echo Kohana::lang('ui_main.previous'); ?></a></li>
	</ul>
	<?php echo $pagination; ?>
	<ul class="link-toggle lt-icons-only link-toggle-next">
		<li><a href="#page_<?php echo $next_page; ?>" class="next"><?php echo Kohana::lang('ui_main.next'); ?></a></li>
	</ul>
</div>

<div class="rb_list-and-map-box">
	<div id="rb_list-view">
	<?php
		foreach ($incidents as $incident) {
			$incident_id = $incident->incident_id;
			$incident_title = strip_tags($incident->incident_title);
			$incident_description = strip_tags($incident->incident_description);
			$incident_url = Incident_Model::get_url($incident_id);

			$incident_description = text::limit_chars(strip_tags($incident_description), 140, "…", true);
			$incident_date = date('H:i M d, Y', strtotime($incident->incident_date));
			$location_id = $incident->location_id;
			$location_name = $incident->location_name;
			$incident_verified = $incident->incident_verified;

			if ($incident_verified) {
				$incident_verified = '<span class="r_verified">'.Kohana::lang('ui_main.verified').'</span>';
				$incident_verified_class = "verified";
			} else {
				$incident_verified = '<span class="r_unverified">'.Kohana::lang('ui_main.unverified').'</span>';
				$incident_verified_class = "unverified";
			}
		?>
		<div id="incident_<?php echo $incident_id ?>" class="rb_report <?php echo $incident_verified_class; ?>">
			<div class="r_media">
				<!-- Category Selector -->
				<div class="r_categories">
					<h4><?php echo Kohana::lang('ui_main.categories'); ?></h4>
					<?php
						$categories = ORM::Factory('category')->join('incident_category', 'category_id', 'category.id')->where('incident_id', $incident_id)->find_all();
						foreach ($categories as $category):
							if($category->category_visible == 0) continue;
					?>
					<a class="r_category" href="<?php echo url::site("reports/?c=$category->id") ?>">
						<span class="r_cat-box"></span>
						<span class="r_cat-desc"><?php echo Category_Lang_Model::category_title($category->id); ?></span>
					</a>
					<?php
						endforeach;
					?>
				</div>

				<?php
					// Action::report_extra_media - Add items to the report list in the media section
					Event::run('ushahidi_action.report_extra_media', $incident_id);
				?>
			</div>

			<div class="r_details">
				<h3>
					<a class="r_title" href="<?php echo $incident_url; ?>">
						<?php echo htmlentities($incident_title, ENT_QUOTES, "UTF-8"); ?>
					</a>
					<?php echo $incident_verified; ?>
				</h3>
				<p class="r_date r-3 bottom-cap"><?php echo $incident_date; ?></p>
				<div class="r_description">
					<?php echo $incident_description; ?>
				</div>
				<p class="r_location">
					<a href="<?php echo url::site("reports/?l=$location_id"); ?>"><?php echo html::specialchars($location_name); ?></a>
				</p>
				<?php
					// Action::report_extra_details - Add items to the report list details section
					Event::run('ushahidi_action.report_extra_details', $incident_id);
				?>
			</div>
		</div>
	<?php
		}
	?>
	</div>
</div>

<div class="rb_nav-controls r-5 pagination-bottom">
	<ul class="link-toggle lt-icons-only link-toggle-prev">
		<li><a href="#page_<?php echo $previous_page; ?>" class="prev"><?php echo Kohana::lang('ui_main.previous'); ?></a></li>
	</ul>
	<?php echo $pagination; ?>
	<ul class="link-toggle lt-icons-only link-toggle-next">
		<li><a href="#page_<?php echo $next_page; ?>" class="next"><?php echo Kohana::lang('ui_main.next'); ?></a></li>
	</ul>
</div>
