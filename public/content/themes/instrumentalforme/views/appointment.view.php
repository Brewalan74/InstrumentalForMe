<?php
// echo __FILE__ . ':' . __LINE__;
// exit();
$user = wp_get_current_user();
// dump($user->display_name);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Instrumental For Me!</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.icon" />

</head>

<body id="page-top">

    <!-- wp header -->
    <?php get_header(); ?>

    <!-- Navigation-->
    <?php get_template_part('partials/navbar.tpl'); ?>

    <!-- Header-->
    <?php get_template_part('partials/header.tpl'); ?>

    <?php if (!is_user_logged_in()) : ?>
        <h4 class="m-5"><a href="<?= wp_login_url() ?>">Vous devez etre connecté pour pouvoir prendre rendez-vous</a></h4>
    <?php else : ?>
        <h4 class="m-5">Merci <?= $user->display_name ?>, votre rendez-vous a bien été pris en compte.</h4>
    <?php endif; ?>
    <!-- Footer-->
    <?php get_template_part('partials/footer.tpl'); ?>

    <!-- wp footer -->
    <?php get_footer(); ?>
</body>

</html>