<?php
/**
 * Partial: Find your vibe (4 Bildkacheln)
 * Fields: title (text), items (repeater: title, text, image, link)
 */
$title = get_sub_field('title');
$items = get_sub_field('items') ?: [];
?>
<div class="gd-section gd-vibe">
  <div class="gd-section__inner">
    <?php if ($title): ?><h2 class="gd-vibe__title"><?php echo esc_html($title); ?></h2><?php endif; ?>
    <div class="gd-vibe__grid">
      <?php foreach ($items as $item): ?>
        <?php
        $link = $item['link'] ?? [];
        $url  = is_array($link) ? ($link['url'] ?? '') : '';
        $tag  = $url ? 'a' : 'div';
        ?>
        <<?php echo $tag; ?> class="gd-vibe__card"<?php if ($url): ?> href="<?php echo esc_url($url); ?>"<?php endif; ?>>
          <?php if (!empty($item['image'])): ?>
            <?php echo wp_get_attachment_image($item['image'], 'large', false, ['class' => 'gd-vibe__image', 'loading' => 'lazy', 'sizes' => '(min-width: 768px) 50vw, 100vw']); ?>
          <?php endif; ?>
          <span class="gd-vibe__label"><?php echo esc_html($item['title'] ?? ''); ?></span>
          <?php if (!empty($item['text'])): ?><span class="visually-hidden"><?php echo wp_strip_all_tags($item['text']); ?></span><?php endif; ?>
        </<?php echo $tag; ?>>
      <?php endforeach; ?>
    </div>
  </div>
</div>
