<?

use App\Entity\Chamado;

$objchama = Chamado::getChama2($_GET['id_chamado']);
// Verificar se o ID do item está presente e é um número válido
echo"<pre>"; print_r($objchama); echo"</pre>";
exit;

if (!isset($_GET['id_chamado']) || !is_numeric($_GET['id_chamado'])) {
    header('Location: main_validar_chamado.php');
    exit;
}

// Consulta o item e verifica se é uma instância de Chamado


if (!$objchama instanceof Chamado) {
    header('Location: main_validar_chama2.php');
    exit;
}
