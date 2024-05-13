<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;


class Perfil
{

  /** 
   * Identificador Único do perfil 
   * @var integer
   */
  public $id_perf;

  /** 
   * Nome do perfil 
   * @var string
   */
  public $nome;

  /** 
   * Permissão para cadastrar cliente 
   * @var bool
   */
  public $cadastrar_cliente;

  /** 
   * Permissão para cadastrar perfil 
   * @var bool
   */
  public $cadastrar_perfil;

  /** 
   * Permissão para cadastrar usuário 
   * @var bool
   */
  public $cadastrar_usuario;

  /** 
   * Permissão para cadastrar equipamento 
   * @var bool
   */
  public $cadastrar_equipamento;

  /** 
   * Permissão para cadastrar chamado 
   * @var bool
   */
  public $cadastrar_chamado;

  /** 
   * Permissão para visualizar chamado 
   * @var bool
   */
  public $vizualizar_chamado;

  /** 
   * Permissão para relatório de chamados 
   * @var bool
   */
  public $relatorio_chamados;

  /** 
   * Permissão para todas as ordens de serviço 
   * @var bool
   */
  public $todas_os;

  /** 
   * Permissão para gerenciar perfil 
   * @var bool
   */
  public $gerenciar_perfil;

  /** 
   * Permissão para gerenciar usuário 
   * @var bool
   */
  public $gerenciar_usuario;

  /** 
   * Permissão para gerenciar equipamento 
   * @var bool
   */
  public $gerenciar_equipamento;

  /** 
   * Permissão para gerenciar cliente 
   * @var bool
   */
  public $gerenciar_cliente;

  /** 
   * Permissão para requisição de chamado 
   * @var bool
   */
  public $requisicao_chamado;

  /** 
   * Permissão para aceitar/recusar chamado 
   * @var bool
   */
  public $aceitar_recusar_chamado;

  /** 
   * Permissão para editar chamado 
   * @var bool
   */
  public $editar_chamado;

  /** 
   * Permissão para relatório de chamado 
   * @var bool
   */
  public $relatorio_chamado;

  /** 
   * Permissão para responder ordem de serviço 
   * @var bool
   */
  public $responder_os;

  /** 
   * Permissão para editar ordem de serviço 
   * @var bool
   */
  public $editar_os;

  /** 
   * Permissão para relatório de ordem de serviço 
   * @var bool
   */
  public $relatorio_os;

  /** 
   * Método responsável por cadastrar um novo perfil no banco 
   * @return bool
   */
  public function cadastrar()
  {
    $objDatabase = new Database('perfil');
    $this->id = $objDatabase->insert([
      'nome' => $this->nome,
      'cadastrar_cliente' => $this->cadastrar_cliente,
      'cadastrar_perfil' => $this->cadastrar_perfil,
      'cadastrar_usuario' => $this->cadastrar_usuario,
      'cadastrar_equipamento' => $this->cadastrar_equipamento,
      'cadastrar_chamado' => $this->cadastrar_chamado,
      'vizualizar_chamado' => $this->vizualizar_chamado,
      'relatorio_chamados' => $this->relatorio_chamados,
      'todas_os' => $this->todas_os,
      'gerenciar_perfil' => $this->gerenciar_perfil,
      'gerenciar_usuario' => $this->gerenciar_usuario,
      'gerenciar_equipamento' => $this->gerenciar_equipamento,
      'gerenciar_cliente' => $this->gerenciar_cliente,
      'requisicao_chamado' => $this->requisicao_chamado,
      'aceitar_recusar_chamado' => $this->aceitar_recusar_chamado,
      'editar_chamado' => $this->editar_chamado,
      'relatorio_chamado' => $this->relatorio_chamado,
      'responder_os' => $this->responder_os,
      'editar_os' => $this->editar_os,
      'relatorio_os' => $this->relatorio_os
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
  public static function getPerfil($where = null, $order = null, $limit = null)
  {
    return (new Database('perfil'))->select($where, $order, $limit)
      ->fetchAll(PDO::FETCH_CLASS, self::class);
  }

  public function atualizar()
  {
    return (new Database('perfil'))->update('id_perf = ' . $this->id_perf, [
      'nome' => $this->nome
    ]);
  }

  public static function getPerfil2($id_perf)
  {
    return (new Database('perfil'))->select('id_perf = ' . $id_perf)
      ->fetchObject(self::class);
  }

  public function excluir()
  {
    return (new Database('perfil'))->delete('id_perf = ' . $this->id_perf);
  }

}
