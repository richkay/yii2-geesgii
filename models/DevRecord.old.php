<?php

namespace richkay\geesgii\models;

use Yii;

/**
 * This is the model class for table "dev_record".
 *
 * @property integer $id
 * @property string $tabel_name
 * @property string $type_class
 * @property string $class_name
 * @property string $ns
 * @property string $has_realation
 * @property integer $id_dev_project
**/
class DevRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dev_record';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_dev_project'], 'integer'],
            [['tabel_name', 'class_name'], 'string', 'max' => 100],
            [['type_class'], 'string', 'max' => 2],
            [['ns'], 'string', 'max' => 200],
            [['has_realation'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tabel_name' => 'Tabel Name',
            'type_class' => 'Type Class',
            'class_name' => 'Class Name',
            'ns' => 'Ns',
            'has_realation' => 'Has Realation',
            'id_dev_project' => 'Id Dev Project',
        ];
    }
	

}
