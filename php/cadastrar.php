<?php
include 'conexao.php';

// Validação simples para garantir que os campos não estão vazios
if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha'])) {
    echo "Por favor, preencha todos os campos.";
    exit;
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

try {
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$nome, $email, $senha]);
    echo "Cadastro realizado com sucesso!";
} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        echo "Email já cadastrado.";
    } else {
        echo "Erro: " . $e->getMessage();
    }
}
?>
