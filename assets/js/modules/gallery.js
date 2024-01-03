import {
  activateEl,
  activateFirstEl,
  deActivateAll,
  deActivateEl,
  definePopUp,
} from '../utils/functions';

export const Gallery = () => {
  const gallery = document.getElementById('gallery');
  const featureImage = document.getElementById('featureImage');
  const thumbnails = document.querySelectorAll(
    '.gallery__thumbnails > .img-wrapper img'
  );
  const moreImages = document.getElementById('moreImages');
  const galleryPopUp = document.getElementById('galleryPopUp');
  const closeGallery = document.getElementById('closeGallery');

  if (!gallery) return;
  if (!featureImage) return;
  if (!thumbnails) return;

  thumbnails.forEach((thumb, key, thumbs) => {
    thumb.addEventListener('click', () => {
      deActivateAll(thumbs);
      activateEl(thumb);
    });

    thumb.addEventListener('cynActivate', (e) => {
      if (!e.target.dataset.active) return;
      featureImage.style.backgroundImage = `url(${e.target.currentSrc})`;
    });
  });

  activateFirstEl(thumbnails);

  if (!moreImages) return;
  if (!galleryPopUp) return;
  if (!closeGallery) return;

  moreImages.addEventListener('click', () => activateEl(galleryPopUp));
  galleryPopUp.addEventListener('click', (e) => {
    if (e.target !== galleryPopUp) return;
    deActivateEl(galleryPopUp);
  });
  closeGallery.addEventListener('click', () => deActivateEl(galleryPopUp));

  definePopUp(galleryPopUp);
};
