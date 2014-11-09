<?php $path = '/themes/thought-spot'; ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $page_title.$site_name; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<!-- hardcode the css link -->
		<link rel="stylesheet" type="text/css" href="<?php print $path; ?>/css/style.css" />

		<?php
			// echo $header_block;

			// Action::header_scripts - Additional Inline Scripts from Plugins
			Event::run('ushahidi_action.header_scripts');
		?>
	</head>

	<?php
		// Add a class to the body tag according to the page URI
		// we're on the home page
		if (count($uri_segments) == 0) {
			$body_class = "page-main";
		}

		// 1st tier pages
		elseif (count($uri_segments) == 1) {
			$body_class = "page-".$uri_segments[0];
		}

		// 2nd tier pages... ie "/reports/submit"
		elseif (count($uri_segments) >= 2) {
			$body_class = "page-".$uri_segments[0]."-".$uri_segments[1];
		}
	?>

	<body id="page" class="<?php echo $body_class; ?>">
		<header role="banner" id="header">
			<h1>
				<a href="<?php echo url::site();?>">
					<img src="<?php print $path; ?>/images/logo.svg" alt="Logo" />
					<?php echo $site_name; ?> Toronto
				</a>
			</h1>

			<nav role="navigation" id="nav">
				<section role="search" id="searchbox">
					<h2>What are you looking for?</h2>
					<form action="/search" method="POST" id="search">
						<fieldset id="search-categories-fs">
							<legend>Categories</legend>
							<ul>
								<li>
									<label for="search-category-services" data-hover="services">
										<input type="radio" name="search-category" id="search-category-services" value="services" />
										Services</label>
									<p class="description">Search our database based on location, activity, etc. different descriptive words of how you can use this map to get things you need or want.</p>
								</li>
								<li>
									<label for="search-category-problemsolving" data-hover="problemsolving">
										<input type="radio" name="search-category" id="search-category-problemsolving" value="problemsolving" />
										Problem solving</label>
									<p class="description">Find what you need or an answer to your questions through a step-by-step breakdown of our resources</p>
								</li>
								<li>
									<label for="search-category-outings" data-hover="outings">
										<input type="radio" name="search-category" id="search-category-outings" value="outings" />
										Outings</label>
									<p class="description">Looking to take a break? Explore restaurants, parks, cafés and more. Find or submit a walking tour or afternoon itinerary submitted by fellow students.</p>
								</li>
								<li>
									<label for="search-category-teachings" data-hover="teachings">
										<input type="radio" name="search-category" id="search-category-teachings" value="teachings" />
										Teachings</label>
									<p class="description">Definitions and additional resources related to your overall well-being.</p>
								</li>
							</ul>
						</fieldset>

						<fieldset id="search-crisis-fs">
							<legend>Are you in crisis or in need of immediate assistance?</legend>
							<ol>
								<li>
									<label for="search-crisis-yes">
										<input type="radio" name="search-crisis" id="search-crisis-yes" value="yes" />
										Yes
									</label>
									<div class="search-crisis-response">
										<span>If you’re in crisis or are in need of immediate assistance, </span>
										please call 9‒1‒1.
									</div>
								</li>
								<li>
									<label for="search-crisis-nobut">
										<input type="radio" name="search-crisis" id="search-crisis-nobut" value="nobut" />
										No, but I’d like to talk to someone immediately
									</label>
								</li>
								<li>
									<label for="search-crisis-no">
										<input type="radio" name="search-crisis" id="search-crisis-no" value="no" />
										No, but I’d like more information about something
									</label>
								</li>
							</ol>
						</fieldset>

						<fieldset id="search-age-fs">
							<label for="search-age">
								Age
								<input type="number" name="search-age" id="search-age" />
							</label>
						</fieldset>

						<fieldset id="search-gender-fs">
							<legend>Gender</legend>
							<ul>
								<li>
									<label for="search-gender-female">
										<input type="radio" name="search-gender" id="search-gender-female" value="female" />
										Female
									</label>
								</li>
								<li>
									<label for="search-gender-male">
										<input type="radio" name="search-gender" id="search-gender-male" value="male" />
										Male
									</label>
								</li>
								<li>
									<label for="search-gender-other">
										<input type="radio" name="search-gender" id="search-gender-other" value="other" />
										Other
										<input type="text" name="search-gender-othertext" id="search-gender-othertext" />
									</label>
								</li>
								<li>
									<label for="search-gender-nosay">
										<input type="radio" name="search-gender" id="search-gender-nosay" value="nosay" />
										Rather not say
									</label>
								</li>
							</ul>
						</fieldset>

						<fieldset id="search-accessibility-fs">
							<legend>Accessibility needs</legend>
							<p>Please select all that apply.</p>
							<ul>
								<li>
									<label for="search-a11y-wheelchair">
										<input type="checkbox" name="search-a11y" id="search-a11y-wheelchair" value="wheelchair" />
										Wheelchair accessible
									</label>
								</li>
								<li>
									<label for="search-a11y-entrance">
										<input type="checkbox" name="search-a11y" id="search-a11y-entrance" value="entrance" />
										Automatic main entrance
									</label>
								</li>
								<li>
									<label for="search-a11y-elevator">
										<input type="checkbox" name="search-a11y" id="search-a11y-elevator" value="elevator" />
										Elevator with braille and voice/tone features
									</label>
								</li>
								<li>
									<label for="search-a11y-washroom">
										<input type="checkbox" name="search-a11y" id="search-a11y-washroom" value="washroom" />
										Barrier-free washroom
									</label>
								</li>
								<li>
									<label for="search-a11y-parking">
										<input type="checkbox" name="search-a11y" id="search-a11y-parking" value="parking" />
										Designated parking
									</label>
								</li>
							</ul>
						</fieldset>

						<fieldset id="search-concerns-fs">
							<legend>Concerns</legend>
							<p>Please select all that apply.</p>
							<ul>
								<li>
									<label for="search-concerns-abuse">
										<input type="checkbox" name="search-concerns" id="search-concerns-abuse" value="abuse" />
										Abuse (emotional, physical)
									</label>
								</li>

								<li>
									<label for="search-concerns-addictions">
										<input type="checkbox" name="search-concerns" id="search-concerns-addictions" value="addictions" />
										Addictions
									</label>
								</li>

								<li>
									<label for="search-concerns-adjustment">
										<input type="checkbox" name="search-concerns" id="search-concerns-adjustment" value="adjustment" />
										Adjustment Issues
									</label>
								</li>

								<li>
									<label for="search-concerns-substances">
										<input type="checkbox" name="search-concerns" id="search-concerns-substances" value="substances" />
										Alcohol or Drug Abuse
									</label>
								</li>

								<li>
									<label for="search-concerns-bodyimage">
										<input type="checkbox" name="search-concerns" id="search-concerns-bodyimage" value="bodyimage" />
										Body Image Concerns
									</label>
								</li>

								<li>
									<label for="search-concerns-careers">
										<input type="checkbox" name="search-concerns" id="search-concerns-careers" value="careers" />
										Careers
									</label>
								</li>

								<li>
									<label for="search-concerns-childcare">
										<input type="checkbox" name="search-concerns" id="search-concerns-childcare" value="childcare" />
										Childcare
									</label>
								</li>

								<li>
									<label for="search-concerns-decisionmaking">
										<input type="checkbox" name="search-concerns" id="search-concerns-decisionmaking" value="decisionmaking" />
										Decision-making Issues
									</label>
								</li>

								<li>
									<label for="search-concerns-depression">
										<input type="checkbox" name="search-concerns" id="search-concerns-depression" value="depression" />
										Depression/Anxiety
									</label>
								</li>

								<li>
									<label for="search-concerns-disabilities">
										<input type="checkbox" name="search-concerns" id="search-concerns-disabilities" value="disabilities" />
										Disability Issues
									</label>
								</li>

								<li>
									<label for="search-concerns-eatingdisorders">
										<input type="checkbox" name="search-concerns" id="search-concerns-eatingdisorders" value="eatingdisorders" />
										Eating Disorders
									</label>
								</li>

								<li>
									<label for="search-concerns-family">
										<input type="checkbox" name="search-concerns" id="search-concerns-family" value="family" />
										Family problems
									</label>
								</li>

								<li>
									<label for="search-concerns-financial">
										<input type="checkbox" name="search-concerns" id="search-concerns-financial" value="financial" />
										Financial issues
									</label>
								</li>

								<li>
									<label for="search-concerns-grief">
										<input type="checkbox" name="search-concerns" id="search-concerns-grief" value="grief" />
										Grief and Loss
									</label>
								</li>

								<li>
									<label for="search-concerns-sti">
										<input type="checkbox" name="search-concerns" id="search-concerns-sti" value="sti" />
										HIV/STI Testing
									</label>
								</li>

								<li>
									<label for="search-concerns-housing">
										<input type="checkbox" name="search-concerns" id="search-concerns-housing" value="housing" />
										Housing
									</label>
								</li>

								<li>
									<label for="search-concerns-immigration">
										<input type="checkbox" name="search-concerns" id="search-concerns-immigration" value="immigration" />
										Immigration Services
									</label>
								</li>

								<li>
									<label for="search-concerns-internationalstudent">
										<input type="checkbox" name="search-concerns" id="search-concerns-internationalstudent" value="internationalstudent" />
										International Student
									</label>
								</li>

								<li>
									<label for="search-concerns-legal">
										<input type="checkbox" name="search-concerns" id="search-concerns-legal" value="legal" />
										Legal concerns
									</label>
								</li>

								<li>
									<label for="search-concerns-lgbtq2">
										<input type="checkbox" name="search-concerns" id="search-concerns-lgbtq2" value="lgbtq2" />
										LGBTQ2 Issues
									</label>
								</li>

								<li>
									<label for="search-concerns-loneliness">
										<input type="checkbox" name="search-concerns" id="search-concerns-loneliness" value="loneliness" />
										Loneliness
									</label>
								</li>

								<li>
									<label for="search-concerns-disorders">
										<input type="checkbox" name="search-concerns" id="search-concerns-disorders" value="disorders" />
										Mental disorders
									</label>
								</li>

								<li>
									<label for="search-concerns-gambling">
										<input type="checkbox" name="search-concerns" id="search-concerns-gambling" value="gambling" />
										Problem Gambling
									</label>
								</li>

								<li>
									<label for="search-concerns-procrastination">
										<input type="checkbox" name="search-concerns" id="search-concerns-procrastination" value="procrastination" />
										Procrastination
									</label>
								</li>

								<li>
									<label for="search-concerns-relationships">
										<input type="checkbox" name="search-concerns" id="search-concerns-relationships" value="relationships" />
										Relationship Issues 
									</label>
								</li>

								<li>
									<label for="search-concerns-selfesteem">
										<input type="checkbox" name="search-concerns" id="search-concerns-selfesteem" value="selfesteem" />
										Self Esteem Issues
									</label>
								</li>

								<li>
									<label for="search-concerns-sexualassault">
										<input type="checkbox" name="search-concerns" id="search-concerns-sexualassault" value="sexualassault" />
										Sexual Assault
									</label>
								</li>

								<li>
									<label for="search-concerns-sexuality">
										<input type="checkbox" name="search-concerns" id="search-concerns-sexuality" value="sexuality" />
										Sexuality
									</label>
								</li>

								<li>
									<label for="search-concerns-sleep">
										<input type="checkbox" name="search-concerns" id="search-concerns-sleep" value="sleep" />
										Sleep problems
									</label>
								</li>

								<li>
									<label for="search-concerns-socialanxiety">
										<input type="checkbox" name="search-concerns" id="search-concerns-socialanxiety" value="socialanxiety" />
										Social Anxiety
									</label>
								</li>

								<li>
									<label for="search-concerns-stress">
										<input type="checkbox" name="search-concerns" id="search-concerns-stress" value="stress" />
										Stress
									</label>
								</li>

								<li>
									<label for="search-concerns-suicide">
										<input type="checkbox" name="search-concerns" id="search-concerns-suicide" value="suicide" />
										Suicidal ideation/behavior
									</label>
								</li>

								<li>
									<label for="search-concerns-traumaticevents">
										<input type="checkbox" name="search-concerns" id="search-concerns-traumaticevents" value="traumaticevents" />
										Traumatic Events
									</label>
								</li>

								<li>
									<label for="search-concerns-women">
										<input type="checkbox" name="search-concerns" id="search-concerns-wheelchair" value="women" />
										Women’s Services
									</label>
								</li>
							</ul>
						</fieldset>

						<fieldset id="search-term-fs">
							<label for="search-term">Search Term</label>
							<input type="search" name="k" id="search-term" placeholder="search" />

							<input type="submit" name="b" id="search-submit" value="Search" />
						</fieldset>
					</form>
				</section>
			</nav>

			<a class="suggest-a-spot" href="/suggest">Suggest a spot</a>
		</header>
