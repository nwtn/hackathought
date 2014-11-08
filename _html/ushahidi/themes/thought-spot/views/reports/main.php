<div id="content">
	<div class="content-bg">
		<div class="big-block">
			<div class="section" id="section-1">
				<h2>Thought Spots</h2>
				<p>This is a chronological list of spots that have been added to the map. A Thought Spot is a resource with a physical location, accessible through self-referral, and servicing post-secondary students in the GTA to improve their mental health and wellbeing.</p>
			</div>

			<div id="tooltip-box">
				<ul class="inline-links">
					<li>
						<a title="<?php echo Kohana::lang('ui_main.all_time'); ?>" class="btn-date-range active" id="dateRangeAll" href="#">
							<?php echo Kohana::lang('ui_main.all_time')?>
						</a>
					</li>
					<li>
						<a title="<?php echo Kohana::lang('ui_main.today'); ?>" class="btn-date-range" id="dateRangeToday" href="#">
							<?php echo Kohana::lang('ui_main.today'); ?>
						</a>
					</li>
					<li>
						<a title="<?php echo Kohana::lang('ui_main.this_week'); ?>" class="btn-date-range" id="dateRangeWeek" href="#">
							<?php echo Kohana::lang('ui_main.this_week'); ?>
						</a>
					</li>
					<li>
						<a title="<?php echo Kohana::lang('ui_main.this_month'); ?>" class="btn-date-range" id="dateRangeMonth" href="#">
							<?php echo Kohana::lang('ui_main.this_month'); ?>
						</a>
					</li>
				</ul>

				<p class="labeled-divider">
					<span><?php echo Kohana::lang('ui_main.choose_date_range'); ?>:</span>
				</p>

				<?php echo form::open(NULL, array('method' => 'get')); ?>
					<div>
						<?php echo Kohana::lang('ui_admin.from')?>:
						<input id="report_date_from" type="text" />
					</div>

					<div>
						<?php echo ucfirst(strtolower(Kohana::lang('ui_admin.to'))); ?>:
						<input id="report_date_to" type="text" />
					</div>

					<a href="#" id="applyDateFilter" class="filter-button">
						<?php echo Kohana::lang('ui_main.go')?>
					</a>
				<?php echo form::close(); ?>
			</div>

			<div>
				<div id="reports-box">
					<?php echo $report_listing_view; ?>
				</div>

				<div id="filters-box">
					<h2><?php echo Kohana::lang('ui_main.filter_reports_by'); ?></h2>

					<div id="accord">
						<h3>
							<a class="f-title" href="#"><?php echo Kohana::lang('ui_main.category')?></a>
							<a href="#" class="small-link-button f-clear reset button" onclick="removeParameterKey('c', 'fl-categories');">
								<?php echo Kohana::lang('ui_main.clear')?>
							</a>
						</h3>
						<div class="f-category-box">
							<ul class="filter-list fl-categories" id="category-filter-list">
								<li>
									<a href="#" id="filter_link_cat_0" title="All Categories">
										<span class="item-title"><?php echo Kohana::lang('ui_main.all_categories'); ?></span>
										<span class="item-count" id="all_report_count"><?php echo $report_stats->total_reports; ?></span>
									</a>
								</li>
								<?php echo $category_tree_view; ?>
							</ul>
						</div>

						<h3>
							<a class="f-title" href="#"><?php echo Kohana::lang('ui_main.custom_fields'); ?></a>
							<a href="#" class="small-link-button f-clear reset button" onclick="removeParameterKey('cff', 'fl-customFields');">
								<?php echo Kohana::lang('ui_main.clear'); ?>
							</a>
						</h3>
						<div class="f-customFields-box">
							<?php echo $custom_forms_filter; ?>
						</div>
						<?php
							// Action, allows plugins to add custom filters
							Event::run('ushahidi_action.report_filters_ui');
						?>
					</div>

					<div id="filter-controls">
						<a href="#" id="applyFilters" class="filter-button button">
							<?php echo Kohana::lang('ui_main.filter_reports'); ?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
