<?php
/**
 * lang switcher
 */

$languages = icl_get_languages('skip_missing=0&orderby=code');
?>
<div class="lang_switcher">
    <ul>
        <?php
        if($languages['en']){
            if($languages['en']['active']){
                echo '<li class="active"><a href="'.$languages['en']['url'].'">'. __('English').'</a></li>';
            }else{
                echo '<li><a href="'.$languages['en']['url'].'">'. __('English').'</a></li>';
            }
        }
        if($languages['zh-hans']){
            if($languages['zh-hans']['active']){
                echo '<li class="active"><a href="'.$languages['zh-hans']['url'].'">'.__('简体').'</a></li>';
            }else{
                echo '<li><a href="'.$languages['zh-hans']['url'].'">'.__('简体').'</a></li>';
            }
        }
        if($languages['zh-hant']){
            if($languages['zh-hant']['active']){
                echo '<li class="active"><a href="'.$languages['zh-hant']['url'].'">'.__('繁體').'</a></li>';
            }else{
                echo '<li><a href="'.$languages['zh-hant']['url'].'">'.__('繁體').'</a></li>';
            }
        }
        ?>
    </ul>
</div>
