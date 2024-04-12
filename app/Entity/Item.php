<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;


class Item{

    /** 
     *Indentificador Unico de item 
     *@var integer
    */
    public $id_item;    

    /** 
     *Nome do nome
     *@var string
    */
    public $nome;

    /** 
     *Sobreome do sobrenome
     *@var string
    */
    public $modelo;

    /** 
     *Telefone do usuário 
     *@var integer
    */
    public $id_categoria;

    /** 
     *Email do usuário 
     *@var string
    */
    public $apelido;

    
    /** 
     *Cpf do usuário 
     *@var string
    */
    public $num_patrimonio;

    /** 
     *Senha do usuário 
     *@var string
    */
    public $num_serie;

    /** 
     *Cliente para qual o usuario trabalha 
     *@var string
    */
    public $fabricante;

    /** 
     *Indentificador Unico de item 
     *@var integer
    */
    public $id_cli; 


    /** 
     *Indentificador Unico de item 
     *@var integer
    */
    public $id_set; 

    /** 
     *Método responsavel por cadastrar um novo usuario no banco 
     *@return boolean
    */


    public function cadastrar(){

        $objDatabase = new Database('item');
        $this -> id =  $objDatabase->insert([
                                'nome' => $this->nome,
                                'modelo'=> $this->modelo,
                                'id_categoria'=> $this->id_categoria,
                                'apelido'=> $this->apelido,
                                'num_patrimonio'=> $this->num_patrimonio,
                                'num_serie'=> $this->num_serie,
                                'fabricante'=> $this->fabricante, 
                                'id_cli'=> $this->id_cli,
                                'id_set'=> $this->id_set
                            ]);
       
        return true;

    }



}
