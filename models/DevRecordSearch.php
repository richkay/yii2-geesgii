<?php

namespace richkay\geesgii\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use richkay\geesgii\models\DevRecord;

/**
 * DevRecordSearch represents the model behind the search form about `richkay\geesgii\models\DevRecord`.
 */
class DevRecordSearch extends DevRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_dev_project'], 'integer'],
            [['tabel_name', 'type_class', 'class_name', 'ns', 'has_realation'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = DevRecord::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_dev_project' => $this->id_dev_project,
        ]);

        $query->andFilterWhere(['like', 'tabel_name', $this->tabel_name])
            ->andFilterWhere(['like', 'type_class', $this->type_class])
            ->andFilterWhere(['like', 'class_name', $this->class_name])
            ->andFilterWhere(['like', 'ns', $this->ns])
            ->andFilterWhere(['like', 'has_realation', $this->has_realation]);

        return $dataProvider;
    }
}
