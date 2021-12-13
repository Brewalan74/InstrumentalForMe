<?php
// echo __FILE__ . ':' . __LINE__;
// exit();

$appointment = get_post();
$id = get_the_ID();

dump(__FILE__ . ':' . __LINE__, $appointment);
dump(__FILE__ . ':' . __LINE__, $id);


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

    <div class="profileAppointment">
        <p class="center">Prendre rendez-vous avec</p>
        <h4><?= $appointment->first_name . $appointment->last_name ?></h4>
    </div>

    <div class="profileDescription">
        <p><?= $appointment->description; ?></p>
    </div>

    <div class="profileAppointment">
        <h4>Choisissez date et horaire de votre leçon</h4>
        <form action="">
            <input type="date" name="" id="">
            <input type="submit" value="Submit">
        </form>
    </div>

    <!-- Footer-->
    <?php get_template_part('partials/footer.tpl'); ?>

    <!-- wp footer -->
    <?php get_footer(); ?>
</body>

</html>