<?php
namespace App\Models;
class Curso{
    protected $ID;
    protected $Nome;
    protected $Formacao;
    protected $QuantidadeDeAlunos;

    public function __construct($ID,$Nome,$Formacao,$QuantidadeDeAlunos){
        $this->ID = $ID;
        $this->Nome = $Nome;
        $this->Formacao = $Formacao;
        $this->QuantidadeDeAlunos = $QuantidadeDeAlunos;
    }


	function getID() { 
 		return $this->ID; 
	} 

	function setID($ID) {  
		$this->ID = $ID; 
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

	function getQuantidadeDeAlunos() { 
 		return $this->QuantidadeDeAlunos; 
	} 

	function setQuantidadeDeAlunos($QuantidadeDeAlunos) {  
		$this->QuantidadeDeAlunos = $QuantidadeDeAlunos; 
	} 
}