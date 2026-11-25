<?php
$title = get_sub_field('title');
$links = get_sub_field('links') ?: [];
?>
<section class="home-module home-module--dark" aria-label="<?php echo esc_attr($title ?: __('Menu', 'projecttheme')); ?>">
  <div class="container-lg">
    <?php if ($title): ?><h2 class="home-module__title"><?php echo esc_html($title); ?></h2><?php endif; ?>
    <?php if ($links): ?>
      <nav class="home-module__actions" aria-label="<?php echo esc_attr($title ?: __('Menu', 'projecttheme')); ?>">
        <?php foreach ($links as $link): ?>
          <?php $link_data = $link['link'] ?? []; $url = is_array($link_data) ? ($link_data['url'] ?? '') : ''; ?>
          <?php if ($url): ?>
            <a class="home-module__button" href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($link_data['target'] ?? '_self'); ?>">
              <?php echo esc_html($link['label'] ?? $link_data['title'] ?? $url); ?>
            </a>
          <?php endif; ?>
        <?php endforeach; ?>
      </nav>
    <?php endif; ?>
  </div>
</section>
