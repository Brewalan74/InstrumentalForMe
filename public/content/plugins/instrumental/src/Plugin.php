<?php
namespace Instrumental;

use Instrumental\CustomPostType\ProfileTeacher;
use Instrumental\CustomPostType\ProfileStudent;
use Instrumental\CustomTaxonomy\Instrument;
use Instrumental\CustomTaxonomy\Certificate;
use Instrumental\CustomTaxonomy\MusicStyle;

class Plugin
{
    protected $profileTeacherCPT;

    protected $profileStudentCPT;

    protected $instrumentTaxonomy;

    protected $certificateTaxonomy;

    protected $musicStyleTaxonomy;

    protected $roleManager;

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
    }

    public function activate()
    {
       
    }

    public function deactivate()
    {
       
    }

}
