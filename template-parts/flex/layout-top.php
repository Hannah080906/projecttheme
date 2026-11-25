<?php
/**
 * Partial: Top ("your city, your people.")
 * Fields: title (text), text (wysiwyg), image (image), cta (link)
 */
$title    = get_sub_field('title');
$text     = get_sub_field('text');
$image_id = get_sub_field('image');
$cta      = get_sub_field('cta');
?>
<div class="gd-top">
  <?php if ($image_id): ?>
    <?php echo wp_get_attachment_image($image_id, 'full', false, ['class' => 'gd-top__image', 'loading' => 'eager', 'decoding' => 'async']); ?>
  <?php endif; ?>
  <div class="gd-top__inner">
    <?php if ($title): ?><h1 class="gd-top__title"><?php echo gd_title_with_breaks($title); ?></h1><?php endif; ?>
    <?php if ($text): ?><div class="gd-top__text"><?php echo wp_kses_post($text); ?></div><?php endif; ?>
    <?php gd_button($cta, __('Discover', 'projecttheme'), 'pink'); ?>
  </div>
</div>
