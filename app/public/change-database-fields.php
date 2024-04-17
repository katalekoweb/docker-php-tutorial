<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiciona coluna UUID nas tabelas a serem exportadas</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>

<?php

include "database.php";

// add uuid field into database

try {
    mysqli_query($conn, "ALTER table states ADD COLUMN uuid VARCHAR(50) NULL AFTER id");
} catch (\Throwable $th) {
    echo "Coluna ja existe na tabela estados...<hr/>";
}

try {
    mysqli_query($conn, "ALTER table cities ADD COLUMN uuid VARCHAR(50) NULL AFTER id");
} catch (\Throwable $th) {
    echo "Coluna ja existe na tabela cidades...<hr/>";
}

try {
    mysqli_query($conn, "ALTER table users ADD COLUMN uuid VARCHAR(50) NULL AFTER id");
} catch (\Throwable $th) {
    echo "Coluna ja existe na tabela usuarios...<hr/>";
}

try {
    mysqli_query($conn, "ALTER table sectors ADD COLUMN uuid VARCHAR(50) NULL AFTER id");
} catch (\Throwable $th) {
    echo "Coluna ja existe na tabela setores...<hr/>";
}

try {
    mysqli_query($conn, "ALTER table equipamentos ADD COLUMN uuid VARCHAR(50) NULL AFTER id");
} catch (\Throwable $th) {
    echo "Coluna ja existe na tabela equipamentos...<hr/>";
}


try {
    mysqli_query($conn, "ALTER table customers ADD COLUMN uuid VARCHAR(50) NULL AFTER id");
} catch (\Throwable $th) {
    echo "Coluna ja existe na tabela clientes...<hr/>";
}

try {
    mysqli_query($conn, "ALTER table servidors ADD COLUMN uuid VARCHAR(50) NULL AFTER id");
} catch (\Throwable $th) {
    echo "Coluna ja existe na tabela servidores...<hr/>";
}

try {
    mysqli_query($conn, "ALTER table pools ADD COLUMN uuid VARCHAR(50) NULL AFTER id");
} catch (\Throwable $th) {
    echo "Coluna ja existe na tabela pools...<hr/>";
}

try {
    mysqli_query($conn, "ALTER table interfaces ADD COLUMN uuid VARCHAR(50) NULL AFTER id");
} catch (\Throwable $th) {
    echo "Coluna ja existe na tabela interfaces...<hr/>";
}

try {
    mysqli_query($conn, "ALTER table ipclasses ADD COLUMN uuid VARCHAR(50) NULL AFTER id");
} catch (\Throwable $th) {
    echo "Coluna ja existe na tabela ipclasses...<hr/>";
}

try {
    mysqli_query($conn, "ALTER table planos ADD COLUMN uuid VARCHAR(50) NULL AFTER id");
} catch (\Throwable $th) {
    echo "Coluna ja existe na tabela planos...<hr/>";
}

try {
    mysqli_query($conn, "ALTER table assinaturas ADD COLUMN uuid VARCHAR(50) NULL AFTER id");
} catch (\Throwable $th) {
    echo "Coluna ja existe na tabela assinaturas...<hr/>";
}

try {
    mysqli_query($conn, "ALTER table equipamento_por_assinaturas ADD COLUMN uuid VARCHAR(50) NULL AFTER id");
} catch (\Throwable $th) {
    echo "Coluna ja existe na tabela equipamento_por_assinaturas...<hr/>";
}

try {
    mysqli_query($conn, "ALTER table carnes ADD COLUMN uuid VARCHAR(50) NULL AFTER id");
} catch (\Throwable $th) {
    echo "Coluna ja existe na tabela carnes...<hr/>";
}

try {
    mysqli_query($conn, "ALTER table carne_gerencia ADD COLUMN uuid VARCHAR(50) NULL AFTER id");
} catch (\Throwable $th) {
    echo "Coluna ja existe na tabela carne_gerencia...<hr/>";
}

try {
    mysqli_query($conn, "ALTER table chamado_cats ADD COLUMN uuid VARCHAR(50) NULL AFTER id");
} catch (\Throwable $th) {
    echo "Coluna ja existe na tabela chamado_categorias...<hr/>";
}

try {
    mysqli_query($conn, "ALTER table chamados ADD COLUMN uuid VARCHAR(50) NULL AFTER id");
} catch (\Throwable $th) {
    echo "Coluna ja existe na tabela chamados...<hr/>";
}

try {
    mysqli_query($conn, "ALTER table lc_cat ADD COLUMN uuid VARCHAR(50) NULL AFTER id");
} catch (\Throwable $th) {
    echo "Coluna ja existe na tabela categoria de movimentos financeiros...<hr/>";
}

try {
    mysqli_query($conn, "ALTER table lc_movimento ADD COLUMN uuid VARCHAR(50) NULL AFTER id");
} catch (\Throwable $th) {
    echo "Coluna ja existe na tabela de movimentos financeiros...<hr/>";
}

echo "<h1>Coluna UUID adicionada em todas as tabelas.</h1>";

?>



    
</body>
</html>








