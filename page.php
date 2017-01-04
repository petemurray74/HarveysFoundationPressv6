<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

 get_header(); ?>

 <?php get_template_part( 'parts/featured-image' ); ?>
<div class="main-content-wrap genericwrapper">
	<div class="row">

 <?php do_action( 'foundationpress_before_content' ); ?>
 	<div class="small-12 large-12 columns">
 <?php while ( have_posts() ) : the_post(); ?>
	   <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
		<header>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
		   <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
		   <div class="entry-content">
			   <?php the_content(); ?>
		   </div>
		   <footer>
			   <?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
		   </footer>
	   </article>
 <?php endwhile;?>
		</div> 

	</div> 
 </div>
 <?php do_action( 'foundationpress_after_content' ); ?>
<div class="site-wide-updates-container genericwrapper">
	<div class="row">
			<?php get_sidebar('row');?>
	</div>	
</div>

 <?php get_footer(); ?>
