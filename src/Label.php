<?php
/**
 * Created by PhpStorm.
 * User: hunter
 * Date: 17.09.18
 * Time: 14:31
 */

namespace excody\adminltewidgets;


use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class Label
{
    const TYPE_DEFAULT  = 'type-default';
    const TYPE_PRIMARY  = 'type-primary';
    const TYPE_SUCCESS  = 'type-success';
    const TYPE_INFO     = 'type-info';
    const TYPE_WARNING  = 'type-warning';
    const TYPE_DANGER   = 'type-danger';

    /**
     * @param $text
     * @param string $typeClass
     * @param array $options
     * @return string
     */
    public static function span($text, $typeClass = '', $options = []) {
        $class = ArrayHelper::merge(
            $options,
            ['class' => ['label', $typeClass]]
        );
        return Html::tag('span', $text, $class);
    }

}