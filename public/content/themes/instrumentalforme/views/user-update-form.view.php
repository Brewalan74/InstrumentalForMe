<?php
// echo __FILE__ . ':' . __LINE__;
// exit();
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



    <?php
    $current_user = wp_get_current_user();
    dump(__FILE__ . ':' . __LINE__, $current_user);
    $userdata = get_userdata($current_user->ID);
    $userLastName = $userdata->last_name;
    dump(__FILE__ . ':' . __LINE__, $userLastName);
    ?>


    <section>
        <p>
            <label for="user_password">Mot de passe</label>
            <input type="password" name="user_password" id="user_password" class="input" value="" size="20" autocapitalize="off">
        </p>

        <p>
            <label for="user_password_confirmation">Confirmer votre mot de passe</label>
            <input type="password" name="user_password_confirmation" id="user_password_confirmation" class="input" value="" size="20" autocapitalize="off">
        </p>
        <div>
            <input type="radio" id="teacher" name="user_type" value="teacher" onclick="viewCertificate()">
            <label for="teacher">Teacher</label>

            <input type="radio" id="student" name="user_type" value="student" onclick="viewCertificate()">
            <label for="student">Student</label><br>
        </div>
        <div id="certificate" style="display:none">';


            <?php $certificates = get_terms('certificate', array('hide_empty' => false)) ?>;

            <?php foreach ($certificates as $index => $certificat) : ?>

                <input type="checkbox" id="certif' . $index . '" name="certificates[]" value="' . $certificat->term_id . '">
                <label for="certif' . $index . '"><?= $certificat->name ?></label><br>';

            <?php endforeach; ?>
        </div>
    </section>

    <p class="layoutUpdateButton">
        <?php
        $options = array(
            'post_id' => 'user_' . $current_user->ID,
            // 'field_groups' => array(77),
            // 'form' => true,
            // 'return' => add_query_arg( 'updated', 'true', get_permalink() ),
            'html_before_fields' => '',
            'html_after_fields' => '',
            'submit_value' => 'Update'
        );
        dump(__FILE__ . ':' . __LINE__, $options);
        acf_form($options);
        ?>
    </p>

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