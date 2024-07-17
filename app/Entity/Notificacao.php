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

    public $visto;

    public $id_chama;

    /**
     * Método responsável por cadastrar a notificação no banco de dados
     * @param string $mensagem
     * @param integer $userId
     * @return boolean
     */
    public function cadastrar($mensagem, $userId, $id_chama) {
        // Atribui a mensagem e o usuário às propriedades do objeto
        $this->notificacao = $mensagem;
        $this->id_user = $userId;
        $this->id_chama = $id_chama;
        $visto = 0;

        // Cria um novo registro no banco de dados
        $objDatabase = new Database('notificacao');
        $this->id_not = $objDatabase->insert([
            'id_user' => $this->id_user,
            'id_chama' =>$this->id_chama,
            'notificacao' => $this->notificacao,
            'visto' => $visto
            
        ]);

        // Retorna sucesso
        return true;
    }

    public static function getNot()
    {
        $banco = new Database("vw_notificacoes");
        $dados = $banco->select(null, 'visto ASC, id_not DESC')->fetchAll();
        return $dados;
    }

    public static function vizualizarNot($idNot) {
        $visto = 1;

        return (new Database('notificacao'))->update('id_not = ' . $idNot, [
            'visto' => $visto
        ]);
    }


}
