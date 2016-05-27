<?php

use yii\db\Schema;

class m160527_050101_devrecord extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('dev_record', [
            'id' => $this->primaryKey(),
            'tabel_name' => $this->string(100),
            'type_class' => $this->string(2),
            'class_name' => $this->string(100),
            'ns' => $this->string(200),
            'has_realation' => $this->string(10),
            'id_dev_project' => $this->integer(11),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('dev_record');
    }
}
