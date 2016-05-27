<?php

namespace richkay\geesgii\models\query;

/**
 * This is the ActiveQuery class for [[DevRecord]].
 *
 * @see DevRecord
 */
class DevRecordQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return DevRecord[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DevRecord|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
