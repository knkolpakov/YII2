<?php

/** @var \app\models\Day $model */

foreach ($model as $key => $value){
    echo $model->getAttributeLabel($key).": ".$value. "<br/>";
}