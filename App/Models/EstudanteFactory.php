<?php
namespace App\Models;
class EstudanteFactory{
    
    public static function NovoEstudantePadrao($Nome, $CPF, $Curso, $Formacao){
        $estudante = new EstudantePadrao($Nome,$CPF,$Curso,$Formacao);
        return $estudante;
    }

    public static function NovoEstudante($CPF){
        $connection = \Modules\Connection::getConnection();
        $sql = "select Curso_ID from curso where Curso_ID = (select Curso_ID from estudante where CPF = :CPF)";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(":CPF",$CPF);
        $stmt->execute();
        $Curso = $stmt->fetch(\PDO::FETCH_ASSOC);
        $estudante = new Estudante($CPF,$Curso['Curso_ID']);
        return $estudante;
    }

    public static function MatricularEstudante(EstudantePadrao $estudante){
        $nome = $estudante->getNome();
        $CPF = $estudante->getCPF();
        $curso = $estudante->getCurso();
        $formacao = $estudante->getFormacao();
        $connection = \Modules\Connection::getConnection();
        $sql = "CALL Matricular(?,?,?,?)";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(1,$nome,\PDO::PARAM_STR);
        $stmt->bindParam(2,$CPF,\PDO::PARAM_STR);
        $stmt->bindParam(3,$curso,\PDO::PARAM_STR);
        $stmt->bindParam(4,$formacao,\PDO::PARAM_STR);
        $stmt->execute();
    }
    public static function CancelarMatricula(Estudante $estudante)
    {
        $connection = \Modules\Connection::getConnection();
        $CPF = $estudante->getCPF();
        $Curso_ID = $estudante->getCurso();
        $stmt = $connection->prepare('CALL CancelarMatricula(?,?)');
        $stmt->bindParam(1,$CPF,\PDO::PARAM_STR);
        $stmt->bindParam(2,$Curso_ID,\PDO::PARAM_INT);
        $stmt->execute();

    }

    public static function AlterarCurso(Estudante $estudante,$Curso_Desejado_ID)
    {
        $connection = \Modules\Connection::getConnection();
        $CPF = $estudante->getCPF();
        $Curso_Antigo_ID = $estudante->getCurso();
        
        $stmt = $connection->prepare('CALL AlterarCurso(?,?,?)');
        $stmt->bindParam(1,$CPF,\PDO::PARAM_STR);
        $stmt->bindParam(2,$Curso_Antigo_ID,\PDO::PARAM_INT);
        $stmt->bindParam(3,$Curso_Desejado_ID,\PDO::PARAM_INT);
        $stmt->execute();

    }

}