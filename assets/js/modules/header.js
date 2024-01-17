export const headerBg = () => {
  const headerEl = document.getElementById('mainHeader');
  if (!headerEl) return;

  const archiveServiceHero = document.getElementById('archiveServiceHero');

  if (archiveServiceHero) {
    headerEl.style.setProperty('--bg_clr', '#C0E1E7');
    return;
  }

  headerEl.style.setProperty('--bg_clr', '');
};
