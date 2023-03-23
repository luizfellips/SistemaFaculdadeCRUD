<?php
namespace Modules;

class Estudante
{
    
    public static function getEstudantes(): array
    {
        $conn = Connection::getConnection();
        $query = "select t1.Estudante_ID, t1.Nome, t2.Nome as Curso, t2.Formação, t3.DataMatricula
        from estudante as t1
        inner join curso t2 on t1.Curso_ID = t2.Curso_ID 
        inner join matricula t3 on t1.Estudante_ID = t3.Estudante_ID";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $estudantes = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $estudantes = array_map(function ($item) {
            return array_filter(
                $item,
                function ($value) {
                    return !is_null($value);
                }
            );
        }, $estudantes);
        return $estudantes;
    }
}