import {
  activateEl,
  addListener,
  deActivateEl,
  getCookie,
  getUserIp,
  setCookie,
  toggleActivateEl,
} from '../utils/functions';

export const LikePost = () => {
  const likePostGroup = document.querySelectorAll('[data-role="like-action"]');
  if (!likePostGroup) return;

  likePostGroup.forEach((el) => {
    const count = el.querySelector('#count');

    addListener(el, 'click', () => {
      jQuery(($) => {
        $.ajax({
          type: 'post',
          url: cyn_head_script.url,
          data: {
            _nonce: cyn_head_script.nonce,
            action: 'cyn_like_post',
            ...el.dataset,
            userId: getUserIp(),
          },

          success: ({ isUserLiked, likeCount }) => {
            count.innerHTML = likeCount;
            isUserLiked ? activateEl(el) : deActivateEl(el);
            cookieManagement(el.dataset.postId, isUserLiked);
          },
        });
      });
    });
  });
};

const cookieManagement = (postId, isUserLiked) => {
  const cookies = getCookie('postsUserLiked');

  const addPostToCookie = () => {
    Object.assign(cookies, { [postId]: true });
    setCookie('postsUserLiked', cookies, 90);
  };

  const removePostFromCookie = () => {
    Object.assign(cookies, { [postId]: false });
    setCookie('postsUserLiked', cookies, 90);
  };

  if (isUserLiked) {
    addPostToCookie();
    return;
  }

  removePostFromCookie();
};
