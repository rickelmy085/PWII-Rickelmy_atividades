<?php
// configurtar o banco de dados
$host = 'localhost';
$dbname = 'projeto_site';
$usuario = 'root';
$senha = '';

// Tentativa de conexão PDO 
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Se der erro na conexão, o sistema para e avisa
    die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}

//Aqui sera o o comando do SQL para buscar as informações do no BD
//Aqui pedirmos para ele trazer as colunas do banco contatos
$sql = "SELECT id , nome, email, mensagem FROM contatos";
$stmt = $conn->prepare($sql);
$stmt->execute();

// Agora vamos guarda esses resultados
// O FETCH_ASSOC ele transforma as informações do bd em um array, assim o PHP consegue ler as informações
$mensagens = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 12px;
            border: none;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <h2>Mensagem Interceptada(BD)</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome/Sobreviventes</th>
            <th>E-mail de Contato</th>
            <th>Conteúdo da Mensagem</th>
            <th>Ação</th> <!--Nova coluna adicionada! -->
        </tr>

        <?php foreach ($mensagens as $linha): ?>
            <tr>
                <td><?php echo $linha['id']; ?></td>
                <td><?php echo $linha['nome']; ?></td>
                <td><?php echo $linha['email']; ?></td>
                <td><?php echo $linha['mensagem']; ?></td>
                <td>
                    <a href="deletar.php?id=<?php echo $linha['id']; ?>" class="btn-excluir" onclick="return confirm('Vamo excluir, depois disso ele não volta');">Excluir</a>
                </td>
            </tr>

        <?php endforeach; ?>

    </table>

    <br>
    <a href="index.html">Voltar para o Formulário</a>

</body>

</html>