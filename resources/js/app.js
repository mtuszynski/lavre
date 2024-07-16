// Navigation toggle
window.addEventListener("load", function () {
  let main_navigation = document.querySelector("#primary-menu");
  document
    .querySelector("#primary-menu-toggle")
    ?.addEventListener("click", function (e) {
      e.preventDefault();
      main_navigation.classList.toggle("hidden");
    });
  const progressCircle = document.querySelector(".autoplay-progress svg");
  const progressContent = document.querySelector(".autoplay-progress span");
  var swiper = new Swiper(".mySwiper", {
    direction: "vertical",
    autoplay: {
      delay: 15000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
    },
    on: {
      autoplayTimeLeft(s, time, progress) {
        if (progressCircle !== null) {
          progressCircle.style.setProperty("--progress", 1 - progress);
          progressContent.textContent = `${Math.ceil(time / 1000)}s`;
        }
      },
    },
  });
});
