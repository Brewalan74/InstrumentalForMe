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
    <link rel="icon" type="image/x-icon" href="assets/favicon.icon" />

</head>

<body id="page-top">

    <!-- wp header -->
    <?php get_header(); ?>

    <!-- Navigation-->
    <?php get_template_part('partials/navbar.tpl'); ?>

    <!-- Header-->
    <?php get_template_part('partials/header.tpl'); ?>

    
        
            <?php
            $term = get_queried_object();
            $termId = $term->term_id;
        
            $taxonomyImage = get_field('picture', 'instrument_' . $termId);
            //dump($term);
        
            //dump($taxonomyImage['url']);
            //exit;
            ?>
       
    
    <!-- Content section 1-->
    
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
                    <div class="profileH2">
                        <div class="profileDescription">
                            <article class="projet">
                                <?php the_terms($post->ID, 'type', 'Type : '); ?><br>
                                <p img class="profileView img-fluid rounded-circle"> <?php the_post_thumbnail('thumbnail'); ?></p>
                                <h2>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                <div>
                                      <p><?php the_terms( $post->ID, 'instrument');?></p>
        
                                </div>
        
                                <div>
                                    <?php the_content(); ?>
                                </div>
                            </article>
                            <?php
                             if(!is_user_logged_in()) {
                                echo ' <a href="' . wp_login_url() . '">Prendre rendez-vous>';
                            }
                            else {
                                $user = wp_get_current_user();
                                global $router;
                                // dump($user);
                                if(in_array('student', $user->roles)) {
                                    echo ' <a href="<?php '. $router->generate('user-appointment');'?>">Prendre rendez-vous>';
                                   
                                    
        
                                }
                                // else {
                                //     $url = $router->generate('404');
                                // }
                                exit;
                            } ; ?>
                           
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