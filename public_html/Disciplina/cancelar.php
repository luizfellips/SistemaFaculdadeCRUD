<?php
require_once("../../vendor/autoload.php");
use Modules\Curso;
use App\Models\CursoFactory;
$cursos = Curso::getCursos();

if(isset($_POST['Curso']) && isset($_POST['Formacao'])){
    $nome = $_POST['Curso'];
    $formacao = $_POST['Formacao'];
    try {
        $curso = CursoFactory::NovoCurso($nome,$formacao);
        CursoFactory::CancelarCurso($curso);
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
    <script src="../src/js/formacao_dinamica.js"></script>
    <script src="../src/js/cpf_mascara.js"></script>
    <title>Cancelar disciplina</title>
</head>

<body>
    <section class="area-login">

        <div class="login" id="login">
            <h1>Cancelar um curso</h1>
            <form action="cancelar.php" method="POST">
                <select name="Curso" id="curso">
                    <option>Especifique a disciplina que deseja cancelar</option>
                    <?php
                    for ($i = 0; $i < count($cursos); $i++) {
                        echo "<option value=" . "'" . $cursos[$i]['nome'] . "'" . ">" . $cursos[$i]['nome'] . "</option>";
                    }
                    ?>


                </select>
                <select name="Formacao" id="formacao" required>

                </select>
                <input class="btn btn-primary" type="submit" value="Cancelar">
            </form>
            <a href="../Gerenciamento/disciplinas.php">Voltar</a></p>
        </div>
    </section>
</body>
</html>