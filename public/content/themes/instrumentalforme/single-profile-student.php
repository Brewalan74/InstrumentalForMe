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
            <p class="profileView">Vous êtes sur la page de profil de</p>
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
            <h4><?= get_the_title(); ?> aime :</h4>
            <?php
            $studentMusicStyle = get_the_terms(
                $post->ID,
                'music-style'
            );
            foreach ($studentMusicStyle as $key => $value) : ?>
                <ul>
                    <h6 class="profileMusicStyle_ul-p"><a href="<?= get_term_link($value->term_id); ?>"><?= $value->name; ?></a></h6>
                    <p class="taxoLayout"><?= substr($value->description, 0, 500) . '...'; ?></p>
                </ul>
            <?php endforeach; ?>

        </div>

    </section>

    <!-- Footer-->
    <?php get_template_part('partials/footer.tpl'); ?>

    <!-- wp footer -->
    <?php get_footer(); ?>
</body>

</html>