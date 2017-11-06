<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
/**
* Header
*/
global $lumos_options;
$lumos_options = lumos_get_options();
?>
<!DOCTYPE html>
<html
      <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <title>
    <?php wp_title('|', true, 'right');?>
  </title>

  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/img/favicons/favicon-16x16.png">
  <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/img/favicons/manifest.json">
  <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="theme-color" content="#ffffff">

  <?php wp_head(); ?>
</head>
<body
      <?php body_class(); ?> >

<header id="header">

<?php if ( !is_front_page() ) : ?>
  <div id="header-info" class="container">
    <div class="row align-items-center">
      <div class="col-md-4 my-4 my-md-0">
        <div id="logo">
            <h1>
              <a href="<?php echo home_url('/'); ?>">
                <img class="img-fluid d-block mx-auto" src="<?php header_image(); ?>" width="<?php if (function_exists('get_custom_header')) {
                    echo get_custom_header() -> width;
                } else {
                    echo HEADER_IMAGE_WIDTH;
                } ?>" height="<?php if (function_exists('get_custom_header')) {
                    echo get_custom_header() -> height;
                } else {
                    echo HEADER_IMAGE_HEIGHT;
                } ?>" alt="<?php bloginfo('name'); ?>" />
              </a>
            </h1>
          </div><!-- end of #logo -->
      </div>

      <div class="col-md-8 d-none d-md-block">
        <div id="info-contact" class="row align-items-center">
          <div class="col-lg-7 text-center">
            <p>Schedule a Consultation: 760.324.2620</p>
          </div>


          <div class="col-lg-5 text-center">
            <?php
  					echo '<ul class="social-icons justify-content-center justify-content-lg-start py-3 mb-3">';
  					if (!empty($lumos_options['facebook_uid'])) 		echo '<li><a target="_blank" class="icon-facebook" href="' . $lumos_options['facebook_uid'] . '">'.'</a></li>';
  					if (!empty($lumos_options['twitter_uid'])) 			echo '<li><a target="_blank" class="icon-twitter" href="' . $lumos_options['twitter_uid'] . '">'.'</a></li>';
  					if (!empty($lumos_options['google_plus_uid'])) 	echo '<li><a target="_blank" class="icon-google-plus" href="' . $lumos_options['google_plus_uid'] . '">'.'</a></li>';
  					if (!empty($lumos_options['youtube_uid'])) 			echo '<li><a target="_blank" class="icon-youtube" href="' . $lumos_options['youtube_uid'] . '">'.'</a></li>';
  					if (!empty($lumos_options['linkedin_uid'])) 		echo '<li><a target="_blank" class="icon-linkedin" href="' . $lumos_options['linkedin_uid'] . '">'.'</a></li>';
  					if (!empty($lumos_options['yelp_uid'])) 				echo '<li><a target="_blank" class="icon-yelp" href="' . $lumos_options['yelp_uid'] . '">'.'</a></li>';
  					if (!empty($lumos_options['blogger_uid'])) 			echo '<li><a target="_blank" class="icon-blogger" href="' . $lumos_options['blogger_uid'] . '">'.'</a></li>';
  					if (!empty($lumos_options['instagram_uid'])) 		echo '<li><a target="_blank" class="icon-instagram" href="' . $lumos_options['instagram_uid'] . '">'.'</a></li>';
  					if (!empty($lumos_options['foursquare_uid'])) 	echo '<li><a target="_blank" class="icon-foursquare" href="' . $lumos_options['foursquare_uid'] . '">'.'</a></li>';
  					echo '</ul><!-- end of .social-icons -->';
  					?>
          </div>
        </div>
      </div><!-- column -->
    </div><!-- row -->
  </div><!-- #header-info .container-->
  <div id="nav-menu" class="container-fluid">
    <div class="row">
      <nav id="access">

      <?php
            echo '<ul class="social-icons d-md-none d-flex justify-content-start">';
            if (!empty($lumos_options['facebook_uid'])) 		echo '<li><a target="_blank" class="icon-facebook" href="' . $lumos_options['facebook_uid'] . '">'.'</a></li>';
            if (!empty($lumos_options['twitter_uid'])) 			echo '<li><a target="_blank" class="icon-twitter" href="' . $lumos_options['twitter_uid'] . '">'.'</a></li>';
            if (!empty($lumos_options['google_plus_uid'])) 	echo '<li><a target="_blank" class="icon-google-plus" href="' . $lumos_options['google_plus_uid'] . '">'.'</a></li>';
            if (!empty($lumos_options['youtube_uid'])) 			echo '<li><a target="_blank" class="icon-youtube" href="' . $lumos_options['youtube_uid'] . '">'.'</a></li>';
            if (!empty($lumos_options['linkedin_uid'])) 		echo '<li><a target="_blank" class="icon-linkedin" href="' . $lumos_options['linkedin_uid'] . '">'.'</a></li>';
            if (!empty($lumos_options['yelp_uid'])) 				echo '<li><a target="_blank" class="icon-yelp" href="' . $lumos_options['yelp_uid'] . '">'.'</a></li>';
            if (!empty($lumos_options['blogger_uid'])) 			echo '<li><a target="_blank" class="icon-blogger" href="' . $lumos_options['blogger_uid'] . '">'.'</a></li>';
            if (!empty($lumos_options['instagram_uid'])) 		echo '<li><a target="_blank" class="icon-instagram" href="' . $lumos_options['instagram_uid'] . '">'.'</a></li>';
            if (!empty($lumos_options['foursquare_uid'])) 	echo '<li><a target="_blank" class="icon-foursquare" href="' . $lumos_options['foursquare_uid'] . '">'.'</a></li>';
            echo '<li><a href="/contact/"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>';
            echo '<li><a href="tel:+1-"><i class="fa fa-phone" aria-hidden="true"></i></a></li>';
            echo '</ul><!-- end of .social-icons -->';
            ?>
        <ul class="mobile-nav d-none">
          <li><a href="<?php echo home_url('/contact/'); ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
          <li>
            <a href="tel:+1-">
              <i class="fa fa-phone" aria-hidden="true">
              </i>
            </a>
          </li>
        </ul>
        <?php wp_nav_menu(array( 'theme_location' => 'header-nav','menu_class' => 'sf-menu menu-slick')); ?>
      </nav><!-- nav#access -->
    </div>
  </div>
  
  <?php else : ?>
  
  <div id="nav-menu" class="container">
    <div class="row">
      <nav id="access">

      <?php
            echo '<ul class="social-icons d-md-none d-flex justify-content-start">';
            if (!empty($lumos_options['facebook_uid'])) 		echo '<li><a target="_blank" class="icon-facebook" href="' . $lumos_options['facebook_uid'] . '">'.'</a></li>';
            if (!empty($lumos_options['twitter_uid'])) 			echo '<li><a target="_blank" class="icon-twitter" href="' . $lumos_options['twitter_uid'] . '">'.'</a></li>';
            if (!empty($lumos_options['google_plus_uid'])) 	echo '<li><a target="_blank" class="icon-google-plus" href="' . $lumos_options['google_plus_uid'] . '">'.'</a></li>';
            if (!empty($lumos_options['youtube_uid'])) 			echo '<li><a target="_blank" class="icon-youtube" href="' . $lumos_options['youtube_uid'] . '">'.'</a></li>';
            if (!empty($lumos_options['linkedin_uid'])) 		echo '<li><a target="_blank" class="icon-linkedin" href="' . $lumos_options['linkedin_uid'] . '">'.'</a></li>';
            if (!empty($lumos_options['yelp_uid'])) 				echo '<li><a target="_blank" class="icon-yelp" href="' . $lumos_options['yelp_uid'] . '">'.'</a></li>';
            if (!empty($lumos_options['blogger_uid'])) 			echo '<li><a target="_blank" class="icon-blogger" href="' . $lumos_options['blogger_uid'] . '">'.'</a></li>';
            if (!empty($lumos_options['instagram_uid'])) 		echo '<li><a target="_blank" class="icon-instagram" href="' . $lumos_options['instagram_uid'] . '">'.'</a></li>';
            if (!empty($lumos_options['foursquare_uid'])) 	echo '<li><a target="_blank" class="icon-foursquare" href="' . $lumos_options['foursquare_uid'] . '">'.'</a></li>';
            echo '<li><a href="/contact/"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>';
            echo '<li><a href="tel:+1-"><i class="fa fa-phone" aria-hidden="true"></i></a></li>';
            echo '</ul><!-- end of .social-icons -->';
            ?>
        <ul class="mobile-nav d-none">
          <li><a href="<?php echo home_url('/contact/'); ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
          <li>
            <a href="tel:+1-">
              <i class="fa fa-phone" aria-hidden="true">
              </i>
            </a>
          </li>
        </ul>
        <?php wp_nav_menu(array( 'theme_location' => 'header-nav','menu_class' => 'sf-menu menu-slick')); ?>
      </nav><!-- nav#access -->
    </div>
  </div>

  <?php endif; ?>

</header>
<!-- #header -->


<div id="main">

  <div class="float-box d-none" hidden >
    <a class="clicker" href="<?php echo home_url(''); ?>">
      <span>Contact Us | Location
      </span>
    </a>
    <div class="row">
	    	<div class="col col-6">
          <address>
          </address>
	      <a href="<?php echo home_url('/location/'); ?>">
	        <img class="img-fluid mt-2" src="<?php echo get_template_directory_uri(); ?>/img/map.jpg" alt="Location" />
	      </a>
	    </div>
	    <!-- end of col-1-3 -->
	    <div class="col col-6">
	      <?php echo do_shortcode('[contact-form-7 id="136" title="Contact form 1"]') ?>
	    </div>
	    <!-- end of col-1-3 -->
	    <div class="col col-md-4 links" hidden>
  		  <div id="flex-item" class="w-100 d-block">
  		      <a href="<?php echo home_url(''); ?>">Current Specials
  		      </a>
  		      <a href="<?php echo home_url(''); ?>">Get Directions
  		      </a>
  		      <a href="<?php echo home_url('/photo-gallery/'); ?>">Photo Gallery
  		      </a>
  		  </div><!-- flex-item -->
	    </div>
	    <!-- end of col-1-3 -->
    </div><!-- row -->
  </div>
  <!-- end of float-box -->
