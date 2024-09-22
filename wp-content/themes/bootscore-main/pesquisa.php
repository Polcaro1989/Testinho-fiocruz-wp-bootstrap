<?php
/* 
Template Name: Pesquisa Fiocruz 
*/

get_header(); // Inclui o cabeçalho do tema

// Certifique-se de que o WordPress est   carregado
global $wpdb;

// Nome da tabela (sem prefixo)
$table_name = 'pesquisa_fiocruz'; // Nome da tabela atualizada

// Fun    o para obter os dados da primeira linha
function get_first_card_data() {
    global $wpdb;
    $table_name = 'pesquisa_fiocruz'; // Nome da tabela atualizada
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
    <!-- Título Principal da Página -->
    <h1 class="text-center text-danger"><?php echo esc_html($first_card_titulo_one); ?></h1>
</div>

<div class="container-group text-center mt-5 mb-5">
    <div class="row"> <!-- Reduzido o gap entre colunas -->
        <!-- Grupo de Pesquisa 1 -->
        <div class="col">
            <h3><?php echo esc_html($first_card_titulo_two); ?></h3>
            <p class="col-md-8 mx-auto"><?php echo esc_html($first_card_subtitulo_two); ?></p> <!-- Removido espaço inferior -->
        </div>

        <!-- Grupo de Pesquisa 2 -->
        <div class="col">
            <h3><?php echo esc_html($first_card_titulo_three); ?></h3>
            <p class="col-md-8 mx-auto"><?php echo esc_html($first_card_subtitulo_three); ?></p>
        </div>

        <!-- Projeto de Pesquisa 1 -->
        <div class="col">
            <h3><?php echo esc_html($first_card_titulo_four); ?></h3>
            <p class="col-md-8 mx-auto"><?php echo esc_html($first_card_subtitulo_four); ?></p>
        </div>

        <!-- Projeto de Pesquisa 2 -->
        <div class="col">
            <h3><?php echo esc_html($first_card_titulo_five); ?></h3>
            <p class="col-md-8 mx-auto"><?php echo esc_html($first_card_subtitulo_five); ?></p>
        </div>
    </div>
</div> <!-- Fechamento do container --> <!-- Fim do container -->


<?php get_footer(); ?>
