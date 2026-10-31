<?php
require_once dirname(__DIR__) . '/includes/portal.php';

$boot = emergence_portal_prepare('/pages/contact.php');
$lang = $boot['lang'];
$root = $boot['root'];
$token = emergence_csrf_token();
$wa = 'https://wa.me/237699353787?text=' . rawurlencode($lang === 'fr'
    ? 'Bonjour Emergence Logbessou, je voudrais vous écrire.'
    : 'Hello Emergence Logbessou, I would like to write to you.');
$title = $lang === 'fr' ? 'Contact — Emergence Logbessou' : 'Contact — Emergence Logbessou';
$desc = $lang === 'fr'
    ? 'Écrire à Emergence Logbessou, 10e avenue, Douala. Téléphone, WhatsApp et formulaire.'
    : 'Write to Emergence Logbessou, 10th Avenue, Douala. Phone, WhatsApp and the form.';

emergence_portal_begin($boot, $title, $desc, 'contact');
?>
    <div class="wrap page-intro">
        <p class="kicker"><?php echo $lang === 'fr' ? 'Contact · Logbessou' : 'Contact · Logbessou'; ?></p>
        <h1><?php echo $lang === 'fr' ? 'Écrire à l’école.' : 'Write to the school.'; ?></h1>
        <p class="lede"><?php echo $lang === 'fr'
            ? '10e avenue, Logbessou. Le secrétariat répond du lundi au vendredi, de 8 h à 17 h.'
            : '10th Avenue, Logbessou. The office answers Monday to Friday, 8:00–17:00.'; ?></p>
    </div>
    <section class="section">
        <div class="wrap split">
            <form class="card form" id="contact-form" action="<?php echo e($root); ?>/api/contact.php" method="post">
                <h2><?php echo $lang === 'fr' ? 'Un message' : 'A message'; ?></h2>
                <?php if ($token !== ''): ?>
                    <input type="hidden" name="csrf_token" value="<?php echo e($token); ?>">
                <?php endif; ?>
                <label><?php echo $lang === 'fr' ? 'Nom' : 'Name'; ?>
                    <input name="name" required autocomplete="name">
                </label>
                <label><?php echo $lang === 'fr' ? 'Courriel' : 'Email'; ?>
                    <input name="email" type="email" required autocomplete="email">
                </label>
                <label><?php echo $lang === 'fr' ? 'Téléphone' : 'Phone'; ?>
                    <input name="phone" type="tel" autocomplete="tel">
                </label>
                <label><?php echo $lang === 'fr' ? 'Sujet' : 'Subject'; ?>
                    <input name="subject" required>
                </label>
                <label><?php echo $lang === 'fr' ? 'Message' : 'Message'; ?>
                    <textarea name="message" rows="6" required></textarea>
                </label>
                <button class="btn btn-yellow" type="submit"><?php echo $lang === 'fr' ? 'Envoyer' : 'Send'; ?></button>
                <p class="form-note" id="form-note" role="status"></p>
            </form>
            <div>
                <article class="card">
                    <h2>Logbessou</h2>
                    <p><?php echo $lang === 'fr' ? '10e avenue, Douala' : '10th Avenue, Douala'; ?></p>
                    <p><a class="phone-link" href="tel:+237676332046">+237 676 332 046</a></p>
                    <p><a class="phone-link" href="tel:+237675261440">+237 675 261 440</a></p>
                    <p><a href="mailto:emergencecare@emergenceschools.org">emergencecare@emergenceschools.org</a></p>
                    <p><a href="https://maps.google.com/?q=Logbessou+10th+Avenue+Douala+Cameroon" rel="noopener"><?php echo $lang === 'fr' ? 'Carte' : 'Map'; ?></a></p>
                </article>
                <h3 class="follow-label"><?php echo e(emergence_labels($lang)['follow']); ?></h3>
                <?php emergence_social_row($wa); ?>
            </div>
        </div>
    </section>
    <script>
    document.getElementById('contact-form').addEventListener('submit', function (event) {
        event.preventDefault();
        var form = this;
        var note = document.getElementById('form-note');
        note.textContent = <?php echo json_encode($lang === 'fr' ? 'Envoi…' : 'Sending…'); ?>;
        fetch(form.action, { method: 'POST', body: new FormData(form), credentials: 'same-origin' })
            .then(function (response) { return response.json(); })
            .then(function (data) {
                note.textContent = (data && data.message) ? data.message : (data && data.success ? 'OK' : <?php echo json_encode($lang === 'fr' ? 'Le message n’est pas parti. Écrivez par WhatsApp.' : 'The message did not go. Write on WhatsApp.'); ?>);
                if (data && data.success) form.reset();
            })
            .catch(function () {
                note.textContent = <?php echo json_encode($lang === 'fr' ? 'Le message n’est pas parti. Écrivez par WhatsApp.' : 'The message did not go. Write on WhatsApp.'); ?>;
            });
    });
    </script>
<?php
emergence_portal_end($boot, $wa);
