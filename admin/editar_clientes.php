<?php
require 'conexao.php';

if (!isset($_GET['id'])) {
    header('Location: index.php#clientes');
    exit;
}
$id = (int) $_GET['id'];

// buscar
$stmt = $pdo->prepare('SELECT * FROM clientes WHERE id = :id');
$stmt->execute(['id' => $id]);
$pedido = $stmt->fetch();
if (!$pedido) {
    echo 'Pedido não encontrado';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = trim($_POST['id']);
    $nome = trim($_POST['nome']);
    $email = (int) $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = 'UPDATE clientes SET nome = :nome, email = :email, telefone = :telefone, WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nome'=>$nome,'email'=>$email,'telefone'=>$telefone,'id'=>$id]);

    header('Location: index.php#clientes');
    exit;
}
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Editar Pedido</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <nav>
      <a href="index.php#clientes">Voltar ao cadastro</a>
    </nav>
  </header>

  <main style="padding-top:180px; text-align:center;">
    <div style="max-width:600px;margin:40px auto;background:rgba(0,0,0,0.45);padding:24px;border-radius:12px;">
      <h2>Editar Clientes <?= htmlspecialchars($id['id']) ?></h2>
      <form method="post">
        <label>Nome:<br>
          <input type="text" name="nome" value="<?= htmlspecialchars($pedido['nome']) ?>" required>
        </label><br><br>
        <label>Email:<br>
          <input type="email" name="email" value="<?= htmlspecialchars($pedido['email']) ?>" required>
        </label><br><br>
        <label>Telefone:<br>
          <input type="tel" name="telefone" value="<?= htmlspecialchars($pedido['telefone']) ?>" required>
        </label><br><br>
        <button type="submit">Salvar Alterações</button>
      </form>
    </div>
  </main>
</body>
</html>
