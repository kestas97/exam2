<?php
namespace Controller;

use Core\AbstractController;

class Error extends AbstractController
{
    public function error404()
    {
        $this->render('parts/errors/error404');
    }
}