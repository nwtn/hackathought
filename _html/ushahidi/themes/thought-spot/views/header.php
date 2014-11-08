<!DOCTYPE html>
<html lang="en" xml:lang="en">
<head>
	<title><?php echo $page_title.$site_name; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" media="screen" href="css/clear-sans.css" />
	<?php echo $header_block; ?>
		<?php
	// Action::header_scripts - Additional Inline Scripts from Plugins
	Event::run('ushahidi_action.header_scripts');
	?>
</head>


<?php
  // Add a class to the body tag according to the page URI
  // we're on the home page
  if (count($uri_segments) == 0)
  {
    $body_class = "page-main";
  }
  // 1st tier pages
  elseif (count($uri_segments) == 1)
  {
    $body_class = "page-".$uri_segments[0];
  }
  // 2nd tier pages... ie "/reports/submit"
  elseif (count($uri_segments) >= 2)
  {
    $body_class = "page-".$uri_segments[0]."-".$uri_segments[1];
  }

?>

<body id="page" class="<?php echo $body_class; ?>">



  <!-- top bar-->
  <!-- <div id="top-bar"> -->

			<!-- languages -->
			<!--<?php echo $languages;?>-->
			<!-- / languages -->


	<!-- wrapper -->
	<div class="rapidxwpr floatholder">

		<!-- header -->
		
		<!-- / header -->
         <!-- / header item for plugins -->
        <?php
            // Action::header_item - Additional items to be added by plugins
	        Event::run('ushahidi_action.header_item');
        ?>

        <?php if(isset($site_message) AND $site_message != '') { ?>
			<!--<div class="green-box">
				<h3><?php echo $site_message; ?></h3>
			</div>-->
		<?php } ?>

		<!-- main body -->
		<div id="middle">
			<div class="background layoutleft">

				<!-- mainmenu -->
				<div id="mainmenu" class="clearingfix">
					<!-- logo -->
						<?php if ($banner == NULL): ?>
						<div id="logo">
							<h1><a href="<?php echo url::site();?>"><?php echo $site_name; ?></a></h1>
						</div>
						<?php else: ?>
						<a href="<?php echo url::site();?>"><img src="<?php echo $banner; ?>" alt="<?php echo $site_name; ?>" /></a>
						<?php endif; ?>
					<!-- / logo -->
			
					<div class="menu">
						<ul>
							<?php nav::main_tabs($this_page); ?>
							<li><a href="/login" class="login-button">Login</a></li>
						</ul>
					</div>

				</div>
				<!-- / mainmenu -->
				
				
				
					
					
    <!-- searchbox -->
		<div id="searchbox">

		
					<!-- searchform -->
					<?php echo $search; ?>
					<!-- / searchform -->

	    </div>
  <!-- / searchbox -->
