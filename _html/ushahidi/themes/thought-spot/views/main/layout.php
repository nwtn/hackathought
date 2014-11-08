<div id="main" class="clearingfix">
	<div class="section" id="section-1">
		<h2>Thought Spot</h2>
		<p>Thought Spot is a live map designed by students, for students in the Greater Toronto Area. The map allows students to easily identify and access health and wellness services, and discover resources that are relevant to their experiences, situation, and location.</p>
	</div>

	<div id="report-category-filter">
		<ul id="category_switch" class="category-filters">
			<li>
				<a class="active" id="cat_0" href="#">
					<span class="category-title"><?php echo Kohana::lang('ui_main.all_categories');?></span>
				</a>
			</li>
			<?php
				foreach ($categories as $category => $category_info) {
					$category_title = htmlentities($category_info[0], ENT_QUOTES, "UTF-8");
					$category_description = htmlentities(Category_Lang_Model::category_description($category), ENT_QUOTES, "UTF-8");

					echo '
						<li>
					    	<a href="#" id="cat_'. $category .'" title="'.$category_description.'">
								<div class="category-title">'.$category_title.'</div>
							</a>
					';

					// Get Children
					echo '
							<div class="hide" id="child_'. $category .'">
					';
					if (sizeof($category_info[3]) != 0) {
						echo '
							<ul>
						';
						foreach ($category_info[3] as $child => $child_info) {
							$child_title = htmlentities($child_info[0], ENT_QUOTES, "UTF-8");
							$child_description = htmlentities(Category_Lang_Model::category_description($child), ENT_QUOTES, "UTF-8");

							echo '
								<li>
									<a href="#" id="cat_'. $child .'" title="'.$child_description.'">
										<div class="category-title">'.$child_title.'</div>
									</a>
								</li>
							';
						}
						echo '
							</ul>
						';
					}
					echo '
						</div>
					</li>
					';
				}
			?>
			</ul>
		</div>

		<?php
			// Action::main_sidebar_post_filters - Add Items to the Entry Page after filters
			Event::run('ushahidi_action.main_sidebar_post_filters');
		?>
	</div>

	<div id="mainmiddle">
		<div id="the-filters" class="map-menu-box">
			<?php
				// Action::main_sidebar_pre_filters - Add Items to the Entry Page before filters
				Event::run('ushahidi_action.main_sidebar_pre_filters');

				if ($layers) {
			?>
			<div id="layers-box">
				<a class="btn toggle" id="layers-menu-toggle" href="#kml_switch">
					<?php echo Kohana::lang('ui_main.layers');?>
					<span class="btn-icon ic-right">&raquo;</span>
				</a>

				<ul id="kml_switch" class="category-filters map-menu-box">
					<?php
					foreach ($layers as $layer => $layer_info) {
						$layer_name = $layer_info[0];
						$layer_url = $layer_info[2];
						$layer_file = $layer_info[3];
						$layer_link = (!$layer_url) ? url::base().Kohana::config('upload.relative_directory').'/'.$layer_file : $layer_url;
						echo '<li><a href="#" id="layer_'. $layer .'">
						<span class="layer-name">'.$layer_name.'</span></a></li>';
					}
					?>
				</ul>
			</div>
			<?php
				}

				if (isset($shares)) {
			?>
			<div id="other-deployments-box">
				<a class="btn toggle" id="other-deployments-menu-toggle" href="#sharing_switch">
					<?php echo Kohana::lang('ui_main.other_ushahidi_instances');?>
					<span class="btn-icon ic-right">&raquo;</span>
				</a>
				<ul id="sharing_switch" class="category-filters map-menu-box">
					<?php
						foreach ($shares as $share => $share_info)	{
							$sharing_name = $share_info[0];
							echo '
								<li>
									<a href="#" id="share_'. $share .'">
										<span class="category-title">'.$sharing_name.'</span>
									</a>
								</li>
							';
						}
					?>
				</ul>
			</div>
			<?php
				}

				if (Kohana::config('settings.allow_reports')) {
			?>
				<a class="btn toggle" id="how-to-report-menu-toggle" href="#how-to-report-box">
					<?php echo Kohana::lang('ui_main.how_to_report'); ?>
					<span class="btn-icon ic-question">&raquo;</span>
				</a>
				<div id="how-to-report-box" class="map-menu-box">
					<div>
						<?php if (!empty($phone_array)) { ?>
						<div>
							<?php
								echo Kohana::lang('ui_main.report_option_1');
								foreach ($phone_array as $phone) {
							?>
							<strong><?php echo $phone; ?></strong>
								<?php if ($phone != end($phone_array)) { ?>
									<br/>
								<?php } ?>
							<?php } ?>
						</div>
						<?php } ?>

						<?php if (!empty($report_email)) { ?>
						<div>
							<strong><?php echo Kohana::lang('ui_main.report_option_2'); ?>:</strong><br />
							<a href="mailto:<?php echo $report_email?>"><?php echo $report_email; ?></a>
						</div>
						<?php } ?>

						<?php if (!empty($twitter_hashtag_array)) { ?>
						<div>
							<strong><?php echo Kohana::lang('ui_main.report_option_3'); ?>:</strong><br />
							<?php foreach ($twitter_hashtag_array as $twitter_hashtag) { ?>
								<span>#<?php echo $twitter_hashtag; ?></span>
								<?php if ($twitter_hashtag != end($twitter_hashtag_array)) { ?>
									<br />
								<?php } ?>
							<?php } ?>
						</div>
						<?php } ?>

						<div>
							<a href="<?php echo url::site() . 'reports/submit/'; ?>"><?php echo Kohana::lang('ui_main.report_option_4'); ?></a>
						</div>
					</div>
				</div>
			<?php
				}
			?>
		</div>

		<div id="content" class="clearingfix">
			<?php
				echo $div_map;
				echo $div_timeline;
			?>
		</div>
		<div class="support-box">Trouble using the map? <a href="/page/index/2">Consult the FAQ for help</a></div>
	</div>

	<div class="content-container">
		<div class="content-blocks clearingfix">
			<ul class="content-column">
				<?php blocks::render(); ?>
			</ul>
		</div>
	</div>
