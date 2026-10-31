<?php
require_once dirname(__DIR__) . '/includes/portal.php';

$boot = emergence_portal_prepare('/pages/admissions.php');
$lang = $boot['lang'];
$page = $boot['page'];
$wa_text = $lang === 'fr'
    ? 'Bonjour Emergence Logbessou, je voudrais inscrire un enfant.'
    : 'Hello Emergence Logbessou, I would like to enrol a child.';
$wa = 'https://wa.me/237699353787?text=' . rawurlencode($wa_text);

$copy = $lang === 'fr' ? array(
    'title' => 'Admissions — Emergence Logbessou',
    'desc' => 'Comment demander une place à Emergence Logbessou : le dossier, le paiement et les bus.',
    'kicker' => 'Admissions · Logbessou',
    'h' => 'Demander une place.',
    'lede' => 'La maternelle, le primaire et le secondaire sont sur le même campus, 10e avenue. On commence par un dossier, puis une conversation.',
    'steps_title' => 'Le dossier',
    'steps' => array(
        array('Obtenir le formulaire', 'Passez à l’école ou écrivez-nous pour recevoir le formulaire.'),
        array('Le remplir', 'Indiquez l’enfant, la classe et la voie : bilingue, française ou anglophone.'),
        array('Joindre les pièces', 'Acte de naissance, dossier de l’école précédente, photos d’identité.'),
        array('L’entretien', 'Un entretien ou une évaluation, si la classe le demande.'),
        array('La réponse', 'L’école confirme la place et indique comment payer.'),
        array('Le paiement', 'Le règlement confirme la place. Le nom de l’enfant et la classe vont dans la référence.'),
    ),
    'pay_title' => 'Payer',
    'pay_text' => 'L’école accepte MTN Mobile Money et Orange Money. Les numéros se demandent au secrétariat, pour qu’ils restent à jour.',
    'mtn' => 'MTN Mobile Money',
    'om' => 'Orange Money',
    'ask' => 'Demander les numéros',
    'pay_note' => 'Écrivez le nom de l’enfant et la classe dans la référence du paiement.',
    'bus_title' => 'Les bus',
    'bus_text' => 'Les chauffeurs sont formés par l’école. Le parc dessert Douala pour que la journée commence à l’heure.',
    'fees' => 'Voir les frais',
    'docs' => 'Les documents',
    'places' => array('Deido', 'Bonamoussadi', 'Kotto', 'Lendi', 'Makepe', 'Omnisport', 'Nyalla', 'PK 10', 'PK 12–21', 'Cité des Palmiers', 'Hôpital Général', 'Ndongbong', 'Logbessou', 'Logpom', 'Yassa', 'Japoma', 'Bangue', 'Akwa', 'Mboppi'),
) : array(
    'title' => 'Admissions — Emergence Logbessou',
    'desc' => 'How to ask for a place at Emergence Logbessou: the file, payment, and the buses.',
    'kicker' => 'Admissions · Logbessou',
    'h' => 'Ask for a place.',
    'lede' => 'Nursery, primary and secondary share one campus on 10th Avenue. A place starts with a file, then a conversation.',
    'steps_title' => 'The file',
    'steps' => array(
        array('Get the form', 'Come to the school or write to us for the application form.'),
        array('Fill it in', 'Name the child, the class, and the path: bilingual, French or Anglophone.'),
        array('Add the papers', 'Birth certificate, the previous school’s record, passport photographs.'),
        array('The interview', 'An interview or an assessment, if the class asks for one.'),
        array('The decision', 'The school confirms the place and says how to pay.'),
        array('The payment', 'Payment holds the place. The child’s name and class go in the reference.'),
    ),
    'pay_title' => 'Payment',
    'pay_text' => 'The school accepts MTN Mobile Money and Orange Money. Ask the office for the current numbers, so they stay up to date.',
    'mtn' => 'MTN Mobile Money',
    'om' => 'Orange Money',
    'ask' => 'Ask for the numbers',
    'pay_note' => 'Put the child’s name and class in the payment reference.',
    'bus_title' => 'The buses',
    'bus_text' => 'Drivers are trained in-house. The fleet covers Douala so the day can start on time.',
    'fees' => 'See the fees',
    'docs' => 'Documents',
    'places' => array('Deido', 'Bonamoussadi', 'Kotto', 'Lendi', 'Makepe', 'Omnisport', 'Nyalla', 'PK 10', 'PK 12–21', 'Cité des Palmiers', 'Hôpital Général', 'Ndongbong', 'Logbessou', 'Logpom', 'Yassa', 'Japoma', 'Bangue', 'Akwa', 'Mboppi'),
);

emergence_portal_begin($boot, $copy['title'], $copy['desc'], 'admissions');
?>
    <div class="wrap page-intro">
        <p class="kicker"><?php echo e($copy['kicker']); ?></p>
        <h1><?php echo e($copy['h']); ?></h1>
        <p class="lede"><?php echo e($copy['lede']); ?></p>
        <div class="actions">
            <a class="btn btn-yellow" href="<?php echo e($page); ?>/fees.php"><?php echo e($copy['fees']); ?></a>
            <a class="btn btn-blue" href="<?php echo e($wa); ?>">WhatsApp</a>
            <a class="btn btn-line" href="tel:+237676332046"><?php echo $lang === 'fr' ? 'Appeler Logbessou' : 'Call Logbessou'; ?></a>
        </div>
    </div>
    <section class="section">
        <div class="wrap">
            <h2><?php echo e($copy['steps_title']); ?></h2>
            <div class="methods">
                <?php foreach ($copy['steps'] as $i => $step): ?>
                    <article class="card">
                        <span class="index"><?php echo str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT); ?></span>
                        <h3><?php echo e($step[0]); ?></h3>
                        <p><?php echo e($step[1]); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="section section-alt">
        <div class="wrap">
            <h2><?php echo e($copy['pay_title']); ?></h2>
            <p class="intro"><?php echo e($copy['pay_text']); ?></p>
            <div class="cards-2">
                <article class="card">
                    <h3><?php echo e($copy['mtn']); ?></h3>
                    <p><a href="<?php echo e($page); ?>/contact.php"><?php echo e($copy['ask']); ?></a></p>
                </article>
                <article class="card">
                    <h3><?php echo e($copy['om']); ?></h3>
                    <p><a href="<?php echo e($page); ?>/contact.php"><?php echo e($copy['ask']); ?></a></p>
                </article>
            </div>
            <p class="note"><?php echo e($copy['pay_note']); ?></p>
            <p><a class="btn btn-line" href="<?php echo e($page); ?>/documents.php"><?php echo e($copy['docs']); ?></a></p>
        </div>
    </section>
    <section class="section">
        <div class="wrap">
            <h2><?php echo e($copy['bus_title']); ?></h2>
            <p class="intro"><?php echo e($copy['bus_text']); ?></p>
            <ul class="places">
                <?php foreach ($copy['places'] as $place): ?>
                    <li><?php echo e($place); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
<?php
emergence_portal_end($boot, $wa);
