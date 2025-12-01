<?php
require 'conexao.php';

// Processamento do Formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente = trim($_POST['cliente']);
    $quantidade = (int) $_POST['quantidade'];
    $observacao = trim($_POST['observacao'] ?? '');

    // 1. Captura as escolhas individuais
    $hamburguer = $_POST['hamburguer'] ?? '';
    $acompanhamento = $_POST['acompanhamento'] ?? '';
    $bebida = $_POST['bebida'] ?? '';

    // 2. Monta a lista de itens escolhidos
    $itens_escolhidos = [];
    
    if (!empty($hamburguer)) {
        $itens_escolhidos[] = $hamburguer;
    }
    if (!empty($acompanhamento)) {
        $itens_escolhidos[] = $acompanhamento;
    }
    if (!empty($bebida)) {
        $itens_escolhidos[] = $bebida;
    }

    // 3. Validação: O cliente precisa pedir pelo menos uma coisa
    if (empty($itens_escolhidos)) {
        $erro = "Por favor, selecione pelo menos um item (Hambúrguer, Acompanhamento ou Bebida).";
    } else {
        // 4. Junta tudo numa string só para salvar no banco (Ex: "Clássico + Batata Frita")
        $item_final = implode(" + ", $itens_escolhidos);

        // Adiciona observação se houver
        if (!empty($observacao)) {
            $item_final .= " (" . $observacao . ")";
        }

        // Salva no banco
        $sql = 'INSERT INTO pedidos (cliente, item, quantidade) VALUES (:cliente, :item, :quantidade)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['cliente' => $cliente, 'item' => $item_final, 'quantidade' => $quantidade]);

        header('Location: index.php#pedidos');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>O Burguês - Fazer Pedido</title>
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
                    <img src="images/logo.png" alt="O Burguês" class="logo">
                </a>
            </div>

            <nav class="nav-menu">
                <a href="index.php" class="nav-item">Início</a>
                <a href="cardapio.php" class="nav-item">Cardápio</a>
            </nav>
        </div>
    </header>

  <main style="padding-top: 40px; min-height: 80vh;">
    
    <div class="form-container">
      <h2><i class="fa-solid fa-burger"></i> Monte seu Pedido</h2>
      
      <?php if (isset($erro)): ?>
          <div class="erro-msg"><?= $erro ?></div>
      <?php endif; ?>

      <form method="post">
        
        <label for="cliente">Nome do Cliente:</label>
        <input type="text" name="cliente" id="cliente" placeholder="Ex: João Silva" required>

        <div class="section-title"><i class="fa-solid fa-drumstick-bite"></i> Escolha o Hambúrguer</div>
        <select name="hamburguer" id="hamburguer">
            <option value="">Não desejo hambúrguer</option>
            <option value="American Chicken">American Chicken - R$ 29,90</option>
            <option value="Clássico">Clássico - R$ 34,90</option>
            <option value="Costela Creamy">Costela Creamy - R$ 31,90</option>
            <option value="Costela Angus">Costela Angus - R$ 44,90</option>
            <option value="Cheese crispy">Cheese crispy - R$ 41,90</option>
            <option value="Frango Cream Cheese">Frango Cream Cheese - R$ 39,90</option>
            <option value="Americano">Americano - R$ 27,90</option>
            <option value="Costela Gorgonzola">Costela Gorgonzola - R$ 35,90</option>
            <option value="Gran Tradicional">Gran Tradicional - R$ 37,90</option>
            <option value="Veggie">Veggie - R$ 32,90</option>
        </select>

        <div class="section-title"><i class="fa-solid fa-utensils"></i> Acompanhamento</div>
        <select name="acompanhamento" id="acompanhamento">
            <option value="">Sem acompanhamento</option>
            <option value="Batata Frita">Batata Frita - R$ 24,00</option>
            <option value="Onion Rings">Onion Rings - R$ 27,00</option>
            <option value="Mandioca frita">Mandioca frita - R$ 20,00</option>
        </select>

        <div class="section-title"><i class="fa-solid fa-glass-water"></i> Bebida</div>
        <select name="bebida" id="bebida">
            <option value="">Sem bebida</option>
            <option value="Coca-Cola Lata">Coca-Cola Lata - R$ 6,00</option>
            <option value="Guaraná Antarctica">Guaraná Antarctica - R$ 6,00</option>
            <option value="Red bull">Red bull - R$ 8,00</option>
        </select>

        <label for="quantidade" style="margin-top: 10px;">Quantidade deste combo:</label>
        <input type="number" name="quantidade" id="quantidade" value="1" min="1" required>

        <label for="observacao">Observações (Opcional):</label>
        <textarea name="observacao" id="observacao" rows="2" placeholder="Ex: Tirar cebola, sem gelo..."></textarea>

        <button type="submit">FINALIZAR PEDIDO</button>
      </form>

      <a href="index.php" class="btn-voltar-link"><i class="fa-solid fa-arrow-left"></i> Cancelar</a>
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