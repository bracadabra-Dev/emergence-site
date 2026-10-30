<?php
/**
 * Shared chrome for the group homepage and the primary section.
 * PHP 7.4. No database. Paths stay root-absolute so /primary and
 * /pages/primary.php both resolve CSS and pictures.
 */

if (!function_exists('e')) {
    function e($value) {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

function emergence_boot($fallback_script) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $lang_keys = array('primary_lang', 'lang', 'language', 'locale', 'current_lang', 'site_lang', 'user_lang');

    $script = isset($_SERVER['SCRIPT_NAME']) ? str_replace('\\', '/', $_SERVER['SCRIPT_NAME']) : $fallback_script;
    $root = rtrim(dirname(dirname($script)), '/');
    if ($root === '/' || $root === '.') {
        $root = '';
    }

    $request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $fallback_script;
    $clean_path = parse_url($request_uri, PHP_URL_PATH);
    if (!is_string($clean_path) || $clean_path === '' || $clean_path[0] !== '/') {
        $clean_path = $root . $fallback_script;
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

    return array(
        'lang' => $lang,
        'root' => $root,
        'clean_path' => $clean_path,
        'origin' => $origin,
        'canonical' => $origin . $clean_path,
        'page' => $root . '/pages',
        'img' => $root . '/assets/images/primary',
        'year' => date('Y'),
    );
}

function emergence_photo($root, $names) {
    $base = dirname(__DIR__);
    $dirs = array(
        array('assets/images/primary/leadership', $root . '/assets/images/primary/leadership/'),
        array('assets/images/staff', $root . '/assets/images/staff/'),
    );
    $exts = array('webp', 'jpg', 'jpeg', 'png');
    foreach ($dirs as $dir) {
        foreach ($names as $name) {
            foreach ($exts as $ext) {
                $file = $name . '.' . $ext;
                if (is_file($base . '/' . $dir[0] . '/' . $file)) {
                    return $dir[1] . $file;
                }
            }
        }
    }
    return '';
}

function emergence_labels($lang) {
    if ($lang === 'fr') {
        return array(
            'skip' => 'Aller au contenu',
            'brand' => 'Emergence',
            'brand_sub' => 'Maternelle · Primaire · Secondaire',
            'home' => 'Accueil',
            'excellence' => 'Excellence',
            'academic' => 'Académique',
            'physical' => 'Physique',
            'mental' => 'Mental',
            'schools' => 'Écoles',
            'primary' => 'Section primaire',
            'secondary' => 'Secondaire',
            'admissions' => 'Admissions',
            'apply' => 'Candidater',
            'fees' => 'Frais',
            'documents' => 'Documents',
            'news' => 'Actualités',
            'gallery' => 'Galerie',
            'contact' => 'Contact',
            'menu' => 'Menu',
            'foot_blurb' => 'Maternelle, primaire et secondaire à Douala, depuis 1995.',
            'foot_links' => 'Liens rapides',
            'foot_visit' => 'Venir',
            'portals' => 'Portails',
            'student' => 'Portail élève',
            'teacher' => 'Portail enseignant',
            'admin' => 'Administration',
            'credit' => 'Site par',
            'rights' => 'Tous droits réservés.',
            'whatsapp' => 'WhatsApp',
        );
    }
    return array(
        'skip' => 'Skip to content',
        'brand' => 'Emergence',
        'brand_sub' => 'Nursery · Primary · Secondary',
        'home' => 'Home',
        'excellence' => 'Excellence',
        'academic' => 'Academic',
        'physical' => 'Physical',
        'mental' => 'Mental',
        'schools' => 'Schools',
        'primary' => 'Primary',
        'secondary' => 'Secondary',
        'admissions' => 'Admissions',
        'apply' => 'Apply',
        'fees' => 'Fees',
        'documents' => 'Documents',
        'news' => 'News',
        'gallery' => 'Gallery',
        'contact' => 'Contact',
        'menu' => 'Menu',
        'foot_blurb' => 'Nursery, primary and secondary in Douala, since 1995.',
        'foot_links' => 'Quick links',
        'foot_visit' => 'Visit',
        'portals' => 'Portals',
        'student' => 'Student portal',
        'teacher' => 'Teacher portal',
        'admin' => 'Admin',
        'credit' => 'Site by',
        'rights' => 'All rights reserved.',
        'whatsapp' => 'WhatsApp',
    );
}

function emergence_header($ctx, $active) {
    $n = emergence_labels($ctx['lang']);
    $page = $ctx['page'];
    $path = $ctx['clean_path'];
    $img = $ctx['img'];
    $home = $page . '/index.php';
    $hash = ($active === 'home') ? '' : $home;
    $en_current = $ctx['lang'] === 'en' ? ' aria-current="true"' : '';
    $fr_current = $ctx['lang'] === 'fr' ? ' aria-current="true"' : '';
    $home_current = $active === 'home' ? ' aria-current="page"' : '';
    $primary_current = $active === 'primary' ? ' aria-current="page"' : '';
    ?>
    <a class="skip" href="#content"><?php echo e($n['skip']); ?></a>
    <header class="nav">
        <div class="wrap nav-bar">
            <a class="brand" href="<?php echo e($home); ?>">
                <img src="<?php echo e($img); ?>/sun.webp" width="400" height="188" alt="">
                <span>
                    <strong><?php echo e($n['brand']); ?></strong>
                    <small><?php echo e($n['brand_sub']); ?></small>
                </span>
            </a>
            <nav class="nav-links" aria-label="<?php echo e($n['brand']); ?>">
                <a href="<?php echo e($home); ?>"<?php echo $home_current; ?>><?php echo e($n['home']); ?></a>
                <div class="menu">
                    <a class="menu-label" href="<?php echo e($hash); ?>#academic"><?php echo e($n['excellence']); ?> <span class="caret" aria-hidden="true"></span></a>
                    <div class="menu-panel">
                        <a href="<?php echo e($hash); ?>#academic"><?php echo e($n['academic']); ?></a>
                        <a href="<?php echo e($hash); ?>#physical"><?php echo e($n['physical']); ?></a>
                        <a href="<?php echo e($hash); ?>#mental"><?php echo e($n['mental']); ?></a>
                    </div>
                </div>
                <div class="menu">
                    <a class="menu-label" href="<?php echo e($page); ?>/primary.php"><?php echo e($n['schools']); ?> <span class="caret" aria-hidden="true"></span></a>
                    <div class="menu-panel">
                        <a href="<?php echo e($page); ?>/primary.php"<?php echo $primary_current; ?>><?php echo e($n['primary']); ?></a>
                        <a href="<?php echo e($page); ?>/academics.php#secondary"><?php echo e($n['secondary']); ?></a>
                    </div>
                </div>
                <div class="menu">
                    <a class="menu-label" href="<?php echo e($page); ?>/admissions.php"><?php echo e($n['admissions']); ?> <span class="caret" aria-hidden="true"></span></a>
                    <div class="menu-panel">
                        <a href="<?php echo e($page); ?>/admissions.php"><?php echo e($n['apply']); ?></a>
                        <a href="<?php echo e($page); ?>/fees.php"><?php echo e($n['fees']); ?></a>
                        <a href="<?php echo e($page); ?>/documents.php"><?php echo e($n['documents']); ?></a>
                    </div>
                </div>
                <a href="<?php echo e($page); ?>/news.php"><?php echo e($n['news']); ?></a>
                <a href="<?php echo e($page); ?>/gallery.php"><?php echo e($n['gallery']); ?></a>
                <a href="<?php echo e($page); ?>/contact.php"><?php echo e($n['contact']); ?></a>
                <div class="langs">
                    <a class="lang" href="<?php echo e($path); ?>?lang=en" hreflang="en" lang="en" data-set-lang="en"<?php echo $en_current; ?>>EN</a>
                    <a class="lang" href="<?php echo e($path); ?>?lang=fr" hreflang="fr" lang="fr" data-set-lang="fr"<?php echo $fr_current; ?>>FR</a>
                </div>
            </nav>
            <details class="drawer">
                <summary class="drawer-btn" aria-label="<?php echo e($n['menu']); ?>">
                    <span class="bars" aria-hidden="true"><span></span><span></span><span></span></span>
                </summary>
                <div class="drawer-panel">
                    <a href="<?php echo e($home); ?>"<?php echo $home_current; ?>><?php echo e($n['home']); ?></a>
                    <p class="drawer-label"><?php echo e($n['excellence']); ?></p>
                    <a href="<?php echo e($hash); ?>#academic"><?php echo e($n['academic']); ?></a>
                    <a href="<?php echo e($hash); ?>#physical"><?php echo e($n['physical']); ?></a>
                    <a href="<?php echo e($hash); ?>#mental"><?php echo e($n['mental']); ?></a>
                    <p class="drawer-label"><?php echo e($n['schools']); ?></p>
                    <a href="<?php echo e($page); ?>/primary.php"<?php echo $primary_current; ?>><?php echo e($n['primary']); ?></a>
                    <a href="<?php echo e($page); ?>/academics.php#secondary"><?php echo e($n['secondary']); ?></a>
                    <p class="drawer-label"><?php echo e($n['admissions']); ?></p>
                    <a href="<?php echo e($page); ?>/admissions.php"><?php echo e($n['apply']); ?></a>
                    <a href="<?php echo e($page); ?>/fees.php"><?php echo e($n['fees']); ?></a>
                    <a href="<?php echo e($page); ?>/documents.php"><?php echo e($n['documents']); ?></a>
                    <a href="<?php echo e($page); ?>/news.php"><?php echo e($n['news']); ?></a>
                    <a href="<?php echo e($page); ?>/gallery.php"><?php echo e($n['gallery']); ?></a>
                    <a href="<?php echo e($page); ?>/contact.php"><?php echo e($n['contact']); ?></a>
                    <div class="drawer-langs">
                        <a href="<?php echo e($path); ?>?lang=en" hreflang="en" data-set-lang="en"<?php echo $en_current; ?>>EN</a>
                        <a href="<?php echo e($path); ?>?lang=fr" hreflang="fr" data-set-lang="fr"<?php echo $fr_current; ?>>FR</a>
                    </div>
                </div>
            </details>
        </div>
    </header>
    <?php
}

function emergence_footer($ctx, $wa) {
    $n = emergence_labels($ctx['lang']);
    $page = $ctx['page'];
    $root = $ctx['root'];
    ?>
    <footer class="footer">
        <div class="wrap">
            <div class="footer-grid">
                <div>
                    <h2><?php echo e($n['brand']); ?></h2>
                    <p><?php echo e($n['foot_blurb']); ?></p>
                    <p><a href="tel:+237675261440">+237 675 261 440</a><br><a href="tel:+237676332046">+237 676 332 046</a></p>
                </div>
                <div>
                    <h3><?php echo e($n['foot_links']); ?></h3>
                    <ul>
                        <li><a href="<?php echo e($page); ?>/index.php"><?php echo e($n['home']); ?></a></li>
                        <li><a href="<?php echo e($page); ?>/primary.php"><?php echo e($n['primary']); ?></a></li>
                        <li><a href="<?php echo e($page); ?>/academics.php#secondary"><?php echo e($n['secondary']); ?></a></li>
                        <li><a href="<?php echo e($page); ?>/admissions.php"><?php echo e($n['admissions']); ?></a></li>
                        <li><a href="<?php echo e($page); ?>/fees.php"><?php echo e($n['fees']); ?></a></li>
                        <li><a href="<?php echo e($page); ?>/documents.php"><?php echo e($n['documents']); ?></a></li>
                        <li><a href="<?php echo e($page); ?>/contact.php"><?php echo e($n['contact']); ?></a></li>
                    </ul>
                </div>
                <div>
                    <h3><?php echo e($n['foot_visit']); ?></h3>
                    <ul>
                        <li><a href="https://www.facebook.com/emergenceschools" rel="noopener">Facebook</a></li>
                        <li><a href="https://www.instagram.com/emergenceschools/" rel="noopener">Instagram</a></li>
                        <li><a href="https://www.linkedin.com/company/emergence-bilingualnursery-and-primary-school/about/" rel="noopener">LinkedIn</a></li>
                        <li><a href="<?php echo e($wa); ?>"><?php echo e($n['whatsapp']); ?></a></li>
                    </ul>
                    <h3 class="footer-next"><?php echo e($n['portals']); ?></h3>
                    <ul>
                        <li><a href="<?php echo e($root); ?>/student/login.php"><?php echo e($n['student']); ?></a></li>
                        <li><a href="<?php echo e($root); ?>/teacher/login.php"><?php echo e($n['teacher']); ?></a></li>
                        <li><a href="<?php echo e($root); ?>/admin/index.php"><?php echo e($n['admin']); ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="legal">
                <span>&copy; <?php echo e($ctx['year']); ?> Emergence Schools. <?php echo e($n['rights']); ?></span>
                <span><?php echo e($n['credit']); ?> <a href="https://bracadabrastudios.com/" rel="noopener">bracadabrastudios.com</a></span>
            </div>
        </div>
    </footer>
    <a class="wa" href="<?php echo e($wa); ?>" aria-label="<?php echo e($n['whatsapp']); ?>">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
    </a>
    <?php
}
