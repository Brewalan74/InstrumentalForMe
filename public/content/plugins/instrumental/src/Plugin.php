<?php
namespace Instrumental;

use Instrumental\CustomPostType\ProfileTeacher;
use Instrumental\CustomPostType\ProfileStudent;
use Instrumental\CustomTaxonomy\Instrument;
use Instrumental\CustomTaxonomy\Certificate;
use Instrumental\CustomTaxonomy\MusicStyle;
use Instrumental\Models\CoreModel;
use Instrumental\Models\TeacherInstrumentModel;

class Plugin
{
    /**
     * @var [ProfileTeacherCPT]
     */
    protected $profileTeacherCPT;

    /**
     * @var [ProfileStudentCPT]
     */
    protected $profileStudentCPT;

    protected $instrumentTaxonomy;

    protected $certificateTaxonomy;

    protected $musicStyleTaxonomy;

    protected $roleManager;

    protected $customFields;

    protected $userRegistration;

    protected $wordpressRouter;

    protected $coreModel;

    protected $teacherInstrumentModel;

    public function __construct()
    {
        add_action(
        'init',
        [$this, 'initialize']
    );

    }

    public function initialize()
    {
        $this->profileTeacherCPT = new ProfileTeacher();
        $this->profileStudentCPT = new ProfileStudent();
        $this->instrumentTaxonomy = new Instrument();
        $this->certificateTaxonomy = new Certificate();
        $this->musicStyleTaxonomy = new MusicStyle();
        $this->roleManager = new RoleManager();
        $this->userRegistration = new UserRegistration();
        $this->customFields = new CustomFields();
        $this->wordpressRouter = new WordpressRouter();
        $this->coreModel = new CoreModel();
        $this->teacherInstrumentModel = new TeacherInstrumentModel();
    }

    public function activate()
    {
        // à l'activation du plugin, nous initialisons ce dernier
        $this->initialize();

        // nous tous les droits à l'administrateur sur le cpt DeveloperProfile
        // le role "administrator" est un role par défaut de wordpress
        $this->roleManager->giveAllCapabilitiesOnCPT('teacher', 'administrator');
        $this->roleManager->giveAllCapabilitiesOnCPT('student', 'administrator');

        $this->roleManager->createTeacherRole();
        $this->roleManager->createStudentRole();
    }

    public function deactivate()
    {
       
    }

}
