<?php
/**
 * Partial: What are you looking for? (Suche auf der Startseite)
 * Fields: title (text), items (repeater: title, image, link)
 * Der erste Eintrag liefert Platzhalter (title) und Ziel/Beschriftung des Buttons (link).
 */
$title = get_sub_field('title');
$items = get_sub_field('items') ?: [];
$first = $items[0] ?? [];
$link  = $first['link'] ?? [];
$action      = is_array($link) && !empty($link['url']) ? $link['url'] : home_url('/discover/');
$placeholder = !empty($first['title']) ? $first['title'] : __('yoga, run club, fleamarkets,....', 'projecttheme');
$button      = gd_link_label($link, __('find your next thing →', 'projecttheme'));
$input_id    = 'gd-search-' . get_row_index();
?>
<div class="gd-section gd-looking">
  <div class="gd-section__inner">
    <?php if ($title): ?><h2 class="gd-looking__title"><?php echo esc_html($title); ?></h2><?php endif; ?>
    <form class="gd-search" action="<?php echo esc_url($action); ?>" method="get" role="search">
      <label class="visually-hidden" for="<?php echo esc_attr($input_id); ?>"><?php echo esc_html($title ?: __('Search', 'projecttheme')); ?></label>
      <input class="gd-search__input" id="<?php echo esc_attr($input_id); ?>" type="search" name="q" placeholder="<?php echo esc_attr($placeholder); ?>">
      <button class="gd-button" type="submit"><?php echo esc_html($button); ?></button>
    </form>
  </div>
</div>
