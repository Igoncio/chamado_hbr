<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;


class Perfil{

    /** 
     *Indentificador Unico de categoria 
     *@var integer
    */
    public $id_perf;   
    
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

        $objDatabase = new Database('perfil');
        $this -> id =  $objDatabase->insert([
                                'nome' => $this->nome,
                            ]);
       
        return true;

    }

    /** 
     *Método responsavel por obter informações das categorias pelo banco banco 
     *@param string $where
     *@param string $order
     *@param string $limit
     *@return array
    */
    public static function getPerfil($where = null, $order = null, $limit = null){
        return (new Database('perfil'))->select($where,$order,$limit)
                                      ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

      public function atualizar(){
        return (new Database('perfil'))->update('id_perf = '.$this->id_perf,[
                                                    'nome' => $this->nome 
                                                                  ]);
      }

    public static function getPerfil2($id_perf){
        return (new Database('perfil'))->select('id_perf = '.$id_perf)
                                      ->fetchObject(self::class);
      }


}
