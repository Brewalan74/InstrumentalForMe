<?php
// echo __FILE__ . ':' . __LINE__;
// exit();
// the_post();
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
                    <label for="username">Username</label>
                    <input type="text" name="name" id="username" class="input" value="<?= $userdata->user_nicename ?>" size="20" autocapitalize="off" readonly>
                </p>
                <?php if ($userdata->first_name) : ?>
                    <p>
                        <label for="user_firstname">Votre Prénom</label>
                        <input type="text" name="user_firstname" id="user_firstname" class="input" value="<?= $userdata->first_name ?>" size="20" autocapitalize="off">
                    </p>
                <?php else : ?>
                    <p>
                        <label for="user_firstname">Votre Prénom</label>
                        <input type="text" name="user_firstname" id="user_firstname" class="input" value="" size="20" autocapitalize="off">
                    </p>
                <?php endif; ?>
                <?php if ($userdata->last_name) : ?>
                    <p>
                        <label for="user_firstname">Votre Nom</label>
                        <input type="text" name="user_lastname" id="user_lastname" class="input" value="<?= $userdata->last_name ?>" size="20" autocapitalize="off">
                    </p>
                <?php else : ?>
                    <p>
                        <label for="user_firstname">Votre Nom</label>
                        <input type="text" name="user_lastname" id="user_lastname" class="input" value="" size="20" autocapitalize="off">
                    </p>
                <?php endif; ?>
            </div>

            <div class="containerUpdate">
                <p>
                    <label for="user_email">Votre email</label>
                    <input type="email" name="user_email" id="user_email" class="input" value="<?= $userdata->data->user_email ?>" size="20" autocapitalize="off">
                </p>
                <p>
                    <label for="user_password">Nouveau mot de passe</label>
                    <input type="password" name="user_password" id="user_password" class="input" value="" size="20" autocapitalize="off">
                </p>
                <p>
                    <label for="user_password_confirmation">Confirmer nouveau mot de passe</label>
                    <input type="password" name="user_password_confirmation" id="user_password_confirmation" class="input" value="" size="20" autocapitalize="off">
                </p>
            </div>

            <div class="containerUpdate">
                <p>
                    <label for="user_description">Votre description</label><br>
                    <textarea name="user_description" id="user_description" class="textareaDescription" size="250" autocapitalize="off"><?= $userdata->description ?></textarea>
                </p>
            </div>

            <!-- <div class="containerUpdateRadio">
                <input type="radio" id="teacher" name="user_type" value="teacher" onclick="viewCertificate()">
                <label for="teacher">Teacher</label>
                <input type="radio" id="student" name="user_type" value="student" onclick="viewCertificate()">
                <label for="student">Student</label>
            </div>

            <div id="certificate" style="display:none" class="containerUpdateRadio">

                <?php $certificates = get_terms('certificate', array('hide_empty' => false)); ?>

                <?php foreach ($certificates as $index => $certificate) : ?>

                    <input type="checkbox" id="<?= 'certif' . $index ?>" name="<?= $certificate->name; ?> value=" <?= $certificate->term_id ?>>
                    <label for="<?= 'certif' . $index ?>"><?= $certificate->name ?></label><br>

                <?php endforeach; ?>

            </div> -->

            <button>Update</button>
        </form>


        <p class="layoutUpdateButton">
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
        </p>

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