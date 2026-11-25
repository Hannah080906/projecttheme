<?php
/**
 * Partial: Events (Discover – Raster mit Bild, Datum, Infos)
 * Fields: title (text), events (repeater: date, title, text, image, link)
 */
$title  = get_sub_field('title');
$events = get_sub_field('events') ?: [];
?>
<div class="gd-section gd-events">
  <div class="gd-section__inner">
    <?php if ($title): ?><h2 class="gd-events__title"><?php echo esc_html($title); ?></h2><?php endif; ?>
    <?php if ($events): ?>
      <div class="gd-events__grid">
        <?php foreach ($events as $event): ?>
          <?php
          $link = $event['link'] ?? [];
          $url  = is_array($link) ? ($link['url'] ?? '') : '';
          ?>
          <article class="gd-events__item">
            <?php if (!empty($event['image'])): ?>
              <?php if ($url): ?><a class="gd-events__media" href="<?php echo esc_url($url); ?>" tabindex="-1" aria-hidden="true"><?php else: ?><div class="gd-events__media"><?php endif; ?>
                <?php echo wp_get_attachment_image($event['image'], 'large', false, ['class' => 'gd-events__image', 'loading' => 'lazy', 'decoding' => 'async', 'sizes' => '(min-width: 768px) 50vw, 100vw']); ?>
              <?php echo $url ? '</a>' : '</div>'; ?>
            <?php endif; ?>
            <div class="gd-events__content">
              <?php if (!empty($event['date'])): ?>
                <h3 class="gd-events__date">
                  <?php if ($url): ?><a href="<?php echo esc_url($url); ?>"><?php endif; ?>
                  <?php echo esc_html($event['date']); ?>
                  <?php if ($url): ?></a><?php endif; ?>
                </h3>
              <?php endif; ?>
              <div class="gd-events__info">
                <?php if (!empty($event['title'])): ?><p><?php echo esc_html($event['title']); ?></p><?php endif; ?>
                <?php if (!empty($event['text'])): ?><?php echo wpautop(wp_kses_post($event['text'])); ?><?php endif; ?>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</div>
