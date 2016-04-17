<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "construction_site".
 *
 * @property integer $csite_id
 * @property integer $user_id
 * @property string $csite_name
 * @property string $csite_address
 * @property string $csite_city
 * @property string $csite_country
 * @property string $csite_investitor
 * @property string $csite_company
 *
 * @property ConstructionDiary[] $constructionDiaries
 * @property ConstructionDiary[] $constructionDiaries0
 * @property ConstructionDiary[] $constructionDiaries1
 * @property User $user
 */
class ConstructionSite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'construction_site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'csite_name', 'csite_address', 'csite_city', 'csite_country', 'csite_investitor', 'csite_company'], 'required'],
            [['user_id'], 'integer'],
            [['csite_name', 'csite_address', 'csite_city', 'csite_country', 'csite_investitor', 'csite_company'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'csite_id' => 'Csite ID',
            'user_id' => 'User ID',
            'csite_name' => 'Construction site',
            'csite_address' => 'Address',
            'csite_city' => 'City',
            'csite_country' => 'Country',
            'csite_investitor' => 'Investitor',
            'csite_company' => 'Company',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConstructionDiaries()
    {
        return $this->hasMany(ConstructionDiary::className(), ['csite_name' => 'csite_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConstructionDiaries0()
    {
        return $this->hasMany(ConstructionDiary::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConstructionDiaries1()
    {
        return $this->hasMany(ConstructionDiary::className(), ['csite_id' => 'csite_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    
}
