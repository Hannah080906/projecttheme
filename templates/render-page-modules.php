<?php
/**
 * Rendert die ACF Flexible-Content-Felder aus `page_modules`
 * Erwartet pro Layout ein Partial unter: /template-parts/flex/layout-*.php
 */

if (!function_exists('have_rows') || !have_rows('page_modules')) {
  return;
}

while (have_rows('page_modules')) : the_row();

  $layout = get_row_layout();

  // GrazDoing-Module laufen vollflächig und bringen eigene Abstände mit (Figma).
  $full_width_layouts = [
    'hero', 'top', 'what_are_you_looking_for', 'find_your_vibe', 'comming_up',
    'submit_event', 'whats_happening', 'events', 'event_details', 'pictures',
    'contact', 'submit_your_event',
  ];
  $is_hero = in_array($layout, $full_width_layouts, true);

  // Section-Optionen 
  $opts = [
    'name'       => $layout,
    'container'  => $is_hero ? 'none' : (get_sub_field('container') ?: 'container-lg'),
    'padding_y'  => $is_hero ? 'p-0' : (get_sub_field('padding_y') ?: 'py-5'),
    'bg'         => get_sub_field('background') ?: 'none',
    'id'         => get_sub_field('id-anchor') ?: '',
    'show_on'    => get_sub_field('show-on') ?: 'everywhere',
  ];

  // Öffne Section-Hülle nur, wenn Helper existieren – sonst simple Wrapper
  if (function_exists('section_open')) {
    section_open($opts);
  } else {
    $name = $opts['name'];
    $id   = $opts['id'] ? ' id="'.esc_attr($opts['id']).'"' : '';
    $cont = $opts['container'];
    $py   = $opts['padding_y'];
    echo '<section'.$id.' class="'.$name.' '.$py.'">';
    if ($cont !== 'none') echo '<div class="'.$cont.'">';
  }

  switch ($layout) {
    case 'hero':
      get_template_part('template-parts/flex/layout', 'hero'); break;

    case 'intro':
      get_template_part('template-parts/flex/layout', 'intro'); break;

    case 'text_1col':
      get_template_part('template-parts/flex/layout', 'text-1col'); break;

    case 'text_2col':
      get_template_part('template-parts/flex/layout', 'text-2col'); break;

    case 'text_3col':
      get_template_part('template-parts/flex/layout', 'text-3col'); break;

    case 'text_4col':
      get_template_part('template-parts/flex/layout', 'text-4col'); break;

    case 'text_left_image_right':
      get_template_part('template-parts/flex/layout', 'text-left-image-right'); break;

    case 'image_left_text_right':
      get_template_part('template-parts/flex/layout', 'image-left-text-right'); break;

    case 'image_slider':
      get_template_part('template-parts/flex/layout', 'image-slider'); break;

    case 'bildboxen':
      get_template_part('template-parts/flex/layout', 'bildboxen'); break;

    case 'galerie':
      get_template_part('template-parts/flex/layout', 'galerie'); break;

    case 'tabs':
      get_template_part('template-parts/flex/layout', 'tabs'); break;

    case 'akkordeon':
      get_template_part('template-parts/flex/layout', 'akkordeon'); break;

    case 'breaker':
      get_template_part('template-parts/flex/layout', 'breaker'); break;

    case 'code_editor':
      get_template_part('template-parts/flex/layout', 'code-editor'); break;

    case 'project_highlight':
      get_template_part('template-parts/flex/layout', 'project-highlight'); break;

    case 'google_map':
      get_template_part('template-parts/flex/layout', 'google-map'); break;

    case 'menu':
      get_template_part('template-parts/flex/layout', 'menu'); break;

    case 'top':
      get_template_part('template-parts/flex/layout', 'top'); break;

    case 'what_are_you_looking_for':
      get_template_part('template-parts/flex/layout', 'what-are-you-looking-for'); break;

    case 'find_your_vibe':
      get_template_part('template-parts/flex/layout', 'find-your-vibe'); break;

    case 'comming_up':
      get_template_part('template-parts/flex/layout', 'comming-up'); break;

    case 'submit_event':
      get_template_part('template-parts/flex/layout', 'submit-event'); break;

    case 'footer':
      get_template_part('template-parts/flex/layout', 'footer'); break;

    case 'whats_happening':
      get_template_part('template-parts/flex/layout', 'whats-happening'); break;

    case 'events':
      get_template_part('template-parts/flex/layout', 'events'); break;

    case 'event_details':
      get_template_part('template-parts/flex/layout', 'event-details'); break;

    case 'pictures':
      get_template_part('template-parts/flex/layout', 'pictures'); break;

    case 'contact':
      get_template_part('template-parts/flex/layout', 'contact'); break;

    case 'submit_your_event':
      get_template_part('template-parts/flex/layout', 'submit-your-event'); break;
  }

  if (function_exists('section_close')) {
    section_close($opts);
  } else {
    if ($opts['container'] !== 'none') echo '</div>';
    echo '</section>';
  }

endwhile;