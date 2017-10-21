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
      <div class="row">
        <div class="col-12" style="margin-top:auto; padding-bottom: 6rem">
                <nav>
                  <?php wp_nav_menu(array( 'theme_location' => 'slider-nav','menu_class' => 'slider-nav')); ?>
                </nav>
        </div>
        <!-- col -->
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
  <!-- bx-slider -->
</section>


<section class="call-to-actions">
  <div class="container">
    <div class="row py-4">
      <div class="col-md-4 d-flex align-items-center justify-content-start justify-content-md-around mb-4 mb-md-0">
        <div class="icon">
          <span class="fa-stack fa-lg">
            <i class="fa fa-circle-thin fa-stack-2x"></i>
            <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
          </span>
        </div>
        <div class="contacts">
          <p>Locations</p>
          <p><a href="<?php echo esc_url( home_url('location') ) ?>"><?php echo esc_html_e('Palm Springs', 'understrap') ?></a> | <a href="<?php echo esc_url( home_url('location') ) ?>"><?php echo esc_html_e('Palm Desert', 'understrap') ?></a></p>
        </div>
      </div>

      <div class="col-md-4 d-flex align-items-center justify-content-start justify-content-md-around mb-4 mb-md-0">
        <div class="icon">
          <span class="fa-stack fa-lg">
            <i class="fa fa-circle-thin fa-stack-2x"></i>
            <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
          </span>
        </div>
        <div class="contacts">
          <p>Call for an Appointment</p>
          <p><a href="tel:+1-760-327-1509"><?php echo esc_html_e('760.327.1509', 'understrap') ?></a> | <a href="tel:+1-760-346-7431"><?php echo esc_html_e('760.346.7431', 'understrap') ?></a></p>
        </div>
      </div>

      <div class="col-md-4 d-flex align-items-center justify-content-start justify-content-md-around mb-4 mb-md-0">
        <div class="icon">
          <span class="fa-stack fa-lg">
            <i class="fa fa-circle-thin fa-stack-2x"></i>
            <i class="fa fa-calendar fa-stack-1x fa-inverse"></i>
          </span>
        </div>
        <div class="contacts">
          <p>Schedule a Consultation</p>
          <p><a href="<?php echo esc_url( home_url('') ) ?>"><?php echo esc_html_e('Book Online', 'understrap') ?></a></p>
        </div>
      </div>
    </div>
  </div>
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
        <!-- end of #post--->
        <?php
  		endwhile;
  		get_template_part( 'loop-nav' );
  		else :
  		get_template_part( 'loop-no-posts' );
  		endif;
  		?>
      </div>
      <!-- end of #content -->
    </div>
    <!-- end of primary -->
    </div>
  </div>
<!-- .container -->
</section>
<!-- section.home-content -->

<section class="meet">
	<div class="container">
      <div class="row">
            <div class="col-md-6 wow fadeInLeft" data-wow-duration="1.75s" data-wow-offset="250">
                <img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri(); ?>/img/docs.png" alt="Dr. Shteynberg" />
            </div>
            <div class="col-md-6 wow fadeInRight" data-wow-duration="1.75s" data-wow-offset="250">
              <h2 class="featured-title text-center text-md-left">Meet Our Surgeons<span>at Desert Oral Surgery</span></h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin maximus facilisis ligula eu blandit. Aenean aliquam lacus eget viverra iaculis. Proin facilisis auctor ex, sit amet pulvinar sapien vehicula at. Mauris scelerisque ut mauris cursus cursus. Nam auctor pharetra erat vitae consequat. Aliquam in congue metus, et scelerisque velit.</p>
              <div class="row">
                <div class="col-md-6">
                  <button class="btn btn-lg btn-secondary btn-block" href="<?php echo home_url(); ?>">Read More</button>
                </div>
              </div>
      			</div><!-- col -->
		  </div><!-- row -->
	</div><!-- .container -->
</section><!-- section -->

<section class="cta-boxes">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-4 mb-4 wow fadeInLeftBig" data-wow-duration="1.75s" data-wow-offset="125" data-wow-delay="0.25s">
        <a href="<?php echo esc_url( home_url('') ) ?>">
          <div class="box">
            <img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri(); ?>/img/services/s-1.jpg" alt="<?php echo esc_html_e('', 'understrap') ?>">
            <h4>Procedures</h4>
          </div>
        </a>
      </div>

      <div class="col-sm-6 col-md-4 mb-4 wow fadeInLeftBig" data-wow-duration="1.75s" data-wow-offset="175" data-wow-delay="0.5s">
        <a href="<?php echo esc_url( home_url('') ) ?>">
          <div class="box">
            <img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri(); ?>/img/services/s-2.jpg" alt="<?php echo esc_html_e('', 'understrap') ?>">
            <h4>Why Desert Oral</h4>
          </div>
        </a>
      </div>

      <div class="col-sm-6 mx-sm-auto col-md-4 mb-4 wow fadeInLeftBig" data-wow-duration="1.75s" data-wow-offset="175" data-wow-delay="0.75s">
        <a href="<?php echo esc_url( home_url('') ) ?>">
          <div class="box">
            <img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri(); ?>/img/services/s-3.jpg" alt="<?php echo esc_html_e('', 'understrap') ?>">
            <h4>Patient Registration</h4>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

<section class="review">
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
