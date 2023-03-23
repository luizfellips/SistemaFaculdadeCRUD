<?php 
require_once("../../vendor/autoload.php");
use App\Models\EstudanteFactory;
if(isset($_POST['CPF'])){
    $CPF = $_POST['CPF'];

        
    $Estudante = EstudanteFactory::NovoEstudante($CPF);
    EstudanteFactory::CancelarMatricula($Estudante);
    header("Location: ../estudantes.php");
    exit;
    
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
    <script src="../src/js/cpf_mascara.js"></script>
    <title>Cancelar matrícula</title>
</head>

<body>
    <section class="area-login">

        <div class="login" id="login">
            <h1>Cancelar Matrícula</h1>
            <form action="cancelar.php" method="POST">
                <input type="text" name="CPF" onkeypress="mask(this,cpf)" maxlength="14" placeholder="Insira o seu CPF para cancelar sua matrícula." required autofocus>
                <input class="btn btn-primary" type="submit" value="Cancelar Matrícula">
            </form>
            <a href="../Gerenciamento/estudantes.php">Voltar</a></p>
        </div>
    </section>
</body>

</html>