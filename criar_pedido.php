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
  <title>O Burguês - Criar Pedido</title>
  <link rel="icon" href="images/logo.png" type="png">
  <link rel="stylesheet" href="style.css">
</head>


<body>
  <header>
  <img src="images/logo.png" alt="Voltar" class="btn-voltar" onclick="history.back()">
    
  </header>
  <style>
    
    .btn-voltar {
    width: 150px;  /* tamanho da imagem */
    height:auto;
    cursor: pointer;
    transition: 0.3s;
}

.btn-voltar:hover {
    transform: scale(1.3);
    opacity: 0.8;
}

  </style>
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
