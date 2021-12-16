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



    <?php
    $current_user = wp_get_current_user();
    $userdata = get_userdata($current_user->ID);
    $userName = $userdata->description;
    // dump(__FILE__ . ':' . __LINE__, $userName);
    ?>

    <h2 class="profileH2">Modifier votre profil</h2>

    <section>

        <form method="post">
            <input type="hidden" name="update-profile" readonly value="1">
            <div class="containerUpdate">
                <p>
                    <label for="username" class='labelForm'>Username</label>
                    <input type="text" name="name" id="username" class="input" value="<?= $userdata->user_nicename ?>" size="20" autocapitalize="off" readonly>
                </p>
                <?php if ($userdata->first_name) : ?>
                    <p>
                        <label for="user_firstname" class='labelForm'>Votre Prénom</label>
                        <input type="text" name="user_firstname" id="user_firstname" class="input" value="<?= $userdata->first_name ?>" size="20" autocapitalize="off">
                    </p>
                <?php else : ?>
                    <p>
                        <label for="user_firstname" class='labelForm'>Votre Prénom</label>
                        <input type="text" name="user_firstname" id="user_firstname" class="input" value="" size="20" autocapitalize="off">
                    </p>
                <?php endif; ?>
                <?php if ($userdata->last_name) : ?>
                    <p>
                        <label for="user_firstname" class='labelForm'>Votre Nom</label>
                        <input type="text" name="user_lastname" id="user_lastname" class="input" value="<?= $userdata->last_name ?>" size="20" autocapitalize="off">
                    </p>
                <?php else : ?>
                    <p>
                        <label for="user_firstname" class='labelForm'>Votre Nom</label>
                        <input type="text" name="user_lastname" id="user_lastname" class="input" value="" size="20" autocapitalize="off">
                    </p>
                <?php endif; ?>
            </div>

            <div class="containerUpdate">
                <p>
                    <label for="user_email" class='labelForm'>Votre email</label>
                    <input type="email" name="user_email" id="user_email" class="input" value="<?= $userdata->data->user_email ?>" size="20" autocapitalize="off">
                </p>
                <p>
                    <label for="user_password" class='labelForm'>Nouveau mot de passe</label>
                    <input type="password" name="user_password" id="user_password" class="input" value="" size="20" autocapitalize="off">
                </p>
                <p>
                    <label for="user_password_confirmation" class='labelForm'>Confirmer nouveau mot de passe</label>
                    <input type="password" name="user_password_confirmation" id="user_password_confirmation" class="input" value="" size="20" autocapitalize="off">
                </p>
            </div>

            <div class="containerUpdate">
                <p>
                    <label for="user_description" class='labelForm'>Votre description</label><br>
                    <textarea name="user_description" id="user_description" class="textareaDescription" size="250" autocapitalize="off"><?= $userdata->description ?></textarea>
                </p>
            </div>

            <!-- <div class="containerUpdateRadio">
                <input type="radio" id="teacher" name="user_type" value="teacher" onclick="viewCertificate()">
                <label for="teacher">Teacher</label>
                <input type="radio" id="student" name="user_type" value="student" onclick="viewCertificate()">
                <label for="student">Student</label>
            </div>  -->

            <div class="containerUpdate">
                <?php
                //CERTIFICAT TEACHER
                $user = wp_get_current_user();
                $roles = $user->roles;



                // ===========================================================
                // récupération des taxo du user

                $query = new WP_Query([
                    'author' => $user->ID,
                    'post_type' => 'teacher-profile'
                ]);


                $profileId = $query->posts[0]->ID;
               // dump($profileId);
                $instrumentsId = [];
                $selectedInstruments = wp_get_post_terms($profileId, 'instrument');
                foreach ($selectedInstruments as $term) {
                    $instrumentsId[$term->term_id] = true;
                }

                $selectedCertificates = wp_get_post_terms($profileId, 'certificate');
                $certificatesId = [];
                foreach ($selectedCertificates as $term) {
                    $certificatesId[$term->term_id] = true;
                }


                $selectedStyles = wp_get_post_terms($profileId, 'music-style');
                $stylesId = [];
                foreach ($selectedStyles as $term) {
                    $stylesId[$term->term_id] = true;
                }

                // ===========================================================


                if (in_array('teacher', $roles)) {
                    $isTeacher = true;
                    echo "<div id='certificate' class='containerUpdateRadio'>";
                    echo "<label class='labelForm'>Vos certificats</label><br>";
                    $certificates = get_terms('certificate', array('hide_empty' => false));

                    foreach ($certificates as $index => $certificate) :

                        $checked = '';
                        if (isset($certificatesId[$certificate->term_id])) {
                            $checked = 'checked';
                        }

                        echo "<input type='checkbox' id='certif' $index  name='certificate[]' value='$certificate->term_id' $checked>";
                        echo "<label for='certif' $index>";
                        echo $certificate->name;
                        echo "</label><br>";
                    endforeach;
                    echo '</div>';
                } else {
                }


                // INSTRUMENTS    
                echo "<div id='instrument' class='containerUpdateRadio'>";
                echo "<br><label class='labelForm'>Vos instruments</label><br>";
                $instruments = get_terms('instrument', array('hide_empty' => false));
                //dump($instruments);



                foreach ($instruments as $index => $instrument) :

                    $checked = '';
                    if (isset($instrumentsId[$instrument->term_id])) {
                        $checked = 'checked';
                    }

                    echo "<input type='checkbox' class='instru' $index name='instrument[]' value='$instrument->term_id' " . $checked . ">";
                    echo "<label for='instru' $index>";
                    echo $instrument->name;
                    echo "</label><br>";
                endforeach;
                echo '</div>';


                //MUSIC STYLE
                echo "<div id='musicStyle' class='containerUpdateRadio'>";
                echo "<br><label class='labelForm'>Vos styles de musique</label><br>";
                $musicStyles = get_terms('music-style', array('hide_empty' => false));
                //dump($musicStyle);

                foreach ($musicStyles as $index => $musicStyle) :

                    $checked = '';
                    if (isset($stylesId[$musicStyle->term_id])) {
                        $checked = 'checked';
                    }

                    echo "<input type='checkbox' class='music' $index  name='musicStyle[]' value='$musicStyle->term_id' $checked>";
                    echo "<label for='music' $index>";
                    echo $musicStyle->name;
                    echo "</label><br>";
                endforeach;
                echo '</div>';
                ?>
            </div>

            <button type="submit" class="btn btn-success m-2">Update</button>

        </form>


        <div class="layoutUpdateButton">
            <h2>Changer mon avatar</h2>
            <?php
            $options = array(
                'post_id' => 'user_' . $current_user->ID,
                // 'field_groups' => array(77),
                // 'form' => false,
                // 'return' => add_query_arg('updated', 'true', '?'),
                'html_before_fields' => '',
                'html_after_fields' => '',
                'submit_value' => 'Update'
            );
            acf_form($options);
            ?>
        </div>


        <?php
        global $router;
        $deleteAccountURL = $router->generate('user-delete-account');
        echo
        '<button type="button" class="btn btn-danger m-2"><a class="text-dark" href="' . $deleteAccountURL . '">Supprimer votre compte</a></button>';
        ?>

    </section>


    <!-- Footer-->
    <?php get_template_part('partials/footer.tpl'); ?>

    <!-- wp footer -->
    <?php get_footer(); ?>

    <script>
        function viewCertificate() {

            let radioTeacher = document.querySelector("#teacher");
            let div = document.querySelector("#certificate");


            if (radioTeacher.checked == true) {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }

        }
    </script>

</body>

</html>