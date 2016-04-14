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
 * @property string $extra3
 * @property string $extra4
 * @property string $extra5
 * @property string $extra6
 * @property string $extra7
 * @property string $extra8
 * @property string $extra9
 * @property string $date
 *
 * @property ConstructionSite $user
 * @property ConstructionSite $csite
 * @property ConstructionSite $csiteName
 */
class ConstructionDiary extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
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
            // Vladan, don't forget to fix required fields!
            [['user_id', 'csite_id'], 'required'],
            [['user_id', 'csite_id'], 'integer'],
            [['description', 'issues'], 'string'],
            [['date'], 'safe'],
            [['file'], 'file'],
            [['csite_name', 'weather', 'temperature', 'image', 'workers', 'extra1', 'extra2'], 'string', 'max' => 255],
            [['extra3', 'extra4', 'extra5', 'extra6', 'extra7', 'extra8', 'extra9'], 'string', 'max' => 500]
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
            'csite_name' => 'Csite Name',
            'weather' => 'Weather',
            'temperature' => 'Temperature',
            'description' => 'Description',
            'issues' => 'Issues',
            'workers' => 'Workers',
            'image' => 'Image 1',
            'extra1' => 'Image 2',
            'extra2' => 'Image 3',
            'extra3' => 'Image 4',
            'extra4' => 'Extra4',
            'extra5' => 'Extra5',
            'extra6' => 'Extra6',
            'extra7' => 'Extra7',
            'extra8' => 'Extra8',
            'extra9' => 'Extra9',
            'date' => 'Date',
        ];
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCsiteName()
    {
        return $this->hasOne(ConstructionSite::className(), ['csite_name' => 'csite_name']);
    }
}
