<?php
session_start();
require "conexao.php";
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-4">
    <?php include('mensagem.php'); ?>
    <div class="row">
      <div class="col-mn-12">
        <div class="card">
          <div class="card-header"> 
            <h4> Lista de Alunos </h4>
            <a href="aluno-create.php" class="btn btn-primary float-end"><span class="bi-person-add"></span>&nbsp;Adicionar Aluno</a>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Data Nascimento</th>
                  <th>Curso</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT * FROM ALUNOS";
                $alunos = mysqli_query($conexao, $sql);

                if (mysqli_num_rows($alunos) > 0) {
                    foreach ($alunos as $aluno) {
                ?>
                    <tr>
                        <td><?=$aluno["id_aluno"]?></td>
                        <td><?=$aluno["nome_aluno"]?></td>
                        <td><?=$aluno["email_aluno"]?></td>
                        <td><?=date('d/m/Y', strtotime($aluno["dt_nasc"]))?></td>
                        <td><?=$aluno["curso_aluno"]?></td>
                        <td>
                            <a href="aluno-view.php?id_aluno=<?=$aluno['id_aluno']?>" class="btn btn-secondary btn-sm"><span class="bi-eye-fill"></span>&nbsp;Visualizar</a>
                            <a href="aluno-edit.php?id_aluno=<?=$aluno['id_aluno']?>" class="btn btn-success btn-sm"><span class="bi-pencil"></span>&nbsp;Editar</a>
                            <form action="acoes.php" method="POST" class="d-inline">
                                <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="delete-aluno" value="<?=$aluno['id_aluno']?>" class="btn btn-danger btn-sm">
                                <span class="bi-trash"></span>&nbsp;
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php
                    }
                } else {
                    echo "<h5>Nenhum aluno encontrado</h5>";
                }
                ?>  
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
