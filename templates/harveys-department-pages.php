<?php
/*
Template Name: Harveys department pages
*/

get_header(); ?>

<?php //get_template_part( 'parts/featured-image' ); ?>
<div class="main-content-wrap">
	<div class="row">
		<?php // get_template_part( 'parts/check-if-sidebar-exist' ); ?>
		<?php // SHOW MAIN CONTENT
		do_action( 'foundationpress_before_content' ); ?>
		<div class="small-12 large-4 columns">
			<?php do_action( 'foundationpress_after_content' ); ?>
		</div>
		<div class="small-12 large-8 columns">
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<?php get_template_part('parts/harveys-page-title'); ?>
				<?php do_action('foundationpress_page_before_entry_content'); ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile;?>
		</div>

	</div>	
</div>	
<div class="content-image-box-area-wrap">
	<div class="row">
		<div class="small-12 large-12 columns">
		<?php // SHOW CONTENT BOXES 
			if( have_rows('content_box') ): ?>
			<div class="row small-up-2 medium-up-3 large-up-3">
			<?php while( have_rows('content_box') ): the_row(); 
				$image = get_sub_field('content_box_image');
				$text = get_sub_field('content_box_text');
				?>
				<div class="column content-image-box">
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
				<?php echo $text; ?>
				</div>
			<?php endwhile; ?>
			</div>
		</div>	
		<?php endif; ?>
	</div>
</div>	

	
<?php 
// this is a new action added for Harveys
do_action( 'foundationpress_after_page' ); ?>

<div class="row">
		<?php get_sidebar('row');?>
</div>	

<?php get_footer(); ?>

