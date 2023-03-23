<?php
namespace App\Models;
abstract class Matricula{
    protected $IDMatricula;
    protected $DataMatricula;

    public function __construct($IDMatricula,$DataMatricula){
        $this->IDMatricula = $IDMatricula;
        $this->DataMatricula = $DataMatricula;
    }

	function getIDMatricula() { 
 		return $this->IDMatricula; 
	} 

	function setIDMatricula($IDMatricula) {  
		$this->IDMatricula = $IDMatricula; 
	} 

	function getDataMatricula() { 
 		return $this->DataMatricula; 
	} 

	function setDataMatricula($DataMatricula) {  
		$this->DataMatricula = $DataMatricula; 
	} 
}