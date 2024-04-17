<?php

$conn = new mysqli("db", "user", "secret", "docker-php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
