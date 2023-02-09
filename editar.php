<?php
include('assets/db/conexao.php');

$id = "";
$nome = "";
$email = "";
$celular = "";
$endereco = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET["id"])) {
        header("location: listUsers.php");
        exit;
    }
    $id = $_GET["id"];

    $sql = "SELECT * FROM dados_usuarios WHERE id=$id";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: listUsers.php");
        exit;
    }
    $nome = $row["nome"];
    $email = $row["email"];
    $celular = $row["celular"];
    $endereco = $row["endereco"];
} else {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $celular = $_POST["celular"];
    $endereco = $_POST["endereco"];

    do {
        if (empty($id) || empty($nome) || empty($email) || empty($celular) || empty($endereco)) {
            $errorMessage = "Preencha todas as informações!";
            break;
        }

        $sql = "UPDATE dados_usuarios" . "SET nome = '$nome', email = '$email', celular = '$celular', endereco = '$endereco'" . "WHERE id = $id";

        $result = $mysqli->query($sql);

        if (!$result) {
            $errorMessage = "Tabela invalida:" . $mysqli->error;
            break;
        }
        $successMessage = "Usuario adicionado corretamente!";
        header("location: listUsers.php");
        exit;
    } while (true);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Formulário</title>
</head>

<body>
    <div class="container my-5">
        <h2>Editar Usuario</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nome</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nome" value="<?php echo $nome; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">E-mail</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Celular</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="celular" value="<?php echo $celular; ?>">
                </div>
            </div>


            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Endereço</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="endereco" value="<?php echo $endereco; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="listUsers.php" role="button">Cancelar</a>
                </div>
            </div>



        </form>
    </div>

</body>

</html>