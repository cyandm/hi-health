<?php
$phone = get_option('phone_number_one');

$elements = [
	[
		'name' => pll__('mobile-app-bar-home'),
		'id' => 'home',
		'link' => site_url(),
		'icon' => 'icon-home',
		'order' => 2
	],
	[
		'name' => pll__('mobile-app-bar-languages'),
		'id' => 'lang',
		'link' => '#',
		'icon' => 'icon-globe',
		'order' => 1
	],
	[
		'name' => pll__('mobile-app-bar-contact'),
		'id' => 'phone',
		'link' => "tel:$phone",
		'icon' => 'icon-phone',
		'order' => 3
	],
];


$langs = pll_the_languages([
	'raw' => true
]);

$current_lang = pll_current_language(\OBJECT);

?>

<div class="mobile-app-bar">

	<?php
	foreach ($elements as $el) {
		list(
			'name' => $name,
			'id' => $id,
			'link' => $link,
			'icon' => $icon,
			'order' => $order
		) = $el;

		echo <<<EOL
        <a href="$link" class="mobile-app-bar__item" id="$id" style="--order:$order">
            <i class="$icon"></i>
            <span>$name</span>
        </a>
        EOL;
	}

	?>


	<div class="lang-switcher__list" id="lang-list">
		<?php
		foreach ($langs as $lang) {

			if ($lang['current_lang'])
				continue;

			printf(
				'<a href="%s" class="lang-switcher__item">%s <img src="%s" /></a>',
				$lang['url'],
				$lang['slug'],
				$lang['flag']
			);
		}
		?>


	</div>

</div>