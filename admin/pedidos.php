<?php
require '../conexao.php';

$stmt = $pdo->query("SELECT * FROM pedidos ORDER BY id DESC");
$pedidos = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Admin - Pedidos</title>
    <style>
        body { font-family: Arial; padding:30px; }
        table { width:100%; border-collapse: collapse; }
        th, td { padding:10px; border-bottom:1px solid #ccc; }
        a.btn { padding:6px 10px; background:#333; color:white; text-decoration:none; border-radius:4px; }
        a.btn:hover { background:#555; }
    </style>
</head>
<body>

<h1>Pedidos</h1>

<a class="btn" href="criar_pedidos.php">+ Criar Pedido</a>
<br><br>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Item</th>
            <th>Qtd</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pedidos as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= $p['cliente'] ?></td>
            <td><?= $p['item'] ?></td>
            <td><?= $p['quantidade'] ?></td>
            <td><?= $p['status'] ?></td>
            <td>
                <a class="btn" href="editar_pedidos.php?id=<?= $p['id'] ?>">Editar</a>
                <a class="btn" href="excluir_pedidos.php?id=<?= $p['id'] ?>"
                   onclick="return confirm('Excluir pedido #<?= $p['id'] ?>?')">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
