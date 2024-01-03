import { initLoadMore } from './load-more';
import { endLoading, startLoading } from './loading';

export const archiveSort = () => {
  const radioInputs = document.querySelectorAll('input[name="sort-filter"]');
  const postsContainer = document.querySelector('.posts-container');
  const postsCount = document.getElementById('postsCount');

  if (!radioInputs) return;
  if (!postsContainer) return;

  radioInputs.forEach((input) => {
    input.addEventListener(
      'change',
      ({
        target: {
          dataset: { order, postType, meta },
        },
      }) => {
        startLoading();

        jQuery(($) => {
          $.ajax({
            type: 'post',
            url: cyn_head_script.url,

            data: {
              action: 'cyn_sort_posts',
              _nonce: cyn_head_script.nonce,
              meta,
              order,
              postType,
            },

            success: (res) => {
              postsContainer.innerHTML = res.data.html;
              postsCount.innerHTML = res.data.posts_count;

              initLoadMore(postType, res.data.max_num_pages, [
                { meta },
                { order },
              ]);
              endLoading();
            },
          });
        });
      }
    );
  });
};
