<?php
if (get_field('hide_title') == "yes" )
{
?>
    <header>
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
<?php
}
?>
