export const logicBreadcrumb = () => {
  const breadcrumb = document.querySelector('.breadcrumb');

  if (!breadcrumb) return;
  const separatorGroup = document.querySelectorAll('.separator');

  separatorGroup.forEach((separator) => {
    const iElement = document.createElement('i');
    iElement.classList.add('icon-arrow-left');
    separator.innerHTML = '';
    separator.appendChild(iElement);
  });
};
