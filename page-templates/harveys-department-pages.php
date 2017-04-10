<?php
/*
Template Name: Harveys Department Pages
*/

get_header(); ?>

<?php //get_template_part( 'parts/featured-image' ); ?>
<div class="main-content-wrap genericwrapper">
	<div class="row">
		<?php // get_template_part( 'parts/check-if-sidebar-exist' ); ?>
		<?php // SHOW MAIN CONTENT
		do_action( 'foundationpress_before_content' ); ?>
		<div class="small-12 medium-8 columns">
			<?php // SHOW SLIDESHOW 
			if( have_rows('slides') ): ?>
			<div class="orbit" role="region" aria-label="Harveys"  data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;" data-infinite-wrap="true" data-timer-delay="5000" data-bullets="false" data-orbit>
			  <ul class="orbit-container" style="background:<?php echo(get_field('slideshow_background'))?>">
				<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
				<button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
				<?php 
				while( have_rows('slides') ): the_row(); 
					$slide_type = get_sub_field('slide_type');
					
				if ($slide_type == "text") {
					$heading = get_sub_field('slide_heading');
					$text = get_sub_field('slide_text');
					$background = get_sub_field('slide_background');
					?>
				<li class="orbit-slide text-slide">
				  <div style="background:<?php echo($background); ?>">
					<h3 class="text-center"><?php echo($heading); ?></h3>
					<p class="text-center"><?php echo($text); ?></p>
				  </div>
				</li>
				<?php 
				}
				else if ($slide_type == "image") {
					$image = get_sub_field('slide_image');
					$caption = get_sub_field('slide_caption');
					//$background = get_sub_field('slide_background');
										?>
					<li class="orbit-slide">
					  <div>
						 <img class="orbit-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
						 <?php if ($caption){?>
							 <figcaption class="orbit-caption"><?php echo($caption); ?></figcaption>
						 <?php } ?>	 
					  </div>
					</li>
				<?php 
				}
				
				?>

				<?php endwhile; ?>
			</ul>
			</div>
			<?php endif; ?>
		</div>
		<div class="small-12 medium-4 columns">
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


	</div>	
</div>	
<div class="content-image-box-area-wrap genericwrapper">
		<?php // SHOW CONTENT BOXES 
			if( have_rows('content_box') ): ?>
			<div class="row small-up-1 medium-up-2 large-up-3" data-equalizer data-equalize-by-row="true">
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

