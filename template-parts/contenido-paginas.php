<div class="container">
  <?= cocina_image_detacada(get_the_ID()) ?>
  <main class="container">
    <div class="row justify-content-center">
      <div class="py-3 px-5 <?= (cocina_image_detacada(get_the_ID())) ? 'col-md-8 contenido-pagina' : 'col-md-12' ?> bg-white">
        <h1 class="text-center my-5 separador"><?php the_title(); ?></h1>
       <?php the_content(); ?>
      </div>
    </div>
  </main>
</div>



