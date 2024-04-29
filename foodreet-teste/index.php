<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login FoodRate </title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/icon.png">
</head>

<body class="body-index">
    <main class="main-index">

        <form action="#">

            <section class="logo-FoodReet-login">
                <img src="img/FoodRate.png">
            </section>

            <section class="input-box-login">
                <input type="text" id="inputNameUsuario" name="inputNameUsuario" placeholder="Nome de Usuario" required>
                <div class="box-SenhaLogin">
                    <input type="password" id="inputSenha" name="inputSenha" placeholder="Senha" required>
                    <div id="icon" onclick="showHide()"></div>
                </div>
            </section>

            <section class="input-box-c">
                <a href="#" id="forgotPasswordLink" onclick="openPopup()">Esqueceu sua senha?</a>
            </section>
                                    
            <section class="button-login">
                <button type="button" id="button-login" name="button-login"> ENTRAR </button>
            </section>

            <div class="social-menu-login">
                <a href="https://accounts.google.com"><img src="img/google.jpeg"></a>        
                <a href="https://www.facebook.com/?locale=pt_BR"><img src="img/facebook.jpeg"></a>                
                <a href="https://www.instagram.com/"><img src="img/instagram.jpeg"></a>
            </div>

            <section class="link-cadastro">
                <span> ainda não tem conta ? </span><a href="cadastro.html">Cadastre-se</a>
            </section>
          
        </form>

        <div id="forgotPasswordPopup" class="popup">
            <div class="popup-content">
                <span class="close" onclick="closePopup()">&times;</span>
                <section class="logo-FoodReet-popup">
                    <img src="img/FoodRate.png">
                </section>
                <section class="input-box-popup">
                    <p>Insira o e-mail para recuperação de senha</p>
                    <form>
                        <input type="email" id="inputEmail" name="inputEmail" placeholder="Seu e-mail" required>
                        <button type="submit">Enviar</button>
                    </form>
                </section>
            </div>
        </div>

    </main>
<script src="script.js"></script>
</body>

</html>