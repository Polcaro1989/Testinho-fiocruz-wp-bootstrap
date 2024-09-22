<?php

/**
 * Bootscore functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bootscore
 * @version 6.0.0
 */


// Exit if accessed directly
defined('ABSPATH') || exit;


/**
 * Update Checker
 * https://github.com/YahnisElsts/plugin-update-checker
 */
require 'inc/update/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/bootscore/bootscore/',
	__FILE__,
	'bootscore'
);

// Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');

function enqueue_my_custom_script() {
    wp_enqueue_script('meu-script-personalizado', get_template_directory_uri() . '/js/custom-script.js', array('jquery'), null, true );

    // Passar ajaxurl para o JavaScript
    wp_localize_script('meu-script-personalizado', 'ajaxurl', array( 'ajaxurl' => admin_url('admin-ajax.php') ));
}
add_action('wp_enqueue_scripts', 'enqueue_my_custom_script');


add_action('wp_ajax_enviar_contato', 'processar_contato');
add_action('wp_ajax_nopriv_enviar_contato', 'processar_contato');

function processar_contato() {
    global $wpdb;
    $table_name = 'contato';

    $nome = sanitize_text_field(trim($_POST['nome']));
    $email = sanitize_email(trim($_POST['email']));
    $mensagem = sanitize_textarea_field(trim($_POST['mensagem']));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email inválido.";
        wp_die();
    }

    // Verifica se o email ou nome já existem
    $email_existente = $wpdb->get_var($wpdb->prepare(
        "SELECT COUNT(*) FROM $table_name WHERE email = %s",
        $email
    ));

    $nome_existente = $wpdb->get_var($wpdb->prepare(
        "SELECT COUNT(*) FROM $table_name WHERE nome = %s",
        $nome
    ));

    // Mensagens de erro
    $mensagens = [];
    if ($email_existente > 0) {
        $mensagens[] = "Este email já está sendo utilizado.";
    }
    if ($nome_existente > 0) {
        $mensagens[] = "Este nome já esta sendo utilizado.";
    }

    // Se houver mensagens de erro, exibe-as
    if (!empty($mensagens)) {
        echo implode(" ", $mensagens);
        wp_die();
    }

    // Insere os dados na tabela
    $result = $wpdb->insert(
        $table_name,
        array(
            'nome' => $nome,
            'email' => $email,
            'mensagem' => $mensagem,
            'data_envio' => current_time('mysql')
        )
    );

    if ($result) {
        echo "Mensagem salva com sucesso!";
    } else {
        echo "Erro ao salvar a mensagem: " . $wpdb->last_error;
    }
    wp_die();
}



/**
 * Load required files
 */
require_once('inc/theme-setup.php');             // Theme setup and custom theme supports
require_once('inc/breadcrumb.php');              // Breadcrumb
require_once('inc/columns.php');                 // Main/sidebar column width and breakpoints
require_once('inc/comments.php');                // Comments
require_once('inc/enable-html.php');             // Enable HTML in category and author description
require_once('inc/enqueue.php');                 // Enqueue scripts and styles
require_once('inc/excerpt.php');                 // Adds excerpt to pages
require_once('inc/fontawesome.php');             // Adds shortcode for inserting Font Awesome icons
require_once('inc/hooks.php');                   // Custom hooks
require_once('inc/navwalker.php');               // Register the Bootstrap 5 navwalker
require_once('inc/navmenu.php');                 // Register the nav menus
require_once('inc/pagination.php');              // Pagination for loop and single posts
require_once('inc/password-protected-form.php'); // Form if post or page is protected by password
require_once('inc/template-tags.php');           // Meta information like author, date, comments, category and tags badges
require_once('inc/template-functions.php');      // Functions which enhance the theme by hooking into WordPress
require_once('inc/widgets.php');                 // Register widget area and disables Gutenberg in widgets
require_once('inc/deprecated.php');              // Fallback functions being dropped in v6

// Blocks
require_once('inc/blocks/block-widget-archives.php');        // Archive block
require_once('inc/blocks/block-widget-calendar.php');        // Calendar block
require_once('inc/blocks/block-widget-categories.php');      // Categories block
require_once('inc/blocks/block-widget-latest-comments.php'); // Latest posts block
require_once('inc/blocks/block-widget-latest-posts.php');    // Latest posts block
require_once('inc/blocks/block-widget-search.php');          // Searchform block


/**
 * Load WooCommerce scripts if plugin is activated
 */
if (class_exists('WooCommerce')) {
  require get_template_directory() . '/woocommerce/wc-functions.php';
}


/**
 * Load Jetpack compatibility file
 */
if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/inc/jetpack.php';
}
function redirecionar_para_template_personalizado() {
    // Verifica se a p  gina    a "Contato"
    if (is_page('contato')) {
        // Inclui o arquivo do template
        $template_path = get_template_directory() . '/contato.php';
        
        // Verifica se o arquivo existe antes de carregar
        if (file_exists($template_path)) {
            include($template_path);
            exit(); // Evita que o restante do conte  do seja carregado
        } else {
            // Caso o arquivo n  o exista, voc   pode exibir uma mensagem de erro ou redirecionar
            echo "O template Contato.php n  o foi encontrado.";
        }
    }
}
add_action('template_redirect', 'redirecionar_para_template_personalizado');

require_once get_template_directory(). '/class-wpbootstrap-navwalker.php';

register_nav_menus( array(
        'principal' => __('Menu principal', 'bootscore-main'),

));
/**
 * Customizar página de login.
 */

function my_loginlcustomization() {
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/custom-login-style.css" />';
}

add_action('login_head', 'my_loginlcustomization');


/**
 * Remover tradutor do login.
 */
add_filter( 'login_display_language_dropdown', '__return_false' );

?>
