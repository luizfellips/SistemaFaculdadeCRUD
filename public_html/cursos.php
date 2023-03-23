<?php
require_once("../vendor/autoload.php");
use Modules\Curso;

$cursos = Curso::getCursosGerais();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/index.css">
    <link rel="stylesheet" href="src/css/cursos.css">
    <title>Cursos</title>
</head>

<body>
    <?php include('templates/header.php') ?>
    <main>
        <h1>Cursos disponíveis </h1>
        <table class="tabela-cursos">
            <tr>
                <th>ID Curso</th>
                <th>Nome do curso</th>
                <th>Formação do curso</th>
                <th>Quantidade de alunos</th>
        </tr>
            
            <tbody>
                <?php
                for ($i = 0; $i < count($cursos); $i++) {
                    echo '<tr>';
                    ?>
                    <td>
                        <?php echo $cursos[$i]['Curso_ID'] ?>
                    </td>
                    <td>
                        <?php echo $cursos[$i]['Nome'] ?>
                    </td>
                    <td>
                        <?php echo $cursos[$i]['Formação'] ?>
                    </td>
                    <td>
                        <?php echo $cursos[$i]['Quantidade_Estudantes'] ?>
                    </td>
                    <?php
                }
                ?>

            </tbody>

        </table>
    </main>
</body>

</html>