<?php
/**
 * Template Name: Galería de imagénes
 */
get_header(); ?>

<?php while (have_posts()): the_post();
  get_template_part('template-parts/contenido', 'paginas');
  $imagenes = get_post_meta(get_the_ID(), 'cocina_imagenes_galeria', 1)
  ?>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-11 col-10">
        <div class="card-columns">
          <?php foreach ($imagenes as $id => $imagen): ?>
            <div class="card">
              <a href="#" data-toggle="modal" data-target="#img<?= $id; ?>">
                <img src="<?= wp_get_attachment_image_url($id, 'full'); ?>" alt="galería" class="img-fluid">
              </a>
              <div id="img<?= $id; ?>" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <img src="<?= wp_get_attachment_image_url($id, 'full'); ?>" alt="galería" class="img-fluid">
                  </div>
                </div>
              </div>
            </div><!-- card -->
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>


 <?php endwhile; ?>

<?php get_footer(); ?>


