<?php

namespace Instrumental\Controllers;

use Instrumental\Models\TeacherModel;


// class TestController extends CoreController
// {
//     public function selectByTeacherId()
//     {
//         $user = wp_get_current_user();
//         $userId = $user->ID;

//         $teacherModel = new TeacherModel();
//         $rows = $teacherModel->getByTeacherId($userId);

//         echo '<div style="border: solid 2px #F00">';
//         echo '<div style="; background-color:#CCC">@' . __FILE__ . ' : ' . __LINE__ . '</div>';
//         echo '<pre style="background-color: rgba(255,255,255, 0.8);">';
//         print_r($rows);
//         echo '</pre>';
//         echo '</div>';
//     }

//     public function selectByVariableTeacherId($teacherId)
//     {
//         $teacherModel = new TeacherModel();
//         $rows = $teacherModel->getByTeacherId(
//             $teacherId
//         );

//         echo '<div style="border: solid 2px #F00">';
//         echo '<div style="; background-color:#CCC">@' . __FILE__ . ' : ' . __LINE__ . '</div>';
//         echo '<pre style="background-color: rgba(255,255,255, 0.8);">';
//         print_r($rows);
//         echo '</pre>';
//         echo '</div>';
//     }
// }
