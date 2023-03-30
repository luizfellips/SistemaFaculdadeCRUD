<?php
require_once("../../vendor/autoload.php");
use App\Models\CursoFactory;

if(isset($_POST['Nome']) && isset($_POST['Formacao'])){
    $nome = $_POST['Nome'];
    $formacao = $_POST['Formacao'];

    try {
        $curso = CursoFactory::NovoCurso($nome,$formacao);
        CursoFactory::AdicionarCurso($curso);
        header("Location: ../cursos.php");
        exit;
    } catch (\Throwable $th) {
        print_r($th);
    }
       
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/index.css">
    <link rel="stylesheet" href="../src/css/matricular.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <title>Adicionar novo curso</title>
</head>

<body>
    <section class="area-login">

        <div class="login" id="login">
            <h1>Novo registro de curso</h1>
            <form action="adicionar.php" method="POST">
                <input type="text" name="Nome" placeholder="Digite o nome do curso" required autofocus>
                <select name="Formacao" id="curso">
                    <option>Selecione o tipo de formação deste curso</option>
                    <option value="Bacharelado">Bacharelado</option>
                    <option value="Licenciatura">Licenciatura</option>
                    <option value="Ambos">Bacharelado/Licenciatura</option>
                    <option value="Tecnólogo">Tecnólogo</option>
                </select>
                <input class="btn btn-primary" type="submit" value="Registrar">
            </form>
            <a href="../Gerenciamento/disciplinas.php">Voltar</a></p>
        </div>
    </section>
</body>
</html>