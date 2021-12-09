<?php
namespace Instrumental;

use Instrumental\CustomPostType\ProfileTeacher;
use Instrumental\CustomPostType\ProfileStudent;
use Instrumental\CustomTaxonomy\Instrument;
use Instrumental\CustomTaxonomy\Certificate;
use Instrumental\CustomTaxonomy\MusicStyle;

use Instrumental\Models\TeacherInstrumentModel;

class Plugin
{
    /*===================CPT===================*/
    /**
     * @var [ProfileTeacherCPT]
     */
    protected $profileTeacherCPT;

    /**
     * @var [ProfileStudentCPT]
     */
    protected $profileStudentCPT;

    /*=================TAXONOMY=================*/

    /** 
     * @var [InstrumentTaxonomy]
     */
    protected $instrumentTaxonomy;

    /**
     * @var [CertificateTaxonomy]
     */
    protected $certificateTaxonomy;

    /**
     * @var [MusicStyleTaxonomy]
     */
    protected $musicStyleTaxonomy;

     /*===================UTILE===================*/

     /**
     * Propriété gérant les traitements concernant les rôles
     *
     * @var RoleManager
     */
    protected $roleManager;

    /**
     * @var CustomFields
     */
    protected $customFields;

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

     /*===================MODEL===================*/

    protected $teacherInstrumentModel;

     /*============================================
       ============================================*/
    public function __construct()
    {
        add_action(
        'init',
        [$this, 'initialize']
    );

    }

    public function initialize()
    {
        /*===================CPT===================*/
        $this->profileTeacherCPT = new ProfileTeacher();
        $this->profileStudentCPT = new ProfileStudent();
        /*=================TAXONOMY=================*/
        $this->instrumentTaxonomy = new Instrument();
        $this->certificateTaxonomy = new Certificate();
        $this->musicStyleTaxonomy = new MusicStyle();
        /*===================UTILE===================*/
        $this->roleManager = new RoleManager();
        $this->userRegistration = new UserRegistration();
        $this->customFields = new CustomFields();
        $this->wordpressRouter = new WordpressRouter();
        
        /*===================MODEL===================*/
        $this->teacherInstrumentModel = new TeacherInstrumentModel();
    }

    public function activate()
    {
        // à l'activation du plugin, nous initialisons ce dernier
        $this->initialize();

        // nous donnons tous les droits à l'administrateur sur les cpt profileStudent et profileTeacher
        // le role "administrator" est un role par défaut de wordpress
        $this->roleManager->giveAllCapabilitiesOnCPT('teacher', 'administrator');
        $this->roleManager->giveAllCapabilitiesOnCPT('student', 'administrator');

        $this->roleManager->createTeacherRole();
        $this->roleManager->createStudentRole();

        $this->teacherInstrumentModel->createTable();
    }

    public function deactivate()
    {
       
    }

}
