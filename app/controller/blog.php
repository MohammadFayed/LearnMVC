<?php
namespace controller;

class Blog extends AbstractController
{
    public function defualt()
    {
        echo "you are in blog controller and defualt method";
    }
    public function add()
    {
        $data = array(
            'noNav' => '',
            'name' => 'mohammad'
        );
    //    echo "add action";
        $this->load->view('blog/add', $data);
    }
}
?>