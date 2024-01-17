<?php
global $post_type;
$post_type = isset( $args['post_type'] ) ? $args['post_type'] : $post_type;
$class = isset( $args['class'] ) ? $args['class'] : '';

$features = [ 
	'parking' => [ 
		'name' => pll__( 'parking' ),
		'icon-class' => 'icon-parking',
		'post-types' => [ 'tour', 'hotel', 'hospital' ]
	],
	'spa' => [ 
		'name' => pll__( 'spa' ),
		'icon-class' => 'icon-spa',
		'post-types' => [ 'tour', 'hotel' ]
	],
	'wifi' => [ 
		'name' => pll__( 'wifi' ),
		'icon-class' => 'icon-wifi',
		'post-types' => [ 'tour', 'hotel', 'hospital' ]
	],
	'pool' => [ 
		'name' => pll__( 'pool' ),
		'icon-class' => 'icon-pool',
		'post-types' => [ 'tour', 'hotel' ]
	],
	'coffee-shop' => [ 
		'name' => pll__( 'coffee-shop' ),
		'icon-class' => 'icon-cofee',
		'post-types' => [ 'tour', 'hotel', 'hospital' ]
	],
	'medical-house' => [ 
		'name' => pll__( 'urgency' ),
		'icon-class' => 'icon-medical-house',
		'post-types' => [ 'hospital' ]
	],
	'medical' => [ 
		'name' => pll__( 'surgery-room' ),
		'icon-class' => 'icon-medical',
		'post-types' => [ 'hospital' ]
	],
];

$active_features = get_field( 'features' );

if ( ! function_exists( 'render_icons' ) ) {
	function render_icons( $icon_class, $text, $is_active, $post_types, $card_post_type ) {

		$must_render = in_array( $card_post_type, $post_types );


		if ( ! $must_render )
			return;

		echo <<<EOL
		<div class='features__item' data-active="$is_active">
			<i class='$icon_class'></i>
			<span class='features__item__name'>$text</span>
		</div>
		EOL;
	}
}


?>



<div class="<?= "features | " . $class ?>">



	<?php
	foreach ( $features as $feature_name => $feature_info ) {
		render_icons(
			$feature_info['icon-class'],
			$feature_info['name'],
			in_array( $feature_name, $active_features ) ? 'true' : 'false',
			$feature_info['post-types'],
			$post_type,
		);
	}
	?>

</div>