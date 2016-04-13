<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\ConstructionDiary;

/**
 * ConstructionDiarySearch represents the model behind the search form about `frontend\models\ConstructionDiary`.
 */
class ConstructionDiarySearch extends ConstructionDiary
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['csdiary_id', 'user_id', 'csite_id'], 'integer'],
            [['csite_name', 'weather', 'temperature', 'description', 'issues', 'image', 'workers', 'extra1', 'extra2', 'extra3', 'date'], 'safe'],
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
        $query = ConstructionDiary::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'csdiary_id' => $this->csdiary_id,
            'user_id' => $this->user_id,
            'csite_id' => $this->csite_id,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'csite_name', $this->csite_name])
            ->andFilterWhere(['like', 'weather', $this->weather])
            ->andFilterWhere(['like', 'temperature', $this->temperature])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'issues', $this->issues])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'workers', $this->workers])
            ->andFilterWhere(['like', 'extra1', $this->extra1])
            ->andFilterWhere(['like', 'extra2', $this->extra2])
            ->andFilterWhere(['like', 'extra3', $this->extra3]);

        return $dataProvider;
    }
}
