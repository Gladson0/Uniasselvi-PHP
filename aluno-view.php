<?php
require "conexao.php";
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visualizar Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12"> 
                <div class="card">
                    <div class="card-header">
                        <h4>Visualizando Aluno
                            <a href="index.php" class="btn btn-danger float-end"><span class="bi-backspace-fill"></span>&nbsp;Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <?php
if (isset($_GET["id_aluno"])) {
    $aluno_id = mysqli_real_escape_string($conexao, $_GET["id_aluno"]);
    $sql = "SELECT * FROM alunos WHERE id_aluno='$aluno_id'";
    $query = mysqli_query($conexao, $sql);

    if (!$query) {
        // Se a consulta falhar, exiba o erro do MySQL
        echo "Erro na consulta: " . mysqli_error($conexao);
    } elseif (mysqli_num_rows($query) > 0) {
        $aluno = mysqli_fetch_array($query);
        ?>
        <div class="mb-3">
            <label>Nome</label>
            <p class="form-control">
                <?= $aluno["nome_aluno"]; ?>
            </p>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <p class="form-control">
                <?= $aluno["email_aluno"]; ?>
            </p>
        </div>
        <div class="mb-3">
            <label>Data de Nascimento</label>
            <p class="form-control">
                <?= date('d/m/Y', strtotime($aluno["dt_nasc"])); ?>
            </p>
        </div>
        <div class="mb-3">
            <label>Curso</label>
            <p class="form-control">
                <?= $aluno["curso_aluno"]; ?>
            </p>
        </div>
<?php
    } else {
        echo "<h5>Aluno não encontrado</h5>";
    }
} else {
    echo "<h5>ID do aluno não foi passado na URL.</h5>";
}
?>
