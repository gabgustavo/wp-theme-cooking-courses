<div class="meta pt-2 pt-md-0">
  <p class="m-0">
    <?= __('Escrito el: ') ?>
    <span><?= the_time(get_option('date_format')); ?></span>
    <?= __('por ') ?>
    <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author() ?></a>
  </p>
</div>


