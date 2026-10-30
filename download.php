<?php
/**
 * Emergence Schools - Document Download Handler
 *
 * This script handles document downloads, tracks download counts, and ensures
 * proper file delivery with security checks.
 *
 * @package EmergenceSchools
 * @subpackage Public
 * @author [geraldteneng@bracadabrastudios.com]
 * @version 1.0
 */

require_once __DIR__ . '/includes/functions.php';

$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    header('HTTP/1.0 404 Not Found');
    die('Document not found.');
}

$pdo = get_db_connection();
$stmt = $pdo->prepare("SELECT * FROM documents WHERE id = :id AND is_active = 1");
$stmt->execute([':id' => (int)$id]);
$document = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$document) {
    header('HTTP/1.0 404 Not Found');
    die('Document not found or not available.');
}

$file_path = DOCUMENTS_PATH . $document['file_path'];

if (!file_exists($file_path)) {
    header('HTTP/1.0 404 Not Found');
    die('File not found on server.');
}

// Increment download count
$stmt = $pdo->prepare("UPDATE documents SET download_count = download_count + 1 WHERE id = :id");
$stmt->execute([':id' => (int)$id]);

// Determine MIME type
$mime_types = [
    'pdf' => 'application/pdf',
    'doc' => 'application/msword',
    'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    'xls' => 'application/vnd.ms-excel',
    'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    'txt' => 'text/plain'
];

$ext = strtolower(pathinfo($document['file_path'], PATHINFO_EXTENSION));
$mime_type = $mime_types[$ext] ?? 'application/octet-stream';

// Set headers for file download
header('Content-Type: ' . $mime_type);
header('Content-Disposition: attachment; filename="' . htmlspecialchars($document['file_name']) . '"');
header('Content-Length: ' . filesize($file_path));
header('Cache-Control: must-revalidate');
header('Pragma: public');

// Output file
readfile($file_path);
exit;

