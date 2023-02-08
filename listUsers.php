<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Lista de Usuários</title>
</head>

<body>
    <div class="container my-5">
        <h2>Lista de Usuários</h2>
        <a class="btn btn-primary" href="/home.php" role="button">Novo</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Celular</th>
                    <th>Criado as</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('assets/db/conexao.php');
                $sql = "SELECT * FROM dados_usuarios";
                $result = $mysqli->query($sql);

                if (!$result) {
                    die("Tabela inválida: " . $mysqli->error);
                }


                while ($row = $result->fetch_assoc()) {
                    echo "
                        <tr>
                            <td>$row[id]</td>
                            <td>$row[nome]</td>
                            <td>$row[email]</td>
                            <td>$row[celular]</td>
                            <td>$row[endereco]</td>
                            <td>$row[criado_data]</td>
                            <td><a class='btn btn-primary btn-sm' href='editar.php?id=$row[id]'>Editar</a></td>
                            <td><a class='btn btn-danger btn-sm' href='deletar.php?id=$row[id]'>Deletar</a></td>
                        </tr>
                        ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>