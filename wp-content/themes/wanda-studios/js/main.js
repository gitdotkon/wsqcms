!function(e){function a(a,t){return e.ajax({url:flow.api_base+a.route,method:a.method,data:t})}function t(){var a=e("#next_screen"),t=e(".first-screen").height(),s=e(".header");if(a.length>0){if(e(window).scrollTop()>0)return s.hasClass("white-header")||s.addClass("white-header"),!1;if(e(window).scrollTop()<t)return e(".header").removeClass("white-header"),!1}}function s(a){if(e(window).width()>1024){var t=e("#next_screen");e(".first-screen").height(),e(".header");if(t.length>0&&a.deltaY<0&&0==e(window).scrollTop())return e("body, html").animate({scrollTop:e(".first-screen").height()-100},300),!1}}function i(e,a,t){var s=new BMap.Map("map_id",{enableMapClick:!1}),i=13;s.centerAndZoom(new BMap.Point(t,a,i)),s.addControl(new BMap.NavigationControl)}function l(e,a,t){new google.maps.LatLngBounds,new google.maps.Map(document.getElementById("map_id"),{center:{lat:a,lng:t},zoom:8,scrollwheel:!1})}function n(a){e("html").toggleClass("iframe-fullscreen")}var o={items:{route:"items",method:"GET"},contact:{route:"contact-us",method:"POST"},mailto:{route:"send-mail",method:"POST"},apply:{route:"apply-form",method:"POST"},news:{route:"news",method:"GET"},videos:{route:"videos",method:"GET"},gallery:{route:"galleries",method:"GET"},gallery_images:{route:"gallery-items",method:"GET"},search:{route:"search",method:"GET"}},r=[];e(window).load(function(){var a=e("#page_list_desc");a.length>0&&a.find("li").hover(function(){var a=e(this).index(),t=e("#fade-image");t.find(".img.active").removeClass("active"),t.find(".img").eq(a).addClass("active")},function(){})}),e(document).ready(function(){function t(a){var t=_.template(e("#gallery_slider").html()),s=t({slides:a});e("#gallery_slider_slick").append(s),e("#gallery_slider_slick").slick({infinite:!0,slidesToShow:1,slidesToScroll:1,dots:!1})}function s(e){if(r[e])t(r[e]);else{var s=a(o.gallery_images,{gallery_id:e});s.success(function(a){r[e]=a.images_list,t(r[e])})}}function n(a){if(a.length>0){e(".tab.tab-active").removeClass("tab-active"),a.addClass("tab-active");var t=0;e("#header").length>0&&(t=e("#header").height());var s=a.offset().top-t;e("html, body").animate({scrollTop:s})}}function c(){e(".tab.tab_tile").removeClass("tab-active"),e(".tab.tab_slider").addClass("tab-active")}function d(e){var a=document.cookie.match("(^|;) ?"+e+"=([^;]*)(;|$)");return a?unescape(a[2]):null}function h(e){var a=new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);return a.test(e)}var v=(e("#home_page"),window.location.hash),u=e(".next_screen_mousewheel");u.length>0&&e(".next_screen").hover(function(){u.addClass("next_screen_mousewheel_ed")},function(){u.removeClass("next_screen_mousewheel_ed")}),e(".group_property_ul li").length>0&&e(".group_property_ul li").matchHeight(),e(".inactive").click(function(){return!1}),e("body").hasClass("single-stage")&&e(".mobile_stages_slider_nav a").click(function(){var a=e(this).closest("li").index();return e(".mobile_stages_slider_nav").hasClass("is_open")?e(this).closest("li").hasClass("active")?(e(".mobile_stages_slider_nav").removeClass("is_open"),!1):(e(".mobile_stages_slider_nav").removeClass("is_open"),e(".mobile_stages_slider_nav").find(".active").removeClass("active"),e(".mobile_stages_slider_nav li").eq(a).addClass("active"),e("html, body").animate({scrollTop:e("#mobile_stage").offset().top-e("#header").height()},360),!1):(e(".mobile_stages_slider_nav").addClass("is_open"),!1)}),e(document).on("click",".lightbox_btn, .video-gallery, .show_gallery",function(a){if(e(this).hasClass("go-to"))return!0;var t=e(e(this).attr("href"));if(t.length>0){if(!t.hasClass("lightbox_visible")){var i=e(this).attr("data-id");if(i)if(e(this).hasClass("view_video")){e("#video_palyer").attr("src",i);var l=document.getElementById("video_palyer");l.play(),e("html").addClass("video_playing")}else e(this).hasClass("view_gallery")?s(i):t.find("iframe").attr("src",i);e(".lightbox_visible").removeClass("lightbox_visible"),t.addClass("lightbox_visible"),e("html").addClass("has_lightbox_visible")}return!1}}),e(".lightbox_close").click(function(){if(e(".lightbox_visible").removeClass("lightbox_visible"),e(".has_lightbox_visible").removeClass("has_lightbox_visible"),e("html").hasClass("video_playing")){e("html").removeClass("video_playing");var a=document.getElementById("video_palyer");a.pause()}return e("#gallery_slider_slick").hasClass("slick-initialized")&&(e("#gallery_slider_slick").slick("unslick"),e("#gallery_slider_slick").html("")),!1});var m=e("#map");e(m).length>0&&flow.lat&&flow.lang&&("google"==flow.map_type?l("map",parseFloat(flow.lat),parseFloat(flow.lang)):"baidu"==flow.map_type&&i("map",parseFloat(flow.lat),parseFloat(flow.lang)));var f=e(".map-wrapper");e(f).length>0&&(e(".view-3d-map").click(function(){var a=e(this).attr("href");return e(a).addClass("open").fadeIn(),!1}),e(f).find(".close-map").click(function(){return e(f).removeClass("open").fadeOut(),!1}),e(f).click(function(a){return e(a.target).hasClass("map-wrapper")&&e(f).removeClass("open").fadeOut(),!1})),e(".carousel_slider").owlCarousel({items:5,autoplay:!0,margin:40,nav:!0,navText:[],responsive:{0:{items:2},767:{items:3},960:{items:5}}}),e(".film_with_us_col").matchHeight(),e(".team_detail").find(".flexslider").flexslider({animation:"fade",slideshow:!1,slideshowSpeed:8e3,animationSpeed:800,smoothHeight:!0,start:function(a){e(window).width()>1024?e(".our_team_list_ul ul li").click(function(){var t=e(this),s=e(this).closest("ul").index(),i=parseInt(e(this).attr("data-index"));s>0&&(i+=e(".our_team_list_ul ul").eq(0).find("li").length),t.hasClass("active")||(e(".our_team_list_ul .active").removeClass("active"),t.addClass("active"),a.flexAnimate(i))}):e(".our_team_list_ul ul li").click(function(){if(e(this).hasClass("active"))e(this).removeClass("active").find(".text").slideUp(300);else{e(".our_team_list_ul .active").removeClass("active").find(".text").slideUp(300),e(this).addClass("active");var a=e(this);e(this).find(".text").slideDown(300,function(){e("body, html").animate({scrollTop:a.offset().top-e("#header").height()-15},360)})}})}}),e(".team_detail").find(".text").scrollbar({showArrows:!1,scrollx:"simple",scrolly:"simple",autoScrollSize:!1});var p=e("#header-menu");if(e(".screen_btns .sync-item").click(function(){var a=e(this).attr("href"),t=e(a);n(t),window.location.hash=a,"#news"==a?e("body").addClass("show_cats"):e("body").removeClass("show_cats");var s=e(this).closest(".animate_up").index();return e(".screen_btns .active").removeClass("active"),p.find(".active").removeClass("active"),p.find("li").eq(s).addClass("active"),e(this).addClass("active"),!1}),e(".sv_icons a").click(function(){var a=e(this).attr("href"),t=e(a);n(t),window.location.hash=a;var s=e(this).closest("li").index();return e(".sv_icons .active").removeClass("active"),p.find(".active").removeClass("active"),p.find("li").eq(s).addClass("active"),e(this).closest("li").addClass("active"),!1}),p.find(".sync-item").click(function(){var a=e(this).attr("href");window.location.hash=a;var t=e(a);"#news"==a?e("body").addClass("show_cats"):e("body").removeClass("show_cats");var s=e(this).closest("li").index();if(e(window).width()<1025){if(!p.hasClass("is_open"))return p.addClass("is_open"),!1;if(e(this).closest("li").hasClass("active"))return p.removeClass("is_open"),!1;p.removeClass("is_open")}return p.find(".active").removeClass("active"),e(".screen_btns .active").removeClass("active"),e(".screen_btns").find(".animate_up").eq(s).find("a").addClass("active"),e(".sv_icons .active").removeClass("active"),e('.sv_icons a[href^="'+a+'"]').closest("li").addClass("active"),e(this).closest("li").addClass("active"),n(t),!1}),v?e("body").hasClass("page-template-stages-page")||(n(e(v)),e('.screen_btns a[href^="'+v+'"]').addClass("active"),e(".sv_icons .active").removeClass("active"),e('.sv_icons a[href^="'+v+'"]').closest("li").addClass("active"),p.find(".active").removeClass("active"),p.find('a[href^="'+v+'"]').closest("li").addClass("active"),v=v.replace("#",""),"news"==v?e("body").addClass("show_cats"):e("body").removeClass("show_cats")):(e("body").hasClass("page-template-media-center-page")&&(e(".screen_btns .animate_up").eq(0).find("a").addClass("active"),e("#header-menu").find("li").eq(0).addClass("active"),e("body").addClass("show_cats")),(e("body").hasClass("page-template-services-page")||e("body").hasClass("page-template-marine-page")||e("body").hasClass("page-template-prod-offices-page")||e("body").hasClass("page-template-partner-directory"))&&(e(".screen_btns .animate_up").eq(0).find("a").addClass("active"),e("#header-menu").find("li").eq(0).addClass("active"))),e(".tabs.tab-active").length>0){e(".tabs.tab-active").attr("id")}e(window).width()<1025&&p.find("li").click(function(){return p.hasClass("is_open")?e(this).hasClass("active")?(p.removeClass("is_open"),!1):void 0:(p.addClass("is_open"),!1)});var w=e("#workshops_slider .flexslider");if(w.length>0){w.flexslider({animation:"slide",slideshow:!1,slideshowSpeed:8e3,animationSpeed:800,touch:!1,smoothHeight:!0,start:function(a){var t=e("#header-menu"),s=window.location.hash;if(s){var i=e(s).index();c(),a.flexAnimate(i)}e(".screen_btns .workshop_btn").click(function(){c();var t=e(this).closest(".animate_up").index();return a.flexAnimate(t),!1}),t.find("a").click(function(){c();var s=e(this).closest("li").index();if(e(window).width()<1025){if(!t.hasClass("is_open"))return t.addClass("is_open"),!1;if(e(this).closest("li").hasClass("active"))return t.closest("li").removeClass("is_open"),!1}return a.flexAnimate(s),!1}),e("#workshop_four_tile .work_shops_tile").click(function(){c();var t=e(this).index();return window.location.hash="#"+e(this).attr("id"),e("#header-menu").find(".active").removeClass("active"),e("#header-menu").find("li").eq(t).addClass("active"),e(".screen_btns").find(".active").removeClass("active"),e(".screen_btns").find(".animate_up").eq(t).find("a").addClass("active"),a.flexAnimate(t),!1})},before:function(a){var t=a.animatingTo;e(".screen_btns").find(".active").removeClass("active"),e(".screen_btns .animate_up").eq(t).find("a").addClass("active"),p.find(".active").removeClass("active"),p.find("li").eq(t).addClass("active"),e("html, body").scrollTop(e(".tabs").offset().top-e("#header").height())}});e("#work_shops_close").click(function(){return e(".tab.tab_tile").addClass("tab-active"),e(".tab.tab_slider").removeClass("tab-active"),p.find(".active").removeClass("active"),e(".screen_btns").find(".active").removeClass("active"),window.location.hash="",e("html, body").scrollTop(e(".first-screen").height()-e("#header").addClass("white-header").height()),!1})}e(".stage_detail_slider .flexslider ul").slick({infinite:!0,slidesToShow:1,slidesToScroll:1,dots:!0});var g;g=e(e(window).width()<=1024?"#contact_form_2":"#contact_form"),e(document).on("click",".error input",function(){e(this).closest(".field").removeClass("error")}),g.length>0&&(e(".thank-you .close").click(function(){return e(".thank-you").hide(),g.find(".field input, .field textarea").val(""),g.find(".placeholder").show(),!1}),g.submit(function(t){var s=e(this),i=s.find("input.name").val().trim(),l=s.find("input.email").val().trim(),n=!0;0==i.length&&(s.find("input.name").closest(".field").addClass("error"),n=!1),0!=l.length&&h(l)||(s.find(".email").closest(".field").addClass("error"),n=!1);var r=e(this).serialize(),c=e(this).attr("action"),v=window.location.href.lastIndexOf("/");if(c=window.location.href.substr(0,v)+"/"+c,!n)return!1;var _=(d("captcha"),a(o.contact,{validation:g.find(".field_captcha input").val()}));return _.success(function(t){if(1==t.status){g.addClass("wait");var i=a(o.mailto,r);i.success(function(e){}),e(".thank-you").show(),e(s).removeClass("wait"),i.error(function(e){}),i.complete(function(e){})}else g.find(".field_captcha").addClass("error")}),!1}),e(".contact_form :input").keyup(function(){e(this).val()?e(this).siblings("label").hide():e(this).siblings("label").show()})),e(".job .title").click(function(){var a=e(this).parent(".job");return a.hasClass("job_open")?a.removeClass("job_open").find(".desc").slideUp():(e(".job_open").removeClass("job_open").find(".desc").slideUp(),a.addClass("job_open").find(".desc").slideDown()),!1});var C=e("#job_list");e(".filter_location li").click(function(a){var t=e(this).attr("data-location");e(".filter_location .active").removeClass("active");var s=e(this).addClass("active").html();e(this).closest(".span").find(".current").html(s),e(this).closest(".span").find(".current").attr("data-current",t);var i=e(".filter_title_wrapper .current").attr("data-current");return C.find(".job").hide(),"0"!=i?C.find(".job[data-location="+t+"][data-title="+i+"]").show():C.find(".job[data-location="+t+"]").show(),e(".filter_location").hasClass("open")&&e(".filter_location").removeClass("open"),a.preventDefault(),!1}),e(window).width()<1025&&e(".filter_box .span").click(function(){e(this).find("ul").addClass("open")}),e(".filter_title li").click(function(a){var t=e(this).attr("data-title"),s=e(this).addClass("active").html();e(this).closest(".span").find(".current").html(s),e(this).closest(".span").find(".current").attr("data-current",t);var i=e(".filter_location_wrapper .current").attr("data-current");return C.find(".job").hide(),"0"!=i?C.find(".job[data-title="+t+"][data-location="+i+"]").show():C.find(".job[data-title="+t+"]").show(),e(".filter_title").hasClass("open")&&e(".filter_title").removeClass("open"),a.preventDefault(),!1}),e(".filter_reset").click(function(){return C.find(".job").show(),e(".filter_location_wrapper .current").html(e(".filter_location_wrapper .current").attr("data-default")),e(".filter_title_wrapper .current").html(e(".filter_title_wrapper .current").attr("data-default")),e(".filter_location_wrapper .current").attr("data-current",0),e(".filter_title_wrapper .current").attr("data-current",0),!1}),e(".apply_close").click(function(){return e(".white_overlay").hide(),e(".apply_wrapper").fadeOut(),!1}),e("input[type=file].nice").length>0&&e("input[type=file].nice").nicefileinput({label:e("input[type=file].nice").attr("data-title")}),e(".apply_btn").click(function(){e(".white_overlay").show(),e(e(this).attr("href")).fadeIn();var a=e(this).closest(".job").attr("data-title"),t=e(this).closest(".job").attr("data-apply");return e("#job_title").val(a),e("#apply_email").val(t),!1});var b=e("#apply_form");b.length>0&&(b.find(".required input").change(function(){e(this).closest(".required").removeClass("error")}),b.submit(function(){var a=!0;if(e(this).find(".require").each(function(){""==e(this).find("input").val()&&(e(this).addClass("error"),a=!1)}),a){var t=new FormData(e(this)[0]);b.addClass("wait"),e.ajax(flow.api_base+o.apply.route,{contentType:!1,processData:!1,data:t,type:"POST",success:function(a){(a.status="1")&&(e(".white_overlay").hide(),e(".apply_wrapper").fadeOut(),b[0].reset(),b.removeClass("wait"),e(".thank-you-interest").show())},error:function(e){}}),setTimeout(function(){e(".thank-you-interest").show()},1e3)}return!1})),e(".page-template-templatesit-services-php, .page-template-services-page").find(".landing_grids_inner a.r_f").click(function(){return!1}),e("#mobile_sub-cat").change(function(){var t=e("#mobile_sub-cat option:selected").val();e(".news-category-list .active").removeClass("active"),e(this).closest("li").addClass("active"),e("#news_category").val(t);var s=6,i=a(o.news,{news_per_page:s,cat:t});return e(".load_more").addClass("wait"),i.success(function(a){0==parseInt(a.available)?e("#more_news").hide():e("#news_count").val(parseInt(e("#news_count").val())+a.news.length);var t=_.template(e("#news-item").html()),s=t({news:a.news});e("#news_container").find(".news_item").remove(),e("#news_container").append(s),e(".load_more").removeClass("wait")}),!1}),e(".news-category-list a").click(function(){var t=e(this).attr("data-slug");e(".news-category-list .active").removeClass("active"),e(this).closest("li").addClass("active"),e("#news_category").val(t);var s=6,i=a(o.news,{news_per_page:s,cat:t});return e(".load_more").addClass("wait"),i.success(function(a){0==parseInt(a.available)?e("#more_news").hide():e("#news_count").val(parseInt(e("#news_count").val())+a.news.length);var t=_.template(e("#news-item").html()),s=t({news:a.news});e("#news_container").find(".news_item").remove(),e("#news_container").append(s),e(".load_more").removeClass("wait")}),!1}),e("#more_news").click(function(){var t=e("#news_per_page").val(),s=e("#news_count").val(),i=e("#news_category").val(),l=a(o.news,{news_count:s,news_per_page:t,cat:i});return e(".load_more").addClass("wait"),l.success(function(a){0==parseInt(a.available)?e("#more_news").hide():e("#news_count").val(parseInt(e("#news_count").val())+a.news.length);var t=_.template(e("#news-item").html()),s=t({news:a.news});e("#news_container").append(s),e(".load_more").removeClass("wait")}),!1}),e("#more_video").click(function(){var t=e("#video_per_page").val(),s=e("#videos_count").val(),i=a(o.videos,{videos_count:s,videos_per_page:t});return e(".load_more").addClass("wait"),i.success(function(a){0==parseInt(a.available)?e("#more_video").hide():e("#videos_count").val(parseInt(e("#videos_count").val())+a.videos.length);var t=_.template(e("#video-item").html()),s=t({videos:a.videos});e("#video_container").append(s),e(".load_more").removeClass("wait")}),!1}),e("#more_gallery").click(function(){var t=e("#gallery_per_page").val(),s=e("#gallery_count").val(),i=a(o.gallery,{gallery_count:s,gallery_per_page:t});return e(".load_more").addClass("wait"),i.success(function(a){0==parseInt(a.available)?e("#more_gallery").hide():e("#gallery_count").val(parseInt(e("#gallery_count").val())+a.gallery.length);var t=_.template(e("#gallery-item").html()),s=t({galleries:a.gallery});e("#gallery_container").append(s),e(".load_more").removeClass("wait")}),!1}),e(".menu_btn").click(function(){return e("body").addClass("main_nav_visible"),e("html").toggleClass("menu_is_open"),!1}),e(".main_nav_close").click(function(){return e("body").removeClass("main_nav_visible"),e("html").toggleClass("menu_is_open"),!1}),e(".main_nav_list .menu-item-has-children>a").after('<span class="menu-expand"></span>'),e(".middle, .right").find(".sub-menu a").each(function(){var a=e(this).attr("title"),t=e(this).html(),s='<span class="'+a+'"></span>'+t;e(this).html(s),e(this).attr("href")=="#"+v&&(e(this).closest("li").addClass("current_page_item"),e(this).closest(".menu").find(".menu-item-has-children").removeClass("current_page_item")),e(this).attr("title","")}),e(".menu a").click(function(){var a=e(this).closest(".menu").find(".hash-redirect");if(a.length>0){var t=a.find(">a").attr("href")+e(this).attr("href");window.location=t}}),e(document).on("click",".menu-expand",function(){var a=e(this).closest("li"),t=a.find(".sub-menu");a.hasClass("open")?(a.removeClass("open"),t.slideUp()):(e(".main_nav_list .open .sub-menu").slideUp(),e(".main_nav_list .open").removeClass("open"),a.addClass("open"),t.slideDown())})});e(window).resize(function(){e(window).width<1024&&t()}),e(window).scroll(function(){t()}),e(window).mousewheel(function(e){s(e)}),document.addEventListener("fullscreenchange",n,!1),document.addEventListener("webkitfullscreenchange",n,!1),document.addEventListener("mozfullscreenchange",n,!1)}(jQuery);