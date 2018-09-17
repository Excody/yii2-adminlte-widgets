<?php
/**
 * Created by PhpStorm.
 * User: hunter
 * Date: 17.09.18
 * Time: 13:15
 */

namespace excody\adminltewidgets\widgets;


use yii\helpers\Html;

class InfoBoxProgressBar extends InfoBox
{

    /**
     * @var null|float
     */
    public $progressPercent;

    /**
     * @var string|null
     */
    public $progressDescription;

    /**
     * @return string
     */
    public function run()
    {
        $boxContent = $this->renderBoxContent();
        $boxIconContainer = $this->renderIconContainer();
        $infoBox = Html::tag('div', $boxIconContainer.$boxContent, [
            'class' => ['info-box', $this->backgroundClass],
        ]);
        return $infoBox;
    }

    /**
     * @return string
     */
    protected function renderIconContainer() {
        $boxIconContainer = Html::tag('span', $this->iconHtml, [
            'class' => ['info-box-icon']
        ]);
        return $boxIconContainer;
    }

    /**
     * @return string
     */
    protected function renderBoxContent()
    {
        $textContainer = $this->renderTextContainer();
        $numberContainer = $this->renderNumberContainer();
        $progressTags = $this->renderProgressTags();
        $infoBox = Html::tag(
            'div',
            $textContainer.$numberContainer.$progressTags,
            [
                'class' => 'info-box-content',
            ]
        );
        return $infoBox;
    }

    /**
     * @return string
     */
    protected function renderProgressTags() {
        $bar = Html::tag('div', '', [
            'class' => 'progress-bar',
            'style' => ['width' => ((float) $this->progressPercent).'%'],
        ]);
        $progress = Html::tag(
            'div',
            $bar,
            ['class' => ['progress']]
        );
        $description = Html::tag('span', $this->progressDescription, [
            'class' => 'progress-description'
        ]);
        return $progress.$description;
    }

}