<?php
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form;
use Drupal\Core\Extension\ThemeHandler;
use Drupal\Core\Theme\ThemeInitializationInterface;
use Drupal\Core\Theme\ThemeManagerInterface;
use Drupal\Core\Theme\ThemeSettings;
use Drupal\system\Form\ThemeSettingsForm;


function getColorValue($current_color, $default_color){
  if (!empty($current_color)){
    return $current_color;
  }else{
    return $default_color;
  }
}

// getColorValue(theme_get_setting('primary_color_dark', 'medvind'), '#ffcc00')

function medvind_form_system_theme_settings_alter(&$form, Drupal\Core\Form\FormStateInterface $form_state) {

  $form['medvind_settings'] = array(
    '#type' => 'vertical_tabs',
    '#default_tab' => 'edit-publication',
    '#weight' => -1001,
  );

  // Color tab
  $form['color_settings'] = array(
    '#type' => 'details',
    '#title' => t('Colours'),
    '#description' => t('Your sites colours.'),
    '#group' => 'medvind_settings',
  );

  // Primary colors
  $form['color_settings']['color_primary'] = [
    '#type' => 'details',
    '#title' => t('Primary colors'),
    '#description' => t('Set your sites primary colours.'),
  ];
  $form['color_settings']['color_primary']['color_primary_light'] = [
    '#type' => 'color',
    '#title' => t('Primary light colour'),
    '#default_value' => getColorValue(theme_get_setting('color_primary_light', 'medvind'), '#f9f9f9'),
    '#description' => t('Sets your sites primary colour'),
  ];
  $form['color_settings']['color_primary']['color_primary_dark'] = [
    '#type' => 'color',
    '#title' => t('Primary dark colour'),
    '#default_value' => getColorValue(theme_get_setting('color_primary_dark', 'medvind'), '#191919'),
    '#description' => t('Sets your sites primary colour'),
  ];

  // Secondary colors
  $form['color_settings']['color_secondary'] = [
    '#type' => 'details',
    '#title' => t('Secondary colors'),
    '#description' => t('Set your sites secondary colours.'),
  ];
  $form['color_settings']['color_secondary']['color_secondary_light'] = [
    '#type' => 'color',
    '#title' => t('Secondary light colour'),
    '#default_value' => getColorValue(theme_get_setting('color_secondary_light', 'medvind'), '#F4F4F7'),
    '#description' => t('Sets your sites secondary colour'),
  ];
  $form['color_settings']['color_secondary']['color_secondary_dark'] = [
    '#type' => 'color',
    '#title' => t('Secondary dark colour'),
    '#default_value' => getColorValue(theme_get_setting('color_secondary_dark', 'medvind'), '#2E5299'),
    '#description' => t('Sets your sites secondary colour'),
  ];

  // Tertiary colors
  $form['color_settings']['color_tertiary'] = [
    '#type' => 'details',
    '#title' => t('Tertiary colors'),
    '#description' => t('Set your sites tertiary colours.'),
  ];
  $form['color_settings']['color_tertiary']['color_tertiary_light'] = [
    '#type' => 'color',
    '#title' => t('Tertiary light colour'),
    '#default_value' => getColorValue(theme_get_setting('color_tertiary_light', 'medvind'), '#E4E4E6'),
    '#description' => t('Sets your sites tertiary colour'),
  ];
  $form['color_settings']['color_tertiary']['color_tertiary_dark'] = [
    '#type' => 'color',
    '#title' => t('Tertiary dark colour'),
    '#default_value' => getColorValue(theme_get_setting('color_tertiary_dark', 'medvind'), '#0085B3'),
    '#description' => t('Sets your sites tertiary colour'),
  ];

  // Menu tab
  $form['menu-settings'] = array(
    '#type' => 'details',
    '#title' => t('Medvind menu settings'),
    '#description' => t('Your sites menu settings'),
    '#group' => 'medvind_settings',
  );
  $form['menu-settings']['mobile_menu_all_widths'] = [
    '#type' => 'checkbox',
    '#title' => t('Enable mobile menu at all widths'),
    '#default_value' => theme_get_setting('mobile_menu_all_widths', 'medvind'),
    '#description' => t('Enables the mobile menu toggle at all widths.'),
    '#states' => array(
      'disabled' => array(
        ':input[name="sidebar_menu"]' => array('checked' => TRUE),
      ),
    ),
  ];
  $form['menu-settings']['sidebar_menu'] = [
    '#type' => 'checkbox',
    '#title' => t('Enable sidebar menu'),
    '#default_value' => theme_get_setting('sidebar_menu', 'medvind'),
    '#description' => t('Enables the sidebar menu at desktop sizes.'),
    '#states' => array(
      'disabled' => array(
        ':input[name="mobile_menu_all_widths"]' => array('checked' => TRUE),
      ),
    ),
  ];
}