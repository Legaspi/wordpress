<?php 

if ( ! function_exists( 'gallerypress_post_thumbnail' ) ) {

	function gallerypress_post_thumbnail() {

			$img_default = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/default-image.jpg';
			$src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false );
			
			$bg_image = ( has_post_thumbnail() ) ? $src[0] : $img_default;

		?>
		<div class="thumbnail">

				<a href="<?php the_permalink() ?>" rel="bookmark" class="featured-thumbnail" style="background-image: url('<?php echo esc_url ( $bg_image) ?>'); outline: 0px;" >
			
			<?php
				if ( ! has_post_thumbnail() ) {
			?>
				
				<img src="<?php echo esc_url( $img_default ); ?>" class="default-thumbnail"/>

			<?php } ?>
						
			</a>

		</div>
	<?php
			
	}

}

if ( ! function_exists('gallerypress_single_post_thumbnail')) {

	function gallerypress_single_post_thumbnail() {

		$img_default = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/default-image.jpg';
		$src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false );
		
		$bg_image = ( has_post_thumbnail() ) ? $src[0] : $img_default;

		if ( is_single() || is_page() ) :

		?>
		
		<div class="thumbnail">

			<div class="featured-image" style="background-image: url('<?php echo esc_url ( $bg_image ) ?>'); outline: 0px;" >

				<?php
					if ( ! has_post_thumbnail() ) {
				?>
					
					<img src="<?php echo esc_url( $img_default ); ?>" class="default-thumbnail"/>

				<?php } ?>
						
			</div>

		</div>
	
	<?php
		endif;

	}

}

if ( ! function_exists( 'gallerypress_home_post' ) ) {
	/**
	 * Display homepage content
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @return  void
	 */
	function gallerypress_home_post() {

		global $wp_query;

		if ( is_front_page() && is_page_template('template-homepage.php') ) {

			$args = array(
				'post_type' => 'post',
				'ignore_sticky_posts' => 1
			);
			
			$wp_query = new WP_Query( $args );
			
			if ( $wp_query->have_posts() ) {

				do_action( 'gallerypress_loop_before' );

				while ( $wp_query -> have_posts() ) {

					$wp_query -> the_post();

					get_template_part( 'template-parts/content', 'home' );

				} // end of the loop.

				wp_reset_postdata();

				do_action( 'gallerypress_loop_after' );

				
			}
		}

	}
}


if ( ! function_exists('gallerypress_main_wrap_open')) {

	function gallerypress_main_wrap_open() {
		echo '<div class="wrap-content post-animation animation-default">';
	}

}


if ( ! function_exists('gallerypress_main_wrap_close')) {

	function gallerypress_main_wrap_close() {
		
		echo '</div>';

		gallerypress_post_thumbnail();

	}

}

if ( ! function_exists( 'gallerypress_home_post_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function gallerypress_home_post_header() {

		echo '<header class="entry-header">';

		the_title( sprintf( '<h2 class="alpha entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

		echo '</header> <!-- .entry-header -->';
		
	}
}

if ( ! function_exists( 'gallerypress_post_tags' ) ) :
	/**
	 * Displays the post tags on single post view
	 */
	function gallerypress_post_tags() {

		$metadata = array_flip( apply_filters('basepress_enable_post_metadata', array('tag') ) );

		// Get tags.
		$tag_list = get_the_tag_list();


		if ( isset( $metadata['tag'] ) ) {			

					if ( $tag_list ) : ?>

						<div class="entry-footer">

							<div class="entry-tags">

									<?php echo __('<i class="fa fa-tags" aria-hidden="true"></i>', 'gallerypress') . wp_kses_post($tag_list); ?>

							</div>

						</div>

					<?php

					endif;
		}
	}

endif;

if ( ! function_exists( 'gallerypress_post_excerpt' ) ) {

	function gallerypress_post_excerpt() {

		do_action( 'gallerypress_post_content_before');

		echo '<div class="entry-content">';
			
			the_excerpt();

		echo '</div>';

		do_action( 'gallerypress_post_content_after' );

	}
}

if ( ! function_exists( 'gallerypress_post_content_excerpt' ) ) {

	function gallerypress_post_content_excerpt() {

		do_action( 'basepress_post_content_before' );

		echo '<div class="entry-content">';	
			
			the_excerpt();


		echo '</div>';

		do_action( 'basepress_post_content_after' );

	}
}

if ( ! function_exists( 'gallerypress_post_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function gallerypress_post_header() {
		
		do_action( 'basepress_before_post_title');
		
		echo "<div class='wrap-header'>";

			echo "<div class='wrap-title'>";

				if ( is_single() ) {
					
					the_title( '<h1 class="entry-title single-title">', '</h1>' );

				} else {
					
					the_title( sprintf( '<h2 class="alpha entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				}

				basepress_post_metadata();

			echo "</div>";

		echo "</div>";

		do_action( 'basepress_after_post_title');
		
	}
}

if ( ! function_exists( 'gallerypress_page_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function gallerypress_page_header() {
		?>
		<header class="entry-header">
			<?php

			do_action( 'gallerypress_before_page_header');
			
			echo "<div class='wrap-header'>";	
			
				the_title( '<h1 class="entry-title">', '</h1>' );

				basepress_post_metadata();

			echo "</div>";

			do_action( 'gallerypress_after_page_header');
			
			?>
		</header><!-- .entry-header -->
		<?php
	}
}

if ( ! function_exists( 'gallerypress_credit' ) ) {

	function gallerypress_credit() {
		?>
		<div class="site-info">
			<?php echo esc_html( apply_filters( 'gallerypress_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . date_i18n(__( 'Y', 'gallerypress') ) ) ); ?>

			<?php if ( apply_filters( 'basepress_credit_link', true ) ) { ?>

				<?php printf( esc_attr__( '%1$s designed by %2$s.', 'gallerypress' ), 'Theme GalleryPress', '<a href="https://themecountry.com" title="GalleryPress - The best free blog theme for WordPress" rel="author">ThemeCountry</a>' ); ?>
			<?php } ?>
		</div><!-- .site-info -->
		<?php
	}
}


if ( ! function_exists('gallerypress_primary_nav_wrapper')) {

	function gallerypress_primary_nav_wrapper() {
		echo '<div class="main-navigation">';
	}

}

if ( ! function_exists( 'gallerypress_primary_nav' ) ) {
	function gallerypress_primary_nav() {
		?>
		<div id="dropbtn" class="dropdown-menu-toggle">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
		<nav id="site-navigation" class="main-toggle-navigation main-nav" role="navigation">

			<?php
				// Display Primary Navigation.
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_id' 		 => 'primary-navigation',
					'container' 	 => '',
					'menu_class' 	 => 'main-navigation-menu',
					'echo' 			 => true,
					'fallback_cb' 	 => 'basepress_default_menu',
					)
				);
			?>
						
		</nav><!-- #site-navigation -->
		
		<?php 
	}
}


if ( ! function_exists('gallerypress_primary_nav_wrapper_close')) {

	function gallerypress_primary_nav_wrapper_close() {
		echo '</div>';
	}

}

if (! function_exists( 'gallerypress_infinitepaginate' ) ) {

	/*
	|------------------------------------------------------------------------------
	| Ajax Infinite Scroll
	|------------------------------------------------------------------------------
	| 
	| @return void
	|
	*/
	function gallerypress_infinitepaginate() {

		check_ajax_referer( 'gallerypress', 'nonce' );

		$args = isset( $_POST['query'] ) ? array_map( 'esc_attr', $_POST['query'] ) : array();
		$args['post_type'] = isset( $args['post_type'] ) ? esc_attr( $args['post_type'] ) : 'post';
		$args['paged'] = esc_attr( $_POST['page'] );
		$args['post_status'] = 'publish';
		$format = isset($_POST['layout']) ? $_POST['layout'] : get_post_format();

		$loop = new WP_Query( $args );

		if( $loop->have_posts() ):
			while( $loop->have_posts() ): 

				$loop->the_post();
				get_template_part( 'template-parts/content', $format );

			endwhile; 
		endif; 

		wp_reset_postdata();

		exit;

	}

	add_action('wp_ajax_infinite_scroll', 'gallerypress_infinitepaginate'); // for logged in user
	add_action('wp_ajax_nopriv_infinite_scroll', 'gallerypress_infinitepaginate');

}

if ( ! function_exists( 'gallerypress_infinite_loading' )) {

	/*
	|------------------------------------------------------------------------------
	| Infinite loading
	|------------------------------------------------------------------------------
	| 
	| @return void
	|
	*/

	function gallerypress_infinite_loading() {

		global $wp_query;

		$totalPages = $wp_query->max_num_pages;

		?>
		<script type="text/javascript">
				var totalPages = <?php echo $totalPages; ?>;
			</script>
		<?php
	}

}


if ( ! function_exists( 'gallerypress_add_div_infinite_scroll' ) ) {
	/*
	|------------------------------------------------------------------------------
	| Add div Infinite Style
	|------------------------------------------------------------------------------
	| 
	| @return void
	|
	*/
	function gallerypress_add_div_infinite_scroll() {
	?>
		<div class="tc-infinite-scroll">
			<div class="la-ball-spin-clockwise la-dark la-2x">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>
	<?php
	}
}
