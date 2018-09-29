<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package noa
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-aos="fade-up" data-aos-duration="800" data-aos-once="true">
	
		<?php
		if ( is_singular() ) :?>
			<header class="entry-header">
				
					<div class="image-info">
						<?php the_title( '<h1 class="entry-title">', '</h1>' );?>
						<?php if ( 'post' === get_post_type()) :?>
							<div class="entry-meta">
								<?php
									noa_post_date();
									noa_posted_by();
								?>
							</div><!-- .entry-meta -->
						<?php endif; ?>
					</div>
				<?php noa_post_thumbnail(); ?>
					
			</header>
		<?php else :?>
			<?php noa_post_thumbnail(); ?>
			<a href="<?php the_permalink(); ?>" rel="bookmark">
			<div class="info">
				<?php if(is_sticky() ): echo '<span class="sticky-icon">'. esc_html__( 'Sticky post', 'noa' ) .'</span>'; endif?>
				<?php the_title( '<h2 class="entry-title">', '</h2>' );?>
				<div class="meta">
					<?php noa_post_date(); noa_comments_count(); ?>
				</div>
			</div>
			</a>
		<?php endif;?>
		<?php if ( is_singular() ) :?>
			<div class="entry-content">
				<?php the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'noa' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );
			

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'noa' ),
				'after'  => '</div>',
			) );?>
			
		</div><!-- .entry-content -->
		<footer class="entry-footer">
			<?php noa_entry_footer(); ?>
		</footer><!-- .entry-footer -->
		<?php endif ?>
	
</article><!-- #post-<?php the_ID(); ?> -->
