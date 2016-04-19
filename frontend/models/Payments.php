<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "payments".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $active
 * @property string $payment_date
 * @property integer $payment_expire_on
 * @property string $paid_by
 * @property integer $paid_amount
 * @property integer $p_extra1
 * @property integer $p_extra2
 * @property integer $p_extra3
 *
 * @property User $id0
 */
class Payments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['user_id'], 'required'],
            [['user_id', 'paid_amount', 'p_extra1', 'p_extra2', 'p_extra3'], 'integer'],
            [['active'], 'string'],
            [['payment_date', 'payment_expire_on', 'paid_by'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'active' => 'Active',
            'payment_date' => 'Payment Date',
            'payment_expire_on' => 'Payment Expire On',
            'paid_by' => 'Paid By',
            'paid_amount' => 'Paid Amount',
            'p_extra1' => 'P Extra1',
            'p_extra2' => 'P Extra2',
            'p_extra3' => 'P Extra3',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }
}
