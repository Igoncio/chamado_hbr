<?php

namespace App\Db;

use \PDO;

class Database{

    /** 
     *Host com o banco de dados
     *@var string
    */

    const HOST = 'db';

    /** 
     *Nome do Banco de dados 
     *@var string
    */

    const NAME = 'chamado_hbr';

    /** 
     *Usuario do Banco
     *@var string
    */

    const USER = 'root';

    /** 
     *Senha do banco 
     *@var string
    */
    const PASSWORD = 'toor';

    /** 
     *Nome da tabela a ser manipulada 
     *@var string
    */

    private $table;

    /** 
     *Instâncio de conexão do banco de dados 
     *@var PDO
    */
    private $connection;



    /** 
     *Define a tabela e instancia da conexão 
     *@param string $table
    */
    public function __construct($table = null){
        $this ->table = $table;
        $this ->setConnection();
    }

    /** 
     *Método responsavel por criar uma conexão com banco de dados
    */
    private function setConnection(){
        try{
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);            
        }catch(\PDOException $e){
            die('ERROR: '. $e->getMessage());
        }
    }
}