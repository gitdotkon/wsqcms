<?php
/**
 * Header
 */
?>
<!DOCTYPE html>
<!--[if !(IE)]><!-->
<html <?php language_attributes(); ?> class="<?php fixed_height(); ?>"> <!--<![endif]-->
<!--[if IE]>
<script src="<?php bloginfo('template_url'); ?>/js/plugins/html5shiv.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/plugins/flexibility.js"></script>
<![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9 ie8 <?php fixed_height(); ?>" lang="en"><![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js <?php fixed_height(); ?>" <?php language_attributes(); ?>> <!--<![endif]-->
<!--[if gte IE 9]>
<style type="text/css">
    .gradient {
        filter: none;
    }
</style>
<![endif]-->

<head>
    <!-- Set up Meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" charset="<?php bloginfo('charset'); ?>"/>

    <!-- Add Favicon -->
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico"/>
    <link type="image/png" href="<?php bloginfo('template_url'); ?>/favicon.png" rel="icon">
    <link type="image/png" href="<?php bloginfo('template_url'); ?>/favicon.png" rel="shortcut icon">
    <link type="image/png" href="<?php bloginfo('template_url'); ?>/favicon.png" rel="apple-touch-icon">

    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <?php wp_head(); ?>
    <script> 
	//(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','/wp-content/themes/wanda-studios/js/analytics.js','ga');
        ga('create', 'UA-69842059-1', 'auto'); ga('send', 'pageview');
    </script>
</head>

<body <?php body_class(get_custom_class()); ?>>
   
