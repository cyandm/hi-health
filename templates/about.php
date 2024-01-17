<?php /* Template Name: About */?>

<?php
global $cyn_render;

$picture_group_1 = get_field( 'picture_group_1' );
$picture_group_2 = get_field( 'picture_group_2' );
$picture_group_3 = get_field( 'picture_group_3' );
$team_members = get_field( 'team_members' );
$cta_group = get_field( 'cta' );





if ( ! function_exists( 'render_about_picture_group' ) ) {
	function render_about_picture_group( $picture_group, $index ) {
		if ( count( array_filter( $picture_group ) ) === 0 )
			return;



		global $cyn_render;
		?>

		<section class="<?= 'about-us__picture_group container ' . "about-us__picture_group_$index" ?>">
			<div>
				<?php $cyn_render->render_image( $picture_group['image'] ) ?>
			</div>

			<div>
				<h2>
					<?= $picture_group['title'] ?>
				</h2>

				<p>
					<?= $picture_group['text'] ?>
				</p>
			</div>
		</section>

		<?php
	}
}

?>

<?php get_header() ?>

<main class="about-us"
	  id="aboutUsPage">
	<section class="about-us__header">
		<div class="container">
			<div>
				<h1 class="title-s">
					<?= get_field( 'page_title' ) ?>
				</h1>

				<p class="h1">
					<?= get_field( 'page_subtitle' ) ?>
				</p>

			</div>

			<?php $cyn_render->render_image( get_field( 'page_thumbnail' ) ) ?>
		</div>
	</section>

	<?php render_about_picture_group( $picture_group_1, 1 ) ?>
	<?php render_about_picture_group( $picture_group_2, 2 ) ?>

	<?php if ( false !== $team_members ) : ?>
		<section class="about-us__team container">

			<h2 class="about-us__team__header">
				<?php pll_e( 'hi-health-team' ) ?>
			</h2>

			<div class="grid-col-4">
				<?php
				foreach ( $team_members as $member ) {
					get_template_part( '/templates/components/card/member',
						null, [ 'member_ID' => $member ] );
				}
				?>
			</div>

		</section>
	<?php endif; ?>


	<?php if ( count( array_filter( $cta_group ) ) > 0 ) : ?>
		<section class="about-us__cta container">
			<div style="--bg-url: url(<?= $cta_group['bg_url'] ?>) ">
				<p class="title-s">
					<?= $cta_group['title'] ?>
				</p>

				<a class="btn"
				   variant="secondary"
				   size="medium"
				   href="<?= $cta_group['btn_link'] ?>">
					<?= $cta_group['btn_txt'] ?>
				</a>
			</div>
		</section>
	<?php endif; ?>


	<?php render_about_picture_group( $picture_group_3, 3 ) ?>

</main>


<?php get_footer() ?>