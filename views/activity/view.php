<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 03/08/2019
 * Time: 13:46
 */

/** @var \app\models\Activity $model */
?>
    <h1>Дата</h1>
        <h2><?php echo $model['start_date']?></h2>
    <div><br>Название события: </div>
        <div><?php echo $model['title']?></div>
    <br>
    <div>Описание события: </div>
        <div><?php echo $model['body']?></div>
    <br>
    <div>Начало: </div>
        <div><?php echo $model['start_date']?></div>
    <br>
    <div>Окончание: </div>
        <div><?php echo $model['end_date']?></div>
    <br>
    <div>Автор: </div>
        <div><?php echo $model['author_id']?></div>
    <br>
    <div>Повторяется: </div>
        <div><?php echo $model['cycle']?></div>
    <br>
    <div><a href="#">Редактировать</a></div>
    <br><br>
    <div><a href="http://localhost:81/site">Вернуться к календарю</a></div>

   




