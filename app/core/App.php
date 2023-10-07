<?php

class App {
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parse_url();

        if (file_exists('app/controllers/' . $url[0] . 'Control.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        elseif ($url[0] == '') {
            $this->controller = 'Home';
        }
        
        else {
            $this->controller = 'Error404';
        }

        require_once 'app/controllers/' . $this->controller . 'Control.php';
        $this->controller = new $this->controller;
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        if ($url) {
            $this->params = array_values($url);
        }
        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    public function parse_url(){
        if (isset($_SERVER['REQUEST_URI'])) {
            $url = rtrim($_SERVER['REQUEST_URI'], '/');
            $url = ltrim($url, '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = ltrim($url, '?');
            $url = explode('/', $url);
            return $url;
        }
    }
}

?>
