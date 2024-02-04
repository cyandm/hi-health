import { cynActivate } from './custom-events';

export const deActivateEl = (nodeEl) => {
  nodeEl.setAttribute('data-active', 'false');
  nodeEl.dispatchEvent(cynActivate);
};

export const activateEl = (nodeEl) => {
  nodeEl.setAttribute('data-active', 'true');
  nodeEl.dispatchEvent(cynActivate);
};

export const toggleActivateEl = (nodeEl) => {
  const current = nodeEl.getAttribute('data-active');

  if (current === 'false' || !current) {
    activateEl(nodeEl);
    return;
  }

  deActivateEl(nodeEl);
};

export const deActivateAll = (parentNode) => {
  parentNode.forEach((node) => {
    deActivateEl(node);
  });
};

export const activateFirstEl = (parentNode) => {
  activateEl(parentNode[0]);
};

export const addListener = (elementNode, eventType, func) => {
  if (elementNode.getAttribute('hasListener')) return;
  elementNode.setAttribute('hasListener', true);
  elementNode.addEventListener(eventType, func);
};

export const definePopUp = (nodeEl) => {
  nodeEl.addEventListener('cynActivate', (e) => {
    if (e.target != nodeEl) return;
    document.body.setAttribute('data-popup-open', e.target.dataset.active);
  });

  nodeEl.addEventListener('click', (e) => {
    if (e.target != nodeEl) return;
    deActivateEl(nodeEl);
  });
};

export const activeScroll = () => {
  document.body.removeAttribute('data-popup-open');
};

export const setUserIP = () => {
  jQuery(($) => {
    $.getJSON('https://api.ipify.org?format=json', ({ ip }) => {
      window.localStorage.setItem('user-ip', ip);
    });
  });
};

export const getUserIp = () => window.localStorage.getItem('user-ip');

export const setCookie = (cookieName, cookieValue, expireDays) => {
  const d = new Date();
  d.setTime(d.getTime() + expireDays * 24 * 60 * 60 * 1000);
  let expires = 'expires=' + d.toUTCString();
  document.cookie =
    cookieName + '=' + JSON.stringify(cookieValue) + ';' + expires + ';path=/';
};

export const getCookie = (cookieName) => {
  let name = cookieName + '=';
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return JSON.parse(c.substring(name.length, c.length));
    }
  }
  return JSON.parse('{}');
};

export const showMassage = (status, parentEl, innerText = null) => {
  const span = document.createElement('span');
  span.classList.add('message');
  span.classList.add(status);

  if (status === 'success') {
    span.innerText = innerText ?? 'عملیات با موفقیت انجام شد';
    return;
  }

  if (status === 'warning') {
    span.innerText = innerText ?? 'عملیات در انتظار تایید ادمین است';
    return;
  }

  if (status === 'error') {
    span.innerText = innerText ?? 'عملیات با خطا مواجه شد';
    return;
  }

  parentEl.appendChild(span);
};

export const changeButtonStatus = (status, btn) => {
  if (status === 'pending') {
    btn.classList.add('pending');
    //btn.innerText = translateStrings.Btn.pending;
    return;
  }

  if (status === 'success') {
    btn.classList.remove('pending');
    btn.classList.add('success');
    // btn.innerText = translateStrings.Btn.success;
    setTimeout(() => {
      btn.classList.remove('success');
    }, 1000);
    return;
  }

  if (status === 'error') {
    btn.classList.remove('pending');
    btn.classList.add('error');
    btn.innerText = 'There was an error sending the message.';
    //btn.innerText = translateStrings.Btn.error;
    return;
  }
};
