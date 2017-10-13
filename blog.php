<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Blog Template
 *
*/

get_header();

global $more;
$more = 0;
?>

<div id="content-blog" class="<?php echo implode( ' ', lumos_get_content_classes() ); ?>">

	<?php get_template_part( 'loop-header' ); ?>

	<?php
	global $wp_query, $paged;
	if( get_query_var( 'paged' ) ) {
		$paged = get_query_var( 'paged' );
	}
	elseif( get_query_var( 'page' ) ) {
		$paged = get_query_var( 'page' );
	}
	else {
		$paged = 1;
	}
	$blog_query = new WP_Query( array( 'post_type' => 'post', 'paged' => $paged ) );
	$temp_query = $wp_query;
	$wp_query = null;
	$wp_query = $blog_query;

	if( $blog_query->have_posts() ) :

		while( $blog_query->have_posts() ) : $blog_query->the_post();
			?>

			<?php lumos_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php lumos_entry_top(); ?>

				<?php get_template_part( 'post-meta' ); ?>

				<div class="post-entry">
					<?php if( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
					<?php endif; ?>
					<?php the_content( __( 'Read more &#8250;', 'lumos' ) ); ?>
					<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'lumos' ), 'after' => '</div>' ) ); ?>
				</div>
				<!-- end of .post-entry -->

				<?php get_template_part( 'post-data' ); ?>

				<?php lumos_entry_bottom(); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->
			<?php lumos_entry_after(); ?>

		<?php
		endwhile;

		if( $wp_query->max_num_pages > 1 ) :
			?>
			<div class="navigation">
				<div class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'lumos' ), $wp_query->max_num_pages ); ?></div>
				<div class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'lumos' ), $wp_query->max_num_pages ); ?></div>
			</div><!-- end of .navigation -->
		<?php
		endif;

	else :

		get_template_part( 'loop-no-posts' );

	endif;
	$wp_query = $temp_query;
	wp_reset_postdata();
	?>

</div><!-- end of #content-blog -->


</div><!-- end of wrapper 1024 -->

</div><!-- end of default column -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>
