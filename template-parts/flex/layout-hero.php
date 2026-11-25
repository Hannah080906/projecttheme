<?php
/**
 * Partial: Hero
 * Fields: title (text), image (image ID)
 * Figma: Bild vollflächig, Schriftzug füllt immer die ganze Breite.
 */

$title    = get_sub_field('title');
$image_id = get_sub_field('image');
?>
<div class="hero__media">
  <?php if ($image_id): ?>
    <?php echo wp_get_attachment_image($image_id, 'full', false, [
      'class'    => 'hero__image',
      'loading'  => 'eager',
      'decoding' => 'async',
      'sizes'    => '100vw',
    ]); ?>
  <?php endif; ?>

  <?php if ($title): ?>
    <p class="hero__title" aria-hidden="true"><?php echo esc_html($title); ?></p>
  <?php endif; ?>
</div>
