$(function () {

    "use strict";

    var wind = $(window);


    /* =============================================================================
    --------------------------------  Navbar Menu   --------------------------------
    ============================================================================= */

    $('.navbar .dropdown').hover(function () {
        $(this).find('.dropdown-menu').addClass('show');
    }, function () {
        $(this).find('.dropdown-menu').removeClass('show')
    });

    $('.navbar .dropdown-item').hover(function () {
        $(this).find('.dropdown-side').addClass('show');
    }, function () {
        $(this).find('.dropdown-side').removeClass('show')
    });

    $(".navbar .search-form").on("click", ".search-icon", function () {

        $(".navbar .search-form").toggleClass("open");

        if ($(".navbar .search-form").hasClass('open')) {

            $(".search-form .close-search").slideDown();

        } else {

            $(".search-form .close-search").slideUp();
        }
    });

    $(".navbar").on("click", ".navbar-toggler", function () {

        $(".navbar .navbar-collapse").toggleClass("show");
    });

    wind.on("scroll", function () {

        var bodyScroll = wind.scrollTop(),
            navbar = $(".navbar"),
            logo = $(".navbar.change .logo> img");

        if (bodyScroll > 300) {

            navbar.addClass("nav-scroll");
            logo.attr('src', 'assets/imgs/logo-dark.png');

        } else {

            navbar.removeClass("nav-scroll");
            logo.attr('src', 'assets/imgs/logo-light.png');
        }
    });

    function noScroll() {
        window.scrollTo(0, 0);
    }

    $('.navbar .menu-icon').on('click', function () {

        $('.hamenu').addClass("open");

        $('.hamenu').animate({ left: 0 });

    });

    $('.hamenu .close-menu, .one-scroll .menu-links .main-menu > li').on('click', function () {

        $('.hamenu').removeClass("open").delay(300).animate({ left: "-100%" });
        $('.hamenu .menu-links .main-menu .dmenu, .hamenu .menu-links .main-menu .sub-dmenu').removeClass("dopen");
        $('.hamenu .menu-links .main-menu .sub-menu, .hamenu .menu-links .main-menu .sub-menu2').slideUp();

    });

    $('.hamenu .menu-links .main-menu > li').on('mouseenter', function () {
        $(this).removeClass('hoverd').siblings().addClass('hoverd');
    });

    $('.hamenu .menu-links .main-menu > li').on('mouseleave', function () {
        $(this).removeClass('hoverd').siblings().removeClass('hoverd');
    });


    $('.main-menu > li .dmenu').on('click', function () {
        $(this).parent().parent().find(".sub-menu").toggleClass("sub-open").slideToggle();
        $(this).toggleClass("dopen");
    });

    $('.sub-menu > ul > li .sub-dmenu').on('click', function () {
        $(this).parent().parent().find(".sub-menu2").toggleClass("sub-open").slideToggle();
        $(this).toggleClass("dopen");
    });

})



// menu end =============================================================
// Button Hover Animation
var btn_hover_all = document.querySelectorAll(".ch-btn-animated");

if (btn_hover_all) {
    for (const ele of btn_hover_all) {
        var newSpan = document.createElement("span");
        ele.appendChild(newSpan);
    }

    $('.ch-btn-animated').on('mouseenter', function (e) {
        var x = e.pageX - $(this).offset().left;
        var y = e.pageY - $(this).offset().top;

        $(this).find('span').css({
            top: y,
            left: x,
        });
    });

    $('.ch-btn-animated').on('mouseout', function (e) {
        var x = e.pageX - $(this).offset().left;
        var y = e.pageY - $(this).offset().top;

        $(this).find('span').css({
            top: y,
            left: x,
        });
    });
}



//text animation
$(document).ready(function () {
        var st = $(".tp-split-text");
        if (st.length === 0) return;

        gsap.registerPlugin(SplitText);
        st.each(function (index, el) {
            el.split = new SplitText(el, {
                type: "lines,words,chars",
                linesClass: "tp-split-line"
            });

            gsap.set(el, { perspective: 400 });
            var animationProps = { opacity: 0 };

            if ($(el).hasClass('tp-split-right')) animationProps.x = "50";
            if ($(el).hasClass('tp-split-left')) animationProps.x = "-50";
            if ($(el).hasClass('tp-split-up')) animationProps.y = "80";
            if ($(el).hasClass('tp-split-down')) animationProps.y = "-80";

            gsap.set(el.split.chars, animationProps);

            el.anim = gsap.to(el.split.chars, {
                scrollTrigger: { trigger: el, start: "top 90%" },
                x: "0",
                y: "0",
                rotateX: "0",
                scale: 1,
                opacity: 1,
                duration: 1.8,
                stagger: 0.02,
            });
        });
    });


AOS.init({
  once: true
})


$(document).ready(function () {
    $('.cocktails-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        responsive: {
            0: { items: 1 },
            600: { items: 2 },
            1000: { items: 3 }
        }
    });
});


$(document).ready(function () {
    $('.blog-articles-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000, // 3 seconds
        autoplayHoverPause: true, // Optional: pause on hover
        responsive: {
            0: { items: 1 },
            600: { items: 2 },
            1000: { items: 3 }
        }
    });
});


// ========== PLay Pause Video Banner Section =================
document.addEventListener("DOMContentLoaded", function () {
    let video = document.querySelector(".banner-video");
    let playPauseButton = document.querySelector(".play-pause-button");
    let playPauseIcon = document.querySelector(".play-pause-icon");

    if (video) {
        video.addEventListener("ended", function () {
            playPauseIcon.src = "images/icons/replay.png"; // Change to play icon when video ends
        });

        playPauseButton.addEventListener("click", function () {
            if (video.paused) {
                video.play();
                playPauseIcon.src = "images/icons/replay.png"; // Show pause icon
            } else {
                video.pause();
                playPauseIcon.src = "images/icons/replay.png"; // Show play icon
            }
        });
    }
});