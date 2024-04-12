<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;


class Chamado{

    /** 
     *Indentificador Unico do cliente 
     *@var integer
    */
    public $id_chamado;  
    
    /** 
     *Nome do cliente 
     
    */
    public $abertura;  

    /** 
    *Codigo do cliente 
    
    */
    public $fechamento; 

    /** 
    *Cnpj do cliente 
    *@var integer
    */
    public $id_cli;
    
    /** 
    *Telefone do cliente 
    *@var integer
    */
    public $id_set;
    
    /** 
    *País do cliente 
    *@var integer
    */
    public $id_cat; 
        
    /** 
    *Cep do cliente 
    *@var integer
    */
    public $id_user;

        /** 
    *Cep do cliente 
    *@var integer
    */
    public $id_item;
        
    /** 
    *Estado do cliente 
    *@var string
    */
    public $descricao;
        
    /** 
    *Numero do cliente 
    *@var string
    */
    public $num_patrimonio;

        /** 
    *Numero do cliente 
    *@var string
    */
    public $num_serie;
        
    /** 
    *Rua do cliente 
    *@var string
    */

    
    /**
     * @var string Prioridade do chamado. Valores possíveis: 'baixa', 'media', 'alta'
     */
    public $prioridade;

        
    /** 
    *Bairro do cliente 
    */
    // public $foto;
    
        


    /** 
     *Método responsavel por cadastrar uma nova categoria no banco 
     *@return boolean
    */
    public function cadastrar(){

            $objDatabase = new Database('chamado');
            $this->id = $objDatabase->insert([
                'abertura' => $this->abertura,
                'fechamento' => $this->fechamento,
                'id_cli' => $this->id_cli,
                'id_set' => $this->id_set,
                'id_cat' => $this->id_cat,
                'id_user' => $this->id_user,
                'id_item' => $this->id_item,
                'descricao' => $this->descricao,
                'num_patrimonio' => $this->num_patrimonio,
                'num_serie' => $this->num_serie,
                'prioridade' => $this->prioridade,
                // 'foto' => $this->foto,
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
    public static function getCliente($where = null, $order = null, $limit = null){
        return (new Database('cliente'))->select($where,$order,$limit)
                                      ->fetchAll(PDO::FETCH_CLASS,self::class);
      }



}
