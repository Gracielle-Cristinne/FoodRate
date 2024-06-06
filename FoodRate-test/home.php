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

// if (isset($_POST["metodo"]) == "Login") {
//     $usuario_id = $_POST["id_usuarios"];
//     $email_usuario = $_POST["email"];
//     $
// })


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
    <title>FootRate</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/icon.png">

    <script>

        function getParameterByName(name, url = window.location.href) {
            name = name.replace(/[\[\]]/g, '\\$&');
            let regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }

        function getParameterByName(name) {
            const url = new URL(window.location.href);
            return url.searchParams.get(name);
        }

        // Captura os valores dos parâmetros
        const idUsuario = getParameterByName('id_usuario');
        const loginUsuario = getParameterByName('nick_name'); // Substitua 'nick_name' pelo nome correto do parâmetro

        if (idUsuario && loginUsuario) {
            const auth = {
                'idUsuario': idUsuario,
                'login_usuario': loginUsuario
            }
            // Armazena os valores no localStorage
            localStorage.setItem('auth', JSON.stringify(auth));
            

            // Remove os parâmetros da URL
            const url = new URL(window.location);
            url.searchParams.delete('id_usuario');
            url.searchParams.delete('nick_name'); // Substitua 'nick_name' pelo nome correto do parâmetro
            window.history.replaceState({}, document.title, url);
        }
    </script>
</head>

<body class="body-home">

    <header class="header-home" id="header-home">

        <div class="logo-FoodReet">
            <img src="img/FoodRate.png">
        </div>

        <div class="lista-menu">

            <nav class="option-select">
                <a href="#restaurantes" onclick="scrollToSection('outros-restaurantes')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon-lista-menu" fill="grey">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2zm5-3v8h2.5v8H21V2c-2.76 0-5 2.24-5 4" />
                    </svg>Restaurantes</a>
            </nav>

            <nav class="option-select">
                <a href="#Lanches" onclick="scrollToSection('outros-restaurantes')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon-lista-menu" fill="grey">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M12 2C8.43 2 5.23 3.54 3.01 6L12 22l8.99-16C18.78 3.55 15.57 2 12 2M7 7c0-1.1.9-2 2-2s2 .9 2 2-.9 2-2 2-2-.9-2-2m5 8c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2" />
                    </svg>Lanches</a>
            </nav>

            <nav class="option-select">
                <a href="#blogs" onclick="scrollToSection('outros-blogs')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon-lista-menu" fill="grey">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34a.9959.9959 0 0 0-1.41 0l-1.83 1.83 3.75 3.75z" />
                    </svg>Blogs</a>
            </nav>

            <nav class="option-select">
                <a href="maps.php">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="icon-lista-menu" fill="grey">
                        <path
                            d="M565.6 36.2C572.1 40.7 576 48.1 576 56V392c0 10-6.2 18.9-15.5 22.4l-168 64c-5.2 2-10.9 2.1-16.1 .3L192.5 417.5l-160 61c-7.4 2.8-15.7 1.8-22.2-2.7S0 463.9 0 456V120c0-10 6.1-18.9 15.5-22.4l168-64c5.2-2 10.9-2.1 16.1-.3L383.5 94.5l160-61c7.4-2.8 15.7-1.8 22.2 2.7zM48 136.5V421.2l120-45.7V90.8L48 136.5zM360 422.7V137.3l-144-48V374.7l144 48zm48-1.5l120-45.7V90.8L408 136.5V421.2z" />
                    </svg>Próximo a você</a>
            </nav>

            <nav class="option-select">
                <a href="#" onclick="openPopupContatos()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon-lista-menu" fill="grey">
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
                <a onclick="logoff()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon-lista-menu" fill="grey">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="m17 7-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4z" />
                    </svg>logout</a>
            </nav>

        </div>

    </header>

    <main class="main-home">

        <section class="img-principal-home">

            <div class="mudar-slides">

                <div class="slide-restaurantes">
                    <img src="img/ChinaRestaurant.png">
                    <a href="restaurantes.php"> <button type="button" onclick="guardarid(19)"> Avaliar</button></a>
                </div>

                <div class="slide-restaurantes">
                    <img src="img/restaurante2.png">
                    <a href="restaurante2.php"> <button type="button"  onclick="guardarid(21)"> Avaliar </button></a>
                </div>

                <div class="slide-restaurantes">
                    <img src="img/restaurante3.png">
                    <a href="restaurante3.php"> <button type="button"  onclick="guardarid(20)"> Avaliar </button></a>
                </div>

            </div>

            <div class="mudar-slide">
                <button class="prev" onclick="changePanel(-1)">&#8249;</button>
                <button class="next" onclick="changePanel(1)">&#8250;</button>
            </div>

        </section>

        <div class="linha">
            <hr class="linha-personalizada">
        </div>

        <section class="outros-restaurantes" id="outros-restaurantes">

            <h2>Opções de Restaurantes & Lanches</h2>

            <div class="coluna">

                <div class="opcao-restaurantes ">

                    <div class="modal-button">
                        <button type="button" id="openModalBtn1" class="btn" onclick="openModal('restaurantsModal1')">
                            <img src="img/restaurante-chines.jpeg">
                            <div class="A">

                                <h1>Orientais</h1>
                                <h3>Restaurantes orientais de Recife</h3>
                            </div>
                        </button>
                    </div>

                    <div class="modal-button">
                        <button type="button" id="openModalBtn2" class="btn" onclick="openModal('restaurantsModal2')">
                            <img src="img/cafes.png">
                            <div class="A">
                                <h1>Café</h1>
                                <h3>Cafeterias de Recife</h3>
                            </div>
                        </button>
                    </div>

                    <div class="modal-button">
                        <button type="button" id="openModalBtn3" class="btn" onclick="openModal('restaurantsModal3')">
                            <img src="img/hamburguers.png">
                            <div class="A">
                                <h1>Hambúrguer</h1>
                                <h3>Hamburguerias de Recife</h3>
                            </div>
                        </button>
                    </div>

                    <div class="modal" id="restaurantsModal1" tabindex="-1" aria-labelledby="restaurantsModalLabel1"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <img src="img/iconModal.png">
                                    <h4 class="modal-title" id="restaurantsModalLabel1">Qual restaurante você deseja
                                        pesquisar?</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="text" id="searchInput1" class="form-control mb-3"
                                        placeholder="Pesquisar restaurante" onclick="showList()">
                                    <!-- Lista de restaurantes (inicialmente oculta) -->
                                    <ul id="restaurantsList1" class="list-group"
                                        style="max-height: 170px; overflow-y: scroll; display: none; ">
                                        <?php
                                        $categoria = 'oriental';
                                        $sql = $conexao->prepare("SELECT nome FROM restaurantes WHERE categorias=?");
                                        $sql->bind_param("s", $categoria);
                                        $sql->execute();
                                        $result = $sql->get_result();

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<li class='list-group-item'>" . htmlspecialchars($row["nome"], ENT_QUOTES, 'UTF-8') . "</li>";
                                            }
                                        } else {
                                            echo "<li class='list-group-item'>Nenhum restaurante encontrado</li>";
                                        }
                                        $sql->close();
                                        ?>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn" data-bs-dismiss="modal"
                                        onclick="closeModal('restaurantsModal1')">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- MODAL 2 -->
                    <div class="modal fade" id="restaurantsModal2" tabindex="-1"
                        aria-labelledby="restaurantsModalLabel2" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <img src="img/iconModal.png">
                                    <h4 class="modal-title" id="restaurantsModalLabel2">Qual restaurante você deseja
                                        pesquisar?</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="text" id="searchInput2" class="form-control mb-3"
                                        placeholder="Pesquisar restaurante" onclick="showList()">
                                    <ul id="restaurantsList2" class="list-group"
                                        style="max-height: 170px; overflow-y: scroll; display: none; ">
                                        <?php
                                        $categoria = 'café';
                                        $sql = $conexao->prepare("SELECT nome FROM restaurantes WHERE categorias=?");
                                        $sql->bind_param("s", $categoria);
                                        $sql->execute();
                                        $result = $sql->get_result();

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<li class='list-group-item'>" . htmlspecialchars($row["nome"], ENT_QUOTES, 'UTF-8') . "</li>";
                                            }
                                        } else {
                                            echo "<li class='list-group-item'>Nenhum restaurante encontrado</li>";
                                        }
                                        $sql->close();
                                        ?>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn" data-bs-dismiss="modal"
                                        onclick="closeModal('restaurantsModal2')">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- MODAL 3 -->
                    <div class="modal fade" id="restaurantsModal3" tabindex="-1"
                        aria-labelledby="restaurantsModalLabel3" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <img src="img/iconModal.png">
                                    <h4 class="modal-title" id="restaurantsModalLabel3">Qual restaurante você deseja
                                        pesquisar?</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="text" id="searchInput3" class="form-control mb-3"
                                        placeholder="Pesquisar restaurante" onclick="showList()">
                                    <ul id="restaurantsList3" class="list-group"
                                        style="max-height: 170px; overflow-y: scroll; display: none;">
                                        <?php
                                        $categoria = 'hamburguer';
                                        $sql = $conexao->prepare("SELECT nome FROM restaurantes WHERE categorias=?");
                                        $sql->bind_param("s", $categoria);
                                        $sql->execute();
                                        $result = $sql->get_result();

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<li class='list-group-item'>" . htmlspecialchars($row["nome"], ENT_QUOTES, 'UTF-8') . "</li>";
                                            }
                                        } else {
                                            echo "<li class='list-group-item'>Nenhum restaurante encontrado</li>";
                                        }
                                        $sql->close();
                                        ?>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn" data-bs-dismiss="modal"
                                        onclick="closeModal('restaurantsModal3')">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="opcao-restaurantes2 d-flex">

                    <div class="modal-button">
                        <button type="button" id="openModalBtn4" class="btn" onclick="openModal('restaurantsModal4')">
                            <img src="img/sorvetes.png">
                            <div class="A">
                                <h1>Sorvetes</h1>
                                <h3>Sorveterias de Recife</h3>
                            </div>
                        </button>
                    </div>

                    <div class="modal-button">
                        <button type="button" id="openModalBtn5" class="btn" onclick="openModal('restaurantsModal5')">
                            <img src="img/massas.png">
                            <div class="A">
                                <h1>Pizza</h1>
                                <h3>Pizzarias de Recife</h3>
                            </div>
                        </button>
                    </div>

                    <div class="modal-button">
                        <button type="button" id="openModalBtn6" class="btn" onclick="openModal('restaurantsModal6')">
                            <img src="img/cookies.png">
                            <div class="A">
                                <h1>Cookies</h1>
                                <h3>Docerias de Recife</h3>
                            </div>
                        </button>
                    </div>


                    <!--AREA DOS MODAIS PARA CADA CATEGORIA-->

                    <!--MODAL 4-->
                    <div class="modal fade" id="restaurantsModal4" tabindex="-1"
                        aria-labelledby="restaurantsModalLabel4" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <img src="img/iconModal.png">
                                    <h4 class="modal-title" id="restaurantsModalLabel4">Qual restaurante você deseja
                                        pesquisar?</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="text" id="searchInput4" class="form-control mb-3"
                                        placeholder="Pesquisar restaurante" onclick="showList()">
                                    <ul id="restaurantsList4" class="list-group"
                                        style="max-height: 170px; overflow-y: scroll; display: none;">
                                        <?php
                                        $categoria = 'sorvetes';
                                        $sql = $conexao->prepare("SELECT nome FROM restaurantes WHERE categorias=?");
                                        $sql->bind_param("s", $categoria);
                                        $sql->execute();
                                        $result = $sql->get_result();

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<li class='list-group-item'>" . htmlspecialchars($row["nome"], ENT_QUOTES, 'UTF-8') . "</li>";
                                            }
                                        } else {
                                            echo "<li class='list-group-item'>Nenhum restaurante encontrado</li>";
                                        }
                                        $sql->close();
                                        ?>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn" data-bs-dismiss="modal"
                                        onclick="closeModal('restaurantsModal4')">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- MODAL 5 -->
                    <div class="modal fade" id="restaurantsModal5" tabindex="-1"
                        aria-labelledby="restaurantsModalLabel5" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <img src="img/iconModal.png">
                                    <h4 class="modal-title" id="restaurantsModalLabel5">Qual restaurante você deseja
                                        pesquisar?</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="text" id="searchInput5" class="form-control mb-3"
                                        placeholder="Pesquisar restaurante" onclick="showList()">
                                    <ul id="restaurantsList5" class="list-group"
                                        style="max-height: 170px; overflow-y: scroll; display: none;">
                                        <?php
                                        $categoria = 'pizza';
                                        $sql = $conexao->prepare("SELECT nome FROM restaurantes WHERE categorias=?");
                                        $sql->bind_param("s", $categoria);
                                        $sql->execute();
                                        $result = $sql->get_result();

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<li class='list-group-item'>" . htmlspecialchars($row["nome"], ENT_QUOTES, 'UTF-8') . "</li>";
                                            }
                                        } else {
                                            echo "<li class='list-group-item'>Nenhum restaurante encontrado</li>";
                                        }
                                        $sql->close();
                                        ?>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn" data-bs-dismiss="modal"
                                        onclick="closeModal('restaurantsModal5')">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- MODAL 6 -->
                    <div class="modal fade" id="restaurantsModal6" tabindex="-1"
                        aria-labelledby="restaurantsModalLabel6" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <img src="img/iconModal.png">
                                    <h4 class="modal-title" id="restaurantsModalLabel6">Qual restaurante você deseja
                                        pesquisar?</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="text" id="searchInput6" class="form-control mb-3"
                                        placeholder="Pesquisar restaurante " onclick="showList()">
                                    <ul id="restaurantsList6" class="list-group"
                                        style="max-height: 170px; overflow-y: scroll; display: none;">
                                        <?php
                                        $categoria = 'cookies';

                                        $sql = $conexao->prepare("SELECT nome FROM restaurantes WHERE categorias=?");
                                        $sql->bind_param("s", $categoria);
                                        $sql->execute();
                                        $result = $sql->get_result();

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<li class='list-group-item'>" . htmlspecialchars($row["nome"], ENT_QUOTES, 'UTF-8') . "</li>";
                                            }
                                        } else {
                                            echo "<li class='list-group-item'>Nenhum restaurante encontrado</li>";
                                        }
                                        $sql->close();
                                        ?>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn" data-bs-dismiss="modal"
                                        onclick="closeModal('restaurantsModal6')">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="button-outros">
                <button type="button" onclick="openPopupButtonOutros()">Mais opções</button>
            </div>

            <div id="button-outros-restaurantes" class="popup">
                <div class="popup-content">
                    <span class="close" onclick="closePopupButtonOutros()">&times;</span>
                    <section class="logo-FoodReet-popup">
                        <img src="img/FoodRate.png">
                    </section>
                    <section class="input-box-popup">
                        <p id="p1">No momento, não temos mais opções de restaurantes cadastrados. Por favor, verifique
                            novamente
                            mais tarde.</p>
                    </section>
                </div>
            </div>

        </section>

        <div class="linha">
            <hr class="linha-personalizada">
        </div>

        <section class="melhores-avaliados">

            <h2>Melhores Avaliados</h2>

            <div class="melhores-restaurantes">

                <div class="img-melhores-restaurantes">
                    <button type="button"><img src="img/mc.png.jpeg"></button>
                    <button type="button"><img src="img/burguer-king.jpeg"></button>
                    <button type="button"><img src="img/china.jpeg"></button>
                    <button type="button"><img src="img/china-box.jpeg"></button>
                </div>

                <div class="img-melhores-restaurantes">
                    <button type="button"><img src="img/boi-brasa.jpeg"></button>
                    <button type="button"><img src="img/rei-coxinha.jpeg"></button>
                    <button type="button"><img src="img/mustang.jpeg"></button>
                    <button type="button"><img src="img/maracuja.jpeg"></button>
                </div>

            </div>

        </section>

        <div class="linha">
            <hr class="linha-personalizada">
        </div>

        <section class="blogs" id="outros-blogs">

            <h2>Melhores comentários</h2>

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

                    <div class="img-comentarios comentario1">
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

                    <div class="img-comentarios comentario2">
                        <img src="img/img-blog2.png">
                        <div class="comentarios">
                            <h1>Mateus Powell</h1>
                            <h3>Fui experimentar o sushi deles e eram magnificos
                                recomendo a todos que vá algum dia lá, será uma
                                experiencia unica!
                            </h3>
                        </div>
                    </div>


                    <div class="img-comentarios comentario3">
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
        </section>
    </main>

    <footer class="footer-home">

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

            <a href="#Home" onclick="scrollToSection('header-home')">
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
    <script>
        // Função para mostrar a lista de restaurantes quando o input é clicado
        function showList() {
            var list1 = document.getElementById('restaurantsList1');
            var list2 = document.getElementById('restaurantsList2');
            var list3 = document.getElementById('restaurantsList3');
            var list4 = document.getElementById('restaurantsList4');
            var list5 = document.getElementById('restaurantsList5');
            var list6 = document.getElementById('restaurantsList6');

            if (list1.style.display === 'none' || list2.style.display === 'none' || list3.style.display === 'none' || list4.style.display === 'none' || list5.style.display === 'none' || list6.style.display === 'none') {
                list1.style.display = 'block';
                list2.style.display = 'block';
                list3.style.display = 'block';
                list4.style.display = 'block';
                list5.style.display = 'block';
                list6.style.display = 'block';
            }
        }
        function guardarid(id){
            localStorage.setItem('idrestaurante',id);
            console.log(id)
        }

        // Função para filtrar os restaurantes com base no texto digitado
        document.getElementById('searchInput1').addEventListener('input', function () {
            var input = this.value.toUpperCase();
            var list = document.getElementById('restaurantsList1');
            var items = list.getElementsByTagName('li');
            for (var i = 0; i < items.length; i++) {
                var itemName = items[i].textContent.toUpperCase();
                if (itemName.indexOf(input) > -1) {
                    items[i].style.display = '';
                } else {
                    items[i].style.display = 'none';
                }
            }
        });
        document.getElementById('searchInput2').addEventListener('input', function () {
            var input = this.value.toUpperCase();
            var list = document.getElementById('restaurantsList2');
            var items = list.getElementsByTagName('li');
            for (var i = 0; i < items.length; i++) {
                var itemName = items[i].textContent.toUpperCase();
                if (itemName.indexOf(input) > -1) {
                    items[i].style.display = '';
                } else {
                    items[i].style.display = 'none';
                }
            }
        });
        document.getElementById('searchInput2').addEventListener('input', function () {
            var input = this.value.toUpperCase();
            var list = document.getElementById('restaurantsList3');
            var items = list.getElementsByTagName('li');
            for (var i = 0; i < items.length; i++) {
                var itemName = items[i].textContent.toUpperCase();
                if (itemName.indexOf(input) > -1) {
                    items[i].style.display = '';
                } else {
                    items[i].style.display = 'none';
                }
            }
        });
        document.getElementById('searchInput3').addEventListener('input', function () {
            var input = this.value.toUpperCase();
            var list = document.getElementById('restaurantsList4');
            var items = list.getElementsByTagName('li');
            for (var i = 0; i < items.length; i++) {
                var itemName = items[i].textContent.toUpperCase();
                if (itemName.indexOf(input) > -1) {
                    items[i].style.display = '';
                } else {
                    items[i].style.display = 'none';
                }
            }
        });
        document.getElementById('searchInput4').addEventListener('input', function () {
            var input = this.value.toUpperCase();
            var list = document.getElementById('restaurantsList4');
            var items = list.getElementsByTagName('li');
            for (var i = 0; i < items.length; i++) {
                var itemName = items[i].textContent.toUpperCase();
                if (itemName.indexOf(input) > -1) {
                    items[i].style.display = '';
                } else {
                    items[i].style.display = 'none';
                }
            }
        });
        document.getElementById('searchInput5').addEventListener('input', function () {
            var input = this.value.toUpperCase();
            var list = document.getElementById('restaurantsList5');
            var items = list.getElementsByTagName('li');
            for (var i = 0; i < items.length; i++) {
                var itemName = items[i].textContent.toUpperCase();
                if (itemName.indexOf(input) > -1) {
                    items[i].style.display = '';
                } else {
                    items[i].style.display = 'none';
                }
            }
        });
        document.getElementById('searchInput6').addEventListener('input', function () {
            var input = this.value.toUpperCase();
            var list = document.getElementById('restaurantsList6');
            var items = list.getElementsByTagName('li');
            for (var i = 0; i < items.length; i++) {
                var itemName = items[i].textContent.toUpperCase();
                if (itemName.indexOf(input) > -1) {
                    items[i].style.display = '';
                } else {
                    items[i].style.display = 'none';
                }
            }
        });

    </script>
    <script>
        function openPopupContatos() {
            var popup = document.getElementById("popupContatos");
            popup.style.display = "block";

            window.onclick = function (event) {
                if (event.target == popup) {
                    closePopupContatos();
                }
            };
        }

    </script>
    <script src="script.js"></script>

</body>

</html>