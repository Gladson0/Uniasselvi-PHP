<?php
session_start();
require "conexao.php";
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Aluno</title>
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
                        <h4>Editar Aluno
                            <a href="index.php" class="btn btn-danger float-end"><span class="bi-backspace-fill"></span>&nbsp;Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET["id_aluno"])) {
                            $aluno_id = mysqli_real_escape_string($conexao, $_GET["id_aluno"]);
                            $sql = "SELECT * FROM alunos WHERE id_aluno='$aluno_id'";
                            $query = mysqli_query($conexao, $sql);

                            // Verifica se a consulta foi bem-sucedida e se encontrou um aluno
                            if ($query && mysqli_num_rows($query) > 0) {
                                $aluno = mysqli_fetch_array($query);
                        ?>
                                <form action="acoes.php" method="POST">
                                    <input type="hidden" name="aluno_id" value=""<?=$aluno['id_aluno']?>">
                                    <div class="mb-3">
                                        <label>Nome</label>
                                        <input type="text" name="nome_aluno" class="form-control" value="<?= ($aluno['nome_aluno']); ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email_aluno" class="form-control" value="<?= ($aluno['email_aluno']); ?>" class="form-control">>
                                    </div>
                                    <div class="mb-3">
                                        <label>Data de Nascimento</label>
                                        <input type="date" name="dt_nasc" class="form-control" value="<?= ($aluno['dt_nasc']); ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Curso</label>
                                        <input type="text" name="curso_aluno" class="form-control" value="<?= ($aluno['curso_aluno']); ?>" class="form-control">
                                    </div>
                                    <input type="hidden" name="id_aluno" value="<?= $aluno_id; ?>"> <!-- Passa o ID do aluno -->
                                    <div class="mb-3">    
                                        <button type="submit" name="aluno-update" class="btn btn-primary"><span class="bi-floppy2-fill"></span>&nbsp;Salvar</button> 
                                    </div>
                                </form>
                        <?php
                            } else {
                                echo "<h5>Aluno não encontrado ou erro na consulta</h5>";
                            }
                        } else {
                            echo "<h5>ID do aluno não foi passado na URL.</h5>";
                        }
                        ?>    
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
