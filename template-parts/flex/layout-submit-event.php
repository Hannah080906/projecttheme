<?php
/**
 * Partial: Submit event (Startseite – "got something going on?")
 * Fields: title (text), text (wysiwyg), cta (link)
 */
$title = get_sub_field('title');
$text  = get_sub_field('text');
$cta   = get_sub_field('cta');
?>
<div class="gd-section gd-dark gd-submit gd-submit--compact">
  <div class="gd-section__inner">
    <?php if ($title): ?><h2 class="gd-submit__title"><?php echo esc_html($title); ?></h2><?php endif; ?>
    <?php if ($text): ?><div class="gd-submit__text"><?php echo wp_kses_post($text); ?></div><?php endif; ?>
    <?php gd_button($cta, __('submit event →', 'projecttheme'), 'pink'); ?>
  </div>
</div>
