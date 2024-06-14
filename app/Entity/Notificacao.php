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
     * Método responsável por cadastrar a notificação no banco de dados
     * @param string $mensagem
     * @return boolean
     */
    public function cadastrar($mensagem) {
        // Atribui a mensagem à propriedade do objeto
        $this->notificacao = $mensagem;

        // Cria um novo registro no banco de dados
        $objDatabase = new Database('notificacao');
        $this->id_not = $objDatabase->insert([
            'notificacao' => $this->notificacao
        ]);

        // Retorna sucesso
        return true;
    }
}
