<?php
/* 
Template Name: Institucional Fiocruz 
*/

get_header(); // Inclui o cabe  alho do tema

// Certifique-se de que o WordPress est   carregado
global $wpdb;

// Nome da tabela (sem prefixo)
$table_name = 'fiocruz_institucional'; // Nome da tabela

// Fun    o para obter os dados da primeira linha
function get_first_card_data() {
    global $wpdb;
    $table_name = 'fiocruz_institucional'; // Nome da tabela
    // Obter os dados da primeira linha
    return $wpdb->get_row("SELECT titulo_one, titulo_two, titulo_three, titulo_four, titulo_five, subtitulo_one, subtitulo_two, subtitulo_three, subtitulo_four, subtitulo_five FROM $table_name ORDER BY id LIMIT 1");
}

// Obter os dados para os elementos HTML
$first_card_data = get_first_card_data();
$first_card_titulo_one = isset($first_card_data->titulo_one) ? $first_card_data->titulo_one : '';
$first_card_subtitulo_one = isset($first_card_data->subtitulo_one) ? $first_card_data->subtitulo_one : '';
$first_card_titulo_two = isset($first_card_data->titulo_two) ? $first_card_data->titulo_two : '';
$first_card_subtitulo_two = isset($first_card_data->subtitulo_two) ? $first_card_data->subtitulo_two : '';
$first_card_titulo_three = isset($first_card_data->titulo_three) ? $first_card_data->titulo_three : '';
$first_card_subtitulo_three = isset($first_card_data->subtitulo_three) ? $first_card_data->subtitulo_three : '';
$first_card_titulo_four = isset($first_card_data->titulo_four) ? $first_card_data->titulo_four : '';
$first_card_subtitulo_four = isset($first_card_data->subtitulo_four) ? $first_card_data->subtitulo_four : '';
$first_card_titulo_five = isset($first_card_data->titulo_five) ? $first_card_data->titulo_five : '';
$first_card_subtitulo_five = isset($first_card_data->subtitulo_five) ? $first_card_data->subtitulo_five : '';
?>

<div class="container mt-5">
    <h1 class="text-center text-danger"><?php echo esc_html($first_card_titulo_one); ?></h1>
 <?php /* <h5 class="text-center"><?php echo esc_html($first_card_subtitulo_one); ?></h5>*/?>
</div>

<div class="container-group text-center mt-5 mb-5">
    <div class="row row-cols-8 mx-auto">
        <?php /*<div class="col text-center">
            <h2><?php echo esc_html($first_card_titulo_two); ?></h2>
            <p class="col-md-10 mx-auto"><?php echo esc_html($first_card_data->subtitulo_two); ?></p>
        </div>*/ ?>
        <div class="col">
            <h3><?php echo esc_html($first_card_titulo_three); ?></h3>
            <p class="col-md-10 mx-auto"><?php echo esc_html($first_card_subtitulo_three); ?></p>
        </div>
        <div class="col">
            <h3><?php echo esc_html($first_card_titulo_four); ?></h3>
            <p class="col-md-10 mx-auto"><?php echo esc_html($first_card_subtitulo_four); ?></p>
        </div>
        <div class="col">
            <h3><?php echo esc_html($first_card_titulo_five); ?></h3>
            <p class="col-md-10 mx-auto"><?php echo esc_html($first_card_subtitulo_five); ?></p>
        </div>
    </div>
</div> <!-- Fechamento do container-group -->

<!-- Fim do container -->


<?php get_footer(); ?>
