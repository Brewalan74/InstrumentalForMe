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
            <h2><?= get_the_title(); ?></h2>
        </div>

        <div class="profileDescription">
            <p><?= get_the_content(); ?></p>
        </div>

        <div class="profileTeacherInstrument">
            <p><?= get_the_title(); ?> enseigne :</p>
            <?php
            $teacherInstrument = get_the_terms(
                $post->ID,
                'instrument'
            );
            $instrumentsName = join(', ', wp_list_pluck($teacherInstrument, 'name'));
            ?>
            <p><?= $instrumentsName; ?></p>
        </div>

    </section>

    <!-- Footer-->
    <?php get_template_part('partials/footer.tpl'); ?>

    <!-- wp footer -->
    <?php get_footer(); ?>
</body>

</html>