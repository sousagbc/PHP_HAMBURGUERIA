<?php
session_start(); // Inicia a sessão
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    // Busca o usuário pelo email
    $stmt = $pdo->prepare("SELECT * FROM clientes WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    // Verifica se o usuário existe e se a senha bate com o hash
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        // SALVA O NOME NA SESSÃO
        $_SESSION['usuario_nome'] = $usuario['nome'];
        $_SESSION['usuario_id'] = $usuario['id'];
        
        header("Location: criar_pedido.php"); // Manda direto para o pedido
        exit;
    } else {
        $erro = "Email ou senha incorretos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="pedidos.css">
</head>
<body>
<header id="main-header">
      <div class="header-container">
          <div class="logo-area">
              <a href="index.php">
                  <img src="images/logo.png" alt="Logo O Burguês">
              </a>
          </div>
          <nav class="nav-menu">
              <a href="index.php" class="nav-item">Voltar ao Início</a>
          </nav>
      </div>
  </header>

    <div class="form-container" style="margin-top:100px;">
        <h2>Entrar</h2>
        <?php if(isset($erro)) echo "<p class='erro-msg'>$erro</p>"; ?>
        <form method="post">
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Senha:</label>
            <input type="password" name="senha" required>
            <button type="submit">ENTRAR</button>
        </form>
        <a href="cadastro.php" class="btn-voltar-link">Não tem conta? Cadastre-se</a>
    </div>
    <footer id="main-footer">
        <div class="footer-content">
            <div class="footer-column brand-col">
                <img src="images/logo.png" alt="Logo Rodapé" class="footer-logo">
                <p>O sabor que conquistou o Brasil. Hambúrguer artesanal feito de verdade.</p>
            </div>

            <div class="footer-column links-col">
                <h4>NAVEGAÇÃO</h4>
                <ul>
                    <li><a href="index.php">Início</a></li>
                    <li><a href="cardapio.php">Cardápio</a></li>
                    <li><a href="index.php/#lojas">Encontre uma Loja</a></li>
                    <li><a href="criar_pedido.php">Seu Pedido</a></li>
                </ul>
            </div>

            <div class="footer-column info-col">
                <h4>FUNCIONAMENTO</h4>
                <ul class="info-list">
                    <li><i class="fa-regular fa-clock"></i> Seg - Dom: 18h às 23h</li>
                    <li><i class="fa-solid fa-location-dot"></i> João Pessoa - PB</li>
                    <li><i class="fa-solid fa-envelope"></i> contato@oburgues.com.br</li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2025 O Burguês. Todos os direitos reservados.</p>
            <p class="dev-credits">Desenvolvido por <span>Grupo TechBurger</span></p>
        </div>
    </footer>
</body>
</html>