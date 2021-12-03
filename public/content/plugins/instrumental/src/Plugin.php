<?php

namespace Instrumental;

use Instrumental\CustomPostType\Profiles;

class Plugin
{
    
    //* ===========================================================
    //* CPT (custom post type)
    //* ===========================================================

   /**
     * Undocumented variable
     *
     * @var Profiles
     */
    protected $profiles;


    //* ===========================================================
    //* Custom taxonomies
    //* ===========================================================

   


    //* ===========================================================
    //* Classes "utilitaires"
    //* ===========================================================

    
    /**
     * Propriété gérant tous les traitements concernant les roôles
     *
     * @var RoleManager
     */
    protected $roleManager;

    /**
     * @var UserRegistration
     */
    protected $userRegistration;

    /**
     * Configuration du router wordpress
     *
     * @var WordpressRouter
     */
    protected $wordpressRouter;

  

    //* ===========================================================
    //* Classes du modèle
    //* ===========================================================

    


    //* ===========================================================
    //* ===========================================================





    public function __construct()
    {

        // nous demandons wordpress d'executer la méthode initialize lorsque l'event "init" (event de wordpress) se déclanchera

        add_action(
            'init',
            // équivalent en js objet.initialize();
            [$this, 'initialize']
        );
    }

    // cette méthode sera appellée lorsque le plugin oprofile sera chargé par wordpress
    public function initialize()
    {
        // enregistrement des CPT
       $this->profiles = new Profiles();
       

        // Enregistrement des taxonomies custom
       

        // enregistrement du gestionnaire de roles
      

        // Gestion du formulaire d'inscription
        $this->userRegistration = new UserRegistration();

        // chargement du router wordpress
        $this->wordpressRouter = new WordpressRouter();

       

        // instenciation d'un ProjectDeveloperModel
       
    }

    // déclenché à l'activation du plugin
    public function activate()
    {
       
        // à l'activation du plugin, nous initialisons ce dernier
       $this->initialize();

        // donne tous les droits à l'administrateur sur le cpt DeveloperProfile
        //le role "administrator" est un role par défaut de wordpress
     // $this->roleManager->giveAllCapabilitiesOnCPT('profiles', 'administrator');
       
        // création des rôles custom de notre plugin
      //$this->roleManager->createTeacherRole();
      //$this->roleManager->createStudentRole();

        // création de la table project_developer
        //$this->projectDeveloperModel->createTable();

        // création de la table project_customer
        //$this->projectCustomerModel->createTable();

        // création de la table developer_technology
        //$this->developerTechnologyModel->createTable();
    }

    // déclénché lors de la désactivation du plugin
    public function deactivate()
    {
       $this->initialize();
       // $this->roleManager->deleteTeacherRole();
      // $this->roleManager->deleteStudentRole();

       
    }
}
