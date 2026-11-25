<?php
$title = get_sub_field('title');
$text = get_sub_field('text');
$cta = get_sub_field('cta');
$url = is_array($cta) ? ($cta['url'] ?? '') : '';
?>
<div class="home-module home-module--dark">
  <div class="container-lg">
    <?php if ($title): ?><h2 class="home-module__title"><?php echo esc_html($title); ?></h2><?php endif; ?>
    <?php if ($text): ?><div class="home-module__intro"><?php echo wp_kses_post($text); ?></div><?php endif; ?>
    <?php if ($url): ?><a class="home-module__button" href="<?php echo esc_url($url); ?>"><?php echo esc_html($cta['title'] ?? __('Contact', 'projecttheme')); ?></a><?php endif; ?>
  </div>
</div>
