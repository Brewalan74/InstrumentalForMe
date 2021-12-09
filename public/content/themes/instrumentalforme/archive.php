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
<div class="profileH2">
   

            <p class="profileView">Les professeurs qui enseignent cet instrument:</p>
          <?php 
            
            $user = wp_get_current_user();
            $userId = $user->ID;
            $model = new TeacherInstrumentModel();
            $results =  $model->getInstrumentsByTeacherId($userId);

            $InstrumentIds = [];
   // dump($InstrumentIds);
        
            foreach($results as $participation) {
                 $projectIds[] = $participation->project_id;
            }

            // IMPORTANT E12 WP_QUERY
            $query = new WP_Query([
                 'post__in' => $InstrumentIds,
                 'post_type' => 'instrument',
            ]);
            dump($query);
            if($query->have_posts()) {
               while($query->have_posts()) {
                   $query->the_post();
                   echo '<div>';
                       echo '<h2>' . get_the_title() . '</h2>';
                       echo '<div>';
                           echo get_the_excerpt();
                       echo '</div>';
                       echo '<div>';
                           echo '<a href="' . get_the_permalink() . '">Voir le projet</a>';
                       echo '</div>';
                   echo '</div>';
               }
            }
           ?>
       
            
</div>        
</section>




    <!-- Footer-->
    <?php get_template_part('partials/footer.tpl'); ?>

    <!-- wp footer -->
    <?php get_footer(); ?>
</body>

</html>