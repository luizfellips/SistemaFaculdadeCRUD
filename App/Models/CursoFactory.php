<?php
namespace App\Models;

class CursoFactory
{

    public static function NovoCurso($Nome, $Formacao)
    {
        $curso = new Curso($Nome, $Formacao);
        return $curso;
    }

    public static function BuscarCurso($Nome)
    {
        $connection = \Modules\Connection::getConnection();
        $sql = "SELECT Nome,Formação FROM curso WHERE Nome = :Nome";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(":Nome", $Nome);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        $curso = new Curso($result['Nome'], $result['Formação']);
        return $curso;


    }

    public static function AdicionarCurso(Curso $curso)
    {
        $nome = $curso->getNome();
        $formacao = $curso->getFormacao();
        $connection = \Modules\Connection::getConnection();

        if ($formacao == "Ambos") {
            $formacao = 'Bacharelado';
            $sql = "INSERT INTO curso(Nome,Formação) VALUES (?,?)";
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(1, $nome, \PDO::PARAM_STR);
            $stmt->bindParam(2, $formacao, \PDO::PARAM_STR);
            $stmt->execute();

            $formacao = 'Licenciatura';
            $sql = "INSERT INTO curso(Nome,Formação) VALUES (?,?)";
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(1, $nome, \PDO::PARAM_STR);
            $stmt->bindParam(2, $formacao, \PDO::PARAM_STR);
            $stmt->execute();
            
        }
        else {
            $sql = "INSERT INTO curso(Nome,Formação) VALUES (?,?)";
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(1, $nome, \PDO::PARAM_STR);
            $stmt->bindParam(2, $formacao, \PDO::PARAM_STR);
            $stmt->execute();
        }
       
    }
    public static function CancelarCurso(Curso $curso)
    {
        $connection = \Modules\Connection::getConnection();
        $nome = $curso->getNome();
        $formacao = $curso->getFormacao();
        $stmt = $connection->prepare('DELETE FROM curso WHERE nome = ? and formação = ?');
        $stmt->bindParam(1, $nome, \PDO::PARAM_STR);
        $stmt->bindParam(2, $formacao, \PDO::PARAM_STR);
        $stmt->execute();

    }

    public static function AlterarCurso(Estudante $estudante, $Curso_Desejado_ID)
    {
        $connection = \Modules\Connection::getConnection();
        $CPF = $estudante->getCPF();

        $stmt = $connection->prepare('CALL AlterarCurso(?,?)');
        $stmt->bindParam(1, $CPF, \PDO::PARAM_STR);
        $stmt->bindParam(2, $Curso_Desejado_ID, \PDO::PARAM_INT);
        $stmt->execute();

    }

}