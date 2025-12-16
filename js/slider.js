(function ($) {
    const bannerSlider = new Swiper('.banner-slider.swiper', {
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

    const curesSlider = new Swiper('.cures .swiper', {
        loop: true,
        autoplay: {
            delay: 9000,
        },
        slidesPerView: 2,
                spaceBetween: 15,
        grabCursor: true,
        breakpoints: {
            768: {
                slidesPerView: 3,
                centeredSlides: false,
            },
            1024: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 30,
            }
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        }
    });

    const doingubsSlider = new Swiper('.doingubs-slider .swiper', {
        loop: true,
        autoplay: {
            delay: 9000,
        },
        centeredSlides: true,
        slidesPerView: 2,
                spaceBetween: 15,
        grabCursor: true,
        breakpoints: {
            768: {
                slidesPerView: 3,
                spaceBetween: 100,
            },
            1024: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 150,
            }
        },
        // navigation: {
        //   nextEl: ".swiper-button-next",
        //   prevEl: ".swiper-button-prev",
        // },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

    const mediaSlider = new Swiper('.media .swiper', {
        loop: true,
        autoplay: {
            delay: 9000,
        },
        slidesPerView: 2,
                spaceBetween: 15,
        grabCursor: true,
        breakpoints: {
            768: {
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 30,
            }
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

    const reviewsSlider = new Swiper('.reviews .swiper', {
        loop: true,
        autoplay: {
            delay: 9000,
        },
        //centeredSlides: true,
        slidesPerView: 1,
                spaceBetween: 10,
        grabCursor: true,
        breakpoints: {
            768: {
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 70,
            }
        },
        // navigation: {
        //   nextEl: ".swiper-button-next",
        //   prevEl: ".swiper-button-prev",
        // },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

    const pageSlider = new Swiper('.page-slider .swiper', {
        loop: true,
        autoplay: {
            delay: 9000,
        },
        centeredSlides: true,
        slidesPerView: 2,
        spaceBetween: 10,
        grabCursor: true,
        breakpoints: {
            768: {
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 2,
            },
            1200: {
                spaceBetween: 30,
            }
        },
        // navigation: {
        //   nextEl: ".swiper-button-next",
        //   prevEl: ".swiper-button-prev",
        // },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

    const coursesSlider = new Swiper('.courses-slider .swiper', {
        loop: true,
        autoplay: {
            delay: 9000,
        },
        slidesPerView: 2,
                spaceBetween: 15,
        grabCursor: true,
        breakpoints: {
            768: {
                slidesPerView: 3,
                centeredSlides: false,
            },
            1024: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 30,
            }
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        }
    });
})(jQuery);