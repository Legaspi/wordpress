<?php
/**
 * The template for displaying featured posts on the front page
 *
 * @package Adonis
 */
?>

<?php $show_content = get_theme_mod( 'adonis_service_show', 'excerpt' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="services-section-thumbnail post-thumbnail">
		<a href="<?php the_permalink(); ?>">
			<?php
			// Output the featured image.
			if ( has_post_thumbnail() ) {
				$thumbnail = 'adonis-services';

				the_post_thumbnail( $thumbnail );
			} else {
				echo '<img src="' .  trailingslashit( esc_url( get_template_directory_uri() ) ) . 'assets/images/no-thumb-100x100.jpg"/>';
			}
			?>
		</a>
	</div>

	<div class="entry-container">
		<div class="entry-header">
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
        </div>

        <?php
		if ( 'excerpt' === $show_content ) {
			$excerpt = get_the_excerpt();

			echo '<div class="entry-summary"><p>' . $excerpt . '</p></div><!-- .entry-summary -->';
		} elseif ( 'full-content' === $show_content ) {
			$content = apply_filters( 'the_content', get_the_content() );
			$content = str_replace( ']]>', ']]&gt;', $content );
			echo '<div class="entry-content">' . $content . '</div><!-- .entry-content -->';
		} ?>
	</div><!-- .entry-container -->
</article>
