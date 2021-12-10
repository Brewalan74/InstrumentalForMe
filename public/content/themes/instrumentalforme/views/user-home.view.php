<?php
the_post();
?>
<?php
//$test = get_terms();
//dump($test);  
//RENVOIE TAXO ASSOCIEES AU PROFIL CONNECTE

//$test = the_post();
// dump($test);    
//RENVOIE NULL 

//$test = get_field('description');
//dump($test);
// RENVOIE NULL

//$test = get_fields();
//dump($test);
//RENVOIE NULL

//$test = get_the_post_type_description();
//dump($test);
// RENVOIE ""

//$test = get_post_types();
//dump($test); 
//RENVOIE TABLEAU

//$args = array ('name' => 'profile-teacher');
//$test = get_post_types($args);
//dump($test); 
//RENVOIE TABLEAU "profile-teacher" => "profile-teacher"

//$test = get_role('teacher');
//dump($test);
// RENVOIE TABLEAU CAPABILITIES

//$test = have_posts();
//dump($test);
// RENVOIE TRUE

//$test = get_post_meta(get_the_ID(), 'teacher', true);
//dump($test);
// RENVOIE ""

//$test = get_the_content();
//dump($test);

//$current_user = wp_get_current_user();
//dump($current_user);
//$userdata = get_userdata($current_user->ID);
//dump($userdata);
//$userName = $userdata->description;
//dump($userName);
?>
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


    <?php
    $user = wp_get_current_user();
    $roles = $user->roles;

    if (in_array('teacher', $roles)) {
        $isTeacher = true;
    } else {
        $isTeacher = false;
    }

    if ($isTeacher) {
        echo '<section class="name-profil-perso text-center">
            <h1 class="profil-perso"> ';

        if (is_user_logged_in()) {
            $user = wp_get_current_user();
            echo "Bonjour " . $user->display_name;
            //dump($user);
        };
        '</h1>';
        echo '</section>
        
        <p class="text-center">';

        // affichage de l'avatar
        $avatar = get_field('avatar', 'user_' . $user->ID);
        if ($avatar) {
            echo '<img src="' . $avatar['url'] . '"/>';
        }

        '</p>

        <div>
        <p class="text-end mx-5"><a class="fs-5 text-end linkProfile" href="' . get_the_permalink() . '">Modifier votre profile</a></p>
        </div>


        <section class="m-5 text-center descriptionPerso">
            <p>';
        echo get_the_content();
        '</p>
        </section>';


        echo '<section class="m-5">
            <div class="container containerRecap">
            
            <ul class="recap m-5">
            <h3>Vos nouvelles demandes de RDV</h3>
                <li>Eleve / Date + Heure A DYNAMISER</li>
                <button type="button" class="btn btn-success">Valider</button>
                <button type="button" class="btn btn-danger">Refuser</button>
            </ul>
            
            <ul class="recap m-5">
            <h3>Liste de vos cours</h3>
                <li><a class="linkProfile"href="#">Cours 1 A DYNAMISER</a></li>
            </ul>
            
            <ul class="recap m-5">
            <h3>Liste de vos élèves</h3>
                <li><a class="linkProfile" href="#">Eleve 1 A DYNAMISER</a></li>
            </ul>
            
        </section>';
    } else {
        echo '<section class="text-center">
            <h1 class="m-5"> ';

        if (is_user_logged_in()) {
            $user = wp_get_current_user();
            echo "Bonjour " . $user->display_name;
            //dump($user);
        };
        '</h1>';

        echo '</section>

        <p class="text-center">';
        echo get_avatar(
            $post->ID,
            $size = 96,
            $default = '',
            $alt = '',
            $args = null
        );
        echo '</p>

        <div>
        <p class="text-end mx-5"><a class="fs-5 text-end linkProfile" href="' . get_the_permalink() . '">Modifier votre profile</a></p>
        </div>


        <section class="m-5 text-center descriptionPerso">
            <p>';
        echo get_the_content();
        '</p>
        </section>';


        echo '<section class="m-5">
            <div class="container containerRecap">
            
            <ul class="recap m-5">
            <h3>Vos prochains cours</h3>
                <li>Date - Heure - Prof A DYNAMISER</li>
                <button type="button" class="btn btn-danger">Annuler le RDV</button>
            </ul>
            
            <ul class="recap m-5">
            <h3>Vos professeurs</h3>
                <li><a class="linkProfile" href="#">Prof / instrument A DYNAMISER</a></li>
            </ul>
            
        </section>';
    }
    ?>


    <div>

        <!-- Footer-->
        <?php get_template_part('partials/footer.tpl'); ?>
    </div>
    <!-- wp footer -->
    <?php get_footer(); ?>
</body>

</html>