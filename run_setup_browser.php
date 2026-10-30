<?php
require_once __DIR__ . '/includes/functions.php';

try {
    $pdo = get_db_connection();
    $sql = file_get_contents(__DIR__ . '/database/create_notifications_table.sql');
    $pdo->exec($sql);
    echo "MIGRATION_SUCCESS: Notifications table created.";
} catch (PDOException $e) {
    echo "MIGRATION_ERROR: " . $e->getMessage();
}
?>
