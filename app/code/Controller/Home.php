<?php

namespace Controller;

use Core\AbstractController;
use Helper\Url;

class Home extends AbstractController
{
    public function index()
    {
        $this->render('parts/home');
    }
}
