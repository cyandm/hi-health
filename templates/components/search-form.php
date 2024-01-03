<?php
$search_text = isset( $args['search-text'] ) ? $args['search-text'] : '';
?>

<div class="ajax-search">
	<form role="search"
		  method="get"
		  id="searchform"
		  action="<?= get_bloginfo( 'url' ) ?>">
		<i class="icon-search"></i>
		<input type="search"
			   placeholder="<?php _e( $search_text, 'cyn-dm' ) ?>"
			   value="<?php the_search_query(); ?>"
			   name="s"
			   id="search" />
	</form>
</div>