				</div>
			</div>
		</div>

		<div id="footer" class="rapidxwpr clearingfix">
			<div class="rapidxwpr floatholder">
				<div class="footer-social-media">
					<a href="https://twitter.com/mythoughtspot" target="_blank" class="twitter social-media-icon" title="myThoughtSpot">Twitter</a>
					<a href="http://instagram.com/mythoughtspot" target="_blank" class="instagram social-media-icon" title="myThoughtSpot">Instagram</a>
					<a href="https://www.facebook.com/MyThoughtSpot" target="_blank" class="facebook social-media-icon" title="Thought Spot">Facebook</a>
				</div>
				<div class="footer-links">
					<p class="crisis-alert">If you are in crisis, call 911.</p>
				</div>

				<div class="footermenu">
					<ul class="clearingfix">
						<li>
							<a class="item1" href="<?php echo url::site(); ?>">
								<?php echo Kohana::lang('ui_main.home'); ?>
							</a>
						</li>

						<?php if (Kohana::config('settings.allow_reports')): ?>
						<li>
							<a href="<?php echo url::site()."reports/submit"; ?>">
								<?php echo Kohana::lang('ui_main.submit'); ?>
							</a>
						</li>
						<?php endif; ?>

						<?php if (Kohana::config('settings.allow_alerts')): ?>
						<li>
							<a href="<?php echo url::site()."alerts"; ?>">
								<?php echo Kohana::lang('ui_main.alerts'); ?>
							</a>
						</li>
						<?php endif; ?>

						<li>
							<a href="/reports">Spots</a>
						</li>
						<li>
							<a href="/page/index/1">About</a>
						</li>
						<li>
							<a href="/page/index/2">FAQ</a>
						</li>
						<li>
							<a href="/page/index/3">Get Involved</a>
						</li>

						<?php if (Kohana::config('settings.site_contact_page')): ?>
						<li>
							<a href="<?php echo url::site()."contact"; ?>">
								<?php echo Kohana::lang('ui_main.contact'); ?>
							</a>
						</li>
						<?php endif; ?>

						<?php
							// Action::nav_main_bottom - Add items to the bottom links
							Event::run('ushahidi_action.nav_main_bottom');
						?>
					</ul>
					<?php if ($site_copyright_statement != ''): ?>
		      		<p><?php echo $site_copyright_statement; ?></p>
			      	<?php endif; ?>
				</div>

				<div class="footer-links">
					<p><a class="privacy-policy" href="/page/index/4">Privacy Policy</a></p>
					<p><a class="ushahidi-attribution" href="http://www.ushahidi.com/">Powered by the Ushahidi Platform</a></p>
				</div>
			</div>
		</div>

		<?php
			Event::run('ushahidi_action.main_footer');
		?>

		<!-- hardcode the js link -->
		<script type="text/javascript" src="/themes/thought-spot/js/script.js" />
	</body>
</html>
