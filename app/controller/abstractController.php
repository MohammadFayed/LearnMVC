<?php
namespace controller;

class AbstractController
{
    public $load;


    public function __construct()
    {
        $this->load = new \core\Loader();
    }
    public function notFound()
    {
        $this->load->view('notFound');
    }

}

?>