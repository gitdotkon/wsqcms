<?php
/**
 * Team slider for Studios Page
 */
$team_title = get_field('team_title');
$team_list  = get_field('team_list');
if($team_list):?>
    <div class="our_team">
        <div class="our_team_list">
            <div class="table">
                <div class="td">
                    <h2><?php echo $team_title; ?></h2>
                    <div class="our_team_list_ul">
                        <?php
                            $team_parts = array_chunk($team_list, count($team_list)/2);
                            foreach ($team_parts as $key1=>$part):?>
                                <ul>
                                    <?php foreach ($part as $key=>$item): ?>
                                        <li <?php if(reset($part) == $item && $key1 == 0){echo 'class="active"';} ?> data-index="<?php echo $key; ?>">
                                            <div class="name"><?php echo $item->post_title; ?></div>
                                            <div class="position">
                                                <?php echo get_field('position', $item->ID); ?>
                                            </div>
                                            <div class="text">
                                                <?php echo apply_filters('the_content', $item->post_content); ?>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                        <?php endforeach; ?>
<!--                        <ul>-->
<!--                            --><?php //foreach ($team_list as $key=>$item):
//                                $class='';
//                                if($key%2 == 0){
//                                    $class='clear';
//                                }else{
//                                    $class='short';
//                                }
//                                if(reset($team_list) == $item){
//                                    $class = 'active';
//                                }
//                                ?>
<!--                                <li class="--><?php //echo $class; ?><!--" data-index="--><?php //echo $key; ?><!--">-->
<!--                                    <div class="name">--><?php //echo $item->post_title; ?><!--</div>-->
<!--                                    <div class="position">-->
<!--                                        --><?php //echo get_field('position', $item->ID); ?>
<!--                                    </div>-->
<!--                                    <div class="text">-->
<!--                                        --><?php //echo apply_filters('the_content', $item->post_content); ?>
<!--                                    </div>-->
<!--                                </li>-->
<!--                            --><?php //endforeach; ?>
<!--                        </ul>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="team_detail">
            <div class="flexslider">
                <ul class="slides">
                    <?php foreach ($team_list as $item): ?>
                        <li>
                            <div class="table">
                                <div class="td">
                                    <div class="name"><?php echo $item->post_title; ?></div>
                                    <div class="position"><?php echo get_field('position', $item->ID); ?></div>
                                    <div class="text scrollbar-inner">
                                        <?php echo apply_filters('the_content', $item->post_content); ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

<?php endif;
