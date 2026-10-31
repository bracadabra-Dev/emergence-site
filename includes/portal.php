<?php
/**
 * Reads the existing school portal (fees, documents, news, gallery, staff)
 * when includes/functions.php is on the host. Pages still render if it is not.
 * PHP 7.4.
 */

require_once __DIR__ . '/site.php';

function emergence_portal_begin($boot, $title, $description, $active) {
    $lang = $boot['lang'];
    $root = $boot['root'];
    $canonical = $boot['canonical'];
    $origin = $boot['origin'];
    $img = $boot['img'];
    ?>
<!DOCTYPE html>
<html lang="<?php echo $lang === 'fr' ? 'fr' : 'en'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($title); ?></title>
    <meta name="description" content="<?php echo e($description); ?>">
    <link rel="canonical" href="<?php echo e($canonical); ?>">
    <meta name="theme-color" content="#283783">
    <link rel="icon" type="image/png" href="<?php echo e($img); ?>/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e($root); ?>/assets/css/site.css?v=4">
    <link rel="stylesheet" href="<?php echo e($root); ?>/assets/css/primary.css?v=4">
</head>
<body data-lang-api="<?php echo e($root); ?>/api/language.php">
    <?php
    emergence_header($boot, $active);
}

function emergence_portal_end($boot, $wa) {
    emergence_footer($boot, $wa);
    echo '<script src="' . e($boot['root']) . '/assets/js/primary.js?v=1" defer></script></body></html>';
}

function emergence_portal_prepare($fallback_script) {
    $functions = dirname(__DIR__) . '/includes/functions.php';
    if (is_file($functions)) {
        require_once $functions;
    }
    return emergence_boot($fallback_script);
}

function emergence_portal_pdo() {
    if (!function_exists('get_db_connection')) {
        return null;
    }
    try {
        $pdo = get_db_connection();
        return ($pdo instanceof PDO) ? $pdo : null;
    } catch (Exception $e) {
        return null;
    }
}

function emergence_portal_columns($pdo, $table) {
    $table = preg_replace('/[^A-Za-z0-9_]/', '', $table);
    if ($table === '') {
        return array();
    }
    try {
        $stmt = $pdo->query('SHOW COLUMNS FROM `' . $table . '`');
        $cols = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cols[] = $row['Field'];
        }
        return $cols;
    } catch (Exception $e) {
        return array();
    }
}

function emergence_portal_find_table($pdo, $needles) {
    try {
        $stmt = $pdo->query('SHOW TABLES');
        $names = array();
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $names[] = $row[0];
        }
    } catch (Exception $e) {
        return '';
    }
    foreach ($needles as $needle) {
        foreach ($names as $name) {
            if (strcasecmp($name, $needle) === 0) {
                return $name;
            }
        }
    }
    foreach ($needles as $needle) {
        foreach ($names as $name) {
            if (stripos($name, $needle) !== false) {
                return $name;
            }
        }
    }
    return '';
}

function emergence_portal_rows($pdo, $table) {
    $cols = emergence_portal_columns($pdo, $table);
    if (!$cols) {
        return array();
    }
    $where = '';
    foreach ($cols as $col) {
        if (strcasecmp($col, 'is_active') === 0 || strcasecmp($col, 'active') === 0 || strcasecmp($col, 'status') === 0) {
            $where = ' WHERE `' . $col . '` IN (1, \'1\', \'active\', \'published\')';
            break;
        }
    }
    $order = '';
    foreach (array('sort_order', 'display_order', 'event_date', 'published_at', 'created_at', 'date', 'id') as $candidate) {
        foreach ($cols as $col) {
            if (strcasecmp($col, $candidate) === 0) {
                $order = ' ORDER BY `' . $col . '` DESC';
                break 2;
            }
        }
    }
    try {
        $stmt = $pdo->query('SELECT * FROM `' . $table . '`' . $where . $order . ' LIMIT 60');
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return is_array($rows) ? $rows : array();
    } catch (Exception $e) {
        return array();
    }
}

function emergence_field($row, $names) {
    foreach ($names as $name) {
        foreach ($row as $key => $value) {
            if (strcasecmp($key, $name) === 0 && $value !== null && $value !== '') {
                return $value;
            }
        }
    }
    return '';
}

function emergence_csrf_token() {
    if (function_exists('generate_csrf_token')) {
        return (string) generate_csrf_token();
    }
    if (function_exists('csrf_token')) {
        return (string) csrf_token();
    }
    if (function_exists('get_csrf_token')) {
        return (string) get_csrf_token();
    }
    if (isset($_SESSION['csrf_token']) && is_string($_SESSION['csrf_token'])) {
        return $_SESSION['csrf_token'];
    }
    return '';
}

function emergence_published_fees() {
    $zone = array(
        array('No Transport', 'Standard Option', '—'),
        array('Zone A', 'With Transport', '55 000'),
        array('Zone B', 'With Transport', '65 000'),
        array('Zone C', 'With Transport', '75 000'),
    );
    $primary_zone = array(
        array('No Transport', 'Standard Option', '—'),
        array('Zone A', 'With Transport', '50 000'),
        array('Zone B', 'With Transport', '60 000'),
        array('Zone C', 'With Transport', '70 000'),
    );
    $forms = array(
        array('Form 1', '250 000', '45 000', '45 000', array('340 000', '395 000', '405 000', '415 000'), $zone),
        array('Form 2', '260 000', '48 000', '45 000', array('353 000', '408 000', '418 000', '428 000'), $zone),
        array('Form 3', '270 000', '50 000', '45 000', array('365 000', '420 000', '430 000', '440 000'), $zone),
        array('Form 4', '280 000', '52 000', '50 000', array('382 000', '437 000', '447 000', '457 000'), $zone),
        array('Form 5', '300 000', '55 000', '50 000', array('405 000', '460 000', '470 000', '480 000'), $zone),
    );
    $grades = array(
        array('Grade 1', '150 000', '25 000', '35 000', array('210 000', '260 000', '270 000', '280 000'), $primary_zone),
        array('Grade 2', '160 000', '28 000', '35 000', array('223 000', '273 000', '283 000', '293 000'), $primary_zone),
        array('Grade 3', '170 000', '30 000', '35 000', array('235 000', '285 000', '295 000', '305 000'), $primary_zone),
        array('Grade 4', '180 000', '32 000', '35 000', array('247 000', '297 000', '307 000', '317 000'), $primary_zone),
        array('Grade 5', '190 000', '35 000', '40 000', array('265 000', '315 000', '325 000', '335 000'), $primary_zone),
        array('Grade 6', '200 000', '38 000', '40 000', array('278 000', '328 000', '338 000', '348 000'), $primary_zone),
    );
    $out = array();
    foreach (array_merge($grades, $forms) as $grade) {
        $options = array();
        foreach ($grade[5] as $i => $option) {
            $options[] = array(
                'name' => $option[0],
                'note' => $option[1],
                'tuition' => $grade[1],
                'books' => $grade[2],
                'uniforms' => $grade[3],
                'transport' => $option[2],
                'total' => $grade[4][$i],
            );
        }
        $out[] = array('grade' => $grade[0], 'options' => $options);
    }
    return $out;
}

function emergence_money($value) {
    if ($value === null || $value === '' || $value === '—') {
        return '—';
    }
    if (!is_numeric($value)) {
        return (string) $value;
    }
    return number_format((float) $value, 0, '.', ' ');
}

function emergence_fees_from_portal($pdo) {
    $table = emergence_portal_find_table($pdo, array('fees', 'fee_structure', 'school_fees', 'fee_options'));
    if ($table === '') {
        return array();
    }
    $rows = emergence_portal_rows($pdo, $table);
    if (!$rows) {
        return array();
    }
    $grouped = array();
    foreach ($rows as $row) {
        $grade = (string) emergence_field($row, array('grade_level', 'grade', 'level', 'class_name', 'name', 'title'));
        if ($grade === '') {
            continue;
        }
        if (!isset($grouped[$grade])) {
            $grouped[$grade] = array('grade' => $grade, 'options' => array());
        }
        $transport = emergence_field($row, array('transport', 'transport_fee', 'bus'));
        $grouped[$grade]['options'][] = array(
            'name' => (string) emergence_field($row, array('option_name', 'transport_zone', 'zone', 'label')),
            'note' => (string) emergence_field($row, array('option_note', 'description', 'note')),
            'tuition' => emergence_money(emergence_field($row, array('tuition', 'tuition_fee'))),
            'books' => emergence_money(emergence_field($row, array('books', 'books_fee'))),
            'uniforms' => emergence_money(emergence_field($row, array('uniforms', 'uniform', 'uniform_fee'))),
            'transport' => ($transport === '' || $transport === '0') ? '—' : emergence_money($transport),
            'total' => emergence_money(emergence_field($row, array('total', 'total_fee', 'amount'))),
        );
    }
    return array_values($grouped);
}
