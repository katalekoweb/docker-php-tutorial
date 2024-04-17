<?php
ini_set('memory_limit', '-1'); 

$json_data = [];

// database connection
// $conn = mysqli_connect("db", "user", "secret", "docker-php");
$conn = new mysqli("db", "user", "secret", "docker-php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// @ STATES SECTION
$states = $conn->query("SELECT * FROM states ORDER BY id ASC");
$states_data = [];
if ($states->num_rows > 0) {
    while ($row = $states->fetch_assoc()) {
        $states_data[] = $row;
    }
}
$json_data["states"] = $states_data;

// @ CITIES SECTION
$cities = $conn->query("SELECT * FROM cities ORDER BY id ASC");
$cities_data = [];
if ($cities->num_rows > 0) {
    while ($row = $cities->fetch_assoc()) {
        $cities_data[] = $row;
    }
}
$json_data["cities"] = $cities_data;

// @ USERS SECTION
$users = $conn->query("SELECT * FROM users ORDER BY id ASC");
$users_data = [];
if ($users->num_rows > 0) {
    while ($row = $users->fetch_assoc()) {
        $users_data[] = $row;
    }
}
// add users to json data
$json_data["users"] = $users_data;

// @ SECTORS SECTION
$sectors = $conn->query("SELECT * FROM sectors ORDER BY id ASC");
$sectors_data = [];
if ($sectors->num_rows > 0) {
    while ($row = $sectors->fetch_assoc()) {
        $sectors_data[] = $row;
    }
}
$json_data["sectors"] = $sectors_data;

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
$customers = $conn->query("SELECT * FROM customers ORDER BY id ASC");
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
$pools = $conn->query("SELECT * FROM pools ORDER BY id ASC");
$pools_data = [];
if ($pools->num_rows > 0) {
    while ($row = $pools->fetch_assoc()) {
        $pools_data[] = $row;
    }
}
$json_data["pools"] = $pools_data;

// @ INTERFACES SECTION
$interfaces = $conn->query("SELECT * FROM interfaces ORDER BY id ASC");
$interfaces_data = [];
if ($interfaces->num_rows > 0) {
    while ($row = $interfaces->fetch_assoc()) {
        $interfaces_data[] = $row;
    }
}
$json_data["interfaces"] = $interfaces_data;

// @ IP CLASSES SECTION
$ipclasses = $conn->query("SELECT * FROM ipclasses ORDER BY id ASC");
$ipclasses_data = [];
if ($ipclasses->num_rows > 0) {
    while ($row = $ipclasses->fetch_assoc()) {
        $ipclasses_data[] = $row;
    }
}
$json_data["ipclasses"] = $ipclasses_data;

// @ PACKAGES SECTION
$planos = $conn->query("SELECT * FROM planos ORDER BY id ASC");
$planos_data = [];
if ($planos->num_rows > 0) {
    while ($row = $planos->fetch_assoc()) {
        $planos_data[] = $row;
    }
}
$json_data["packages"] = $planos_data;

// @ SUBSCRIPTION SECTION
$assinaturas = $conn->query("SELECT * FROM assinaturas ORDER BY id ASC");
$assinaturas_data = [];
if ($assinaturas->num_rows > 0) {
    while ($row = $assinaturas->fetch_assoc()) {
        $assinaturas_data[] = $row;
    }
}
$json_data["subscriptions"] = $assinaturas_data;

// @ EQUIPEMENT SUBSCRIPTION SECTION
$equipamento_por_assinaturas = $conn->query("SELECT * FROM equipamento_por_assinaturas ORDER BY id ASC");
$equipamento_por_assinaturas_data = [];
if ($equipamento_por_assinaturas->num_rows > 0) {
    while ($row = $equipamento_por_assinaturas->fetch_assoc()) {
        $equipamento_por_assinaturas_data[] = $row;
    }
}
$json_data["equipment_per_subscriptions"] = $equipamento_por_assinaturas_data;


// @ SIMPLE INVOICE SECTION
$invoices = $conn->query("SELECT * FROM carnes ORDER BY id ASC");
$invoices_data = [];
if ($invoices->num_rows > 0) {
    while ($row = $invoices->fetch_assoc()) {
        $invoices_data[] = $row;
    }
}
$json_data["invoices"] = $invoices_data;

// @ SIMPLE GERENCIA INVOICE SECTION
$gerencia_invoices = $conn->query("SELECT * FROM carne_gerencia ORDER BY id ASC");
$gerencia_invoices_data = [];
if ($gerencia_invoices->num_rows > 0) {
    while ($row = $gerencia_invoices->fetch_assoc()) {
        $gerencia_invoices_data[] = $row;
    }
}
$json_data["gerencia_invoices"] = $gerencia_invoices_data;

// @ TICKET SECTION
$chamados = $conn->query("SELECT * FROM chamados ORDER BY id ASC");
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

$finances = $conn->query("SELECT * FROM lc_movimento ORDER BY id ASC");
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