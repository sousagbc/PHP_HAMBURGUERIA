<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../conexao.php';

// Busca todos os clientes
$stmt = $pdo->query("SELECT * FROM clientes ORDER BY id DESC");
$clientes = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Admin - Clientes</title>
    <style>
        body { font-family: Arial; padding:20px; }
        table { width:100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border-bottom:1px solid #ccc; text-align: left; }
        th { background-color: #eee; }
        a.btn { padding:6px 10px; background:#333; color:white; text-decoration:none; border-radius:4px; font-size: 0.9rem; }
        a.btn:hover { background:#555; }
        .btn-voltar { background: #FF8C00; }
        .btn-excluir { background: #cc0000; }
    </style>
</head>
<body>

<h1>Gerenciar Clientes</h1>
<a class="btn btn-voltar" href="indexadm.php">Voltar ao Painel</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clientes as $c): ?>
        <tr>
            <td><?= $c['id'] ?></td>
            <td><?= htmlspecialchars($c['nome']) ?></td>
            <td><?= htmlspecialchars($c['email']) ?></td>
            <td><?= htmlspecialchars($c['telefone']) ?></td>
            <td>
            <a class="btn" href="editar_clientes.php?id=<?= $c['id'] ?>">Editar</a>
            <a class="btn btn-excluir" href="excluir_clientes.php?id=<?= $c['id'] ?>" onclick="return confirm('Confirma exclusão deste cliente?')">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>