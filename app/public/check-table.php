<?php
// ini_set('max_execution_time', '0');
set_time_limit(0);

include "database.php";

// add uuid field into database

$tables = [
    "states", "cities", "users", "sectors", "equipamentos", "customers", 
    "servidors", "pools", "interfaces", "ipclasses", "planos", "assinaturas",
    "equipamento_por_assinaturas", "carnes", "carne_gerencia", "chamado_cats", "chamados",
    "lc_cat", "lc_movimento"
];

foreach ($tables as $key => $table) {
    checkEmptyUuids($table, $conn);
}

function checkEmptyUuids ($tableName, $conn) {
    $table_data = $conn->query("SELECT * FROM $tableName WHERE uuid IS NULL ORDER BY id ASC");
    $totalEmptyUuids = $table_data->num_rows;
    echo "Total de uuids vazios na tabela $tableName: $totalEmptyUuids \n";
}