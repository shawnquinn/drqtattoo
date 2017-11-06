<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
/**
* Site Front Page
******************
* Globalize Theme Options
*/
global $lumos_options;
$lumos_options = lumos_get_options();
/**
* If front page is set to display the
* blog posts index, include home.php;
* otherwise, display static front page
* content
*/
if ( 'posts' == get_option( 'show_on_front' ) && $lumos_options['front_page'] != 1 ) {
get_template_part( 'home' );
} elseif ( 'page' == get_option( 'show_on_front' ) && $lumos_options['front_page'] != 1 ) {
$template = get_post_meta( get_option( 'page_on_front' ), '_wp_page_template', true );
$template = ( $template == 'default' ) ? 'index.php' : $template;
locate_template( $template, true );
} else {
get_header();
//test for first install no database
$db = get_option( 'lumos_theme_options' );
//test if all options are empty so we can display default text if they are
$empty = ( empty( $lumos_options['home_headline'] ) && empty( $lumos_options['home_subheadline'] ) && empty( $lumos_options['home_content_area'] ) ) ? false : true;
?>
<section class="slider">

  <div class="boxed">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div id="logo" >
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
      </div>
      <!-- row -->
    </div>
    <!-- container -->
  </div>
  <!-- boxed -->

  <ul class="bx-slider">
    <li id="one"></li>
    <li id="two"></li>
  </ul>

<section class="call-to-actions d-none d-md-block">
  <div class="container">
    <div class="row">
      <div id="info" class="col-lg-9 col-xl-6 py-1">
        <div class="row py-0">
          <div class="col-md-4 d-flex align-items-center justify-content-start justify-content-md-around mb-4 mb-md-0">
            <div class="icon">
              <span class="fa-stack fa-lg">
                <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
              </span>
            </div>
            <div class="contacts">
              <p><a href="tel:+1-760-324-2620"><?php echo esc_html_e('(760) 324-2620', 'understrap'); ?></a></p>
            </div>
          </div>

          <div class="col-md-4 d-flex align-items-center">
          <?php
            echo '<ul class="social-icons w-100 d-flex justify-content-around">';
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

          <div class="col-md-4 d-flex align-items-center justify-content-start justify-content-md-around mb-4 mb-md-0">
            <div class="contacts">
              <p><a href="<?php echo esc_url( home_url('') ) ?>"><?php echo esc_html_e('Book Online', 'understrap') ?> <i class="fa fa-angle-right"></i></a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <!-- bx-slider -->
</section>

<!--end of .slider -->
<section class="home-content">
  <div class="container">
    <div class="row">
      <div id="primary" class="col-md-12 wow fadeIn" data-wow-duration="1.75s" data-wow-offset="100">
        <div id="content">
          <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part( 'loop-header' ); ?>
          <?php lumos_entry_before(); ?>
          <div id="post-<?php the_ID(); ?>"
               <?php post_class(); ?> >
          <?php lumos_entry_top(); ?>
          <?php //get_template_part( 'post-meta-page' ); ?>
          <div class="post-entry">
            <?php the_content(__('Read more &#8250;', 'lumos')); ?>
            <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'lumos'), 'after' => '</div>')); ?>
          </div>
          <!-- end of .post-entry -->
          <?php get_template_part( 'post-data' ); ?>
          <?php lumos_entry_bottom(); ?>
        </div>
        <!-- end of #post -->
        <?php
          endwhile;
          get_template_part( 'loop-nav' );
          else :
          get_template_part( 'loop-no-posts' );
          endif;
          ?>
      </div>
      <!-- end of #content -->
    </div><!-- end of primary -->
    </div><!-- row -->

    <div class="row align-items-center wow fadeInUp" data-wow-duration="1.75s" data-wow-offset="100">
      <div class="col-md-6 my-4 order-2 order-md-1">
        <img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri(); ?>/img/pico.jpg" alt="<?php bloginfo() ?>" />
      </div>   
      <div class="col-md-6 my-4 order-1 order-md-2">
        <h2 class="featured-title">Picoway Resolve <span class="sub">State of the Art Tattoo Removal Technology</span></h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis commodo sem et vehicula. Ut molestie placerat fermentum. Vestibulum nec sapien dui. Vestibulum feugiat purus a arcu pulvinar, eu elementum nibh elementum.</p>
        <p>Sed fringilla diam porta orci consectetur, eu egestas felis pulvinar. Sed blandit mollis tortor, quis tincidunt dolor fermentum sit amet. Aliquam nulla ex, tempus ut lacinia vitae, mattis vel nisi. In erat nunc, hendrerit sed sollicitudin nec, sagittis ac dui.</p>

          <div class="row">
            <div class="col-md-6">
            <?php echo do_shortcode( '[button link="#" class="btn-block"]Learn More[/button]' ) ?>
            </div>
          </div>
      </div>   
    </div><!-- row -->
  </div><!-- .container -->
</section>
<!-- section.home-content -->

<section id="services" class="services">
  <div class="container">
    <div class="row">
      <div class="col-sm-4 wow fadeInUp" data-wow-offset="250">
        <a href="<?php echo esc_url( home_url('') ) ?>">
          <div class="square">
            <div class="square-inn">
              <h3>Moh’s/Surgical <br/>Screening</h3>
            </div>
            <div class="box">
              <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x fa-inverse"></i>
                <i class="fa fa-angle-right fa-stack-1x"></i>
              </span>
            </div>
          </div>
        </a>
      </div> 
      
      <div class="col-sm-4 wow fadeInUp" data-wow-offset="250">
        <a href="<?php echo esc_url( home_url('') ) ?>">
          <div class="square">
            <div class="square-inn">
              <h3>Medical <br/>Screening</h3>
            </div>
            <div class="box">
              <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x fa-inverse"></i>
                <i class="fa fa-angle-right fa-stack-1x"></i>
              </span>
            </div>
          </div>
        </a>
      </div> 

      <div class="col-sm-4 wow fadeInUp" data-wow-offset="250">
        <a href="<?php echo esc_url( home_url('') ) ?>">
          <div class="square">
            <div class="square-inn">
              <h3>Skin Cancer <br/>Screening</h3>
            </div>
            <div class="box">
              <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x fa-inverse"></i>
                <i class="fa fa-angle-right fa-stack-1x"></i>
              </span>
            </div>
          </div>
        </a>
      </div> 
    </div>
  </div>
</section>

<section class="meet">
	<div class="container">
      <div class="row align-items-center">
            
            <div class="col-md-6 wow fadeInLeft" data-wow-duration="1.75s" data-wow-offset="250">
              <h2 class="featured-title text-center text-md-left">Meet Dr. Q <span>Suzanne M. Quardt, M.D.</span></h2>
              <p>Phasellus vel auctor odio, vitae aliquam massa. Suspendisse vestibulum varius ligula, quis hendrerit dolor auctor a. Integer vel lobortis sem, at condimentum dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis tempor pretium. Lorem ipsum dolor sit amet.  Phasellus vel auctor odio, vitae aliquam massa. Suspendisse vestibulum varius ligula, quis hendrerit dolor auctor a. Integer vel lobortis sem, at condimentum dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis tempor pretium. Lorem ipsum dolor sit amet.</p>
              <div class="row">
                <div class="col-md-6">
                  <button class="btn btn-lg btn-primary btn-block" href="<?php echo home_url(); ?>">Read More</button>
                </div>
              </div>
            </div><!-- col -->
            
            <div class="col-md-6 wow fadeInRight" data-wow-duration="1.75s" data-wow-offset="250">
                <img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri(); ?>/img/dr-quardt.jpg" alt="Dr. Quardt" />
            </div>
		  </div><!-- row -->
	</div><!-- .container -->
</section><!-- section -->

<section class="cta-boxes">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-4 mb-4 wow fadeInLeft" data-wow-duration="1.75s" data-wow-offset="125">
        <a href="<?php echo esc_url( home_url('') ) ?>">
          <div class="box">
            <img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri(); ?>/img/services/s-1.jpg" alt="<?php echo esc_html_e('', 'understrap') ?>">

            <div class="holder d-flex">
              <h4>Photo Gallery</h4>
              <div class="box">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x fa-inverse"></i>
                  <i class="fa fa-angle-right fa-stack-1x"></i>
                </span>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-sm-6 col-md-4 mb-4 wow fadeIn" data-wow-duration="1.75s" data-wow-offset="175">
        <a href="<?php echo esc_url( home_url('') ) ?>">
          <div class="box">
            <img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri(); ?>/img/services/s-2.jpg" alt="<?php echo esc_html_e('', 'understrap') ?>">
            <div class="holder d-flex">
              <h4>Patient Reviews</h4>
              <div class="box">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x fa-inverse"></i>
                  <i class="fa fa-angle-right fa-stack-1x"></i>
                </span>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-sm-6 mx-sm-auto col-md-4 mb-4 wow fadeInRight" data-wow-duration="1.75s" data-wow-offset="175">
        <a href="<?php echo esc_url( home_url('') ) ?>">
          <div class="box">
            <img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri(); ?>/img/services/s-3.jpg" alt="<?php echo esc_html_e('', 'understrap') ?>">
            <div class="holder d-flex">
              <h4>Contact Us</h4>
              <div class="box">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x fa-inverse"></i>
                  <i class="fa fa-angle-right fa-stack-1x"></i>
                </span>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

<section class="review" hidden>
	<div class="container wow fadeIn" data-wow-duration="2s" data-wow-offset="175">
    <div class="row">
      <div class="col-12">
        <h2 class="featured-title text-center">Testimoials<span>What Our Patients Are Saying</span></h2>
      </div>
    </div>
    <ul class="bx-review">
      <li>
        <div class="row">
          <div class="col-12 my-4">
            <div class="box">
              <blockquote>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam molestie molestie egestas. Aliquam venenatis aliquet neque a semper. Nam euismod tempus eros, sit amet tristique metus molestie consectetur. Duis gravida nisi nec vestibulum varius. Proin in tincidunt odio. Nulla placerat convallis ligula et rhoncus. Mauris sit amet dapibus nulla....
                <div class="author">
                  Jane Doe
                </div>
              </blockquote>
            </div>
          </div>
          <!-- col -->
        </div>
        <!-- row -->
      </li>

      <li>
        <div class="row">
          <div class="col-12 my-4">
            <div class="box">
              <blockquote>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam molestie molestie egestas. Aliquam venenatis aliquet neque a semper. Nam euismod tempus eros, sit amet tristique metus molestie consectetur. Duis gravida nisi nec vestibulum varius. Proin in tincidunt odio. Nulla placerat convallis ligula et rhoncus. Mauris sit amet dapibus nulla....
                <div class="author">
                  <span class="name">Jane Doe,</span> <span class="location">City Name</span>
                </div>
              </blockquote>
            </div>
          </div>
          <!-- col -->
        </div>
        <!-- row -->
      </li>
    </ul
	</div><!-- .container -->
</section><!-- section -->

<?php get_footer(); } ?>
