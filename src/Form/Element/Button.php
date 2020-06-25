<?php

declare(strict_types=1);

namespace PHPCensor\Form\Element;

use PHPCensor\Form\Input;
use PHPCensor\View;

class Button extends Input
{
    /**
     * @return bool
     */
    public function validate()
    {
        return true;
    }

    /**
     * @param View $view
     */
    protected function onPreRender(View &$view)
    {
        parent::onPreRender($view);

        $view->type = 'button';
    }
}
