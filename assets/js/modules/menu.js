// ******************* mobile menu
let mobile = document.querySelector(".hamburger-menu");
let close_mobile = document.getElementById("close-menu");

if (mobile) {
  (function () {
    mobile.addEventListener("click", function () {
      document.querySelector(".mobile-menu").classList.toggle("disply-menu");
      document
        .querySelector(".hirka-mobile-contain")
        .classList.toggle("active");
      document.body.style.overflow = "hidden";
      return false;
    });
    close_mobile.addEventListener("click", function () {
      document
        .querySelector(".hirka-mobile-contain")
        .classList.remove("active");
      document.querySelector(".mobile-menu").classList.remove("disply-menu");
      document.body.style.overflow = "auto";
    });
  })();

  let mobileMenuContainer = document.querySelector(".mobile-menu-container");
  let menuItemsHasChildren = mobileMenuContainer.querySelectorAll(
    "li.menu-item-has-children"
  );

  for (let i = 0; i < menuItemsHasChildren.length; i++) {
    menuItemsHasChildren[i].addEventListener("click", function (event) {
      event.stopPropagation();
      let subMenu = this.getElementsByClassName("sub-menu");
      let link = this.querySelector("a");

      if (subMenu[0].style.display === "none") {
        subMenu[0].style.display = "block";
        link.style.color = "#FF6A2B";
        link.style.setProperty("--after-content", '"\\e915"');
      } else {
        subMenu[0].style.display = "none";
        link.style.color = "#595959";
        link.style.setProperty("--after-content", '"\\e914"');
      }
    });
  }
}
