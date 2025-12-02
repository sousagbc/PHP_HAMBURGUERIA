<?php
require '../conexao.php';

if (!isset($_GET['id'])) {
    header("Location: clientes.php");
    exit;
}

$stmt = $pdo->prepare("DELETE FROM clientes WHERE id = ?");
$stmt->execute([$_GET['id']]);

header("Location: clientes.php");
exit;
