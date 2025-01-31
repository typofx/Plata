<?php include $_SERVER['DOCUMENT_ROOT'] . '/plataforma/painel/is_logged.php';?>
<?php



// Verifica se o parâmetro id foi passado na URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Incluir o arquivo de conexão com o banco de dados
    include 'conexao.php';

    // Filtrar o id para evitar injeção de SQL
    $id = $_GET['id'];

    // Preparar a consulta SQL para deletar o registro
    $sql = "DELETE FROM granna80_bdlinks.users WHERE id = ?";

    // Preparar a declaração
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        trigger_error($conn->error, E_USER_ERROR);
    }

    // Vincular parâmetros e executar a declaração
    $stmt->bind_param('i', $id);
    $stmt->execute();

    // Verificar se a exclusão foi bem-sucedida
    if ($stmt->affected_rows > 0) {
        // Redirecionar de volta para a página de pagamentos
        echo "<script>window.location.href = 'index.php';</script>";
    } else {
        echo "Erro ao deletar o registro.";
    }


    $stmt->close();
    $conn->close();
} else {
    echo "ID inválido ou não especificado.";
}
?>
