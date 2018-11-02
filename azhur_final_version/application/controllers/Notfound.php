<?php

class NotFound extends CI_Controller
{
    //этот контроллер вызывается при ошибке 404

    public function index($page = 'index')
    {
        $this->load->helper('url');
        $this->load->view('pages/404');
    }
}