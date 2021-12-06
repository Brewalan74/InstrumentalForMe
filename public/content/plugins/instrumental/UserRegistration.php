<?php

namespace Instrumental;

use WP_User;

class UserRegistration
{
    public function __construct()
    {
        add_action( //Charger un css custom sur nos pages login & register
            'login_enqueue_scripts',
            [$this, 'loadAssets']
        );

        add_action( // Inserrer du code Html dans le formulaire de WP afin de le personnaliser
            'register_form',
            [$this, 'addCustomFields']
        );

        add_action( // Gestion des erreurs une fois le formulaire soumis
            'registration_errors',
            [$this, 'checkErrors']
        );

        /* ======================================
           Etape après que l'utilisateur est crée
           ======================================*/

        add_action( // Affectation du rôle de l'utilisateur 
            'registeur_new_user',
            [$this, 'setUserRole']
        );

        add_action( //  Création de la page profil
            'registeur_new_user',
            [$this, 'createUserProfile']
        );

        add_action( // Affectation du MdP choisit par l'utilisateur
            'register_new_user',
            [$this, 'setUserPassword']
        );
    }

            /*====================
                    Méthodes
              ==================== */
     
    public function setUserRole($newUserId)
    {
        $user = new WP_User($newUserId);
        $role = filter_input(INPUT_POST, 'user_type'); // Controle des données enregistrer par l'utilisateur (si rôle non autorisé = suppression de compte et blocage de la page)

        $allowedRoles = [
            'teacher',
            'student'
        ];
        if(!in_array($role, $allowedRoles)) {

            require_once ABSPATH . '/wp-admin/includes/user.php';
            wp_delete_user($newUserId);
            exit('SOMETHING WRONG HAPPENED');
        }
        else {
            $user->add_role($role);
            $user->remove_role('subscriber');
        }
    }

    public function createUserProfile($newUserId)
    {
        $user = new WP_User($newUserId);
        $role = filter_input(INPUT_POST, 'user_type');

        if($role === 'teacher') {
            $postType = 'profile-teacher';
        }
        elseif($role === 'student') {
            $postType = 'profile-student';
        }
         wp_insert_post([
             'post_author' => $newUserId,
             'post_title'  => $user->data->display_name ." 's profile",
             'post-type'   => $postType
         ]);

    }

    public function steUserPassword($newUserId)
    {
        $password = filter_input(INPUT_POST,'user_password');
    }


}
