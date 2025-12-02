<?php
require 'conexao.php';

$erro = '';
$sucesso = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Receber e limpar os dados
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    $senha = $_POST['senha'];
    $endereco = trim($_POST['endereco']);

    // 2. Validação básica
    if (empty($nome) || empty($email) || empty($senha)) {
        $erro = "Por favor, preencha todos os campos obrigatórios.";
    } else {
        // 3. Verificar se o e-mail já existe
        $stmt = $pdo->prepare("SELECT id FROM clientes WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->rowCount() > 0) {
            $erro = "Este e-mail já está cadastrado.";
        } else {
            // 4. Criptografar a senha (Segurança!)
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            // 5. Inserir no banco
            $sql = "INSERT INTO clientes (nome, email, telefone, senha, endereco) VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            
            if ($stmt->execute([$nome, $email, $telefone, $senhaHash, $endereco])) {
                $sucesso = "Cadastro realizado com sucesso! Redirecionando...";
                header("refresh:3;url=index.php"); // Redireciona após 3 segundos
            } else {
                $erro = "Erro ao cadastrar. Tente novamente.";
            }
        }
    }
}
?>