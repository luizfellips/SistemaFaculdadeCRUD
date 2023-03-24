<?php
namespace App\Models;
class EstudanteFactory{
    
    public static function NovoEstudante($Nome, $CPF, $Curso, $Formacao){
        $estudante = new Estudante($Nome,$CPF,$Curso,$Formacao);
        return $estudante;
    }

    public static function BuscarEstudantePorCPF($CPF){
        $connection = \Modules\Connection::getConnection();
        $sql = "select t1.Nome, t1.CPF, t2.Nome as Curso, t2.Formação
        from estudante as t1
        inner join curso t2 on t1.Curso_ID = t2.Curso_ID
        where CPF = :CPF";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(":CPF", $CPF);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        $estudante = new Estudante($result['Nome'],$result['CPF'],$result['Curso'],$result['Formação']);
        return $estudante;

        
    }

    public static function MatricularEstudante(Estudante $estudante){
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
        $stmt = $connection->prepare('CALL CancelarMatricula(?)');
        $stmt->bindParam(1,$CPF,\PDO::PARAM_STR);
        $stmt->execute();

    }

    public static function AlterarCurso(Estudante $estudante,$Curso_Desejado_ID)
    {
        $connection = \Modules\Connection::getConnection();
        $CPF = $estudante->getCPF();
        
        $stmt = $connection->prepare('CALL AlterarCurso(?,?)');
        $stmt->bindParam(1,$CPF,\PDO::PARAM_STR);
        $stmt->bindParam(2,$Curso_Desejado_ID,\PDO::PARAM_INT);
        $stmt->execute();

    }

}