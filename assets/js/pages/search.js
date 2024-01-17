import { addListener } from '../utils/functions';
import { startLoading, endLoading } from '../modules/loading';

export const SearchPage = () => {
  const searchPage = document.getElementById('searchPage');
  if (!searchPage) return;

  const urlParams = new URLSearchParams(window.location.search);
  const post_type = urlParams.get('post_type') ?? 'default';

  const currentRadio = document.querySelector(
    `input[type="radio"][value=${post_type}]`
  );

  currentRadio.checked = true;

  searchPageAjax();
};

const searchPageAjax = () => {
  const postsContainer = document.getElementById('postsContainer');
  const foundPostsEl = document.getElementById('foundPosts');
  const searchPageForm = document.getElementById('searchPageForm');
  const searchPageInput = document.getElementById('searchPageInput');
  const searchRadioGroup = document.querySelectorAll('input[type="radio"]');

  addListener(searchPageInput, 'keyup', () =>
    searchPageForm.dispatchEvent(
      new Event('submit', { bubbles: false, cancelable: false })
    )
  );

  searchRadioGroup.forEach((el) => {
    addListener(el, 'change', () =>
      searchPageForm.dispatchEvent(
        new Event('submit', { bubbles: false, cancelable: false })
      )
    );
  });

  addListener(searchPageForm, 'submit', (e) =>
    ajaxSearchQuery(e, postsContainer, foundPostsEl)
  );
};

let timeOut;
const ajaxSearchQuery = (e, postsContainer, foundPostsEl) => {
  e.preventDefault();

  startLoading();
  clearTimeout(timeOut);

  const formData = new FormData(e.currentTarget, e.submitter);
  formData.append('action', 'cyn_ajax_search_page');
  formData.append('_nonce', cyn_head_script.nonce);

  timeOut = setTimeout(() => {
    jQuery(($) => {
      $.ajax({
        type: 'POST',
        url: cyn_head_script.url,
        cache: false,
        processData: false,
        contentType: false,
        data: formData,

        success: (res) => {
          postsContainer.innerHTML = res.html;
          foundPostsEl.innerText = res.foundPosts;

          endLoading();
        },
      });
    });
  }, 1000);
};
