<?php

use yii\db\Schema;

class m160527_050101_devprojectdetail extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('dev_project_detail', [
            'id' => $this->primaryKey(),
            'id_dev_project' => $this->integer(11),
            'module_child' => $this->string(100),
            'status' => $this->smallInteger(1),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('dev_project_detail');
    }
}
