<?php
require_once("../../vendor/autoload.php");
use Modules\Curso;
use App\Models\EstudanteFactory;
$cursos = Curso::getCursos();

if(isset($_POST['Nome']) && isset($_POST['CPF']) && isset($_POST['Curso']) && isset($_POST['Formacao'])){
    $nome = $_POST['Nome'];
    $cpf = $_POST['CPF'];
    $curso = $_POST['Curso'];
    $formacao = $_POST['Formacao'];

    try {
        $estudante = EstudanteFactory::NovoEstudante($nome,$cpf,$curso,$formacao);
        EstudanteFactory::MatricularEstudante($estudante);
        header("Location: ../estudantes.php");
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
    <title>Matricular Aluno</title>
</head>

<body>
    <section class="area-login">

        <div class="login" id="login">
            <h1>Novo Registro</h1>
            <form action="matricular.php" method="POST">
                <input type="text" name="Nome" placeholder="Insira seu nome" required autofocus>
                <input type="text" name="CPF" onkeypress="mask(this,cpf)" maxlength="14"  placeholder="Insira seu CPF" required autofocus>
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
                <input class="btn btn-primary" type="submit" value="Matricular">
            </form>
            <a href="../Gerenciamento/estudantes.php">Voltar</a></p>
        </div>
    </section>
</body>
</html>