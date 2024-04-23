<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Chamado
{
    /** 
     * Identificador Único do chamado 
     * @var integer
     */
    public $id_chamado;  
    
    /** 
     * Data de abertura do chamado 
     * @var string
     */
    public $abertura;  

    /** 
     * Data de fechamento do chamado 
     * @var string
     */
    public $fechamento; 

    /** 
     * ID do cliente associado ao chamado 
     * @var integer
     */
    public $id_cli;
    
    /** 
     * ID do setor associado ao chamado 
     * @var integer
     */
    public $id_set;
    
    /** 
     * ID da categoria associada ao chamado 
     * @var integer
     */
    public $id_cat; 
        
    /** 
     * ID do usuário responsável pelo chamado 
     * @var integer
     */
    public $id_user;

    /** 
     * ID do item associado ao chamado 
     * @var integer
     */
    public $id_item;

        /** 
     * ID do item associado ao chamado 
     * @var integer
     */
    public $solicitante;
        
    /** 
     * Descrição do chamado 
     * @var string
     */
    public $descricao;
        
    /** 
     * Número de patrimônio associado ao chamado 
     * @var string
     */
    public $num_patrimonio;

    /** 
     * Número de série associado ao chamado 
     * @var string
     */
    public $num_serie;
    
    /**
     * Prioridade do chamado. Valores possíveis: 'baixa', 'media', 'alta'
     * @var string
     */
    public $prioridade;

    /**
     * Nome do arquivo de imagem associado ao chamado
     * @var string
     */
    public $imagem;

    /** 
     * Método responsável por cadastrar um novo chamado no banco de dados 
     * @return boolean
     */
    public function cadastrar()
{
    // Obtém o número de chamados no mês atual
    $mesAtual = date('Y-m');
    $numChamados = (int) (new Database('chamado'))->select('DATE_FORMAT(abertura, "%Y-%m") = "'.$mesAtual.'"')->rowCount() + 1;

    // Formata o número de chamados para incluir zeros à esquerda, se necessário
    $numeroFormatado = str_pad($numChamados, 4, '0', STR_PAD_LEFT);

    // Gera o ID personalizado no formato Y-M.numero
    $idPersonalizado = $mesAtual . '.' . $numeroFormatado;

    // Insere o chamado no banco de dados usando o ID personalizado
    $objDatabase = new Database('chamado');
    $this->id = $objDatabase->insert([
        'id_chamado' => $idPersonalizado,
        'abertura' => $this->abertura,
        'fechamento' => $this->fechamento,
        'id_cli' => $this->id_cli,
        'id_user' => $this->id_user,
        'id_item' => $this->id_item,
        'descricao' => $this->descricao,
        'num_patrimonio' => $this->num_patrimonio,
        'num_serie' => $this->num_serie,
        'prioridade' => $this->prioridade,
        'imagem' => $this->imagem,
        'solicitante' => $this->solicitante
    ]);

    return true;
}

    /**
     * Método responsável por realizar o upload da imagem e salvar a referência no objeto
     * @param array $imagemDados Dados da imagem enviada via upload
     * @return boolean
     */
    public function uploadImagem($imagemDados)
    {
        // Verifica se houve algum erro no upload
        if ($imagemDados["error"] === UPLOAD_ERR_OK) {
            // Define o diretório de destino
            $diretorio_destino = "../imgs/chamado/";

            // Obtém o nome do arquivo
            $nome_arquivo = basename($imagemDados["name"]);

            // Move o arquivo para o diretório de destino
            if (move_uploaded_file($imagemDados["tmp_name"], $diretorio_destino . $nome_arquivo)) {
                // Atualiza a propriedade $imagem com o nome do arquivo
                $this->imagem = $nome_arquivo;
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public static function getChama(){
        $banco = new Database("vw_vizualizar_chamado");
        $dados = $banco -> select() -> fetchAll();
        return $dados;
    }
}
