<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;


class Categoria
{

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
    public function cadastrar()
    {

        $objDatabase = new Database('categoria');
        $this->id = $objDatabase->insert([
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
    public static function getCategoria($where = null, $order = null, $limit = null)
    {
        return (new Database('categoria'))->select($where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

}
