let btnShowMore = document.querySelector(".btn-more-desc");
let divShowMore = document.querySelector(".more-description");

btnShowMore.addEventListener("click", function () {
  divShowMore.classList.toggle("active-show-more");
});
