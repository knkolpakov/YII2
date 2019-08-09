<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ActivityForm extends Model
{
    public $date;
    public $title;
    public $start_date;
    public $end_date;
    public $body;
    public $cycle;
    public $main;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [[ 'date', 'title', 'start_date', 'end_date', 'cycle', 'main'], 'required'],
            [['date'], 'dateFormat'],
            [['start_date'], 'dateFormat'],
            [['end_date'], 'dateFormat'],
            [['title'], 'safe'],
            
        ];
    }

    public function dateFormat($attr, $value){

        if(preg_match("/\d{2}.\d{2}.\d{4}/", $this->$attr)){
            
        }else{
            $this->addError($attr, 'Формат дд.мм.гггг');
        }
    }

}
