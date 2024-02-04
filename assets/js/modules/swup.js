import Swup from 'swup';
import { showMoreFunc } from './show-more';
import { loadMore } from './load-more';
import { Gallery } from './gallery';
import { archiveSort } from './archive-sort';
import { logicBreadcrumb } from './breadcrumb';
import { defineSwipers } from './swiper';
import { archiveFilter } from './archive-filter';
import { menu } from './menu';
import { LikePost } from './like-post';
import { sharePost } from './share-post';
import { Comments } from './comments';
import { ContactUs, ReservePopUp } from './forms';
import { headerBg } from './header';
import { languageSwitcher } from './language-switcher';
import { ajaxSearch } from './ajax-search';
import { SearchPage } from '../pages/search';
import { story } from './story';

// const swup = new Swup({
//   animateHistoryBrowsing: true,
//   cache: false,
// });

const init = () => {
  showMoreFunc();
  loadMore();
  Gallery();
  archiveSort();
  logicBreadcrumb();
  defineSwipers();
  archiveFilter();
  menu();
  LikePost();
  sharePost();
  Comments();
  ReservePopUp();
  ContactUs();
  headerBg();
  languageSwitcher();
  ajaxSearch();
  SearchPage();
  story();

  //console.log(translateStrings);
};

init();

// swup.hooks.on('content:replace', init);
