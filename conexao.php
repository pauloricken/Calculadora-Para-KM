<?php
$username = 'root';
$password = '';
$conn = null;
try {
    $conn = new PDO('mysql:host=localhost;dbname=carros', $username, $password);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>