<?php
require 'conexao.php';

// Buscar pedidos para a tabela (limit opcional)
$stmt = $pdo->query('SELECT * FROM pedidos ORDER BY id DESC');
$pedidos = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O Burguês - Hamburgueria Artesanal</title>

    <!-- NOTE: aqui estou usando o caminho do arquivo enviado no container -->
    <link rel="icon" href="images/logo.png" type="image/png">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
      /* Ajustes pequenos para a tabela de pedidos se necessário */
      .pedidos-section { padding: 40px 20px; background: rgba(0,0,0,0.35); border-radius: 12px; max-width: 1200px; margin: 40px auto; color: white; }
      .pedidos-table { width: 100%; border-collapse: collapse; margin-top: 16px; }
      .pedidos-table th, .pedidos-table td { padding: 10px; border-bottom: 1px solid rgba(255,255,255,0.08); text-align: left; }
      .acoes a { margin-right: 8px; color: #FFB84D; text-decoration: none; font-weight: bold; }
      .btn-criar { background:#000; color:#fff; padding:8px 12px; border-radius:8px; text-decoration:none; display:inline-block; margin-top:8px; }
    </style>
</head>
<body>

    <!-- 🎥 VÍDEO DE FUNDO -->
    <div class="video-bg">
        <video autoplay muted loop playsinline>
            <!-- NOTE: caminho do vídeo no container (--troque para relativo em produção--) -->
            <source src="images/videos/hamburguer.mp4" type="video/mp4">
        </video>
    </div>

    <!-- 🔝 HEADER -->
    <header>
        <!-- NOTE: caminho do logo no container (troque para relativo em produção) -->
        <img src="images/logo.png" alt="Logo O Burguês">

        <nav>
            <a href="#bem-vindo">Bem-Vindo</a>
            <a href="#quem-somos">Quem Somos</a>
            <a href="#lojas">Lojas</a>
            <a href="#pedidos">Pedidos</a>
            <a href="cardapio.html" target="_blank">Cardápio</a>
            <a href="https://www.ifood.com.br/delivery/joao-pessoa-pb/o-burgues---burger-joao-pessoa-manaira/72015415-2e15-4496-92b7-003cc10161e1"
               target="_blank">
                <button class="btn-pedido"><b>FAÇA SEU PEDIDO</b></button>
            </a>
        </nav>
    </header>

    <!-- ✨ QUEM SOMOS -->
    <section id="quem-somos" class="section-flex2">
        <img class="img-right"
             src="https://www.agerio.com.br/wp-content/uploads/2023/03/274245323_1371280946660092_8776269945200256239_n-1024x736.jpg"
             alt="Equipe O Burguês">

        <div class="texto-section2">
            <h2>QUEM SOMOS</h2>
            <p>
                O Burguês nasceu no Rio de Janeiro em fevereiro de 2017 com uma missão simples:
                reinventar a experiência do hambúrguer artesanal.  
                Em poucos anos, o que começou como uma ideia ousada se transformou em um fenômeno:
                <b>51 franquias abertas em apenas 5 anos</b>.  
                Hoje somos a maior hamburgueria delivery do Brasil, com presença no Ceará, Bahia,
                Minas Gerais, Espírito Santo, São Paulo e Paraná.  
                Somos criatividade, qualidade e inovação — no atendimento físico e no delivery.
            </p>
        </div>
    </section>

    <hr id="linha">

    <!-- 🏬 LOJAS (Placeholder) -->
    <section id="lojas">

    <div class="lojas-container">

        <!-- Caixa de texto, igual ao Quem Somos -->
        <div class="texto-section2">
            <h2>Nossas Lojas</h2>
            <p>
                Estamos presentes em 14 estados brasileiros, levando o sabor do O Burguês para você.
                Confira nossas lojas e venha nos visitar!
            </p>
        </div>

        <!-- Mapa à direita -->
        <div class="map-card">
    <div class="map-wrapper">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.144036746086!2d-34.83031049999999!3d-7.109301299999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7acddd3abfd7559%3A0x1bf87109ecd0a68b!2sO%20Burgu%C3%AAs%20Hamburgueria%20Cl%C3%A1ssica%20-%20Jo%C3%A3o%20Pessoa!5e0!3m2!1spt-BR!2sbr!4v1748216680679!5m2!1spt-BR!2sbr"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    <a 
      href="https://www.google.com/maps/place/O+Burgu%C3%AAs+Hamburgueria+Cl%C3%A1ssica+-+Jo%C3%A3o+Pessoa/"
      target="_blank" 
      class="btn-mapa">
      Ver rota no mapa
    </a>
</div>


    </div>

    <!-- =================== PEDIDOS (CRUD integrado) =================== -->
    <section id="pedidos" class="pedidos-section">
        <h2>Pedidos</h2>
        <a class="btn-criar" href="criar_pedido.php">+ Criar Novo Pedido</a>

        <?php if (count($pedidos) === 0): ?>
            <p style="margin-top:16px;">Nenhum pedido registrado ainda.</p>
        <?php else: ?>
            <table class="pedidos-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Item</th>
                        <th>Quantidade</th>
                        <th>Status</th>
                        <th>Criado em</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pedidos as $p): ?>
                        <tr>
                            <td><?= htmlspecialchars($p['id']) ?></td>
                            <td><?= htmlspecialchars($p['cliente']) ?></td>
                            <td><?= htmlspecialchars($p['item']) ?></td>
                            <td><?= htmlspecialchars($p['quantidade']) ?></td>
                            <td><?= htmlspecialchars($p['status']) ?></td>
                            <td><?= htmlspecialchars($p['created_at']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </section>

    


    <!-- 🔻 FOOTER -->
    <footer>
        <div class="footer-container">

            <div class="footer-col">
                <h3>O Burguês</h3>
                <p>A maior hamburgueria delivery do Brasil.</p>
            </div>

            <div class="footer-col">
                <h4>Navegação</h4>
                <a href="#bem-vindo">Bem-Vindo</a>
                <a href="#quem-somos">Quem Somos</a>
                <a href="#lojas">Lojas</a>
                <a href="#pedidos">Pedidos</a>
                <a href="cardapio.html" target="_blank">Cardápio</a>
            </div>

            <div class="footer-col">
                <h4>Contato</h4>
                <p>Email: contato@oburgues.com.br</p>
                <p>Instagram: @oburgues</p>
            </div>

        </div>

        <div class="footer-bottom">
            © 2025 O Burguês • Todos os direitos reservados.
        </div>
    </footer>

</body>
</html>
