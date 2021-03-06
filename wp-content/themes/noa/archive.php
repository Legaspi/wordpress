<?php
/**
 * The template for displaying archive pages
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

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<div class="posts-container">
			<?php
				/* Start the Loop */
				while ( have_posts() ) :?>
					<div class="post-wrapp">
						<?php the_post();
							
						get_template_part( 'template-parts/content', get_post_type() );?>
						</div>

				<?php endwhile;?>
			</div>

			<?php the_posts_navigation(array(
					'prev_text'                  => __( 'Old','noa'),
					'next_text'                  => __( 'New','noa' ),
					'screen_reader_text' => __( 'Post navigation' ,'noa'),
				) );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
