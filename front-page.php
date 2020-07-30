<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>
<?php //printf('<pre>%s</pre>', var_export(get_post_custom(get_the_ID()), 1)) ?>

<div class="container-fluid imagenes-principales">
  <div class="row imagen imagen-superior">
    <div class="col-md-6 bg-primary">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-sm-8 col-md-6">
          <div class="contenido text-center text-white py-3">
            <?= nl2br(get_post_meta(get_the_ID(), 'texto_superior_1', 1)) ?>
          </div>
        </div>
      </div><!-- row -->
    </div><!-- col-md-6 -->
    <div class="col-md-6 img-principal"
         style="background-image: url(<?= get_post_meta(get_the_ID(), 'imagen_superior_1', 1) ?>)"></div>
  </div><!-- row -->

  <div class="row imagen imagen-inferior">
    <div class="col-md-6 bg-secondary order-0 order-md-2">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-sm-8 col-md-6">
          <div class="contenido text-center py-3">
            <?= nl2br(get_post_meta(get_the_ID(), 'texto_superior_2', 1)) ?>
          </div>
        </div>
      </div><!-- row -->
    </div><!-- col-md-6 -->
    <div class="col-md-6 img-principal" style="background-image: url(<?= get_post_meta(get_the_ID(), 'imagen_superior_2', 1) ?>"></div>
  </div><!-- ROW -->
</div><!-- imagenes-principales -->

<?php
  $nosotros = new WP_Query('pagename=nosotros');
  while ($nosotros->have_posts()) : $nosotros->the_post();
    get_template_part('template', 'parts/iconos');
  endwhile;
  wp_reset_postdata();
?>

<section class="clases mt-5 py-5">
  <h1 class="separador text-center mb-3">Proximas clases</h1>

  <div class="container">
    <div class="row">
      <?php
      $opciones = get_option('cocina_theme_options');
      $nEntradas = (int)(isset($opciones['num_clases'])) ? $opciones['num_clases'] : 3;
      escuela_query_cursos($nEntradas);
      ?>
    </div><!-- row -->
    <div class="row justify-content-end">
      <div class="col-sm-5 col-md-4">
        <a href="<?= get_permalink(get_page_by_title('Próximas clases')) ?>" class="btn btn-primary btn-block">Ver todas las clases</a>
      </div>
    </div>
  </div>
</section><!-- clases -->

<div class="licenciatura" style="background-image: url(<?= get_post_meta(get_the_ID(), 'imagen_licenciatura', 1) ?>">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-8 text-center text-white">
        <?= nl2br(get_post_meta(get_the_ID(), 'texto_licenciatura', 1)) ?>
        <?php $contacto = get_page_by_title('Contacto')  ?>
        <p><a href="<?= get_permalink($contacto->ID) ?>" class="btn btn-primary text-uppercase">Más información</a></p>
      </div>
    </div>
  </div>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>


