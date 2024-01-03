<?php
global $cyn_general;

$address_text = get_field( 'address' );
$class = isset( $args['class'] ) ? $args['class'] : '';

if ( $address_text === '' )
	return;

?>


<div class="<?= "address-con | " . $class ?>">
	<i class='icon-location'></i>
	<?php printf( '<p>%s</p>', $address_text ) ?>
</div>