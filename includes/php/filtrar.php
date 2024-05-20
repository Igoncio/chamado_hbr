<?php

include_once ("../../app/Db/connPoo.php");

if (!empty($_POST["id_cli"])) {
    // Prepare the SQL query to fetch items for the selected client
    $query = $db->prepare("SELECT apelido, id_item FROM vw_ger_item WHERE id_cli = ?");
    $query->bind_param("i", $_POST['id_cli']);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        echo '<option value="">Selecione o Item</option>';
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . htmlspecialchars($row['id_item']) . '">' . htmlspecialchars($row['apelido']) . '</option>';
        }
    } else {
        echo '<option value="">Item Indisponível</option>';
    }

    $query->close();
} else {
    echo '<option value="">Cliente não selecionado</option>';
}
?>
