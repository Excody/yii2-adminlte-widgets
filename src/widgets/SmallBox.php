<?php
/**
 * Created by PhpStorm.
 * User: hunter
 * Date: 17.09.18
 * Time: 13:30
 */

namespace excody\adminltewidgets\widgets;


use excody\adminltewidgets\Background;
use yii\base\Widget;
use yii\helpers\Html;

class SmallBox extends Widget
{

    public $backgroundClass = Background::AQUA;
    public $icon = '<i class="fa fa-shopping-cart"></i>';
    public $title;
    public $description;

    public $url = '#';
    public $urlText = 'More info';
    public $urlIcon = '<i class="fa fa-arrow-circle-right"></i>';

    /**
     * @return string
     */
    public function run()
    {
        return Html::tag(
            'div',
            $this->renderInner().$this->renderIcon().$this->renderLink(),
            ['class' => ['small-box', $this->backgroundClass]]
        );
    }

    /**
     * @return string
     */
    protected function renderInner() {
        $title = Html::tag('h3', $this->title);
        $description = Html::tag('p', $this->description);
        return Html::tag('div', $title.$description, [
            'class' => ['inner'],
        ]);
    }

    /**
     * @return string
     */
    protected function renderLink() {
        return Html::a(
            $this->urlText.$this->urlIcon,
            $this->url,
            ['class' => ['small-box-footer']]
        );
    }

    /**
     * @return string
     */
    protected function renderIcon() {
        return Html::tag('div', $this->icon, ['class' => ['icon']]);
    }


}