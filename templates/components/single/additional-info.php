<?php
$contact_info = get_field( 'contact_information' );
list( 'city' => $city, 'country' => $country, 'description' => $desc ) = $contact_info;

if ( count( array_filter( $contact_info ) ) <= 0 )
	return;


?>


<section class="additional-info | card-info">

	<?php printf( '<h2 >%s</h2>', __( 'سایر مشخصات', 'cyn-dm' ) ) ?>

	<div class='contact-info'>
		<?php printf( '<h3 class="body-s" >%s</h3>', __( 'اطلاعات تماس', 'cyn-dm' ) ) ?>
		<div class='contact-info__item'>
			<?php $country && printf( '<span class="tag">%s</span>', $country ) ?>
			<?php $city && printf( '<span class="tag">%s</span>', $city ) ?>
			<?php $desc && printf( '<p>%s</p>', $desc ) ?>
		</div>
	</div>


</section>