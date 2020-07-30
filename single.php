<?php get_header(); ?>

<?php while (have_posts()): the_post();
  get_template_part('template-parts/contenido', 'post'); ?>

 <div class="container comentarios">
  <?php
  if(comments_open() || get_comments_number()) :
    comments_template();
  else:
    echo __('<p class="text-center comentarios-cerrados alert alert-danger">Los comentarios están cerrados</p>');
  endif;
  ?>
 </div>
<?php endwhile; ?>

<?php get_footer(); ?>


