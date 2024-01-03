<?php
$id = isset( $args['id'] ) ? $args['id'] : null;
?>


<div class="post-content">

	<div class="single-post__thumbnail">
		<?php the_post_thumbnail( 'full' ) ?>
	</div>

	<?php the_content() ?>
</div>