<?php
//echo __FILE__.':'.__LINE__; exit();
use Instrumental\Models\TeacherInstrumentModel;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Instrumental For Me!</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

</head>

<body id="page-top">

    <!-- wp header -->
    <?php get_header(); ?>

    <!-- Navigation-->
    <?php get_template_part('partials/navbar.tpl'); ?>

    <!-- Header-->
    <?php get_template_part('partials/header.tpl'); ?>

    <div>
        <?php
        $term = get_queried_object();
        $termId = $term->term_id;

        $taxonomyImage = get_field('picture', 'instrument_' . $termId);
        //dump($term);
        //dump($taxonomyImage['url']);
        //exit;

        ?>
    </div>

    <section>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="profileH2">

                    <div class="profileDescription">



                        <article class="projet">
                            <?php the_terms($post->ID, 'type', 'Type : '); ?><br>

                            <p class="profileView"> <?php the_post_thumbnail('thumbnail'); ?></p>

                            <h2>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            <div>
                                <?php the_content(); ?>
                            </div>
                        </article>
                        <a href="#">Prendre rendez-vous</a>


                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>




    <!-- Footer-->
    <?php get_template_part('partials/footer.tpl'); ?>

    <!-- wp footer -->
    <?php get_footer(); ?>
</body>

</html>