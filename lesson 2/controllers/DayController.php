<?php

namespace app\controllers;

use app\models\Day;
use yii\web\Controller;

class DayController extends Controller
{

    public function actionView()
    {
        $model = new Day();
        $model->id = 3;
        $model->working = 'Нет';
        $model->weekend = 'Да';
        $model->activity_id = 5;

        return $this->render('day', ['model'=>$model]);


    }
}
