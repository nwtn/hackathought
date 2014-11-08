			</div>
		</div>
		<!-- / main body -->

	</div>
	<!-- / wrapper -->

	<!-- footer -->
	<div id="footer" class="rapidxwpr clearingfix">
		<div id="underfooter"></div>

		<!-- footer content -->
		<div class="rapidxwpr floatholder">
		
		<!-- added by KH 
		social media icons 
		-->
		
			<div class="footer-social-media">
				<a href="https://twitter.com/mythoughtspot" target="_blank" class="twitter social-media-icon" title="myThoughtSpot">Twitter</a>
				<a href="http://instagram.com/mythoughtspot" target="_blank" class="instagram social-media-icon" title="myThoughtSpot">Instagram</a>
				<a href="https://www.facebook.com/MyThoughtSpot" target="_blank" class="facebook social-media-icon" title="Thought Spot">Facebook</a>
			</div>
			
			
			<div class="footer-links">
				<p class="crisis-alert">If you are in crisis, call 911.</p>
			</div>
		
		<!-- end added by KH -->

			<!-- footer credits -->
			<!-- <div class="footer-credits">
				Powered by the &nbsp;
				<a href="http://www.ushahidi.com/">
					<img src="<?php echo url::file_loc('img'); ?>media/img/footer-logo.png" alt="Ushahidi" style="vertical-align:middle" />
				</a>
				&nbsp; Platform
			</div>-->
			<!-- / footer credits -->

			<!-- footer menu -->
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
			<!-- / footer menu -->
			
			<!-- added by KH 
			additional links 
			-->
			
			<div class="footer-links">
				<p><a class="privacy-policy" href="/page/index/4">Privacy Policy</a></p>
				<p><a class="ushahidi-attribution" href="http://www.ushahidi.com/">Powered by the Ushahidi Platform</a></p>
			</div>
			
			<!-- end added by KH -->

			<!--<h2 class="feedback_title" style="clear:both">
				<a href="http://feedback.ushahidi.com/fillsurvey.php?sid=2"><?php echo Kohana::lang('ui_main.feedback'); ?></a>
			</h2>-->

		</div>
		<!-- / footer content -->

	</div>
	<!-- / footer -->

	<?php
	//echo $footer_block;
	// Action::main_footer - Add items before the </body> tag
	Event::run('ushahidi_action.main_footer');
	?>
</body>
</html>
