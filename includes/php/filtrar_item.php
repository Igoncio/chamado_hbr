<?php
use App\Entity\Item;

if (isset($_POST['id_cliente'])) {
    $id_cliente = $_POST['id_cliente'];
    $itens = Item::getItensByCliente($id_cliente);

    if (!empty($itens)) {
        echo '<option value="">Selecione o item</option>';

        foreach ($itens as $item) {
            echo '<option value="' . $item->id_item . '">' . $item->apelido . '</option>';
        }
    } else {
        echo '<option value="">Nenhum item encontrado para este cliente</option>';
    }
}
