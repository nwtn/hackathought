		<main role="main" id="main">
			<div class="description">
				<div id="description-default">
					<p>Thought Spot is a live map designed by students, for students in the Greater Toronto Area.</p>
					<p>The map allows students to easily identify and access health and wellness services, and discover resources that are relevant to their experiences, situation, and location.</p>
				</div>
				<div id="description-live"></div>
			</div>

			<!-- move this later -->
			<section id="categories">
				<h2>Filter by Category</h2>
				<div id="report-category-filter">
					<ul id="category_switch" class="category-filters">
						<?php
							foreach ($categories as $category => $category_info) {
								$category_title = htmlentities($category_info[0], ENT_QUOTES, "UTF-8");
								$category_description = htmlentities(Category_Lang_Model::category_description($category), ENT_QUOTES, "UTF-8");

								echo '
									<li>
								    	<a href="#" id="cat_'. $category .'" data-hover="cat_' . $category . '">
											' . $category_title . '
										</a>
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
			</section>

			<section id="results">
				<h2>Results</h2>

				<section id="results-filtering">
					<h3>Additional Filtering</h3>
					<ul>
						<li>Relevance</li>
						<li>Location</li>
						<li>Ratings</li>
						<li>Timing</li>
					</ul>
				</section>

				<ol>
					<li class="h-card">
						<div class="p-name">St. Michael’s Hospital STEPS for Youth</div>
						<div class="p-note">Support for youth 16–23 experiencing a first episode of psychosis</div>
					</li>
				</ol>
			</section>

			<section id="content">
				<h2>Map</h2>
				<?php echo $div_map; ?>
				<div id="map-canvas"></div>
			</section>

			<!--
			<section id="garbage">
				<h2>Garbage</h2>
				<ul class="content-column">
					<?php blocks::render(); ?>
				</ul>
			</section>
			-->
		</main>
