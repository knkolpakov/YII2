<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 03/08/2019
 * Time: 13:26
 */

namespace app\controllers;

use Yii;
use app\models\Activity;
use app\models\ActivityForm;
use yii\web\Controller;

class ActivityController extends Controller
{
    public function actionProfile() {
        echo 'Мы пришли куда хотели';
    }

    public function actionView()
    {
        $model = new Activity();
        $model->id = 5;
        $model->title = '5 активность';
        $model->body = 'Тело пятого активности';
        $model->start_date = time();
        $model->end_date = time()+24*60*60;
        $model->author_id = 1;
        $model->cycle = true;
        $model->main = true;

        $model->attributes = [
            'id' => 6,
            'title' => 6,
            'body' => 6,
            'end_date' => 6,
        ];


        return $this->render('view', ['model'=>$model]);


    }

    public function actionAdd(){

        $model = new ActivityForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()){
                Yii::$app->session->setFlash('activityFormSubmitted');

                return $this->refresh();
            }

        }
        return $this->render('addactivity', [
            'model' => $model,
        ]);
    }

    public function actionDb(){
        \Yii::$app->db->createCommand()->insert('activity',[
            'author_id'=> 1,
            'title'=>'тест',
            'body'=>'тест тест',
            'start_date'=> time() + 60 * 60 * 24,
            'end_date'=> time() + 60 * 60 * 24 *2,
            'cycle'=> false,
            'main'=> false,
            'created_at'=> time(),
            'updated_at'=> time()
            ])->execute();
    }
}

//http://yii2basic.geekbrains:81/user/profile