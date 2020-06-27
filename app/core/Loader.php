<?php
namespace core;

class Loader
{
    public function view($view, $data = array())
    {
        $view = trim($view , '/');
        $view = VIEW_PATH . str_replace('/' , DS , $view) . ".php";
        if (!file_exists($view)) :
            $view = VIEW_PATH . "notFound.php";
        endif;
        extract($data);
        require_once TEMPLATE . "header.php";
        
        require_once $view;
        require_once TEMPLATE . "footer.php";
    }
    

}

?>