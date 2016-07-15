<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header();
show_template('content/white-header', array('class' => 'white-header fixed'));
?>
<div class="content-inner">
	<h1><?php _w('Not found'); ?></h1>
</div>
<?php get_footer(); ?>
