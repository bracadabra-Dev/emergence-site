<?php
/**
 * Emergence Schools — group homepage.
 *
 * Replaces the CMS homepage when this file is uploaded as pages/index.php.
 * News, the gallery and the full staff list stay on their own pages.
 * PHP 7.4. No build step, no database.
 */

require_once dirname(__DIR__) . '/includes/site.php';

$boot = emergence_boot('/pages/index.php');
$lang = $boot['lang'];
$root = $boot['root'];
$img = $boot['img'];
$page = $boot['page'];
$origin = $boot['origin'];
$canonical = $boot['canonical'];

$copy = array(
    'en' => array(
        'meta_title' => 'Emergence Schools — Douala',
        'meta_desc' => 'Nursery, primary and secondary at Emergence Logbessou, Douala. Academic, physical and mental excellence on one campus.',
        'hero_kicker' => 'Nursery, primary and secondary · Logbessou',
        'hero_title' => 'Academic, physical and mental excellence, at Logbessou.',
        'hero_lede' => 'One campus in Logbessou. Children learn in English and French, move every week, and grow up in a school their parents can actually reach.',
        'hero_alt' => 'Young children at a kindergarten graduation, in school uniform.',
        'primary_btn' => 'Primary section',
        'secondary_btn' => 'Secondary',
        'apply' => 'Apply',
        'wa_text' => 'Hello Emergence Schools, I would like to ask about a place.',
        'academic_kicker' => 'Academic',
        'academic_title' => 'The work of the classroom.',
        'academic_text' => 'Nursery opens bilingual. Primary then follows a French path or an Anglo-Saxon path. Secondary continues in two streams: the Cameroon GCE, and BEPC, Probatoire and the Baccalauréat. Each school has its own page.',
        'academic_alt' => 'Students in uniform during a visit at Logbessou.',
        'academic_cap' => 'A visit at Logbessou.',
        'paths' => 'Primary pathways',
        'streams' => 'Secondary streams',
        'sec_clubs' => 'Secondary clubs',
        'guidance' => 'Secondary guidance',
        'physical_kicker' => 'Physical',
        'physical_title' => 'A body that is part of the timetable.',
        'physical_text' => 'The younger classes dance, practise karate and ballet, and play sport in the week. Secondary adds IT, science, arts, team sport and chess. Buses collect children from across Douala so the day can start on time.',
        'physical_alt' => 'Secondary students in the school basketball kit, on the yard at Logbessou.',
        'physical_cap' => 'Basketball on the yard.',
        'life' => 'Life in primary',
        'mental_kicker' => 'Mental',
        'mental_title' => 'A child who is known.',
        'mental_text' => 'The school’s line is Discipline – Hardwork – Success. In primary, pupils hold offices of their own and parents sit with teachers twice a year. In secondary, a counselling bureau follows each student toward a course and a university. A nurse is on the campus.',
        'mental_alt' => 'Staff together on a school day, in school colours.',
        'mental_cap' => 'Staff on a school day.',
        'care' => 'Care in primary',
        'schools_kicker' => 'The school',
        'schools_title' => 'Nursery, primary and secondary, on one campus.',
        'primary_card' => 'Primary',
        'primary_card_text' => 'Nursery through Class 6 and CM2, at Logbessou.',
        'secondary_card' => 'Secondary',
        'secondary_card_text' => 'Anglophone and French streams, through GCE, BEPC, Probatoire and the Baccalauréat.',
        'staff_kicker' => 'People',
        'staff_title' => 'The people who keep the schools.',
        'staff_intro' => 'Names and roles as the school publishes them. Initials stand in where a portrait is not ready yet.',
        'all_staff' => 'Full staff list',
        'visit_kicker' => 'Visit',
        'visit_title' => 'Logbessou.',
        'log_text' => '10th Avenue, since September 2006.',
        'hours' => 'Monday to Friday, 8:00–17:00',
        'roles' => array(
            'Manager',
            'Executive Assistant',
            'Accountant',
            'Administrative Assistant',
            'Vice Principal, French Section',
            'Vice Principal, Anglophone Section',
            'Headmaster, Primary Section',
            'Headmistress, Primary Section',
        ),
        'names' => array(
            'Mr Ebai Terence',
            'Mme Dany Kengne Michelle',
            'Mme Ningyi Fernande Dorothee',
            'Mme Mbofa Regina Nchinda',
            'Mme Tchigheu Noubissi Epse Djeumeni Myriam',
            'Mme Tim Blessing Kein',
            'Mr Nkwelle Ephraim',
            'Mme Simon Hermine',
        ),
    ),
    'fr' => array(
        'meta_title' => 'École Emergence — Douala',
        'meta_desc' => 'Maternelle, primaire et secondaire à Emergence Logbessou, Douala. Excellence académique, physique et mentale sur un seul campus.',
        'hero_kicker' => 'Maternelle, primaire et secondaire · Logbessou',
        'hero_title' => 'L’excellence académique, physique et mentale, à Logbessou.',
        'hero_lede' => 'Un seul campus à Logbessou. Les enfants apprennent en anglais et en français, bougent chaque semaine, et grandissent dans une école que les parents peuvent joindre.',
        'hero_alt' => 'De jeunes enfants en uniforme, lors d’une graduation de maternelle.',
        'primary_btn' => 'Section primaire',
        'secondary_btn' => 'Secondaire',
        'apply' => 'Candidater',
        'wa_text' => 'Bonjour École Emergence, je voudrais demander une place.',
        'academic_kicker' => 'Académique',
        'academic_title' => 'Le travail de la classe.',
        'academic_text' => 'La maternelle s’ouvre bilingue. Le primaire suit ensuite une voie française ou une voie anglo-saxonne. Le secondaire continue en deux voies : le GCE camerounais, et le BEPC, le Probatoire et le Baccalauréat. Chaque école a sa page.',
        'academic_alt' => 'Des élèves en uniforme lors d’une visite à Logbessou.',
        'academic_cap' => 'Une visite à Logbessou.',
        'paths' => 'Parcours du primaire',
        'streams' => 'Voies du secondaire',
        'sec_clubs' => 'Clubs du secondaire',
        'guidance' => 'Orientation au secondaire',
        'physical_kicker' => 'Physique',
        'physical_title' => 'Un corps qui fait partie de l’horaire.',
        'physical_text' => 'Les plus jeunes dansent, pratiquent le karaté et le ballet, et font du sport dans la semaine. Le secondaire ajoute l’informatique, les sciences, les arts, le sport d’équipe et les échecs. Les bus prennent les enfants dans Douala pour que la journée commence à l’heure.',
        'physical_alt' => 'Des élèves du secondaire en tenue de basket, sur le terrain de Logbessou.',
        'physical_cap' => 'Le basket, sur le terrain.',
        'life' => 'La vie au primaire',
        'mental_kicker' => 'Mental',
        'mental_title' => 'Un enfant que l’on connaît.',
        'mental_text' => 'La ligne de l’école est Discipline – Hardwork – Success. Au primaire, les élèves tiennent leurs propres fonctions et les parents s’assoient avec les enseignants deux fois par an. Au secondaire, un bureau d’orientation suit chaque élève vers une filière et une université. Une infirmière est sur le campus.',
        'mental_alt' => 'Le personnel ensemble lors d’une journée d’école, en couleurs de l’école.',
        'mental_cap' => 'Le personnel, un jour d’école.',
        'care' => 'L’accompagnement au primaire',
        'schools_kicker' => 'L’école',
        'schools_title' => 'Maternelle, primaire et secondaire, sur un seul campus.',
        'primary_card' => 'Primaire',
        'primary_card_text' => 'De la maternelle à la Class 6 et au CM2, à Logbessou.',
        'secondary_card' => 'Secondaire',
        'secondary_card_text' => 'Voies anglophone et française, jusqu’au GCE, au BEPC, au Probatoire et au Baccalauréat.',
        'staff_kicker' => 'Les personnes',
        'staff_title' => 'Celles et ceux qui tiennent les écoles.',
        'staff_intro' => 'Noms et fonctions tels que l’école les publie. Les initiales tiennent lieu de portrait tant que la photo n’est pas prête.',
        'all_staff' => 'Toute l’équipe',
        'visit_kicker' => 'Venir',
        'visit_title' => 'Logbessou.',
        'log_text' => '10e avenue, depuis septembre 2006.',
        'hours' => 'Lundi à vendredi, 8 h – 17 h',
        'roles' => array(
            'Directeur',
            'Assistante de direction',
            'Comptable',
            'Assistante administrative',
            'Vice-principale, section francophone',
            'Vice-principale, section anglophone',
            'Directeur, section primaire',
            'Directrice, section primaire',
        ),
        'names' => array(
            'M. Ebai Terence',
            'Mme Dany Kengne Michelle',
            'Mme Ningyi Fernande Dorothee',
            'Mme Mbofa Regina Nchinda',
            'Mme Tchigheu Noubissi Epse Djeumeni Myriam',
            'Mme Tim Blessing Kein',
            'M. Nkwelle Ephraim',
            'Mme Simon Hermine',
        ),
    ),
);

$t = $copy[$lang];
$wa = 'https://wa.me/237699353787?text=' . rawurlencode($t['wa_text']);

$files = array(
    array('terence'),
    array('dany'),
    array('ningyi'),
    array('mbofa', 'mbofa-regina'),
    array('myriam'),
    array('blessing'),
    array('nkwelle-ephraim', 'nkwelle', 'kwelle', 'mr-kwelle', 'headmaster', 'head-master'),
    array('headmistress', 'head-mistress', 'simon-hermine', 'hermine'),
);
$initials = array('ET', 'DK', 'NF', 'MN', 'TM', 'BK', 'NE', 'SH');
$people = array();
foreach ($files as $i => $names) {
    $people[] = array(
        'name' => $t['names'][$i],
        'role' => $t['roles'][$i],
        'photo' => emergence_photo($root, $names),
        'initials' => $initials[$i],
    );
}

$schema = array(
    '@context' => 'https://schema.org',
    '@type' => 'EducationalOrganization',
    'name' => 'Emergence Schools',
    'url' => $canonical,
    'email' => 'dany.kengne@emergenceschools.org',
    'telephone' => array('+237675261440', '+237676332046'),
    'slogan' => 'Discipline – Hardwork – Success',
    'address' => array(
        '@type' => 'PostalAddress',
        'streetAddress' => '10th Avenue, Logbessou',
        'addressLocality' => 'Douala',
        'addressCountry' => 'CM',
    ),
);
?>
<!DOCTYPE html>
<html lang="<?php echo $lang === 'fr' ? 'fr' : 'en'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($t['meta_title']); ?></title>
    <meta name="description" content="<?php echo e($t['meta_desc']); ?>">
    <link rel="canonical" href="<?php echo e($canonical); ?>">
    <meta name="theme-color" content="#283783">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo e($t['meta_title']); ?>">
    <meta property="og:description" content="<?php echo e($t['meta_desc']); ?>">
    <meta property="og:url" content="<?php echo e($canonical); ?>">
    <meta property="og:image" content="<?php echo e($origin . $img . '/hero.webp'); ?>">
    <meta property="og:locale" content="<?php echo $lang === 'fr' ? 'fr_FR' : 'en_GB'; ?>">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="icon" type="image/png" href="<?php echo e($img); ?>/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="preload" as="image" href="<?php echo e($img); ?>/hero-sm.webp" fetchpriority="high">
    <link rel="stylesheet" href="<?php echo e($root); ?>/assets/css/site.css?v=3">
    <script type="application/ld+json"><?php echo json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?></script>
</head>
<body data-lang-api="<?php echo e($root); ?>/api/language.php">
<?php emergence_header($boot, 'home'); ?>

    <section class="home-hero" aria-label="<?php echo e($t['hero_kicker']); ?>">
        <img
            src="<?php echo e($img); ?>/hero-sm.webp"
            srcset="<?php echo e($img); ?>/hero-sm.webp 800w, <?php echo e($img); ?>/hero.webp 1600w"
            sizes="100vw"
            width="1600"
            height="1200"
            alt="<?php echo e($t['hero_alt']); ?>"
            fetchpriority="high"
            decoding="async">
    </section>

    <div class="wrap">
        <div class="hero-card" id="content">
            <p class="kicker"><?php echo e($t['hero_kicker']); ?></p>
            <h1><?php echo e($t['hero_title']); ?></h1>
            <p class="lede"><?php echo e($t['hero_lede']); ?></p>
            <div class="actions">
                <a class="btn btn-yellow" href="<?php echo e($page); ?>/primary.php"><?php echo e($t['primary_btn']); ?></a>
                <a class="btn btn-blue" href="<?php echo e($page); ?>/secondary.php"><?php echo e($t['secondary_btn']); ?></a>
                <a class="btn btn-line" href="<?php echo e($page); ?>/admissions.php"><?php echo e($t['apply']); ?></a>
            </div>
            <p class="motto">Discipline – Hardwork – Success</p>
        </div>
    </div>

    <section class="band" id="schools">
        <div class="wrap">
            <p class="kicker"><?php echo e($t['schools_kicker']); ?></p>
            <h2><?php echo e($t['schools_title']); ?></h2>
            <div class="schools">
                <a class="school-card" href="<?php echo e($page); ?>/primary.php">
                    <strong><?php echo e($t['primary_card']); ?></strong>
                    <span><?php echo e($t['primary_card_text']); ?></span>
                </a>
                <a class="school-card" href="<?php echo e($page); ?>/secondary.php">
                    <strong><?php echo e($t['secondary_card']); ?></strong>
                    <span><?php echo e($t['secondary_card_text']); ?></span>
                </a>
            </div>
        </div>
    </section>

    <section class="band band-alt" id="academic">
        <div class="wrap pillar">
            <figure>
                <img src="<?php echo e($img); ?>/corridor.webp" width="1100" height="619" alt="<?php echo e($t['academic_alt']); ?>" loading="lazy" decoding="async">
                <figcaption><?php echo e($t['academic_cap']); ?></figcaption>
            </figure>
            <div class="pillar-copy">
                <p class="kicker"><?php echo e($t['academic_kicker']); ?></p>
                <h2><?php echo e($t['academic_title']); ?></h2>
                <p><?php echo e($t['academic_text']); ?></p>
                <div class="actions">
                    <a class="btn btn-line" href="<?php echo e($page); ?>/primary.php#pathways"><?php echo e($t['paths']); ?></a>
                    <a class="btn btn-line" href="<?php echo e($page); ?>/secondary.php#streams"><?php echo e($t['streams']); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="band" id="physical">
        <div class="wrap pillar reverse">
            <figure>
                <img src="<?php echo e($root); ?>/assets/images/secondary/basketball.webp" width="1600" height="1067" alt="<?php echo e($t['physical_alt']); ?>" loading="lazy" decoding="async">
                <figcaption><?php echo e($t['physical_cap']); ?></figcaption>
            </figure>
            <div class="pillar-copy">
                <p class="kicker"><?php echo e($t['physical_kicker']); ?></p>
                <h2><?php echo e($t['physical_title']); ?></h2>
                <p><?php echo e($t['physical_text']); ?></p>
                <div class="actions">
                    <a class="btn btn-line" href="<?php echo e($page); ?>/primary.php#life"><?php echo e($t['life']); ?></a>
                    <a class="btn btn-line" href="<?php echo e($page); ?>/secondary.php#clubs"><?php echo e($t['sec_clubs']); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="band band-alt" id="mental">
        <div class="wrap pillar">
            <figure>
                <img src="<?php echo e($img); ?>/medals.webp" width="1400" height="1050" alt="<?php echo e($t['mental_alt']); ?>" loading="lazy" decoding="async">
                <figcaption><?php echo e($t['mental_cap']); ?></figcaption>
            </figure>
            <div class="pillar-copy">
                <p class="kicker"><?php echo e($t['mental_kicker']); ?></p>
                <h2><?php echo e($t['mental_title']); ?></h2>
                <p><?php echo e($t['mental_text']); ?></p>
                <div class="actions">
                    <a class="btn btn-line" href="<?php echo e($page); ?>/primary.php#care"><?php echo e($t['care']); ?></a>
                    <a class="btn btn-line" href="<?php echo e($page); ?>/secondary.php#guidance"><?php echo e($t['guidance']); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="band" id="staff">
        <div class="wrap">
            <p class="kicker"><?php echo e($t['staff_kicker']); ?></p>
            <h2><?php echo e($t['staff_title']); ?></h2>
            <p class="intro"><?php echo e($t['staff_intro']); ?></p>
            <div class="people">
                <?php foreach ($people as $person): ?>
                    <article class="person">
                        <div class="person-photo">
                            <?php if ($person['photo'] !== ''): ?>
                                <img src="<?php echo e($person['photo']); ?>" width="480" height="480" alt="" loading="lazy" decoding="async">
                            <?php else: ?>
                                <span class="mono" aria-hidden="true"><?php echo e($person['initials']); ?></span>
                            <?php endif; ?>
                        </div>
                        <h3><?php echo e($person['name']); ?></h3>
                        <p><?php echo e($person['role']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
            <div class="actions">
                <a class="btn btn-line" href="<?php echo e($page); ?>/staff.php"><?php echo e($t['all_staff']); ?></a>
            </div>
        </div>
    </section>

    <section class="band band-alt" id="visit">
        <div class="wrap">
            <p class="kicker"><?php echo e($t['visit_kicker']); ?></p>
            <h2><?php echo e($t['visit_title']); ?></h2>
            <div class="campuses solo">
                <article class="campus-card">
                    <h3>Logbessou</h3>
                    <p><?php echo e($t['log_text']); ?></p>
                    <p><a href="tel:+237676332046">+237 676 332 046</a></p>
                </article>
            </div>
            <p class="motto"><?php echo e($t['hours']); ?> · dany.kengne@emergenceschools.org</p>
        </div>
    </section>

<?php emergence_footer($boot, $wa); ?>
    <script src="<?php echo e($root); ?>/assets/js/primary.js?v=1" defer></script>
</body>
</html>
