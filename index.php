<?php
include('assets/db/conexao.php');

$nome = "";
$email = "";
$celular = "";
$endereco = "";

$errorMessage = "";
$successMessage = "";

if (isset($_POST['nome']) || isset($_POST['email']) || isset($_POST['celular']) || isset($_POST['endereco'])) {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $celular = $_POST["celular"];
    $endereco = $_POST["endereco"];

    do {
        if (empty($nome) || empty($email) || empty($celular) || empty($endereco)) {
            $errorMessage = "Preencha todas as informações!";
            break;
        }
        //INSERT

        $sql = "INSERT INTO dados_usuarios(nome, email, celular, endereco)" . "VALUES ('$nome', '$email', '$celular', '$endereco')";
        $result = $mysqli->query($sql);

        if (!$result) {
            $errorMessage = "Tabela invalida:" . $mysqli->error;
            break;
        }
        $nome = "";
        $email = "";
        $celular = "";
        $endereco = "";

        $successMessage = "Usuario adicionado corretamente!";
        header("location: listUsers.php");
        exit;
    } while (false);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Formulário</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="assets/img/logo-login.svg" alt="">
        </div>
        <div class="form">
            <form method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre-se</h1>
                        <?php
                        if (!empty($errorMessage)) {
                            echo "
                            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                <strong>$errorMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                            ";
                        }
                        ?>
                    </div>
                    <div class="login-button">
                        <button><a href="login.php">Entrar</a></button>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="firstname">Primeiro Nome</label>
                        <input id="firstname" type="text" name="nome" placeholder="Digite seu primeiro nome" value="<?php echo $nome; ?>">
                    </div>

                    <div class="input-box">
                        <label for="lastname">Endereço</label>
                        <input id="lastname" type="text" name="endereco" placeholder="Digite seu endereço" <?php echo $endereco; ?>>
                    </div>

                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu e-mail" value="<?php echo $email; ?>">
                    </div>

                    <div class="input-box">
                        <label for="number">Celular</label>
                        <input id="number" type="phone" name="celular" placeholder="(xx) xxxx-xxxx" value="<?php echo $celular; ?>">
                    </div>

                    <div class=" input-box">
                        <label for="password">Senha</label>
                        <input id="password" type="password" name="password" placeholder="Digite sua senha">
                    </div>


                    <div class=" input-box">
                        <label for="confirmPassword">Confirme sua Senha</label>
                        <input id="confirmPassword" type="password" name="confirmPassword" placeholder="Digite sua senha novamente">
                    </div>

                </div>

                <div class="gender-inputs">
                    <div class="gender-title">
                        <h6>Gênero</h6>
                    </div>

                    <div class="gender-group">
                        <div class="gender-input">
                            <input id="female" type="radio" name="gender">
                            <label for="female">Feminino</label>
                        </div>

                        <div class="gender-input">
                            <input id="male" type="radio" name="gender">
                            <label for="male">Masculino</label>
                        </div>

                        <div class="gender-input">
                            <input id="others" type="radio" name="gender">
                            <label for="others">Outros</label>
                        </div>

                        <div class="gender-input">
                            <input id="none" type="radio" name="gender">
                            <label for="none">Prefiro não dizer</label>
                        </div>
                    </div>
                </div>
                <?php
                if (!empty($successMessage)) {
                    echo "
                            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                            ";
                }
                ?>
                <div class="continue-button">
                    <button type="submit"><a>Cadastrar</a> </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>