<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente = trim($_POST['cliente']);
    $item = trim($_POST['item']);
    $quantidade = (int) $_POST['quantidade'];

    $sql = 'INSERT INTO pedidos (cliente, item, quantidade) VALUES (:cliente, :item, :quantidade)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['cliente' => $cliente, 'item' => $item, 'quantidade' => $quantidade]);

    header('Location: index.php#pedidos');
    exit;
}
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Criar Pedido</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <img src="/mnt/data/logo.png" alt="Logo O Burguês">
    <nav>
      <a href="index.php#pedidos">Voltar aos Pedidos</a>
    </nav>
  </header>

  <main style="padding-top:180px; text-align:center;">
    <div style="max-width:600px;margin:40px auto;background:rgba(0,0,0,0.45);padding:24px;border-radius:12px;">
      <h2>Criar Pedido</h2>
      <form method="post">
        <label>Cliente:<br>
          <input type="text" name="cliente" required>
        </label><br><br>
        <label>Item:<br>
          <input type="text" name="item" required>
        </label><br><br>
        <label>Quantidade:<br>
          <input type="number" name="quantidade" value="1" min="1" required>
        </label><br><br>
        <button type="submit">Criar Pedido</button>
      </form>
    </div>
  </main>
</body>
</html>
