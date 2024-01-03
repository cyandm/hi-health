<?php
$gallery_images = get_field( 'gallery' );
$selected_images = array_filter( $gallery_images );
$selected_images_count = count( $selected_images );

if ( $selected_images_count < 1 )
	return;

function render_thumbnail( $image_id, $class = '', $wrapper = false, ) {
	if ( $wrapper ) {
		printf( '<div class="%s"> <div class="img-wrapper">%s</div> </div>',
			$class,
			wp_get_attachment_image(
				$image_id,
				'full',
				attr: [ 'data-active' => 'false' ]
			) );

		return;
	}

	printf( '<div class="img-wrapper %s">%s</div>',
		$class,
		wp_get_attachment_image(
			$image_id,
			'full',
			attr: [ 'data-active' => 'false' ]
		) );
}

function render_all_thumbnails( $thumbs, $class = '', $wrapper = false ) {
	foreach ( $thumbs as $image_id ) {
		render_thumbnail( $image_id, $class, $wrapper );
	}
}

function render_thumbnails( $thumbs, $count ) {

	if ( $count <= 9 ) {
		render_all_thumbnails( $thumbs );
		return;
	}


	for ( $i = 1; $i <= 8; $i++ ) {
		render_thumbnail( $thumbs[ 'image_' . $i ] );
	}

	printf( '<div id="moreImages">%d+</div>', $count - 8 );

	echo '<div id="galleryPopUp">';
	echo '<div class="swiper">';
	echo '<div id="closeGallery">';
	echo '<i class="icon-close"></i>';
	printf( '<span>%s</span>', __( 'بستن', 'cyn-dm' ) );
	echo '</div>';
	echo '<div class="swiper-wrapper">';
	render_all_thumbnails( $thumbs, 'swiper-slide', true );
	echo '</div>';
	echo '<div class="swiper-pagination"></div>';
	echo '</div>';
	echo '</div>';
}

?>





<div class='gallery' id='gallery'>
	<div class="gallery__feature-image">
		<div id='featureImage'>

		</div>
	</div>

	<div class="gallery__thumbnails">

		<?php render_thumbnails( $selected_images, $selected_images_count ) ?>

	</div>
</div>