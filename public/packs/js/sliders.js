!(function(e) {
    var s = {};

    function i(o) {
        if (s[o]) return s[o].exports;
        var t = (s[o] = { i: o, l: !1, exports: {} });
        return e[o].call(t.exports, t, t.exports, i), (t.l = !0), t.exports;
    }
    (i.m = e),
    (i.c = s),
    (i.d = function(e, s, o) {
        i.o(e, s) || Object.defineProperty(e, s, { enumerable: !0, get: o });
    }),
    (i.r = function(e) {
        "undefined" !== typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, { value: "Module" }), Object.defineProperty(e, "__esModule", { value: !0 });
    }),
    (i.t = function(e, s) {
        if ((1 & s && (e = i(e)), 8 & s)) return e;
        if (4 & s && "object" === typeof e && e && e.__esModule) return e;
        var o = Object.create(null);
        if ((i.r(o), Object.defineProperty(o, "default", { enumerable: !0, value: e }), 2 & s && "string" != typeof e))
            for (var t in e)
                i.d(
                    o,
                    t,
                    function(s) {
                        return e[s];
                    }.bind(null, t)
                );
        return o;
    }),
    (i.n = function(e) {
        var s =
            e && e.__esModule ?

            function() {
                return e.default;
            } :
            function() {
                return e;
            };
        return i.d(s, "a", s), s;
    }),
    (i.o = function(e, s) {
        return Object.prototype.hasOwnProperty.call(e, s);
    }),
    (i.p = "/packs/"),
    i((i.s = 425));
})({
    425: function(e, s) {
        $(document).on("turbolinks:load", function() {
            $(".slide-nav-steps").on("click", "a", function(e) {
                    e.preventDefault(), $(".slide-nav-steps a").removeClass("active"), $(this).addClass("active"), $(this).parents("section").find(".slider").slick("slickGoTo", $(this).index());
                }),
                $(".slide-nav").on("click", "a.slide-nav-prev", function(e) {
                    e.preventDefault(), $(this).parents("section").find(".slider").slick("slickPrev");
                }),
                $(".slide-nav").on("click", "a.slide-nav-next", function(e) {
                    e.preventDefault(), $(this).parents("section").find(".slider").slick("slickNext");
                }),
                $(document).on("click", ".next-slide", function(e) {
                    e.preventDefault(), $(this).hasClass("return") ? $(this).parents("section").find(".slider").slick("slickGoTo", 0) : $(this).parents("section").find(".slider").slick("slickNext");
                }),
                $(".hero_container").slick({ 
					infinite: !0,
					//slidesToShow: 1,
					//slidesToScroll: 1,
					dots: true,
					draggable: !0,
					arrows: false,
					adaptiveHeight: false,
					autoplay: !0, 
					autoplaySpeed: 2e3,
					pauseOnHover: true ,
					responsive: [{ breakpoint: 768, settings: { dots: false,} }],
					

			}),
                $(".demo-slider-refer-text").slick({
                    infinite: !1,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    fade: !0,
                    dots: true,
                    draggable: false,
                    arrows: true,
                    adaptiveHeight: !0,
                    responsive: [{ breakpoint: 768, settings: { adaptiveHeight: !1 } }],
                }),
                $(".demo-slider-shop-text").slick({ infinite: !1, slidesToShow: 1, slidesToScroll: 1, fade: !0, dots: !1, draggable: !0, arrows: !1, adaptiveHeight: !0, responsive: [{ breakpoint: 768, settings: { adaptiveHeight: !1 } }] }),
                $(".demo-slider-refer").slick({ variableWidth: !0, infinite: !1, slidesToShow: 1, slidesToScroll: 1, dots: !0, appendDots: $(".demo-slider-dots-refer"), draggable: !0, arrows: !1, asNavFor: $(".demo-slider-refer-text") }),
                $(".demo-slider-influencer").slick({ variableWidth: !0, infinite: !1, slidesToShow: 1, slidesToScroll: 1, dots: !0, appendDots: $(".demo-slider-dots-refer"), draggable: !0, arrows: !1 }),
                $(".demo-slider-shop").slick({ variableWidth: !0, infinite: !1, slidesToShow: 1, slidesToScroll: 1, dots: !0, appendDots: $(".demo-slider-dots-shop"), draggable: !0, arrows: !1, asNavFor: $(".demo-slider-shop-text") }),
                $(".demo-slider").on("beforeChange", function(e, s, i, o) {
                    $(this).parents(".slides-wrapper").find(".slide-nav-steps a").removeClass("active"),
                        $(this).parents(".slides-wrapper").find(".slide-nav-steps a").eq(o).addClass("active"),
                        s.slideCount == o + 1 ? $(this).parents(".slides-wrapper").find(".next-slide").addClass("return") : $(this).parents(".slides-wrapper").find(".next-slide").removeClass("return");
                }),
                $(".categories-slider").slick({
                    variableWidth: !0,
                    infinite: !0,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    dots: !1,
                    arrows: true,
                    draggable: !0,
                    responsive: [
                        { breakpoint: 1024, settings: { centerMode: !0, slidesToShow: 2, slidesToScroll: 1 } },
                        { breakpoint: 768, settings: { centerMode: !0, slidesToShow: 1, slidesToScroll: 1 } },
                    ],
                }),
                $(".store-logos-slider").slick({
                    infinite: true,
                    slidesToShow: 10,
                    slidesToScroll: 1,
                    dots: !1,
                    arrows: !1,
                    draggable: !0,
					autoplay: !0, 
					autoplaySpeed: 0,
					autoplaySpeed: 0,
					 
					speed: 8000,					
                    responsive: [
                        { breakpoint: 1024, settings: { centerMode: !0, slidesToShow: 4, slidesToScroll: 1 } },
                        { breakpoint: 768, settings: { centerMode: !0, slidesToShow: 3, slidesToScroll: 1 } },
                    ],
                }),
                $(".slides-to-show-5").slick({
                    infinite: !0,
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    dots: true,
                    arrows: !1,
                    draggable: !0,
                    responsive: [
                        { breakpoint: 1024, settings: { centerMode: !0, slidesToShow: 3, slidesToScroll: 3 } },
                        { breakpoint: 768, settings: { centerMode: !0, slidesToShow: 1, slidesToScroll: 1 } },
                    ],
                }),
                $(".slides-to-show-4").slick({
                    infinite: !0,
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    dots: !1,
                    arrows: !1,
                    draggable: !0,
                    responsive: [
                        { breakpoint: 1024, settings: { centerMode: !0, slidesToShow: 3, slidesToScroll: 3 } },
                        { breakpoint: 768, settings: { centerMode: !0, slidesToShow: 1, slidesToScroll: 1, dots: true, } },
                    ],
                }),
                $(".slides-to-show-3").slick({
                    infinite: !0,
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    dots: true,
                    arrows: false,
                    draggable: !0,
                    responsive: [
                        { breakpoint: 1024, settings: { centerMode: !0, slidesToShow: 2, slidesToScroll: 2 } },
                        { breakpoint: 768, settings: { centerMode: !0, slidesToShow: 1, slidesToScroll: 1 } },
                    ],
                });
				$(".featured_categories_slider").slick({
                    infinite:true,
                    slidesToShow: 6,
                    slidesToScroll: 6,
                    dots: false,
                    arrows: false,
                    draggable: !0,
					autoplay: !0, 
					autoplaySpeed: 2e3,
					pauseOnHover: false, 
                    responsive: [
                        { breakpoint: 1024, settings: { centerMode: !0, slidesToShow: 5, slidesToScroll: 5 } },
                        { breakpoint: 768, settings: { centerMode: !0, slidesToShow: 1, slidesToScroll: 1 } },
                    ],
                });
        });
    },
});