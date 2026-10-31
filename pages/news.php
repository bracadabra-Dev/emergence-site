<?php
require_once dirname(__DIR__) . '/includes/portal.php';

$boot = emergence_portal_prepare('/pages/news.php');
$lang = $boot['lang'];
$root = $boot['root'];
$pdo = emergence_portal_pdo();
$rows = array();
if ($pdo) {
    $table = emergence_portal_find_table($pdo, array('news_events', 'news', 'announcements', 'events'));
    if ($table !== '') {
        $rows = emergence_portal_rows($pdo, $table);
    }
}
$wa = 'https://wa.me/237699353787?text=' . rawurlencode('Hello Emergence Logbessou');
$title = $lang === 'fr' ? 'Actualités — Emergence Logbessou' : 'News — Emergence Logbessou';
$desc = $lang === 'fr'
    ? 'Annonces et dates publiées par Emergence Logbessou.'
    : 'Announcements and dates published by Emergence Logbessou.';

emergence_portal_begin($boot, $title, $desc, 'news');
?>
    <div class="wrap page-intro">
        <p class="kicker"><?php echo $lang === 'fr' ? 'Actualités · Logbessou' : 'News · Logbessou'; ?></p>
        <h1><?php echo $lang === 'fr' ? 'Ce que l’école publie.' : 'What the school publishes.'; ?></h1>
        <p class="lede"><?php echo $lang === 'fr'
            ? 'Les annonces viennent du portail. Quand le secrétariat en ajoute une, elle apparaît ici.'
            : 'Announcements come from the portal. When the office adds one, it appears here.'; ?></p>
    </div>
    <section class="section">
        <div class="wrap">
            <?php if (!$rows): ?>
                <p class="intro"><?php echo $lang === 'fr'
                    ? 'Rien de nouveau n’est affiché pour le moment. Les cérémonies, les réunions de parents et les dates de classe passent par cette page dès qu’elles sont publiées.'
                    : 'Nothing new is on the board just now. Ceremonies, parent meetings and class dates come through this page once they are published.'; ?></p>
            <?php else: ?>
                <div class="news-list">
                    <?php foreach ($rows as $row): ?>
                        <?php
                        $headline = emergence_field($row, array('title', 'name', 'headline'));
                        $body = emergence_field($row, array('content', 'body', 'excerpt', 'description', 'summary'));
                        $when = emergence_field($row, array('event_date', 'published_at', 'date', 'created_at'));
                        $kind = emergence_field($row, array('category', 'type'));
                        $image = emergence_field($row, array('image_path', 'image', 'photo'));
                        if ($image !== '' && strpos($image, 'http') !== 0 && strpos($image, '//') !== 0) {
                            $image = $root . '/' . ltrim($image, '/');
                        }
                        ?>
                        <article class="card news-card">
                            <?php if ($image !== '' && stripos($image, 'unsplash') === false): ?>
                                <img src="<?php echo e($image); ?>" alt="" loading="lazy" decoding="async">
                            <?php endif; ?>
                            <?php if ($kind !== '' || $when !== ''): ?>
                                <p class="since"><?php echo e(trim($kind . ' ' . $when)); ?></p>
                            <?php endif; ?>
                            <h2><?php echo e($headline); ?></h2>
                            <?php if ($body !== ''): ?><p><?php echo e($body); ?></p><?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php
emergence_portal_end($boot, $wa);
