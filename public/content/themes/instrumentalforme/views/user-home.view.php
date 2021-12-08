<!DOCTYPE html>
<!-- STEP E7 THEME déclaration de la langue utilisée sur le site //-->
<html lang="<?=get_bloginfo('language');?>">

<head>
    <?php
    get_header();
    ?>
</head>

<body>
    <!--================================================================================-->

    <main>
        <?php
            get_template_part('partials/header-nav.tpl');
        ?>
        <!--================================================================================-->


        <?php
        /*$backgroundImage = get_theme_mod('hero-picture');

        $style = '';
        if($backgroundImage) {
            $style = 'background:' .
                'radial-gradient(circle, rgba(255, 255, 255, 0.5) 45%, rgba(136, 81, 133, 0.5) 100%),' .
                'linear-gradient(100deg, aqua 0%, rgba(0, 255, 255, 0) 100%),'.
                'url(' . $backgroundImage . ')'
            ;
        }*/
        ?>

        <section class="hero">
            <h1 class="hero__title">
                <?php
                    if(is_user_logged_in()) {
                        $user = wp_get_current_user();
                        echo "Content de vous revoir " . $user->display_name;
                    }
                ?>
            </h1>


        </section>



    </main>

    <footer class="section footer">
        <?php
           /* get_template_part('partials/footer-about.tpl');
            get_template_part('partials/footer-menu.tpl');
            get_template_part('partials/footer-social-links.tpl');  */
        ?>
    </footer>

    <?php
    get_footer();
    ?>
</body>
</html>