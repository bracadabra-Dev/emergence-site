<?php
/**
 * Emergence Schools — Secondary section, Logbessou.
 *
 * Shared hosting: upload with includes/site.php, assets/css/site.css,
 * assets/css/primary.css and assets/images/secondary/.
 * No build step, no database. PHP 7.4.
 *
 * Facts follow the published academics page. The percentage table on
 * that page is not repeated here.
 */

require_once dirname(__DIR__) . '/includes/site.php';

$boot = emergence_boot('/pages/secondary.php');
$lang = $boot['lang'];
$root = $boot['root'];
$img = $boot['img'];
$sec = $root . '/assets/images/secondary';
$page = $boot['page'];
$origin = $boot['origin'];
$canonical = $boot['canonical'];

$places = array(
    'Deido', 'Bonamoussadi', 'Kotto', 'Lendi', 'Makepe', 'Omnisport', 'Nyalla',
    'PK 10', 'PK 12–21', 'Cité des Palmiers', 'Hôpital Général', 'Ndongbong',
    'Logbessou', 'Logpom', 'Yassa', 'Japoma', 'Bangue', 'Akwa', 'Mboppi',
);

$copy = array(
    'en' => array(
        'meta_title' => 'Secondary School — Emergence Logbessou',
        'meta_desc' => 'Secondary at Emergence Logbessou, 10th Avenue, Douala. Anglophone and French streams, GCE, BEPC, Probatoire and the Baccalauréat.',
        'hero_kicker' => 'Secondary · Logbessou',
        'hero_title' => 'Older students, on the same campus.',
        'hero_lede' => 'At Logbessou, secondary continues in two streams. An Anglophone stream prepares the Cameroon GCE. A French stream prepares BEPC, Probatoire and the Baccalauréat.',
        'hero_alt' => 'Secondary students in the school basketball kit, on the yard at Logbessou.',
        'apply' => 'Apply',
        'whatsapp' => 'WhatsApp',
        'call' => 'Call Logbessou',
        'wa_text' => 'Hello Emergence Logbessou, I would like to ask about a place in secondary.',
        'primary_link' => 'The primary section',
        'on_page' => 'On this page',
        'jump_school' => 'The school',
        'jump_campus' => 'Campus',
        'jump_streams' => 'Streams',
        'jump_class' => 'The lesson',
        'jump_exams' => 'Exams',
        'jump_guide' => 'Guidance',
        'jump_life' => 'Facilities',
        'jump_clubs' => 'Clubs',
        'jump_lead' => 'Leadership',
        'story_kicker' => 'On this campus',
        'story_title' => 'Secondary at Logbessou.',
        'story_p1' => 'The secondary school shares 10th Avenue with the nursery and the primary. Students stay in a school they already know. The work gets harder: examinations, a course to choose, and a university to aim at.',
        'story_p2' => 'Digital work, as required by MINESEC, sits in both streams. Practical sessions, research and dissertation writing sit beside the timetable.',
        'story_note' => 'The school is a BEPC written sub-centre and a GCE registration centre.',
        'lesson_alt' => 'Secondary students in navy uniform writing at their desks during a lesson.',
        'lesson_cap' => 'A lesson, at the desks.',
        'class_kicker' => 'In class',
        'class_title' => 'Write it, then correct it.',
        'class_intro' => 'Secondary students work at their desks, then go over the assignment at the board. The computer room is part of the same day. A poster on that wall asks how they will use what they learn.',
        'lab_alt' => 'A teacher helps two students at a computer. The wall poster reads, How will you use Google?',
        'lab_cap' => 'The computer room.',
        'board_alt' => 'A teacher at the whiteboard correcting an assignment, with the class seated behind.',
        'board_cap' => 'Correcting the assignment.',
        'campus_caption' => 'The Logbessou campus, 10th Avenue.',
        'campus_kicker' => 'The campus',
        'campus_title' => '10th Avenue, Logbessou.',
        'campus_since' => 'Since September 2006',
        'campus_role' => 'Nursery, primary and secondary, on one campus.',
        'campus_addr' => '10th Avenue, Douala',
        'map' => 'Map',
        'streams_kicker' => 'The two streams',
        'streams_title' => 'Anglophone, and French.',
        'streams_intro' => 'Both streams are taught here. A student does not leave Logbessou to change language.',
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
        'papers' => array(
            array('Cameroon GCE', 'The school is a GCE registration centre. The Anglophone stream prepares the papers.'),
            array('BEPC, Probatoire, Baccalauréat', 'The French stream prepares all three. The school is a BEPC written sub-centre.'),
            array('SAT and Microsoft', 'Students can also prepare SAT and Microsoft exams, alongside the Cameroon papers.'),
            array('A transcript a university can read', 'Transcripts name the subjects and what was taught, so the next school is not guessing.'),
        ),
        'guide_kicker' => 'Guidance',
        'guide_title' => 'Someone follows the next step.',
        'guide_text' => 'A counselling and orientation bureau watches how each student is getting on. It helps with the course to apply for, the place, and the deadline, and it stays with the application. The school sends the universities a student chooses a clear account of the subjects studied. It names links with universities in Canada, the United Kingdom, New Zealand, the United States and Australia.',
        'guide_alt' => 'Students in uniform during a visit at Logbessou.',
        'guide_cap' => 'A visit along the corridor.',
        'life_kicker' => 'The building',
        'life_title' => 'What the secondary school has.',
        'facilities' => array(
            array('Classrooms', 'Air-conditioned rooms, a whiteboard, and at most 25 students in a class.'),
            array('Laboratories', 'Three computer laboratories. Biology, chemistry and physics, each with a screen for the demonstration. A geology laboratory with the rocks and minerals the course needs.'),
            array('Library and gymnasium', 'A quiet room for reading, and a gymnasium for sport.'),
            array('The canteen', 'A supervised kitchen. Meals, pastries, and four screens in the hall.'),
            array('Research', 'Internet for an exposé, and projectors when a class presents its work.'),
            array('The first year', 'The section opened on this campus in September 2023. That first year recorded a full pass in both streams.'),
        ),
        'cap_sport' => 'Basketball on the yard.',
        'cap_visit' => 'Students during a visit.',
        'cap_staff' => 'The team in front of the school.',
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
        'care_kicker' => 'Around the student',
        'care_title' => 'A nurse, a watched gate, and a bus.',
        'cares' => array(
            array('A nurse on campus', 'A professional nurse is present. When a student needs more than the infirmary, the school takes them to a known clinic.'),
            array('A secure yard', 'Guards are on campus through the day and the night.'),
            array('The next step is not left to chance', 'The counselling bureau stays with the course, the place and the deadline.'),
        ),
        'bus_title' => 'Buses across Douala',
        'bus_text' => 'Drivers are trained in-house. The fleet covers:',
        'lead_kicker' => 'Secondary leadership',
        'lead_title' => 'The two vice principals.',
        'lead_intro' => 'As the school publishes them.',
        'fr_name' => 'Mme Tchigheu Noubissi Epse Djeumeni Myriam',
        'fr_role' => 'Vice Principal, French Section',
        'en_name' => 'Mme Tim Blessing Kein',
        'en_role' => 'Vice Principal, Anglophone Section',
        'cta_title' => 'Ask about a place in secondary.',
        'cta_text' => 'Say which stream and which class. The nursery and primary are on their own page if the student is younger.',
        'email' => 'Email the school',
        'hours' => 'Monday to Friday, 8:00–17:00',
        'close' => 'Close',
    ),
    'fr' => array(
        'meta_title' => 'Secondaire — Emergence Logbessou',
        'meta_desc' => 'Le secondaire d’Emergence Logbessou, 10e avenue, Douala. Voies anglophone et française, GCE, BEPC, Probatoire et Baccalauréat.',
        'hero_kicker' => 'Secondaire · Logbessou',
        'hero_title' => 'Les plus grands, sur le même campus.',
        'hero_lede' => 'À Logbessou, le secondaire continue en deux voies. Une voie anglophone prépare le GCE camerounais. Une voie française prépare le BEPC, le Probatoire et le Baccalauréat.',
        'hero_alt' => 'Des élèves du secondaire en tenue de basket, sur le terrain de Logbessou.',
        'apply' => 'Candidater',
        'whatsapp' => 'WhatsApp',
        'call' => 'Appeler Logbessou',
        'wa_text' => 'Bonjour Emergence Logbessou, je voudrais demander une place au secondaire.',
        'primary_link' => 'La section primaire',
        'on_page' => 'Sur cette page',
        'jump_school' => 'L’école',
        'jump_campus' => 'Campus',
        'jump_streams' => 'Voies',
        'jump_class' => 'Le cours',
        'jump_exams' => 'Examens',
        'jump_guide' => 'Orientation',
        'jump_life' => 'Le bâtiment',
        'jump_clubs' => 'Clubs',
        'jump_lead' => 'Direction',
        'story_kicker' => 'Sur ce campus',
        'story_title' => 'Le secondaire à Logbessou.',
        'story_p1' => 'Le secondaire partage la 10e avenue avec la maternelle et le primaire. Les élèves restent dans une école qu’ils connaissent déjà. Le travail devient plus exigeant : les examens, une filière à choisir, une université à viser.',
        'story_p2' => 'Le numérique, comme le demande le MINESEC, est dans les deux voies. Les séances pratiques, la recherche et la dissertation accompagnent l’horaire.',
        'story_note' => 'L’école est un sous-centre d’écrit du BEPC et un centre d’inscription au GCE.',
        'lesson_alt' => 'Des élèves du secondaire en uniforme bleu marine écrivent à leur table pendant un cours.',
        'lesson_cap' => 'Un cours, aux tables.',
        'class_kicker' => 'En classe',
        'class_title' => 'L’écrire, puis le corriger.',
        'class_intro' => 'Les élèves du secondaire travaillent à leur table, puis reprennent le devoir au tableau. La salle informatique fait partie de la même journée. Une affiche sur ce mur demande comment ils utiliseront ce qu’ils apprennent.',
        'lab_alt' => 'Un enseignant aide deux élèves devant un ordinateur. L’affiche au mur demande : How will you use Google ?',
        'lab_cap' => 'La salle informatique.',
        'board_alt' => 'Un enseignant au tableau blanc corrige un devoir, la classe assise derrière.',
        'board_cap' => 'La correction du devoir.',
        'campus_caption' => 'Le campus de Logbessou, 10e avenue.',
        'campus_kicker' => 'Le campus',
        'campus_title' => '10e avenue, Logbessou.',
        'campus_since' => 'Depuis septembre 2006',
        'campus_role' => 'Maternelle, primaire et secondaire, sur un seul campus.',
        'campus_addr' => '10e avenue, Douala',
        'map' => 'Carte',
        'streams_kicker' => 'Les deux voies',
        'streams_title' => 'Anglophone, et française.',
        'streams_intro' => 'Les deux voies sont enseignées ici. Un élève ne quitte pas Logbessou pour changer de langue.',
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
        'papers' => array(
            array('GCE camerounais', 'L’école est un centre d’inscription au GCE. La voie anglophone prépare les épreuves.'),
            array('BEPC, Probatoire, Baccalauréat', 'La voie française prépare les trois. L’école est un sous-centre d’écrit du BEPC.'),
            array('SAT et Microsoft', 'Les élèves peuvent aussi préparer le SAT et les examens Microsoft, à côté des épreuves camerounaises.'),
            array('Un relevé qu’une université peut lire', 'Les relevés nomment les matières et ce qui a été enseigné, pour que l’école suivante ne devine pas.'),
        ),
        'guide_kicker' => 'Orientation',
        'guide_title' => 'Quelqu’un suit l’étape d’après.',
        'guide_text' => 'Un bureau d’orientation suit l’évolution de chaque élève. Il aide pour la filière, le lieu et la date limite, et il reste avec le dossier. L’école envoie aux universités choisies un compte clair des matières étudiées. Elle cite des liens avec des universités au Canada, au Royaume-Uni, en Nouvelle-Zélande, aux États-Unis et en Australie.',
        'guide_alt' => 'Des élèves en uniforme lors d’une visite à Logbessou.',
        'guide_cap' => 'Une visite dans le couloir.',
        'life_kicker' => 'Le bâtiment',
        'life_title' => 'Ce que le secondaire a.',
        'facilities' => array(
            array('Les salles', 'Des salles climatisées, un tableau blanc, et 25 élèves au plus par classe.'),
            array('Les laboratoires', 'Trois salles informatiques. Biologie, chimie et physique, chacune avec un écran pour la démonstration. Un laboratoire de géologie, avec les roches et les minéraux du cours.'),
            array('Bibliothèque et gymnase', 'Une salle calme pour lire, et un gymnase pour le sport.'),
            array('La cantine', 'Une cuisine surveillée. Des repas, des pâtisseries, et quatre écrans dans la salle.'),
            array('La recherche', 'Internet pour un exposé, et des projecteurs quand une classe présente son travail.'),
            array('La première année', 'La section a ouvert sur ce campus en septembre 2023. Cette première année a enregistré le plein de réussites dans les deux voies.'),
        ),
        'cap_sport' => 'Le basket, sur le terrain.',
        'cap_visit' => 'Des élèves lors d’une visite.',
        'cap_staff' => 'L’équipe devant l’école.',
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
        'care_kicker' => 'Autour de l’élève',
        'care_title' => 'Une infirmerie, une cour surveillée, et un bus.',
        'cares' => array(
            array('Une infirmerie sur le campus', 'Un professionnel de santé est présent. Quand un élève a besoin de plus, l’école le conduit vers une clinique connue.'),
            array('Une cour surveillée', 'Des gardiens sont sur le campus le jour et la nuit.'),
            array('L’étape d’après n’est pas laissée au hasard', 'Le bureau d’orientation reste avec la filière, le lieu et la date limite.'),
        ),
        'bus_title' => 'Des bus dans Douala',
        'bus_text' => 'Les chauffeurs sont formés par l’école. Le parc dessert :',
        'lead_kicker' => 'Direction du secondaire',
        'lead_title' => 'Les deux vice-principales.',
        'lead_intro' => 'Telles que l’école les publie.',
        'fr_name' => 'Mme Tchigheu Noubissi Epse Djeumeni Myriam',
        'fr_role' => 'Vice-principale, section francophone',
        'en_name' => 'Mme Tim Blessing Kein',
        'en_role' => 'Vice-principale, section anglophone',
        'cta_title' => 'Demander une place au secondaire.',
        'cta_text' => 'Indiquez la voie et la classe. La maternelle et le primaire sont sur leur page si l’élève est plus jeune.',
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
$gallery = array(
    array('file' => 'basketball.webp', 'w' => 1600, 'h' => 1067, 'key' => 'cap_sport', 'class' => 'g-sport'),
    array('file' => 'visit.webp', 'w' => 1400, 'h' => 788, 'key' => 'cap_visit', 'class' => 'g-visit'),
    array('file' => 'staff.webp', 'w' => 1400, 'h' => 1050, 'key' => 'cap_staff', 'class' => 'g-staff'),
);

$schema = array(
    '@context' => 'https://schema.org',
    '@type' => 'EducationalOrganization',
    'name' => $lang === 'fr' ? 'École secondaire Emergence Logbessou' : 'Emergence Secondary School, Logbessou',
    'url' => $canonical,
    'email' => 'emergencecare@emergenceschools.org',
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
    <meta property="og:image" content="<?php echo e($origin . $sec . '/basketball.webp'); ?>">
    <meta property="og:locale" content="<?php echo $lang === 'fr' ? 'fr_FR' : 'en_GB'; ?>">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="icon" type="image/png" href="<?php echo e($img); ?>/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="preload" as="image" href="<?php echo e($sec); ?>/basketball-sm.webp" fetchpriority="high">
    <link rel="stylesheet" href="<?php echo e($root); ?>/assets/css/site.css?v=4">
    <link rel="stylesheet" href="<?php echo e($root); ?>/assets/css/primary.css?v=5">
    <script type="application/ld+json"><?php echo json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?></script>
</head>
<body data-lang-api="<?php echo e($root); ?>/api/language.php">
<?php emergence_header($boot, 'secondary'); ?>

    <section class="hero" aria-label="<?php echo e($t['hero_kicker']); ?>">
        <div class="hero-media">
            <img
                src="<?php echo e($sec); ?>/basketball-sm.webp"
                srcset="<?php echo e($sec); ?>/basketball-sm.webp 900w, <?php echo e($sec); ?>/basketball.webp 1600w"
                sizes="100vw"
                width="1600"
                height="1067"
                alt="<?php echo e($t['hero_alt']); ?>"
                fetchpriority="high"
                decoding="async">
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
            <a href="#story"><?php echo e($t['jump_school']); ?></a>
            <a href="#campus"><?php echo e($t['jump_campus']); ?></a>
            <a href="#streams"><?php echo e($t['jump_streams']); ?></a>
            <a href="#lesson"><?php echo e($t['jump_class']); ?></a>
            <a href="#exams"><?php echo e($t['jump_exams']); ?></a>
            <a href="#guidance"><?php echo e($t['jump_guide']); ?></a>
            <a href="#life"><?php echo e($t['jump_life']); ?></a>
            <a href="#clubs"><?php echo e($t['jump_clubs']); ?></a>
            <a href="#leadership"><?php echo e($t['jump_lead']); ?></a>
        </nav>
    </div>

    <section class="section" id="story">
        <div class="wrap story">
            <div>
                <p class="kicker"><?php echo e($t['story_kicker']); ?></p>
                <h2><?php echo e($t['story_title']); ?></h2>
                <p><?php echo e($t['story_p1']); ?></p>
                <p><?php echo e($t['story_p2']); ?></p>
                <p class="note"><?php echo e($t['story_note']); ?></p>
            </div>
            <figure class="frame">
                <img src="<?php echo e($sec); ?>/lesson.webp" width="1600" height="1066" alt="<?php echo e($t['lesson_alt']); ?>" loading="lazy" decoding="async">
                <figcaption><?php echo e($t['lesson_cap']); ?></figcaption>
            </figure>
        </div>
    </section>

    <section class="section section-alt" id="campus">
        <div class="wrap">
            <p class="kicker"><?php echo e($t['campus_kicker']); ?></p>
            <h2><?php echo e($t['campus_title']); ?></h2>
            <div class="campuses solo">
                <article class="campus-card">
                    <p class="since"><?php echo e($t['campus_since']); ?></p>
                    <h3>Logbessou</h3>
                    <p><?php echo e($t['campus_role']); ?></p>
                    <p><?php echo e($t['campus_addr']); ?></p>
                    <a class="phone-link" href="tel:+237676332046">+237 676 332 046</a>
                    <p><a href="https://maps.google.com/?q=Logbessou+10th+Avenue+Douala+Cameroon" rel="noopener"><?php echo e($t['map']); ?></a></p>
                </article>
            </div>
        </div>
    </section>

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

    <section class="section section-alt" id="lesson">
        <div class="wrap">
            <p class="kicker"><?php echo e($t['class_kicker']); ?></p>
            <h2><?php echo e($t['class_title']); ?></h2>
            <p class="intro"><?php echo e($t['class_intro']); ?></p>
            <div class="frames-2">
                <figure class="frame">
                    <img src="<?php echo e($sec); ?>/lab.webp" width="1280" height="854" alt="<?php echo e($t['lab_alt']); ?>" loading="lazy" decoding="async">
                    <figcaption><?php echo e($t['lab_cap']); ?></figcaption>
                </figure>
                <figure class="frame">
                    <img src="<?php echo e($sec); ?>/board.webp" width="1600" height="1066" alt="<?php echo e($t['board_alt']); ?>" loading="lazy" decoding="async">
                    <figcaption><?php echo e($t['board_cap']); ?></figcaption>
                </figure>
            </div>
        </div>
    </section>

    <section class="section" id="exams">
        <div class="wrap">
            <p class="kicker"><?php echo e($t['exam_kicker']); ?></p>
            <h2><?php echo e($t['exam_title']); ?></h2>
            <div class="methods">
                <?php foreach ($t['papers'] as $paper): ?>
                    <article class="card">
                        <h3><?php echo e($paper[0]); ?></h3>
                        <p><?php echo e($paper[1]); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section section-alt" id="guidance">
        <div class="wrap story">
            <div>
                <p class="kicker"><?php echo e($t['guide_kicker']); ?></p>
                <h2><?php echo e($t['guide_title']); ?></h2>
                <p><?php echo e($t['guide_text']); ?></p>
            </div>
            <figure class="frame">
                <img src="<?php echo e($sec); ?>/visit.webp" width="1400" height="788" alt="<?php echo e($t['guide_alt']); ?>" loading="lazy" decoding="async">
                <figcaption><?php echo e($t['guide_cap']); ?></figcaption>
            </figure>
        </div>
    </section>

    <section class="section" id="life">
        <div class="wrap">
            <p class="kicker"><?php echo e($t['life_kicker']); ?></p>
            <h2><?php echo e($t['life_title']); ?></h2>
            <div class="methods">
                <?php foreach ($t['facilities'] as $facility): ?>
                    <article class="card">
                        <h3><?php echo e($facility[0]); ?></h3>
                        <p><?php echo e($facility[1]); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
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

    <section class="section" id="care">
        <div class="wrap">
            <p class="kicker"><?php echo e($t['care_kicker']); ?></p>
            <h2><?php echo e($t['care_title']); ?></h2>
            <div class="care-grid">
                <?php foreach ($t['cares'] as $care): ?>
                    <article class="care">
                        <h3><?php echo e($care[0]); ?></h3>
                        <p><?php echo e($care[1]); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
            <div class="bus">
                <h3><?php echo e($t['bus_title']); ?></h3>
                <p><?php echo e($t['bus_text']); ?></p>
                <ul class="places">
                    <?php foreach ($places as $place): ?>
                        <li><?php echo e($place); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>

    <section class="section section-alt" id="leadership">
        <div class="wrap">
            <p class="kicker"><?php echo e($t['lead_kicker']); ?></p>
            <h2><?php echo e($t['lead_title']); ?></h2>
            <p class="intro"><?php echo e($t['lead_intro']); ?></p>
            <div class="leaders">
                <?php foreach ($leaders as $leader): ?>
                    <article class="leader">
                        <div class="leader-photo">
                            <?php if ($leader['photo'] !== ''): ?>
                                <img src="<?php echo e($leader['photo']); ?>" alt="<?php echo e($leader['name']); ?>" loading="lazy" decoding="async">
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
                <p class="hours"><?php echo e($t['hours']); ?> · emergencecare@emergenceschools.org</p>
            </div>
            <div class="actions">
                <a class="btn btn-yellow" href="<?php echo e($page); ?>/admissions.php"><?php echo e($t['apply']); ?></a>
                <a class="btn btn-line" href="mailto:emergencecare@emergenceschools.org"><?php echo e($t['email']); ?></a>
                <a class="btn btn-line" href="<?php echo e($page); ?>/primary.php"><?php echo e($t['primary_link']); ?></a>
            </div>
        </section>
    </div>

<?php emergence_footer($boot, $wa); ?>
    <div id="lightbox" class="lightbox" hidden>
        <button type="button" class="lightbox-close" aria-label="<?php echo e($t['close']); ?>">&times;</button>
        <img alt="">
    </div>
    <script src="<?php echo e($root); ?>/assets/js/primary.js?v=1" defer></script>
</body>
</html>
