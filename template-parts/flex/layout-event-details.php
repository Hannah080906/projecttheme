<?php
/**
 * Partial: Event details
 * Fields: title, date, time (text), text (wysiwyg), image (image), cta (link)
 */
$title    = get_sub_field('title');
$date     = get_sub_field('date');
$time     = get_sub_field('time');
$text     = get_sub_field('text');
$image_id = get_sub_field('image');
$cta      = get_sub_field('cta');
?>
<div class="gd-section gd-detail">
  <div class="gd-detail__inner">
    <?php if ($image_id): ?>
      <?php echo wp_get_attachment_image($image_id, 'large', false, ['class' => 'gd-detail__image', 'loading' => 'eager', 'decoding' => 'async']); ?>
    <?php endif; ?>
    <div class="gd-detail__content">
      <?php if ($title): ?><h2 class="gd-detail__title"><?php echo esc_html($title); ?></h2><?php endif; ?>
      <?php if ($date || $time): ?>
        <h3 class="gd-detail__meta"><?php echo esc_html(trim($date . ($date && $time ? '- ' : '') . $time)); ?></h3>
      <?php endif; ?>
      <?php if ($text): ?><div class="gd-detail__text"><?php echo wp_kses_post($text); ?></div><?php endif; ?>
      <?php gd_button($cta, __('book your spot →', 'projecttheme'), 'pink'); ?>
    </div>
  </div>
</div>
