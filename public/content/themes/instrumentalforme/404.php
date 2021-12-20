<!DOCTYPE html>
<html lang="<?= get_bloginfo('language'); ?>">

<head>
    <!-- wp header -->
    <?php get_header(); ?>
</head>

<body>
    <!-- Navigation-->
    <?php get_template_part('partials/navbar.tpl'); ?>

    <!-- Header-->
    <?php get_template_part('partials/header.tpl'); ?>

    <div class="container img404">

        <img src="<?= get_theme_file_uri('assets/image/img404.png') ?>">

    </div>


    <section>
        <!-- Footer-->
        <?php get_template_part('partials/footer.tpl'); ?>
        <!-- wp footer -->
        <?php get_footer(); ?>
    </section>
</body>

</html>