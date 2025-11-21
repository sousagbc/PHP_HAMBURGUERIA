<?php
require '../conexao.php';

if (!isset($_GET['id'])) {
    header("Location: pedidos.php");
    exit;
}

$stmt = $pdo->prepare("DELETE FROM pedidos WHERE id = ?");
$stmt->execute([$_GET['id']]);

header("Location: pedidos.php");
exit;
