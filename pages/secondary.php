<?php
/**
 * Emergence Schools — Secondary section.
 *
 * Shared hosting: upload with includes/site.php, assets/css/site.css
 * and assets/css/primary.css. No build step, no database. PHP 7.4.
 *
 * Facts follow the published academics page. The percentage table on
 * that page is not repeated here.
 */

require_once dirname(__DIR__) . '/includes/site.php';

$boot = emergence_boot('/pages/secondary.php');
$lang = $boot['lang'];
$root = $boot['root'];
$img = $boot['img'];
$page = $boot['page'];
$origin = $boot['origin'];
$canonical = $boot['canonical'];

$copy = array(
    'en' => array(
        'meta_title' => 'Secondary School — Emergence Schools',
        'meta_desc' => 'Secondary at Emergence Schools, Douala. Anglophone and French streams, GCE and BEPC, Probatoire and the Baccalauréat.',
        'hero_kicker' => 'Secondary · Douala',
        'hero_title' => 'Two streams, one secondary school.',
        'hero_lede' => 'An Anglophone stream prepares the Cameroon GCE. A French stream prepares BEPC, Probatoire and the Baccalauréat. Both belong to the same group as the nursery and the primary.',
        'hero_alt' => 'The Logbessou campus, where secondary continues the group.',
        'apply' => 'Apply',
        'whatsapp' => 'WhatsApp',
        'call' => 'Call Logbessou',
        'wa_text' => 'Hello Emergence Schools, I would like to ask about a place in secondary.',
        'primary_link' => 'The primary section',
        'on_page' => 'On this page',
        'jump_streams' => 'Streams',
        'jump_exams' => 'Exams',
        'jump_guide' => 'Guidance',
        'jump_clubs' => 'Clubs',
        'jump_lead' => 'Leadership',
        'streams_kicker' => 'The two streams',
        'streams_title' => 'Anglophone, and French.',
        'streams_intro' => 'Digital work, as required by MINESEC, sits in both.',
        'anglo_title' => 'Anglophone stream',
        'anglo_items' => array(
            'Preparation for the Cameroon GCE',
            'Financial literacy, business and accountancy in every class',
            'Research, exposés and dissertation writing',
            'Digitalisation as required by MINESEC',
        ),
        'french_title' => 'French stream',
        'french_note' => 'BEPC, Probatoire, Baccalauréat',
        'french_items' => array(
            'Preparation on the Cameroon system',
            'Spoken English, taught with technology',
            'Practical sessions and demonstrations',
            'Finance and financial management',
            'Digitalisation as required by MINESEC',
        ),
        'exam_kicker' => 'Exams',
        'exam_title' => 'A place that registers the papers.',
        'exam_text' => 'The school is a BEPC written sub-centre and a GCE registration centre. Preparation covers the Cameroon GCE, BEPC, Probatoire and the Baccalauréat, and the writing of research and dissertations. Students can also prepare SAT and Microsoft exams. Transcripts are drawn up so a university can read the subjects and what was taught.',
        'guide_kicker' => 'Guidance',
        'guide_title' => 'Someone follows the next step.',
        'guide_text' => 'A counselling and orientation bureau watches how each student is getting on. It helps with the course to apply for, the place, and the deadline, and it stays with the application. The school sends the universities a student chooses a clear account of the subjects studied. It names links with universities in Canada, the United Kingdom, New Zealand, the United States and Australia.',
        'clubs_kicker' => 'After the lesson',
        'clubs_title' => 'Clubs in the secondary school.',
        'clubs_intro' => 'These sit alongside the timetable. The younger classes keep their own clubs, on the primary page.',
        'clubs' => array(
            'IT: programming, web, graphics, video',
            'Arts and culture: visual arts, music, dance, drama',
            'Science: experiments, fairs, the lab, field trips',
            'Sport: basketball, football, volleyball, track, fitness',
            'Chess, for every student',
            'Excursions',
        ),
        'lead_kicker' => 'Secondary leadership',
        'lead_title' => 'The two vice principals.',
        'lead_intro' => 'As the school publishes them.',
        'fr_name' => 'Mme Tchigheu Noubissi Epse Djeumeni Myriam',
        'fr_role' => 'Vice Principal, French Section',
        'en_name' => 'Mme Tim Blessing Kein',
        'en_role' => 'Vice Principal, Anglophone Section',
        'cta_title' => 'Ask about a place in secondary.',
        'cta_text' => 'Say which stream and which class. The nursery and primary are on their own page if the child is younger.',
        'email' => 'Email the school',
        'hours' => 'Monday to Friday, 8:00–17:00',
        'close' => 'Close',
    ),
    'fr' => array(
        'meta_title' => 'Secondaire — École Emergence',
        'meta_desc' => 'Le secondaire de l’École Emergence, à Douala. Voies anglophone et française, GCE, BEPC, Probatoire et Baccalauréat.',
        'hero_kicker' => 'Secondaire · Douala',
        'hero_title' => 'Deux voies, un seul secondaire.',
        'hero_lede' => 'Une voie anglophone prépare le GCE camerounais. Une voie française prépare le BEPC, le Probatoire et le Baccalauréat. Les deux appartiennent au même groupe que la maternelle et le primaire.',
        'hero_alt' => 'Le campus de Logbessou, où le secondaire prolonge le groupe.',
        'apply' => 'Candidater',
        'whatsapp' => 'WhatsApp',
        'call' => 'Appeler Logbessou',
        'wa_text' => 'Bonjour École Emergence, je voudrais demander une place au secondaire.',
        'primary_link' => 'La section primaire',
        'on_page' => 'Sur cette page',
        'jump_streams' => 'Voies',
        'jump_exams' => 'Examens',
        'jump_guide' => 'Orientation',
        'jump_clubs' => 'Clubs',
        'jump_lead' => 'Direction',
        'streams_kicker' => 'Les deux voies',
        'streams_title' => 'Anglophone, et française.',
        'streams_intro' => 'Le numérique, comme le demande le MINESEC, est dans les deux.',
        'anglo_title' => 'Voie anglophone',
        'anglo_items' => array(
            'Préparation au GCE camerounais',
            'Littératie financière, business et comptabilité dans chaque classe',
            'Recherche, exposés et rédaction de dissertation',
            'Numérisation demandée par le MINESEC',
        ),
        'french_title' => 'Voie française',
        'french_note' => 'BEPC, Probatoire, Baccalauréat',
        'french_items' => array(
            'Préparation selon le système camerounais',
            'Anglais parlé, enseigné avec la technologie',
            'Séances pratiques et démonstrations',
            'Finance et gestion financière',
            'Numérisation demandée par le MINESEC',
        ),
        'exam_kicker' => 'Examens',
        'exam_title' => 'Un lieu qui inscrit aux épreuves.',
        'exam_text' => 'L’école est un sous-centre d’écrit du BEPC et un centre d’inscription au GCE. La préparation couvre le GCE camerounais, le BEPC, le Probatoire et le Baccalauréat, ainsi que la recherche et la dissertation. Les élèves peuvent aussi préparer le SAT et les examens Microsoft. Les relevés sont établis pour qu’une université lise les matières et ce qui a été enseigné.',
        'guide_kicker' => 'Orientation',
        'guide_title' => 'Quelqu’un suit l’étape d’après.',
        'guide_text' => 'Un bureau d’orientation suit l’évolution de chaque élève. Il aide pour la filière, le lieu et la date limite, et il reste avec le dossier. L’école envoie aux universités choisies un compte clair des matières étudiées. Elle cite des liens avec des universités au Canada, au Royaume-Uni, en Nouvelle-Zélande, aux États-Unis et en Australie.',
        'clubs_kicker' => 'Après le cours',
        'clubs_title' => 'Les clubs du secondaire.',
        'clubs_intro' => 'Ils accompagnent l’horaire. Les plus jeunes gardent leurs propres clubs, sur la page du primaire.',
        'clubs' => array(
            'Informatique : programmation, web, graphisme, vidéo',
            'Arts et culture : arts visuels, musique, danse, théâtre',
            'Sciences : expériences, foires, laboratoire, sorties',
            'Sport : basket, football, volley, athlétisme, forme',
            'Échecs, pour chaque élève',
            'Excursions',
        ),
        'lead_kicker' => 'Direction du secondaire',
        'lead_title' => 'Les deux vice-principales.',
        'lead_intro' => 'Telles que l’école les publie.',
        'fr_name' => 'Mme Tchigheu Noubissi Epse Djeumeni Myriam',
        'fr_role' => 'Vice-principale, section francophone',
        'en_name' => 'Mme Tim Blessing Kein',
        'en_role' => 'Vice-principale, section anglophone',
        'cta_title' => 'Demander une place au secondaire.',
        'cta_text' => 'Indiquez la voie et la classe. La maternelle et le primaire sont sur leur page si l’enfant est plus jeune.',
        'email' => 'Écrire à l’école',
        'hours' => 'Lundi à vendredi, 8 h – 17 h',
        'close' => 'Fermer',
    ),
);

$t = $copy[$lang];
$wa = 'https://wa.me/237699353787?text=' . rawurlencode($t['wa_text']);
$leaders = array(
    array(
        'name' => $t['fr_name'],
        'role' => $t['fr_role'],
        'photo' => emergence_photo($root, array('myriam')),
        'initials' => 'TM',
    ),
    array(
        'name' => $t['en_name'],
        'role' => $t['en_role'],
        'photo' => emergence_photo($root, array('blessing')),
        'initials' => 'BK',
    ),
);

$schema = array(
    '@context' => 'https://schema.org',
    '@type' => 'EducationalOrganization',
    'name' => $lang === 'fr' ? 'École secondaire Emergence' : 'Emergence Secondary School',
    'url' => $canonical,
    'email' => 'dany.kengne@emergenceschools.org',
    'telephone' => '+237676332046',
    'parentOrganization' => array(
        '@type' => 'EducationalOrganization',
        'name' => 'Emergence Schools',
        'url' => $origin . $root . '/',
    ),
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
    <meta property="og:image" content="<?php echo e($origin . $img . '/campus.webp'); ?>">
    <meta property="og:locale" content="<?php echo $lang === 'fr' ? 'fr_FR' : 'en_GB'; ?>">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="icon" type="image/png" href="<?php echo e($img); ?>/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="preload" as="image" href="<?php echo e($img); ?>/campus.webp" fetchpriority="high">
    <link rel="stylesheet" href="<?php echo e($root); ?>/assets/css/site.css?v=2">
    <link rel="stylesheet" href="<?php echo e($root); ?>/assets/css/primary.css?v=2">
    <script type="application/ld+json"><?php echo json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?></script>
</head>
<body data-lang-api="<?php echo e($root); ?>/api/language.php">
<?php emergence_header($boot, 'secondary'); ?>

    <section class="hero" aria-label="<?php echo e($t['hero_kicker']); ?>">
        <div class="hero-media">
            <img src="<?php echo e($img); ?>/campus.webp" width="1400" height="1050" alt="<?php echo e($t['hero_alt']); ?>" fetchpriority="high" decoding="async">
        </div>
    </section>

    <div class="wrap">
        <div class="hero-card" id="content">
            <p class="kicker"><?php echo e($t['hero_kicker']); ?></p>
            <h1><?php echo e($t['hero_title']); ?></h1>
            <p class="lede"><?php echo e($t['hero_lede']); ?></p>
            <div class="actions">
                <a class="btn btn-yellow" href="<?php echo e($page); ?>/admissions.php"><?php echo e($t['apply']); ?></a>
                <a class="btn btn-blue" href="<?php echo e($wa); ?>"><?php echo e($t['whatsapp']); ?></a>
                <a class="btn btn-line" href="tel:+237676332046"><?php echo e($t['call']); ?></a>
            </div>
            <p class="motto">Discipline – Hardwork – Success</p>
        </div>
        <nav class="subnav" aria-label="<?php echo e($t['on_page']); ?>">
            <a href="#streams"><?php echo e($t['jump_streams']); ?></a>
            <a href="#exams"><?php echo e($t['jump_exams']); ?></a>
            <a href="#guidance"><?php echo e($t['jump_guide']); ?></a>
            <a href="#clubs"><?php echo e($t['jump_clubs']); ?></a>
            <a href="#leadership"><?php echo e($t['jump_lead']); ?></a>
        </nav>
    </div>

    <section class="section" id="streams">
        <div class="wrap">
            <p class="kicker"><?php echo e($t['streams_kicker']); ?></p>
            <h2><?php echo e($t['streams_title']); ?></h2>
            <p class="intro"><?php echo e($t['streams_intro']); ?></p>
            <div class="cards-2">
                <article class="card">
                    <h3><?php echo e($t['anglo_title']); ?></h3>
                    <ul class="ticks">
                        <?php foreach ($t['anglo_items'] as $item): ?>
                            <li><?php echo e($item); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </article>
                <article class="card">
                    <h3><?php echo e($t['french_title']); ?></h3>
                    <p class="since"><?php echo e($t['french_note']); ?></p>
                    <ul class="ticks">
                        <?php foreach ($t['french_items'] as $item): ?>
                            <li><?php echo e($item); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </article>
            </div>
        </div>
    </section>

    <section class="section section-alt" id="exams">
        <div class="wrap">
            <p class="kicker"><?php echo e($t['exam_kicker']); ?></p>
            <h2><?php echo e($t['exam_title']); ?></h2>
            <p class="intro"><?php echo e($t['exam_text']); ?></p>
        </div>
    </section>

    <section class="section" id="guidance">
        <div class="wrap story">
            <div>
                <p class="kicker"><?php echo e($t['guide_kicker']); ?></p>
                <h2><?php echo e($t['guide_title']); ?></h2>
                <p><?php echo e($t['guide_text']); ?></p>
            </div>
            <figure class="frame">
                <img src="<?php echo e($img); ?>/team.webp" width="1400" height="1050" alt="" loading="lazy" decoding="async">
            </figure>
        </div>
    </section>

    <section class="section section-alt" id="clubs">
        <div class="wrap">
            <p class="kicker"><?php echo e($t['clubs_kicker']); ?></p>
            <h2><?php echo e($t['clubs_title']); ?></h2>
            <p class="intro"><?php echo e($t['clubs_intro']); ?></p>
            <ul class="chips">
                <?php foreach ($t['clubs'] as $club): ?>
                    <li><?php echo e($club); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <section class="section" id="leadership">
        <div class="wrap">
            <p class="kicker"><?php echo e($t['lead_kicker']); ?></p>
            <h2><?php echo e($t['lead_title']); ?></h2>
            <p class="intro"><?php echo e($t['lead_intro']); ?></p>
            <div class="leaders">
                <?php foreach ($leaders as $leader): ?>
                    <article class="leader">
                        <div class="leader-photo">
                            <?php if ($leader['photo'] !== ''): ?>
                                <img src="<?php echo e($leader['photo']); ?>" alt="" loading="lazy" decoding="async">
                            <?php else: ?>
                                <span class="mono" aria-hidden="true"><?php echo e($leader['initials']); ?></span>
                            <?php endif; ?>
                        </div>
                        <h3><?php echo e($leader['name']); ?></h3>
                        <p class="role"><?php echo e($leader['role']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <div class="wrap">
        <section class="cta" aria-labelledby="cta-title">
            <div>
                <h2 id="cta-title"><?php echo e($t['cta_title']); ?></h2>
                <p><?php echo e($t['cta_text']); ?></p>
                <p class="hours"><?php echo e($t['hours']); ?> · dany.kengne@emergenceschools.org</p>
            </div>
            <div class="actions">
                <a class="btn btn-yellow" href="<?php echo e($page); ?>/admissions.php"><?php echo e($t['apply']); ?></a>
                <a class="btn btn-line" href="mailto:dany.kengne@emergenceschools.org"><?php echo e($t['email']); ?></a>
                <a class="btn btn-line" href="<?php echo e($page); ?>/primary.php"><?php echo e($t['primary_link']); ?></a>
            </div>
        </section>
    </div>

<?php emergence_footer($boot, $wa); ?>
    <script src="<?php echo e($root); ?>/assets/js/primary.js?v=1" defer></script>
</body>
</html>
