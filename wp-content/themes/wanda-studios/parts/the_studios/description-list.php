<?php
/**
 * Description list slider
 * @var $description
 */
if($description):?>
    <script>
        (function($){
            $(document).ready(function(){
                $('#description_list ul').slick({
                    dots: false,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    responsive:[
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            }
                        }
                    ]
                });
            });
        })(jQuery);
    </script>
    <div class="description-list" id="description_list">
        <ul>
            <?php foreach ($description as $item): ?>
                <li>
                    <?php if($item['icon']): ?>
                        <span class="<?php echo $item['icon']; ?>"></span>
                    <?php endif; ?>
                    <div class="text">
                        <?php echo apply_filters('the_content', $item['short_description']); ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif;
