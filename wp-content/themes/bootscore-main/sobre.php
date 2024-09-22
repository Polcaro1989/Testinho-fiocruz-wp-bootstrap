<?php
/* 
Template Name: Sobre a Fiocruz 
*/

get_header(); // Inclui o cabeçalho do tema

global $wpdb; // Usar o objeto do WordPress para interagir com o banco de dados

// Nome da tabela (sem prefixo)
$table_name = 'fiocruz_sobre'; // Altere para o nome da sua tabela de sobre

// Obter os dados da tabela
$fiocruz_data = $wpdb->get_row("SELECT titulo, subtitulo, texto FROM $table_name WHERE id = 1");

if ($fiocruz_data) {
    $titulo = esc_html($fiocruz_data->titulo);
    $subtitulo = esc_html($fiocruz_data->subtitulo);
    $texto = esc_html($fiocruz_data->texto);
} else {
    $titulo = 'Sobre a Fiocruz';
    $subtitulo = '';
    $texto = 'Informações não disponíveis.';
}
?>

<div class="container mt-5 mb-5">
    <!-- Título Principal da Página -->
    <h1 class="text-center text-danger"><?php echo $titulo; ?></h1>

    <!-- Subtítulo -->
<?php /*    <?php if ($subtitulo): ?>
        <h5 class="text-center"><?php echo $subtitulo; ?></h5>
    <?php endif; ?> */ ?>

    <!-- Parágrafo Descritivo -->
    <div class="container">
    <div class="text-center mt-3 w-75 mx-auto">
        <?php echo nl2br($texto); ?>
    </div>
    </div>



    <!-- Imagem -->
    <div class="text-center mt-5 mb-4">
        <img src="https://www.fiotec.fiocruz.br/images/2020/Fiocruz-120anos_site.jpg" alt="Fiocruz" class="img-fluid">
        <!-- Substitua o caminho da imagem conforme necess  rio -->
    </div>
</div>
<?php
get_footer(); // Inclui o rodapé do tema
?>

