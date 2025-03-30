<?php
/**
 * Plugin Name: WhatsApp Buttons
 * Description: Agrega un botón de WhatsApp en la descripción del producto y debajo de la descripción corta en el listado de productos.
 * Author: Daniel Diaz Tag Marketing
 * Author URI: https://www.linkedin.com/in/danielsdiaz35/
 * Version: 1.5
 */

// Evita el acceso directo
if (!defined('ABSPATH')) {
    exit;
}

// Agrega los estilos y scripts
function add_whatsapp_styles_scripts() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');

    echo '<style>
        .product-whatsapp-btn {
            background-color: #25D366;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 50px;
            text-align: center;
            cursor: pointer;
            display: inline-block;
            margin-top: 10px;
			margin-bottom: 10px;
            text-decoration: none;
        }
        .product-whatsapp-btn i {
            margin-right: 5px;
        }
    </style>';

    echo '<script>
        jQuery(document).ready(function($) {
            $(".product-whatsapp-btn").on("click", function() {
                var productTitle = $(".product_title").text() || $(this).data("product-title");
                var productLink = window.location.href || $(this).data("product-link");
                var whatsappUrl = "https://wa.me/573053261914?text=Quiero%20más%20información%20sobre%20" + encodeURIComponent(productTitle) + "%20" + encodeURIComponent(productLink);
                window.open(whatsappUrl, "_blank");
            });
        });
    </script>';
}
add_action('wp_footer', 'add_whatsapp_styles_scripts');

// Agrega el botón en la página del producto (con texto por defecto)
function add_product_whatsapp_button() {
    echo '<div class="product-whatsapp-btn">
        <i class="fab fa-whatsapp"></i> Contactar por WhatsApp
    </div>';
}
add_action('woocommerce_single_product_summary', 'add_product_whatsapp_button', 35);

// Shortcode con texto personalizable
function product_whatsapp_button_shortcode($atts) {
    $atts = shortcode_atts(array(
        'product_title' => '',
        'product_link' => '',
        'text' => 'Contactar por WhatsApp',
    ), $atts);

    if (empty($atts['product_title'])) {
        $atts['product_title'] = get_the_title();
    }
    if (empty($atts['product_link'])) {
        $atts['product_link'] = get_permalink();
    }

    return '<div class="product-whatsapp-btn" data-product-title="' . esc_attr($atts['product_title']) . '" data-product-link="' . esc_url($atts['product_link']) . '">
        <i class="fab fa-whatsapp"></i> ' . esc_html($atts['text']) . '
    </div>';
}
add_shortcode('whatsapp_button', 'product_whatsapp_button_shortcode');
