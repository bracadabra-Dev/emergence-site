<?php
require_once __DIR__ . '/includes/functions.php';

// Force error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$pdo = get_db_connection();
$student_id = $_SESSION['user_id'] ?? 0;

echo "<h1>Debug Resources</h1>";
echo "Current Student ID: " . $student_id . "<br>";

if (!$student_id) {
    echo "<b>Error: Not logged in. Please log in as a student first.</b>";
    exit;
}

// 1. Check Enrollments
echo "<h2>1. Student Enrollments</h2>";
$stmt = $pdo->prepare("
    SELECT e.class_id, c.name 
    FROM enrollments e 
    JOIN classes c ON e.class_id = c.id 
    WHERE e.student_id = ?
");
$stmt->execute([$student_id]);
$enrollments = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($enrollments)) {
    echo "Student is NOT enrolled in any classes.<br>";
} else {
    echo "<table border='1'><tr><th>Class ID</th><th>Class Name</th></tr>";
    foreach ($enrollments as $e) {
        echo "<tr><td>{$e['class_id']}</td><td>{$e['name']}</td></tr>";
    }
    echo "</table>";
    
    $class_ids = array_column($enrollments, 'class_id');
    $ids_str = implode(',', $class_ids);
    echo "Class IDs: $ids_str<br>";
}

// 2. Check All Resources
echo "<h2>2. All Resources in DB (Limit 10)</h2>";
$stmt = $pdo->query("SELECT * FROM resources LIMIT 10");
$resources = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($resources)) {
    echo "No resources found in the database table 'resources'.<br>";
} else {
    echo "<table border='1'><tr><th>ID</th><th>Title</th><th>Class ID</th><th>Teacher ID</th></tr>";
    foreach ($resources as $r) {
        echo "<tr><td>{$r['id']}</td><td>{$r['title']}</td><td>{$r['class_id']}</td><td>{$r['teacher_id']}</td></tr>";
    }
    echo "</table>";
}

// 3. Check Resources for Student's Classes (Raw Query)
echo "<h2>3. Resources for Student's Classes</h2>";
if (!empty($class_ids)) {
    $placeholders = implode(',', array_fill(0, count($class_ids), '?'));
    $sql = "SELECT r.* FROM resources r WHERE r.class_id IN ($placeholders)";
    echo "Query: $sql <br>";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($class_ids);
    $matches = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (empty($matches)) {
        echo "No matches found for the student's class IDs.<br>";
    } else {
        echo "Found " . count($matches) . " matches.<br>";
        echo "<table border='1'><tr><th>ID</th><th>Title</th><th>Class ID</th></tr>";
        foreach ($matches as $m) {
            echo "<tr><td>{$m['id']}</td><td>{$m['title']}</td><td>{$m['class_id']}</td></tr>";
        }
        echo "</table>";
    }
} else {
    echo "Skipped (no enrollments).";
}
?>
