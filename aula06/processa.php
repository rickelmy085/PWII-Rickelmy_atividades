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
    die("Erro ao conectar com o banco de dados: " . $e->getMessage ()) ;
} 
// Receber os dados do formulario HTML
// o if garante que só vai tentar  salvar se o formulario realmente foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $nome_recebido = $_POST['nome'];
    $email_recebido = $_POST['email'];
    $mensagem_recebida = $_POST['mensagem'];

    // Prepara o comando SQL (O INSERT)
    // Usamos: :nome, :email e :mensagem como "coringas" por segurança
    $sql = "INSERT INTO contatos (nome, email, mensagem) values (:nome, :email, :mensagem)";
    $stmt = $conn->prepare($sql);


    //Substituir os coringas pelos dados reais que vieram do formulario
    $stmt->bindParam(':nome', $nome_recebido);
    $stmt->bindParam(':email', $email_recebido);
    $stmt->bindParam(':mensagem', $mensagem_recebida);

    if ($stmt->execute()) {
        echo "<h1>Sucesso!</h1>";
        echo "<p>banco de dados salvo</p>";
        echo "<a href='idex.html'>Voltar</a>";
    } else { 
        echo "Erro ao tentar salvor os dados";
    }
}
?>