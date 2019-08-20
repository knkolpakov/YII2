<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ActivityForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Add Activity';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-add-activity">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('activityFormSubmitted')): ?>

        <div class="alert alert-success">
            Событие добавленно
        </div>

        <div><a href="http://localhost:81/site">Вернуться к календарю</a></div>

        

    <?php else: ?>


        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'activity-form']); ?>

                    <?= $form->field($model, 'date')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'title') ?>

                    <?= $form->field($model, 'start_date') ?>

                    <?= $form->field($model, 'end_date') ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'cycle')->checkBox() ?>

                    <?= $form->field($model, 'main')->checkBox() ?>

                    

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'activity-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
