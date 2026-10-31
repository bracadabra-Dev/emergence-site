<?php
/**
 * Emergence Schools — Nursery & Primary section.
 *
 * Shared hosting: upload this file, includes/site.php, assets/css/site.css,
 * assets/css/primary.css, assets/js/primary.js and assets/images/primary/.
 * No build step, no database. PHP 7.4 or newer.
 *
 * In the existing site header, point both "Primary Section" links
 * (desktop and mobile) at pages/primary.php instead of
 * pages/academics.php#primary.
 *
 * Leadership portraits, optional, same folder:
 *   assets/images/primary/leadership/headmaster.webp
 *   assets/images/primary/leadership/headmistress.webp
 * JPG and PNG with those base names work too.
 */

require_once dirname(__DIR__) . '/includes/site.php';

$boot = emergence_boot('/pages/primary.php');
$lang = $boot['lang'];
$root = $boot['root'];
$clean_path = $boot['clean_path'];
$origin = $boot['origin'];
$canonical = $boot['canonical'];

$img = $root . '/assets/images/primary';
$places = array(
    'Deido', 'Bonamoussadi', 'Kotto', 'Lendi', 'Makepe', 'Omnisport', 'Nyalla',
    'PK 10', 'PK 12–21', 'Cité des Palmiers', 'Hôpital Général', 'Ndongbong',
    'Logbessou', 'Logpom', 'Yassa', 'Japoma', 'Bangue', 'Akwa', 'Mboppi',
);

$copy = array(
    'en' => array(
        'meta_title' => 'Primary School — Emergence Schools',
        'meta_desc' => 'Nursery and primary at Emergence Logbessou, 10th Avenue, Douala. Bilingual, French and Anglo-Saxon classes on one campus.',
        'brand' => 'Emergence',
        'brand_sub' => 'Nursery & Primary',
        'home' => 'Home',
        'primary' => 'Primary',
        'academics' => 'Academics',
        'overview' => 'Overview',
        'secondary' => 'Secondary',
        'guidance' => 'Guidance',
        'results' => 'Exam results',
        'admissions' => 'Admissions',
        'fees' => 'Fees',
        'news' => 'News',
        'gallery' => 'Gallery',
        'documents' => 'Documents',
        'contact' => 'Contact',
        'menu' => 'Menu',
        'skip' => 'Skip to content',
        'on_page' => 'On this page',
        'jump_school' => 'The school',
        'jump_campuses' => 'Campus',
        'jump_paths' => 'Pathways',
        'jump_class' => 'Classroom',
        'jump_life' => 'Life',
        'jump_lead' => 'Leadership',
        'hero_kicker' => 'Nursery & Primary · Douala',
        'hero_title' => 'Bilingual school life, from the first classroom.',
        'hero_lede' => 'Emergence opened in 1995 so children in Douala could grow up at ease in English and in French. The motto still leads the day: Discipline – Hardwork – Success.',
        'hero_alt' => 'Young Emergence pupils in blue gowns at a kindergarten ceremony.',
        'apply' => 'Admissions',
        'whatsapp' => 'WhatsApp',
        'call' => 'Call Logbessou',
        'wa_text' => 'Hello! I would like to know about nursery or primary at Emergence Schools.',
        'close' => 'Close',
        'story_kicker' => 'Since 1995',
        'story_title' => 'A primary school first.',
        'story_p1' => 'Emergence Bilingual Nursery and Primary School was founded in September 1995 by Mme Ebai, née Hilda Kellen Fonka. The point was Cameroon’s two languages: a child should be able to live in either one.',
        'story_before' => 'Classes stay at 30 pupils or fewer, in airy rooms, with a nurse and a computer lab on this campus. The ',
        'story_link' => 'secondary section',
        'story_after' => ' grew out of this school. It did not replace it.',
        'story_note' => 'At Common Entrance and the Concours d’entrée en 6ème, Emergence has recorded a full pass in almost every year it has presented candidates, and 97% in the one year that fell short.',
        'campus_caption' => 'Logbessou campus, 10th Avenue.',
        'campuses_kicker' => 'The campus',
        'campuses_title' => 'Logbessou, 10th Avenue.',
        'log_name' => 'Logbessou',
        'log_role' => 'Nursery, primary, and the step into secondary.',
        'log_since' => 'Since September 2006',
        'log_addr' => '10th Avenue, Douala',
        'map' => 'Map',
        'paths_kicker' => 'Pathways',
        'paths_title' => 'Three ways through primary.',
        'paths_intro' => 'The programme follows Cameroon’s two school languages. Pupils are pushed to inquire and to practise, not only to copy. Classroom time is 60%. Practical time is 40%.',
        'balance_class' => '60% classroom',
        'balance_prac' => '40% practical',
        'paths' => array(
            array('Bilingual', 'Nursery to Class 4', 'Maternelle to CE2. Both languages from the start, so reading and speaking are not split into a home language and a school language.'),
            array('French', 'CM1 – CM2', 'The national French-speaking primary programme, with spoken English kept in the week.'),
            array('Anglo-Saxon', 'Class 5 – Class 6', 'The English-speaking primary programme, aimed at a steady step into secondary school.'),
        ),
        'class_kicker' => 'In the classroom',
        'class_title' => 'How the week is built.',
        'methods' => array(
            array('Technology in the room', 'Smart boards, tablets and classroom audio. Microsoft Teams carries extra practice, examples, past questions and homework.'),
            array('Children facing each other', 'Seats are arranged so pupils compare ideas, not only copy from the board.'),
            array('Work before term’s end', 'Supervised homework, continuous assessment and sequential tests come before the ministry end-of-term exam.'),
            array('Parents, twice a year', 'Two parent–teacher mini-conferences, to see the child’s work and talk with teachers and the administration.'),
        ),
        'life_kicker' => 'Life on campus',
        'life_title' => 'The youngest classes, and the people who teach them.',
        'cap_culture' => 'Cultural day for the younger classes.',
        'cap_corridor' => 'A visit along the primary corridor.',
        'cap_celebration' => 'Staff on a school celebration.',
        'cap_team' => 'The team in school colours, Logbessou.',
        'clubs_kicker' => 'After the lesson',
        'clubs_title' => 'Clubs, and a government of pupils.',
        'clubs_intro' => 'The week continues past the timetable.',
        'clubs' => array('Classic dance', 'Karate', 'Ballet', 'Computer classes', 'Arts and craft', 'Health club', 'Kitchen club', 'Sport'),
        'voice_title' => 'Primary school government',
        'voice_intro' => 'Pupils hold these offices. It is practice in responsibility, not a staff chart.',
        'offices' => array('Prime Minister', 'Basic Education', 'Sports', 'Defence', 'Environment', 'Arts and Culture', 'Health', 'Communication'),
        'care_kicker' => 'Around the child',
        'care_title' => 'Health, a watched gate, and a bus.',
        'cares' => array(
            array('A nurse on campus', 'A professional nurse is present. When a child needs more than the infirmary, the school takes them to a known clinic.'),
            array('A secure yard', 'Guards are on campus through the day and the night. New tables and chairs are already in the primary classrooms.'),
            array('Computers as a habit', 'A lab where a pupil can sit at a machine, educational software, and tablets so the work can continue at home.'),
        ),
        'bus_title' => 'Buses across Douala',
        'bus_text' => 'Drivers are trained in-house. The fleet covers:',
        'lead_kicker' => 'Primary leadership',
        'lead_title' => 'At the head of the section.',
        'lead_intro' => 'The headmaster and headmistress of the primary section.',
        'head_name' => 'Mr Nkwelle Ephraim',
        'head_role' => 'Headmaster, Primary Section',
        'vice_name' => 'Mme Simon Hermine',
        'vice_role' => 'Headmistress, Primary Section',
        'fly_kicker' => 'This year’s flyer',
        'fly_title' => 'Nursery, primary and secondary, on one sheet.',
        'fly_intro' => 'The 2026 flyer for the Logbessou group. Open either version at full size.',
        'fly_fr' => 'French flyer, Groupe Scolaire Emergence, Logbessou.',
        'fly_en' => 'English flyer, Emergence Schools, Logbessou.',
        'fly_open' => 'Open full size',
        'cta_title' => 'Ask about a place in nursery or primary.',
        'cta_text' => 'Say which class. Admissions at Logbessou start with that conversation.',
        'email' => 'Email the school',
        'hours' => 'Monday to Friday, 8:00–17:00',
        'foot_blurb' => 'Nursery and primary at Emergence Schools, Douala. The group also runs the secondary school.',
        'foot_links' => 'Quick links',
        'foot_visit' => 'Visit',
        'portals' => 'Portals',
        'student' => 'Student portal',
        'teacher' => 'Teacher portal',
        'admin' => 'Administration',
        'credit' => 'Site by',
        'rights' => 'All rights reserved.',
    ),
    'fr' => array(
        'meta_title' => 'École primaire — École Emergence',
        'meta_desc' => 'Maternelle et primaire à Emergence Logbessou, 10e avenue, Douala. Sections bilingue, française et anglo-saxonne sur un seul campus.',
        'brand' => 'Emergence',
        'brand_sub' => 'Maternelle et primaire',
        'home' => 'Accueil',
        'primary' => 'Primaire',
        'academics' => 'Académique',
        'overview' => 'Vue d’ensemble',
        'secondary' => 'Secondaire',
        'guidance' => 'Orientation',
        'results' => 'Résultats',
        'admissions' => 'Admissions',
        'fees' => 'Frais',
        'news' => 'Actualités',
        'gallery' => 'Galerie',
        'documents' => 'Documents',
        'contact' => 'Contact',
        'menu' => 'Menu',
        'skip' => 'Aller au contenu',
        'on_page' => 'Sur cette page',
        'jump_school' => 'L’école',
        'jump_campuses' => 'Campus',
        'jump_paths' => 'Parcours',
        'jump_class' => 'La classe',
        'jump_life' => 'La vie',
        'jump_lead' => 'Direction',
        'hero_kicker' => 'Maternelle et primaire · Douala',
        'hero_title' => 'La vie bilingue, dès la première classe.',
        'hero_lede' => 'Emergence a ouvert en 1995 pour que les enfants de Douala grandissent à l’aise en anglais et en français. La devise mène encore la journée : Discipline – Hardwork – Success.',
        'hero_alt' => 'De jeunes élèves d’Emergence en toge bleue, lors d’une cérémonie de maternelle.',
        'apply' => 'Admissions',
        'whatsapp' => 'WhatsApp',
        'call' => 'Appeler Logbessou',
        'wa_text' => 'Bonjour ! Je voudrais des informations sur la maternelle ou le primaire à l’École Emergence.',
        'close' => 'Fermer',
        'story_kicker' => 'Depuis 1995',
        'story_title' => 'D’abord une école primaire.',
        'story_p1' => 'L’école maternelle et primaire bilingue Emergence a été fondée en septembre 1995 par Mme Ebai, née Hilda Kellen Fonka. Le propos tenait aux deux langues du Cameroun : un enfant doit pouvoir vivre dans l’une et dans l’autre.',
        'story_before' => 'Les classes restent à 30 élèves au plus, dans des salles aérées, avec une infirmerie et une salle informatique sur ce campus. Le ',
        'story_link' => 'secondaire',
        'story_after' => ' est né de cette école. Il ne l’a pas remplacée.',
        'story_note' => 'Au Common Entrance et au concours d’entrée en 6e, Emergence a obtenu le plein de réussites presque chaque année où elle a présenté des candidats, et 97 % l’année qui a fait exception.',
        'campus_caption' => 'Campus de Logbessou, 10e avenue.',
        'campuses_kicker' => 'Le campus',
        'campuses_title' => 'Logbessou, 10e avenue.',
        'log_name' => 'Logbessou',
        'log_role' => 'Maternelle, primaire, et le passage vers le secondaire.',
        'log_since' => 'Depuis septembre 2006',
        'log_addr' => '10e avenue, Douala',
        'map' => 'Plan',
        'paths_kicker' => 'Parcours',
        'paths_title' => 'Trois chemins dans le primaire.',
        'paths_intro' => 'Le programme suit les deux langues scolaires du Cameroun. On pousse les élèves à chercher et à pratiquer, pas seulement à copier. Le temps de classe est de 60 %. Le temps pratique est de 40 %.',
        'balance_class' => '60 % en classe',
        'balance_prac' => '40 % de pratique',
        'paths' => array(
            array('Bilingue', 'Nursery à Class 4', 'De la maternelle au CE2. Les deux langues dès le début, pour que lire et parler ne soient pas coupés entre la langue de la maison et celle de l’école.'),
            array('Française', 'CM1 – CM2', 'Le programme primaire francophone national, avec l’anglais parlé maintenu dans la semaine.'),
            array('Anglo-saxonne', 'Class 5 – Class 6', 'Le programme primaire anglophone, tourné vers une entrée solide au secondaire.'),
        ),
        'class_kicker' => 'Dans la classe',
        'class_title' => 'Comment la semaine est faite.',
        'methods' => array(
            array('La technologie dans la salle', 'Tableaux interactifs, tablettes et sonorisation. Microsoft Teams porte les exercices, les exemples, les anciennes épreuves et les devoirs.'),
            array('Des élèves face à face', 'Les places sont disposées pour que les enfants comparent leurs idées, et pas seulement pour copier le tableau.'),
            array('Le travail avant la fin du trimestre', 'Devoirs surveillés, évaluation continue et compositions séquentielles avant l’examen de fin de trimestre du ministère.'),
            array('Les parents, deux fois par an', 'Deux mini-conférences parents-enseignants, pour voir le travail de l’enfant et parler avec les enseignants et l’administration.'),
        ),
        'life_kicker' => 'La vie du campus',
        'life_title' => 'Les plus petites classes, et celles et ceux qui enseignent.',
        'cap_culture' => 'Journée culturelle des plus petits.',
        'cap_corridor' => 'Une visite dans le couloir du primaire.',
        'cap_celebration' => 'Le personnel lors d’une fête de l’école.',
        'cap_team' => 'L’équipe aux couleurs de l’école, à Logbessou.',
        'clubs_kicker' => 'Après le cours',
        'clubs_title' => 'Des clubs, et un gouvernement d’élèves.',
        'clubs_intro' => 'La semaine continue après l’emploi du temps.',
        'clubs' => array('Danse classique', 'Karaté', 'Ballet', 'Informatique', 'Arts plastiques', 'Club santé', 'Club cuisine', 'Sport'),
        'voice_title' => 'Gouvernement des élèves',
        'voice_intro' => 'Ce sont les élèves qui portent ces fonctions. C’est un exercice de responsabilité, pas un organigramme du personnel.',
        'offices' => array('Premier ministre', 'Éducation de base', 'Sports', 'Défense', 'Environnement', 'Arts et culture', 'Santé', 'Communication'),
        'care_kicker' => 'Autour de l’enfant',
        'care_title' => 'La santé, un portail surveillé, et le bus.',
        'cares' => array(
            array('Une infirmerie sur le campus', 'Un professionnel de santé tient l’infirmerie. Quand un enfant a besoin de plus, l’école le conduit vers une clinique connue.'),
            array('Une cour surveillée', 'Des gardiens sont sur le campus le jour et la nuit. De nouvelles tables et de nouvelles chaises sont déjà dans les salles du primaire.'),
            array('L’ordinateur comme une habitude', 'Une salle où un élève peut s’asseoir devant une machine, des logiciels éducatifs, et des tablettes pour que le travail continue à la maison.'),
        ),
        'bus_title' => 'Des bus dans Douala',
        'bus_text' => 'Les chauffeurs sont formés par l’école. Le circuit couvre :',
        'lead_kicker' => 'Direction du primaire',
        'lead_title' => 'À la tête de la section.',
        'lead_intro' => 'Le directeur et la directrice de la section primaire.',
        'head_name' => 'M. Nkwelle Ephraim',
        'head_role' => 'Directeur de la section primaire',
        'vice_name' => 'Mme Simon Hermine',
        'vice_role' => 'Directrice de la section primaire',
        'fly_kicker' => 'Le dépliant de l’année',
        'fly_title' => 'Maternelle, primaire et secondaire, sur une feuille.',
        'fly_intro' => 'Le dépliant 2026 du groupe de Logbessou. Ouvrez l’une ou l’autre version en grand.',
        'fly_fr' => 'Dépliant français, Groupe Scolaire Emergence, Logbessou.',
        'fly_en' => 'Dépliant anglais, Emergence Schools, Logbessou.',
        'fly_open' => 'Ouvrir en grand',
        'cta_title' => 'Demander une place en maternelle ou au primaire.',
        'cta_text' => 'Indiquez la classe. L’admission à Logbessou commence par cette conversation.',
        'email' => 'Écrire à l’école',
        'hours' => 'Lundi à vendredi, 8 h – 17 h',
        'foot_blurb' => 'Maternelle et primaire de l’École Emergence, à Douala. Le groupe comprend aussi le secondaire.',
        'foot_links' => 'Liens rapides',
        'foot_visit' => 'Venir',
        'portals' => 'Portails',
        'student' => 'Portail élève',
        'teacher' => 'Portail enseignant',
        'admin' => 'Administration',
        'credit' => 'Site par',
        'rights' => 'Tous droits réservés.',
    ),
);

$t = $copy[$lang];
$wa = 'https://wa.me/237699353787?text=' . rawurlencode($t['wa_text']);
$head_photo = emergence_photo($root, array('nkwelle-ephraim', 'nkwelle', 'kwelle', 'mr-kwelle', 'headmaster', 'head-master'));
$vice_photo = emergence_photo($root, array('headmistress', 'head-mistress', 'simon-hermine', 'hermine'));
$leaders = array(
    array('name' => $t['head_name'], 'role' => $t['head_role'], 'photo' => $head_photo, 'initials' => 'NE'),
    array('name' => $t['vice_name'], 'role' => $t['vice_role'], 'photo' => $vice_photo, 'initials' => 'SH'),
);
$gallery = array(
    array('file' => 'culture.webp', 'w' => 1100, 'h' => 825, 'key' => 'cap_culture', 'class' => 'g-culture'),
    array('file' => 'corridor.webp', 'w' => 1100, 'h' => 619, 'key' => 'cap_corridor', 'class' => 'g-corridor'),
    array('file' => 'celebration.webp', 'w' => 1100, 'h' => 825, 'key' => 'cap_celebration', 'class' => 'g-celebration'),
    array('file' => 'team.webp', 'w' => 1400, 'h' => 1050, 'key' => 'cap_team', 'class' => 'g-team'),
);
$page = $boot['page'];
$year = $boot['year'];

$schema = array(
    '@context' => 'https://schema.org',
    '@type' => 'EducationalOrganization',
    'name' => $lang === 'fr' ? 'École maternelle et primaire Emergence' : 'Emergence Nursery and Primary',
    'url' => $canonical,
    'email' => 'dany.kengne@emergenceschools.org',
    'telephone' => array('+237675261440', '+237676332046'),
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
    <meta property="og:image" content="<?php echo e($origin . $img . '/hero.webp'); ?>">
    <meta property="og:locale" content="<?php echo $lang === 'fr' ? 'fr_FR' : 'en_GB'; ?>">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="icon" type="image/png" href="<?php echo e($img); ?>/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="preload" as="image" imagesrcset="<?php echo e($img); ?>/hero-sm.webp 800w, <?php echo e($img); ?>/hero.webp 1600w" imagesizes="100vw" fetchpriority="high">
    <link rel="stylesheet" href="<?php echo e($root); ?>/assets/css/site.css?v=3">
    <link rel="stylesheet" href="<?php echo e($root); ?>/assets/css/primary.css?v=3">
    <script type="application/ld+json"><?php echo json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?></script>
</head>
<body data-lang-api="<?php echo e($root); ?>/api/language.php">
<?php emergence_header($boot, 'primary'); ?>

    <section class="hero" aria-label="<?php echo e($t['hero_kicker']); ?>">
        <div class="hero-media">
            <img
                src="<?php echo e($img); ?>/hero-sm.webp"
                srcset="<?php echo e($img); ?>/hero-sm.webp 800w, <?php echo e($img); ?>/hero.webp 1600w"
                sizes="100vw"
                width="1600"
                height="1200"
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
            <a href="#campuses"><?php echo e($t['jump_campuses']); ?></a>
            <a href="#pathways"><?php echo e($t['jump_paths']); ?></a>
            <a href="#classroom"><?php echo e($t['jump_class']); ?></a>
            <a href="#life"><?php echo e($t['jump_life']); ?></a>
            <a href="#leadership"><?php echo e($t['jump_lead']); ?></a>
        </nav>
    </div>

    <section class="section" id="story">
        <div class="wrap story">
            <div>
                <p class="kicker"><?php echo e($t['story_kicker']); ?></p>
                <h2><?php echo e($t['story_title']); ?></h2>
                <p><?php echo e($t['story_p1']); ?></p>
                <p><?php echo e($t['story_before']); ?><a href="<?php echo e($page); ?>/secondary.php"><?php echo e($t['story_link']); ?></a><?php echo e($t['story_after']); ?></p>
                <p class="note"><?php echo e($t['story_note']); ?></p>
            </div>
            <figure class="frame">
                <img src="<?php echo e($img); ?>/campus.webp" width="1400" height="1050" alt="<?php echo e($t['campus_caption']); ?>" loading="lazy" decoding="async">
                <figcaption><?php echo e($t['campus_caption']); ?></figcaption>
            </figure>
        </div>
    </section>

    <section class="section section-alt" id="campuses">
        <div class="wrap">
            <p class="kicker"><?php echo e($t['campuses_kicker']); ?></p>
            <h2><?php echo e($t['campuses_title']); ?></h2>
            <div class="campuses solo">
                <article class="campus-card">
                    <p class="since"><?php echo e($t['log_since']); ?></p>
                    <h3><?php echo e($t['log_name']); ?></h3>
                    <p><?php echo e($t['log_role']); ?></p>
                    <p><?php echo e($t['log_addr']); ?></p>
                    <a class="phone-link" href="tel:+237676332046">+237 676 332 046</a>
                    <p><a href="https://maps.google.com/?q=Logbessou+10th+Avenue+Douala+Cameroon" rel="noopener"><?php echo e($t['map']); ?></a></p>
                </article>
            </div>
        </div>
    </section>

    <section class="section" id="pathways">
        <div class="wrap">
            <p class="kicker"><?php echo e($t['paths_kicker']); ?></p>
            <h2><?php echo e($t['paths_title']); ?></h2>
            <p class="intro"><?php echo e($t['paths_intro']); ?></p>
            <p class="balance">
                <span class="balance-class"><?php echo e($t['balance_class']); ?></span>
                <span class="balance-prac"><?php echo e($t['balance_prac']); ?></span>
            </p>
            <div class="cards-3">
                <?php foreach ($t['paths'] as $i => $path): ?>
                    <article class="card">
                        <span class="index"><?php echo str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT); ?></span>
                        <h3><?php echo e($path[0]); ?></h3>
                        <p class="range"><?php echo e($path[1]); ?></p>
                        <p><?php echo e($path[2]); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section section-alt" id="classroom">
        <div class="wrap">
            <p class="kicker"><?php echo e($t['class_kicker']); ?></p>
            <h2><?php echo e($t['class_title']); ?></h2>
            <div class="methods">
                <?php foreach ($t['methods'] as $method): ?>
                    <article class="method">
                        <h3><?php echo e($method[0]); ?></h3>
                        <p><?php echo e($method[1]); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section" id="life">
        <div class="wrap">
            <p class="kicker"><?php echo e($t['life_kicker']); ?></p>
            <h2><?php echo e($t['life_title']); ?></h2>
            <div class="bento">
                <?php foreach ($gallery as $shot): ?>
                    <figure class="<?php echo e($shot['class']); ?>">
                        <a class="shot" href="<?php echo e($img . '/' . $shot['file']); ?>" data-alt="<?php echo e($t[$shot['key']]); ?>" aria-label="<?php echo e($t[$shot['key']]); ?>">
                            <img src="<?php echo e($img . '/' . $shot['file']); ?>" width="<?php echo (int) $shot['w']; ?>" height="<?php echo (int) $shot['h']; ?>" alt="" loading="lazy" decoding="async">
                        </a>
                        <figcaption><?php echo e($t[$shot['key']]); ?></figcaption>
                    </figure>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section section-alt" id="clubs">
        <div class="wrap split">
            <div>
                <p class="kicker"><?php echo e($t['clubs_kicker']); ?></p>
                <h2><?php echo e($t['clubs_title']); ?></h2>
                <p class="intro"><?php echo e($t['clubs_intro']); ?></p>
                <ul class="chips">
                    <?php foreach ($t['clubs'] as $club): ?>
                        <li><?php echo e($club); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div>
                <h3><?php echo e($t['voice_title']); ?></h3>
                <p><?php echo e($t['voice_intro']); ?></p>
                <ul class="offices">
                    <?php foreach ($t['offices'] as $office): ?>
                        <li><?php echo e($office); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
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

    <section class="section" id="flyers">
        <div class="wrap">
            <p class="kicker"><?php echo e($t['fly_kicker']); ?></p>
            <h2><?php echo e($t['fly_title']); ?></h2>
            <p class="intro"><?php echo e($t['fly_intro']); ?></p>
            <div class="flyers">
                <figure class="sheet">
                    <a class="sheet-link" href="<?php echo e($img); ?>/flyer-fr.webp" data-alt="<?php echo e($t['fly_fr']); ?>">
                        <img src="<?php echo e($img); ?>/flyer-fr.webp" width="1280" height="904" alt="<?php echo e($t['fly_fr']); ?>" loading="lazy" decoding="async">
                    </a>
                    <figcaption><?php echo e($t['fly_fr']); ?> · <?php echo e($t['fly_open']); ?></figcaption>
                </figure>
                <figure class="sheet">
                    <a class="sheet-link" href="<?php echo e($img); ?>/flyer-en.webp" data-alt="<?php echo e($t['fly_en']); ?>">
                        <img src="<?php echo e($img); ?>/flyer-en.webp" width="1280" height="904" alt="<?php echo e($t['fly_en']); ?>" loading="lazy" decoding="async">
                    </a>
                    <figcaption><?php echo e($t['fly_en']); ?> · <?php echo e($t['fly_open']); ?></figcaption>
                </figure>
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
                <a class="btn btn-line" href="<?php echo e($page); ?>/contact.php"><?php echo e($t['contact']); ?></a>
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
