<?php
require '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO pedidos (cliente, item, quantidade) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['cliente'], $_POST['item'], $_POST['quantidade']]);
    header("Location: pedidos.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Criar Pedido</title>
    <style>
        body { font-family:Arial; padding:30px; }
        input, button { padding:10px; width:300px; margin-bottom:10px; }
    </style>
</head>
<body>

<h1>Criar Pedido</h1>

<form method="post">
    <input type="text" name="cliente" placeholder="Cliente" required><br>
    <input type="text" name="item" placeholder="Item" required><br>
    <input type="number" name="quantidade" min="1" value="1" required><br>
    <button type="submit">Criar</button>
</form>

<br>
<a href="pedidos.php">Voltar</a>

</body>
</html>
