(function ($) {
    
    /* REST setting begin */
    var routes = {
        items: {
            route: 'items',
            method: 'GET'
        },
        contact: {
            route: 'contact-us',
            method: 'POST'
        },
        mailto: {
            route: 'send-mail',
            method: 'POST'
        },
        apply: {
            route: 'apply-form',
            method: 'POST'
        },
        news: {
            route: 'news',
            method: 'GET'
        },
        videos: {
            route: 'videos',
            method: 'GET'
        },
        gallery: {
            route: 'galleries',
            method: 'GET'
        },
        gallery_images: {
            route: 'gallery-items',
            method: 'GET'
        },
        search: {
            route: 'search',
            method: 'GET'
        }
    };
    var galleries_images = [];
    function doAjax(endpoint, data) {
        return $.ajax({
            url: flow.api_base + endpoint.route,
            method: endpoint.method,
            data: data
        });
    }
    // function resize_search_res(){
    //     var h = $(window).height();
    //     var offset = $('#searchform').offset().top + $('#searchform').height();
    //     var d = 119;
    //     if($(window).width()<1025){
    //         d = 80;
    //     }
    //     var r = h - offset - d;
    //     $('#search-result-container').height(r);
    // }
    $(window).load(function(){
        var $page_list_desc = $('#page_list_desc');
        if($page_list_desc.length>0){
            $page_list_desc.find('li').hover(function(){
                var index = $(this).index();
                var $images = $('#fade-image');
                $images.find('.img.active').removeClass('active');
                $images.find('.img').eq(index).addClass('active');
            }, function(){});
        }
        /// Set white header
        //scrollScreen();
    });
    $(document).ready(function(){

        $('.page-template-facilities-page .page-list-description li:last-child a').click(function(){
           return false;
        });
        var $home_page = $('#home_page');
        var hash = window.location.hash;
        function ReplaceAll(Source, stringToFind, stringToReplace) {
            var temp = Source;
            var index = temp.indexOf(stringToFind);

            while (index != -1) {
                temp = temp.replace(stringToFind, stringToReplace);
                index = temp.indexOf(stringToFind);
            }

            return temp;
        }
        $('#searchform').submit(function(){
            var s = ReplaceAll($('#s').val(), '"', '');
            s = ReplaceAll(s, "'", '');
            s = ReplaceAll(s, "&quot;", '');
            $('#s').val(s);
        });

        // Search
        // $('#close_search').click(function(){
        //     $('body').removeClass('show-search-result');
        //     $('#s').val('');
        // });
        // $('#searchform').submit(function(){
        //     resize_search_res();
        //     var $search_container = $('#search-result-container');
        //     var query = $('#s').val();
        //     $('body').addClass('show-search-result');
        //     var response = doAjax(routes.search, $(this).serialize());
        //     $search_container.niceScroll({
        //         autohidemode: false,
        //         cursorfixedheight: 18
        //     });
        //     response.success(function(res){
        //         $search_container.find('.loading').hide();
        //         var template = _.template($('#search-item').html());
        //         var result_html = template({results: res.results});
        //         $search_container.find('.result-article').remove();
        //
        //         $search_container.append(result_html);
        //         $search_container.find('h2 a').replaceText(query.toLowerCase(), '<i>'+query+'</i>');
        //         $search_container.find('h2 a').replaceText(query, '<i>'+query+'</i>');
        //
        //         $search_container.find('.short').replaceText(query.toLowerCase(), '<i>'+query+'</i>');
        //         $search_container.find('.short').replaceText(query, '<i>'+query+'</i>');
        //     });
        //     return false;
        // });
        /* Animate mouse area */
        var $next_screen = $('.next_screen_mousewheel');
        if($next_screen.length>0){

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
        function create_slider(images){
            var template = _.template($('#gallery_slider').html());
            var slider = template({slides: images});

            $('#gallery_slider_slick').append(slider);
            $('#gallery_slider_slick').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false
            });
        }
        function gallery_slider(gallery_id){
            if(galleries_images[gallery_id]){
                create_slider(galleries_images[gallery_id]);
            }else{
                var response = doAjax(routes.gallery_images, {'gallery_id': gallery_id});
                response.success(function(data){
                    galleries_images[gallery_id] = data['images_list'];
                    create_slider(galleries_images[gallery_id]);
                });
            }
        }
        $('.inactive').click(function(){
            return false;
        });
        if($('body').hasClass('single-stage')){
            $('.mobile_stages_slider_nav a').click(function(){
                var index = $(this).closest('li').index();
                if(!$('.mobile_stages_slider_nav').hasClass('is_open')){
                    $('.mobile_stages_slider_nav').addClass('is_open');
                    return false;
                }else{
                    if($(this).closest('li').hasClass('active')){
                        $('.mobile_stages_slider_nav').removeClass('is_open');
                        return false;
                    }
                }
                $('.mobile_stages_slider_nav').removeClass('is_open');
                $('.mobile_stages_slider_nav').find('.active').removeClass('active');
                $('.mobile_stages_slider_nav li').eq(index).addClass('active');

                $('html, body').animate({
                    scrollTop: $('#mobile_stage').offset().top - $('#header').height()
                }, 360);
                return false;
            });
        }
        $(document).on('click', '.lightbox_btn, .video-gallery, .show_gallery', function (e) {
            if($(this).hasClass('go-to')){
                return true;
            }
            var $lightbox = $($(this).attr('href'));
            if($lightbox.length>0){
                    if (!$lightbox.hasClass('lightbox_visible')) {
                    var src = $(this).attr('data-id');
                    if(src){
                        if($(this).hasClass('view_video')){
                            $('#video_palyer').attr('src', src);
                            var vid = document.getElementById('video_palyer');
                            vid.play();
                            $('html').addClass('video_playing');
                        }else if($(this).hasClass('view_gallery')){
                            // Show and init gallery slider
                            gallery_slider(src);
                        }else{
                            $lightbox.find('iframe').attr('src', src);
                        }
                    }
                    $('.lightbox_visible').removeClass('lightbox_visible');
                    $lightbox.addClass('lightbox_visible');
                    $('html').addClass('has_lightbox_visible');
                }
                return false;
            }

        });
        $('.lightbox_close').click(function () {
            $('.lightbox_visible').removeClass('lightbox_visible');
            $('.has_lightbox_visible').removeClass('has_lightbox_visible');
            if($('html').hasClass('video_playing')){
                $('html').removeClass('video_playing');
                var vid = document.getElementById('video_palyer');
                vid.pause();
            }
            if($('#gallery_slider_slick').hasClass('slick-initialized')){
                $('#gallery_slider_slick').slick('unslick');
                $('#gallery_slider_slick').html('');
            }

            return false;
        });
        /* Light box end */
        
        /* Back to top */
       
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
                    items: 2
                },
                767: {
                    items: 3
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
                            ul_index = $(this).closest('ul').index(),
                            index = parseInt($(this).attr('data-index'));
                        //index = $this.index();
                        if(ul_index>0){
                            index+=$('.our_team_list_ul ul').eq(0).find('li').length;
                        }
                        if (!$this.hasClass('active')) {
                            $('.our_team_list_ul .active').removeClass('active');
                            $this.addClass('active');
                            slider.flexAnimate(index);
                        }
                    });
                }else{
                    $('.our_team_list_ul ul li').click(function () {
                        if($(this).hasClass('active')) {
                            $(this).removeClass('active').find('.text').slideUp(300);
                        } else {
                            $('.our_team_list_ul .active').removeClass('active').find('.text').slideUp(300);
                            $(this).addClass('active');
                            var $self = $(this);
                            $(this).find('.text').slideDown(300, function(){
                                $('body, html').animate( { scrollTop: $self.offset().top - $('#header').height()-15 }, 360);
                            });
                        }
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
            if($dest.length>0){
                $('.tab.tab-active').removeClass('tab-active');
                $dest.addClass('tab-active');
                var h = 0;
                if($('#header').length>0){
                    h = $('#header').height();
                }
                var scrollTo =  $dest.offset().top - h;
                $('html, body').animate({scrollTop: scrollTo})
            }
        }
        $('.screen_btns .sync-item').click(function(){
            var dest = $(this).attr('href');
            var $dest = $(dest);
            changeTab($dest);
            window.location.hash = dest;
            if(dest == '#news'){
                $('body').addClass('show_cats');
            }else{
                $('body').removeClass('show_cats');
            }
            var index = $(this).closest('.animate_up').index();
            $('.screen_btns .active').removeClass('active');
            $header_menu.find('.active').removeClass('active');
            $header_menu.find('li').eq(index).addClass('active');
            $(this).addClass('active');
            return false;
        });

        $('.sv_icons a').click(function(){
            var dest = $(this).attr('href');
            var $dest = $(dest);
            changeTab($dest);
            window.location.hash = dest;

            var index = $(this).closest('li').index();
            $('.sv_icons .active').removeClass('active');
            $header_menu.find('.active').removeClass('active');
            $header_menu.find('li').eq(index).addClass('active');
            $(this).closest('li').addClass('active');
            return false;
        });
        $header_menu.find('.sync-item').click(function(){
            var dest = $(this).attr('href');
            window.location.hash = dest;
            var $dest = $(dest);
            if(dest == '#news'){
                $('body').addClass('show_cats');
            }else{
                $('body').removeClass('show_cats');
            }
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
            $('.sv_icons .active').removeClass('active');
            $('.sv_icons a[href^="'+dest+'"]').closest('li').addClass('active');
            $(this).closest('li').addClass('active');
            changeTab($dest);
            return false;
        });
        
        if(hash){
            if(!$('body').hasClass('page-template-stages-page')) {
                changeTab($(hash));
                $('.screen_btns a[href^="' + hash + '"]').addClass('active');
                $('.sv_icons .active').removeClass('active');
                $('.sv_icons a[href^="' + hash + '"]').closest('li').addClass('active');
                $header_menu.find('.active').removeClass('active');
                $header_menu.find('a[href^="' + hash + '"]').closest('li').addClass('active');
                hash = hash.replace('#', '');
                if(hash == 'news'){
                    $('body').addClass('show_cats');
                }else{
                    $('body').removeClass('show_cats');
                }
            }

        }else{
            if($('body').hasClass('page-template-media-center-page')){
                $('.screen_btns .animate_up').eq(0).find('a').addClass('active');
                $('#header-menu').find('li').eq(0).addClass('active');
                $('body').addClass('show_cats');
            }
            if($('body').hasClass('page-template-services-page')
                || $('body').hasClass('page-template-marine-page')
                || $('body').hasClass('page-template-prod-offices-page')
                || $('body').hasClass('page-template-partner-directory')){
                $('.screen_btns .animate_up').eq(0).find('a').addClass('active');
                $('#header-menu').find('li').eq(0).addClass('active');
            }
        }
        if($('.tabs.tab-active').length>0){
            var href = $('.tabs.tab-active').attr('id');
        }

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

        // Workshop slider
        var $workshops_slider = $('#workshops_slider .flexslider');
        if($workshops_slider.length>0){
            function changeTabW(){
                $('.tab.tab_tile').removeClass('tab-active');
                $('.tab.tab_slider').addClass('tab-active');
            }
            var work_shops_slider = $workshops_slider.flexslider({
                animation: 'slide',
                slideshow: false,
                slideshowSpeed: 8000,
                animationSpeed: 800,
                touch: false,
                smoothHeight: true,
                start: function ($slider){
                    var $header_menu = $('#header-menu');
                    var hash = window.location.hash;
                    if(hash){
                        var index = $(hash).index();
                        changeTabW();
                        $slider.flexAnimate(index);
                    }
                    $('.screen_btns .workshop_btn').click(function(){
                        changeTabW();
                        var index = $(this).closest('.animate_up').index();
                        $slider.flexAnimate(index);
                        return false;
                    });

                    $header_menu.find('a').click(function(){
                        changeTabW();
                        var index = $(this).closest('li').index();
                        if($(window).width()<1025){
                            if(!$header_menu.hasClass('is_open')){
                                $header_menu.addClass('is_open');
                                return false;
                            }else{
                                if($(this).closest('li').hasClass('active')){
                                    $header_menu.closest('li').removeClass('is_open');
                                    return false;
                                }
                            }
                        }
                        $slider.flexAnimate(index);
                        return false;
                    });

                    $('#workshop_four_tile .work_shops_tile').click(function(){
                        changeTabW();
                        var index = $(this).index();
                        window.location.hash = "#"+$(this).attr('id');
                        $('#header-menu').find('.active').removeClass('active');
                        $('#header-menu').find('li').eq(index).addClass('active');
                        $('.screen_btns').find('.active').removeClass('active');
                        $('.screen_btns').find('.animate_up').eq(index).find('a').addClass('active');
                        $slider.flexAnimate(index);
                        return false;
                    });
                },
                before: function ($slider) {
                    var index = $slider.animatingTo;

                    $('.screen_btns').find('.active').removeClass('active');
                    $('.screen_btns .animate_up').eq(index).find('a').addClass('active');

                    $header_menu.find('.active').removeClass('active');
                    $header_menu.find('li').eq(index).addClass('active');

                    $('html, body').scrollTop($('.tabs').offset().top-$('#header').height());
                }
            });
            $('#work_shops_close').click(function(){
                $('.tab.tab_tile').addClass('tab-active');
                $('.tab.tab_slider').removeClass('tab-active');
                $header_menu.find('.active').removeClass('active');
                $('.screen_btns').find('.active').removeClass('active');
                window.location.hash = '';
                $('html, body').scrollTop($('.first-screen').height() - $('#header').addClass('white-header').height());
                // $('html, body').animate({
                //     scrollTop: $('.first-screen').height() - $('#header').addClass('white-header').height()
                // }, 360);
                return false;
            })
        }


        /* Backlots slider */
        $('.stage_detail_slider .flexslider ul').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true
        });

        // Contact form
        var $contact_form;
        if ($(window).width() <= 1024) {
            $contact_form = $('#contact_form_2');
        } else {
            $contact_form = $('#contact_form');
        }
        $(document).on('click', '.error input', function () {
            $(this).closest('.field').removeClass('error');
        });
        if ($contact_form.length > 0) {
            function get_cookie(cookie_name) {
                var results = document.cookie.match('(^|;) ?' + cookie_name + '=([^;]*)(;|$)');

                if (results)
                    return ( unescape(results[2]) );
                else
                    return null;
            }
            function isValidEmailAddress(emailAddress) {
                var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
                return pattern.test(emailAddress);
            }
            $('.thank-you .close').click(function () {
                $('.thank-you').hide();
                $contact_form.find('.field input, .field textarea').val('');
                $contact_form.find('.placeholder').show();
                return false;
            });
            $contact_form.submit(function (e) {
                /* Validate form */
                var self = $(this);
                var name = self.find('input.name').val().trim();
                var email = self.find('input.email').val().trim();
                var valid = true;
                if (name.length == 0) {
                    self.find('input.name').closest('.field').addClass('error');
                    valid = false;
                }
                if (email.length == 0 || !isValidEmailAddress(email)) {
                    self.find('.email').closest('.field').addClass('error');
                    valid = false;
                }

                var data = $(this).serialize();

                var url = $(this).attr('action');
                var lastI = window.location.href.lastIndexOf('/');
                url = window.location.href.substr(0, lastI) + '/' + url;


                if (!valid) {
                    return false;
                } else {
                    /* Check captcha */
                    var cookie = get_cookie('captcha');
                    var response = doAjax(routes.contact, {
                        validation: $contact_form.find('.field_captcha input').val()
                    });
                    response.success(function(cookie_valid){

                        if(cookie_valid.status == 1){
                            $contact_form.addClass('wait');
                            var send_response = doAjax(routes.mailto, data);

                            send_response.success(function(res){

                            });
                            $('.thank-you').show();
                            $(self).removeClass('wait');
                            // setTimeout(function(){
                            //     window.location.reload();
                            // }, 4000);
                            send_response.error(function(e){

                            });
                            send_response.complete(function(e){

                            });
                        }else{
                            $contact_form.find('.field_captcha').addClass('error');
                        }
                    });
                }
                return false;
            });

            $('.contact_form :input').keyup(function () {
                if (!$(this).val()) {
                    $(this).siblings('label').show();
                } else {
                    $(this).siblings('label').hide();
                }
            });
        }

        $('.job .title').click(function () {
            var $job = $(this).parent('.job');
            if (!$job.hasClass('job_open')) {
                $('.job_open').removeClass('job_open').find('.desc').slideUp();
                $job.addClass('job_open').find('.desc').slideDown();
            } else {
                $job.removeClass('job_open').find('.desc').slideUp();
            }

            return false;
        });

        /* Job filter */
        var $job_list = $('#job_list');
        $('.filter_location li').click(function(e){
            var target = $(this).attr('data-location');
            $('.filter_location .active').removeClass('active');
            var title = $(this).addClass('active').html();

            $(this).closest('.span').find('.current').html(title);
            $(this).closest('.span').find('.current').attr('data-current', target);

            var other_filter_val = $('.filter_title_wrapper .current').attr('data-current');

            $job_list.find('.job').hide();
            if(other_filter_val!= "0"){
                $job_list.find('.job[data-location=' + target + '][data-title='+other_filter_val+']').show();
            }else{
                $job_list.find('.job[data-location=' + target + ']').show();
            }
            if($('.filter_location').hasClass('open')){
                $('.filter_location').removeClass('open');
            }
            e.preventDefault();
            return false;
        });
        if($(window).width()<1025){
            $('.filter_box .span').click(function(){
                $(this).find('ul').addClass('open');
            })
        }
        $('.filter_title li').click(function(e){

            var target = $(this).attr('data-title');
            var title = $(this).addClass('active').html();

            $(this).closest('.span').find('.current').html(title);
            $(this).closest('.span').find('.current').attr('data-current', target);

            var other_filter_val = $('.filter_location_wrapper .current').attr('data-current');

            $job_list.find('.job').hide();
            if(other_filter_val!= "0"){
                $job_list.find('.job[data-title=' + target + '][data-location='+other_filter_val+']').show();
            }else{
                $job_list.find('.job[data-title=' + target + ']').show();
            }
            if($('.filter_title').hasClass('open')){

                $('.filter_title').removeClass('open');
            }
            e.preventDefault();
            return false;
        });
        $('.filter_reset').click(function(){
            $job_list.find('.job').show();
            $('.filter_location_wrapper .current').html($('.filter_location_wrapper .current').attr('data-default'));
            $('.filter_title_wrapper .current').html($('.filter_title_wrapper .current').attr('data-default'));
            $('.filter_location_wrapper .current').attr('data-current', 0);
            $('.filter_title_wrapper .current').attr('data-current', 0);
            return false;
        });
        
        // Apply filter
        $('.apply_close').click(function () {
            $('.white_overlay').hide();
            $('.apply_wrapper').fadeOut();

            return false;
        });
        if($("input[type=file].nice").length>0){
            $("input[type=file].nice").nicefileinput({
                label: $("input[type=file].nice").attr('data-title')
            });
        }


        $('.apply_btn').click(function () {
            $('.white_overlay').show();
            $("#thank-you-interest").hide();
            $($(this).attr('href')).fadeIn();
            var title = $(this).closest('.job').attr('data-title');
            var email = $(this).closest('.job').attr('data-apply');

            $('#job_title').val(title);
            $('#apply_email').val(email);
            return false;
        });

        var $apply_form = $('#apply_form');
        if($apply_form.length>0){
            $apply_form.find('.required input').change(function(){
                $(this).closest('.required').removeClass('error');
            });

            $apply_form.submit(function(){
                var is_valid = true;
                $(this).find('.require').each(function(){
                    if($(this).find('input').val() == ''){
                        $(this).addClass('error');
                        is_valid = false;
                    }
                });
                if(is_valid){
                    var data = new FormData($(this)[0]);
                    var size = document.getElementById('file');
                    if(size.files[0]){
                        size = size.files[0].size;
                        if(size>8388608){
                            $('.fileinput').addClass('error');
                            return false;
                        }
                    }
                    $apply_form.addClass('wait');
                    $.ajax( flow.api_base + routes.apply.route,{
                        contentType: false,
                        processData: false,
                        data: data,
                        type: 'POST',
                        success: function(res){
                            if(res.status == '1'){
                                $('.white_overlay').hide();
                                $('.apply_wrapper').fadeOut();
                                $apply_form[0].reset();
                                $apply_form.removeClass('wait');
                                $('.thank-you-interest').show();

                            }
                            if(res.status == '-1'){
                                $("#apply_form").removeClass('wait');
                                var $old_c = $('.apply_form_item.field_captcha img');
                                var src = $old_c.attr('src');
                                $old_c.remove();
                                $('.apply_form_item.field_captcha').addClass('error');
                                $('.apply_form_item.field_captcha').append('<img src="'+src+'" class="reload_image">');
                            }
                        },
                        error: function(e){

                        }
                    });
                     setTimeout(function(){
                         $apply_form[0].reset();
                         $("#apply_form").removeClass('wait');
                         $('.thank-you-interest').show();
                     }, 2000);
                }
                return false;
            })
        }
        $('.page-template-templatesit-services-php, .page-template-services-page').find('.landing_grids_inner a.r_f').click(function(){
            return false;
        });
        /// Load more
        $('#mobile_sub-cat').change(function(){
            var cat = $( "#mobile_sub-cat option:selected" ).val();
            $('.news-category-list .active').removeClass('active');
            $(this).closest('li').addClass('active');
            $('#news_category').val(cat);
            var per_page = 6;
            $('#more_news').show();
            var response = doAjax(routes.news, {
                'news_per_page': per_page,
                'cat': cat,
				'lng': $('#current_language').val()
            });
            $('.load_more').addClass('wait');
            response.success(function(data){
                //hide wheel
                var template = _.template($('#news-item').html());
                var result_html = template({news: data.news});
                $('#news_container').find('.news_item').remove();
                $('#news_container').append(result_html);
                $('.load_more').removeClass('wait');
                console.log($('.news_item').length);
                console.log(parseInt(data.available));
                if(parseInt(data.available) <= $('.news_item').length){
                    $('#more_news').hide();
                }else{
                    $('#news_count').val(parseInt($('#news_count').val())+data.news.length);
                }
            })
            return false;
        });
        $('.news-category-list a:not(:last)').click(function(){
            var cat = $(this).attr('data-slug');
            $('.news-category-list .active').removeClass('active');
            $(this).closest('li').addClass('active');
            $('#news_category').val(cat);
            var per_page = 6;
            $('#more_news').show();
            var response = doAjax(routes.news, {
                'news_per_page': per_page,
                'cat': cat,
				'lng': $('#current_language').val()
            });
            $('.load_more').addClass('wait');
            response.success(function(data){
                //hide wheel
                var template = _.template($('#news-item').html());
                var result_html = template({news: data.news});
                $('#news_container').find('.news_item').remove();
                $('#news_container').append(result_html);
                $('.load_more').removeClass('wait');

                if(parseInt(data.available) <= $('.news_item').length){
                    $('#more_news').hide();
                }else{
                    $('#news_count').val(parseInt($('#news_count').val())+data.news.length);
                }
            })
            return false;
        });
        $('#more_news').click(function(){

            var per_page = $('#news_per_page').val();
            var news_count = $('.news_item').length;
            var cat = $('#news_category').val();
            $('#more_news').show();
            var response = doAjax(routes.news, {
                'news_count': news_count,
                'news_per_page': per_page,
                'cat': cat,
				'lng': $('#current_language').val()
            });
            $('.load_more').addClass('wait');
            response.success(function(data){
                //hide wheel
                var template = _.template($('#news-item').html());
                var result_html = template({news: data.news});
                
                $('#news_container').append(result_html);
                $('.load_more').removeClass('wait');
                if(parseInt(data.available) <= $('.news_item').length){
                    $('#more_news').hide();
                }else{
                    $('#news_count').val(parseInt($('#news_count').val())+data.news.length);
                }
            })
            return false;
        });
        // More video
        $('#more_video').click(function(){
            var per_page = $('#video_per_page').val();
            var videos_count = $('#videos_count').val();
            var response = doAjax(routes.videos, {
                'videos_count': videos_count,
                'videos_per_page': per_page
            });
            $('.load_more').addClass('wait');
            response.success(function(data){
                //hide wheel
                if(parseInt(data.available) == 0){
                    $('#more_video').hide();
                }else{
                    $('#videos_count').val(parseInt($('#videos_count').val())+data.videos.length);
                }
                var template = _.template($('#video-item').html());
                var result_html = template({videos: data.videos});

                $('#video_container').append(result_html);
                $('.load_more').removeClass('wait');
            })
            return false;
        });
        // More gallery
        $('#more_gallery').click(function(){
            var gallery_per_page = $('#gallery_per_page').val();
            var gallery_count = $('#gallery_count').val();
            var response = doAjax(routes.gallery, {
                'gallery_count': gallery_count,
                'gallery_per_page': gallery_per_page
            });
            $('.load_more').addClass('wait');
            response.success(function(data){
                //hide wheel
                if(parseInt(data.available) == 0){
                    $('#more_gallery').hide();
                }else{
                    $('#gallery_count').val(parseInt($('#gallery_count').val())+data.gallery.length);
                }
                var template = _.template($('#gallery-item').html());
                var result_html = template({galleries: data.gallery});

                $('#gallery_container').append(result_html);
                $('.load_more').removeClass('wait');
            })
            return false;
        });


        $('.menu_btn').click(function () {
            $('body').addClass('main_nav_visible');
            $('html').toggleClass('menu_is_open');
            // $('.main_nav').fadeIn();
            return false;
        });
        $('.main_nav_close').click(function () {
            $('body').removeClass('main_nav_visible');
            $('html').toggleClass('menu_is_open');
            // $('.main_nav').fadeOut();
            return false;
        });


        // Menu scrips

        $('.main_nav_list .menu-item-has-children>a').after('<button class="menu-expand"></button>');

        $('.middle, .right').find('.sub-menu a').each(function(){

            var icon = $(this).attr('title');
            var text = $(this).html();
            var new_text = '<span class="'+icon+'"></span>'+text;
            $(this).html(new_text);
            if($(this).attr('href') == '#'+hash){
                $(this).closest('li').addClass('current_page_item');
                $(this).closest('.menu').find('.menu-item-has-children').removeClass('current_page_item');
            }
            $(this).attr('title', '');
        });
        $('.menu a').click(function(){
             var $redirect_link = $(this).closest('.menu').find('.hash-redirect');
             if($redirect_link.length>0){
                 var link_url = $redirect_link.find('>a').attr('href');
                 var escaped_url = window.location.href.replace(window.location.hash?window.location.hash:'', '');
                 var hash =  $(this).attr('href');
                 if(link_url == escaped_url){
                     $('.main_nav_close').trigger('click');
                     changeTab($(hash));
                     $('.screen_btns a[href^="' + hash + '"]').addClass('active');
                     $('.sv_icons .active').removeClass('active');
                     $('.sv_icons a[href^="' + hash + '"]').closest('li').addClass('active');
                     $header_menu.find('.active').removeClass('active');
                     $header_menu.find('a[href^="' + hash + '"]').closest('li').addClass('active');
                     hash = hash.replace('#', '');
                     if(hash == 'news'){
                         $('body').addClass('show_cats');
                     }else{
                         $('body').removeClass('show_cats');
                     }
                     $(this).closest('.sub-menu').find('.current_page_item').removeClass('current_page_item');
                     $(this).closest('li').addClass('current_page_item');
                     return false;
                 }else{
                     window.location = $redirect_link.find('>a').attr('href') + $(this).attr('href');
                     $('.main_nav_close').trigger('click');
                 }
             }
        });
        // $('.menu li a').click(function(){
        //     if($(this).closest('li').find('.sub-menu').length>0){
        //         var $li = $(this).closest('li');
        //         var $submenu = $li.find('.sub-menu');
        //         if($li.hasClass('open')){
        //             $li.removeClass('open');
        //             $submenu.slideUp(200);
        //         }else{
        //             $('.main_nav_list .open .sub-menu').slideUp();
        //             $('.main_nav_list .open').removeClass('open');
        //             $li.addClass('open');
        //             $submenu.slideDown(200);
        //             return false;
        //         }
        //     }
        // });
        $(document).on('click', '.menu-expand', function(e){
            e.stopPropagation();
            if($('body').hasClass('page-template-home-page') && e.originalEvent && $(window).width()<=1024){
                var $li = $(this).closest('li');
                var $submenu = $li.find('.sub-menu');
                if($li.hasClass('open')){
                    $li.removeClass('open');
                    $submenu.slideUp(200);
                }else{
                    $('.main_nav_list .open .sub-menu').slideUp();
                    $('.main_nav_list .open').removeClass('open');
                    $li.addClass('open');
                    $submenu.slideDown(200);
                }
            }else{
                var $li = $(this).closest('li');
                var $submenu = $li.find('.sub-menu');
                if($li.hasClass('open')){
                    $li.removeClass('open');
                    $submenu.slideUp(200);
                }else{
                    $('.main_nav_list .open .sub-menu').slideUp();
                    $('.main_nav_list .open').removeClass('open');
                    $li.addClass('open');
                    $submenu.slideDown(200);
                }
            }
            return false;
        });
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
        if($(window).width<1024) {
            scrollScreen();
        }else{

        }
    });

    $(window).scroll(function (e) {
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
