<?php
namespace Modules;

class Matricula
{
    public static function getMatriculas(): array
    {
        $conn = Connection::getConnection();
        $query = "select * from matricula";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $matriculas = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $matriculas;
    }
    
}