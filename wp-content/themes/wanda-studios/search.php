<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<?php if ( have_posts() ) : ?>
	<?php // Header
	show_template('content/header-with-menu', array(
		'class' => 'white-header'
	)); ?>
	<!-- Cut into form.php -->
	<?php get_search_form(); ?>
	<!-- -->
<?php while ( have_posts() ) : the_post(); ?>


<?php endwhile; ?>
<?php endif ?>


<?php get_footer(); ?>
