<?php
require_once("../vendor/autoload.php");
use Modules\Matricula;
$matriculas = Matricula::getMatriculas();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/index.css">
    <link rel="stylesheet" href="src/css/matriculas.css">
    <title>Matrículas</title>
</head>
<body>
<?php include('templates/header.php') ?>
<main>
        <h1>Matrículas registradas </h1>
        <table class="tabela-matriculas">
            <tr>
                <th>ID Matrícula</th>
                <th>ID Estudante</th>
                <th>ID Curso</th>
                <th>Data de Matrícula</th>
        </tr>
            
            <tbody>
                <?php
                for ($i = 0; $i < count($matriculas); $i++) {
                    echo '<tr>';
                    ?>
                    <td>
                        <?php echo $matriculas[$i]['ID_Matricula'] ?>
                    </td>
                    <td>
                        <?php echo $matriculas[$i]['Estudante_ID'] ?>
                    </td>
                    <td>
                        <?php echo $matriculas[$i]['Curso_ID'] ?>
                    </td>
                    <td>
                        <?php echo $matriculas[$i]['DataMatricula'] ?>
                    </td>
                    <?php
                }
                ?>

            </tbody>

        </table>
    </main>
</body>
</html>