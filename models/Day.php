<?php

namespace app\models;

use yii\base\Model;


class Day extends Model
{
    public $id;
    public $working;
    public $weekend;
    public $activity_id;

    public function attributeLabels()
    {
        return [
            'id'=>'id',
            'working'=>'Рабочий день',
            'weekend'=>'Выходной',
            'activity_id'=>'id события',
        ];


    }


}