<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Payments;

/**
 * PaymentsSearch represents the model behind the search form about `frontend\models\Payments`.
 */
class PaymentsSearch extends Payments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'payment_expire_on', 'paid_amount', 'p_extra1', 'p_extra2', 'p_extra3'], 'integer'],
            [['active', 'payment_date', 'paid_by'], 'safe'],
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
        $query = Payments::find();

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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'payment_expire_on' => $this->payment_expire_on,
            'paid_amount' => $this->paid_amount,
            'p_extra1' => $this->p_extra1,
            'p_extra2' => $this->p_extra2,
            'p_extra3' => $this->p_extra3,
        ]);

        $query->andFilterWhere(['like', 'active', $this->active])
            ->andFilterWhere(['like', 'payment_date', $this->payment_date])
            ->andFilterWhere(['like', 'paid_by', $this->paid_by]);

        return $dataProvider;
    }
}
