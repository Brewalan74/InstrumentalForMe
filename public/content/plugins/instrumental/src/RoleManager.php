<?php

namespace Instrumental;

class RoleManager
{
    public function __construct()

    {
    }

    public function deleteTeacherRole()
    {
        remove_role('teacher');
    }

    public function deleteStudentRole()
    {
        remove_role('student');
    }

    public function createTeacherRole()
    {
        add_role(
            'teacher',    // idenfiant du rôle
            'Teacher',   // Libéllé du rôle
            // Capabilities for teacher
            [
                'delete_others_profile-teacher' => false,
                'delete_private_profile-teacher' => false,
                'delete_profile-teacher' => false,
                'delete_published_profile-teacher' => true,
                'edit_others_profile-teacher' => false,
                'edit_private_profile-teacher' => false,
                'edit_profile-teacher' => false,
                'edit_published_profile-teacher' => true,
                'publish_profile-teacher' => true,
                'read_private_profile-teacher' => true,
            ]
        );
    }

    public function createStudentRole()
    {
        add_role(
            'student',    // idenfiant du rôle
            'Student',   // Libéllé du rôle

            // Capabilities for student
            [
                'delete_profile-student' => false,
                'delete_others_profile-student' => false,
                'delete_private_profile-student' => false,
                'delete_published_profile-student' => true,
                'edit_profile-student' => false,
                'edit_others_profile-student' => false,
                'edit_private_profile-student' => false,
                'edit_published_profile-student' => true,
                'publish_profile-student' => true,
                'read_private_profile-student' => false,
            ]
        );
    }

    // cette méthode va nous permettre de donner tous les droits sur un type de post custom à un role
    public function giveAllCapabilitiesOnCPT($cptName, $role)
    {
        // récupération du rôle passé en paramètre
        // DOC get_role https://developer.wordpress.org/reference/functions/get_role/
        $role = get_role($role);

        // on ajoute chacune des capabilties au rôle choisi
        $capabilities = [
            'delete_' . $cptName . 's',
            'delete_others_' . $cptName . 's',
            'delete_private_' . $cptName . 's',
            'delete_published_' . $cptName . 's',
            'edit_' . $cptName . 's',
            'edit_others_' . $cptName . 's',
            'edit_private_' . $cptName . 's',
            'edit_published_' . $cptName . 's',
            'publish_' . $cptName . 's',
            'read_private_' . $cptName . 's',
        ];

        foreach ($capabilities as $capability) {
            $role->add_cap($capability);
        }
    }
}
