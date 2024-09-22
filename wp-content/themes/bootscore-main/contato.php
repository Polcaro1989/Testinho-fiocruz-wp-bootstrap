<?php
/* 
Template Name: Contato 
*/

get_header(); // Inclui o cabeçalho do tema

global $wpdb; // Usar o objeto do WordPress para interagir com o banco de dados

// Nome da tabela (sem prefixo)
$table_name = 'contato'; // Altere para o nome da sua tabela de contatos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizar os dados recebidos
    $nome = sanitize_text_field(trim($_POST['nome']));
    $email = sanitize_email(trim($_POST['email']));
    $mensagem = sanitize_textarea_field(trim($_POST['mensagem']));

    // Verificar se o email é válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email inválido.";
        exit;
    }

    // Inserir os dados na tabela
    $result = $wpdb->insert(
        $table_name,
        array(
            'nome' => $nome,
            'email' => $email,
            'mensagem' => $mensagem,
            'data_envio' => current_time('mysql') // Adiciona a data de criação
        )
    );

    if ($result) {
        echo "Mensagem salva com sucesso!";
    } else {
        echo "Erro ao salvar a mensagem: " . $wpdb->last_error;
    }
    exit; // Termina o script após processar o formulário
}
?>
<div class="container mt-5 mb-5">
    <h1 class="text-center text-danger">Entre em Contato</h1>
    <p class="text-center">Preencha o formulario abaixo para entrar em contato conosco.</p>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form id="form" action="" method="post" novalidate>
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                    <div class="invalid-feedback">Por favor, insira seu nome.</div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <div class="invalid-feedback">Por favor, insira um e-mail valido.</div>
                </div>
                <div class="mb-3">
                    <label for="mensagem" class="form-label">Mensagem</label>
                    <textarea class="form-control" id="mensagem" name="mensagem" rows="5" required></textarea>
                    <div class="invalid-feedback">Por favor, escreva uma mensagem.</div>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">Enviar Mensagem</button>
                </div>
            </form>
            <div id="response" class="alert alert-primary"></div>
        </div>
    </div>
</div>

<script>
  $(document).ready(function() {
    // Limpa a div de resposta ao carregar a página
    $('#response').html('');

    $('#form').submit(function(event) {
        event.preventDefault();

        var formData = $('#form').serialize() + '&action=enviar_contato';
        $.ajax({
            type: 'POST',
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            data: formData,
            success: function(response) {
                $('#response').html(response).fadeIn(); // Exibe a resposta
                setTimeout(function() {
                    $('#response').fadeOut(); // Esconde a resposta após 5 segundos
                }, 5000); // 5000 ms = 5 segundos
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});

 </script>
<script>
    // Obtém o formulário
    var form = document.getElementById('form');

    // Adiciona um listener para o evento de submissão
    form.addEventListener('submit', function (event) {
        // Verifica se o formulário é válido
        if (!form.checkValidity()) {
            event.preventDefault(); // Impede o envio se o formulário não é válido
            event.stopPropagation(); // Para a propagação do evento
        }

        // Adiciona/remova a classe 'was-validated' para mostrar a validação
        form.classList.add('was-validated');
    });
</script>

<?php get_footer();  ?>
