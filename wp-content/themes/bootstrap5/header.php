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
var_dump($first_card_data->texto);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Hello, world!</title>
</head>
<body>

    <div class="container">
        <h1><?php echo esc_html($first_card_h1); ?></h1>
        <p><?php echo esc_html($first_card_text); ?></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" in>
  </head>
  <body>
