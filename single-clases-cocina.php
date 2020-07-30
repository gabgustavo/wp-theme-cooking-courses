<?php get_header(); ?>

<?php while (have_posts()): the_post();
  get_template_part('template-parts/contenido', 'post'); ?>

  <?php //printf('<pre>%s</pre>', var_export(get_post_custom(get_the_ID()), 1)) ?>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <h2 class="separador text-center my-3"><?=__('¿Que incluye?'); ?></h2>
        <ul class="list-group">
          <?php $lista_incluye = get_post_meta(get_the_ID(), 'curso_incluye', 1);?>
          <?php foreach ($lista_incluye as $incluye): ?>
          <li class="list-group-item list-group-item-secondary text-white"><?=$incluye; ?></li>
          <?php endforeach; ?>
        </ul>

        <h2 class="separador text-center my-3 mt-5">Información extra</h2>
        <ul class="list-group">
          <li class="list-group-item list-group-item-primary text-white">
            <?=get_post_meta(get_the_ID(), 'curso_cupo', 1);?> cupos disponibles
          </li>
          <li class="list-group-item list-group-item-primary text-white">
            Costo: $<?= escuela_modeda(get_post_meta(get_the_ID(), 'cocina_costo', 1));?>
          </li>
          <li class="list-group-item list-group-item-primary text-white">
            Fecha inicio:
            <?=get_post_meta(get_the_ID(), 'curso_fecha_inicio', 1);?> -
            Fecha fin: <?=get_post_meta(get_the_ID(), 'curso_fecha_fin', 1);?>
          </li>
          <li class="list-group-item list-group-item-primary text-white">
            Horario: <?=get_post_meta(get_the_ID(), 'curso_hora_inicio_clase', 1);?> -
            <?=get_post_meta(get_the_ID(), 'curso_hora_fin_clase', 1);?>
          </li>
          <li class="list-group-item list-group-item-primary text-white">
            <?=get_post_meta(get_the_ID(), 'curso_indicaciones', 1);?>
          </li>
        </ul>
      </div>
      <div class="col-md-6 text-center">
        <h2 class="separador text-center mt-5 my-md-3">Imparte</h2>
        <?php $id_instructores = get_post_meta(get_the_ID(), 'curso_chefs', 1);
        $args = [
          'post_type' => 'chefs',
          'post__in' => $id_instructores,
          'posts_per_page' => 10
        ];
        $instructores = new WP_Query($args);
        while ($instructores->have_posts()): $instructores->the_post();
        ?>
        <div class="">
          <div class="row justify-content-center mb-4">
            <div class="col-md-8">
              <?php the_post_thumbnail('cuadrada_mediana', ['class' => 'img-fluid rounded-circle']) ?>
            </div>
          </div>
          <p class="instructor"><?php the_title(); ?></p>
          <div class="">
            <?php the_content(); ?>
          </div>
        </div>
      <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </div>
  </div>

<?php endwhile; ?>

<?php get_footer(); ?>


