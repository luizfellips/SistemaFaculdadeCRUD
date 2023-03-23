<?php
require_once("../../../vendor/autoload.php");
use Modules\Connection;
if(isset($_POST['Curso'])){
        $curso = $_POST['Curso'];
        $conn = Connection::getConnection();
        $query = "select formação from curso where nome = :nome";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(":nome", $curso);
        $stmt->execute();
        $formacoes = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($formacoes);
        
}
