<?php
namespace core;

class FrontController
{
    private $_Controller = 'Home';
    private $_Method = 'defualt';
    private $_Params = array();

    public function __construct()
    {
        $this->_parseUrl();

        $controllerClassName = 'controller\\' . $this->_Controller;

        if (!class_exists($controllerClassName)) {
            $controllerClassName = 'controller\NotFound';
        }
        $class = new $controllerClassName();
        $action = $this->_Method;
        if (!method_exists($class, $action)) {
            $action = 'notFound';
        }
        // $class->$action();
        $refelction = new \ReflectionMethod($class, $action);
        $numberOfParams = $refelction->getNumberOfParameters();
        if ($numberOfParams > 0) :
            if(!empty($this->_Params)) {
                call_user_func_array(array($class, $action), $this->_Params);
            }else {
                $class->notFound();
            }
        else :
            $class->$action();
        endif;


    }

    private function _getUrl()
    {
        return $url = trim($_SERVER['REQUEST_URI'], '/');
    }
    private function _parseUrl()
    {
        if (!empty($this->_getUrl())) :
            $url = explode('/', $this->_getUrl());
            if (!empty($url)) :
                if (isset($url[0])) {
                    $this->_Controller = $url[0];
                    unset($url[0]);
                }
                if(isset($url[1])) {
                    $this->_Method = $url[1];
                    unset($url[1]);
                }
                $this->_Params = !empty($url) ? array_values($url) : array();
            endif;
            
        endif;
    }
}


?>