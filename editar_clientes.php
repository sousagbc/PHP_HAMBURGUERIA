<?php
// --- MODO DE CORREÇÃO DE ERROS ---
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// ----------------------------------

// Tenta incluir a conexão. Se falhar, avisa.
if (file_exists('conexao.php')) {
    require 'conexao.php';
} elseif (file_exists('../conexao.php')) {
    require '../conexao.php';
} else {
    die("Erro Crítico: Arquivo 'conexao.php' não encontrado.");
}

// Verifica se o ID foi passado
if (!isset($_GET['id'])) {
    die("Erro: ID do cliente não fornecido. <a href='clientes.php'>Voltar</a>");
}

$id = (int) $_GET['id'];

// 1. Buscar dados atuais do cliente
try {
    $stmt = $pdo->prepare('SELECT * FROM clientes WHERE id = :id');
    $stmt->execute(['id' => $id]);
    $cliente = $stmt->fetch();
} catch (PDOException $e) {
    die("Erro no Banco de Dados: " . $e->getMessage());
}

if (!$cliente) {
    die("Cliente não encontrado no banco de dados.");
}

// 2. Processar o formulário de atualização
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    $endereco = trim($_POST['endereco']);
    $nova_senha = $_POST['senha'];

    try {
        if (!empty($nova_senha)) {
            // Se digitou senha nova, atualiza tudo
            $senhaHash = password_hash($nova_senha, PASSWORD_DEFAULT);
            $sql = "UPDATE clientes SET nome=?, email=?, telefone=?, endereco=?, senha=? WHERE id=?";
            $params = [$nome, $email, $telefone, $endereco, $senhaHash, $id];
        } else {
            // Se não digitou senha, mantém a antiga
            $sql = "UPDATE clientes SET nome=?, email=?, telefone=?, endereco=? WHERE id=?";
            $params = [$nome, $email, $telefone, $endereco, $id];
        }

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        
        echo "<script>alert('Cliente atualizado com sucesso!'); window.location.href='clientes.php';</script>";
        exit;

    } catch (PDOException $e) {
        echo "Erro ao atualizar: " . $e->getMessage();
    }
}
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>Editar Cliente</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../pedidos.css">
  <style>
      body { padding-top: 50px; background: #eee; color: #333; }
      .form-container { background: white; border: 1px solid #ddd; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
      .form-container h2, label { color: #333; }
      input, textarea { background: #f9f9f9; border: 1px solid #ccc; color: #333; }
  </style>
</head>
<body>

  <div class="form-container">
      <h2>Editar Cliente #<?= $cliente['id'] ?></h2>

      <form method="post">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($cliente['email']) ?>" required>

        <label>Telefone:</label>
        <input type="text" name="telefone" value="<?= htmlspecialchars($cliente['telefone']) ?>" required>

        <label>Endereço:</label>
        <textarea name="endereco" rows="3"><?= htmlspecialchars($cliente['endereco']) ?></textarea>

        <label>Nova Senha (deixe em branco para não mudar):</label>
        <input type="password" name="senha" placeholder="Digite apenas se quiser alterar">

        <button type="submit">SALVAR ALTERAÇÕES</button>
      </form>
      
      <a href="clientes.php" class="btn-voltar-link" style="color: #333;">Cancelar</a>
  </div>

</body>
</html>