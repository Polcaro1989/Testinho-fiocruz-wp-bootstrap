<?php
/*
Template Name: Página Fiocruz
*/

// Inclui o cabeçalho do tema
get_header(); 

?>
<?php
// Certifique-se de que o WordPress est   carregado
global $wpdb;

// Nome da tabela (sem prefixo)
$table_name = 'fiocruz_teste';

// Fun    o para obter o texto da primeira linha
function get_first_card_data() {
    global $wpdb;
    $table_name = 'fiocruz_teste';
    // Obter os dados da primeira linha
    return $wpdb->get_row( "SELECT texto, h1 FROM $table_name ORDER BY id LIMIT 1" );
}

// Obter os dados para os elementos HTML
$first_card_data = get_first_card_data();
$first_card_text = isset($first_card_data->texto) ? $first_card_data->texto : '';
$first_card_h1 = isset($first_card_data->h1) ? $first_card_data->h1 : '';
?>



<div class="container mb-5">
    <h1 class="text-danger text-center mt-3" style="margin-bottom: 15px;">
        <?= esc_html($first_card_h1); ?>
    </h1>
    <div class="card-group mt-4">
        <div class="card" style="margin: 15px;">
            <img src="https://github.com/abraao69/Setup-Docker-PHP-7.4/blob/master/DSCN5511_alt-1024x768.jpg?raw=true" class="card-img-top" style="width: 100%; height: 400px; object-fit: cover;">
            <div class="card-body">
                <h1 class="card-title text-danger"><?= esc_html($first_card_h1); ?></h1>
                <p class="card-text"><?= esc_html($first_card_text); ?></p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>

        <div class="card" style="margin: 15px;">
            <img src="https://github.com/abraao69/Setup-Docker-PHP-7.4/blob/master/COC8508.jpg?raw=true" class="card-img-top" style="width: 100%; height: 400px; object-fit: cover;">
            <div class="card-body">
                <h1 class="card-title text-danger"><?= esc_html($first_card_h1); ?></h1>
                <p class="card-text"><?= esc_html($first_card_text); ?></p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div> <!-- Fim do card-group -->

    <!-- Carousel -->
    <h1 class="text-danger text-center mt-4" style="margin-bottom: 15px;">
    <?= esc_html($first_card_h1); ?>
    </h1>
    <div id="carouselExampleControls" class="carousel slide mt-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div style="display: flex; justify-content: center;">
                    <img src="https://github.com/abraao69/Setup-Docker-PHP-7.4/blob/master/Fachada.jpg?raw=true" class="d-block" style="height: 700px; width: 50%; object-fit: cover;">
                    <img src="https://github.com/abraao69/Setup-Docker-PHP-7.4/blob/master/COC8508.jpg?raw=true" class="d-block" style="height: 700px; width: 50%; object-fit: cover;">
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://github.com/abraao69/Setup-Docker-PHP-7.4/blob/master/20220823_COC.jpg?raw=true" class="d-block w-100" style="height: 700px; width: auto; object-fit: cover;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

</div> <!-- Fechamento do container --> <!-- Fim do container -->

<!-- Fim do container -->


<?php
// Inclui o rodapé do tema
get_footer();
?>

