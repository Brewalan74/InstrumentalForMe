<?php
namespace Instrumental\Models;

class TeacherModel extends CoreModel
{

    public function getTableName()
    {
        $tablePrefix = $this->wpdb->prefix;
        $tableName = $tablePrefix.'teacher_model';
        return $tableName;
    }
    public function createTable()
    {
        $tableName = $this->getTableName();

        $sql = '
            CREATE TABLE `' . $tableName . '` (
                `teacher_id` int(8) unsigned NOT NULL,
                `instrument_id` int(8) unsigned NOT NULL,
                `certificate_id` int(8) unsigned NOT NULL,
                `musicStyle_id` int(8) unsigned NOT NULL,
                `created_at` datetime NOT NULL,
                `updated_at` datetime NULL
            );
        ';

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        dbDelta($sql);

        $primaryKeySQL = 'ALTER TABLE `' . $tableName . '` ADD PRIMARY KEY 
        `teacher_id_instrument_id`,
        `teacher_id_certificate_id`,
        `teacher_id_musicStyle_id`,
         (`teacher_id`, `instrument_id`, `certificate_id`, `musicStyle_id`)';
        $this->wpdb->query($primaryKeySQL);
    }

    public function dropTable()
    {
        $tableName = $this->getTableName();

        $sql = 'DROP TABLE `' . $tableName . '`';
        $this->wpdb->query($sql);
    }


    
    public function insert($teacherId, $instrumentId, $certificateId, $musicStyle)
    {
        $data = [
            'teacher_id' => $teacherId,
            'instrument_id' => $instrumentId,
            'certificate_id' => $certificateId,
            'musicStyle_id' => $musicStyle,
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
    /*=========================================================
                    Instruments & Profs
    *=========================================================*/
    // permet de récupérer pour un instrument tous les teachers qui lui sont associés
    public function getTeacherByInstrumentId($instrumentId)
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

    
    public function getInstrumentsByTeacherId($teacherId)
    {
        $tableName = $this->getTableName();
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
        $tableName = $this->getTableName();

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
        $tableName = $this->getTableName();

        $conditions = [
            'teacher_id' => $teacherId, 
        ];

        $this->wpdb->delete(
            $tableName,
            $conditions
        );
    }
    
    /*=========================================================
                    Certificats & Profs
    *=========================================================*/

    public function getByTeacherIdAndCertificateId($teacherId, $certificateId)
    {
        $tableName = $this->getTableName();

        $sql = "
            SELECT * FROM `" . $tableName . "`
            WHERE
                teacher_id = %d
                AND certificate_id = %d
        ";

        $preparedStatement = $this->wpdb->prepare(
            $sql,
            [
                $teacherId,
                $certificateId
            ]
        );
        $rows = $this->wpdb->get_results($preparedStatement);

        return $rows;
    }

     /*=========================================================
                    MusicStyle & Profs
    *=========================================================*/

    public function getByTeacherIdAndMusicStyleId($teacherId, $musicStyleId)
    {
        $tableName = $this->getTableName();

        $sql = "
            SELECT * FROM `" . $tableName . "`
            WHERE
                teacher_id = %d
                AND musicStyle_id = %d
        ";

        $preparedStatement = $this->wpdb->prepare(
            $sql,
            [
                $teacherId,
                $musicStyleId
            ]
        );
        $rows = $this->wpdb->get_results($preparedStatement);

        return $rows;
    }
}

