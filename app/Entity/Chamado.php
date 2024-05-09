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
     * Nome do arquivo de imagem associado ao chamado
     * @var string
     */
    public $status;

    /**
     * Nome do arquivo de imagem associado ao chamado
     * @var string
     */
    public $tipo;

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

    $statusinicial = 'nao_visto';

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
        'solicitante' => $this->solicitante,
        'status' => $statusinicial,
        'tipo'=> $this->tipo
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

    public static function getChama2($id_chamado){
        // Verifica se $id_chamado é um valor válido
        if (!empty($id_chamado)) {
            // Obtém o tipo de dados para a comparação no SQL
            $dataType = is_numeric($id_chamado) ? 'numeric' : 'string';
            
            // Prepara a cláusula WHERE com base no tipo de dados
            $whereClause = $dataType === 'numeric' ? 'id_chamado = ' . $id_chamado : 'id_chamado = "' . $id_chamado . '"';
            
            // Executa o select usando a cláusula WHERE preparada
            return (new Database('chamado'))->select($whereClause)->fetchObject(self::class);
        } else {
            return null; // Retorna null se $id_chamado não for válido
        }
    }

    public static function getChama3($id_chamado){
        // Verifica se $id_chamado é um valor válido
        if (!empty($id_chamado)) {
            // Obtém o tipo de dados para a comparação no SQL
            $dataType = is_numeric($id_chamado) ? 'numeric' : 'string';
            
            // Prepara a cláusula WHERE com base no tipo de dados
            $whereClause = $dataType === 'numeric' ? 'id_chamado = ' . $id_chamado : 'id_chamado = "' . $id_chamado . '"';
            
            // Executa o select usando a cláusula WHERE preparada
            return (new Database('vw_vizualizar_chamado'))->select($whereClause)->fetchObject(self::class);
        } else {
            return null; // Retorna null se $id_chamado não for válido
        }
    }

    public function atualizar(){

        $id_chamados = "id_chamado = '" . $this->id_chamado . "'";
        return (new Database('chamado'))->update($id_chamados, [
            'abertura' => $this->abertura,
            'fechamento' => $this->fechamento,
            'id_cli' => $this->id_cli,
            'id_user' => $this->id_user,
            'id_item' => $this->id_item,
            'descricao' => $this->descricao,
            'num_patrimonio' => $this->num_patrimonio,
            'num_serie' => $this->num_serie,
            'prioridade' => $this->prioridade,
            'tipo' => $this->tipo
        ]);

    }

    public function AceitarChamado()
    {
        $statusinicial = "os";
        $id_chamados = "id_chamado = '" . $this->id_chamado . "'";
    
        return (new Database('chamado'))->update($id_chamados, [
            'status' => $statusinicial
        ]);
    
    }
}