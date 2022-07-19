<?php

namespace Core;

use Helper\Url;

class AbstractController
{
    protected array $data;

    public function __construct()
    {
        $this->data = [];
        $this->data['title'] = 'Egzaminas';
        $this->data['meta_description'] = '';
    }

    protected function render($template)
    {
        include_once PROJECT_ROOT_DIR . '/app/design/parts/header.php';
        include_once PROJECT_ROOT_DIR . '/app/design/' . $template . '.php';
        include_once PROJECT_ROOT_DIR . '/app/design/parts/footer.php';
    }

    public function url($path, $param = null)
    {
        return Url::link($path, $param);
    }
}
