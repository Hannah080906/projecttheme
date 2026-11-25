
  </div><!-- #content -->

  <?php
  /*
   * Social-Links im Footer (Figma: X, Instagram, YouTube, LinkedIn).
   * URLs hier anpassen, sobald die echten Profile feststehen.
   */
  $social_links = apply_filters( 'projecttheme_social_links', array(
    array( 'label' => 'X',         'icon' => 'x',         'url' => 'https://x.com/' ),
    array( 'label' => 'Instagram', 'icon' => 'instagram', 'url' => 'https://www.instagram.com/' ),
    array( 'label' => 'YouTube',   'icon' => 'youtube',   'url' => 'https://www.youtube.com/' ),
    array( 'label' => 'LinkedIn',  'icon' => 'linkedin',  'url' => 'https://www.linkedin.com/' ),
  ) );
  ?>

  <footer id="colophon" class="site-footer">
    <div class="site-footer__inner">
      <?php
      wp_nav_menu( array(
        'theme_location'  => 'menu-footer',
        'menu_id'         => 'menu-footer',
        'menu_class'      => 'site-footer__menu',
        'container'       => 'nav',
        'container_class' => 'site-footer__nav',
        'fallback_cb'     => false,
        'depth'           => 1,
      ) );
      ?>

      <?php if ( $social_links ) : ?>
        <ul class="site-footer__social">
          <?php foreach ( $social_links as $social ) :
            $icon_path = get_template_directory() . '/assets/images/icons/' . $social['icon'] . '.svg';
            if ( ! file_exists( $icon_path ) ) {
              continue;
            }
            ?>
            <li>
              <a href="<?php echo esc_url( $social['url'] ); ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr( $social['label'] ); ?>">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icons/' . $social['icon'] . '.svg' ); ?>" alt="" width="38" height="38">
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>
  </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
