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
    $term = get_queried_object();
    $termId = $term->term_id;

    $taxonomyImage = get_field('picture', 'instrument_' . $termId);
    ?>

    <!-- Content section -->
    <div class="container">
        <section id="scroll">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="p-5"><a href="#"><img class="img-fluid rounded-circle" src="<?= $taxonomyImage['url']; ?>" alt="..." /></a></div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-5">
                            <h2 class="display-4"><?= $term->name; ?></h2>
                            <p><?= $term->description; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="archiveH2">
                        <div class="archiveDescription">
                            <article class="archiveArticle">
                                <?php the_terms($post->ID, 'type', 'Type : '); ?><br>
                                <?php $avatar = get_field('avatar', 'user_' . get_the_author_meta('ID')); ?>
                                <div class="archiveContainerArticle1">
                                    <p><img src="<?= $avatar['url'] ?>" alt="" class="archiveView img-fluid rounded-circle"></p>
                                </div>
                                <div class="archiveContainerArticle2">
                                    <h2>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_author(); ?>
                                        </a>
                                    </h2>
                                    <div>
                                        <p class="linkInstrument"><?php the_terms($post->ID, 'instrument'); ?></p>
                                    </div>
                                    <div>
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </section>
    </div>

    <!-- Footer-->
    <?php get_template_part('partials/footer.tpl'); ?>

    <!-- wp footer -->
    <?php get_footer(); ?>
</body>

</html>