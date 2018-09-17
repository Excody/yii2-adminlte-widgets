<?php
/**
 * Created by PhpStorm.
 * User: hunter
 * Date: 17.09.18
 * Time: 14:28
 */

namespace excody\adminltewidgets;


use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class Badge
{

    /**
     * @param $text
     * @param string $bgClass
     * @param array $options
     * @return string
     */
    public static function span($text, $bgClass = '', $options = []) {
        $class = ArrayHelper::merge(
            $options,
            ['class' => ['badge', $bgClass]]
        );
        return Html::tag('span', $text, $class);
    }

}