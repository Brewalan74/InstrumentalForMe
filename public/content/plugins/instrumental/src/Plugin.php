<?php
namespace Instrumental;

use Instrumental\CustomPostType\Profile;

class Plugin
{
    protected $profileCPT;

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
        $this->profileCPT = new Profile();
        $this->roleManager = new RoleManager();
    }

    public function activate()
    {
       
    }

    public function deactivate()
    {
       
    }

}
