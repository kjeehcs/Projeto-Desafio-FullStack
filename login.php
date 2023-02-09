<?php
include('assets/db/conexao.php');

if (isset($_POST['email']) || isset($_POST['senha'])) {

    if (strlen($_POST['email']) == 0) {
        echo "<script language=javascript>alert( 'Preencha seu e-mail!' );</script>";

    } else if (strlen($_POST['senha']) == 0) {
        echo "<script language=javascript>alert( 'Preencha sua senha!' );</script>";
        
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: listUsers.php");
        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="assets/img/logo-login.svg" alt="">
        </div>
        <div class="form">
            <form action="" method="POST">
                <div class="form-header">
                    <div class="login">
                        <h1>Login</h1>
                    </div>
                </div>
                <div class="input-box">
                    <label for="email">E-mail</label>
                    <input id="email" type="email" name="email" placeholder="Digite seu e-mail">
                </div>

                <div class="input-box">
                    <label for="password">Senha</label>
                    <input id="password" type="password" name="senha" placeholder="Digite sua senha">
                </div>
                <div class="login-button">
                    <button type="submit"><a>Entrar</a></button>
                </div><br>
                <div class="login-button">
                    <button ><a href="index.php">Voltar</a></button>
                </div>

        </div>
        </form>
    </div>
    </div>
</body>

</html>