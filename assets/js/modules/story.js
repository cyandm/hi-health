import { addListener } from "../utils/functions";
import Swiper from "swiper";
import { Pagination } from "swiper/modules";

export const story = () => {
  const homePageTours = document.getElementById("homePageTours");
  if (!homePageTours) return;
  const videos = homePageTours.querySelectorAll("video");

  const homePageToursSwiper = new Swiper("#homePageTours", {
    modules: [],
    slidesPerView: "auto",
    spaceBetween: 12,
    centeredSlides: true,
    loop: true,
    grabCursor: true,
  });

  const playPause = (video) => {
    if (video.paused) {
      video.play();
      video.parentElement.classList.add("playing");
      return;
    }

    video.pause();
    video.parentElement.classList.remove("playing");
  };

  const handleClick = (
    { target },
    { clickedSlide, clickedIndex, activeIndex, slideTo, slides }
  ) => {
    if (clickedSlide == slides[activeIndex]) {
      playPause(target);
      return;
    }

    slideTo(clickedIndex, 100);
  };

  videos.forEach((video) => {
    addListener(video, "click", (e) => handleClick(e, homePageToursSwiper));

    setInterval(() => {
      if (video.paused) return;
      const percent = (video.currentTime * 100) / video.duration;
    }, 1000);
  });
};
