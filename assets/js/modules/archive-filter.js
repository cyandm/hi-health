import { endLoading, startLoading } from './loading';
import { initLoadMore } from './load-more';

export const archiveFilter = () => {
  const selectFilter = document.getElementById('selectFilter');
  const postsContainer = document.querySelector('.posts-container');

  if (!selectFilter) return;
  if (!postsContainer) return;

  selectFilter.addEventListener(
    'change',
    ({ target: { value: slug, dataset } }) => {
      startLoading();

      jQuery(($) => {
        $.ajax({
          type: 'get',
          url: cyn_head_script.url,

          data: {
            action: 'cyn_filter_posts',
            _nonce: cyn_head_script.nonce,
            slug,
            ...dataset,
          },

          success: (res) => {
            postsContainer.innerHTML = res.data.html;

            initLoadMore(dataset.postType, res.data.max_num_pages, [
              { slug },
              { taxonomy: dataset.taxonomy },
            ]);
            endLoading();
          },
        });
      });
    }
  );
};
