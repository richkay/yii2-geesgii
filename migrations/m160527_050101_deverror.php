<?php

use yii\db\Schema;

class m160527_050101_deverror extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('dev_error', [
            'id' => $this->primaryKey(),
            'idmodule' => $this->integer(11),
            'error_name' => $this->string(100),
            'error_note' => $this->text(),
            'error_date' => $this->date(),
            'errot_done' => $this->date(),
            'solution' => $this->text(),
            'solution_from' => $this->text(),
            'link_reference' => $this->text(),
            'note' => $this->text(),
            'status' => $this->smallInteger(1),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('dev_error');
    }
}
