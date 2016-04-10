<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\ConstructionSite;

/**
 * ConstructionSiteSearch represents the model behind the search form about `frontend\models\ConstructionSite`.
 */
class ConstructionSiteSearch extends ConstructionSite
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['csite_id', 'user_id'], 'integer'],
            [['csite_name', 'csite_address', 'csite_city', 'csite_country', 'csite_investitor', 'csite_company'], 'safe'],
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
        $query = ConstructionSite::find();

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
            'csite_id' => $this->csite_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'csite_name', $this->csite_name])
            ->andFilterWhere(['like', 'csite_address', $this->csite_address])
            ->andFilterWhere(['like', 'csite_city', $this->csite_city])
            ->andFilterWhere(['like', 'csite_country', $this->csite_country])
            ->andFilterWhere(['like', 'csite_investitor', $this->csite_investitor])
            ->andFilterWhere(['like', 'csite_company', $this->csite_company]);

        return $dataProvider;
    }
}
