<?php
global $post_type, $wp_query;
$post_type = isset( $args['post_type'] ) ? $args['post_type'] : $post_type;
$posts_per_page = $wp_query->query_vars['posts_per_page'];

?>
<div class="load-more">
	<a id="loadMoreBTN"
	   data-current-page="1"
	   data-post-type="<?= $post_type ?>"
	   data-posts-per-page="<?= $posts_per_page ?>"
	   class="btn"
	   size="medium"
	   variant="secondary">
		بارگذاری بیشتر
	</a>
</div>