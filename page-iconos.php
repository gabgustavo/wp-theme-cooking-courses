<?php

/**
 *Template Name: Página con iconos
 */

get_header(); ?>

<?php while (have_posts()): the_post(); ?>
 <?php get_template_part('template-parts/contenido', 'paginas'); ?>

  <?php get_template_part('template', 'parts/iconos'); ?>

<?php endwhile; ?>

<?php get_footer(); ?>





