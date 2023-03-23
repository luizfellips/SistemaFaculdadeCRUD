<?php
namespace App\Models;
class EstudantePadrao{
    protected $Nome;
	protected $CPF;
    protected $Curso;
    protected $Formacao;

    public function __construct($Nome, $CPF, $Curso, $Formacao){
        $this->Nome = $Nome;
		$this->CPF = $CPF;
        $this->Curso = $Curso;
        $this->Formacao = $Formacao;
    }

	function getNome() { 
 		return $this->Nome; 
	} 

	function setNome($Nome) {  
		$this->Nome = $Nome; 
	} 

	function getCurso() { 
 		return $this->Curso; 
	} 

	function setCurso($Curso) {  
		$this->Curso = $Curso; 
	} 

	function getFormacao() { 
 		return $this->Formacao; 
	} 

	function setFormacao($Formacao) {  
		$this->Formacao = $Formacao; 
	} 

	function getCPF() { 
 		return $this->CPF; 
	} 

	function setCPF($CPF) {  
		$this->CPF = $CPF; 
	} 
}