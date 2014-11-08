<?php blocks::open("reports");?>
<?php blocks::title("Welcome to Thought Spot");?>
<div class="thoughtspot-custom">
	
		<?php
		//if ($image != "")
		/* can always do some more testing to prevent total siezure of Ushahidi */
		//{
			?>
			<!--<img src="<?php echo $image; ?>" />-->
			<?php
		//}
		?>
		
		<!--<img src="/themes/thought-spot/images/pattern_404x202.png" />-->
	
		<?php
		/* will need to load HTML from supplied filename and test here */
		/* $HTML = fread($filehandle = fopen($file, "r"), etc. */
		if ($HTML != "")
		{
			/* echo HTML instead if file opened */
			?>
			<?php //echo "Just for testing.</br> " . $HTML; ?>
			<?php
		}
		/* fclose($filehandle); */
		?>
		
		<p>What's your Thought Spot? A Thought Spot is a place or service where you can address your mental health and wellbeing. Each individual should be able to define their own Thought Spot and share it with others. We designed this map to help post-secondary students cope with life stressors and meet their mental health needs. </p>
		
		<p><strong>This map is NOT designed for individuals in crisis who require immediate assistance.</strong> </p>

		<p>Thought Spots are sourced from Kids Help Phone, ConnexOntario, and crowdsourced content from students. <a href="/page/index/3">Get involved</a> today to share your Thought Spot.</p>
	
</div>
<div class="button"><a class="more button" href="<?php echo url::site() . 'page/index/1' ?>">About Us</a></div>
<div class="clearingfix"></div>
<?php blocks::close();?>
