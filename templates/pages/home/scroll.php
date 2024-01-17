<?php
$marks = get_field( 'marks' );

?>

<div class="scroller"
	 data-speed="fast"
	 data-direction="right">
	<ul class="scroller__inner">
		<?php
		foreach ( $marks as $mark ) {
			echo '<li>';
			echo '<span class="mini-logo"></span>';
			echo $mark;
			echo '</li>';
		} ?>
	</ul>
</div>