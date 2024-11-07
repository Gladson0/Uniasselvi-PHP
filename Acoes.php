<?php
session_start();
require "conexao.php";

// Criação de aluno
if (isset($_POST['aluno-create'])) {
    $nome = isset($_POST['nome_aluno']) ? mysqli_real_escape_string($conexao, trim($_POST['nome_aluno'])) : "";
    $email = isset($_POST['email_aluno']) ? mysqli_real_escape_string($conexao, trim($_POST['email_aluno'])) : "";
    $data_nascimento = isset($_POST['dt_nasc']) ? mysqli_real_escape_string($conexao, trim($_POST['dt_nasc'])) : "";
    $curso = isset($_POST['curso_aluno']) ? mysqli_real_escape_string($conexao, trim($_POST['curso_aluno'])) : "";

    $sql = "INSERT INTO alunos (nome_aluno, email_aluno, dt_nasc, curso_aluno) VALUES ('$nome', '$email', '$data_nascimento', '$curso')";

    if (mysqli_query($conexao, $sql)) {
        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION["mensagem"] = "Aluno cadastrado com sucesso";
            header("Location: dash.php");
            exit;
        }
    }

    $_SESSION["mensagem"] = "O aluno não foi cadastrado, por favor verifique";
    header("Location: dash.php");
    exit;
}

// Atualização de aluno
if (isset($_POST['aluno-update'])) {
    $aluno_id = mysqli_real_escape_string($conexao, $_POST['id_aluno']);
    $nome = isset($_POST['nome_aluno']) ? mysqli_real_escape_string($conexao, trim($_POST['nome_aluno'])) : "";
    $email = isset($_POST['email_aluno']) ? mysqli_real_escape_string($conexao, trim($_POST['email_aluno'])) : "";
    $data_nascimento = isset($_POST['dt_nasc']) ? mysqli_real_escape_string($conexao, trim($_POST['dt_nasc'])) : "";
    $curso = isset($_POST['curso_aluno']) ? mysqli_real_escape_string($conexao, trim($_POST['curso_aluno'])) : "";

    $sql = "UPDATE alunos SET nome_aluno='$nome', email_aluno='$email', dt_nasc='$data_nascimento', curso_aluno='$curso' WHERE id_aluno='$aluno_id'";

    if (mysqli_query($conexao, $sql)) {
        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION["mensagem"] = "Aluno atualizado com sucesso"; 
            header("Location: dash.php");
            exit;
        }
    }

    $_SESSION["mensagem"] = "O aluno não foi atualizado, por favor verifique";
    header("Location: dash.php");
    exit;
}

// Exclusão de aluno
if (isset($_POST["delete-aluno"])) {
    $aluno_id = mysqli_real_escape_string($conexao, $_POST["delete-aluno"]);
    $sql = "DELETE FROM alunos WHERE id_aluno = '$aluno_id'";
    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION["mensagem"] = "O aluno foi removido com sucesso";
        header('Location: dash.php');
        exit;
    } else {
            $_SESSION["mensagem"] = "O aluno não foi removido ";
        header('Location: dash.php');
        }
        }
    exit;