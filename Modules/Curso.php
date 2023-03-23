<?php
namespace Modules;

class Curso
{
    public static function getCursos(): array
    {
        $conn = Connection::getConnection();
        $query = "select distinct nome from curso";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $cursos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $cursos;
    }

    public static function getCursosGerais(): array
    {
        $conn = Connection::getConnection();
        $query = "select * from curso";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $cursos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $cursos;
    }

    public static function getCursoID($Curso,$Formacao){
        $conn = Connection::getConnection();
        $sql = "select Curso_ID from curso where Nome = ? and Formação = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $Curso, \PDO::PARAM_STR);
        $stmt->bindParam(2, $Formacao, \PDO::PARAM_STR);
        $stmt->execute();
        $curso_id = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $curso_id['Curso_ID'];
    }
}