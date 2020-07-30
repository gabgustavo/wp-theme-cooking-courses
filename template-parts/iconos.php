<section class="container nosotros mt-5">
  <h2 class="text-center mb-5 separador"><?=get_post_meta(get_the_ID(), 'titulo_iconos', 1) ?></h2>
  <div class="row justify-content-center">
    <?php $iconos =  get_post_meta(get_the_ID(), 'cocina_nosotros', 1)?>
    <?php foreach ($iconos as $icono): ?>
    <div class="col-md-4 text-center informacion">
      <img src="<?= $icono['imagen_icono']; ?>" alt="icno chef" class="img-fluid mb-3">
      <h3><?= $icono['titulo_icono']; ?></h3>
      <p>
        <?= nl2br($icono['desc_icono']); ?>
      </p>
    </div>
    <?php endforeach; ?>
  </div>
</section>