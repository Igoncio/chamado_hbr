<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;


class Categoria{

    /** 
     *Indentificador Unico de categoria 
     *@var integer
    */
    public $id_categoria;   
    
    /** 
     *Nome da categoria 
     *@var string
    */
    public $nome;  


    /** 
     *Método responsavel por cadastrar uma nova categoria no banco 
     *@return boolean
    */


    public function cadastrar(){

        $objDatabase = new Database('categoria');
        $this -> id =  $objDatabase->insert([
                                'nome' => $this->nome,
                            ]);
       
        return true;

    }



}
