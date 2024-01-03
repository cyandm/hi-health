<?php
$id = isset( $args['id'] ) ? $args['id'] : 0;

$comments_query = new WP_Comment_Query( [ 
	'count' => false,
	'no_found_rows' => false,
	'number' => 100, //@need Load More
	'post_id' => $id,
	'status' => '1'

] );
$comments = $comments_query->comments;
$comments_count = sprintf( '<h2 class="comments__count">%s %s</h2>',
	$comments_query->found_comments, __( 'دیدگاه', 'cyn-dm' ) );





?>

<section class="comments">
	<div class="comments__count-wrapper">

		<span class="comments__text">
			<?= $comments_count ?>
			<?php _e( 'شما هم توی این بحث شرکت کنید', 'cyn-dm' ) ?>
		</span>
	</div>

	<div class="comments__send">
		<a id="commentOpener"
		   class="btn"
		   variant="primary"
		   size="big"
		   class="btn">

			<i class="icon-send"></i>
			<?php _e( 'ارسال دیدگاه', 'cyn-dm' ) ?>
		</a>
	</div>
</section>

<div data-active="false"
	 class="comments__list"
	 id="commentList">

	<div class="comments__action">
		<i class="icon-close btn icon"
		   id="commentCloser"></i>

		<div class="comments__text">
			<?= $comments_count ?>
			<?php _e( 'شما هم توی این بحث شرکت کنید', 'cyn-dm' ) ?>
		</div>

	</div>

	<div class="comments__add-new">
		<form action="#"
			  id="addNewComment">
			<div id="parentDiv"
				 class="comments__add-new__parent"
				 data-active="false">

				<div>
					<span class="comments__add-new__parent-text">
						<?php _e( 'پاسخ به:', 'cyn-dm' ) ?>
						<span id="parentText"></span>
					</span>
					<i class="icon-close"
					   id="closeReply"></i>
				</div>


			</div>

			<div class="comments__add-new__massage"
				 id="commentsMessage">

			</div>

			<label for="name">
				<input type="text"
					   name="author-name"
					   required
					   id="name"
					   oninvalid="this.setCustomValidity('<?php _e( 'نام فیلد ضروری است', 'cyn-dm' ) ?>')"
					   value="<?= is_user_logged_in() ? wp_get_current_user()->display_name : '' ?>"
					   placeholder="<?php _e( 'نام', 'cyn-dm' ) ?>">
			</label>
			<label for="content">
				<textarea name="content"
						  required
						  oninvalid="this.setCustomValidity('<?php _e( 'دیدگاه فیلد ضروری است', 'cyn-dm' ) ?>')"
						  id="content"
						  placeholder="<?php _e( 'دیدگاهتان را وارد کنید', 'cyn-dm' ) ?>"></textarea>
			</label>
			<input type="hidden"
				   id="parentID"
				   name="parent-id"
				   value="">

			<input type="hidden"
				   name="post-id"
				   value="<?= $id ?>">

			<button class="btn"
					size="small"
					variant="primary"
					type="submit"
					value="">
				<i class="icon-send"></i>
				<?= __( 'ارسال دیدگاه', 'cyn-dm' ) ?>
			</button>
		</form>
	</div>


	<div class="comments__list__wrapper">
		<?php
		if ( $comments ) {

			foreach ( $comments as $comment ) {
				get_template_part( '/templates/single/comment', null, [ 'comment' => $comment ] );
			}

		} else {
			_e( 'هیج دیدگاهی یافت نشد!', 'cyn-dm' );
		}
		?>
	</div>

</div>