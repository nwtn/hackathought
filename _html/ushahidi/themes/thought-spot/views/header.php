<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $page_title.$site_name; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<!-- hardcode the css link -->
		<link rel="stylesheet" type="text/css" href="/themes/thought-spot/css/style.css" />

		<script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgr8nzb8ORG5HEc7Bnrki_ac9Yy-8lDsA&libraries=places">
    </script>

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
		<div class="rapidxwpr floatholder">
			<?php
				/*
				// Action::header_item - Additional items to be added by plugins
				Event::run('ushahidi_action.header_item');
				*/
			?>

			<div id="middle">
				<div class="background layoutleft">

					<div id="mainmenu" class="clearingfix">
						<?php if ($banner == NULL): ?>
						<div id="logo">
							<h1><a href="<?php echo url::site();?>"><?php echo $site_name; ?></a></h1>
						</div>
						<?php else: ?>
						<a href="<?php echo url::site();?>"><img src="<?php echo $banner; ?>" alt="<?php echo $site_name; ?>" /></a>
						<?php endif; ?>

						<div class="menu">
							<ul>
								<?php nav::main_tabs($this_page); ?>
							</ul>
						</div>
					</div>

					<div id="searchbox">
						<?php echo $search; ?>
					</div>
