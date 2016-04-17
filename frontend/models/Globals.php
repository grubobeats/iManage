<?php

namespace frontend\models;

use Yii;

/**
*  My global class with objects
*/
class Globals extends \yii\db\ActiveRecord
{
	
	/*
     * return everything from database;
     */ 
    public function getFromDB($what, $table, $where, $equal) {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand('
            SELECT `' . $what . '` FROM `' . $table . '` WHERE `' . $where . '` = "' . $equal . '";');
        $result = $command->queryAll();
        return $result[0][$what];

    }
}









?>
