import { addListener } from '../utils/functions';

export const sharePost = () => {
  const shareAction = document.getElementById('shareAction');
  const title = document.querySelector('h1');

  if (!shareAction) return;
  if (!title) return;

  addListener(shareAction, 'click', () => {
    navigator.share({
      url: window.location.href,
      title,
    });
  });
};
