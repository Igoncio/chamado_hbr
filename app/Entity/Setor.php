<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;


class Setor{

    /** 
     *Indentificador Unico do Setor
     *@var integer
    */
    public $id_set;   
    
    /** 
     *Nome do setor
     *@var string
    */
    public $nome;  

    /** 
     *Descrição do setor 
     *@var string
    */
    public $desc; 

    /** 
     *Método responsavel por cadastrar uma nova categoria no banco 
     *@return boolean
    */


    public function cadastrar(){

        $objDatabase = new Database('categoria');
        $this -> id =  $objDatabase->insert([
                                'nome' => $this->nome,
                                'descricao' => $this->desc,
                            ]);
       
        return true;

    }



}
