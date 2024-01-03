const btnShowMore = document.querySelector('.btn-more-desc');
const divShowMore = document.querySelector('.more-description');

export const showMoreFunc = () => {
  if (!btnShowMore) return;
  if (!divShowMore) return;

  btnShowMore.addEventListener('click', function () {
    divShowMore.classList.toggle('active-show-more');
  });
};
