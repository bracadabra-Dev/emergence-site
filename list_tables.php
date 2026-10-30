<?php
require_once __DIR__ . '/includes/functions.php';
$pdo = get_db_connection();
$stmt = $pdo->query("SHOW TABLES");
$tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
echo implode("\n", $tables);
?>
