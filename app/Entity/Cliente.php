<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;


class Cliente{

    /** 
     *Indentificador Unico do cliente 
     *@var integer
    */
    public $id_cli;  
    
    /** 
     *Nome do cliente 
     *@var string
    */
    public $nome;  

    /** 
    *Codigo do cliente 
    *@var string
    */
    public $codigo; 

    /** 
    *Cnpj do cliente 
    *@var string
    */
    public $cnpj;
    
    /** 
    *Telefone do cliente 
    *@var string
    */
    public $telefone;
    
    /** 
    *País do cliente 
    *@var string
    */
    public $pais; 
        
    /** 
    *Cep do cliente 
    *@var string
    */
    public $cep;
        
    /** 
    *Cidade do cliente 
    *@var string
    */
    public $cidade;
        
    /** 
    *Estado do cliente 
    *@var string
    */
    public $estado;
        
    /** 
    *Numero do cliente 
    *@var string
    */
    public $numero;
        
    /** 
    *Rua do cliente 
    *@var string
    */
    public $rua;
        
    /** 
    *Bairro do cliente 
    *@var string
    */
    public $bairro;
    
        
    /** 
    *observação do cliente 
    *@var string
    */
    public $observacao; 


    /** 
     *Método responsavel por cadastrar uma nova categoria no banco 
     *@return boolean
    */
    public function cadastrar(){

            $objDatabase = new Database('cliente');
            $this->id = $objDatabase->insert([
                'codigo' => $this->codigo,
                'nome' => $this->nome,
                'telefone' => $this->telefone,
                'cnpj' => $this->cnpj,
                'pais' => $this->pais,
                'cep' => $this->cep,
                'cidade' => $this->cidade,
                'estado' => $this->estado,
                'numero' => $this->numero,
                'rua' => $this->rua,
                'bairro' => $this->bairro,
                'observacao' => $this->observacao,
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
