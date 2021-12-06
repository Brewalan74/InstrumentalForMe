<?php
namespace Instrumental;

use Instrumental\CustomPostType\ProfileTeacher;
use Instrumental\CustomPostType\ProfileStudent;

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

    /**
     * @var [RoleManager]
     */
    protected $roleManager;

    /**
     * @var UserRegistration
     */
    protected $userRegistration;


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
        $this->userRegistration = new UserRegistration();
    }

    public function activate()
    {
       
    }

    public function deactivate()
    {
       
    }

}
