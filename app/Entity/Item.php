<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;


class Item
{

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
    public $id_cliente;


    /** 
     *Indentificador Unico de item 
     *@var integer
     */
    public $id_set;

    /** 
     *Método responsavel por cadastrar um novo usuario no banco 
     *@return boolean
     */


    public function cadastrar()
    {

        $objDatabase = new Database('item');
        $this->id = $objDatabase->insert([
            'nome' => $this->nome,
            'modelo' => $this->modelo,
            'id_categoria' => $this->id_categoria,
            'apelido' => $this->apelido,
            'num_patrimonio' => $this->num_patrimonio,
            'num_serie' => $this->num_serie,
            'fabricante' => $this->fabricante,
            'id_cli' => $this->id_cli,
            'id_set' => $this->id_set
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
    public static function getItem($where = null, $order = null, $limit = null)
    {
        return (new Database('item'))->select($where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function getEquip()
    {
        $banco = new Database("vw_ger_item");
        $dados = $banco->select()->fetchAll();
        return $dados;
    }

    public static function getEquip2($id_item)
    {
        return (new Database('item'))->select('id_item = ' . $id_item)
            ->fetchObject(self::class);
    }

    public function atualizar()
    {
        return (new Database('item'))->update('id_item = ' . $this->id_item, [
            'nome' => $this->nome,
            'modelo' => $this->modelo,
            'id_categoria' => $this->id_categoria,
            'apelido' => $this->apelido,
            'num_patrimonio' => $this->num_patrimonio,
            'num_serie' => $this->num_serie,
            'fabricante' => $this->fabricante,
            'id_cli' => $this->id_cli,
            'id_set' => $this->id_set
        ]);
    }

    public function excluir()
    {
        return (new Database('item'))->delete('id_item = ' . $this->id_item);
    }

    public static function getItensByCliente($id_cliente)
    {
        $db = new Database('vw_ger_item');
        return $db->select('id_cli = ' . $id_cliente, null, null, 'id_item, apelido')->fetchAll(PDO::FETCH_OBJ);
    }
    
    
}
