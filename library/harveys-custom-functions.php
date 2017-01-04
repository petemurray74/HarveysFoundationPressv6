<?php


// ADDS OPTIONAL BANNER ABOVE PAGE
add_action('foundationPress_before_content','harv_sale_head');
function harv_sale_head()
{
    if (get_field('dept_header_message') == 'custom'){
            $post_object = get_field('dept_header_message');
                if( $post_object ): 
                    // override $post
                    $post = $post_object;
                    setup_postdata( $post ); 
                    ?>
                    <div>
                        <h3><?php the_content(); ?></h3>
                    </div>
                    <?php 
                    wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
                endif;
    }
    elseif (get_field('dept_header_message') == 'generic')
    {
        // add code here to show the banner only if banner post is published
    }
    
    elseif (get_field('dept_header_message') == 'no')
    {
     // nothing   
    }
}


// ADDS OPTIONAL DEPTARTMENT INFO 
add_action('foundationpress_page_before_entry_content','harv_dept_info');
function harv_dept_info()
{
    $post_object = get_field('choose_department');
    if( $post_object ): 
        // override $post
        $post = $post_object;
        setup_postdata( $post ); 
        ?>
        <?php the_content(); ?>
        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
    endif; 
}


// ADDS LOGOS TO AREA BENEATH CONTENT
// note: new action created

add_action('foundationpress_after_page','harv_footer_logos');
function harv_footer_logos() {
$post_object = get_field('logo_footer');

if( $post_object ): 

	// override $post
	$post = $post_object;
	setup_postdata( $post ); 

	?>
	<div class="logos-wrapper genericwrapper">
		<div class="row small-up-2 medium-up-4 large-up-6 logos">
			<?php the_content(); ?>
		</div>
	</div>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
	endif; 		
}			
	
// ALLOW SHORTCODES IN WIDGETS
add_filter('widget_text', 'do_shortcode');	
	

// ADD CATEGORIES TAXONOMY TO CONTENT BLOCK CUSTOM POST TYPE
// Register Custom Taxonomy

function harv_add_cats_to_content_block() {
	$labels = array(
		'name'                       => _x( 'Types', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Type', 'Taxonomy Singular Name', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
	);
	register_taxonomy( 'contentblocktype', array( 'content_block' ), $args );
}
add_action( 'init', 'harv_add_cats_to_content_block', 0 );		


/*----ADD GOOGLE ANALYTICS----*/
function ga() 
{
?>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-6452121-1', 'auto');
  <?php echo (readContentGroupMeta()); ?>
  ga('send', 'pageview');

</script>
<?php
}

// ADD GOOGLE ANALYTICS CONTENT GROUPING TO SELECTED PAGES
function readContentGroupMeta()
{
    if ($contentGroup=get_field('product_tracking_code')) {
        if ($contentGroup=="product")
        {
            return "ga('set', 'contentGroup1', 'Product');";
        }
        else {
            return;
        }	
	}
    {
        return;
    }       
}
add_action('wp_head', 'ga','50');


// ADD MAILCHIMP GOALS TO SELECTED PAGES
function MailchimpGoal() 
{
?>
<script type="text/javascript">
	var $mcGoal = {'settings':{'uuid':'d895e6fa1a9957d5236ccd4a0','dc':'us1'}};
	(function() {
		 var sp = document.createElement('script'); sp.type = 'text/javascript'; sp.async = true; sp.defer = true;
		sp.src = ('https:' == document.location.protocol ? 'https://s3.amazonaws.com/downloads.mailchimp.com' : 'http://downloads.mailchimp.com') + '/js/goal.min.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(sp, s);
	})(); 
</script>
<?php
}
add_action('wp_head', 'MailchimpGoal','30');



?>