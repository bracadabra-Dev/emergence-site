<?php
require_once dirname(__DIR__) . '/includes/portal.php';

$boot = emergence_portal_prepare('/pages/fees.php');
$lang = $boot['lang'];
$page = $boot['page'];
$pdo = emergence_portal_pdo();
$grades = $pdo ? emergence_fees_from_portal($pdo) : array();
$from_portal = !empty($grades);
if (!$grades) {
    $grades = emergence_published_fees();
}
$wa = 'https://wa.me/237699353787?text=' . rawurlencode($lang === 'fr'
    ? 'Bonjour Emergence Logbessou, je voudrais des précisions sur les frais.'
    : 'Hello Emergence Logbessou, I would like to ask about fees.');

$title = $lang === 'fr' ? 'Frais — Emergence Logbessou' : 'Fees — Emergence Logbessou';
$desc = $lang === 'fr'
    ? 'Frais de scolarité, livres, uniforme et transport à Emergence Logbessou, en francs CFA.'
    : 'Tuition, books, uniform and transport at Emergence Logbessou, in CFA francs.';
$h = $lang === 'fr' ? 'Les frais, classe par classe.' : 'Fees, class by class.';
$lede = $from_portal
    ? ($lang === 'fr' ? 'Ces chiffres viennent du portail de l’école. Ils sont en francs CFA.' : 'These figures come from the school portal. They are in CFA francs.')
    : ($lang === 'fr' ? 'Ces chiffres sont ceux que l’école publie aujourd’hui. Ils sont en francs CFA. Le secrétariat confirme le montant d’une classe.' : 'These are the figures the school publishes today. They are in CFA francs. The office confirms the amount for a class.');
$heads = $lang === 'fr'
    ? array('Option', 'Scolarité', 'Livres', 'Uniforme', 'Transport', 'Total')
    : array('Option', 'Tuition', 'Books', 'Uniform', 'Transport', 'Total');

emergence_portal_begin($boot, $title, $desc, 'fees');
?>
    <div class="wrap page-intro">
        <p class="kicker"><?php echo $lang === 'fr' ? 'Frais · Logbessou' : 'Fees · Logbessou'; ?></p>
        <h1><?php echo e($h); ?></h1>
        <p class="lede"><?php echo e($lede); ?></p>
        <div class="actions">
            <a class="btn btn-yellow" href="<?php echo e($page); ?>/admissions.php"><?php echo $lang === 'fr' ? 'Candidater' : 'Apply'; ?></a>
            <a class="btn btn-line" href="<?php echo e($page); ?>/contact.php"><?php echo $lang === 'fr' ? 'Une question' : 'A question'; ?></a>
        </div>
    </div>
    <section class="section">
        <div class="wrap fee-list">
            <?php foreach ($grades as $grade): ?>
                <article class="card fee-card">
                    <h2><?php echo e($grade['grade']); ?></h2>
                    <div class="fee-scroll">
                        <table class="fee-table">
                            <thead>
                                <tr>
                                    <?php foreach ($heads as $head): ?>
                                        <th><?php echo e($head); ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($grade['options'] as $option): ?>
                                    <tr>
                                        <th><?php echo e(trim($option['name'] . ' ' . $option['note'])); ?></th>
                                        <td><?php echo e($option['tuition']); ?></td>
                                        <td><?php echo e($option['books']); ?></td>
                                        <td><?php echo e($option['uniforms']); ?></td>
                                        <td><?php echo e($option['transport']); ?></td>
                                        <td class="fee-total"><?php echo e($option['total']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
<?php
emergence_portal_end($boot, $wa);
