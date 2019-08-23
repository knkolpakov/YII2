<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchActivity */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admin';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-default-index">
    <h1><?= $this->title = 'Admin'; ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <code>

    <div>
        <?= Html::a('Все активности', ['activity/index']) ?>
    </div>
    <div>
        <?= Html::a('Все пользователи', ['users/index']) ?>
    </div>
 
    
    </code>
</div>