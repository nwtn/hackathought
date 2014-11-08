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
		<div id="content" class="clearingfix">
			<?php
				echo $div_map;
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
