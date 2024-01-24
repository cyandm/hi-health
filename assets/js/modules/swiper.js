import Swiper from "swiper";
import { Pagination } from "swiper/modules";

export const defineSwipers = () => {
  const gallerySwiper = new Swiper("#galleryPopUp .swiper", {
    modules: [Pagination],
    slidesPerView: 1.5,
    spaceBetween: 40,
    width: window.innerWidth,
    height: window.innerHeight,
    centeredSlides: true,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });

  const homePageTestimonials = new Swiper("#homePageTestimonials", {
    slidesPerView: "auto", //max-width in html 650px on swiper-slide
    centeredSlides: true,
    spaceBetween: 12,
    loop: true,
    width: window.innerWidth,
    autoplay: {
      delay: 3000,
    },
  });
};
