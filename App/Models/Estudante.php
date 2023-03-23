<?php
namespace App\Models;

class Estudante{
    protected $CPF;
	
    protected $Curso;
	

    public function __construct( $CPF,$Curso)
    {
		$this->CPF = $CPF;
        $this->Curso = $Curso;
    }



	
	function getCurso() { 
 		return $this->Curso; 
	} 

	function setCurso($Curso) {  
		$this->Curso = $Curso; 
	} 

	function getCPF() { 
 		return $this->CPF; 
	} 

	function setCPF($CPF) {  
		$this->CPF = $CPF; 
	} 
}