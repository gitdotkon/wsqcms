<?php
/**
 * Services for IT Service
 */
$services_list = get_field('services_list');
if($services_list):?>
    <div class="four_grids">
        <div class="landing_grids">
            <div class="landing_grids_inner">
                <ul>
                    <?php foreach ($services_list as $service): ?>
                        <li>
                            <div class="img" style="background-image: url(<?php echo $service['background']['url']; ?>)"></div>
                            <a href="javascript:">
                                <div class="table">
                                    <div class="td">
                                        <h2>
                                            <?php echo $service['title']; ?>
                                        </h2>
                                        <div class="txt">
                                            <div class="txt_inner">
                                                <div class="txt_inner_box">
                                                    <div class="text">
                                                        <?php echo $service['subtitle']; ?>
                                                    </div>
                                                </div>
                                                <div class="txt_hover">
                                                    <div class="text">
                                                        <?php echo $service['subtitle']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
<?php endif;
