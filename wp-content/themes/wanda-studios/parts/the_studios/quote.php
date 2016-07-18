<?php
/**
 * Quote Section for Sity page
 */
$blockquote_background_image = get_field('blockquote_background_image');
$blockquote_mobile_background_image = get_field('blockquote_mobile_background_image');

$blockquote_list = get_field('blockquote_list');
if($blockquote_list):?>
    <div class="quote-section bg" style="background-image: url(<?php echo $blockquote_background_image['url']; ?>)">
        <div class="mobile_bg">
            <img src="<?php echo $blockquote_mobile_background_image['url']?:$blockquote_background_image['url']; ?>" alt="">
        </div>
        <script>
            (function($){
                $(document).ready(function(){
                    var $quote_slider  = $('#quote-slider ul');
                    $quote_slider.slick({
                        infinite: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false,
                        fade: true,

                        responsive:[
                            {
                                breakpoint: 1024,
                                settings: {
                                    adaptiveHeight: true,
                                }
                            }
                        ]
                    });
                    $('.slider_btns .slider_prev').click(function(){
                        $quote_slider.slick('slickPrev');
                        return false;
                    });
                    $('.slider_btns .slider_next').click(function(){
                        $quote_slider.slick('slickPrev');
                        return false;
                    });
                });
            })(jQuery);
        </script>
        <div class="quote-slider flexslider" id="quote-slider">
            <ul>
                <?php foreach ($blockquote_list as $key => $quote): ?>
                    <li <?php if($key%2 != 0){echo 'class="grey"';} ?>>
                        <div class="quote-content">
                            <div class="table">
                                <div class="td">
                                    <?php if($key%2 != 0): ?>
                                        <div class="quote_left"></div>
                                    <?php endif; ?>
                                    <blockquote>
                                        <?php echo $quote['blockquote_text']; ?>
                                        <cite>
                                    <span class="author">
                                        <?php echo $quote['author']; ?>
                                    </span>
                                    <span class="position">
                                        <?php echo $quote['position']; ?>
                                    </span>
                                        </cite>
                                    </blockquote>
                                    <div class="slider_btns">
                                        <a href="" class="icon-11 slider_prev"></a>
                                        <a href="" class="icon-9 slider_next"></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif;
