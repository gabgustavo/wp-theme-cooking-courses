<?php get_header(); ?>

<div class="container mb-4">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <blockquote class="subtitulo text-center pl-3">
        <?php
        $id_blog = get_option('page_for_posts');
        echo get_post_meta($id_blog, 'slogan_blog', 1);
        ?>
      </blockquote>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <main class="col-md-8 col-lg-9">
      <h1 class="separador text-center mb-3">Nuestro Blog</h1>
      <div class="row mb-4">
        <?php while (have_posts()): the_post(); ?>
        <div class="col-md-4">
          <?= the_post_thumbnail('mediano', ['class' => 'img-fluid']); ?>
        </div>
        <div class="col-md-8">
          <div class="contenedor-entrada pt-4 pt-md-0">
            <a href="entrada.html">
              <h3><?php the_title() ?></h3>
            </a>
            <?php get_template_part('template-parts/meta', 'post'); ?>
            <p>
              <?= get_the_excerpt(); ?>
            </p>
            <a href="<?= get_the_permalink(); ?>" class="btn btn-primary text-white text-light">Ver entrada</a>
          </div>
        </div>
        <?php endwhile; ?>
        <ul class="pagination pagination-lg w-100 justify-content-center mt-4">
          <li class="page-item">
            <?php
                previous_post_link('%link','
                <span class="page-link" aria-hidden="true">« '.__("Anteriores").'</span>
                <span class="sr-only" >'.__("Anteriores").'</span>
                ');
            ?>
          </li>
          <li class="page-item">
            <?php
                next_post_link('%link','
                    <span class="page-link" aria-hidden="true">'.__("Siguientes").' »</span>
                    <span class="sr-only" >'.__("Siguientes").'</span>
                    ');
            ?>
          </li>
        </ul>
      </div>
    </main>

    <?php get_sidebar(); ?>
  </div>

</div>

<?php get_footer(); ?>


