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
     *Cliente do setor
     *@var integer
    */
    public $cliente;

    /** 
     *Nome do setor
     *@var string
    */
    public $nome;  

    /** 
     *Descrição do setor 
     *@var string
    */
    public $descricao; 

    /** 
     *Método responsavel por cadastrar uma nova categoria no banco 
     *@return boolean
    */


    public function cadastrar(){

        $objDatabase = new Database('setor');
        $this -> id =  $objDatabase->insert([
                                'cliente' => $this->cliente,
                                'nome' => $this->nome,
                                'descricao' => $this->descricao,
                            ]);
       
        return true;

    }


    /** 
     *Método responsavel por obter informações dos setores pelo banco banco 
     *@param string $where
     *@param string $order
     *@param string $limit
     *@return array
    */
    public static function getSetor($where = null, $order = null, $limit = null){
        return (new Database('setor'))->select($where,$order,$limit)
                                      ->fetchAll(PDO::FETCH_CLASS,self::class);
      }




}
