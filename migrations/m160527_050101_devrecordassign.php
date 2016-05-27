<?php

use yii\db\Schema;

class m160527_050101_devrecordassign extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('dev_record_assign', [
            'id' => $this->primaryKey(),
            'dpd' => $this->integer(11),
            'cn' => $this->integer(11),
            'md' => $this->integer(11),
            'vw' => $this->string(100),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('dev_record_assign');
    }
}
