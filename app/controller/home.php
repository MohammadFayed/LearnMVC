<?php
namespace controller;

class Home extends AbstractController
{
    public function defualt()
    {
        $data['title'] = 'home';
        $this->load->view('home/defualt', $data);
    }
}
?>