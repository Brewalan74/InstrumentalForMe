<?php

namespace Instrumental\Controllers;

use DateTime;
use Instrumental\Models\LessonModel;
use Instrumental\Models\TeacherModel;

use WP_Query;

class UserController extends CoreController
{

    public function getProfile()
    {
        $query = new WP_Query([
            'author' => get_current_user_id(),
            'post_type' => 'teacher-profile'

        ]);

        $profile = $query->post;

        return $profile;
    }

    public function home()
    {
        $this->show('views/user-home.view');
        //$this->show('views/teacher-home.view');
    }

    public function saveProfile()
    {

        if (!$this->isConnected()) {
            header("HTTP/1.1 403 Forbidden"); // équivalent à http_response_code(403);
            header("EasterEgg: Hello wonderland");
            $this->show('views/user-forbidden');
        } else {
            // mise à jour des champs acf
            acf_form_head();

            $updateProfile = filter_input(INPUT_POST, 'update-profile');
            if ($updateProfile && $this->isConnected()) {

                // TODO il devrait y avoir un controle de token csrf (en wp chercher le terme "nonce")
                // https://codex.wordpress.org/fr:Les_Nonces_WordPress

                $user = wp_get_current_user();


                // mise à jour des champs custom
                $firstName = filter_input(INPUT_POST, 'user_firstname');
                update_user_meta($user->ID, 'first_name', $firstName);

                $lastName = filter_input(INPUT_POST, 'user_lastname');
                update_user_meta($user->ID, 'last_name', $lastName);


                $description = filter_input(INPUT_POST, 'user_description');
                update_user_meta($user->ID, 'description', $description);

                // mise à jour de l'email
                $email = trim(filter_input(INPUT_POST, 'user_email'));

                if ($email) {
                    $args = [
                        'ID' => $user->ID,
                        'user_email' => $email,
                    ];
                    wp_update_user($args);
                }


                $password = trim(filter_input(INPUT_POST, 'user_password'));
                $passwordConfirmation = trim(filter_input(INPUT_POST, 'user_password_confirmation'));
                if ($password && $password == $passwordConfirmation) {
                    // mise à jour du mot de passe
                    wp_set_password($password, $user->ID);
                }


                global $router;
                header('Location: ' . $router->generate('user-home'));
            }
        }
    }

    public function updateProfile()
    {
        acf_form_head();
        // si l'utilisateur n'est pas connecté, nous affichons une page d'erreur avec l'entête http "forbidden"
        if (!$this->isConnected()) {

            header("HTTP/1.1 403 Forbidden"); // équivalent à http_response_code(403);
            header("EasterEgg: Hello wonderland");

            $this->show('views/user-forbidden');
        } else {

            $profile = $this->getProfile();

            $this->show('views/user-update-profile.view', [
                'profile' => $profile
            ]);
        }
    }

    public function takeLesson()
    {
        $model = new LessonModel();
        // $model->createTable();

        $userStudent = wp_get_current_user();
        $datasLesson = $_POST;

        $datetime = new DateTime($datasLesson['date']);
        $date = $datetime->format('Y-m-d H:i');

        $userStudentId = $userStudent->ID;
        $userTeacherId = $datasLesson['teacherId'];
        $instrument = $datasLesson['instrument'];
        $date = $datasLesson['date'];

        $model->insert($userStudentId, $userTeacherId, $instrument, $date);
        global $router;
        // TODO redirection
    }



    // public function teachToInstrument($instrumentId)
    // {
    //     $model = new TeacherModel();
    //     $user = wp_get_current_user();
    //     $userId = $user->ID;

    //     $model->insert(
    //         $instrumentId,
    //         $userId

    //     );

    //     $url = get_post_type_archive_link('instrument');
    //     header('Location: ' . $url);
    // }
    /*




    public function confirmDeleteAccount()
    {

        // si l'utilisateur n'est pas connecté, nous affichons une page d'erreur avec l'entête http "forbidden"
        if(!$this->isConnected()) {


            header("EasterEgg: Hello wonderland");

            header("HTTP/1.1 403 Forbidden");
            $this->show('views/user-forbidden');
        }
        else {
            $this->show('views/user-confirm-delete-account.view');
        }
    }




    public function updateSkills()
    {

        // Récupération des données envoyées depuis le formulaire de selectection des niveaux de maitrise des différentes technologies

        $technologiesLevels = $_POST['technologiesLevels'];

        // récupération de l'utilisateur courant
        $currentUser = wp_get_current_user();
        $userId = $currentUser->ID;

        // nous devons supprimer toutes les lignes de la table developer_technology pour l'utilisateur courant
        $developerTechnologyModel = new DeveloperTechnologyModel();
        $developerTechnologyModel->deleteByDeveloperId($userId);

        // pour chaque technologies, association de la technologie à l'utilisateur

        foreach($technologiesLevels as $termId => $level) {
            $developerTechnologyModel->insert(
                $userId,
                $termId,
                $level
            );
        }

        // redirection vers la page de gestion des compétences
        global $router;
        $skillURL = $router->generate('user-skills');

        header('Location: ' . $skillURL);
    }

    public function participateToProject($projectId)
    {

        $model = new ProjectDeveloperModel();
        $user = wp_get_current_user();
        $userId = $user->ID;

        $model->insert(
            $projectId,
            $userId
        );

        $url = get_post_type_archive_link('project');
        header('Location: ' . $url);
    }

    public function leaveProject($projectId)
    {
        $model = new ProjectDeveloperModel();
        $user = wp_get_current_user();
        $userId = $user->ID;

        $model->delete($projectId, $userId);

        $url = get_post_type_archive_link('project');
        header('Location: ' . $url);
    }
    */
}
