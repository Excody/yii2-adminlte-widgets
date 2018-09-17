<?php
/**
 * Created by PhpStorm.
 * User: hunter
 * Date: 17.09.18
 * Time: 14:24
 */

namespace excody\adminltewidgets\widgets;


class CollapsableBox extends Box
{

    /**
     * @return void
     */
    public function init()
    {
        parent::init();
        $this->headerTools = [
            Box::renderCollapseToolButton()
        ];
    }
}