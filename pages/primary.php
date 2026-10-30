<?php
/**
 * Emergence Schools — Nursery & Primary section.
 *
 * Shared hosting: upload this file plus assets/css/primary.css,
 * assets/js/primary.js and assets/images/primary/. No build step,
 * no database. PHP 7.4 or newer.
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

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$lang_keys = array('primary_lang', 'lang', 'language', 'locale', 'current_lang', 'site_lang', 'user_lang');

$script = isset($_SERVER['SCRIPT_NAME']) ? str_replace('\\', '/', $_SERVER['SCRIPT_NAME']) : '/pages/primary.php';
$root = rtrim(dirname(dirname($script)), '/');
if ($root === '/' || $root === '.') {
    $root = '';
}

$request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/pages/primary.php';
$clean_path = parse_url($request_uri, PHP_URL_PATH);
if (!is_string($clean_path) || $clean_path === '' || $clean_path[0] !== '/') {
    $clean_path = $root . '/pages/primary.php';
}

if (isset($_GET['lang']) && ($_GET['lang'] === 'en' || $_GET['lang'] === 'fr')) {
    foreach ($lang_keys as $key) {
        $_SESSION[$key] = $_GET['lang'];
    }
    header('Location: ' . $clean_path, true, 302);
    header('Cache-Control: private, no-store');
    exit;
}

$lang = 'en';
foreach ($lang_keys as $key) {
    if (isset($_SESSION[$key]) && ($_SESSION[$key] === 'en' || $_SESSION[$key] === 'fr')) {
        $lang = $_SESSION[$key];
        break;
    }
}

header('Content-Type: text/html; charset=UTF-8');
header('Cache-Control: private, no-store');
header('Vary: Cookie');

$host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'emergenceschools.org';
if (!preg_match('/^[A-Za-z0-9.-]+(?::\d+)?$/', $host)) {
    $host = 'emergenceschools.org';
}
$https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https');
$origin = ($https ? 'https' : 'http') . '://' . $host;
$canonical = $origin . $clean_path;

function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function portrait($root, $names) {
    $dir = dirname(__DIR__) . '/assets/images/primary/leadership';
    $exts = array('webp', 'jpg', 'jpeg', 'png');
    foreach ($names as $name) {
        foreach ($exts as $ext) {
            $file = $name . '.' . $ext;
            if (is_file($dir . '/' . $file)) {
                return $root . '/assets/images/primary/leadership/' . $file;
            }
        }
    }
    return '';
}

$img = $root . '/assets/images/primary';
$places = array(
    'Deido', 'Bonamoussadi', 'Kotto', 'Lendi', 'Makepe', 'Omnisport', 'Nyalla',
    'PK 10', 'PK 12–21', 'Cité des Palmiers', 'Hôpital Général', 'Ndongbong',
    'Logbessou', 'Logpom', 'Yassa', 'Japoma', 'Bangue', 'Bonapriso', 'Akwa', 'Mboppi',
);

$copy = array(
    'en' => array(
        'meta_title' => 'Primary School — Emergence Schools',
        'meta_desc' => 'Nursery and primary at Emergence Schools, Douala. Bilingual, French and Anglo-Saxon classes at Bonapriso and Logbessou since 1995.',
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
        'jump_campuses' => 'Campuses',
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
        'story_before' => 'Classes stay at 30 pupils or fewer, in airy rooms, with a nurse and a computer lab on both campuses. The ',
        'story_link' => 'secondary section',
        'story_after' => ' grew out of this school. It did not replace it.',
        'story_note' => 'At Common Entrance and the Concours d’entrée en 6ème, Emergence has recorded a full pass in almost every year it has presented candidates, and 97% in the one year that fell short.',
        'campus_caption' => 'Logbessou campus, 10th Avenue.',
        'campuses_kicker' => 'Campuses',
        'campuses_title' => 'Bonapriso and Logbessou.',
        'bona_name' => 'Bonapriso',
        'bona_role' => 'Nursery and primary.',
        'bona_since' => 'Since September 1995',
        'bona_addr' => 'Near Paroisse Dominique Savio, Douala',
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
            array('A nurse on both campuses', 'A professional nurse is present on each campus. When a child needs more than the infirmary, the school takes them to a known clinic.'),
            array('A secure yard', 'Guards are on campus through the day and the night. New tables and chairs are already in the primary classrooms.'),
            array('Computers as a habit', 'A lab where a pupil can sit at a machine, educational software, and tablets so the work can continue at home.'),
        ),
        'bus_title' => 'Buses across Douala',
        'bus_text' => 'Drivers are trained in-house. The fleet covers:',
        'lead_kicker' => 'Primary leadership',
        'lead_title' => 'At the head of the section.',
        'lead_intro' => 'The primary principal and vice principal, as published by the school.',
        'head_name' => 'Mr Nkwelle Ephraim',
        'head_role' => 'Principal, Primary Section',
        'vice_name' => 'Mme Simon Hermine',
        'vice_role' => 'Vice Principal, Primary Section',
        'fly_kicker' => 'This year’s flyer',
        'fly_title' => 'Nursery, primary and secondary, on one sheet.',
        'fly_intro' => 'The 2026 flyer for the Logbessou group. Open either version at full size.',
        'fly_fr' => 'French flyer, Groupe Scolaire Emergence, Logbessou.',
        'fly_en' => 'English flyer, Emergence Schools, Logbessou.',
        'fly_open' => 'Open full size',
        'cta_title' => 'Ask about a place in nursery or primary.',
        'cta_text' => 'Say which campus and which class. Admissions for Bonapriso and Logbessou start with that conversation.',
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
        'meta_desc' => 'Maternelle et primaire à l’École Emergence, Douala. Sections bilingue, française et anglo-saxonne à Bonapriso et à Logbessou, depuis 1995.',
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
        'story_before' => 'Les classes restent à 30 élèves au plus, dans des salles aérées, avec une infirmerie et une salle informatique sur les deux campus. Le ',
        'story_link' => 'secondaire',
        'story_after' => ' est né de cette école. Il ne l’a pas remplacée.',
        'story_note' => 'Au Common Entrance et au concours d’entrée en 6e, Emergence a obtenu le plein de réussites presque chaque année où elle a présenté des candidats, et 97 % l’année qui a fait exception.',
        'campus_caption' => 'Campus de Logbessou, 10e avenue.',
        'campuses_kicker' => 'Campus',
        'campuses_title' => 'Bonapriso et Logbessou.',
        'bona_name' => 'Bonapriso',
        'bona_role' => 'Maternelle et primaire.',
        'bona_since' => 'Depuis septembre 1995',
        'bona_addr' => 'Près de la paroisse Dominique Savio, Douala',
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
            array('Une infirmerie sur les deux campus', 'Un professionnel de santé tient l’infirmerie. Quand un enfant a besoin de plus, l’école le conduit vers une clinique connue.'),
            array('Une cour surveillée', 'Des gardiens sont sur le campus le jour et la nuit. De nouvelles tables et de nouvelles chaises sont déjà dans les salles du primaire.'),
            array('L’ordinateur comme une habitude', 'Une salle où un élève peut s’asseoir devant une machine, des logiciels éducatifs, et des tablettes pour que le travail continue à la maison.'),
        ),
        'bus_title' => 'Des bus dans Douala',
        'bus_text' => 'Les chauffeurs sont formés par l’école. Le circuit couvre :',
        'lead_kicker' => 'Direction du primaire',
        'lead_title' => 'À la tête de la section.',
        'lead_intro' => 'Le directeur et la directrice adjointe du primaire, tels que l’école les publie.',
        'head_name' => 'M. Nkwelle Ephraim',
        'head_role' => 'Directeur de la section primaire',
        'vice_name' => 'Mme Simon Hermine',
        'vice_role' => 'Directrice adjointe de la section primaire',
        'fly_kicker' => 'Le dépliant de l’année',
        'fly_title' => 'Maternelle, primaire et secondaire, sur une feuille.',
        'fly_intro' => 'Le dépliant 2026 du groupe de Logbessou. Ouvrez l’une ou l’autre version en grand.',
        'fly_fr' => 'Dépliant français, Groupe Scolaire Emergence, Logbessou.',
        'fly_en' => 'Dépliant anglais, Emergence Schools, Logbessou.',
        'fly_open' => 'Ouvrir en grand',
        'cta_title' => 'Demander une place en maternelle ou au primaire.',
        'cta_text' => 'Indiquez le campus et la classe. L’admission à Bonapriso ou à Logbessou commence par cette conversation.',
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
$head_photo = portrait($root, array('headmaster', 'head-master', 'nkwelle-ephraim'));
$vice_photo = portrait($root, array('headmistress', 'head-mistress', 'simon-hermine'));
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
$page = $root . '/pages';
$year = date('Y');

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
        array(
            '@type' => 'PostalAddress',
            'streetAddress' => 'Near Paroisse Dominique Savio, Bonapriso',
            'addressLocality' => 'Douala',
            'addressCountry' => 'CM',
        ),
        array(
            '@type' => 'PostalAddress',
            'streetAddress' => '10th Avenue, Logbessou',
            'addressLocality' => 'Douala',
            'addressCountry' => 'CM',
        ),
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
    <link rel="stylesheet" href="<?php echo e($root); ?>/assets/css/primary.css?v=1">
    <script type="application/ld+json"><?php echo json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?></script>
</head>
<body data-lang-api="<?php echo e($root); ?>/api/language.php">
    <a class="skip" href="#content"><?php echo e($t['skip']); ?></a>

    <header class="nav">
        <div class="wrap nav-bar">
            <a class="brand" href="<?php echo e($page); ?>/index.php">
                <img src="<?php echo e($img); ?>/sun.webp" width="400" height="188" alt="">
                <span>
                    <strong><?php echo e($t['brand']); ?></strong>
                    <small><?php echo e($t['brand_sub']); ?></small>
                </span>
            </a>

            <nav class="nav-links" aria-label="Primary">
                <a href="<?php echo e($page); ?>/index.php"><?php echo e($t['home']); ?></a>
                <a href="<?php echo e($clean_path); ?>" aria-current="page"><?php echo e($t['primary']); ?></a>
                <div class="menu">
                    <a class="menu-label" href="<?php echo e($page); ?>/academics.php"><?php echo e($t['academics']); ?> <span class="caret" aria-hidden="true"></span></a>
                    <div class="menu-panel">
                        <a href="<?php echo e($page); ?>/academics.php"><?php echo e($t['overview']); ?></a>
                        <a href="<?php echo e($clean_path); ?>"><?php echo e($t['primary']); ?></a>
                        <a href="<?php echo e($page); ?>/academics.php#secondary"><?php echo e($t['secondary']); ?></a>
                        <a href="<?php echo e($page); ?>/academics.php#guidance"><?php echo e($t['guidance']); ?></a>
                        <a href="<?php echo e($page); ?>/academics.php#results"><?php echo e($t['results']); ?></a>
                        <a href="<?php echo e($page); ?>/fees.php"><?php echo e($t['fees']); ?></a>
                    </div>
                </div>
                <a href="<?php echo e($page); ?>/admissions.php"><?php echo e($t['admissions']); ?></a>
                <a href="<?php echo e($page); ?>/news.php"><?php echo e($t['news']); ?></a>
                <a href="<?php echo e($page); ?>/gallery.php"><?php echo e($t['gallery']); ?></a>
                <a href="<?php echo e($page); ?>/contact.php"><?php echo e($t['contact']); ?></a>
                <div class="langs">
                    <a class="lang" href="<?php echo e($clean_path); ?>?lang=en" hreflang="en" lang="en" data-set-lang="en"<?php echo $lang === 'en' ? ' aria-current="true"' : ''; ?>>EN</a>
                    <a class="lang" href="<?php echo e($clean_path); ?>?lang=fr" hreflang="fr" lang="fr" data-set-lang="fr"<?php echo $lang === 'fr' ? ' aria-current="true"' : ''; ?>>FR</a>
                </div>
            </nav>

            <details class="drawer">
                <summary class="drawer-btn" aria-label="<?php echo e($t['menu']); ?>">
                    <span class="bars" aria-hidden="true"><span></span><span></span><span></span></span>
                </summary>
                <div class="drawer-panel">
                    <a href="<?php echo e($page); ?>/index.php"><?php echo e($t['home']); ?></a>
                    <a href="<?php echo e($clean_path); ?>" aria-current="page"><?php echo e($t['primary']); ?></a>
                    <a href="<?php echo e($page); ?>/academics.php"><?php echo e($t['academics']); ?></a>
                    <a href="<?php echo e($page); ?>/academics.php#secondary"><?php echo e($t['secondary']); ?></a>
                    <a href="<?php echo e($page); ?>/admissions.php"><?php echo e($t['admissions']); ?></a>
                    <a href="<?php echo e($page); ?>/fees.php"><?php echo e($t['fees']); ?></a>
                    <a href="<?php echo e($page); ?>/news.php"><?php echo e($t['news']); ?></a>
                    <a href="<?php echo e($page); ?>/gallery.php"><?php echo e($t['gallery']); ?></a>
                    <a href="<?php echo e($page); ?>/documents.php"><?php echo e($t['documents']); ?></a>
                    <a href="<?php echo e($page); ?>/contact.php"><?php echo e($t['contact']); ?></a>
                    <div class="drawer-langs">
                        <a href="<?php echo e($clean_path); ?>?lang=en" hreflang="en" data-set-lang="en"<?php echo $lang === 'en' ? ' aria-current="true"' : ''; ?>>EN</a>
                        <a href="<?php echo e($clean_path); ?>?lang=fr" hreflang="fr" data-set-lang="fr"<?php echo $lang === 'fr' ? ' aria-current="true"' : ''; ?>>FR</a>
                    </div>
                </div>
            </details>
        </div>
    </header>

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
                <p><?php echo e($t['story_before']); ?><a href="<?php echo e($page); ?>/academics.php#secondary"><?php echo e($t['story_link']); ?></a><?php echo e($t['story_after']); ?></p>
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
            <div class="cards-2">
                <article class="card">
                    <p class="since"><?php echo e($t['bona_since']); ?></p>
                    <h3><?php echo e($t['bona_name']); ?></h3>
                    <p><?php echo e($t['bona_role']); ?></p>
                    <p><?php echo e($t['bona_addr']); ?></p>
                    <a class="phone-link" href="tel:+237675261440">+237 675 261 440</a>
                    <p><a href="https://maps.google.com/?q=Bonapriso+Paroisse+Dominique+Savio+Douala" rel="noopener"><?php echo e($t['map']); ?></a></p>
                </article>
                <article class="card">
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

    <footer class="footer">
        <div class="wrap">
            <div class="footer-grid">
                <div>
                    <h2><?php echo e($t['brand']); ?></h2>
                    <p><?php echo e($t['foot_blurb']); ?></p>
                    <p><a href="tel:+237675261440">+237 675 261 440</a><br><a href="tel:+237676332046">+237 676 332 046</a></p>
                </div>
                <div>
                    <h3><?php echo e($t['foot_links']); ?></h3>
                    <ul>
                        <li><a href="<?php echo e($page); ?>/index.php"><?php echo e($t['home']); ?></a></li>
                        <li><a href="<?php echo e($clean_path); ?>"><?php echo e($t['primary']); ?></a></li>
                        <li><a href="<?php echo e($page); ?>/academics.php#secondary"><?php echo e($t['secondary']); ?></a></li>
                        <li><a href="<?php echo e($page); ?>/admissions.php"><?php echo e($t['admissions']); ?></a></li>
                        <li><a href="<?php echo e($page); ?>/fees.php"><?php echo e($t['fees']); ?></a></li>
                        <li><a href="<?php echo e($page); ?>/documents.php"><?php echo e($t['documents']); ?></a></li>
                        <li><a href="<?php echo e($page); ?>/contact.php"><?php echo e($t['contact']); ?></a></li>
                    </ul>
                </div>
                <div>
                    <h3><?php echo e($t['foot_visit']); ?></h3>
                    <ul>
                        <li><a href="https://www.facebook.com/emergenceschools" rel="noopener">Facebook</a></li>
                        <li><a href="https://www.instagram.com/emergenceschools/" rel="noopener">Instagram</a></li>
                        <li><a href="https://www.linkedin.com/company/emergence-bilingualnursery-and-primary-school/about/" rel="noopener">LinkedIn</a></li>
                        <li><a href="<?php echo e($wa); ?>">WhatsApp</a></li>
                    </ul>
                    <h3 style="margin-top:18px"><?php echo e($t['portals']); ?></h3>
                    <ul>
                        <li><a href="<?php echo e($root); ?>/student/login.php"><?php echo e($t['student']); ?></a></li>
                        <li><a href="<?php echo e($root); ?>/teacher/login.php"><?php echo e($t['teacher']); ?></a></li>
                        <li><a href="<?php echo e($root); ?>/admin/index.php"><?php echo e($t['admin']); ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="legal">
                <span>&copy; <?php echo e($year); ?> Emergence Schools. <?php echo e($t['rights']); ?></span>
                <span><?php echo e($t['credit']); ?> <a href="https://bracadabrastudios.com/" rel="noopener">bracadabrastudios.com</a></span>
            </div>
        </div>
    </footer>

    <a class="wa" href="<?php echo e($wa); ?>" aria-label="<?php echo e($t['whatsapp']); ?>">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
    </a>

    <div id="lightbox" class="lightbox" hidden>
        <button type="button" class="lightbox-close" aria-label="<?php echo e($t['close']); ?>">&times;</button>
        <img alt="">
    </div>

    <script src="<?php echo e($root); ?>/assets/js/primary.js?v=1" defer></script>
</body>
</html>
