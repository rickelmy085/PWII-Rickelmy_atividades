<?php
// 1. Configurações de conexão
$host = 'localhost';
$dbname = 'projeto_site';
$usuario = 'root';
$senha = '';
$contao = null;

try {
    $conexao = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Busca no banco de dados
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        // Mantive o ID maiúsculo na query para refletir o banco mas não esqueçam que PHP é case sensitive, gbosta
        $sql = "SELECT * FROM contatos WHERE ID = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $contao = $stmt->fetch(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar mensagem</title>
</head>

<body>
    <h2>Editor Contato</h2>
    <?php if ($contao) : ?>
        <form action="atualizar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $contao['id']; ?>" />

            <label>Nome:</label><br>
            <input type="text" name="nome" value="<?php echo htmlspecialchars($contao['nome']); ?>" required><br><br>

            <label>E-mail:</label><br>
            <input type="email" name="email" value="<?php echo htmlspecialchars($contao['email']); ?>" required><br><br>
            
            <label>Mensagem:</label><br>
            <textarea name="mensagem" required><?php echo htmlspecialchars($contao['mensagem']); ?></textarea><br><br>

            <button type="submit">Salvar Alterações</button>
        </form>
    <?php else : ?>
        <div style="color: red; border: 1px solid red; padding: 10px;">
            <strong>Atenção</strong> Contato não encontrado ou ID inválido. Verifique se a URL está correta (ex: editar.php?id=1).
        </div>
    <?php endif; ?>

    <br>
    <a href="newLista.php">Voltar para a lista</a>
</body>
</html>