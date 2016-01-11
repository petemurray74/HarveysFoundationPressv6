<?php
/*
Template Name: Harveys Front Page
*/
get_header(); ?>
<div class="row">
	<div class="small-12 large-12 columns" role="main">
SLIDE DECK IS HARDWIRED
	<?php echo do_shortcode('[SlideDeck2 id=194 ress=1]');?>

	</div>
</div>
<?php do_action( 'foundationpress_before_content' ); ?>
<div class="row">
	<div class="small-12 large-9 columns" role="main">

	<?php /* Start loop */ ?>
	<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile; // End the loop ?>
<?php do_action( 'foundationpress_after_content' ); ?>
	</div>
    <div class="small-12 large-3 columns home-msg" role="main">
        <?php the_field('storemessages')?>
	</div>
</div>

<?php get_footer(); ?>
