<?php
// ini_set('max_execution_time', '0');
set_time_limit(0);

include "database.php";

// add uuid field into database

$tables = [
    "states", "cities", 
    // "users", "sectors", "equipamentos", "customers", 
    // "servidors", "pools", "interfaces", "ipclasses", "planos", "assinaturas",
    // "equipamento_por_assinaturas", "carnes", "carne_gerencia", "chamado_cats", "chamados",
    // "lc_cat", "lc_movimento"
];

foreach ($tables as $key => $table) {
    updateUuids($table, $conn);
}

function updateUuids ($tableName, $conn) {
    $table_data = $conn->query("SELECT * FROM $tableName WHERE uuid IS NULL ORDER BY id ASC");
    $states_data = [];

    if ($table_data->num_rows > 0) {
        while ($row = $table_data->fetch_assoc()) {
            $states_data[] = $row;
            $id = $row['id'];
            $uuid = rand(10000000000, 19999999999999);
            mysqli_query($conn, "UPDATE $tableName set uuid = $uuid WHERE id = $id");
        }

        echo "Tabela $tableName actualizada \n";
    }
}

echo "<h1>Os uuids em todas as colunas foram preenchidos.</h1>";