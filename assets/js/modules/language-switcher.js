//because changing page dynamic with swup

export const languageSwitcher = () => {
  jQuery(($) => {
    $.ajax({
      type: 'POST',
      url: cyn_head_script.url,
      data: {
        _nonce: cyn_head_script.nonce,
        action: 'cyn_languages',
      },

      success: (res) => {
        document.body.classList.toggle('cyn-is-rtl', res.langAttr.is_rtl !== 0);
      },
    });
  });
};
