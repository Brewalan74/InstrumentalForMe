<?php
namespace Instrumental\Models;

class TeacherInstrumentModel extends CoreModel
{
/*
    public function createTable()
    {
        $tablePrefix = $this->wpdb->prefix;
        $tableName = $tablePrefix . 'developer_technology';

        $sql = '
            CREATE TABLE `' . $tableName . '` (
                `developer_id` int(8) unsigned NOT NULL,
                `technology_id` int(8) unsigned NOT NULL,
                `level` tinyint(2) unsigned NOT NULL,
                `created_at` datetime NOT NULL,
                `updated_at` datetime NULL
            );
        ';

        // inclusion des fonctions nécessaire pour modifier la bdd
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        dbDelta($sql);

        $primaryKeySQL = 'ALTER TABLE `' . $tableName . '` ADD PRIMARY KEY `developer_id_technology_id` (`developer_id`, `technology_id`)';
        $this->wpdb->query($primaryKeySQL);
    }

    public function dropTable()
    {
        $tablePrefix = $this->wpdb->prefix;
        $tableName = $tablePrefix.'developer_technology';

        $sql = 'DROP TABLE `' . $tableName . '`';
        $this->wpdb->query($sql);
    }


    // STEP E11 CUSTOM TABLE insert
    public function insert($developerId, $technologyId, $level)
    {
        $data = [
            'developer_id' => $developerId,
            'technology_id' => $technologyId,
            'level' => $level,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $tablePrefix = $this->wpdb->prefix;
        $tableName = $tablePrefix . 'developer_technology';

        return $this->wpdb->insert(
            $tableName,
            $data
        );
    }

    

    // STEP E11 CUSTOM TABLE select
    // permet de récupérer pour un développeur toutes les technologies qui lui sont associées
    public function getByTeacherId($teacherId)
    {
        $tablePrefix = $this->wpdb->prefix;
        $tableName = $tablePrefix.'teacher_instrument';

        // IMPORTANT il faut utiliser des requêtes préparées dès qu'il y a des partie variables dans la requêtes. Sinon vous créez des failles de sécurité
        // %d dans la requête signifie qu'il y aura un nombre injecté à cet endroit
        // DOC E11 WPDB query spécification des types de paramètre attendu https://www.php.net/sprintf (%d == nombre; %s == string)
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

    

    public function getByDeveloperIdAndTechnologyId($developerId, $technologyId)
    {
        $tablePrefix = $this->wpdb->prefix;
        $tableName = $tablePrefix.'developer_technology';

        $sql = "
            SELECT * FROM `" . $tableName . "`
            WHERE
                developer_id = %d
                AND technology_id = %d
        ";

        $preparedStatement = $this->wpdb->prepare(
            $sql,
            [
                $developerId,
                $technologyId
            ]
        );
        $rows = $this->wpdb->get_results($preparedStatement);

        return $rows;
    }


    public function deleteByDeveloperId($developerId)
    {
        $tablePrefix = $this->wpdb->prefix;
        $tableName = $tablePrefix.'developer_technology';

        $conditions = [
            'developer_id' => $developerId, // équivalent à WHERE developer_id = $developerId
        ];

        $this->wpdb->delete(
            $tableName,
            $conditions
        );
    }
    */
}

