import { endLoading, startLoading } from './loading';

export const loadMore = () => {
  const loadMoreBTN = document.getElementById('loadMoreBTN');
  if (!loadMoreBTN) return;

  loadMoreBTN.addEventListener('click', ({ target: { dataset } }) => {
    startLoading();

    jQuery(($) => {
      $.ajax({
        type: 'get',
        url: cyn_head_script.url,
        data: {
          action: 'cyn_load_more',
          _nonce: cyn_head_script.nonce,
          ...dataset,
        },

        success: (res) => {
          $('.posts-container').append(res.data.html);

          loadMoreBTN.setAttribute(
            'data-current-page',
            parseInt(dataset.currentPage) + 1
          );

          if (res.data.max_num_pages === parseInt(dataset.currentPage)) {
            loadMoreBTN.setAttribute('disable', true);
          }

          endLoading();
        },
      });
    });
  });
};

export const initLoadMore = (postType, maxNumPages, queryArgs = []) => {
  const loadMoreBTN = document.getElementById('loadMoreBTN');
  if (!loadMoreBTN) return;

  loadMoreBTN.setAttribute('data-current-page', 1);
  loadMoreBTN.setAttribute('disable', maxNumPages === 1);
  loadMoreBTN.setAttribute('data-post-type', postType);

  queryArgs.forEach((arg) => {
    loadMoreBTN.setAttribute(
      `data-${Object.keys(arg)[0]}`,
      Object.values(arg)[0]
    );
  });
};
