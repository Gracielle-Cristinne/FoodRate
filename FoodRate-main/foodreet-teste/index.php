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
    $nickName = $_POST['inputNameUsuario'];
    $senha = $_POST['inputSenha'];
    
    // Isso aqui consulta se existe o usuario e senha digitados nos inputs
    $sql = "SELECT * FROM usuarios WHERE nick_name='$nickName' AND senha='$senha'";
    $resultado = $conexao->query($sql);

    // Aqui verifica se encontrou algum usuario
    if ($resultado->num_rows > 0) {
        // para reirecionar para a tela de home
        header("Location: pagina_de_sucesso.php"); 
        exit();
    } else {
    
        $loginErro = "Nome de usuário ou senha incorretos.";
    }
    
  
    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login FoodRate </title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/icon.png">
</head>

<body>
    <main>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

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
                <button type="submit" id="button-login" name="button-login"> ENTRAR </button>
            </section>

            <div class="social-menu-login">
                <a href="https://accounts.google.com"><img src="img/google.jpeg"></a>        
                <a href="https://www.facebook.com/?locale=pt_BR"><img src="img/facebook.jpeg"></a>                
                <a href="https://www.instagram.com/"><img src="img/instagram.jpeg"></a>
            </div>

            <section class="link-cadastro">
                <span> ainda não tem conta ? </span><a href="cadastro.php">Cadastre-se</a>
            </section>
          
        </form>

        <div id="popupErro" class="popup" style="<?php echo !empty($loginErro) ? 'display: block;' : 'display: none;'; ?>">
            <div class="popup-content">
                <span class="close" onclick="fecharpopuperrologin()">&times;</span>
                <section class="logo-FoodReet-popup">
                    <img src="img/FoodRate.png">
                </section>
                <section class="input-box-popup">
                    <p id="p1"><?php echo $loginErro; ?></p>
                </section>
            </div>
        </div>

    </main>
<script src="script.js"></script>
<script>
     function fecharpopuperrologin(){
        document.getElementById('popupErro').style.display = 'none';
    }
    setTimeout(() => {
        fecharpopuperrologin()
    }, 3000 );
</script>
</body>

</html>
