<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Aluno</title>
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
          <h4>Adicionar Aluno
            <a href="dash.php" class="btn btn-danger float-end"><span class="bi-backspace-fill"></span>&nbsp;Voltar</a>
          </h4>
         </div>
         <div class="card-body">
          <form action="acoes.php" method="POST">
            <div class="mb-3">
              <label>Nome</label>
              <input type="text" name="nome_aluno" class="form-control">
            </div>
            <div class="mb-3">
              <label>Email</label>
              <input type="email" name="email_aluno" class="form-control">
            </div>
           <div class="mb-3">
              <label>Data de Nascimento</label>
              <input type="date" name="dt_nasc" class="form-control">
            </div>
            <div class="mb-3">
              <label>Curso</label>
              <input type="text" name="curso_aluno" class="form-control">
            </div>
            <div class="mb-3">    
             <button type="submit" name="aluno-create" class="btn btn-primary"><span class="bi-floppy2-fill"></span>&nbsp;Salvar</button> 
            </div>
          </form>
         </div>
        </div>
       </div>
      </div>
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>