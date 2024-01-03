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

const swup = new Swup();

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
};

init();
swup.hooks.on('content:replace', init);
