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
                'delete_others_profile-teachers' => false,
                'delete_private_profile-teachers' => false,
                'delete_profile-teachers' => false,
                'delete_published_profile-teachers' => true,
                'edit_others_profile-teachers' => false,
                'edit_private_profile-teachers' => false,
                'edit_profile-teachers' => false,
                'edit_published_profile-teachers' => true,
                'publish_profile-teachers' => true,
                'read_private_profile-teachers' => true,
            ]
        );
    }


    public function createStudentRole()
    {
        add_role(
            'customer',    // idenfiant du rôle
            'Customer',   // Libéllé du rôle

            // Capabilities for student
            [
                'delete_student-profiles' => false,
                'delete_others_student-profiles' => false,
                'delete_private_student-profiles' => false,
                'delete_published_student-profiles' => true,
                'edit_student-profiles' => false,
                'edit_others_student-profiles' => false,
                'edit_private_student-profiles' => false,
                'edit_published_student-profiles' => true,
                'publish_student-profiles' => true,
                'read_private_student-profiles' => false,
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
