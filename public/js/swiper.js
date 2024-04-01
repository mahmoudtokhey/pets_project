var swiper = new Swiper(".mySwiper", {
  spaceBetween: 10,
  slidesPerView: 4,
  freeMode: true,
  watchSlidesProgress: true,
});
var swiper2 = new Swiper(".mySwiper2", {
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
    type: "fraction",
  },
  thumbs: {
    swiper: swiper,
  },
  on: {
    slideChange: function () {
      let swiperTotal = document.querySelector(".swiper-pagination-total");
      swiperTotal.innerHTML = `<i class='fa-regular fa-image'></i>`;
    },
  },
});
const paginationDiv = document.querySelector(".swiper-pagination");

const totalSpan = document.createElement("span");
totalSpan.classList.add("icon-pagination");
totalSpan.innerHTML = "<i class='fa-regular fa-image'></i>";

totalSpan.classList.add("swiper-pagination-total");
paginationDiv.prepend(totalSpan);
