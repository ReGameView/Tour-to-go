<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RealProperty;

/**
 * RealPropertySearch represents the model behind the search form of `app\models\RealProperty`.
 */
class RealPropertySearch extends RealProperty
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_type', 'count'], 'integer'],
            [['city', 'area', 'street', 'house', 'floor', 'apartment', 'disc', 'type', 'per'], 'safe'],
            [['price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = RealProperty::find();

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
            'id_type' => $this->id_type,
            'price' => $this->price,
            'count' => $this->count,
        ]);

        $query->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'area', $this->area])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'house', $this->house])
            ->andFilterWhere(['like', 'floor', $this->floor])
            ->andFilterWhere(['like', 'apartment', $this->apartment])
            ->andFilterWhere(['like', 'disc', $this->disc])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'per', $this->per]);

        return $dataProvider;
    }
}
