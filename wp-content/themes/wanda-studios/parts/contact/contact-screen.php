<?php
/**
 * Contact Screen for Contact us
 */
$background = get_field('background');
?>
<div class="first-screen facilities-page-screen">
    <div class="desktop-bg full-bg" style="background-image: url(<?php echo $background['url']; ?>)"></div>
    <div class="mobile-bg full-bg"  style="background-image: url(<?php echo $background['sizes']['large']; ?>)"></div>
    <div class="table home_screen">
        <div class="td">
            <h1 class="animate_up">
                <?php the_title(); ?>
            </h1>
            <div class="animate_up">
                <?php the_content(); ?>
            </div>
            <div class="contact_box">
                <div class="contact_form">
                    <form action="contact.php" id="contact_form">
                        <div class="field field_name">
                            <label class="placeholder"><?php _w('Name') ?><span class="red_required">*</span></label>
                            <input type="text" name="name" class="required name"/>
                                    <span class="wrong">
                                        <?php _w('Please enter the correct format text') ?>
                                    </span>
                        </div>
                        <div class="field field_email">
                            <label class="placeholder"><?php _w('Email') ?><span class="red_required">*</span></label>
                            <input type="text" name="email" class="required email" />
                                    <span class="wrong">
                                        <?php _w('Please enter the correct format text') ?>
                                    </span>
                        </div>
                        <div class="field">
                            <label class="placeholder"><?php _w('Company Name') ?></label>
                            <input type="text" name="company"/>
                        </div>
                        <div class="field">
                            <label class="placeholder"><?php _w('Subject') ?></label>
                            <input type="text" name="subject"/>
                        </div>
                        <div class="field">
                            <textarea name="message" placeholder="<?php _w('Drop a line....') ?>"></textarea>
                        </div>
                        <div class="field field_captcha">
                            <input type="text" name="captcha" placeholder="<?php _w('Captcha') ?>"/>
                            <img src="<?php echo get_template_directory_uri(); ?>/captcha.php" class="reload_image" alt=""/>
                            <!--<span class="wrong">Wrong Captcha</span>-->
                        </div>
                        <input type="submit" value="<?php _w('Send') ?>"/>
                    </form>
                    <div class="thank-you">
                        <a href="#" class="close"></a>
                        <div class="table">
                            <div class="td">
                                <strong><?php _w('Thank You!') ?></strong>
                                <p><?php _w('Thank you for interest in Wanda Studios Qingdao. A representative <br> will be in touch with you as soon as possible.') ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact_info">
                    <h3><?php _w('For General inquiries'); ?></h3>
                    <ul>
                        <?php if($phone = get_field('phone')): ?>
                            <li class="contact_phone">
                                <span class="icon-56"></span>
                                <div class="table">
                                    <div class="td">
                                        <a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>
                        <?php if($email = get_field('email')): ?>
                            <li class="contact_email">
                                <span class="icon-57"></span>
                                <div class="table">
                                    <div class="td">
                                        <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>
                        <?php if($address = get_field('address')): ?>
                            <li class="contact_location">
                                <span class="icon-58"></span>
                                <div class="table">
                                    <div class="td">
                                        <address><?php echo $address; ?></address>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <?php if($social = get_field('social', 'options')): ?>
                        <div class="social_btns">
                            <?php foreach ($social as $link): ?>
                                <a href="<?php echo $link['url']?:'#'; ?>" target="_blank">
                                    <span class="fa <?php echo $link['icons']; ?>"></span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <a href="#" class="dark next_screen next_screen_trigger" id="next_screen">
            <span class="next_screen_mouse">
                <span class="next_screen_mousewheel">
                </span>
            </span>
        </a>
    </div>
</div>
<div class="mobile_contact_form">
    <div class="contact_form">
        <form action="contact.php" id="contact_form_2">
            <div class="field field_name">
                <label class="placeholder">Name<span class="red_required">*</span></label>
                <input type="text" name="name" class="required name"/>
                                    <span class="wrong">
                                        <?php _w('Please enter the correct format text'); ?>
                                    </span>
            </div>
            <div class="field field_email">
                <label class="placeholder">Email<span class="red_required">*</span></label>
                <input type="text" name="email" class="required email"/>
                                    <span class="wrong">
                                        <?php _w('Please enter the correct format text'); ?>
                                    </span>
            </div>
            <div class="field">
                <label class="placeholder"><?php _w('Company Name') ?></label>
                <input type="text" name="company"/>
            </div>
            <div class="field">
                <label class="placeholder"><?php _w('Subject') ?></label>
                <input type="text" name="subject"/>
            </div>
            <div class="field">
                <textarea name="message" placeholder="<?php _w('Drop a line....') ?>"></textarea>
            </div>
            <div class="field field_captcha">
                <input type="text" name="captcha" placeholder="<?php _w('Captcha') ?>"/>
                <img src="<?php echo get_template_directory_uri(); ?>/captcha.php" class="reload_image" alt=""/>
                <!--<span class="wrong">Wrong Captcha</span>-->
            </div>
            <input type="submit" value="<?php _w('Send'); ?>"/>
        </form>
        <div class="thank-you">
            <a href="#" class="close"></a>
            <div class="table">
                <div class="td">
                    <strong><?php _w('Thank You!') ?></strong>
                    <p><?php _w('Thank you for interest in Wanda Studios Qingdao. A representative <br> will be in touch with you as soon as possible.'); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>