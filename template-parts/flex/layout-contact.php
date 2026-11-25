<?php
/**
 * Partial: Contact ("lets stay in contact!")
 * Fields: title (text), address (textarea), phone (text), email (email), links (repeater: link)
 */
$title   = get_sub_field('title');
$address = get_sub_field('address');
$phone   = get_sub_field('phone');
$email   = get_sub_field('email');
$links   = get_sub_field('links') ?: [];
?>
<div class="gd-section gd-contact" id="contact">
  <div class="gd-section__inner">
    <?php if ($title): ?><h2 class="gd-contact__title"><?php echo esc_html($title); ?></h2><?php endif; ?>
    <div class="gd-contact__details">
      <?php if ($address): ?><p class="gd-contact__address"><?php echo nl2br(esc_html(trim(wp_strip_all_tags($address)))); ?></p><?php endif; ?>
      <?php if ($phone || $email): ?>
        <p>
          <?php if ($phone): ?>Tel.: <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a><?php endif; ?>
          <?php if ($phone && $email): ?><br><?php endif; ?>
          <?php if ($email): ?>email.: <a href="mailto:<?php echo antispambot(sanitize_email($email)); ?>"><?php echo antispambot(esc_html($email)); ?></a><?php endif; ?>
        </p>
      <?php endif; ?>
    </div>
    <?php if ($links): ?>
      <nav class="gd-contact__links" aria-label="<?php echo esc_attr($title ?: __('Contact links', 'projecttheme')); ?>">
        <?php foreach ($links as $link): ?>
          <?php $link_data = $link['link'] ?? []; ?>
          <?php if (is_array($link_data) && !empty($link_data['url'])): ?>
            <a href="<?php echo esc_url($link_data['url']); ?>" target="<?php echo esc_attr($link_data['target'] ?: '_self'); ?>">
              <?php echo esc_html($link_data['title'] ?: $link_data['url']); ?>
            </a>
          <?php endif; ?>
        <?php endforeach; ?>
      </nav>
    <?php endif; ?>
  </div>
</div>
