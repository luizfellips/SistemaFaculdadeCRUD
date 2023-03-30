<?php
namespace App\Models;
class Curso{
    protected $Nome;
    protected $Formacao;

    public function __construct($Nome,$Formacao){
        $this->Nome = $Nome;
        $this->Formacao = $Formacao;
    }



	

	function getNome() { 
 		return $this->Nome; 
	} 

	function setNome($Nome) {  
		$this->Nome = $Nome; 
	} 

	function getFormacao() { 
 		return $this->Formacao; 
	} 

	function setFormacao($Formacao) {  
		$this->Formacao = $Formacao; 
	} 

	
}