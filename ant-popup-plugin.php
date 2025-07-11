<?php
/*
Plugin Name: Simple Popup Plugin
Description: A simple popup plugin with admin text input, CTA button, and delay.
Version: 1.1
Author: Mushfikur Rahman
*/

if (!defined('ABSPATH')) exit;

// Load frontend assets
function spp_enqueue_scripts() {
    wp_enqueue_style('spp-style', plugin_dir_url(__FILE__) . 'style.css');
    wp_enqueue_script('spp-script', plugin_dir_url(__FILE__) . 'popup.js', array('jquery'), null, true);

    $options = get_option('spp_settings');

    wp_localize_script('spp-script', 'spp_data', array(
        'popup_text'   => esc_html($options['popup_text'] ?? ''),
        'cta_text'     => esc_html($options['cta_text'] ?? 'Click Here'),
        'cta_link'     => esc_url($options['cta_link'] ?? '#'),
        'popup_delay'  => intval($options['popup_delay'] ?? 5),
        'display_url'  => esc_html($options['display_url'] ?? '')
    ));
}
add_action('wp_enqueue_scripts', 'spp_enqueue_scripts');

// Admin menu
function spp_admin_menu() {
    add_options_page('Simple Popup Settings', 'Simple Popup', 'manage_options', 'spp-settings', 'spp_settings_page');
}
add_action('admin_menu', 'spp_admin_menu');

// Admin page content
function spp_settings_page() {
    include plugin_dir_path(__FILE__) . 'admin.php';
}

// Register settings
function spp_register_settings() {
    register_setting('spp_settings_group', 'spp_settings');
}
add_action('admin_init', 'spp_register_settings');
