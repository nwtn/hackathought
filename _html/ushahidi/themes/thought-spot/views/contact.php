<div id="content">
	<div class="content-bg">
		<!-- start contacts block -->
		<div class="big-block">
		<div class="main-content">
		<div class="section" id="section-1">
			<h2>Contact Support<?php //echo Kohana::lang('ui_main.contact'); ?></h2>
			<p>If you have a question that is not answered by the FAQ or you want to get involved, please contact us by filling out the form below or emailing <a href="mailto:mythoughtspot.ca@gmail.com">mythoughtspot.ca@gmail.com</a>.</p>
		</div>
			<div class="section" id="section-2">
			<h2>Contact Form</h2>
			
				<?php
				if ($form_error)
				{
					?>
					<!-- red-box -->
					<div class="red-box">
						<h3>Error!</h3>
						<ul>
							<?php
							foreach ($errors as $error_item => $error_description)
							{
								print (!$error_description) ? '' : "<li>" . $error_description . "</li>";
							}
							?>
						</ul>
					</div>
					<?php
				}

				if ($form_sent)
				{
					?>
					<!-- green-box -->
					<div class="green-box">
						<h3><?php echo Kohana::lang('ui_main.contact_message_has_send'); ?></h3>
					</div>
					<?php
				}								
				?>
				<?php print form::open(NULL, array('id' => 'contactForm', 'name' => 'contactForm')); ?>
				<div class="contact-row">
					<div class="contact-field">
						<strong><?php echo Kohana::lang('ui_main.contact_name'); ?></strong><br />
						<?php print form::input('contact_name', $form['contact_name'], ' class="text"'); ?>
					</div>
					<div class="contact-field">
						<strong><?php echo Kohana::lang('ui_main.contact_email'); ?></strong><br />
						<?php print form::input('contact_email', $form['contact_email'], ' class="text"'); ?>
					</div>
				</div>
				<div class="contact-field" style="display: none;">
					<strong><?php echo Kohana::lang('ui_main.contact_phone'); ?></strong><br />
					<?php print form::input('contact_phone', $form['contact_phone'], ' class="text"'); ?>
				</div> 
				<div class="contact-field">
					<strong><?php echo Kohana::lang('ui_main.contact_subject'); ?></strong><br />
					<?php 
					$subjects = array("Workshop Information", "Spot Suggestion", "Data Request", "Map Question", "Hackathon Information", "Other" );
					
					
					
					function test_input($data) {
						$data = trim($data);
						$data = stripslashes($data);
						$data = htmlspecialchars($data);
						return $data;
					}
					
					if ( isset( $_GET['subject'] ) && !empty( $_GET['subject'] ) ) {
						$subject = test_input($_GET['subject']);
					} else {
						$subject = "";
					}
					
					
					
					// print Form::input('contact_subject', $form['contact_subject'], ' class="text"'); ?>
					
					<select id="contact_subject" name="contact_subject">
						<option value="Workshop Information" <?php if ($subject == "workshop") echo ('selected="selected"');?>>Workshop Information</option>
						<option value="Spot Suggestion" <?php if ($subject == "suggestion") echo ('selected="selected"');?>>Spot Suggestion</option>
						<option value="Data Request" <?php if ($subject == "data") echo ('selected="selected"');?>>Data Request</option>
						<option value="Map Question" <?php if ($subject == "map") echo ('selected="selected"');?>>Map Question</option>
						<option value="Hackathon Information" <?php if ($subject == "hackathon") echo ('selected="selected"');?>>Hackathon Information</option>
						<option value="Other">Other</option>
					</select>
				</div>								
				<div class="contact-field">
					<strong><?php echo Kohana::lang('ui_main.contact_message'); ?></strong><br />
					<?php print form::textarea('contact_message', $form['contact_message'], ' rows="8" cols="40" class="textarea long" ') ?>
				</div>		
				<div class="contact-field">
					<strong><?php echo Kohana::lang('ui_main.contact_code'); ?></strong><br />
					<?php print $captcha->render(); ?><br />
					<?php print form::input('captcha', $form['captcha'], ' class="text"'); ?>
				</div>
				<div class="contact-field">
					<input name="submit" type="submit" value="<?php echo Kohana::lang('ui_main.contact_send'); ?>" class="button btn_submit" />
				</div>
				<?php print form::close(); ?>
			</div>
			</div>
		</div>
		<!-- end contacts block -->
	</div>
</div>
<script><?php include('sidebar_js.php'); ?></script>