<?php
require_once 'init.php';
// pega os dados do formuário
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
$tipoid = isset($_POST['selectTipo']) ? $_POST['selectTipo'] : null;

// validação (bem simples, só pra evitar dados vazios)
if (empty($descricao) || empty($tipoid))
{
    echo "Volte e preencha todos os campos";
    exit;
}
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO refrigerantes(descricao, tipoid) VALUES(:descricao, :tipoid)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':descricao', $descricao);
$stmt->bindParam(':tipoid', $tipoid);

if ($stmt->execute())
{
    header('Location: msgSucesso.html');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>