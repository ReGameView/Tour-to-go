<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Clients;

/**
 * ClientsSearch represents the model behind the search form of `app\models\Clients`.
 */
class ClientsSearch extends Clients
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user'], 'integer'],
            [['f', 'i', 'o', 'phone', 'city', 'area', 'street', 'house', 'floor', 'apartment', 'email'], 'safe'],
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
        $query = Clients::find();

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
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'f', $this->f])
            ->andFilterWhere(['like', 'i', $this->i])
            ->andFilterWhere(['like', 'o', $this->o])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'area', $this->area])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'house', $this->house])
            ->andFilterWhere(['like', 'floor', $this->floor])
            ->andFilterWhere(['like', 'apartment', $this->apartment])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
