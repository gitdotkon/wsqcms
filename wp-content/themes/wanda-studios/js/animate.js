!function(e){function s(){var s=e("#mobile_stage");s.length>0&&(s.find(".slick").length>0&&s.find("ul").slick("unslick"),s.find("ul").html(""))}function a(){var s=e("#mobile_stage");s.length>0&&s.find(".screen_slide ").length<=0&&(e(".screen_slide:not(.screen_slide_hidden)").each(function(){s.find("ul").append('<li class="screen_slide ">'+e(this).html()+"</li>")}),s.find("ul").slick({dots:!1,infinite:!0,speed:300,slidesToShow:1,adaptiveHeight:!0,arrows:!1}),e(".mobile_stages_slider_nav a").click(function(){var s=e(this).closest("li").index();return e(".mobile_stages_slider_nav").hasClass("is_open")?e(this).closest("li").hasClass("active")?(e(".mobile_stages_slider_nav").removeClass("is_open"),!1):(e(".mobile_stages_slider_nav").removeClass("is_open"),e(".mobile_stages_slider_nav").find(".active").removeClass("active"),e(".mobile_stages_slider_nav li").eq(s).addClass("active"),e("#mobile_stage").find("ul").slick("slickGoTo",s),e(".stage_screen_btns .active").removeClass("active"),e(".stage_screen_btns .animate_up").eq(s).addClass("active"),e("html, body").animate({scrollTop:e("#mobile_stage").offset().top-e("#header").height()},360),!1):(e(".mobile_stages_slider_nav").addClass("is_open"),!1)}),s.find("ul").on("afterChange",function(s,a){var i=a.currentSlide;e(".mobile_stages_slider_nav .active").removeClass("active"),e(".mobile_stages_slider_nav").find("li").eq(i).addClass("active"),e(".stage_screen_btns .active").removeClass("active"),e(".stage_screen_btns .animate_up").eq(i).addClass("active")}))}e(window).load(function(){function i(s){e(".slide_bg").addClass("slide_bg_ed"),1==s?setTimeout(function(){e(".home_screen .animate_up").each(function(s){var a=e(this);setTimeout(function(){a.addClass("animate_uped")},(e(".home_screen").hasClass("stages_home_screen")?200:600)*s)}),setTimeout(function(){e(".slide_animating").removeClass("slide_animating")},1500)},500):(e(".home_screen .animate_up").each(function(s){var a=e(this);setTimeout(function(){a.addClass("animate_uped")},(e(".home_screen").hasClass("stages_home_screen")?200:600)*s)}),setTimeout(function(){e(".slide_animating").removeClass("slide_animating")},1500)),setTimeout(function(){e(".all_view_wrapper").addClass("all_view_wrapper_fadeIn")},600*e(".home_screen .animate_up").size()),e(".next_screen").addClass("next_screen_ed")}function t(s){if(!(e(".slide_animating").length||e(".screen_slide_animating").length||d.hasClass("footer_animating")||e(".lightbox_visible").length)){e("body").addClass("look"),setTimeout(function(){e("body").removeClass("look")},2e3),0==s?e(".nav_container").removeClass("nav_container_visible"):e(".nav_container").addClass("nav_container_visible"),0==s?(setTimeout(function(){e(".scroll.animate_fade").removeClass("animate_faded")},500),setTimeout(function(){i()},e(".home_screen").hasClass("stages_home_screen")?500:100),e("body").addClass("home_screen_visible").removeClass("home_screen_invisible")):(setTimeout(function(){e(".scroll.animate_fade").addClass("animate_faded").scrollTop(0)},800),setTimeout(function(){e("body").addClass("home_screen_invisible").removeClass("home_screen_visible")},1e3)),e(".stage_screen_btns_wrapper span.active").removeClass("active"),e(".stage_screen_btns_wrapper span").eq(s-1).addClass("active"),e("body").attr({id:"screen_visible_"+s}),o.find("ul.dot_ul li").eq(s-1).hasClass("active")||(o.find(".active").removeClass("active"),o.find("ul.dot_ul li").eq(s-1).addClass("active"),o.find("ul.text_ul li").eq(s-1).addClass("active")),o.attr({id:"stage_nav_container_"+s}),0!=s&&(e(".home_screen .animate_up").removeClass("animate_uped"),e(".all_view_wrapper").removeClass("all_view_wrapper_fadeIn"),e(".next_screen").hasClass("next_screen_footer")||e(".next_screen").removeClass("next_screen_ed"),setTimeout(function(){e(".slide_bg").removeClass("slide_bg_ed")},1500));var a=e(".slide").eq(s),t=e(".screen_slide").eq(s),l=e(".slide_active"),r=e(".screen_slide_active");r.addClass("slide_start"),a.addClass("slide_animating"),t.addClass("screen_slide_animating"),a.find(".big_pic").addClass("big_pic_ed"),setTimeout(function(){a.find(".side_pic").addClass("side_pic_ed"),t.find(".side_pic").addClass("side_pic_ed")},200),setTimeout(function(){r.find(".animate_up").each(function(s){var a=e(this);setTimeout(function(){a.removeClass("animate_uped")},150*s)})},0),setTimeout(function(){t.find(".animate_up").each(function(s){var a=e(this);setTimeout(function(){a.addClass("animate_uped")},300*s)})},800),setTimeout(function(){s>e(".screen_slide").index(e(".screen_slide_active"))?r.find(".screen").addClass("screen_ed_down"):r.find(".screen").removeClass("screen_ed");var a=t.attr("data-hash");window.location.hash=a,t.find(".screen").removeClass("screen_ed_down").addClass("screen_ed")},300),r.find(".side_pic").removeClass("side_pic_ed"),setTimeout(function(){t.find(".screen_tile").addClass("screen_tile_ed")},900),setTimeout(function(){l.find(".big_pic").removeClass("big_pic_ed"),l.find(".side_pic").removeClass("side_pic_ed"),l.removeClass("slide_active"),a.removeClass("slide_animating").addClass("slide_active"),e(".slide_active").prevAll(".slide").find(".big_pic").removeClass("up").addClass("down"),e(".slide_active").nextAll(".slide").find(".big_pic").removeClass("down").addClass("up"),n()},1100),setTimeout(function(){r.removeClass("slide_start"),r.removeClass("screen_slide_active"),t.removeClass("screen_slide_animating").addClass("screen_slide_active"),e(".screen_slide_active").prevAll(".screen_slide").find(".screen").removeClass("screen_ed").addClass("screen_ed_down"),e(".screen_slide_active").nextAll(".screen_slide").find(".screen").removeClass("screen_ed_down").removeClass("screen_ed"),e(".screen_slide_active").siblings(".screen_slide").find(".screen_tile").removeClass("screen_tile_ed")},2e3)}}function n(){var s=e(".slide").index(e(".slide_active"));e(".nav_container ul li").eq(s).hasClass("active")||(e(".nav_container").find(".active").removeClass("active"),e(".nav_container ul li").eq(s).addClass("active"))}function l(){if(e(window).width()<=1024){var s=e(".wrapper").data("swipe-index");0==s||s==e(".slide").size()?e(".nav_container").removeClass("mobile_nav_container_visible"):e(".nav_container").addClass("mobile_nav_container_visible"),e(".nav_container ul li").eq(s).hasClass("active")||(e(".nav_container").find(".active").removeClass("active"),e(".nav_container ul li").eq(s).addClass("active"))}}e(window).width()<1025?a():s();var d=e("body"),o=e(".stage_nav_container"),r=window.location.hash;if(r){if(e("body").hasClass("page-template-stages-page")&&e('.screen_slide[data-hash="'+r.replace("#","")+'"]').length>0){var _=e('.screen_slide[data-hash="'+r.replace("#","")+'"]').attr("data-id");e(window).width()<1025?(e(".mobile_stages_slider_nav").removeClass("is_open"),e(".mobile_stages_slider_nav").find(".active").removeClass("active"),e(".mobile_stages_slider_nav li").eq(_-1).addClass("active"),e("#mobile_stage").find("ul").slick("slickGoTo",_-1),e(".stage_screen_btns .active").removeClass("active"),e('.stage_screen_btns a[data-hash="'+r.replace("#","")+'"').closest(".animate_up").addClass("active"),e("html, body").animate({scrollTop:e("#mobile_stage").offset().top-e("#header").height()},360)):t(_)}}else e("body").hasClass("page-template-stages-page")&&e(window).width()<1025&&(e(".mobile_stages_slider_nav li").eq(0).addClass("active"),e(".stage_screen_btns .animate_up").eq(0).addClass("active"));if(e(".stage_list_slider .flexslider").flexslider({animation:"slide",slideshow:!1,slideshowSpeed:5e3,animationSpeed:1,start:function(s){var a;e(".stage_item_trigger").hover(function(){var i=e(this).closest(".screen_slide").attr("data-slider");if(i=e(i),clearTimeout(a),i.stop().css({opacity:1}).css({marginLeft:0}),e.isFunction(s.flexAnimate)){var t=e(this).index();s.flexAnimate(t)}},function(){var s=e(this);a=setTimeout(function(){var a=e(s).closest(".screen_slide").attr("data-slider");a=e(a),a.stop().css({opacity:0}).css({marginLeft:"-9999px"})},100)})}}),i(1),e(".stage_screen_btns_wrapper a, .stage_screen_btns a").click(function(){if(e("body").hasClass("look"))return!1;var s=e(this).parent("span"),a=s.index()+1;return!!e("body").hasClass("single-stage")||(s.hasClass("active")||(t(a),e(".stage_screen_btns").find(".active").removeClass("active"),e(".stage_screen_btns").find("span").eq(a-1).addClass("active"),e(this).closest(".animate_up").addClass("active"),e(this).closest("span").addClass("active")),e(".mobile_stages_slider_nav").find(".active").removeClass("active"),e(".mobile_stages_slider_nav li").eq(a-1).addClass("active"),e(window).width()<1025&&(e("#mobile_stage").find("ul").slick("slickGoTo",a-1),e("html, body").animate({scrollTop:e("#mobile_stage").offset().top-e("#header").height()},360)),!1)}),e(".stage_nav_a").click(function(){var s=e(this).parent("li"),a=s.index()+1;return s.hasClass("active")||t(a),!1}),e(".logo.animate_left").addClass("animate_lefted"),e(".fl_btn_box.animate_left").addClass("animate_lefted"),e(".round_nav.rn_animate_fade").addClass("rn_animate_faded"),e(".animate_right").addClass("animate_righted"),e(".social_btns .animate_left").each(function(s){var a=e(this);setTimeout(function(){a.addClass("animate_lefted")},300*(e(".social_btns .animate_left").size()-s))}),e(".nav_container a").click(function(){var s=e(this).parent("li"),a=s.parents(".nav_container"),i=s.index();return s.hasClass("active")||(a.find(".active").removeClass("active"),s.addClass("active"),t(i)),!1}),e(".mobile_nav_container a").bind("click touchstart",function(){var s=e(this).parent("li"),a=s.parents(".mobile_nav_container"),i=s.index()+1;return s.hasClass("active")||(a.find(".active").removeClass("active"),s.addClass("active"),c.data({"swipe-index":Number(i)-1}),c.removeAttr("class"),c.addClass("wrapper").addClass("wrapper_"+c.data("swipe-index"))),l(),!1}),e(".next_screen").click(function(){return e(this).hasClass("next_screen_trigger")?e(this).parents(".full_screen").hasClass("sec_full_screen")?e("html, body").animate({scrollTop:2*e(window).height()},360):e("html, body").animate({scrollTop:e(window).height()},360):t(1),!1}),e(".next_screen_footer").click(function(){return e("body").hasClass("footer_visible")?e(".back_top").trigger("click"):d.addClass("footer_visible"),!1}),d.bind("mousewheel",function(s){if(e(window).width()>1024){var a=e(".slide_active");"-1"==s.deltaY?a.next(".slide").length?t(e(".slide_active").next(".slide").index()):e(".slide_animating").length||e(".screen_slide_animating").length||d.hasClass("footer_animating")||e(".lightbox_visible").length||(d.addClass("footer_visible"),e(".nav_container").removeClass("nav_container_visible")):"1"==s.deltaY&&(d.hasClass("footer_visible")?(d.removeClass("footer_visible"),d.addClass("footer_animating"),setTimeout(function(){d.removeClass("footer_animating")},600),e(".nav_container").addClass("nav_container_visible"),a.prevAll(".slide").find(".big_pic").removeClass("up").addClass("down")):a.prev(".slide").length&&t(e(".slide_active").prev(".slide").index()))}}),d.hasClass("home")){var c=e(".wrapper"),v=e(".slide").size();e(".wrapper").data({"swipe-index":0}),d.swipe({swipe:function(s,a,i,t,n,o){if(e(s.target).hasClass("menu-expand")&&e(window).width()<=1024&&e(s.target).trigger("click"),e(s.target).hasClass("social_btns")||e(".social_btns_open").removeClass("social_btns_open"),"up"==a){var r=c.data("swipe-index");if(r!=v){var r=c.data("swipe-index");c.data({"swipe-index":Number(r)+1}),c.removeAttr("class"),c.addClass("wrapper").addClass("wrapper_"+c.data("swipe-index")),r==v-1?d.addClass("mobile_footer_visible"):d.removeClass("mobile_footer_visible")}}if("down"==a){d.removeClass("mobile_footer_visible");var r=c.data("swipe-index");0!=r&&(c.data({"swipe-index":Number(r)-1}),c.removeAttr("class"),c.addClass("wrapper").addClass("wrapper_"+c.data("swipe-index")))}l()},threshold:0,preventDefaultEvents:!d.hasClass("stage_page")})}e(".back_top").click(function(){return d.hasClass("home")||d.hasClass("page-template-stages-page")?(d.removeClass("stages_header_bg"),d.removeClass("mobile_footer_visible"),e(".wrapper").removeAttr("class").addClass("wrapper"),d.removeClass("footer_visible"),e(".wrapper").data({"swipe-index":0}),setTimeout(function(){e(".nav_container ul li").first().find("a").trigger("click"),t(0)},100)):e("html, body").animate({scrollTop:0},600),!1})}),e(window).resize(function(){e(window).width()<1025?a():s()})}(jQuery);