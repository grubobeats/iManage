<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "construction_diary".
 *
 * @property integer $csdiary_id
 * @property integer $user_id
 * @property integer $csite_id
 * @property string $csite_name
 * @property string $weather
 * @property string $temperature
 * @property string $description
 * @property string $issues
 * @property string $image
 * @property string $workers
 * @property string $extra1
 * @property string $extra2
 *
 * @property ConstructionSite $csiteName
 * @property ConstructionSite $user
 * @property ConstructionSite $csite
 */
class ConstructionDiary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;

    public static function tableName()
    {
        return 'construction_diary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'csite_id', 'csite_name', 'weather', 'temperature', 'description'], 'required'],
            [['user_id', 'csite_id'], 'integer'],
            [['file'], 'file'],
            [['description', 'issues'], 'string'],
            [['csite_name', 'weather', 'temperature', 'image', 'workers', 'date'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'csdiary_id' => 'Csdiary ID',
            'user_id' => 'User ID',
            'csite_id' => 'Csite ID',
            'csite_name' => 'Construction site',
            'weather' => 'Weather',
            'temperature' => 'Temperature',
            'description' => 'Description',
            'issues' => 'Issues',
            'image' => 'Image',
            'workers' => 'Workers',
            'extra1' => 'Extra1',
            'extra2' => 'Extra2',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCsiteName()
    {
        return $this->hasOne(ConstructionSite::className(), ['csite_name' => 'csite_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(ConstructionSite::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCsite()
    {
        return $this->hasOne(ConstructionSite::className(), ['csite_id' => 'csite_id']);
    }
}
