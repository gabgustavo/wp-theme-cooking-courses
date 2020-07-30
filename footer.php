<footer class="footer p-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <!--<div class="nav text-uppercase d-flex flex-column flex-md-row text-center text-md-left">
          <a class="nav-link" href="nosotros.html">Nosotros</a>
          <a class="nav-link active" href="blog.html">Blog</a>
          <a class="nav-link" href="clases.html">Clases</a>
          <a class="nav-link" href="galeria.html">Galería</a>
          <a class="nav-link" href="contacto.html">Contacto</a>
        </div>-->
        <?php
        $args = array(
          'theme_location' => 'menu_pie_pagina',
          'menu_class' => 'nav text-uppercase d-flex flex-column flex-md-row text-center text-md-left',
        );
        wp_nav_menu($args);
        ?>
      </div>
      <div class="col-md-6">
        <p class="text-center text-md-right copyright mt-4 mt-md-0">
          Todos los derechos reservados <?= date('Y'); ?>
        </p>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>