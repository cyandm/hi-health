<?php
$phone = get_option( 'phone_number_one' );

$elements = [ 
	[ 
		'name' => 'خانه',
		'id' => 'home',
		'link' => site_url(),
		'icon' => 'icon-mobile',
		'order' => 2
	],
	[ 
		'name' => 'زبان',
		'id' => 'lang',
		'link' => '#',
		'icon' => 'icon-globe',
		'order' => 1
	],
	[ 
		'name' => 'تماس',
		'id' => 'phone',
		'link' => "tel:$phone",
		'icon' => 'icon-phone',
		'order' => 3
	],
]

	?>

<div class="mobile-app-bar">
	<?php
	foreach ( $elements as $el ) {
		list(
			'name' => $name,
			'id' => $id,
			'link' => $link,
			'icon' => $icon,
			'order' => $order ) = $el;

		echo <<<EOL
        <a href="$link" class="mobile-app-bar__item" id="$id" style="--order:$order">
            <i class="$icon"></i>
            <span>$name</span>
        </a>
        EOL;
	}

	?>
</div>