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
    $options = array(
        'post_id' => 'user_' . $current_user->ID,
        // 'field_groups' => array(77),
        // 'form' => true,
        // 'return' => add_query_arg( 'updated', 'true', get_permalink() ), 
        'html_before_fields' => '',
        'html_after_fields' => '',
        'submit_value' => 'Update'
    );
    acf_form($options);
    ?>

    <!-- Footer-->
    <?php get_template_part('partials/footer.tpl'); ?>

    <!-- wp footer -->
    <?php get_footer(); ?>

</body>

</html>