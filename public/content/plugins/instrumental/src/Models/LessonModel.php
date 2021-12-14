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


    public function insert($lessonId, $teacherId, $studentId)
    {
        $data = [
            'lesson_id' => $lessonId,
            'teacher_id' => $teacherId,
            'student_id' => $studentId,
            'created_at' => date('Y-m-d H:i:s')
        ];

        return $this->wpdb->insert(
            $this->getTableName(),
            $data
        );
    }

    public function getLessonsByTeacherId($teacherId)
    {
        $sql = "
            SELECT * FROM `" . $this->getTableName() . "`
            WHERE
                teacher_id = %d
        ";

        $preparedStatement = $this->wpdb->prepare(
            $sql,
            [
                $teacherId
            ]
        );
        $rows = $this->wpdb->get_results($preparedStatement);

        return $rows;
    }

    public function getLessonsByStudentId($studentId)
    {
        $sql = "
            SELECT * FROM `" . $this->getTableName() . "`
            WHERE
                student_id = %d
        ";

        $preparedStatement = $this->wpdb->prepare(
            $sql,
            [
                $studentId
            ]
        );
        $rows = $this->wpdb->get_results($preparedStatement);

        return $rows;
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
