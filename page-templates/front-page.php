<?php
/*
Template Name: Harveys Front Page
*/
get_header(); ?>
<div class="row">
    <div class="small-12 large-12 columns home-msg" role="main">
        <?php the_field('storemessages')?>
	</div>
</div>	
<div class="row">
	<div class="small-12 large-8 columns" role="main">
	<?php echo do_shortcode('[SlideDeck2 id=194 ress=1]');?>
	</div>
	<div class="small-12 large-4 columns" role="main">
	<?php the_field('current_promos')?>	
	</div>
</div>

<div class="row small-up-2 medium-up-3 large-up-6" data-equalizer data-equalize-by-row="true">
	<div class="column">
		<div class="department_block" data-equalizer-watch>
		Fashion
		</div>
	</div>
	<div class="column">
		<div class="department_block" data-equalizer-watch>
		Shoes
		</div>
	</div>
	<div class="column">
		<div class="department_block" data-equalizer-watch>
		Lingerie &amp; Swimwear
		</div>
	</div>
	<div class="column">
		<div class="department_block" data-equalizer-watch>
		Handbags &amp; Accessories
		</div>
	</div>
	<div class="column">
		<div class="department_block" data-equalizer-watch>
		Mens
		</div>
	</div>
	<div class="column">
		<div class="department_block" data-equalizer-watch>
		Cookshop
		</div>
	</div>
	<div class="column">
		<div class="department_block" data-equalizer-watch>
		Linens
		</div>
	</div>
	<div class="column">
		<div class="department_block" data-equalizer-watch>
		Curtains
		</div>
	</div>
	<div class="column">
		<div class="department_block" data-equalizer-watch>
		Gifts & Cards
		</div>
	</div>
	<div class="column">
		<div class="department_block" data-equalizer-watch>
		Beauty &amp; Cosmetics
		</div>
	</div>
	<div class="column">
		<div class="department_block" data-equalizer-watch>
		Restaurant
		</div>
	</div>	
	<div class="column">
		<div class="department_block" data-equalizer-watch>
		Privilege Card
		</div>
	</div>				
</div>

<div class="row">
	<?php // SHOW CONTENT BOXES 
		if( have_rows('product_boxes') ): ?>
		<ul class="small-up-2 medium-up-3 large-up-4 front-promos" data-equalizer data-equalize-by-row="true">
		<?php while( have_rows('product_boxes') ): the_row(); 
			$image = get_sub_field('product_box_image');
			$text = get_sub_field('product_box_text');
			?>
			<li class="column" data-equalizer-watch>
				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
			<?php echo $text; ?>
			</li>
		<?php endwhile; ?>
		</ul>
	<?php endif; ?>
</div>


<?php get_footer(); ?>
