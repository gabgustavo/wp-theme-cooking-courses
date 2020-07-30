<?php
function escuela_query_cursos($cantidad = -1)
{
  $args = [
    'post_type' => 'clases-cocina',
    'posts_per_page' => $cantidad,
  ];

  $clases = new WP_Query($args);

  while ($clases->have_posts()) : $clases->the_post();
    //printf('<pre>%s</pre>', var_export(get_post_custom(get_the_ID()), 1))?>

    <div class="col-md-6 col-lg-4">
      <div class="card mb-4">
        <?php the_post_thumbnail('mediano', ['class' => 'card-img-top']) ?>
        <div class="card-meta bg-primary p-3 text-white d-flex justify-content-between align-items-center">
          <?php
          $fecha = get_post_meta(get_the_ID(), 'curso_fecha_inicio', 1);
          $hora = get_post_meta(get_the_ID(), 'curso_hora_inicio_clase', 1);
          $costo = get_post_meta(get_the_ID(), 'cocina_costo', 1);
          ?>
          <div>
            <p class="m-0"><span class="font-weight-bold">Fecha inicio:</span> <?= $fecha; ?></p>
            <p class="m-0"><span class="font-weight-bold">Hora:</span> <?= $hora; ?></p>
          </div>
          <span class="badge badge-secondary">$<?= escuela_modeda($costo); ?></span>
        </div>
        <div class="card-body">
          <h3 class="card-title"><?php the_title(); ?></h3>
          <p class="card-subtitle mb-2">
            <?= get_post_meta(get_the_ID(), 'curso_subtitulo', 1); ?>
          </p>
          <p class="card-text">
            <?= wp_trim_words( get_the_content(), 12, '.'); ?>
          </p>
          <a href="<?=get_the_permalink();?>" class="btn btn-primary d-block d-md-inline">
            <?=__('Más información'); ?>
          </a>
        </div>
      </div>
    </div><!-- col -->


<?php endwhile; wp_reset_postdata();
}