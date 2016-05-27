<?php

use yii\db\Schema;

class m160527_050101_devproject extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('dev_project', [
            'id' => $this->primaryKey(),
            'module_name' => $this->string(100),
            'module_class' => $this->string(100),
            'module_link' => $this->string(200),
            'start_date' => $this->date(),
            'end_date' => $this->date(),
            'status' => $this->string(10),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('dev_project');
    }
}
