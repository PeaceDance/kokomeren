<?php
/*
Template Name: Универсальная страница
*/
?>
<?php get_header(); ?>
<div class="container__сontent">
    <?php while (have_posts()) : the_post(); ?>
        <div class="content__page">
            <?php the_content(); ?>
        </div>
    <?php endwhile; ?>
</div>
<?php get_footer(); ?>