<?php
the_post();

$teacherInstrument = get_the_terms(
    $post->ID,
    'instrument'
);


// $term = get_queried_object();
// $termId = $term->term_id;
// $taxonomyImage = get_field('picture', 'instrument_' . $termId);
// dump($term);
// dump($taxonomyImage['url']);
//exit;
?>

<!DOCTYPE html>
<html lang="<?= get_bloginfo('language'); ?>">

<head>

    <!-- wp header -->
    <?php get_header(); ?>
</head>

<body id="page-top">


    <!-- Navigation-->
    <?php get_template_part('partials/navbar.tpl'); ?>

    <!-- Header-->
    <?php get_template_part('partials/header.tpl'); ?>

    <div class="container">

        <section>
            <div class="profileH2">
                <p class="profileView">Vous êtes sur la page de profil de</p>
                <p><?= get_avatar(
                        $post->ID,
                        $size = 96,
                        $default = '',
                        $alt = '',
                        $args = null
                    ); ?></p>
                <h2><?= get_the_author(); ?></h2>
            </div>
            <div class="profileDescription">
                <p><?= get_the_content(); ?></p>
            </div>
            <div>
                <p class="center">Vous souhaitez prendre une leçon avec <?= get_the_author(); ?> ?</p>
                <h4>Choisissez date et horaire de votre leçon</h4>
                <form action="#">
                    <label for="instrument">Instrument que vous souhaitez apprendre : </label><br>
                    <select name="instrument" id="instrument">
                        <?php foreach ($teacherInstrument as $key => $value) : ?>
                            <option value="<?= $value->name; ?>"><?= $value->name; ?></option>
                        <?php endforeach; ?>
                    </select><br>
                    <label class="appointmentForm" for="date">Date souhaitée :</label><br>
                    <input type="date" name="date" id="date"><br>
                    <label class="appointmentForm" for="time">Horaire souhaitée :</label><br>
                    <input type="time" name="time" id="time"><br>
                    <input class="appointmentForm" type="submit" value="Validez">
                </form>
            </div>
            <div class="profileInstrument">
                <h4><?= get_the_author(); ?> enseigne :</h4>
                <?php
                foreach ($teacherInstrument as $key => $value) :
                    $taxonomyImageData = get_field('picture', 'instrument_' . $value->term_id);
                    $taxonomyImage = $taxonomyImageData['url']; ?>
                    <!-- <ul>
                        <li><?= $value->name; ?></li>
                    </ul> -->
                    <section class="instrument-container">
                        <div class="container px-5">
                            <div class="row gx-5 align-items-center instrument">
                                <div class="col-lg-6 order-lg-2">
                                    <div class="p-5 instrument__picture" style="background-image: url(<?= $taxonomyImage; ?>)"></div>
                                </div>
                                <div class="col-lg-6 order-lg-1 instrument__description">
                                    <div class="p-5">
                                        <h2 class="display-4"><a href="<?= get_term_link($value->term_id); ?>"><?= $value->name; ?></a></h2>
                                        <p><?= substr($value->description, 0, 500) . '...'; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endforeach; ?>
            </div>
            <div class="profileInstrument">
                <h4><?= get_the_author(); ?> aime :</h4>
                <?php
                $teacherMusicStyle = get_the_terms(
                    $post->ID,
                    'music-style'
                ); ?>
                <ul>
                    <?php if (!isset($teacherMusicStyle)) : ?>
                        <?php foreach ($teacherMusicStyle as $key => $value) : ?>
                            <h6 class="profileMusicStyle_ul-p"><a href="<?= get_term_link($value->term_id); ?>"><?= $value->name; ?></a></h6>
                            <p class="taxoLayout"><?= substr($value->description, 0, 500) . '...'; ?></p>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p class="taxoLayout"><?= get_the_author(); ?> n'a pas de style de musique sélectionné...</p>
                    <?php endif ?>
                </ul>
            </div>
            <div class="profileCertificate">
                <h4>Les certificats de <?= get_the_author(); ?> :</h4>
                <?php
                $teacherCertificate = get_the_terms(
                    $post->ID,
                    'certificate'
                ); ?>
                <ul>
                    <?php foreach ($teacherCertificate as $key => $value) : ?>
                        <h6 class="profileCertificate_ul-p"><a href="<?= get_term_link($value->term_id); ?>"><?= $value->name; ?></a></h6>
                        <p class="taxoLayout"><?= substr($value->description, 0, 500) . '...'; ?></p>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>
    </div>

    <!-- Footer-->
    <?php get_template_part('partials/footer.tpl'); ?>

    <!-- wp footer -->
    <?php get_footer(); ?>
</body>

</html>