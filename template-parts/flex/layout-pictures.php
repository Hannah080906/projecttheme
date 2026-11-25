<?php
/**
 * Partial: Pictures (About – 3 Bilder)
 * Fields: title (text), images (gallery)
 */
$title  = get_sub_field('title');
$images = get_sub_field('images') ?: [];
?>
<div class="gd-pictures">
  <?php if ($title): ?><h2 class="gd-pictures__title"><?php echo esc_html($title); ?></h2><?php endif; ?>
  <?php if ($images): ?>
    <div class="gd-pictures__grid">
      <?php foreach ($images as $image): ?>
        <?php $image_id = is_array($image) ? ($image['ID'] ?? 0) : $image; ?>
        <figure class="gd-pictures__item">
          <?php echo wp_get_attachment_image($image_id, 'medium_large', false, ['class' => 'gd-pictures__image', 'loading' => 'lazy', 'decoding' => 'async']); ?>
        </figure>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>
