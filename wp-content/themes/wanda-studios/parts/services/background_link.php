<?php
/**
 * Background link for Services page
 * @var $data
 */
if($data && !empty($data['link_list'])):?>
    <div class="four_grids link_list">
        <div class="landing_grids">
            <div class="landing_grids_inner">
                <ul>
                    <?php foreach ($data['link_list'] as $item): ?>
                        <li <?php if($item['wide_link']){echo 'class="fw"';} ?>>
                            <div class="img" style="background-image: url(<?php echo $item['background']['url']; ?>)"></div>
                            <a href="<?php echo $item['link']?:"#"; ?>">
                                <div class="table">
                                    <div class="td">
                                        <h2><?php echo $item['title']; ?></h2>
                                        <div class="txt">
                                            <div class="txt_inner">
                                                <div class="txt_inner_box">
                                                    <div class="text">
                                                        <?php echo $item['subtitle']; ?>
                                                    </div>

                                                </div>
                                                <div class="txt_hover">
                                                    <div class="text">
                                                        <?php echo $item['subtitle']; ?>
                                                    </div>
                                                    <?php if($item['show_view_button']): ?>
                                                        <span class="btn_medium"><?php _w('View'); ?></span>
                                                    <?php endif; ?>
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
