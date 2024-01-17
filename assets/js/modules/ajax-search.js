import { activateEl, addListener, deActivateEl } from '../utils/functions';

export const ajaxSearch = () => {
  const searchForm = document.getElementById('searchForm');
  const searchInput = document.getElementById('searchInput');
  const ajaxSearchResultWrapper = document.getElementById(
    'ajaxSearchResultWrapper'
  );
  const ajaxSearchResult = document.getElementById('ajaxSearchResult');
  const ajaxSearchLoading = document.getElementById('ajaxSearchLoading');
  const ajaxSearchViewAll = document.getElementById('ajaxSearchViewAll');
  const ajaxSearchClose = document.getElementById('ajaxSearchClose');

  if (!searchInput) return;
  if (!searchForm) return;
  let timeOut;

  addListener(searchInput, 'keyup', (e) => {
    activateEl(ajaxSearchLoading);
    activateEl(ajaxSearchResultWrapper);

    const value = e.target.value;

    if (value === '' || value.length <= 3) {
      deActivateEl(ajaxSearchLoading);
      return;
    }

    clearTimeout(timeOut);

    timeOut = setTimeout(() => {
      jQuery(($) => {
        $.ajax({
          type: 'post',
          url: cyn_head_script.url,
          data: {
            _nonce: cyn_head_script.nonce,
            action: 'cyn_ajax_search',
            value,
            postType: e.target.dataset.postType,
          },

          success: (response) => {
            ajaxSearchResult.innerHTML = response.html;

            if (response.foundPosts < 3) {
              deActivateEl(ajaxSearchViewAll);
            } else {
              activateEl(ajaxSearchViewAll);
            }

            deActivateEl(ajaxSearchLoading);
          },
        });
      });
    }, 500);
  });

  addListener(ajaxSearchViewAll, 'click', (e) => {
    searchForm.dispatchEvent(
      new Event('submit', { cancelable: true, bubbles: true })
    );
  });

  addListener(ajaxSearchClose, 'click', (e) => {
    deActivateEl(ajaxSearchResultWrapper);
  });
};
