<?php
require 'conexao.php';

if (!isset($_GET['id'])) {
    header('Location: index.php#pedidos');
    exit;
}
$id = (int) $_GET['id'];

// buscar
$stmt = $pdo->prepare('SELECT * FROM pedidos WHERE id = :id');
$stmt->execute(['id' => $id]);
$pedido = $stmt->fetch();
if (!$pedido) {
    echo 'Pedido não encontrado';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente = trim($_POST['cliente']);
    $item = trim($_POST['item']);
    $quantidade = (int) $_POST['quantidade'];
    $status = $_POST['status'];

    $sql = 'UPDATE pedidos SET cliente = :cliente, item = :item, quantidade = :quantidade, status = :status WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['cliente'=>$cliente,'item'=>$item,'quantidade'=>$quantidade,'status'=>$status,'id'=>$id]);

    header('Location: index.php#pedidos');
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
    <img src="/mnt/data/logo.png" alt="Logo O Burguês">
    <nav>
      <a href="index.php#pedidos">Voltar aos Pedidos</a>
    </nav>
  </header>

  <main style="padding-top:180px; text-align:center;">
    <div style="max-width:600px;margin:40px auto;background:rgba(0,0,0,0.45);padding:24px;border-radius:12px;">
      <h2>Editar Pedido #<?= htmlspecialchars($pedido['id']) ?></h2>
      <form method="post">
        <label>Cliente:<br>
          <input type="text" name="cliente" value="<?= htmlspecialchars($pedido['cliente']) ?>" required>
        </label><br><br>
        <label>Item:<br>
          <input type="text" name="item" value="<?= htmlspecialchars($pedido['item']) ?>" required>
        </label><br><br>
        <label>Quantidade:<br>
          <input type="number" name="quantidade" value="<?= htmlspecialchars($pedido['quantidade']) ?>" min="1" required>
        </label><br><br>
        <label>Status:<br>
          <select name="status">
            <option value="pendente" <?= $pedido['status']==='pendente' ? 'selected' : '' ?>>Pendente</option>
            <option value="pronto" <?= $pedido['status']==='pronto' ? 'selected' : '' ?>>Pronto</option>
            <option value="entregue" <?= $pedido['status']==='entregue' ? 'selected' : '' ?>>Entregue</option>
          </select>
        </label><br><br>
        <button type="submit">Salvar Alterações</button>
      </form>
    </div>
  </main>
</body>
</html>
