<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package noa
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'noa' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->
			<div class="posts-container">

			<?php while ( have_posts() ) :?>
			<div class="post-wrapp">

				<?php the_post();

				get_template_part( 'template-parts/content', 'content' );?>
			</div>

			<?php endwhile; ?>
			</div>

			<?php the_posts_navigation(array(
					'prev_text'                  => __( 'Old','noa'),
					'next_text'                  => __( 'New','noa' ),
					'screen_reader_text' => __( 'Post navigation' ,'noa'),
					));

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php

get_footer();
