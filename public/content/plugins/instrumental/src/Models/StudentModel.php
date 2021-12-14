<?php
namespace Instrumental\Models;

class TeacherModel extends CoreModel
{

    public function getTableName()
    {
        $tablePrefix = $this->wpdb->prefix;
        $tableName = $tablePrefix.'student_model';
        return $tableName;
    }
    public function createTable()
    {
        $tableName = $this->getTableName();

        $sql = '
            CREATE TABLE `' . $tableName . '` (
                `student_id` int(8) unsigned NOT NULL,
                `instrument_id` int(8) unsigned NOT NULL,                
                `musicStyle_id` int(8) unsigned NOT NULL,
                `created_at` datetime NOT NULL,
                `updated_at` datetime NULL
            );
        ';

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        dbDelta($sql);

        $primaryKeySQL = 'ALTER TABLE `' . $tableName . '` ADD PRIMARY KEY 
        `student_id_instrument_id`,    
        `student_id_musicStyle_id`,
         (`student_id`, `instrument_id`, `musicStyle_id`)';
        $this->wpdb->query($primaryKeySQL);
    }

    public function dropTable()
    {
        $tableName = $this->getTableName();

        $sql = 'DROP TABLE `' . $tableName . '`';
        $this->wpdb->query($sql);
    }


    
    public function insert($studentId, $instrumentId,  $musicStyle)
    {
        $data = [
            'student_id' => $studentId,
            'instrument_id' => $instrumentId,           
            'musicStyle_id' => $musicStyle,
            'created_at' => date('Y-m-d H:i:s')
        ];

        return $this->wpdb->insert(
            $this->getTableName(),
            $data
        );
    }

    

    
    // permet de récupérer pour un student tous les instruments qui lui sont associés
    public function getByStudentId($studentId)
    {
        $tableName = $this->getTableName();

        $sql = "
            SELECT * FROM `" . $tableName . "`
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
    /*=========================================================
                    Instruments & Student
    *=========================================================*/
    // permet de récupérer pour un instrument tous les students qui lui sont associés
    public function getStudentByInstrumentId($instrumentId)
    {
        $tableName = $this->getTableName();

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

    
    public function getInstrumentsByStudentId($studentId)
    {
        $tableName = $this->getTableName();
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
    public function getByStudentIdAndInstrumentId($studentId, $instrumentId)
    {
        $tableName = $this->getTableName();

        $sql = "
            SELECT * FROM `" . $tableName . "`
            WHERE
                student_id = %d
                AND instrument_id = %d
        ";

        $preparedStatement = $this->wpdb->prepare(
            $sql,
            [
                $studentId,
                $instrumentId
            ]
        );
        $rows = $this->wpdb->get_results($preparedStatement);

        return $rows;
    }


    public function deleteByStudentId($studentId)
    {
        $tableName = $this->getTableName();

        $conditions = [
            'student_id' => $studentId, 
        ];

        $this->wpdb->delete(
            $tableName,
            $conditions
        );
    }
    
    

     /*=========================================================
                    MusicStyle & Student
    *=========================================================*/

    public function getByStudentIdAndMusicStyleId($studentId, $musicStyleId)
    {
        $tableName = $this->getTableName();

        $sql = "
            SELECT * FROM `" . $tableName . "`
            WHERE
                student_id = %d
                AND musicStyle_id = %d
        ";

        $preparedStatement = $this->wpdb->prepare(
            $sql,
            [
                $studentId,
                $musicStyleId
            ]
        );
        $rows = $this->wpdb->get_results($preparedStatement);

        return $rows;
    }
}

