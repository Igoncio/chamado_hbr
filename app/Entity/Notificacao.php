<?php

namespace App\Entity;

use \App\Db\Database;

class Notificacao {

    /**
     * Identificador Único da Notificação
     * @var integer
     */
    public $id_not;

    /**
     * Mensagem da Notificação
     * @var string
     */
    public $notificacao;

    /**
     * Identificador do Usuário relacionado à notificação
     * @var integer
     */
    public $id_user;

    /**
     * Método responsável por cadastrar a notificação no banco de dados
     * @param string $mensagem
     * @param integer $userId
     * @return boolean
     */
    public function cadastrar($mensagem, $userId) {
        // Atribui a mensagem e o usuário às propriedades do objeto
        $this->notificacao = $mensagem;
        $this->id_user = $userId;

        // Cria um novo registro no banco de dados
        $objDatabase = new Database('notificacao');
        $this->id_not = $objDatabase->insert([
            'notificacao' => $this->notificacao,
            'id_user' => $this->id_user
        ]);

        // Retorna sucesso
        return true;
    }
}
