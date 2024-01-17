<?php
$is_complete = isset( $args['complete'] ) ? $args['complete'] : null;

?>



<div class="search-result-item">
	<a href="<?= get_permalink() ?>">
		<?php the_title() ?>
	</a>
	<?php if ( $is_complete ) : ?>
		<span class="post-type">
			<?= pll__( get_post_type( get_the_ID() ) ) ?>
		</span>
	<?php endif; ?>
</div>