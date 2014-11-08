<?php
	$path = '/themes/thought-spot';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title><?php echo $page_title.$site_name; ?></title>
        <meta name="description" content="Thought Spot is a live health and wellness map designed by students, for students in the Greater Toronto Area." />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="apple-touch-icon" href="<?php print $path; ?>/images/apple-touch-icon.png" />

		<!-- hardcode the css link -->
		<link rel="stylesheet" type="text/css" href="<?php print $path; ?>/css/style.css" />

		<?php
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

			<a href="<?php echo url::site();?>">
				<h1>
					<img src="<?php print $path; ?>/images/logo.svg" alt="Logo" />
					<?php echo $site_name; ?>
				</h1>
			</a>

			<nav role="search" id="nav">
				<h2>What are you looking for?</h2>

				<fieldset>
					<legend>Categories</legend>
					<ul>
						<li>
							<label for="search-category-services">
								<input type="radio" name="search-category" id="search-category-services" />
								Services
							</label>
						</li>
						<li>
							<label for="search-category-problemsolving">
								<input type="radio" name="search-category" id="search-category-problemsolving" />
								Problem Solving
							</label>
						</li>
						<li>
							<label for="search-category-outings">
								<input type="radio" name="search-category" id="search-category-outings" />
								Outings
							</label>
						</li>
						<li>
							<label for="search-category-teachings">
								<input type="radio" name="search-category" id="search-category-teachings" />
								Teachings
							</label>
						</li>
					</ul>
				</fieldset>

				<fieldset>
					<h2>Problem Solving</h2>
					<!--
					1. Are you in crisis or in need of immediate assistance yes/no w/ def
						yes = call 911
						no = continue
					2. no…but i'd like to talk to someone immediately
						under 20 kids help phone
						good to talk for 17-25 yo
						distress centre toronto for over 25

					   no…but i'm concerned with
					3. age
						gender
						location
						gender
						accessibility issues
						open now vs something else
					4. long list of concerns
					-->
				</fieldset>

				<div id="searchbox">
					<div class="search-form">
						<form action="http://localhost:8090/search" method="get" id="search">
							<ul>
								<li>
									<input id="search-term" type="text" name="k" value="" class="text">
								</li>
								<li>
									<input type="submit" name="b" class="searchbtn" value="Search">
								</li>
							</ul>
						</form>
					</div>
				</div>
			</nav>
