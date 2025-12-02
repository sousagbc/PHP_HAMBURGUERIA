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
    <header id="main-header">
        <div class="header-container">
            <div class="logo-area">
                <a href="#">
                    <img src="images/logo.png" alt="Logo O Burguês">
                </a>
            </div>

            <nav class="nav-menu">
                <a href="#bem-vindo" class="nav-item">Início</a>
                <a href="#quem-somos" class="nav-item">Quem Somos</a>
                <a href="#lojas" class="nav-item">Lojas</a>
                <a href="#pedidos" class="nav-item">Pedidos</a>
                <a href="cardapio.php" target="_blank" class="nav-item">Cardápio</a>
            </nav>
            
            <div></div>
                </a>
            </div>
        </div>
    </header>

    <!-- 👋 BEM-VINDO -->
    <section id="bem-vindo" class="section-flex2">
        <div class="texto-section3">
            <h2>SEJA BEM-VINDO AO BURGUÊS</h2>
            <p>
                Descubra o sabor inigualável dos nossos hambúrgueres artesanais,
                preparados com ingredientes frescos e selecionados para proporcionar
                uma experiência gastronômica única. No O Burguês, cada mordida é
                uma celebração do verdadeiro sabor do hambúrguer.
            </p>
        </div>
        <div class="cadastro">
            <a href="cadastro.php" class="btn-cadastro">CADASTRE-SE AQUI</a>
        </div>
    </section>

    <hr id="linha">

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

    <!-- 🏬 LOJAS -->
    <section id="lojas">
        <div class="section-flexlojas">
            <!-- Caixa de texto -->
            <div class="texto-section4">
                <h2>NOSSAS LOJAS</h2>
                <p>
                    Atualmente contamos com nossa unidade principal em João Pessoa e já operamos como franquia,
                    levando o sabor do O Burguês para novas regiões. Estamos em expansão pelo Brasil, com novas unidades
                    chegando em breve. Enquanto isso, confira nossa loja principal:
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

        <hr id="linha">
    </section>

    <!-- 💬 FEEDBACKS -->
    <section id="Feedbacks">
        <div class="texto-section5">
                <h2>Feedbacks</h2>
        </div>
    </section>


<section id="feedbacks">
   
    
    <div class="feedbacks-simples">
        <!-- Card 1 -->
        <div class="card-feedback">
            <h4>Lucas Fonseca</h4>
            <div class="estrelas">★★★★★</div>
            <p>"Muito top, uma das melhores hamburgueria aqui em João Pessoa é vocês !"</p>
        </div>
        
        <!-- Card 2 -->
        <div class="card-feedback">
            <h4>Francisco Galbin</h4>
            <div class="estrelas">★★★★★</div>
            <p>"Já pedi tanto no delivery quanto consumi no presencial, muito bom! Hambúrguer artesanal de primeira."</p>
        </div>
        
        <!-- Card 3 -->
        <div class="card-feedback">
            <h4>Paula Suênia</h4>
            <div class="estrelas">★★★★★</div>
            <p>"Melhor hambúrguer do mundo 😍. Atendimento perfeito e o chef de cozinha está de parabéns."</p>
        </div>
    </div>
</section>
    <!-- =================== PEDIDOS (CRUD integrado) =================== -->
    <section id="pedidos" class="pedidos-section">
        <h2>PEDIDOS</h2>
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
    <footer id="main-footer">
        <div class="footer-content">
            <div class="footer-column brand-col">
                <img src="images/logo.png" alt="Logo Rodapé" class="footer-logo">
                <p>O sabor que conquistou o Brasil. Hambúrguer artesanal feito de verdade.</p>
            </div>

            <div class="footer-column links-col">
                <h4>NAVEGAÇÃO</h4>
                <ul>
                    <li><a href="#bem-vindo">Início</a></li>
                    <li><a href="#cardapio.php">Nosso Cardápio</a></li>
                    <li><a href="#lojas">Encontre uma Loja</a></li>
                    <li><a href="admin/indexadm.php">Acesso Restrito</a></li>
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
