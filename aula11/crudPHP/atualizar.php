<?php
$host = 'localhost';
$dbname = 'projeto_site';
$usuario = 'root';
$senha = '';

try {
    $conexao = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se os dados vieram do formulário (método POST)
    if (isset($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['mensagem'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    $sql = "UPDATE contatos SET nome = :nome, email = :email, mensagem = :mensagem WHERE id = :id";
    $stmt = $conexao->prepare($sql);

    // Passando os dados de forma segura (os parametros podem ser minúsculos sem problema)
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mensagem', $mensagem);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    $stmt->execute();

    // Redireciona de volta para a lista
    header("Location: newLista.php");
    exit();
    } else {
    echo "Acesso inválido ou dados incompletos.";
    }
} catch (PDOException $e) {
    die("Erro ao atualizar: " . $e->getMessage());
}
?>