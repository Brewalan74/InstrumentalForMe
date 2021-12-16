<?php

use Instrumental\Models\LessonModel;

the_post();
$teacherId = get_the_author_meta('ID');
// echo __FILE__ . ':' . __LINE__;
// exit();
$user = wp_get_current_user();
$userId = $user->ID;
$lessonModel = new LessonModel();
?>
<?php


$current_user = wp_get_current_user();
//dump(__FILE__ . ':' . __LINE__, $curreny_user);
$userdata = get_userdata($current_user->ID);
// dump($userdata->ID);
 //$userDescription = $userdata->description;
 //dump($userDescription);
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

    <div class="container">

        <?php
        $user = wp_get_current_user();
        // dump(__FILE__ . ':' . __LINE__, $user);
        $roles = $user->roles;
        if (in_array('teacher', $roles)) {
            $isTeacher = true;
        } else {
            $isTeacher = false;
        }
        if ($isTeacher) {
            echo '<section class="text-center">
                <h1 class="m-5"> ';
            if (is_user_logged_in()) {
                $user = wp_get_current_user();
                echo "Bonjour " . $user->display_name;
                //dump($user);
            };
            '</h1>';
            echo '</section>
            
            <div class="text-center">';
            // affichage de l'avatar
            $avatar = get_field('avatar', 'user_' . $user->ID);
            if ($avatar) {
                echo '<img src="' . $avatar['url'] . '"/>';
            }
            '</div>
            <div>';
            global $router;
            $updateProfileURL = $router->generate('user-update-profile');
            echo
            '<p class="text-end mx-5"><a class="fs-5 text-end linkProfile" href="' . $updateProfileURL . '">Modifier votre profil</a></p>
            </div>
            <section class="m-5 text-center descriptionPerso">
                <p>';
            echo get_the_content();
            '</p>
            </section>';
            echo '<section class="m-5">
                <div class="container containerRecap">
                <h3>Vos nouvelles demandes de RDV</h3>
                <ul class="recap m-5">
                '
                ;


                if (in_array('teacher', $user->roles)) :
                    $lessons = $lessonModel->getLessonsByTeacherId($userId);
                    foreach ($lessons as $lesson => $value) : ;

                        if ($value->status === 0): 
                            echo '<li> ' . $value->user_nicename . ' / ' . $value->appointment . '</li>
                        <button type="button" class="btn btn-success">Valider</button>
                        <button type="button" class="btn btn-danger">Refuser</button>';
                        // else : ;
                            
                        endif;
                    endforeach;

                endif;

                
                echo
                ' 
                </ul>
            
                <ul class="recap m-5">
                <h3>Liste de vos cours</h3>
                    <li><a class="linkProfile"href="#">Cours 1 A DYNAMISER</a></li>
                </ul>
            
                <ul class="recap m-5">
                <h3>Liste de vos élèves</h3>
                    <li><a class="linkProfile" href="#">Eleve 1 A DYNAMISER</a></li>
                </ul>
                </div>
            
            </section>';
        } else {
            

            
            //$user = wp_get_current_user();
            //dump($user);
            //$userId = $user->ID;
            //$lessonModel = new LessonModel();
            if (in_array('student', $user->roles)) {
                $lessons = $lessonModel->getLessonsByStudentId($userId);
                //dump($lessons->student_id);
                //dump($lessons['lesson_id']);
                //dump($lessons['instrument']['name']);
                
            }
            
            

            echo '<section class="text-center">
                <h1 class="m-5"> ';
            if (is_user_logged_in()) {
                $user = wp_get_current_user();
                echo "Bonjour " . $user->display_name;
                //dump($user);
            };
            '</h1>';
            echo '</section>

            
            <div class="text-center">';
            // affichage de l'avatar
            $avatar = get_field('avatar', 'user_' . $user->ID);
            if ($avatar) {
                echo '<img src="' . $avatar['url'] . '"/>';
            }
            '</div>
            <div>';
            global $router;
            $updateProfileURL = $router->generate('user-update-profile');
            echo 
            '<p class="text-end mx-5"><a class="fs-5 text-end linkProfile" href="'
                . $updateProfileURL . '">Modifier votre profile</a></p>
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
                </div>
            
            </section>';
        }
        ?>
    </div>

    <div class="container">
        <section>
            <?php
            // $user = wp_get_current_user();
            // $userId = $user->ID;
            // $lessonModel = new LessonModel();
            if (in_array('teacher', $user->roles)) {
                $lessons = $lessonModel->getLessonsByTeacherId($userId);
            } else {
                $lessons = $lessonModel->getLessonsByStudentId($userId);
            }
            ?>
            <div id="calendar">
                <textarea id="lessons"
                    style="display: none; width: 100%; height: 500px"><?= json_encode($lessons, JSON_PRETTY_PRINT); ?></textarea>
                <template>
                    <v-app>
                        <v-sheet tile height="54" class="d-flex">
                            <v-btn icon class="ma-2" @click="$refs.calendar.prev()">
                                <v-icon>mdi-chevron-left</v-icon>
                            </v-btn>
                            <v-select v-model="type" :items="types" dense outlined hide-details class="ma-2"
                                label="Calendrier"></v-select>
                            <v-spacer></v-spacer>
                            <v-btn icon class="ma-2" @click="$refs.calendar.next()">
                                <v-icon>mdi-chevron-right</v-icon>
                            </v-btn>
                        </v-sheet>
                        <v-sheet height="600">
                            <v-calendar :interval-format="intervalFormat" ref="calendar" v-model="value"
                                :weekdays="weekday" :type="type" :events="events" :event-overlap-mode="mode"
                                :event-overlap-threshold="30" :event-color="getEventColor" @change="getEvents"
                                locale="fr"></v-calendar>
                        </v-sheet>
                    </v-app>
                </template>
            </div>
        </section>
    </div>

    <section>
        <!-- Footer-->
        <?php get_template_part('partials/footer.tpl'); ?>
        <!-- wp footer -->
        <?php get_footer(); ?>
    </section>
</body>

</html>