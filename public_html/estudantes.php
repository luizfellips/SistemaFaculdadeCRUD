<?php
require_once("../vendor/autoload.php");
use Modules\Estudante;

$estudantes = Estudante::getEstudantes();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/index.css">
    <link rel="stylesheet" href="src/css/estudantes.css">
    <title>Estudantes</title>
</head>

<body>
    <?php include('templates/header.php')?>
    <main>
        <h1>Estudantes matriculados</h1>
        <table class="tabela-estudantes">
            <tr>
                <th>ID Estudante</th>
                <th>Nome</th>
                <th>Curso</th>
                <th>Formação</th>
                <th>Data de Matrícula</th>
        </tr>
            
            <tbody>
                <?php
                for ($i = 0; $i < count($estudantes); $i++) {
                    echo '<tr>';
                    ?>
                    <td>
                        <?php echo $estudantes[$i]['Estudante_ID'] ?>
                    </td>
                    <td>
                        <?php echo $estudantes[$i]['Nome'] ?>
                    </td>
                    <td>
                        <?php echo $estudantes[$i]['Curso'] ?>
                    </td>
                    <td>
                        <?php echo $estudantes[$i]['Formação'] ?>
                    </td>
                    <td>
                        <?php echo $estudantes[$i]['DataMatricula'] ?>
                    </td>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>