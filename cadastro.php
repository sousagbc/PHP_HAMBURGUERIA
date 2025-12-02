<?php
require 'conexao.php';

$erro = '';
$sucesso = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Receber e limpar os dados
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    $senha = $_POST['senha'];
    $endereco = trim($_POST['endereco']);

    // 2. Validação básica
    if (empty($nome) || empty($email) || empty($senha)) {
        $erro = "Por favor, preencha todos os campos obrigatórios.";
    } else {
        // 3. Verificar se o e-mail já existe
        $stmt = $pdo->prepare("SELECT id FROM clientes WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->rowCount() > 0) {
            $erro = "Este e-mail já está cadastrado.";
        } else {
            // 4. Criptografar a senha (Segurança!)
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            // 5. Inserir no banco
            $sql = "INSERT INTO clientes (nome, email, telefone, senha, endereco) VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            
            if ($stmt->execute([$nome, $email, $telefone, $senhaHash, $endereco])) {
                $sucesso = "Cadastro realizado com sucesso! Redirecionando...";
                header("refresh:3;url=login.php"); // Redireciona após 3 segundos
            } else {
                $erro = "Erro ao cadastrar. Tente novamente.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>O Burguês - Cadastro</title>
  <link rel="icon" href="images/logo.png" type="image/png">
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  
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

  <main style="padding-top: 40px; min-height: 80vh;">
    
    <div class="form-container">
      <h2><i class="fa-solid fa-user-plus"></i> Criar Conta</h2>
      
      <?php if (!empty($erro)): ?>
          <div class="erro-msg" style="border-color: red; color: #ffcccc; background: rgba(255,0,0,0.2);"><?= $erro ?></div>
      <?php endif; ?>

      <?php if (!empty($sucesso)): ?>
          <div class="erro-msg" style="border-color: green; color: #ccffcc; background: rgba(0,255,0,0.2);"><?= $sucesso ?></div>
      <?php else: ?>

      <form method="post">
        
        <label for="nome">Nome Completo *</label>
        <input type="text" name="nome" id="nome" placeholder="Seu nome" required>

        <label for="email">E-mail *</label>
        <input type="email" name="email" id="email" placeholder="seu@email.com" required>

        <label for="telefone">Telefone / WhatsApp</label>
        <input type="text" name="telefone" id="telefone" placeholder="(XX) 9XXXX-XXXX">

        <label for="endereco">Endereço de Entrega</label>
        <textarea name="endereco" id="endereco" rows="2" placeholder="Rua, Número, Bairro..."></textarea>

        <label for="senha">Senha *</label>
        <input type="password" name="senha" id="senha" placeholder="Crie uma senha segura" required>

        <button type="submit">CADASTRAR</button>
      </form>
      
      <?php endif; ?>

      <a href="index.php" class="btn-voltar-link"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
    </div>

  </main>

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