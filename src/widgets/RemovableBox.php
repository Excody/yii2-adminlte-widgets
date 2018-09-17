<?php
/**
 * Created by PhpStorm.
 * User: hunter
 * Date: 17.09.18
 * Time: 14:22
 */

namespace excody\adminltewidgets\widgets;


class RemovableBox extends Box
{

    public function init()
    {
        parent::init();
        $this->headerTools = [
            Box::renderRemoveToolButton(),
        ];
    }

}