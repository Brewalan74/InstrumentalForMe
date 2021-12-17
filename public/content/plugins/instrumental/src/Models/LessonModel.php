<?php

namespace Instrumental\Models;

class LessonModel extends CoreModel
{

    public function getTableName()
    {
        $tablePrefix = $this->wpdb->prefix;
        $tableName = $tablePrefix . 'lesson';
        return $tableName;
    }

    public function createTable()
    {
        $tableName = $this->getTableName();

        $sql = '
            CREATE TABLE `' . $tableName . '` (
                `lesson_id` int(8) unsigned NOT NULL,
                `teacher_id` int(8) unsigned NOT NULL,
                `student_id` int(8) unsigned NOT NULL,
                `instrument` varchar(100) NOT NULL,
                `status` int(8) unsigned NOT NULL,
                `appointment` datetime NOT NULL,
                `student_email` varchar(100) NOT NULL,
                `created_at` datetime NOT NULL,
                `updated_at` datetime NULL
          );
        ';

        // inclusion des fonctions nécessaire pour modifier la bdd
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        // Création d'une nouvelle table
        dbDelta($sql);

        $primaryKeySQL = 'ALTER TABLE `' . $tableName . '` ADD PRIMARY KEY `lesson_id_teacher_id_student_id` (`lesson_id`, `teacher_id`, `student_id`)';
        $this->wpdb->query($primaryKeySQL);
    }

    public function dropTable()
    {
        $tablePrefix = $this->wpdb->prefix;
        $tableName = $tablePrefix . 'lesson';

        $sql = 'DROP TABLE `' . $tableName . '`';
        $this->wpdb->query($sql);
    }


    public function insert($userStudentId, $userTeacherId, $instrument, $date)
    {
        $data = [
            'student_id' => $userStudentId,
            'teacher_id' => $userTeacherId,
            'instrument' => $instrument,
            'appointment' => $date,
            'created_at' => date('Y-m-d H:i:s')
        ];

        return $this->wpdb->insert(
            $this->getTableName(),
            $data
        );
    }

    public function getLessonById($lessonId)
    {
        $tablePrefix = $this->wpdb->prefix;
        $tableName = $tablePrefix . 'lesson';

        $sql = "
            SELECT * FROM `" . $tableName . "`
            WHERE
               lesson_id  = %d
        ";

        $preparedStatement = $this->wpdb->prepare(
            $sql,
            [
                $lessonId
            ]
        );
        $rows = $this->wpdb->get_results($preparedStatement);

        return $rows;
    }

    public function updateStatus($lessonId, $status)
    {
        $conditions = [
            'lesson_id' => $lessonId,
        ];

        $data = [
            'status' => $status,
        ];

        $this->wpdb->update(
            $this->getTableName(),
            $data,
            $conditions
        );
    }

    public function getLessonsByUserId($userId, $role)
    {
        if ($role == 'teacher') {
            $selectField = 'teacher_id';
        } else {
            $selectField = 'student_id';
        }


        $sql = "
            SELECT * FROM `" . $this->getTableName() . "`
            WHERE
                $selectField = %d
        ";

        $preparedStatement = $this->wpdb->prepare(
            $sql,
            [
                $userId
            ]
        );
        $lessons = $this->wpdb->get_results($preparedStatement);

        foreach ($lessons as $index => $lesson) {
            // chargement du teacher
            $teacher = get_user_by('ID', $lesson->teacher_id);
            $lesson->teacher = $teacher;

            // chargement du student
            $student = get_user_by('ID', $lesson->student_id);
            $lesson->student = $student;

            // chargement de l'instrument
            $instrument = get_term_by('ID', $lesson->instrument, 'instrument');
            $lesson->instrument = $instrument;
        }
        return $lessons;
    }

    public function getLessonsByTeacherId($teacherId)
    {
        return $this->getLessonsByUserId($teacherId, 'teacher');
    }

    public function getLessonsByStudentId($studentId)
    {
        return $this->getLessonsByUserId($studentId, 'student');
    }

    public function delete($lessonId, $teacherId, $studentId)
    {
        $conditions = [
            'lesson_id' => $lessonId,
            'teacher_id' => $teacherId,
            'student_id' => $studentId,
        ];

        $this->wpdb->delete(
            $this->getTableName(),
            $conditions
        );
    }
}
