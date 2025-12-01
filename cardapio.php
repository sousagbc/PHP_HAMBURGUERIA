<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O Burgues - Nosso Cardápio</title>
    <link rel="icon" href="images/logo.png" type="image/png">
    <link rel="stylesheet" href="cardapio.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
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
                <a href="#acompanhamentos" class="nav-item">Acompanhamentos</a>
                <a href="#bebidas" class="nav-item">Bebidas</a>
                <a href="#cardapio" class="nav-item">Hambúrgueres</a>
            </nav>

            <div class="cta-area">
                <a href="criar_pedido.php" class="btn-delivery">PEÇA AGORA</a>
            </div>
        </div>
    </header>

    <main style="padding-top:110px;">
        <section id="cardapio">
            <h2 style="color: #E65100; text-align:center; margin-top:30px;">Hambúrgueres</h2>
            <div id="corpo">
                <div class="hamburguer">
                    <img class="foto" src="images/imagens/456881261_1724569375019748_4628731805975508229_n.jpg" alt="American Chicken">

                    <h3>American Chicken</h3>
                    <p>Frango Empanado, Queijo Mussarela, Alface Americana, Picles de Pepino, Molho à sua escolha no pão brioche</p>

                    <strong>R$ 29,90</strong>
                </div>

                <div class="hamburguer">
                    <img class="foto" src="images/imagens/457018579_519335344006953_2579318147507496788_n.jpg" alt="Clássico">

                    <h3>Clássico</h3>
                    <p>Carne 180g, cheddar duplo, bacon crocante, cebola caramelizada.</p>

                    <strong>R$ 34,90</strong>
                </div>

                <div class="hamburguer">
                    <img class="foto" src="images/imagens/457257238_865974362133289_2550781275651349189_n.jpg" alt="Costela Creamy">

                    <h3>Costela Creamy</h3>
                    <p>Blend de 180g de Costela, Cream cheese, Alho Crocante, Cebola no shoyu, Molho à sua escolha no pão brioche</p>

                    <strong>R$ 31,90</strong>
                </div>

                <div class="hamburguer">
                    <img class="foto" src="images/imagens/457022564_485837667570122_1376005797323809782_n.jpg" alt="Costela Angus">

                    <h3>Costela Angus</h3>
                    <p>180g De Costela Bovina Angus, Queijo
                     Cheddar, Alface Americana, Bacon Em Cubos, Pico De Gallo E Molho À Sua Escolha No Pão Brioche.</p>

                    <strong>R$ 44,90</strong>
                </div>

                <div class="hamburguer">
                    <img class="foto" src="images/imagens/457281214_1243798510113364_8484507634713217653_n.jpg" alt="Cheese crispy">

                    <h3>Cheese crispy</h3>
                    <p>110g do blend burguês, queijo empanado crocante da seara, farofa de bacon, molho a sua escolha no pão de brioche.</p>

                    <strong>R$ 41,90</strong>
                </div>

                <div class="hamburguer">
                    <img class="foto" src="images/imagens/457132184_8125801310792444_2026918450704921741_n.jpg" alt="Frango Cream Cheese">

                    <h3>Frango Cream Cheese</h3>
                    <p>Frango Empanado, Queijo Muçarela, Cream Cheese, Alho
                    Crocante, Cebola Roxa, Tomate E Alface Americana No Pão brioche</p>

                    <strong>R$ 39,90</strong>
                </div>

                 <div class="hamburguer">
                    <img class="foto" src="images/imagens/456443230_724541109823734_6029369618997251756_n.jpg" alt="Americano">

                    <h3>Americano</h3>
                    <p>110g De Blend Burguês, Queijo Cheddar, Fatias De Bacon E O Sabor Especial Do Molho Barbecue No Pão Brioche.</p>

                    <strong>R$ 27,90</strong>
                </div>

                 <div class="hamburguer">
                    <img class="foto" src="images/imagens/456559587_1176813483607529_5187894326773792844_n.jpg" alt="Costela Gorgonzola">

                    <h3>Costela Gorgonzola</h3>
                    <p> 180g Blend Costela, Cebola Crispy, Creme De Gorgonzola E Molho A Sua Escolha No Pão Brioche. </p>

                    <strong>R$ 35,90</strong>
                </div>

                 <div class="hamburguer">
                    <img class="foto" src="images/imagens/456879902_483612124457922_5731631353008052517_n.jpg" alt="Gran Tradicional">

                    <h3>Gran Tradicional</h3>
                    <p>180g De Blend Burguês, Queijo Muçarela, Cebola Roxa, Alface Americana, Tomate E Molho À Sua Escolha No Pão Brioche. </p>

                    <strong>R$ 37,90</strong>
                </div>

                 <div class="hamburguer">
                    <img class="foto" src="images/imagens/457126883_1719121988626404_5180914323847251039_n.jpg" alt="Veggie" >

                    <h3>Veggie</h3>
                    <p>180g De Blend Burguês, Queijo Mussarela, Cebola Roxa, Alface Americana, Tomate E Molho À Sua Escolha No Pão Brioche. </p>

                    <strong>R$ 32,90</strong>
                </div>
            </div>

            <!-- Bebidas -->
            <h2 id="bebidas" style="color: #E65100; text-align:center; margin-top:30px;">Bebidas</h2>
            <div id="corpo-bebidas" style="margin-top:10px;">
                <div class="hamburguer">
                    <img class="foto" src="images/imagens/refrigerante-lata.jpg" alt="Coca-Cola Lata">

                    <h3>Coca-Cola Lata</h3>
                    <p>Geladinha pra acompanhar seu burguer favorito.</p>

                    <strong>R$ 6,00</strong>
                </div>
                <div class="hamburguer">
                    <img class="foto" src="images/imagens/guarana.jpg" alt="Guaraná Antarctica Lata">

                    <h3>Guaraná Antarctica</h3>
                    <p>O clássico brasileiro que não pode faltar.</p>

                    <strong>R$ 6,00</strong>
                </div>
                <div class="hamburguer">
                    <img class="foto" src="images/imagens/350036---Bebida-Energetica-Red-Bull-355ml-1.webp" alt="Redbull">

                    <h3>Red bull</h3>
                    <p>Opção de energético para quem precisa se manter ativo!</p>

                    <strong>R$ 8,00</strong>
                </div>
            </div>

            <!-- Acompanhamentos -->
            <h2 id="acompanhamentos" style="color: #E65100; text-align:center; margin-top:30px;">Acompanhamentos</h2>
            <div id="corpo-acompanhamentos" style="margin-top:10px;">
                <div class="hamburguer">
                    <img class="foto" src="images/imagens/622291-batata-airfryer-extra-croc-mccain_3.webp" alt="Batata Frita">

                    <h3>Batata Frita</h3>
                    <p>Porção média de batata frita crocante com sal.</p>

                    <strong>R$ 24,00</strong>
                </div>
                <div class="hamburguer">
                    <img class="foto" src="images/imagens/5d2cb094b44ce72d3e3baa89.webp" alt="Onion Rings">

                    <h3>Onion Rings</h3>
                    <p>Anéis de cebola empanados e crocantes.</p>

                    <strong>R$ 27,00</strong>
                </div>
                <div class="hamburguer">
                    <img class="foto" src="images/imagens/mandioca-frita.jpg" alt="Mandioca">

                    <h3>Mandioca frita</h3>
                    <p>Porção média de mandioca frita crocante.</p>

                    <strong>R$ 20,00</strong>
                </div>
            </div>

            <div style="text-align:center; margin:40px 0;">
             <div class="cta-area">
                <a href="criar_pedido.php" class="btn-delivery">FAÇA SEU PEDIDO</a>
            </div>
            </div>
        </section>
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