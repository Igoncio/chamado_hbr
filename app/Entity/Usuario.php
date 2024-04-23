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
     *Senha do usuário 
     *@var string
    */
    public $senha;


    /** 
     *Nome do usuário 
     *@var string
    */
    public $perfil;

    /** 
     *Cliente para qual o usuario trabalha 
     *@var string
    */
    public $cliente;

        /** 
     *Cliente para qual o usuario trabalha 
     *@var string
    */
    public $status;

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
                                'senha'=> $this->senha,
                                'perfil'=> $this->perfil,
                                'cliente'=> $this->cliente,
                                'status'=> $this->status   
                            ]);
       
        return true;

    }

    /** 
     *Método responsavel por obter informações dos clientes pelo banco banco 
     *@param string $where
     *@param string $order
     *@param string $limit
     *@return array
    */
    public static function getUsuario($where = null, $order = null, $limit = null){
        return (new Database('usuario'))->select($where,$order,$limit)
                                      ->fetchAll(PDO::FETCH_CLASS,self::class);
      }


    public static function getGer(){
        $banco = new Database("vw_ger_user");
        $dados = $banco -> select() -> fetchAll();
        return $dados;
    }

    public static function getUser($id_user){
        return (new Database('usuario'))->select('id_user = '.$id_user)
                                      ->fetchObject(self::class);
      }
    
    public function atualizar(){
        return (new Database('usuario'))->update('id_user = '.$this->id_user,[
                                                'nome' => $this->nome,
                                                'sobrenome'=> $this->sobrenome,
                                                'telefone'=> $this->telefone,
                                                'email'=> $this->email,
                                                'senha'=> $this->senha,
                                                'perfil'=> $this->perfil,
                                                'cliente'=> $this->cliente,
                                                'status'=> $this->status   
                                                                  ]);
      }

    public function excluir(){
        return (new Database('usuario'))->delete('id_user = '.$this->id_user);
      }


    public function logar() {
        $obBanco = new Database("usuario");
        $rowUser = $obBanco->select('email = "' . $this->email . '" AND senha = "' . $this->senha . '"')->fetchAll(PDO::FETCH_ASSOC);
        // print_r($rowUser);
        // exit;
        if ($rowUser) {
            $_SESSION['id_user'] = $rowUser[0]['id_user'];
            return true;
        } else {
            return false;
        }
    }

}
