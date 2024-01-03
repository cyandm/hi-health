import { activateEl, deActivateEl, definePopUp } from '../utils/functions';

export const loading = document.getElementById('loading');

if (loading) {
  definePopUp(loading);
}

export const startLoading = () => {
  activateEl(loading);
};

export const endLoading = () => {
  deActivateEl(loading);
};
