(function($){




    $(window).load(function(){
        if($(window).width()<1025){

            prepareMobileStage();
        }else{
            resetMobile();
        }
        var $body = $('body'),
            $stage_nav_container = $('.stage_nav_container');
        var hash = window.location.hash;
        if(hash){
            if($('body').hasClass('page-template-stages-page')){
                if($('.screen_slide[data-hash="'+hash.replace('#', '')+'"]').length>0){
                    var index = $('.screen_slide[data-hash="'+hash.replace('#', '')+'"]').attr('data-id');

                    if($(window).width()<1025){
                        $('.mobile_stages_slider_nav').removeClass('is_open');
                        $('.mobile_stages_slider_nav').find('.active').removeClass('active');
                        $('.mobile_stages_slider_nav li').eq(index-1).addClass('active');
                        $('#mobile_stage').find('ul').slick('slickGoTo', index-1);
                        $('.stage_screen_btns .active').removeClass('active');
                        $('.stage_screen_btns a[data-hash="'+hash.replace('#', '')+'"').closest('.animate_up').addClass('active');
                        $('html, body').animate({
                            scrollTop: $('#mobile_stage').offset().top - $('#header').height()
                        }, 360);
                    }else{
                        animate(index);
                    }
                }

            }
        }else{
            if($('body').hasClass('page-template-stages-page')){
                if($(window).width()<1025){
                    $('.mobile_stages_slider_nav li').eq(0).addClass('active');
                    $('.stage_screen_btns .animate_up').eq(0).addClass('active');
                }
            }
        }


        $('.stage_list_slider .flexslider').flexslider({
            animation: 'slide',
            slideshow: false,
            slideshowSpeed: 5000,
            animationSpeed: 1,
            start: function (slider) {
                var timer;

                $('.stage_item_trigger').hover(function(){
                    var $slider_box = $(this).closest('.screen_slide').attr('data-slider');
                    $slider_box = $($slider_box);
                    clearTimeout(timer);
                    $slider_box.stop().css({opacity: 1}).css({marginLeft: 0});
                    if ($.isFunction(slider.flexAnimate)) {
                        var index = $(this).index();
                        slider.flexAnimate(index);
                    }
                }, function(){

                    var self = $(this);
                    timer = setTimeout(function () {
                        var $slider_box = $(self).closest('.screen_slide').attr('data-slider');
                        $slider_box = $($slider_box);
                        $slider_box.stop().css({opacity: 0}).css({marginLeft: '-9999px'});
                    }, 100);
                });
            }
        });



        animate_home_screen(1);
        $('.stage_screen_btns_wrapper a, .stage_screen_btns a').click(function () {
            if($('body').hasClass('look')){
                return false;
            }
            var $span = $(this).parent('span'),
                index = $span.index() + 1;
           if($('body').hasClass('single-stage')){
               return true;
           }

            if (!$span.hasClass('active')) {
                animate(index);
                $('.stage_screen_btns').find('.active').removeClass('active');
                $('.stage_screen_btns').find('span').eq(index-1).addClass('active');
                $(this).closest('.animate_up').addClass('active');
                $(this).closest('span').addClass('active');

            }

            $('.mobile_stages_slider_nav').find('.active').removeClass('active');
            $('.mobile_stages_slider_nav li').eq(index-1).addClass('active');
            if($(window).width()<1025){
                $('#mobile_stage').find('ul').slick('slickGoTo', index-1);
                $('html, body').animate({
                    scrollTop: $('#mobile_stage').offset().top - $('#header').height()
                }, 360);
            }
            return false;
        });

        $('.stage_nav_a').click(function () {
            var $li = $(this).parent('li'),
                index = $li.index() + 1;
            if (!$li.hasClass('active')) {
                animate(index);
            }

            return false;
        });
        function animate_home_screen(delay) {
            $('.slide_bg').addClass('slide_bg_ed');

            if (1 == delay) {
                setTimeout(function () {
                    //首屏文字动画
                    $('.home_screen .animate_up').each(function (index) {
                        var $this = $(this);
                        setTimeout(function () {
                            $this.addClass('animate_uped');
                        }, ($('.home_screen').hasClass('stages_home_screen') ? 200 : 600) * index);
                    });

                    setTimeout(function () {
                        $('.slide_animating').removeClass('slide_animating');
                    }, 1500);
                }, 500);
            } else {
                //首屏文字动画
                $('.home_screen .animate_up').each(function (index) {
                    var $this = $(this);
                    setTimeout(function () {
                        $this.addClass('animate_uped');
                    }, ($('.home_screen').hasClass('stages_home_screen') ? 200 : 600) * index);
                });

                setTimeout(function () {
                    $('.slide_animating').removeClass('slide_animating');
                }, 1500);
            }
            //首屏按钮动画
            setTimeout(function () {
                $('.all_view_wrapper').addClass('all_view_wrapper_fadeIn');
            }, 600 * $('.home_screen .animate_up').size());

            $('.next_screen').addClass('next_screen_ed');
        }

        function animate(current_index) {
            if (!$('.slide_animating').length && !$('.screen_slide_animating').length && !$body.hasClass('footer_animating') && !$('.lightbox_visible').length) {
                $('body').addClass('look');
                setTimeout(function(){
                    $('body').removeClass('look');
                }, 2000);
                if (0 == current_index) {
                    $('.nav_container').removeClass('nav_container_visible');
                } else {
                    $('.nav_container').addClass('nav_container_visible');
                }

                if (0 == current_index) {
                    setTimeout(function () {
                        $('.scroll.animate_fade').removeClass('animate_faded');
                    }, 500);


                    setTimeout(function () {
                        animate_home_screen();
                    }, $('.home_screen').hasClass('stages_home_screen') ? 500 : 100);

                    $('body').addClass('home_screen_visible').removeClass('home_screen_invisible');
                } else {
                    setTimeout(function () {
                        $('.scroll.animate_fade').addClass('animate_faded').scrollTop(0);
                    }, 800);


                    setTimeout(function () {
                        $('body').addClass('home_screen_invisible').removeClass('home_screen_visible');
                    }, 1000);
                }

                $('.stage_screen_btns_wrapper span.active').removeClass('active');
                $('.stage_screen_btns_wrapper span').eq(current_index - 1).addClass('active');

                $('body').attr({id: 'screen_visible_' + current_index});

                if (!$stage_nav_container.find('ul.dot_ul li').eq(current_index - 1).hasClass('active')) {
                    $stage_nav_container.find('.active').removeClass('active');
                    $stage_nav_container.find('ul.dot_ul li').eq(current_index - 1).addClass('active');
                    $stage_nav_container.find('ul.text_ul li').eq(current_index - 1).addClass('active');

                    //$('.stage_nav_line_hidden').removeClass('stage_nav_line_hidden');
                    //$stage_nav_container.find('.active').prevAll('li').addClass('stage_nav_line_hidden');
                    //$('.stage_nav_line_hidden').last().removeClass('stage_nav_line_hidden');
                }

                $stage_nav_container.attr({id: 'stage_nav_container_' + current_index});

                if (0 != current_index) {
                    $('.home_screen .animate_up').removeClass('animate_uped');
                    $('.all_view_wrapper').removeClass('all_view_wrapper_fadeIn');

                    if (!$('.next_screen').hasClass('next_screen_footer')) {
                        $('.next_screen').removeClass('next_screen_ed');
                    }

                    setTimeout(function () {
                        $('.slide_bg').removeClass('slide_bg_ed');
                    }, 1500);
                }

                var $slide = $('.slide').eq(current_index),
                    $screen_slide = $('.screen_slide').eq(current_index),
                    $slide_active = $('.slide_active'),
                    $screen_slide_active = $('.screen_slide_active');

                $screen_slide_active.addClass('slide_start');

                $slide.addClass('slide_animating');
                $screen_slide.addClass('screen_slide_animating');

                $slide.find('.big_pic').addClass('big_pic_ed');
                setTimeout(function () {
                    $slide.find('.side_pic').addClass('side_pic_ed');
                    $screen_slide.find('.side_pic').addClass('side_pic_ed');
                }, 200);

                setTimeout(function () {
                    $screen_slide_active.find('.animate_up').each(function (index) {
                        var $this = $(this);
                        setTimeout(function () {
                            $this.removeClass('animate_uped');
                        }, 150 * index);
                    });
                }, 0);

                setTimeout(function () {
                    $screen_slide.find('.animate_up').each(function (index) {
                        var $this = $(this);
                        setTimeout(function () {
                            $this.addClass('animate_uped');
                        }, 300 * index);
                    });
                }, 800);

                setTimeout(function () {
                    if (current_index > $('.screen_slide').index($('.screen_slide_active'))) {
                        $screen_slide_active.find('.screen').addClass('screen_ed_down');
                    } else {
                        $screen_slide_active.find('.screen').removeClass('screen_ed');
                    }
                    var hash = $screen_slide.attr('data-hash');
                    window.location.hash = hash;
                    $screen_slide.find('.screen').removeClass('screen_ed_down').addClass('screen_ed');

                }, 300);

                $screen_slide_active.find('.side_pic').removeClass('side_pic_ed');

                setTimeout(function () {
                    $screen_slide.find('.screen_tile').addClass('screen_tile_ed');
                }, 900);

                setTimeout(function () {
                    $slide_active.find('.big_pic').removeClass('big_pic_ed');

                    $slide_active.find('.side_pic').removeClass('side_pic_ed');


                    //$('.slide_active').find('.animate_uped').removeClass('animate_uped');

                    $slide_active.removeClass('slide_active');

                    $slide.removeClass('slide_animating').addClass('slide_active');

                    $('.slide_active').prevAll('.slide').find('.big_pic').removeClass('up').addClass('down');

                    $('.slide_active').nextAll('.slide').find('.big_pic').removeClass('down').addClass('up');


                    update_nav_container();
                }, 1100);

                setTimeout(function () {
                    $screen_slide_active.removeClass('slide_start');

                    $screen_slide_active.removeClass('screen_slide_active');
                    $screen_slide.removeClass('screen_slide_animating').addClass('screen_slide_active');

                    $('.screen_slide_active').prevAll('.screen_slide').find('.screen').removeClass('screen_ed').addClass('screen_ed_down');

                    $('.screen_slide_active').nextAll('.screen_slide').find('.screen').removeClass('screen_ed_down').removeClass('screen_ed');

                    $('.screen_slide_active').siblings('.screen_slide').find('.screen_tile').removeClass('screen_tile_ed');
                }, 2000);
            }
        }

        function update_nav_container() {
            var index = $('.slide').index($('.slide_active'));
            if (!$('.nav_container ul li').eq(index).hasClass('active')) {
                $('.nav_container').find('.active').removeClass('active');
                $('.nav_container ul li').eq(index).addClass('active');
            }
        }

        function update_mobile_nav_container() {
            if($(window).width()<=1024){
                var index = $('.wrapper').data('swipe-index');
                if (0 == index || index == $('.slide').size()) {
                    $('.nav_container').removeClass('mobile_nav_container_visible');
                } else {
                    $('.nav_container').addClass('mobile_nav_container_visible');
                }

                if (!$('.nav_container ul li').eq(index).hasClass('active')) {
                    $('.nav_container').find('.active').removeClass('active');
                    $('.nav_container ul li').eq(index).addClass('active');
                }
            }
        }

        $('.logo.animate_left').addClass('animate_lefted');

        $('.fl_btn_box.animate_left').addClass('animate_lefted');

        $('.round_nav.rn_animate_fade').addClass('rn_animate_faded');

        $('.animate_right').addClass('animate_righted');

        $('.social_btns .animate_left').each(function (index) {
            var $this = $(this);
            setTimeout(function () {
                $this.addClass('animate_lefted');
            }, 300 * ($('.social_btns .animate_left').size() - index));
        });

        $('.nav_container a').click(function () {
            var $li = $(this).parent('li'),
                $nav_container = $li.parents('.nav_container'),
                index = $li.index();
            if (!$li.hasClass('active')) {
                $nav_container.find('.active').removeClass('active');
                $li.addClass('active');
                animate(index);
            }

            return false;
        });

        $('.mobile_nav_container a').bind('click touchstart', function () {
            var $li = $(this).parent('li'),
                $mobile_nav_container = $li.parents('.mobile_nav_container'),
                index = $li.index() + 1;
            if (!$li.hasClass('active')) {
                $mobile_nav_container.find('.active').removeClass('active');
                $li.addClass('active');
                $wrapper.data({'swipe-index': Number(index) - 1});
                $wrapper.removeAttr('class');
                $wrapper.addClass('wrapper').addClass('wrapper_' + $wrapper.data('swipe-index'));
            }

            update_mobile_nav_container();
            return false;
        });

        $('.next_screen').click(function () {
            if ($(this).hasClass('next_screen_trigger')) {
                if (!$(this).parents('.full_screen').hasClass('sec_full_screen')) {
                    $('html, body').animate({
                        scrollTop: $(window).height()
                    }, 360);
                } else {
                    $('html, body').animate({
                        scrollTop: $(window).height() * 2
                    }, 360);
                }
            } else {
                animate(1);
            }

            return false;
        });

        $('.next_screen_footer').click(function () {
            if ($('body').hasClass('footer_visible')) {
                $('.back_top').trigger('click');
            } else {
                $body.addClass('footer_visible');
            }

            return false;
        });

        $body.bind('mousewheel', function (e){
            if($(window).width()>1024){
                var $slide_active = $('.slide_active');
                if ('-1' == e.deltaY) {
                    if ($slide_active.next('.slide').length) {
                        animate($('.slide_active').next('.slide').index());
                    } else {
                        if (!$('.slide_animating').length && !$('.screen_slide_animating').length && !$body.hasClass('footer_animating') && !$('.lightbox_visible').length) {
                            $body.addClass('footer_visible');

                            $('.nav_container').removeClass('nav_container_visible');
                        }
                    }
                } else if ('1' == e.deltaY) {
                    if ($body.hasClass('footer_visible')) {
                        $body.removeClass('footer_visible');

                        $body.addClass('footer_animating');
                        setTimeout(function () {
                            $body.removeClass('footer_animating');
                        }, 600);

                        $('.nav_container').addClass('nav_container_visible');

                        $slide_active.prevAll('.slide').find('.big_pic').removeClass('up').addClass('down');
                    } else {
                        if ($slide_active.prev('.slide').length) {
                            animate($('.slide_active').prev('.slide').index());

                        }
                    }
                }
            }
        });

        if($body.hasClass('home')){
            var $wrapper = $('.wrapper'),
                slide_count = $('.slide').size();
            $('.wrapper').data({'swipe-index': 0});
            $body.swipe({
                swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
                    if ($(event.target).hasClass('menu-expand') && $(window).width() <= 1024) {
                        $(event.target).trigger('click');
                    }
                    if (!$(event.target).hasClass('social_btns')) {
                        $('.social_btns_open').removeClass('social_btns_open');
                    }
                    // if($('body').hasClass('home') && $('.social_btns_open').length){
                    //     $('.social_btns_open').removeClass('social_btns_open');
                    // }
                    if ('up' == direction) {
                        var index = $wrapper.data('swipe-index');
                        if (index != slide_count) {
                            var index = $wrapper.data('swipe-index');
                            $wrapper.data({'swipe-index': Number(index) + 1});
                            $wrapper.removeAttr('class');
                            $wrapper.addClass('wrapper').addClass('wrapper_' + $wrapper.data('swipe-index'));

                            if (index == slide_count - 1) {
                                $body.addClass('mobile_footer_visible');
                            } else {
                                $body.removeClass('mobile_footer_visible');
                            }
                        }
                    }
                    if ('down' == direction) {
                        $body.removeClass('mobile_footer_visible');

                        var index = $wrapper.data('swipe-index');
                        if (0 != index) {
                            $wrapper.data({'swipe-index': Number(index) - 1});
                            $wrapper.removeAttr('class');
                            $wrapper.addClass('wrapper').addClass('wrapper_' + $wrapper.data('swipe-index'));
                        }
                    }

                    update_mobile_nav_container();
                },
                threshold: 0,
                //fingerReleaseThreshold: 200,
                preventDefaultEvents: $body.hasClass('stage_page') ? false : true
            });
        }

        $('.back_top').click(function () {

            if (!$body.hasClass('home') && !$body.hasClass('page-template-stages-page')) { // and not if stage page
                $('html, body').animate({
                    scrollTop: 0
                }, 600);

            } else {

                $body.removeClass('stages_header_bg');
                $body.removeClass('mobile_footer_visible');
                $('.wrapper').removeAttr('class').addClass('wrapper');
                $body.removeClass('footer_visible');
                $('.wrapper').data({'swipe-index': 0});
                setTimeout(function () {
                    $('.nav_container ul li').first().find('a').trigger('click');
                    animate(0);
                }, 100);
                //$('.nav_container ul li').first().find('a').trigger('click');
            }
            return false;
        });

        $('.home-screen-down').click(function () {
            $('.wrapper').removeAttr('class').addClass('wrapper');
            $body.removeClass('footer_visible');
            $('.wrapper').data({'swipe-index': 1});
            $('.wrapper').addClass('wrapper_1');
            setTimeout(function () {
                $('.nav_container ul li').first().find('a').trigger('click');
                animate(1);
            }, 100);
            return false;
        })
    });


    $(window).resize(function(){
        if($(window).width()<1025){
            prepareMobileStage()
        }else{
            resetMobile();
        }
    });
    function resetMobile() {
        var $mobile_stage = $('#mobile_stage');
        if($mobile_stage.length>0){
            if($mobile_stage.find('.slick').length>0){
                $mobile_stage.find('ul').slick('unslick');
            }
            $mobile_stage.find('ul').html('');
        }
    }
    function prepareMobileStage(){
        var $mobile_stage = $('#mobile_stage');
        if($mobile_stage.length>0){
            if($mobile_stage.find('.screen_slide ').length<=0){
                $('.screen_slide:not(.screen_slide_hidden)').each(function(){
                    $mobile_stage.find('ul').append('<li class="screen_slide ">'+$(this).html()+'</li>');
                });

                $mobile_stage.find('ul').slick({
                    dots:false,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 1,
                    adaptiveHeight: true,
                    arrows: false,
                });
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
                    $('#mobile_stage').find('ul').slick('slickGoTo', index);

                    $('.stage_screen_btns .active').removeClass('active');
                    $('.stage_screen_btns .animate_up').eq(index).addClass('active');
                    $('html, body').animate({
                        scrollTop: $('#mobile_stage').offset().top - $('#header').height()
                    }, 360);
                    return false;
                });
                $mobile_stage.find('ul').on('afterChange', function(slick, currentSlide){
                    var i = currentSlide.currentSlide;
                    $('.mobile_stages_slider_nav .active').removeClass('active');
                    $('.mobile_stages_slider_nav').find('li').eq(i).addClass('active');
                    $('.stage_screen_btns .active').removeClass('active');
                    $('.stage_screen_btns .animate_up').eq(i).addClass('active');
                })
            }
        }
        
    }

})(jQuery);