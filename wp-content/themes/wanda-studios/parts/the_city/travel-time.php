<?php
/**
 * Travel time for City page
 */
$travel_desktop_background = get_field('travel_desktop_background');
$travel_tablet_background = get_field('travel_mobile_background')?:$travel_desktop_background;
$travel_mobile_background = get_field('travel_mobile_background')?:$travel_desktop_background;
$travel_title = get_field('travel_title');
$travel_list = get_field('travel_list');
if($travel_list):?>
    <style>
        @media only screen and (max-width: 1025px){
            .travel_times {
                background-image: url(<?php echo $travel_tablet_background['url']; ?>) !important;
                background-position: center 22%;
            }
        }
        @media only screen and (max-width: 640px){
            .travel_times {
                background-image: url(<?php echo $travel_mobile_background['url']; ?>) !important;
                background-position: center 22%;
            }
        }
    </style>
    <div class="travel_times fixed_full_bg" style="background-image: url(<?php echo $travel_desktop_background['url']; ?>);">
        <div class="text">
            <h2><?php echo $travel_title; ?></h2>
            <div class="travel_cols">
                <?php foreach ($travel_list as $travel): ?>
                    <div class="travel_col">
                        <h3><?php echo $travel['travel_title']; ?></h3>
                        <?php foreach ($travel['travel_items_list'] as $item): ?>
                            <div>
                                <?php echo $item['departure']; ?>
                                <span class="red_arr"></span>
                                <span class="b"><?php echo $item['destination']; ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif;
