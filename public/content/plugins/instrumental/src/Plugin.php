<?php
namespace Instrumental;

use Instrumental\CustomPostType\ProfileTeacher;
use Instrumental\CustomPostType\ProfileStudent;

class Plugin
{
    protected $profileTeacherCPT;

    protected $profileStudentCPT;

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
        $this->roleManager = new RoleManager();
    }

    public function activate()
    {
       
    }

    public function deactivate()
    {
       
    }

}
