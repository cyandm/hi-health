<?php
$search_text = isset($args['search-text']) ? $args['search-text'] : '';
$post_type = isset($args['post-type']) ? $args['post-type'] : '';


?>

<div class="ajax-search">
	<form action="<?= get_bloginfo('url') ?>" id="searchForm">
		<i class="icon-search"></i>
		<input type="text" id="searchInput" placeholder="<?= $search_text ?>" value="<?php the_search_query() ?>" data-post-type="<?= $post_type ?>" name="s" />

		<input type="hidden" value="<?= $post_type ?>" name="post_type">

		<div class="ajax-search__result" id="ajaxSearchResultWrapper">
			<div id="ajaxSearchResult">

			</div>
			<div class="ajax-search__loading" id="ajaxSearchLoading">
				<div class="ajax-search__loader"></div>
			</div>
			<div class="ajax-search__footer">
				<button id="ajaxSearchViewAll" type="submit" size="medium" variant="primary" class="btn ajax-search__view-all">
					<?= pll__('view-all') ?>
				</button>

				<i class="icon-close" id="ajaxSearchClose">

				</i>
			</div>
		</div>

	</form>


</div>