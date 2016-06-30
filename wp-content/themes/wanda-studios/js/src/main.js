(function ($) {
    /* REST setting begin */
    var routes = {
        news:{
            route: 'news/',
            method: 'GET'
        },
        items: {
            route: 'items',
            method: 'GET'
        }
    };

    function doAjax(endpoint, data) {
        return $.ajax({
            url: flow.api_base + endpoint.route,
            method: endpoint.method,
            data: data
        });
    }

    $(window).load(function(){
        var $page_list_desc = $('#page_list_desc');
        if($page_list_desc.length>0){
            $page_list_desc.find('li').hover(function(){
                var index = $(this).index();
                var $images = $('#fade-image');
                $images.find('.img.active').removeClass('active');
                $images.find('.img').eq(index).addClass('active');
                console.log(index);
            }, function(){});
        }
        /// Set white header
        //scrollScreen();
    });
    $(document).ready(function(){
        var $home_page = $('#home_page');
        var hash = window.location.hash;
        /* Animate mouse area */
        var $next_screen = $('.next_screen_mousewheel');
        if($next_screen.length>0){
            console.log('sfsdf');
            $('.next_screen').hover(function () {
                $next_screen.addClass('next_screen_mousewheel_ed');
            }, function () {
                $next_screen.removeClass('next_screen_mousewheel_ed');
            });
        }
        /* match height */
        if ($('.group_property_ul li').length > 0) {
            $('.group_property_ul li').matchHeight();
        }

        /* Light box */
        $(document).on('click', '.lightbox_btn', function () {
            var $lightbox = $($(this).attr('href'));
            if (!$lightbox.hasClass('lightbox_visible')) {
                var src = $(this).attr('data-id');
                if(src){
                    if($(this).hasClass('view_video')){
                        $('#video').attr('src', src);
                        var vid = document.getElementById('video');
                        vid.play();
                        $('html').addClass('video_playing');
                    }else{
                        $lightbox.find('iframe').attr('src', src);
                    }
                }
                $('.lightbox_visible').removeClass('lightbox_visible');
                $lightbox.addClass('lightbox_visible');
                $('html').addClass('has_lightbox_visible');
            }
            return false;
        });
        $('.lightbox_close').click(function () {
            $('.lightbox_visible').removeClass('lightbox_visible');
            $('.has_lightbox_visible').removeClass('has_lightbox_visible');
            if($('html').hasClass('video_playing')){
                $('html').removeClass('video_playing');
                var vid = document.getElementById('video');
                vid.pause();
            }
            return false;
        });
        /* Light box end */

        /* Contact page (Map script) */
        var map = $('#map');
        if($(map).length>0){
            if(flow.lat && flow.lang){
                if(flow.map_type == 'google'){
                    googleMap('map', parseFloat(flow.lat), parseFloat(flow.lang));
                }else if(flow.map_type == 'baidu'){
                    baiduMap('map', parseFloat(flow.lat), parseFloat(flow.lang));
                }
            }
        }
        /* 3D map scripts */
        var map_container = $('.map-wrapper');
        if($(map_container).length>0){
            $('.view-3d-map').click(function(){
                var target = $(this).attr('href');
                console.log(target);
                $(target).addClass('open').fadeIn();
                return false;
            });
            $(map_container).find('.close-map').click(function(){
                $(map_container).removeClass('open').fadeOut();
                return  false;
            });
            $(map_container).click(function(e){
                if($(e.target).hasClass('map-wrapper')){
                    $(map_container).removeClass('open').fadeOut();
                }
                return false;
            });
        }

        // Film banner
        $('.carousel_slider').owlCarousel({
            items: 5,
            autoplay: true,
            margin: 40,
            nav: true,
            navText: [],
            responsive: {
                0: {
                    items: 1
                },
                767: {
                    items: 2
                },
                960: {
                    items: 5
                }
            }
        });
        $('.film_with_us_col').matchHeight();

        /// Team slider
        $('.team_detail').find('.flexslider').flexslider({
            animation: 'fade',
            slideshow: false,
            slideshowSpeed: 8000,
            animationSpeed: 800,
            smoothHeight: true,
            start: function (slider) {
                if($(window).width() > 1024){
                    $('.our_team_list_ul ul li').click(function () {
                        var $this = $(this),
                            index = parseInt($(this).attr('data-index'));
                        //index = $this.index();

                        if (!$this.hasClass('active')) {
                            $('.our_team_list_ul .active').removeClass('active');
                            $this.addClass('active');
                            slider.flexAnimate(index);
                        }
                    });
                }else{
                    $('.our_team_list_ul ul li').click(function () {
                        $('.our_team_list_ul .active').removeClass('active').find('.text').slideUp(300);
                        $(this).addClass('active');
                        var $self = $(this);
                        $(this).find('.text').slideDown(300, function(){
                            $('body, html').animate( { scrollTop: $self.offset().top - $('#header').height()-15 }, 360);
                        });

                    });
                }

            }
        });
        $('.team_detail').find('.text').scrollbar({
            showArrows: false,
            scrollx: 'simple',
            scrolly: 'simple',
            autoScrollSize: false
        });


        /* Header drop down menu */
        var $header_menu = $('#header-menu');
        function changeTab($dest){
            $('.tab.tab-active').removeClass('tab-active');
            $dest.addClass('tab-active');
            $('html, body').animate({scrollTop: $dest.offset().top - $('#header').height()})
        }
        $('.screen_btns .sync-item').click(function(){
            var dest = $(this).attr('href');
            var $dest = $(dest);
            var index = $(this).closest('.animate_up').index();
            $('.screen_btns .active').removeClass('active');
            $header_menu.find('.active').removeClass('active');
            $header_menu.find('li').eq(index).addClass('active');
            $(this).addClass('active');
            changeTab($dest);
            return false;
        })
        $header_menu.find('.sync-item').click(function(){
            var dest = $(this).attr('href');
            var $dest = $(dest);
            var index = $(this).closest('li').index();
            if($(window).width()<1025){
                if(!$header_menu.hasClass('is_open')){
                    $header_menu.addClass('is_open');
                    return false;
                }else{
                    if($(this).closest('li').hasClass('active')){
                        $header_menu.removeClass('is_open');
                        return false;
                    }
                }
                $header_menu.removeClass('is_open');
            }
            $header_menu.find('.active').removeClass('active');
            $('.screen_btns .active').removeClass('active');
            $('.screen_btns').find('.animate_up').eq(index).find('a').addClass('active');
            $(this).closest('li').addClass('active');
            changeTab($dest);
            return false;
        });
        if($(window).width()<1025){
            $header_menu.find('li').click(function(){
                if(!$header_menu.hasClass('is_open')){
                    $header_menu.addClass('is_open');
                    return false;
                }else{
                    if($(this).hasClass('active')){
                        $header_menu.removeClass('is_open');
                        return false;
                    }
                }
            });
        }
    });
    var lastScrollTop = 0,
        st,
        direction;

    function detectDirection() {

        st = window.pageYOffset;

        if (st >= lastScrollTop) {
            direction = "down";
        } else {
            direction = "up";
        }

        lastScrollTop = st;

        return  direction;

    }
    $(window).resize(function(){
        if($(window).width<1024){
            scrollScreen();
        }
    });

    $(window).scroll(function () {
        scrollScreen();
    });

    $(window).mousewheel(function(e){
        mousewheelScreen(e);
    });

    function scrollScreen(){
        var $scroll_btn = $('#next_screen');
        var destination_height = $('.first-screen').height();
        var $header = $('.header');
        if($scroll_btn.length>0){
            if($(window).scrollTop() >0){
                if(!$header.hasClass('white-header')){
                    $header.addClass('white-header');
                }
                return false;
            }

            if($(window).scrollTop() < destination_height){
                $('.header').removeClass('white-header');
                return false;
            }
        }
    }

    function mousewheelScreen(e){
        if($(window).width()>1024){
            var $scroll_btn = $('#next_screen');
            var destination_height = $('.first-screen').height();
            var $header = $('.header');
            if($scroll_btn.length>0){
                if(e.deltaY < 0 && $(window).scrollTop() == 0){
                    $('body, html').animate({
                        scrollTop: $('.first-screen').height() -100
                    }, 300);
                    return false;
                }
            }
        }
    }

    function baiduMap(map_id, lat, lang){
        var map = new BMap.Map('map_id', {
            enableMapClick: false
        });
        var zoom = 13;
        map.centerAndZoom(new BMap.Point(lang, lat, zoom));
        map.addControl(new BMap.NavigationControl());
    }

    function googleMap(map_id, lat, lang){
        var bounds = new google.maps.LatLngBounds();
        var map = new google.maps.Map(document.getElementById('map_id'), {

            center: {lat: lat, lng: lang},
            zoom: 8,
            //draggable: false,
            scrollwheel: false,
            //disableDefaultUI: true,
            //zoom: 10
        });
    }
    function changeHandler(e) {
        $('html').toggleClass('iframe-fullscreen');
    }

    document.addEventListener("fullscreenchange", changeHandler, false);
    document.addEventListener("webkitfullscreenchange", changeHandler, false);
    document.addEventListener("mozfullscreenchange", changeHandler, false);

})(jQuery);
