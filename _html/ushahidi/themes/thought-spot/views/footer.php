		<footer role="contentinfo" id="footer">
			<div class="footermenu">
				<ul>
					<?php if (Kohana::config('settings.site_contact_page')): ?>
					<li>
						<a href="<?php echo url::site()."contact"; ?>">
							<?php echo Kohana::lang('ui_main.contact'); ?>
						</a>
					</li>
					<?php endif; ?>
					<li>
						<a href="/page/index/3">Get Involved</a>
					</li>
					<li>
						<a href="https://www.facebook.com/MyThoughtSpot" class="facebook social-media-icon">Facebook</a>
					</li>
					<li>
						<a href="https://twitter.com/mythoughtspot" class="twitter social-media-icon">Twitter</a>
					</li>
					<li>
						<a href="http://instagram.com/mythoughtspot" class="instagram social-media-icon">Instagram</a>
					</li>
					<?php
						// Action::nav_main_bottom - Add items to the bottom links
						Event::run('ushahidi_action.nav_main_bottom');
					?>
				</ul>
			</div>

			<p class="crisis-alert">If you are in crisis, call 911.</p>
		</footer>

		<?php
			Event::run('ushahidi_action.main_footer');
		?>

		<!-- hardcode the js links -->
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyAgr8nzb8ORG5HEc7Bnrki_ac9Yy-8lDsA&amp;libraries=places"></script>
		<script type="text/javascript" src="/themes/thought-spot/js/script.js"></script>
	</body>
</html>
