<?php
// Dados de conexão ao banco de dados
$host = 'localhost'; // mudem apenas isso dependendo do nome da conexão do mysql de vocês
$usuario = 'root';
$senha = '';
$banco = 'foodrate';
$porta = 3306;

// Isso é a conexão, não precisa mexer
$conexao = new mysqli($host, $usuario, $senha, $banco, $porta);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

// Isso aqui é a verificação do popup
$cadastroRealizado = false;
$erroCadastro = '';

// Verifica se os dados do formulário foram preenchidos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeCompleto = $_POST['inputNomeSobrenome'];
    $nickName = $_POST['inputNameUsuario'];
    $email = $_POST['inputEmail'];
    $senha = $_POST['inputSenha'];
    
    // Verifica se o e-mail já existe
    $sql_verificar_email = "SELECT * FROM usuarios WHERE email='$email'";
    $resultado_verificar_email = $conexao->query($sql_verificar_email);
    if ($resultado_verificar_email->num_rows > 0) {
        $erroCadastro = "E-mail já cadastrado";
    }

    // Verifica se o nickname já existe
    $sql_verificar_nickName = "SELECT * FROM usuarios WHERE nick_name='$nickName'";
    $resultado_verificar_nickName = $conexao->query($sql_verificar_nickName);
    if ($resultado_verificar_nickName->num_rows > 0) {
        $erroCadastro = "Nome de usuário já cadastrado";
    }

    // Se não houver erros, realiza a inserção na tabela usuarios
    if (empty($erroCadastro)) {
        $sql = "INSERT INTO usuarios (nome, nick_name, email, senha) VALUES ('$nomeCompleto', '$nickName', '$email', '$senha')";
        
        if ($conexao->query($sql) === TRUE) {
            $cadastroRealizado = true;
            header("Location: index.php"); 
        } else {
            echo "Erro ao cadastrar: " . $conexao->error;
        }
    }
    
    // Fecha a conexão com o banco de dados
    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro FoodRate</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/icon.png">
</head>

<body>

    <main>

        <form id="formCadastro" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <section class="logo-FoodReet">
                <img src="img/FoodRate.png">
            </section>

            <section class="input-box">

                <input type="text" id="inputNomeSobrenome" name="inputNomeSobrenome" placeholder="Nome e sobrenome" required>

                <input type="text" id="inputNameUsuario" name="inputNameUsuario" placeholder="Nome de Usuario">

                <input type="email" id="inputEmail" name="inputEmail" placeholder="E-mail" required>

                <div class="box-SenhaCadastro">
                    <input type="password" id="inputSenhaCadastro" name="inputSenha" placeholder="Senha" required>
                    <div id="icon2" onclick="showHide1()"></div>
                </div>
                
                <div class="box-confirm-SenhaCadastro">
                    <input type="password" id="inputConfirmSenha" name="inputConfirmSenha" placeholder="Confirme a senha" required>
                    <div id="icon3" onclick="showHide2()"></div>
                </div>
                
            </section>

            <section class="input-checkbox">
                <input type="checkbox" id="checkboxTermos" name="checkboxTermos" required> Eu concordo com os <a href="termo.html"> termos </a>
            </section>

            <section class="button-cadastro">
                <button type="submit" id="buttonCadastro" name="buttonCadastro"> CADASTRAR </button>
            </section>

            <section class="link-login">
                <span> Já tem uma conta ? </span><a href="index.php">Login</a>
            </section>

        </form>

        <div id="popupCadastro" class="popup" style="<?php echo $cadastroRealizado ? 'display: block;' : 'display: none;'; ?>">
            <div class="popup-content">
                <span class="close" onclick="closePopupCadastro()">&times;</span>
                <section class="logo-FoodReet-popup">
                    <img src="img/FoodRate.png">
                </section>
                <section class="input-box-popup">
                    <p id="p1">Cadastro realizado com sucesso!</p>
                </section>
            </div>
        </div>

        <div id="popupErro" class="popup" style="<?php echo !empty($erroCadastro) ? 'display: block;' : 'display: none;'; ?>">
            <div class="popup-content">
                <span class="close" onclick="closePopupErro()">&times;</span>
                <section class="logo-FoodReet-popup">
                    <img src="img/FoodRate.png">
                </section>
                <section class="input-box-popup">
                    <p id="p1"><?php echo $erroCadastro; ?></p>
                </section>
            </div>
        </div>

    </main>
    <script src="script.js"></script>
    <script>
        function closePopupCadastro() {
            document.getElementById('popupCadastro').style.display = 'none';
        }
        setTimeout(() => {
            closePopupCadastro();
        }, 3000);
        setTimeout(() => {
            closePopupErro();
        }, 3000);
        function closePopupErro() {
            document.getElementById('popupErro').style.display = 'none';
        }
    </script>
</body>

</html>
