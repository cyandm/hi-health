import {
  activateEl,
  addListener,
  deActivateEl,
  definePopUp,
  toggleActivateEl,
} from '../utils/functions';

export const menu = () => {
  const mobileMenu = document.getElementById('mobileMenu');
  const menuOpener = document.getElementById('menuOpener');
  const menuCloser = document.getElementById('menuCloser');
  const menuItemHasChildren = document.querySelectorAll(
    '.menu-item-has-children'
  );

  if (!mobileMenu) return;
  if (!menuOpener) return;
  if (!menuCloser) return;

  definePopUp(mobileMenu);
  deActivateEl(mobileMenu);

  addListener(menuOpener, 'click', () => activateEl(mobileMenu));
  addListener(menuCloser, 'click', () => deActivateEl(mobileMenu));

  if (!menuItemHasChildren) return;

  menuItemHasChildren.forEach((el) => {
    addListener(el, 'click', (e) => {
      if (e.target != el) return;
      toggleActivateEl(el);
    });
    addGridWrapper(el);
  });
};

const addGridWrapper = (el) => {
  const hasGrid = el.children.item(1).classList.contains('grid-wrapper');
  if (hasGrid) return;

  const submenu = el.querySelector('ul.sub-menu');
  const div = document.createElement('div');
  div.classList.add('grid-wrapper');

  el.appendChild(div);
  div.appendChild(submenu);
};
