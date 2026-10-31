<?php
require_once dirname(__DIR__) . '/includes/portal.php';

$boot = emergence_portal_prepare('/pages/gallery.php');
$lang = $boot['lang'];
$root = $boot['root'];
$img = $boot['img'];
$sec = $root . '/assets/images/secondary';
$fr = $lang === 'fr';

$shots = array(
    array($img . '/hero.webp', $fr ? 'Graduation de maternelle' : 'Kindergarten graduation', $fr ? 'La première cérémonie.' : 'The first ceremony.'),
    array($img . '/culture.webp', $fr ? 'Journée culturelle' : 'Cultural day', $fr ? 'Danse, dans les plus jeunes classes.' : 'Dance, in the younger classes.'),
    array($sec . '/visit.webp', $fr ? 'Une visite' : 'A visit', $fr ? 'Des élèves du secondaire reçoivent un hôte.' : 'Secondary students receive a guest.'),
    array($sec . '/basketball.webp', $fr ? 'Basket' : 'Basketball', $fr ? 'Le sport du secondaire, sur le terrain.' : 'Secondary sport, on the yard.'),
    array($sec . '/lesson.webp', $fr ? 'Un cours' : 'A lesson', $fr ? 'Le secondaire, aux tables.' : 'Secondary, at the desks.'),
    array($sec . '/lab.webp', $fr ? 'La salle informatique' : 'The computer room', $fr ? 'Un enseignant avec deux élèves.' : 'A teacher with two students.'),
    array($sec . '/board.webp', $fr ? 'La correction' : 'The correction', $fr ? 'Le devoir, repris au tableau.' : 'The assignment, taken up at the board.'),
    array($img . '/medals.webp', $fr ? 'Une journée d’école' : 'A school day', $fr ? 'Le personnel, aux couleurs de l’école.' : 'Staff, in the school colours.'),
    array($img . '/campus.webp', $fr ? 'Le campus' : 'The campus', $fr ? '10e avenue, Logbessou.' : '10th Avenue, Logbessou.'),
    array($sec . '/staff.webp', $fr ? 'L’équipe' : 'The team', $fr ? 'Devant l’école.' : 'In front of the school.'),
    array($img . '/flyer-en.webp', $fr ? 'Le dépliant' : 'The flyer', $fr ? 'L’année, sur une feuille.' : 'The year, on one sheet.'),
);

$pdo = emergence_portal_pdo();
if ($pdo) {
    $table = emergence_portal_find_table($pdo, array('gallery', 'gallery_images', 'photos'));
    if ($table !== '') {
        foreach (emergence_portal_rows($pdo, $table) as $row) {
            $image = emergence_field($row, array('image_path', 'image', 'photo', 'file_path'));
            if ($image === '' || stripos($image, 'unsplash') !== false) {
                continue;
            }
            if (strpos($image, 'http') !== 0) {
                $image = $root . '/' . ltrim($image, '/');
            }
            $shots[] = array(
                $image,
                (string) emergence_field($row, array('caption', 'title', 'name')),
                (string) emergence_field($row, array('category', 'description')),
            );
        }
    }
}

$wa = 'https://wa.me/237699353787';
$title = $fr ? 'Galerie — Emergence Logbessou' : 'Gallery — Emergence Logbessou';
emergence_portal_begin($boot, $title, $fr
    ? 'La vie à Emergence Logbessou : classe, sport, visite et campus.'
    : 'Life at Emergence Logbessou: class, sport, a visit, and the campus.', 'gallery');
?>
    <div class="wrap page-intro">
        <p class="kicker"><?php echo $fr ? 'Galerie · Logbessou' : 'Gallery · Logbessou'; ?></p>
        <h1><?php echo $fr ? 'Chaque image, une activité.' : 'Each picture is an activity.'; ?></h1>
        <p class="lede"><?php echo $fr
            ? 'Maternelle, primaire et secondaire, sur le même campus. Ouvrez une image pour la voir en grand.'
            : 'Nursery, primary and secondary, on the same campus. Open a picture to see it large.'; ?></p>
    </div>
    <section class="section">
        <div class="wrap moments">
            <?php foreach ($shots as $i => $shot): ?>
                <figure class="moment<?php echo $i === 0 ? ' moment-lead' : ''; ?>">
                    <a class="shot" href="<?php echo e($shot[0]); ?>" data-alt="<?php echo e($shot[1] . '. ' . $shot[2]); ?>">
                        <img src="<?php echo e($shot[0]); ?>" alt="<?php echo e($shot[1]); ?>" loading="<?php echo $i === 0 ? 'eager' : 'lazy'; ?>" decoding="async">
                    </a>
                    <figcaption><strong><?php echo e($shot[1]); ?></strong> <?php echo e($shot[2]); ?></figcaption>
                </figure>
            <?php endforeach; ?>
        </div>
    </section>
    <div id="lightbox" class="lightbox" hidden>
        <button type="button" class="lightbox-close" aria-label="<?php echo $fr ? 'Fermer' : 'Close'; ?>">&times;</button>
        <img alt="">
    </div>
<?php
emergence_portal_end($boot, $wa);
