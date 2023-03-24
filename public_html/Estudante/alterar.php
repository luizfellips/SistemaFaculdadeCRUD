<?php
require_once("../../vendor/autoload.php");
use Modules\Curso;
use App\Models\EstudanteFactory;
$cursos = Curso::getCursos();
if(isset($_POST['CPF'])  && isset($_POST['Curso']) && isset($_POST['Formacao'])){
    $CPF = $_POST['CPF'];
    $curso = $_POST['Curso'];
    $formacao = $_POST['Formacao'];
    $Curso_Desejado_ID = Curso::getCursoID($curso,$formacao);

    try {
        $estudante = EstudanteFactory::BuscarEstudantePorCPF($CPF);
        EstudanteFactory::AlterarCurso($estudante,$Curso_Desejado_ID);
        header("Location: ../estudantes.php");
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
    <title>Alterar curso</title>
</head>

<body>
    <section class="area-login">

        <div class="login" id="login">
            <h1>Alterar curso do aluno</h1>
            <form action="alterar.php" method="POST">
                <input type="text" name="CPF" onkeypress="mask(this,cpf)" maxlength="14"  placeholder="Insira o seu CPF para mudar o curso" required autofocus>
                <select name="Curso" id="curso">
                    <option>Escolha um curso</option>
                    <?php
                    for ($i = 0; $i < count($cursos); $i++) {
                        echo "<option value=" . "'" . $cursos[$i]['nome'] . "'" . ">" . $cursos[$i]['nome'] . "</option>";
                    }
                    ?>


                </select>
                <select name="Formacao" id="formacao" required>
                    <option value="">Escolha um tipo de formação para este curso</option>

                </select>
                <input class="btn btn-primary" type="submit" value="Alterar curso">
            </form>
            <a href="../Gerenciamento/estudantes.php">Voltar</a></p>
        </div>
    </section>
</body>

</html>