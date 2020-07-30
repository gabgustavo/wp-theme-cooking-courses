<?php

/**
 *Template Name: Listado clases
 */

get_header(); ?>




 <div class="container mb-4">
  <div class="row justify-content-center">
   <div class="col-md-8">
    <blockquote class="subtitulo text-center pl-3">
    <?php while (have_posts()): the_post(); ?>
     <?php the_content(); $titulo = get_the_title();?>
     <?php endwhile; ?>
    </blockquote>
   </div>
  </div>
 </div>

 <section class="clases mt-5 py-5">
  <h1 class="separador text-center mb-3"><?= $titulo; ?></h1>

  <div class="container">
   <div class="row">
     <?php escuela_query_cursos(); ?>
   </div><!-- row -->
  </div>
 </section>

<?php //endwhile; ?>

<?php get_footer(); ?>





