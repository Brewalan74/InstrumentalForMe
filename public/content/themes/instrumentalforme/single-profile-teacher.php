<?php
the_post();
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

    <section>
        <div class="profileH2">
            <p>Vous êtes sur la page de profil de</p>
            <p><?= get_avatar(
                    $post->ID,
                    $size = 96,
                    $default = '',
                    $alt = '',
                    $args = null
                ); ?></p>
            <h2><?= get_the_title(); ?></h2>
        </div>

        <div class="profileDescription">
            <p><?= get_the_content(); ?></p>
        </div>

        <div class="profileInstrument">
            <h4><?= get_the_title(); ?> enseigne :</h4>
            <?php
            $teacherInstrument = get_the_terms(
                $post->ID,
                'instrument'
            );
            foreach ($teacherInstrument as $key => $value) : ?>
                <ul>
                    <li><?= $value->name; ?></li>
                </ul>

            <?php endforeach; ?>

        </div>
        <div class="profileCertificate">
            <h4>Les certificats de <?= get_the_title(); ?> sont :</h4>
            <?php
            $teacherCertificate = get_the_terms(
                $post->ID,
                'certificate'
            );
            // dump($teacherCertificate);
            // exit;
            foreach ($teacherCertificate as $key => $value) : ?>
                <ul>
                    <li><?= $value->name; ?></li>
                </ul>

            <?php endforeach; ?>
        </div>

        <div class="profileAppointment">
            <h4>Choisissez date et horaire de votre leçon</h4>
            <form action="">
                <input type="date" name="" id="">
                <input type="submit" value="Submit">
            </form>
        </div>

    </section>

    <!-- Footer-->
    <?php get_template_part('partials/footer.tpl'); ?>

    <!-- wp footer -->
    <?php get_footer(); ?>
</body>

</html>