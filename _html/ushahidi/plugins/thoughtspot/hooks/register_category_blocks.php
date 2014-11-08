<?php defined('SYSPATH') or die('No direct script access.');

// Start ThoughtSpot custom block
class thoughtspot_custom_block { // CHANGE THIS FOR OTHER BLOCKS

	public function __construct()
	{
		// Array of block params
		$block = array(
			"classname" => "thoughtspot_custom_block", // Must match class name above
			"name" => "ThoughtSpot Custom Content",
			"description" => "Shows the static content on the ThoughtSpot homepage."
		);
		// register block with core, this makes it available to users
		blocks::register($block);
	}

	public function block()
	{
		// Load the reports block view
		$content = new View('blocks/thoughtspot_custom_block'); // CHANGE THIS IF YOU WANT A DIFFERENT VIEW

		// Set image to render
		$content->image = "Put image path here";

		// Set body HTML content
		$content->HTML = "Put text file of HTML to render here";

		echo $content;
	}
}

new thoughtspot_custom_block;
