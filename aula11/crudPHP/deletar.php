<?php
// configurtar o banco de dados
$host = 'localhost';
$dbname = 'projeto_site';
$usuario = 'root';
$senha = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Verifica se ele passou pela URL 
     if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //Usar o comando de DELET do SQL para fazer isso
    $sql = 'DELETE FROM contatos WHERE id = :id';
    $stmt = $conn->prepare($sql);

    //Passando ele de forma segura contra SQL Injection
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    }

    //Redirecionar para a lista de novo após o DELETE
    header("Location: newLista.php");
    exit();


} catch (PDOException $e) {
    die("ERRO ao deletar" . $e->getMessage());

}


?>