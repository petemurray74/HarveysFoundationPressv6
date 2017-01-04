<?php
/*
Template Name: Harveys department pages
*/

get_header(); ?>

<?php //get_template_part( 'parts/featured-image' ); ?>
<div class="main-content-wrap genericwrapper">
	<div class="row">
		<?php // get_template_part( 'parts/check-if-sidebar-exist' ); ?>
		<?php // SHOW MAIN CONTENT
		do_action( 'foundationpress_before_content' ); ?>
		<div class="small-12 large-4 columns">
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<?php do_action('foundationpress_page_before_entry_content'); ?>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>
			<?php endwhile;?>
			<?php do_action( 'foundationpress_after_content' ); ?>
		</div>
		<div class="small-12 large-8 columns">
		<?php 
		$slide_shortcode="[SlideDeck2 id=".get_field('slideshow')." ress=1]";
		echo do_shortcode($slide_shortcode); 
		?>
		</div>

	</div>	
</div>	
<div class="content-image-box-area-wrap genericwrapper">
	<div class="row">
		<?php // SHOW CONTENT BOXES 
			if( have_rows('content_box') ): ?>
			<div class="row small-up-2 medium-up-3 large-up-3" data-equalizer data-equalize-by-row="true">
			<?php while( have_rows('content_box') ): the_row(); 
				$image = get_sub_field('content_box_image');
				$text = get_sub_field('content_box_text');
				?>
				<div class="column content-image-box" >
					<div class="content-box-wrapper" data-equalizer-watch>
					<img class="content-box-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
						<div class="content-text-box">
						<?php echo $text; ?>
						</div>
					</div>
				</div>	
			<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</div>	

	
<?php 
// this is a new action added for Harveys
do_action( 'foundationpress_after_page' ); ?>
<div class="site-wide-updates-container genericwrapper">
	<div class="row">
			<?php get_sidebar('row');?>
	</div>	
</div>
<?php get_footer(); ?>

