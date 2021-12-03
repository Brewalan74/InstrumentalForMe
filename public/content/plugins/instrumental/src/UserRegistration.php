<?php

namespace Instrumental;

use WP_User;

// DOC USER REGISTRATION hooks order https://usersinsights.com/wordpress-user-registration-hooks-visualized/

class UserRegistration
{
    public function __construct()
    {

        // customisation du formulaire======================== =========================
        // chargement d'un css custom sur les pages de login/register
        add_action(
            'login_enqueue_scripts',
            [$this, 'loadAssets']
        );


        // ajout de code html dans le formulaire d'inscription de wordpress
        add_action(
            'register_form',
            [$this, 'addCustomFields']
        );


        // Une fois le formulaire soumis, controle des erreurs =========================

        // STEP REGISTER controles custom du formulaire
        add_action(
            'registration_errors',
            [$this, 'checkErrors']
        );

        // Une fois l'utilsateur à été créé ==================================================

        // STEP REGISTER affectation du bon role à l'utilisateur qui vient d'être créé, puis création de sa fiche profil
        add_action(
            'register_new_user',
            [$this, 'setUserRole']
        );

        /*
        add_action(
            'register_new_user',
            [$this, 'createUserProfile']
        );
        */

        // STEP REGISTER affectation du mot de passe choisi par l'utilisateur
        add_action(
            'register_new_user',
            [$this, 'setUserPassword']
        );
    }


    // ===========================================================
    // Méthodes appelées une fois l'utilisateur créé
    // ===========================================================
    public function setUserRole($newUserId)
    {
        
        // récupération de l'utilisateur via son id
        $user = new WP_User($newUserId);

       // si le role choisi par l'utilisateur ne figure pas dans la liste des rôles autorisés, supression de son compte; et blocage de la page

        $role = filter_input(INPUT_POST, 'user_type');

        // BONUS E9 IN_ARRAY
        // DOC in_array https://www.php.net/in_array
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
            // affectation du bon rôle à l'utilisateur
            $user->add_role($role);

            // suppression du role "subscriber" pour l'utilisateur
            $user->remove_role('subscriber');
        } 
        
       
    }

    public function createUserProfile($newUserId)
    {
        // récupération du rôle choisi par l'utilisateur. Le controle du rôle a été fait auparavant
        $role = filter_input(INPUT_POST, 'user_type');
        // récupération de l'utilisateur via son id

        $user = new WP_User($newUserId);

       // si le role choisi est "teacher" création d'un contenu de type "teacher-profile".
        if($role === 'teacher') {
            $postType = 'teacher-profile';
        }
        //si le role choisie est student
        elseif($role === 'student') {
            $postType = 'student-profile';
        }

    }

    public function setUserPassword($newUserId)
    {
        $password = filter_input(INPUT_POST, 'user_password');
        wp_set_password($password, $newUserId);
    }

    // ===========================================================
    // Controle du formulaire
    // ===========================================================

    // le paramètre $errors nous est fourni par wordpress
    public function checkErrors($errors)
    {
        // récupération du mot de passe envoyé par l'utilisateur
        $password0 = filter_input(INPUT_POST, 'user_password');
        $password1 = filter_input(INPUT_POST, 'user_password_confirmation');



        // vérification est ce que les deux mots de passe sont identiques
        if($password0 !== $password1) {
            // si les mots de passe sont différent il faut indiquer à wordpress qu'il y a une erreur
            $errors->add(
                'passwords-different',  // identifiant du message d'erreur
                '<strong>' . __('Error: ') . '</strong> Le mot de passe doit-être identique au premier mot de passe'    // message d'erreur à aficher
            );
        }

        // si le mot de passe fait moins de 8 caractères
        // BONUS E9 MB_STRLEN attention pour compter les caractère d'une chaine, il faut utiliser mb_strlen
        if(mb_strlen($password0) < 8) {
            $errors->add(
                'password-too-short',
                '<strong>' . __('Error: ') . '</strong> Votre mot de passe doit contenir au minimum 8 caratères'
            );
        }

        // BONUS E9 REGEXP vérifier qu'il y a une majuscule dans une chaine
        if(!preg_match('/[A-Z]/', $password0)) {
            $errors->add(
                'password-no-capitalized-letter',
                '<strong>' . __('Error: ') . '</strong> Votre mot de passe doit contenir au moins une lettre en majuscule'
            );
        }

        if(!preg_match('/[a-z]/', $password0)) {
            $errors->add(
                'password-no-lowercase-letter',
                '<strong>' . __('Error: ') . '</strong> Votre mot de passe doit contenir au moins une lettre en minuscule'
            );
        }

        if(!preg_match('/[0-9]/', $password0)) {
            $errors->add(
                'password-no-number',
                '<strong>' . __('Error: ') . '</strong> Votre mot de passe doit contenir au moins un chiffre'
            );
        }


        if(!preg_match('/\W/', $password0)) {
            $errors->add(
                'password-no-special-character',
                '<strong>' . __('Error: ') . '</strong> Votre mot de passe doit contenir des caractères spéciaux'
            );
        }

        return $errors;
    }

    // ===========================================================
    // Customisation du formulaire
    // ===========================================================

    public function loadAssets()
    {
        wp_enqueue_style(
            'login-form-css',
            get_theme_file_uri('assets/css/user-registration.css')
        );
    }

    public function addCustomFields()
    {
        echo '
            <p>
                <label for="user_password">Password</label>
                <input type="text" name="user_password" id="user_password" class="input" value="" size="20" autocapitalize="off">
            </p>

            <p>
                <label for="user_password_confirmation">Password confirmation</label>
                <input type="text" name="user_password_confirmation" id="user_password_confirmation" class="input" value="" size="20" autocapitalize="off">
            </p>

            <br/>
            ========================== a mettre en page profile pour supp compte================
            <p>
                <label for="user_accept_conditions">Accept terms and conditions</label>
                <input required type="checkbox" name="user_accept_conditions" id="user_accept_conditions"/>
            </p>
        ';
    }
}
