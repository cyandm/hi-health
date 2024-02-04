const scrollers = document.querySelectorAll('.scroller');

if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
  addAnimation();
}

function addAnimation() {
  scrollers.forEach((scroller) => {
    scroller.setAttribute('data-animated', true);

    const scrollerInner = scroller.querySelector('.scroller__inner');
    const scrollerContent = Array.from(scrollerInner.children);

    scrollerContent.forEach((item) => {
      const duplicatedItem = item.cloneNode(true);
      const duplicatedItem2 = item.cloneNode(true);
      duplicatedItem.setAttribute('aria-hidden', true);
      duplicatedItem2.setAttribute('aria-hidden', true);
      scrollerInner.appendChild(duplicatedItem);
      scrollerInner.insertBefore(
        duplicatedItem2,
        scrollerInner.firstElementChild
      );
    });
  });
}
