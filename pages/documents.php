<?php
require_once dirname(__DIR__) . '/includes/portal.php';

$boot = emergence_portal_prepare('/pages/documents.php');
$lang = $boot['lang'];
$root = $boot['root'];
$pdo = emergence_portal_pdo();
$rows = array();
if ($pdo) {
    $table = emergence_portal_find_table($pdo, array('documents'));
    if ($table !== '') {
        $rows = emergence_portal_rows($pdo, $table);
    }
}
$wa = 'https://wa.me/237699353787?text=' . rawurlencode($lang === 'fr'
    ? 'Bonjour Emergence Logbessou, je cherche un document d’admission.'
    : 'Hello Emergence Logbessou, I am looking for an admission document.');
$title = $lang === 'fr' ? 'Documents — Emergence Logbessou' : 'Documents — Emergence Logbessou';
$desc = $lang === 'fr'
    ? 'Formulaires, calendriers et documents publiés par le secrétariat d’Emergence Logbessou.'
    : 'Forms, calendars and papers published by the Emergence Logbessou office.';

emergence_portal_begin($boot, $title, $desc, 'documents');
?>
    <div class="wrap page-intro">
        <p class="kicker"><?php echo $lang === 'fr' ? 'Documents · Logbessou' : 'Documents · Logbessou'; ?></p>
        <h1><?php echo $lang === 'fr' ? 'Les papiers de l’école.' : 'The school’s papers.'; ?></h1>
        <p class="lede"><?php echo $lang === 'fr'
            ? 'Les formulaires et les calendriers que le secrétariat met en ligne apparaissent ici. Le téléchargement passe par le portail.'
            : 'Forms and calendars the office publishes appear here. The download still goes through the portal.'; ?></p>
    </div>
    <section class="section">
        <div class="wrap">
            <?php if (!$rows): ?>
                <p class="intro"><?php echo $lang === 'fr'
                    ? 'Aucun document n’est en ligne pour le moment. Écrivez au secrétariat, ou demandez le formulaire d’admission.'
                    : 'No document is online at the moment. Write to the office, or ask for the admission form.'; ?></p>
                <div class="actions">
                    <a class="btn btn-yellow" href="<?php echo e($boot['page']); ?>/admissions.php"><?php echo $lang === 'fr' ? 'Admissions' : 'Admissions'; ?></a>
                    <a class="btn btn-line" href="<?php echo e($boot['page']); ?>/contact.php"><?php echo $lang === 'fr' ? 'Écrire' : 'Write'; ?></a>
                </div>
            <?php else: ?>
                <ul class="doc-list">
                    <?php foreach ($rows as $row): ?>
                        <?php
                        $id = emergence_field($row, array('id'));
                        $name = emergence_field($row, array('title', 'name', 'file_name'));
                        $note = emergence_field($row, array('description', 'category', 'type'));
                        ?>
                        <li>
                            <a href="<?php echo e($root); ?>/download.php?id=<?php echo e($id); ?>">
                                <strong><?php echo e($name !== '' ? $name : ('Document ' . $id)); ?></strong>
                                <?php if ($note !== ''): ?><span><?php echo e($note); ?></span><?php endif; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </section>
<?php
emergence_portal_end($boot, $wa);
