<?php
// Certifique-se de que o WordPress esteja carregado
require_once('wp-load.php'); // Ajuste o caminho conforme necessário

global $wpdb;

// Nome da tabela com prefixo
$table_name = $wpdb->prefix . 'contato';
var_dump($data);
// Verifica se o método de requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $nome = sanitize_text_field($_POST['nome']);
    $email = sanitize_email($_POST['email']);
    $mensagem = sanitize_textarea_field($_POST['mensagem']);

    // Prepara os dados para inserção
    $data = [
        'nome' => $nome,
        'email' => $email,
        'mensagem' => $mensagem,
        'data_envio' => current_time('mysql') // Captura a data e hora atual
    ];

    // Insere os dados na tabela
    $inserted = $wpdb->insert($table_name, $data);

    if ($inserted) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar a mensagem: " . $wpdb->last_error;
    }
} else {
    echo "Método de requisição inválido.";
}
?>
