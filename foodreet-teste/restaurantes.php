<?php
// Dados de conexão ao banco de dados
$host = 'localhost'; // mudem apenas isso dependendo do nome da conexão do mysql de vocês
$usuario = 'root';
$senha = '';
$banco = 'foodrate';
$porta = 3306;

// Conexão com o banco de dados não mexam.
$conexao = new mysqli($host, $usuario, $senha, $banco, $porta);

// Verificação de erros na conexão
if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}


$loginErro = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  
    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Restaurantes FoodRate </title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/icon.png">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="body-Restaurantes">

    <header class="header-Restaurantes" id="header-Restaurantes">

        <div class="logo-FoodReet">
            <img src="img/FoodRate.png">
        </div>

        <div class="lista-menu">

            <nav class="option-select">
                <a href="home.php"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon-lista-menu"
                        fill="grey">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2zm5-3v8h2.5v8H21V2c-2.76 0-5 2.24-5 4" />
                    </svg>Restaurantes</a>
            </nav>

            <nav class="option-select">
                <a href="home.php"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon-lista-menu"
                        fill="grey">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M12 2C8.43 2 5.23 3.54 3.01 6L12 22l8.99-16C18.78 3.55 15.57 2 12 2M7 7c0-1.1.9-2 2-2s2 .9 2 2-.9 2-2 2-2-.9-2-2m5 8c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2" />
                    </svg>Lanches</a>
            </nav>

            <nav class="option-select">
                <a href="maps.php">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="icon-lista-menu" fill="grey">
                        <path
                            d="M565.6 36.2C572.1 40.7 576 48.1 576 56V392c0 10-6.2 18.9-15.5 22.4l-168 64c-5.2 2-10.9 2.1-16.1 .3L192.5 417.5l-160 61c-7.4 2.8-15.7 1.8-22.2-2.7S0 463.9 0 456V120c0-10 6.1-18.9 15.5-22.4l168-64c5.2-2 10.9-2.1 16.1-.3L383.5 94.5l160-61c7.4-2.8 15.7-1.8 22.2 2.7zM48 136.5V421.2l120-45.7V90.8L48 136.5zM360 422.7V137.3l-144-48V374.7l144 48zm48-1.5l120-45.7V90.8L408 136.5V421.2z" />
                    </svg>Próximo a você</a>
            </nav>

            <nav class="option-select">
                <a href="#" onclick="openPopupContatos()"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="icon-lista-menu" fill="grey">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M21.99 8c0-.72-.37-1.35-.94-1.7L12 1 2.95 6.3C2.38 6.65 2 7.28 2 8v10c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2zM12 13 3.74 7.84 12 3l8.26 4.84z" />
                    </svg>Contatos</a>
            </nav>

            <div id="popupContatos" class="popup">
                <div class="popup-content">
                    <span class="close" onclick="closePopupContatos()">&times;</span>
                    <section class="logo-FoodReet-popup">
                        <img src="img/FoodRate.png">
                    </section>
                    <section class="input-box-popup">
                        <p id="p2">Aqui estão algumas informações para que você entre em contanto com FoodRate :</p>
                        <p id="p3">E-mail: FoodRate@gmail.com</p>
                        <p id="p4">Telefone: (81) 5555-5555</p>
                        <!--OPÇÃO DE ENVIO PARA CADASTRAR UM RESTAURANTE PARA CLIENTE OU RESPONSAVEL ENTRAR EM CONTATO E SER CADASTRADO-->
                        <p id="p5">Caso tenha algum restaurante que você acredita que deveria estar cadastrado, favor
                            entrar em contato:</p>
                        <p id="p6">E-mail: Cadastro.RestaurantFoodRate@gmail.com</p>
                        <p id="p4">Telefone: (81) 5555-5555</p>
                    </section>
                </div>
            </div>

            <nav class="option-select">
                <a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon-lista-menu"
                        fill="grey">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="m17 7-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4z" />
                    </svg>logout</a>
            </nav>

        </div>

    </header>

    <main class="main-Restaurantes">

        <div class="img-restaurante">
            <img src="img/ChinaRestaurant.png">
        </div>


        <h2> Avaliações</h2>

        <section class="restaurante-avaliacao" id="restaurante-avaliacao">

            <input class="number" name="avaliacao" hidden>
            <i class='bx bx-star star'></i>
            <i class='bx bx-star star'></i>
            <i class='bx bx-star star'></i>
            <i class='bx bx-star star'></i>
            <i class='bx bx-star star'></i>

        </section>

        <section class="info-restaurante">
            <h3>Nome do restaurente</h3>
            <h3>Horarios de funcionamento</h3>
            <h3>Endereço: </h3>
        </section>


        <section class="restaurente-cardapio">

            <div class="opcao1">
                <button type="button">
                    <img src="img/option1.jpeg">
                    <div class="info">
                        <h3>Produto mais vendido: Frango Xadrez</h3>
                        <br><br>
                        <h3>Cubos de frango refogados com pimentões coloridos, cebola e molho agridoce, servidos com
                            arroz branco. Um prato clássico da culinária chinesa, conhecido pelo contraste de sabores e
                            cores vibrantes.</h3>
                    </div>
                </button>
            </div>

            <div class="opcao2">
                <button type="button">
                    <img src="img/option2.jpeg">
                    <div class="info">
                        <h3>Opção para você: Yakissoba de Legumes </h3>
                        <br><br>
                        <h3>Macarrão oriental frito com legumes frescos, como cenoura, brócolis, repolho e cebola,
                            temperado com molho de soja e especiarias. Uma opção saudável e saborosa da cozinha chinesa.
                        </h3>
                    </div>
                </button>

            </div>

            <div class="opcao3">
                <button type="button">
                    <img src="img/option3.jpg">
                    <div class="info">
                        <h3>Opção para você: Rolinho Primavera </h3>
                        <br><br>
                        <h3>Finas tiras de legumes e carne de porco enroladas em massa fina e crocante, fritas até
                            ficarem douradas e servidas com molho agridoce. Um clássico aperitivo chinês, perfeito para
                            compartilhar.</h3>
                    </div>
                </button>
            </div>


        </section>

        <div class="linha">
            <hr class="linha-personalizada">
        </div>

        <section class="blogs">

            <h2>Melhores comentarios</h2>

            <div class="blogs-comentarios">

                <div class="setas">
                    <button type="button" onclick="changePanelComentarios(-1)">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon-lista-menu"
                            fill="#000000">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path d="M15.41 16.59 10.83 12l4.58-4.59L14 6l-6 6 6 6z" />
                        </svg>
                    </button>
                </div>

                <div class="aspasCima">
                    <img src="img/aspasCima.png">
                </div>

                <div class="mudar-comentarios">
                    <div class="img-comentarios">
                        <img src="img/img-blog.png">
                        <div class="comentarios">
                            <h1>José Frederico</h1>
                            <h3>Fui a um restaurante esse final de semana, cujo
                                eu tinha visto a avaliação de 4,9 aqui no site,
                                e foi uma das melhores experiencias que tive.
                                Obg, FoodRate!
                            </h3>
                        </div>
                    </div>

                    <div class="img-comentarios">
                        <img src="img/img-blog2.png">
                        <div class="comentarios">
                            <h1>Mateus Powell</h1>
                            <h3>Fui experimentar o sushi deles e eram magnificos
                                recomendo a todos que vá algum dia lá, será uma
                                experiencia unica!
                            </h3>
                        </div>
                    </div>


                    <div class="img-comentarios">
                        <img src="img/img-blog3.png">
                        <div class="comentarios">
                            <h1>Fernando</h1>
                            <h3>O FoodRate é meu guia confiável para descobrir
                                os melhores restaurantes; sua avaliação de 4,9
                                nunca me decepciona.
                            </h3>
                        </div>
                    </div>

                </div>

                <div class="aspasBaixo">
                    <img src="img/aspasBaixo.png">
                </div>

                <div class="setas">
                    <button type="button" onclick="changePanelComentarios(1)">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon-lista-menu"
                            fill="#000000">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path d="M8.59 16.59 13.17 12 8.59 7.41 10 6l6 6-6 6z" />
                        </svg>
                    </button>
                </div>



            </div>

            <!--PARA COMENTAR SOBRE O RESTAURANTE POPUP RETIRADO

      
        <div class="button-comentar">
            <button type="button" onclick="openPopupComentarios()">Comentar sobre o restaurante</button>
        </div>
    
        <div id="popupComentarios" class="popup">
            <div class="popup-content">
                <span class="close" onclick="closePopupComentarios()">&times;</span>
                <section class="logo-FoodReet-popup">
                    <img src="img/FoodRate.png">
                </section>
                <section class="input-box-popup">
                    <p>Escreva seu comentário abaixo:</p>
                    <form onsubmit="enviarComentario(event)">
                        <input type="text" id="inputComentario" name="inputComentario" placeholder="Seu Comentário" required>
                        <button type="submit">Enviar</button>
                    </form>
                </section>
            </div>
        </div>-->


        </section>
        <!-- AREA PARA COMENTAR E EXIBIR O COMENTARIO-->
        <section class="comentarios-restaurante">


            <div class="adicionar-comentario">

                <h3>Deixe seu comentário</h3>
                <div id="comments"></div>

                <div class="comment-form">
                    <textarea id="comment-text" placeholder="Escreva seu comentário"></textarea>
                </div>
                <div class="button-comentar">
                    <button onclick="submitComment()">Comentar sobre o restaurante</button>
                </div>
            </div>
        </section>


    </main>

    <footer class="footer-Restaurantes">

        <div class="options-info">

            <div class="logo-FoodReet-footer">
                <img src="img/FoodRate2.png">
                <h3>Deixe seu paladar falar por você!
                    Com nosso app, cada mordida
                    é uma avaliação!
                </h3>
            </div>

            <div class="social-menu-home">

                <h3>Siga-nos:</h3>

                <nav class="links-social-menu-home">
                    <a href="https://accounts.google.com">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon-lista-menu"
                            fill="#000000">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.748L12.545,10.239z" />
                        </svg></a>

                    <a href="https://www.facebook.com/?locale=pt_BR">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon-lista-menu"
                            fill="#000000">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2m13 2h-2.5A3.5 3.5 0 0 0 12 8.5V11h-2v3h2v7h3v-7h3v-3h-3V9a1 1 0 0 1 1-1h2V5z" />
                        </svg></a>
                    <a href="https://www.instagram.com/"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="icon-lista-menu" fill="#000000">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8 1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5 5 5 0 0 1-5 5 5 5 0 0 1-5-5 5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3z" />
                        </svg></a>
                </nav>

            </div>
        </div>

        <div class="options-info2">

            <a href="#Home" onclick="scrollToSection('header-Restaurantes')">
                <h3>Home</h3>
            </a>

            <a href="#">
                <h3>Sobre</h3>
            </a>

            <a href="#">
                <h3>Serviços</h3>
            </a>

        </div>

        <div class="feedback">

            <div class="feedback-envio">
                <h3>Feedback</h3>
                <form>
                    <input type="text" id="feedback" name="feedback" placeholder="Envie seu feedback" required>
                    <button type="submit" id="buttonFeedback" name="buttonFeedback">Enviar</button>
                </form>
            </div>

        </div>
    </footer>
    <script src="script.js"></script>
</body>

</html>