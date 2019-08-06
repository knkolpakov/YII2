<?php

namespace app\components;
use yii\base\Component;

class SesComponent extends Component
{

    public $last_page;


    public function init()
    {
        parent::init();
        $this->last_page = $_SERVER['HTTP_REFERER'];
        $_SESSION['url'] = $this->last_page;
    }


}