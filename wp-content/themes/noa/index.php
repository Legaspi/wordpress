<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package noa
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;?>

			<div class="posts-container">
				
				<?php while ( have_posts() ) :?>

					<div class="post-wrapp">
					<?php 
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );?>

					</div>
					

				<?php endwhile;?>
			</div>
			
			<?php 
				noa_pagination();
				/* the_posts_pagination( array(
					'prev_text'          => '<i class="fa fa-angle-left"></i> ' . esc_html__( 'Previous', 'noa' ),
					'next_text'          => esc_html__( 'Next', 'noa' ) . ' <i class="fa fa-angle-right"></i>',
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'noa' ) . ' </span>',
				) ); */

			

			
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
