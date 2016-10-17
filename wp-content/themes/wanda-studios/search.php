<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<?php // Header
	show_template('content/header-with-menu', array(
		'class' => 'white-header fixed'
	)); ?>

	<div id="search-result-container" class="search-result-container">
		<div class="search-inner">
			<!-- Cut into form.php -->
			<?php get_search_form(); ?>
			<!-- -->
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="result-article">
						<h2><a href="<?php echo get_permalink(get_the_ID()); ?>"><?php the_title(); ?></a></h2>
						<div class="short">
							<?php echo str_replace('[&hellip', '', get_the_excerpt()) . '...'; ?>
						</div>
					</div>
				<?php endwhile; ?>
			<?php else: ?>
				<div class="no-found-results">
					<?php if(ICL_LANGUAGE_CODE == 'en'): ?>
						<h2><?php _w('YOUR SEARCH YIELDED NO RESULTS'); ?></h2>
						<p><?php _w('Check if your spelling is correct. <br>Remove quotes around phrases to match each word individually: "blue smurf" will match less than blue smurf. <br>Consider loosening your query with OR: blue smurf will match less than blue OR smurf.') ?></p>
					<?php else: ?>
						<h2><?php _w('很抱歉，根据你在搜索框内输入的内容，我们没有搜索到任何内容。'); ?></h2>
						<p><?php _w('请检查你的拼写是否正确。请尝试去掉引号：搜索带引号的“蓝精灵”的返回结果会小于搜索不带引号的蓝精灵。 <br>或者考虑放宽你的搜索条件：搜索蓝精灵的返回结果会小于搜索蓝色或精灵。') ?></p>
					<?php endif; ?>

				</div>
			<?php endif ?>
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
				var queries = [];
				queries = query.split(' ');
				for(var i=0; i<queries.length; i++){
					$('#search-result-container').find('h2 a').replaceText(queries[i].toLowerCase(), '<i>'+query+'</i>');
					$('#search-result-container').find('h2 a').replaceText(queries[i], '<i>'+query+'</i>');
				}
			})
		})(jQuery);
	</script>

<?php get_footer(); ?>
