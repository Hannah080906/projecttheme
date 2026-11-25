<?php

// ACF functions here

// ACF helper functions
function section_open(array $opts = []) {
    $name      = $opts['name'] ?? '';
    $id        = $opts['id'] ?? '';
    $bg        = $opts['bg'] ?? 'none';
    $container = $opts['container'] ?? 'container-lg';
    $py        = $opts['padding_y'] ?? 'py-5';
    $show      = $opts['show_on'] ?? 'everywhere'; // everywhere | only-mobile | only-desktop

    // Sichtbarkeits-Klassen mappen (Bootstrap)
    $visClass = '';
    if ($show === 'only-mobile')  $visClass = 'd-lg-none';
    if ($show === 'only-desktop') $visClass = 'd-none d-lg-block';

    $classesSection = trim("section section--bg-{$bg} {$py} {$visClass}");
    echo '<section'.($id ? ' id="'.esc_attr($id).'"' : '').' class="'.$name.' '.esc_attr($classesSection).'">';
    
    if ($container !== 'none') {
        echo '<div class="'.esc_attr($container).'">';
    }
}

function section_close(array $opts = []) {
    $container = $opts['container'] ?? 'container-lg';
    if ($container !== 'none') {
        echo '</div>';
    }
    echo '</section>';
}



// Enable ACF Local JSON
add_filter('acf/settings/save_json', function() {
    return get_stylesheet_directory() . '/acf-json';
});

add_filter('acf/settings/load_json', function($paths) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-json';

    return $paths;
});

/**
 * Beschriftung eines ACF-Link-Felds aufbereiten:
 * HTML-Entities dekodieren und "->" durch einen echten Pfeil ersetzen (Figma: "→").
 */
function gd_link_label($link, $fallback = '') {
    $label = is_array($link) && !empty($link['title']) ? $link['title'] : $fallback;
    $label = html_entity_decode($label, ENT_QUOTES, 'UTF-8');
    $label = preg_replace('/\s*-+>\s*$/u', ' →', $label);
    return trim($label);
}

/**
 * Gibt einen Link als Figma-"Button Primary" aus.
 * $variant: '' (Aubergine), 'pink' oder 'olive'.
 */
function gd_button($link, $fallback = '', $variant = '') {
    if (!is_array($link) || empty($link['url'])) {
        return;
    }
    $classes = 'gd-button' . ($variant ? ' gd-button--' . $variant : '');
    $target  = !empty($link['target']) ? $link['target'] : '_self';
    printf(
        '<a class="%1$s" href="%2$s" target="%3$s"%4$s>%5$s</a>',
        esc_attr($classes),
        esc_url($link['url']),
        esc_attr($target),
        $target === '_blank' ? ' rel="noopener"' : '',
        esc_html(gd_link_label($link, $fallback))
    );
}

/**
 * Überschrift nach einem Komma umbrechen ("your city,<br>your people.") – wie in Figma.
 */
function gd_title_with_breaks($title) {
    $parts = array_map('esc_html', preg_split('/,\s+/u', trim($title)));
    return implode(',<br>', $parts);
}
