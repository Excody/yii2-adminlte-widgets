<?php
/**
 * Created by PhpStorm.
 * User: hunter
 * Date: 17.09.18
 * Time: 13:46
 */

namespace excody\adminltewidgets\widgets;


use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class Box extends Widget
{

    const BOX_DEFAULT   = 'box-default';
    const BOX_PRIMARY   = 'box-primary';
    const BOX_INFO      = 'box-info';
    const BOX_WARNING   = 'box-warning';
    const BOX_SUCCESS   = 'box-success';
    const BOX_DANGER    = 'box-danger';

    const BOX_SOLID     = 'box-solid';
    const BOX_COLLAPSED = 'box-collapsed';

    /**
     * @var array
     */
    public $boxContainerClasses = [];

    /**
     * @var string
     */
    public $boxTitle;

    /**
     * @var array|string|null
     */
    public $headerTools;

    /**
     * @var bool
     */
    public $needOverlay = false;

    /**
     * @var string
     */
    public $overlayIcon = '<i class="fa fa-refresh fa-spin"></i>';

    /**
     * @var string|array|null
     */
    public $footer;

    /**
     * Initializes the widget.
     * This renders the form open tag.
     */
    public function init()
    {
        parent::init();
        ob_start();
        ob_implicit_flush(false);
    }

    /**
     * Runs the widget.
     */
    public function run()
    {
        $content = ob_get_clean();
        $body = $this->renderBody($content);
        $overlay = $this->renderOverlay();
        $header = $this->renderHeader();
        $footer = $this->renderFooter();

        $html = Html::tag('div', $header.$body.$overlay.$footer, [
            'class' => $this->getBoxClasses()
        ]);

        return $html;
    }

    /**
     * @return array
     */
    protected function getBoxClasses() {
        $default = ['box'];
        $added = $this->boxContainerClasses;
        return ArrayHelper::merge($default, $added);
    }

    /**
     * @return string
     */
    protected function renderHeader() {
        $title = Html::tag('h3', $this->boxTitle, ['class' => ['box-title']]);
        $tools = $this->renderTools();
        $container = Html::tag('div', $title.$tools, [
            'class' => 'box-header'
        ]);
        return $container;
    }

    /**
     * @return array|null|string
     */
    protected function renderTools() {
        $tools = null;
        if (ArrayHelper::isTraversable($this->headerTools)) {
            $tools = implode("\n", $this->headerTools);
        } else if (is_string($this->headerTools)) {
            $tools = $this->headerTools;
        }
        if ($tools !== null) {
            $tools = Html::tag('div', $tools, [
                'class' => ['box-tools pull-right'],
            ]);
        }
        return $tools;
    }

    /**
     * @param $content
     * @param array $options
     * @return string
     */
    protected function renderBody($content, $options = []) {
        return Html::tag('div', $content, ArrayHelper::merge(
            ['class' => ['box-body']],
            $options
        ));
    }

    /**
     * @return null|string
     */
    protected function renderOverlay() {
        if (!$this->needOverlay) return null;
        return Html::tag('div', $this->overlayIcon, ['class' => 'overlay']);
    }

    /**
     * @return null|string
     */
    protected function renderFooter() {
        $footer = null;
        if (ArrayHelper::isTraversable($this->footer)) {
            $footer = implode("\n", $this->footer);
        } else if (is_string($this->footer)) {
            $footer = $this->footer;
        }
        if ($footer !== null) {
            $footer = Html::tag('div', $footer, [
                'class' => ['box-footer'],
            ]);
        }
        return $footer;
    }

    /**
     * @return string
     */
    public static function renderExpandToolButton() {
        return Html::button(
            '<i class="fa fa-plus"></i>',
            [
                'class' => ['btn', 'btn-box-tool'],
                'data-widget' => 'collapse'
            ]
        );
    }

    /**
     * @return string
     */
    public static function renderRemoveToolButton() {
        return Html::button(
            '<i class="fa fa-times"></i>',
            [
                'class' => ['btn', 'btn-box-tool'],
                'data-widget' => 'remove'
            ]
        );
    }

    /**
     * @return string
     */
    public static function renderCollapseToolButton() {
        return Html::button(
            '<i class="fa fa-minus"></i>',
            [
                'class' => ['btn', 'btn-box-tool'],
                'data-widget' => 'collapse'
            ]
        );
    }

}