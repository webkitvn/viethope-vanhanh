(function ($) {
    $(document).ready(function () {
        var $header = $("#main-header");
        var $html = $("html");

        // Set header height once on load (full height including top-nav)
        // Do NOT update on scroll/resize to prevent layout shift when top-nav hides
        if ($header.length) {
            $html.css("--header-height", Math.ceil($header.outerHeight()) + "px");
        }

        function updateAdminBarHeight() {
            var h = Math.ceil($("#wpadminbar").outerHeight() || 0);
            if (h) {
                $html.css("--wp-admin-bar-height", h + "px");
            }
        }

        updateAdminBarHeight();
        $(window).on("resize orientationchange", updateAdminBarHeight);
    });

    $(".menu-toggle-btn").on("click", function (e) {
        e.preventDefault();
        if (!$(this).hasClass("active")) {
            $(this).addClass("active");
            $("#mobile-menu").addClass("active");
            $("body").addClass("menu-actived");
        } else {
            $(this).removeClass("active");
            $("#mobile-menu").removeClass("active");
            $("body").removeClass("menu-actived");
        }
    });

    $("#mobile-menu li.menu-item-has-children").prepend(
        '<button class="toggle-btn"><i class="fal fa-angle-down"></i></button>'
    );
    $("#mobile-menu").on("click", ".toggle-btn", function (e) {
        e.preventDefault();
        $(this).toggleClass("active");
        $(this).parent().find("> .sub-menu").slideToggle(300);
    });

    $(".tabs-wrapper .tabs li a:not(.schedule-btn)").on("click", function (e) {
        e.preventDefault();
        var target = $(this).attr("href");
        $(".tabs-wrapper .tabs li, .tabs-wrapper .panel").removeClass("active");
        $(this).parent().addClass("active");
        $(target).addClass("active");
    });

    $("#chat-bubble .chat-btn-toggle").on("click", function (e) {
        e.preventDefault();
        $(this).toggleClass("active");
        $(this).parents("#chat-bubble").find(".item-group").fadeToggle(300);
    });

    $('.checking-btn').on('click', function (e) {
        $(this).toggleClass('active');
    });


    jQuery('.wpcf7 .btn-submit').on('click', function () {
        var thisElement = jQuery(this);
        var formID = thisElement.parents('.wpcf7').attr('id');
        jQuery('.cf7_submit .ajax-loader').remove();
        thisElement.addClass('sending');
        document.addEventListener('wpcf7submit', function (event) {
            thisElement.removeClass('sending');
        }, false);
        document.addEventListener('wpcf7spam', function (event) {
            thisElement.removeClass('sending');
        }, false);
        document.addEventListener('wpcf7invalid', function (event) {
            thisElement.removeClass('sending');
        }, false);
        document.addEventListener('wpcf7mailfailed', function (event) {
            thisElement.removeClass('sending');
        }, false);
    });

    $('.search-wrapper .search-btn').on('click', function (e) {
        e.preventDefault();
        $('.search-wrapper .search-form').fadeToggle(300);
    })

    $('.form-wrapper').on('click', '.tabs a', function (e) {
        e.preventDefault();
        var id = $(this).attr('href');
        $(this).closest('.tabs').find('a').removeClass('active');
        $(this).addClass('active');
        $(this).closest('.form-wrapper').find('.panel').removeClass('active');
        $(id).addClass('active');
    });
    Fancybox.bind('[data-fancybox="dat-lich-bs"]', {
        on: {
            done: (fancybox) => {
                console.log($(this));
                var doctor = $('#dialog-schedule-doctor').attr('data-doctor');
                $('#dialog-schedule-doctor').find('[name=bac_si]').val(doctor);
            },
        },
    });

    $('.dat-lich').on('click', function(e){
        e.preventDefault();
        let doctor = $(this).data('name');
        $('#dialog-schedule-doctor').find('[name=bac_si]').val(doctor);
        Fancybox.show([
            {
                src: '#dialog-schedule-doctor',
                type: "inline"
            }
        ]);
    });

    // Auto-select current post option in CF7 select field
    function cwpAutoSelectCurrentPost() {
        // Check if we're on a single goi_dieu_tri page and have current post title
        if (typeof cwpCurrentPostTitle !== 'undefined' && cwpCurrentPostTitle) {
            // Find select field with name 'goi_tam_soat'
            var selectField = $('select[name="goi_tam_soat"]');
            
            if (selectField.length > 0) {
                // Loop through options to find matching text
                selectField.find('option').each(function() {
                    if ($(this).text().trim() === cwpCurrentPostTitle.trim()) {
                        // Set as selected
                        $(this).prop('selected', true);
                        // Trigger change event for any listeners
                        selectField.trigger('change');
                        return false; // Break the loop
                    }
                });
            }
        }
    }

    // Run auto-select on page load
    cwpAutoSelectCurrentPost();

    // Also run when CF7 form is loaded via AJAX
    $(document).on('wpcf7beforesubmit', function() {
        cwpAutoSelectCurrentPost();
    });

    // Run after CF7 form is fully loaded
    $(document).on('wpcf7mailsent', function() {
        setTimeout(cwpAutoSelectCurrentPost, 100);
    });

    // Run when CF7 form is loaded (for AJAX forms)
    $(document).on('wpcf7formready', function() {
        setTimeout(cwpAutoSelectCurrentPost, 200);
    });
})(jQuery);