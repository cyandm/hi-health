import {
  activateEl,
  addListener,
  changeButtonStatus,
  deActivateEl,
  definePopUp,
  showMassage,
} from '../utils/functions';

export const ajaxSendForm = (formEl, action) => (e) => {
  e.preventDefault();
  changeButtonStatus('pending', e.submitter);

  const formData = new FormData(e.currentTarget, e.submitter);

  formData.append('action', action);
  formData.append('_nonce', cyn_head_script.nonce);

  jQuery(($) => {
    $.ajax({
      type: 'POST',
      url: cyn_head_script.url,
      cache: false,
      processData: false,
      contentType: false,
      data: formData,

      success: (res) => {
        formEl.reset();
        showMassage('success', formEl);
        changeButtonStatus('success', e.submitter);
      },
      error: () => {
        showMassage('error', formEl);
        changeButtonStatus('error', e.submitter);
      },
    });
  });
};

export const ContactUs = () => {
  const contactUsPage = document.getElementById('contactUsPage');
  const contactForm = document.getElementById('contactForm');

  if (!contactUsPage) return;

  addListener(
    contactForm,
    'submit',
    ajaxSendForm(contactForm, 'cyn_contact_us_form')
  );
};

export const ReservePopUp = () => {
  const reservePopUp = document.getElementById('reservePopUp');
  const reservePopUpForm = document.getElementById('reservePopUpForm');
  const reservePopUpOpener = document.getElementById('reservePopUpOpener');
  const reservePopUpCloser = document.getElementById('reservePopUpCloser');

  if (!reservePopUp) return;
  if (!reservePopUpForm) return;
  if (!reservePopUpOpener) return;
  if (!reservePopUpCloser) return;

  definePopUp(reservePopUp);

  addListener(reservePopUpOpener, 'click', () => activateEl(reservePopUp));
  addListener(reservePopUpCloser, 'click', () => deActivateEl(reservePopUp));

  addListener(
    reservePopUpForm,
    'submit',
    ajaxSendForm(reservePopUpForm, 'cyn_reserve_form')
  );
};
