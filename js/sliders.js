(function ($) {
  var homeBanners = new Swiper("#home-slider .swiper-container", {
    direction: "horizontal",
    loop: true,
    slidesPerView: 1,
    effect: "fade",
    speed: 1000,
    autoplay: {
      delay: 8000,
    },
    // If we need pagination
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },

    // Navigation arrows
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  var newsPopupSlider = new Swiper("#news-popup .swiper-container", {
    direction: "horizontal",
    loop: true,
    slidesPerView: 1,
    speed: 300,
    watchOverflow: true,
    autoplay: {
      delay: 5000,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  var staffSlide = new Swiper(".staff-slider .swiper-container", {
    direction: "horizontal",
    slidesPerView: 2,
    spaceBetween: 30,
    loop: true,
    speed: 300,
    autoplay: true,
    breakpoints: {
      768: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 100,
        autoplay: false
      },
      1200: {
        slidesPerView: 4,
        spaceBetween: 120,
        autoplay: false
      }
    },
  });
  var servicesSlide = new Swiper("#section-services .swiper-container", {
    slidesPerView: 2,
    spaceBetween: 15,
    speed: 300,
    slidesPerColumn: 2,
    slidesPerColumnFill: "row",
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + (index + 1) + "</span>";
      },
    },
    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 15,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 15,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
    },
  });
  var jobsSlide = new Swiper(".jobs-container .swiper-container", {
    slidesPerView: 1,
    spaceBetween: 30,
    speed: 300,
    watchOverflow: true,
    autoplay: {
      delay: 5000,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + (index + 1) + "</span>";
      },
    },
    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 30,
      },
    },
  });
  var statusSlide = new Swiper("#section-status .swiper-container", {
    direction: "horizontal",
    loop: true,
    slidesPerView: 2,
    spaceBetween: 15,
    speed: 300,
    watchOverflow: true,
    slidesPerGroup: 2,
    autoplay: {
      delay: 5000,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + (index + 1) + "</span>";
      },
    },
    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 15,
        slidesPerGroup: 2
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 15,
        slidesPerGroup: 3
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 30,
        slidesPerGroup: 4
      },
    },
  });

  var newsSlide = new Swiper(".sidebar .feature-posts .swiper-container", {
    direction: "horizontal",
    loop: true,
    slidesPerView: 1,
    speed: 300,
    //autoplay: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + (index + 1) + "</span>";
      },
    },
  });

  var reviewsSlide = new Swiper("#section-reviews .swiper-container", {
    direction: "horizontal",
    loop: true,
    slidesPerView: 1,
    speed: 300,
    autoplay: {
      delay: 5000
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + (index + 1) + "</span>";
      },
    },
    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 30,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 30,
      },
    },
  });

  var partnersSlide = new Swiper("#section-partners .swiper-container", {
    direction: "horizontal",
    loop: true,
    slidesPerView: 2,
    speed: 300,
    spaceBetween: 15,
    autoplay: true,
    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 15,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 15,
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 30,
      },
    },
  });

  var imgSlide = new Swiper(".image-slide", {
    direction: "horizontal",
    loop: true,
    slidesPerView: 1,
    speed: 300,
    autoplay: true,
    watchOverflow: true,
    navigation: {
      nextEl: ".button-next",
      prevEl: ".button-prev",
    },
    pagination: {
      el: ".swiper-pagi",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + (index + 1) + "</span>";
      },
    },
  });

  var widgetPostsSlide = new Swiper(".posts-slider-widget .swiper-container", {
    direction: "horizontal",
    loop: true,
    slidesPerView: 1,
    speed: 300,
    autoplay: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + (index + 1) + "</span>";
      },
    },
  });

  var relatedPostsSlider = new Swiper(".related-posts .swiper-container", {
    direction: "horizontal",
    loop: false,
    slidesPerView: 2,
    spaceBetween: 15,
    speed: 300,
    autoplay: {
      delay: 5000,
    },
    // Navigation arrows
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + (index + 1) + "</span>";
      },
    },
    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 15,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 15,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
    },
  });

  var catFeaturePost =  new Swiper('.category .feature-posts .swiper-container', {
    direction: "horizontal",
    loop: false,
    slidesPerView: 2,
    spaceBetween: 15,
    speed: 300,
    watchOverflow: true,
    autoplay: {
      delay: 5000,
    },
    // Navigation arrows
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + (index + 1) + "</span>";
      },
    },
    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 15,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 15,
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 30,
      },
    },
  });

})(jQuery);
