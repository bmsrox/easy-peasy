<?php

namespace easyPeasy;

class Controller extends WebApplication
{
    public function render($view, $params = [])
    {
        return $this->getView()->render($view, $params);
    }
}