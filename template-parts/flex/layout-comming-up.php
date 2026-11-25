<?php
/**
 * Partial: Comming up in graz (Event-Liste mit Bild links)
 * Fields: title (text), events (repeater: date, title, text, image, link)
 */
$title  = get_sub_field('title');
$events = get_sub_field('events') ?: [];
?>
<div class="gd-section gd-coming">
  <div class="gd-coming__inner">
    <?php if ($title): ?><h2 class="gd-coming__title"><?php echo esc_html($title); ?></h2><?php endif; ?>
    <?php foreach ($events as $event): ?>
      <article class="gd-coming__item">
        <div class="gd-coming__media">
          <?php if (!empty($event['image'])): ?>
            <?php echo wp_get_attachment_image($event['image'], 'medium_large', false, ['class' => 'gd-coming__image', 'loading' => 'lazy']); ?>
          <?php endif; ?>
        </div>
        <div class="gd-coming__content">
          <div>
            <?php if (!empty($event['date'])): ?><h3 class="gd-coming__date"><?php echo esc_html($event['date']); ?></h3><?php endif; ?>
            <?php if (!empty($event['title'])): ?><p class="gd-coming__name"><?php echo esc_html($event['title']); ?></p><?php endif; ?>
            <?php if (!empty($event['text'])): ?><div class="gd-coming__text"><?php echo wp_kses_post($event['text']); ?></div><?php endif; ?>
          </div>
          <?php gd_button($event['link'] ?? [], __('find out more →', 'projecttheme')); ?>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</div>
