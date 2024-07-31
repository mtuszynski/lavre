// Navigation toggle
window.addEventListener("load", function () {
  let main_navigation = document.querySelector("#menu-nav");
  document
    .querySelector("#primary-menu-toggle")
    ?.addEventListener("click", function (e) {
      e.preventDefault();
      main_navigation.classList.toggle("hidden");
    });
  const myslider = document.querySelector(".mySwiper");
  const progressCircle = document.querySelector(".autoplay-progress svg");
  const progressContent = document.querySelector(".autoplay-progress span");
  if (myslider) {
    var swiper = new Swiper(".mySwiper", {
      direction: "horizontal",
      autoplay: {
        delay: 15000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
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
  }
  window.addEventListener("scroll", function () {
    var header = document.querySelector("header");
    var scrollPosition = window.scrollY;

    if (scrollPosition > 50) {
      header.classList.add("header-scrolled");
    } else {
      header.classList.remove("header-scrolled");
    }
  });

  var descToggle = document.querySelector(".desc-toggle");
  if (descToggle) {
    var productDescription = document.querySelector(".product-description");
    var gradientOverlay = document.querySelector(".gradient-overlay");
    descToggle.addEventListener("click", function () {
      productDescription.classList.toggle("expanded");
      gradientOverlay.classList.toggle("hidden");

      if (gradientOverlay.classList.contains("hidden")) {
        descToggle.textContent = "Zwiń >";
      } else {
        descToggle.textContent = "Rozwiń >";
      }
    });
  }

  const productContent = document.getElementById("product-single-content");
  const entrySummary = document.querySelector(".entry-summary");

  if (productContent && entrySummary) {
    const updateHeight = () => {
      const height = entrySummary.offsetHeight;
      productContent.style.minHeight = `${height}px`;
    };
    const resizeObserver = new ResizeObserver((entries) => {
      entries.forEach((entry) => {
        updateHeight();
      });
    });
    resizeObserver.observe(entrySummary);
    updateHeight();
  }
});
