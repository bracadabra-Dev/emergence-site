<?php
require_once dirname(__DIR__) . '/includes/portal.php';

$boot = emergence_portal_prepare('/pages/staff.php');
$lang = $boot['lang'];
$root = $boot['root'];
$fr = $lang === 'fr';
$people = array(
    array('terence', $fr ? 'M. Ebai Terence' : 'Mr Ebai Terence', $fr ? 'Directeur' : 'Manager', 'ET'),
    array('dany', $fr ? 'Mme Dany Kengne Michelle' : 'Mme Dany Kengne Michelle', $fr ? 'Assistante de direction' : 'Executive Assistant', 'DK'),
    array('ningyi', $fr ? 'Mme Ningyi Fernande Dorothee' : 'Mme Ningyi Fernande Dorothee', $fr ? 'Comptable' : 'Accountant', 'NF'),
    array('mbofa', $fr ? 'Mme Mbofa Regina Nchinda' : 'Mme Mbofa Regina Nchinda', $fr ? 'Assistante administrative' : 'Administrative Assistant', 'MN'),
    array('myriam', $fr ? 'Mme Tchigheu Noubissi Epse Djeumeni Myriam' : 'Mme Tchigheu Noubissi Epse Djeumeni Myriam', $fr ? 'Vice-principale, section francophone' : 'Vice Principal, French Section', 'TM'),
    array('blessing', $fr ? 'Mme Tim Blessing Kein' : 'Mme Tim Blessing Kein', $fr ? 'Vice-principale, section anglophone' : 'Vice Principal, Anglophone Section', 'BK'),
    array('nkwelle-ephraim', $fr ? 'M. Nkwelle Ephraim' : 'Mr Nkwelle Ephraim', $fr ? 'Directeur, section primaire' : 'Headmaster, Primary Section', 'NE'),
    array('hermine', $fr ? 'Mme Simon Hermine' : 'Mme Simon Hermine', $fr ? 'Directrice, section primaire' : 'Headmistress, Primary Section', 'SH'),
);
$wa = 'https://wa.me/237699353787';
emergence_portal_begin($boot, $fr ? 'Équipe — Emergence Logbessou' : 'Staff — Emergence Logbessou', $fr
    ? 'Les personnes qui tiennent Emergence Logbessou.'
    : 'The people who keep Emergence Logbessou.', 'staff');
?>
    <div class="wrap page-intro">
        <p class="kicker"><?php echo $fr ? 'Équipe · Logbessou' : 'Staff · Logbessou'; ?></p>
        <h1><?php echo $fr ? 'Celles et ceux qui tiennent l’école.' : 'The people who keep the school.'; ?></h1>
        <p class="lede"><?php echo $fr
            ? 'Noms et fonctions tels que l’école les publie. Le primaire a son directeur et sa directrice. Le secondaire a ses deux vice-principales.'
            : 'Names and roles as the school publishes them. Primary has its headmaster and headmistress. Secondary has its two vice principals.'; ?></p>
    </div>
    <section class="section">
        <div class="wrap">
            <div class="people">
                <?php foreach ($people as $person): ?>
                    <?php
                    $names = array($person[0]);
                    if ($person[0] === 'nkwelle-ephraim') {
                        $names = array('nkwelle-ephraim', 'nkwelle', 'kwelle', 'headmaster');
                    }
                    if ($person[0] === 'hermine') {
                        $names = array('hermine', 'headmistress');
                    }
                    $photo = emergence_photo($root, $names);
                    $show = $photo !== '' && ($person[0] !== 'mbofa' || strpos($photo, 'mbofa') !== false);
                    ?>
                    <article class="person">
                        <div class="person-photo">
                            <?php if ($show): ?>
                                <img src="<?php echo e($photo); ?>" alt="" width="480" height="480" loading="lazy" decoding="async">
                            <?php else: ?>
                                <span class="mono" aria-hidden="true"><?php echo e($person[3]); ?></span>
                            <?php endif; ?>
                        </div>
                        <h3><?php echo e($person[1]); ?></h3>
                        <p><?php echo e($person[2]); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php
emergence_portal_end($boot, $wa);
