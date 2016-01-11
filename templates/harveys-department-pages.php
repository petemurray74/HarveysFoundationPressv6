<?php
/*
Template Name: Harveys department pages
*/

get_header(); ?>

<?php get_template_part( 'parts/featured-image' ); ?>

<div class="row">
	<?php get_template_part( 'parts/check-if-sidebar-exist' ); ?>
	<?php do_action( 'foundationpress_before_content' ); ?>

	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<?php get_template_part('parts/harveys-page-title'); ?>
			<?php do_action('foundationpress_page_before_entry_content'); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile;?>	
	<?php do_action( 'foundationpress_after_content' ); ?>

	</div>
	<?php 
	//gets the file sidebar.php
    get_sidebar(); 
    ?>
</div>
<?php 
// this is a new action added for Harveys
do_action( 'foundationpress_after_page' ); ?>
<?php get_footer(); ?>
