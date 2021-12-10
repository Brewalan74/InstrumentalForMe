<?php
namespace Instrumental\Models;

class TeacherInstrumentModel extends CoreModel
{

    public function getTableName()
    {
        $tablePrefix = $this->wpdb->prefix;
        $tableName = $tablePrefix.'teacher_instrument';
        return $tableName;
    }
    public function createTable()
    {
        $tableName = $this->getTableName();

        $sql = '
            CREATE TABLE `' . $tableName . '` (
                `teacher_id` int(8) unsigned NOT NULL,
                `instrument_id` int(8) unsigned NOT NULL,
                `created_at` datetime NOT NULL,
                `updated_at` datetime NULL
            );
        ';

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        dbDelta($sql);

        $primaryKeySQL = 'ALTER TABLE `' . $tableName . '` ADD PRIMARY KEY `teacher_id_instrument_id` (`teacher_id`, `instrument_id`)';
        $this->wpdb->query($primaryKeySQL);
    }

    public function dropTable()
    {
        $tableName = $this->getTableName();

        $sql = 'DROP TABLE `' . $tableName . '`';
        $this->wpdb->query($sql);
    }


    
    public function insert($teacherId, $instrumentId)
    {
        $data = [
            'teacher_id' => $teacherId,
            'instrument_id' => $instrumentId,
            'created_at' => date('Y-m-d H:i:s')
        ];

        return $this->wpdb->insert(
            $this->getTableName(),
            $data
        );
    }

    

    
    // permet de récupérer pour un teacher toutes les instruments qui lui sont associés
    public function getByTeacherId($teacherId)
    {
        $tableName = $this->getTableName();

        $sql = "
            SELECT * FROM `" . $tableName . "`
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

    // permet de récupérer pour un instrument tous les teachers qui lui sont associés
    public function getByInstrumentId($instrumentId)
    {
        $tablePrefix = $this->wpdb->prefix;
        $tableName = $tablePrefix.'instrument_teacher';

        $sql = "
            SELECT * FROM `" . $tableName . "`
            WHERE
                instrument_id = %d
        ";

        $preparedStatement = $this->wpdb->prepare(
            $sql,
            [
                $instrumentId
            ]
        );
        $rows = $this->wpdb->get_results($preparedStatement);

        return $rows;
    }

    
    public function getInstrumentsByTeacherId($teacherId)
    {
        $tablePrefix = $this->wpdb->prefix;
        $tableName = $tablePrefix.'instrument_teacher';
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
    public function getByTeacherIdAndInstrumentId($teacherId, $instrumentId)
    {
        $tablePrefix = $this->wpdb->prefix;
        $tableName = $tablePrefix.'teacher_instrument';

        $sql = "
            SELECT * FROM `" . $tableName . "`
            WHERE
                teacher_id = %d
                AND instrument_id = %d
        ";

        $preparedStatement = $this->wpdb->prepare(
            $sql,
            [
                $teacherId,
                $instrumentId
            ]
        );
        $rows = $this->wpdb->get_results($preparedStatement);

        return $rows;
    }


    public function deleteByTeacherId($teacherId)
    {
        $tablePrefix = $this->wpdb->prefix;
        $tableName = $tablePrefix.'teacher_instrument';

        $conditions = [
            'teacher_id' => $teacherId, 
        ];

        $this->wpdb->delete(
            $tableName,
            $conditions
        );
    }
    
}

