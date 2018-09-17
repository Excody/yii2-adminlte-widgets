<?php
/**
 * Created by PhpStorm.
 * User: hunter
 * Date: 17.09.18
 * Time: 14:16
 */

namespace excody\adminltewidgets\widgets;

class ExpandableBox extends Box
{

    /**
     * @return void
     */
    public function init()
    {
        parent::init();
        $this->boxContainerClasses[] = Box::BOX_COLLAPSED;
        $this->headerTools = [
            Box::renderExpandToolButton()
        ];
    }

}