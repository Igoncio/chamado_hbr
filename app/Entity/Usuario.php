<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;


class Usuario{

    /** 
     *Indentificador Unico de vaga 
     *@var integer
    */
    public $id_user;    

    /** 
     *Nome do usuário 
     *@var string
    */
    public $nome;

    /** 
     *Sobreome do usuário 
     *@var string
    */
    public $sobrenome;

    /** 
     *Telefone do usuário 
     *@var string
    */
    public $telefone;

    /** 
     *Email do usuário 
     *@var string
    */
    public $email;

    
    /** 
     *Cpf do usuário 
     *@var string
    */
    public $cpf;

    /** 
     *Senha do usuário 
     *@var string
    */
    public $senha;

    /** 
     *Cliente para qual o usuario trabalha 
     *@var string
    */
    public $cliente;

    /** 
     *Método responsavel por cadastrar um novo usuario no banco 
     *@return boolean
    */


    public function cadastrar(){

        $objDatabase = new Database('usuario');
        $this -> id =  $objDatabase->insert([
                                'nome' => $this->nome,
                                'sobrenome'=> $this->sobrenome,
                                'telefone'=> $this->telefone,
                                'email'=> $this->email,
                                'cpf'=> $this->cpf,
                                'senha'=> $this->senha,
                                'cliente'=> $this->cliente 
                            ]);
       
        return true;

    }



}
