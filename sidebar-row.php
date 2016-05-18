<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<aside class="sidebar-row">
	<?php do_action( 'foundationpress_before_sidebar' ); ?>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php do_action( 'foundationpress_after_sidebar' ); ?>
</aside>
