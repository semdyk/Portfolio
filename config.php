<?php
$db_host = '193.203.168.141';
$db_username = 'u204712970_semdyk';
$db_password = 'Charmer2000!?';
$db_name = 'u204712970_semdyk';

try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>