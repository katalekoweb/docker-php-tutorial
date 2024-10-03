<?php
ini_set('memory_limit', '-1'); 

include "database.php";

// change database
include "change-database-fields.php";

// // add uuids
include "update-all-null-uuid.php";

$json_data = [];

// @ STATES SECTION
// $states = $conn->query("SELECT * FROM states ORDER BY id ASC");
// $states_data = [];
// if ($states->num_rows > 0) {
//     while ($row = $states->fetch_assoc()) {
//         $states_data[] = $row;
//     }
// }
// $json_data["states"] = $states_data;

// // @ CITIES SECTION
// $cities = $conn->query("SELECT cities.*, states.uuid as state_uuid FROM cities LEFT JOIN states ON states.id = cities.estado ORDER BY id ASC");
// $cities_data = [];
// if ($cities->num_rows > 0) {
//     while ($row = $cities->fetch_assoc()) {
//         $cities_data[] = $row;
//     }
// }
// $json_data["cities"] = $cities_data;

// // just states ands cities
// $jsonString = json_encode($json_data, JSON_PRETTY_PRINT);
// $path = 'data/json_data-'. date('d-m-Y-H-i-s') .'.json';
// file_put_contents($path, $jsonString);
// echo "Ficheiro Json Salvo: " . $path;
// exit();

// @ SECTORS SECTION
$sectors = $conn->query("SELECT * FROM sectors ORDER BY id ASC");
$sectors_data = [];
if ($sectors->num_rows > 0) {
    while ($row = $sectors->fetch_assoc()) {
        $sectors_data[] = $row;
    }
}
$json_data["sectors"] = $sectors_data;


// @ USERS SECTION
$users = $conn->query("
    SELECT users.*, 
    sectors.uuid as sector_uuid,
    states.uuid as state_uuid,
    cities.uuid as city_uuid
    FROM users 
    LEFT JOIN sectors ON sectors.id = users.sector 
    LEFT JOIN states ON states.id = users.state_id 
    LEFT JOIN cities ON cities.id = users.city_id 
    ORDER BY users.id ASC
");
$users_data = [];
if ($users->num_rows > 0) {
    while ($row = $users->fetch_assoc()) {
        $users_data[] = $row;
    }
}
// add users to json data
$json_data["users"] = $users_data;


// @ EQUIPMENTS SECTION
$equipments = $conn->query("SELECT * FROM equipamentos ORDER BY id ASC");
$equipments_data = [];
if ($equipments->num_rows > 0) {
    while ($row = $equipments->fetch_assoc()) {
        $equipments_data[] = $row;
    }
}
$json_data["equipments"] = $equipments_data;

// @ CUSTOMERS SECTION
$customers = $conn->query("
    SELECT customers.*, users.uuid as user_uuid FROM customers  
    LEFT JOIN users 
    ON users.id = customers.user_id
    ORDER BY id ASC"
);
$customers_data = [];
if ($customers->num_rows > 0) {
    while ($row = $customers->fetch_assoc()) {
        $customers_data[] = $row;
    }
}
$json_data["customers"] = $customers_data;

// @ SERVERS SECTION
$servers = $conn->query("SELECT * FROM servidors ORDER BY id ASC");
$servers_data = [];
if ($servers->num_rows > 0) {
    while ($row = $servers->fetch_assoc()) {
        $servers_data[] = $row;
    }
}
$json_data["servers"] = $servers_data;

// @ POOLS SECTION
$pools = $conn->query("
    SELECT pools.*, servidors.uuid as server_uuid FROM pools 
    JOIN servidors ON servidors.id = pools.servidor_id 
    ORDER BY id ASC

");
$pools_data = [];
if ($pools->num_rows > 0) {
    while ($row = $pools->fetch_assoc()) {
        $pools_data[] = $row;
    }
}
$json_data["pools"] = $pools_data;

// @ INTERFACES SECTION
$interfaces = $conn->query("SELECT interfaces.*, servidors.uuid as server_uuid FROM interfaces JOIN servidors ON servidors.id = interfaces.servidor_id  ORDER BY id ASC");
$interfaces_data = [];
if ($interfaces->num_rows > 0) {
    while ($row = $interfaces->fetch_assoc()) {
        $interfaces_data[] = $row;
    }
}
$json_data["interfaces"] = $interfaces_data;

// @ IP CLASSES SECTION
$ipclasses = $conn->query("SELECT ipclasses.*, servidors.uuid as server_uuid FROM ipclasses JOIN servidors ON servidors.id = ipclasses.servidor_id  ORDER BY id ASC");
$ipclasses_data = [];
if ($ipclasses->num_rows > 0) {
    while ($row = $ipclasses->fetch_assoc()) {
        $ipclasses_data[] = $row;
    }
}
$json_data["ipclasses"] = $ipclasses_data;

// @ PACKAGES SECTION
$planos = $conn->query("
    SELECT planos.*, servidors.uuid as server_uuid, pools.uuid as pool_uuid FROM planos 
    LEFT JOIN servidors ON servidors.id = planos.servidor_id 
    LEFT JOIN pools ON pools.id = planos.pool_id 
    ORDER BY id ASC
");
$planos_data = [];
if ($planos->num_rows > 0) {
    while ($row = $planos->fetch_assoc()) {
        $planos_data[] = $row;
    }
}
$json_data["packages"] = $planos_data;

// @ SUBSCRIPTION SECTION
$assinaturas = $conn->query("
    SELECT assinaturas.*, users.uuid as client_uuid,
    pa.uuid as parent_uuid, 
    planos.uuid as package_uuid, 
    interfaces.uuid as interface_uuid,
    states.uuid as state_uuid,
    cities.uuid as city_uuid 
    FROM assinaturas 
    LEFT JOIN users ON users.id = assinaturas.user_id  
    LEFT JOIN assinaturas as pa ON pa.id = assinaturas.assinatura_referente_id
    LEFT JOIN planos ON planos.id = assinaturas.plano_id 
    LEFT JOIN interfaces ON interfaces.id = assinaturas.interface 
    LEFT JOIN states ON states.id = assinaturas.state_id 
    LEFT JOIN cities ON cities.id = assinaturas.city_id 
    ORDER BY assinaturas.id ASC
");
$assinaturas_data = [];
if ($assinaturas->num_rows > 0) {
    while ($row = $assinaturas->fetch_assoc()) {
        $assinaturas_data[] = $row;
    }
}
$json_data["subscriptions"] = $assinaturas_data;

// @ EQUIPEMENT SUBSCRIPTION SECTION
$equipamento_por_assinaturas = $conn->query("
    SELECT equipamento_por_assinaturas.*, 
    assinaturas.uuid as subscription_uuid, 
    equipamentos.uuid as equipment_uuid 
    FROM equipamento_por_assinaturas 
    LEFT JOIN equipamentos ON equipamentos.id = equipamento_por_assinaturas.equipamento_id 
    LEFT JOIN assinaturas ON assinaturas.id = equipamento_por_assinaturas.assinatura_id 
    ORDER BY equipamento_por_assinaturas.id ASC
");
$equipamento_por_assinaturas_data = [];
if ($equipamento_por_assinaturas->num_rows > 0) {
    while ($row = $equipamento_por_assinaturas->fetch_assoc()) {
        $equipamento_por_assinaturas_data[] = $row;
    }
}
$json_data["equipment_per_subscriptions"] = $equipamento_por_assinaturas_data;

// @ SIMPLE GERENCIA INVOICE SECTION
$gerencia_invoices = $conn->query("
    SELECT carne_gerencia.*, 
    users.uuid as client_uuid,
    assinaturas.uuid as subscription_uuid 
    FROM carne_gerencia 
    LEFT JOIN users ON users.id = carne_gerencia.user_id  
    LEFT JOIN assinaturas ON assinaturas.id = carne_gerencia.assinatura_id
    ORDER BY id ASC
");
$gerencia_invoices_data = [];
if ($gerencia_invoices->num_rows > 0) {
    while ($row = $gerencia_invoices->fetch_assoc()) {
        $gerencia_invoices_data[] = $row;
    }
}
$json_data["gerencia_invoices"] = $gerencia_invoices_data;

// @ SIMPLE INVOICE SECTION
$invoices = $conn->query("
    SELECT carnes.*, 
    users.uuid as client_uuid,
    carne_gerencia.uuid as invoice_group_uuid, 
    assinaturas.uuid as subscription_uuid, 
    planos.uuid as package_uuid 
    FROM carnes 
    LEFT JOIN users ON users.id = carnes.user_id  
    LEFT JOIN assinaturas ON assinaturas.id = carnes.assinatura_id
    LEFT JOIN planos ON planos.id = carnes.plano_id 
    LEFT JOIN carne_gerencia ON carne_gerencia.id = carnes.carne_gerencia_id 
    ORDER BY id ASC
");
$invoices_data = [];
if ($invoices->num_rows > 0) {
    while ($row = $invoices->fetch_assoc()) {
        $invoices_data[] = $row;
    }
}
$json_data["invoices"] = $invoices_data;

// @ TICKET SECTION
$chamados = $conn->query("
    SELECT chamados.*, users.uuid as user_uuid,
    employees.uuid as employee_uuid,
    assinaturas.uuid as subscription_uuid,
    chamado_cats.uuid as cat_uuid
    FROM chamados 
    LEFT JOIN users ON users.id = chamados.user_id
    LEFT JOIN users as employees ON employees.id = chamados.employer_id
    LEFT JOIN sectors ON sectors.id = chamados.sector_id
    LEFT JOIN assinaturas ON assinaturas.id = chamados.assinatura_id
    LEFT JOIN chamado_cats ON chamado_cats.id = chamados.chamado_cat_id
    ORDER BY id ASC
");
$chamados_data = [];
if ($chamados->num_rows > 0) {
    while ($row = $chamados->fetch_assoc()) {
        $chamados_data[] = $row;
    }
}
$json_data["tickets"] = $chamados_data;

$chamado_cats = $conn->query("SELECT * FROM chamado_cats ORDER BY id ASC");
$chamado_cats_data = [];
if ($chamado_cats->num_rows > 0) {
    while ($row = $chamado_cats->fetch_assoc()) {
        $chamado_cats_data[] = $row;
    }
}
$json_data["tickets_category"] = $chamado_cats_data;


// Finances Section
$finances_category = $conn->query("SELECT * FROM lc_cat ORDER BY id ASC");
$finances_category_data = [];
if ($finances_category->num_rows > 0) {
    while ($row = $finances_category->fetch_assoc()) {
        $finances_category_data[] = $row;
    }
}
$json_data["finances_category"] = $finances_category_data;

$finances = $conn->query("
    SELECT lc_movimento.*, 
    employees.uuid as employee_uuid,
    lc_cat.uuid as category_uuid,
    assinaturas.uuid as subscription_uuid
    FROM lc_movimento 
    LEFT JOIN users as employees ON employees.id = lc_movimento.employer_id
    LEFT JOIN lc_cat ON lc_cat.id = lc_movimento.cat
    LEFT JOIN assinaturas ON assinaturas.id = lc_movimento.assinatura_id
    ORDER BY id ASC
");
$cities_data = [];
if ($finances->num_rows > 0) {
    while ($row = $finances->fetch_assoc()) {
        $cities_data[] = $row;
    }
}
$json_data["finances"] = $cities_data;


$jsonString = json_encode($json_data, JSON_PRETTY_PRINT);
$path = 'data/json_data-'. date('d-m-Y-H-i-s') .'.json';
file_put_contents($path, $jsonString);
echo "Ficheiro Json Salvo: " . $path;
// $fp = fopen($path, 'w');
// fwrite($fp, $jsonString);
// fclose($fp);