<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container px-5">
        <a class="navbar-brand homeLayout" href="<?= get_home_url(); ?>">Accueil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">

                <?php
                if (!is_user_logged_in()) : ?>
                    <li class="navbarLayout-li"><a href="<?= wp_login_url() ?>">Se connecter</a></li>
                    <li class="navbarLayout-li"><a href="<?= wp_registration_url() ?>">S'inscrire</a></li>
                <?php else :
                    $user = wp_get_current_user();
                    global $router;
                    if (in_array('teacher', $user->roles)) {
                        $url = $router->generate('user-home');
                    } else {
                        $url = $router->generate('user-home');
                    }
                ?>
                    <li class="navbarLayout-li"><a href="<?= $url ?>">Mon profil</a></li>
                    <li class="navbarLayout-li"><a href="<?= wp_logout_url() ?>">Se déconnecter</a></li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>