<?php
// echo __FILE__ . ':' . __LINE__;
// exit();
// the_post();
use Instrumental\Controllers\UserController;
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


    <h1 class="text-center m-5">Suppression de votre compte</h1>

    <div class="alert alert-danger p-5 m-5 text-center" role="alert">
        Votre compte a bien été supprimé !
        <br>
        <a href="<?= get_home_url(); ?>" class="text-dark">Revenir à l'accueil</a>
    </div>

    <?php
        //$current_user = wp_get_current_user();
        //wp_delete_user( $current_user->ID );
        //dump($current_user);
        if(is_user_logged_in()) {
            $user = wp_get_current_user();
            //dump($user->ID);
            $userId = $user->ID;
            //wp_delete_user($userId);
            //echo "Oh no ! " . $user->display_name . ' are you sure to wish to leave our beautiful community';
        }
    ?>







    <!-- Footer-->
    <?php get_template_part('partials/footer.tpl'); ?>

    <!-- wp footer -->
    <?php get_footer(); ?>


</body>

</html>