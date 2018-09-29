<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" value="" placeholder="<?php echo esc_html__( 'Search', 'noa' ); ?>" name="s" class="s" /> 
	<input type="submit" class="searchsubmit" value="<?php echo esc_html_x( 'Search','search words','noa'); ?>">
</form>