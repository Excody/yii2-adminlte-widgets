<?php

namespace excody\adminltewidgets\widgets;

use excody\adminltewidgets\Background;
use yii\helpers\Html;

class InfoBox extends \yii\base\Widget
{

    public $backgroundClass = Background::AQUA;
    public $iconHtml = '<i class="fa fa-envelope-o"></i>';
    public $text;
    public $number;

    /**
     * @return string
     */
    public function run()
    {
        $boxContent = $this->renderBoxContent();
        $boxIconContainer = $this->renderIconContainer();
        $infoBox = Html::tag('div', $boxIconContainer.$boxContent, [
            'class' => 'info-box',
        ]);
        return $infoBox;
    }

    /**
     * @return string
     */
    protected function renderNumberContainer() {
        $numberContainer = Html::tag('span', $this->number, [
            'class' => ['info-box-number']
        ]);
        return $numberContainer;
    }

    /**
     * @return string
     */
    protected function renderTextContainer() {
        $textContainer =  Html::tag('span', $this->text, [
            'class' => ['info-box-text']
        ]);
        return $textContainer;
    }

    /**
     * @return string
     */
    protected function renderBoxContent() {
        $textContainer = $this->renderTextContainer();
        $numberContainer = $this->renderNumberContainer();
        $boxContent = Html::tag('div', $textContainer.$numberContainer, [
            'class' => 'info-box-content',
        ]);
        return $boxContent;
    }

    /**
     * @return string
     */
    protected function renderIconContainer() {
        $boxIconContainer = Html::tag('span', $this->iconHtml, [
            'class' => ['info-box-icon', $this->backgroundClass]
        ]);
        return $boxIconContainer;
    }

}