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
		'class' => 'white-header fixedc'
	)); ?>

	<div id="search-result-container" class="search-result-container">
		<div class="search-inner">
			<!-- Cut into form.php -->
			<?php get_search_form(); ?>
			<!-- -->
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="result-article">
					<h2><a href="<?php echo get_permalink(get_the_ID()); ?>"><?php the_title(); ?></a></h2>
					<div class="short">
						<?php the_excerpt(); ?>
					</div>
				</div>
			<?php endwhile; ?>
		</div>

	</div>
	<script>
		(function($){
			$.fn.replaceText = function( search, replace, text_only ) {
				return this.each(function(){
					var node = this.firstChild,
						val,
						new_val,
						remove = [];
					if ( node ) {
						do {
							if ( node.nodeType === 3 ) {
								val = node.nodeValue;
								new_val = val.replace( search, replace );
								if ( new_val !== val ) {
									if ( !text_only && /</.test( new_val ) ) {
										$(node).before( new_val );
										remove.push( node );
									} else {
										node.nodeValue = new_val;
									}
								}
							}
						} while ( node = node.nextSibling );
					}
					remove.length && $(remove).remove();
				});
			};
			$(document).ready(function(){
				var query = '<?php echo get_search_query(); ?>';
				console.log(query);
				$('#search-result-container').find('.short p').replaceText(query.toLowerCase(), '<i>'+query+'</i>');
				$('#search-result-container').find('.short p').replaceText(query, '<i>'+query+'</i>');

				$('#search-result-container').find('h2 a').replaceText(query.toLowerCase(), '<i>'+query+'</i>');
				$('#search-result-container').find('h2 a').replaceText(query, '<i>'+query+'</i>');
			})
		})(jQuery);
	</script>
<?php endif ?>


<?php get_footer(); ?>
