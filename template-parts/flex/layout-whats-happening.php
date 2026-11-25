<?php
/**
 * Partial: Whats happening? (Discover – Suche + Filter)
 * Fields: title (text), text (wysiwyg = Platzhalter der Suche), image (image), cta (link)
 */
$title       = get_sub_field('title');
$text        = get_sub_field('text');
$image_id    = get_sub_field('image');
$cta         = get_sub_field('cta');
$action      = is_array($cta) && !empty($cta['url']) ? $cta['url'] : get_permalink();
$placeholder = $text ? trim(wp_strip_all_tags($text)) : __('search events in graz', 'projecttheme');
$button      = gd_link_label($cta, __('find your next thing →', 'projecttheme'));
$input_id    = 'gd-search-' . get_row_index();
$filters     = apply_filters('projecttheme_event_filters', [
  'today'    => __('today', 'projecttheme'),
  'category' => __('category', 'projecttheme'),
  'price'    => __('price', 'projecttheme'),
]);
?>
<div class="gd-section gd-happening">
  <div class="gd-section__inner">
    <?php if ($title): ?><h2 class="gd-happening__title"><?php echo esc_html($title); ?></h2><?php endif; ?>
    <form class="gd-search" action="<?php echo esc_url($action); ?>" method="get" role="search">
      <label class="visually-hidden" for="<?php echo esc_attr($input_id); ?>"><?php echo esc_html($title ?: __('Search', 'projecttheme')); ?></label>
      <input class="gd-search__input gd-search__input--short" id="<?php echo esc_attr($input_id); ?>" type="search" name="q" placeholder="<?php echo esc_attr($placeholder); ?>" value="<?php echo esc_attr(wp_unslash($_GET['q'] ?? '')); ?>">
      <button class="gd-button" type="submit"><?php echo esc_html($button); ?></button>
    </form>
    <?php if ($filters): ?>
      <div class="gd-happening__filters" role="group" aria-label="<?php esc_attr_e('Filter', 'projecttheme'); ?>">
        <?php foreach ($filters as $key => $label): ?>
          <button class="gd-button gd-button--olive" type="button" data-filter="<?php echo esc_attr($key); ?>" aria-pressed="false"><?php echo esc_html($label); ?></button>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <?php if ($image_id): ?>
      <?php echo wp_get_attachment_image($image_id, 'large', false, ['class' => 'gd-happening__image', 'loading' => 'lazy']); ?>
    <?php endif; ?>
  </div>
</div>
