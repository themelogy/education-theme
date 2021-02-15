!function () {
    "use strict";
    $(document).ready(function () {
        $("#preloader").delay(200).fadeOut("slow"), $("#materialize-menu-alt").html('<ul class="menuzord-menu">' + $("#menu-list").html() + "</ul>"), jQuery("#materialize-menu, #materialize-menu-alt").menuzord({
            indicatorFirstLevel: "<i class='fa fa-angle-down'></i>",
            indicatorSecondLevel: "<i class='fa fa-angle-right'></i>"
        });
        var e = $(".nav-bottom").offset();
        if ($(window).on("scroll", function () {
            var t = $(window).width();
            0 == $(".nav-bottom").length ? t > 768 && ($(this).scrollTop() > 1 ? $("header").addClass("sticky") : $("header").removeClass("sticky")) : t > 768 && ($(this).scrollTop() > e.top + 100 ? $("header").addClass("sticky") : $("header").removeClass("sticky"))
        }), $(window).on("scroll", function () {
            var t = $(window).width();
            t > 768 && ($(this).scrollTop() > 1 ? $(".mainmenu").slideUp(function () {
                $(".menu-appear-alt").css({
                    position: "fixed",
                    top: 0,
                    left: 0,
                    width: t,
                    zIndex: 99999
                }), $(".menu-appear-alt").slideDown()
            }) : $(".menu-appear-alt").slideUp(function () {
                $(".menu-appear-alt").css({
                    position: "relative",
                    top: 0,
                    left: 0,
                    width: t,
                    zIndex: 99999
                }), $(".mainmenu").slideDown()
            })), $(".nav-bottom").css("z-Index", 1e5), e && ($(window).scrollTop() > e.top ? $(".nav-bottom").css({
                position: "fixed",
                top: "0px",
                left: "0px"
            }) : $(".nav-bottom").css({position: "fixed", top: e.top - $(window).scrollTop() + "px"}))
        }), $(".op-nav li").on("click", function () {
            $(".showhide").is(":visible") && $(".showhide").trigger("click"), $(".op-nav li").removeClass("active"), $(this).addClass("active")
        }), $(".search-trigger").on("click", function (e) {
            $("body").addClass("active-search")
        }), $(".search-close").on("click", function (e) {
            $("body").removeClass("active-search")
        }), $("a.page-scroll").on("click", function (e) {
            var t = $(this);
            $("html, body").stop().animate({scrollTop: $(t.attr("href")).offset().top - 60}, 1500, "easeInOutExpo"), e.preventDefault()
        }), "object" == typeof smoothScroll && smoothScroll.init(), $(window).on("resizeEnd", function () {
            $(".fullscreen-banner").height($(window).height())
        }), $(window).resize(function () {
            this.resizeTO && clearTimeout(this.resizeTO), this.resizeTO = setTimeout(function () {
                $(this).trigger("resizeEnd")
            }, 300)
        }).trigger("resize"), $(".nav-tabs").length > 0 && $(".nav-tabs").tabCollapse(), function () {
            function e() {
                var e = navigator.userAgent.match(/(?:MSIE |Trident\/.*; rv:)(\d+)/);
                return !!e && parseInt(e[1], 10)
            }

            e() && $("html").addClass("ie" + e())
        }(), $(".counter-section").on("inview", function (e, t, i, o) {
            t && ($(this).find(".timer").each(function () {
                var e = $(this);
                $({Counter: 0}).animate({Counter: e.text()}, {
                    duration: 2e3, easing: "swing", step: function () {
                        e.text(Math.ceil(this.Counter))
                    }
                })
            }), $(this).off("inview"))
        }), $(".countdown").length > 0 && $(".countdown").countdown({
            date: "31 december 2017 12:00:00",
            format: "on"
        }), $(".tt-lightbox").length > 0 && $(".tt-lightbox").magnificPopup({
            type: "image",
            mainClass: "mfp-fade",
            removalDelay: 160,
            fixedContentPos: !1
        }), $(".popup-video").length > 0 && $(".popup-video").magnificPopup({
            disableOn: 700,
            type: "iframe",
            mainClass: "mfp-fade",
            removalDelay: 160,
            preloader: !1,
            fixedContentPos: !1
        }), $(".gallery-thumb").length > 0 && $(".gallery-thumb").flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        }), $(".circle-thumb").length > 0 && $(".circle-thumb").flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        }), $(".square-thumb").length > 0 && $(".square-thumb").flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        }), $(".logo-thumb").length > 0 && $(".logo-thumb").flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        }), $(".logo-thumb-right").length > 0 && $(".logo-thumb-right").flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        }), $(".parallax-carousel").length > 0 && $(".parallax-carousel").flexslider({animation: "slide"}), $(".quote-carousel").length > 0 && $(".quote-carousel").owlCarousel({
            loop: !0,
            autoHeight: !0,
            responsive: {0: {items: 1}, 600: {items: 1}, 1000: {items: 1}}
        }), $(".featured-carousel").length > 0 && $(".featured-carousel").owlCarousel({
            loop: !0,
            margin: 12,
            responsive: {0: {items: 1}, 600: {items: 2}, 1000: {items: 3}}
        }), $(".seo-featured-carousel").length > 0 && $(".seo-featured-carousel").owlCarousel({
            loop: !0,
            margin: 30,
            responsive: {0: {items: 1}, 600: {items: 2}, 1000: {items: 4}}
        }), $(".blog-carousel").length > 0 && $(".blog-carousel").owlCarousel({
            loop: !0,
            margin: 26,
            responsive: {0: {items: 1}, 600: {items: 2}, 1000: {items: 3}}
        }), $(".project-carousel").length > 0 && $(".project-carousel").owlCarousel({
            loop: !0,
            responsive: {0: {items: 1}, 600: {items: 1}, 1000: {items: 1}}
        }), $(".career-carousel").length > 0 && $(".career-carousel").owlCarousel({
            loop: !0,
            autoPlay: !0,
            responsive: {0: {items: 1}, 600: {items: 1}, 1000: {items: 1}}
        }), $("#blogGrid").length > 0) var t = $("#blogGrid").imagesLoaded(function () {
            t.masonry({itemSelector: ".blog-grid-item"})
        });
        $(".progress").on("inview", function (e, t, i, o) {
            t && ($.each($("div.progress-bar"), function () {
                $(this).css("width", $(this).attr("aria-valuenow") + "%")
            }), $(this).off("inview"))
        }), $("#contactForm").on("submit", function (e) {
            e.preventDefault();
            var t = $(this).prop("action"), i = $(this).serialize(), o = $(this);
            o.prevAll(".alert").remove(), $.post(t, i, function (e) {
                "error" == e.response && o.before('<div class="alert danger-border"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <i class="fa fa-times-circle"></i> ' + e.message + "</div>"), "success" == e.response && (o.before('<div class="alert success-border"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-thumbs-o-up"></i> ' + e.message + "</div>"), o.find("input, textarea").val(""))
            }, "json")
        }), $(".parallax-bg").length > 0 && $(".parallax-bg").imagesLoaded(function () {
            $(window).stellar({
                horizontalScrolling: !1,
                verticalOffset: 0,
                horizontalOffset: 0,
                responsive: !0,
                hideDistantElements: !0
            })
        }), $(window).on("load", function () {
            $(".portfolio-container").each(function (e, t) {
                var i = $(this).find(".portfolio"), o = this;
                i.shuffle({itemSelector: ".portfolio-item"}), $(this).find(".portfolio-filter li").on("click", function (e) {
                    e.preventDefault(), $(o).find(".portfolio-filter li").removeClass("active"), $(this).addClass("active");
                    var t = $(this).attr("data-group");
                    i.shuffle("shuffle", t)
                })
            })
        }), $(window).on("load", function () {
            $(".portfolio-slider").length > 0 && $(".portfolio-wrapper").each(function (e, t) {
                var i = $(this).find(".portfolio-slider"), o = i.attr("data-direction");
                i.flexslider({
                    animation: "slide", direction: o, slideshowSpeed: 3e3, start: function () {
                        imagesLoaded($(".portfolio"), function () {
                            setTimeout(function () {
                                $(".portfolio-filter li:eq(0)").trigger("click")
                            }, 500)
                        })
                    }
                })
            })
        }), $(".portfolio-slider").each(function () {
            for (var e = $(this).find("li > a"), t = [], i = 0; i < e.length; i++) t.push({
                src: $(e[i]).attr("href"),
                title: $(e[i]).attr("title")
            });
            $(this).parent().find(".action-btn").magnificPopup({
                items: t,
                type: "image",
                mainClass: "mfp-fade",
                removalDelay: 160,
                fixedContentPos: !1,
                gallery: {enabled: !0}
            })
        })
    });
    $('.lazy').lazy();
    $('.section-page img').lazy();
}(jQuery);