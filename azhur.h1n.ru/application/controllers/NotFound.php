<?php
class NotFound extends CI_Controller{

    public function index($page = 'index')
    {
        $this->load->helper('url');
        $this->load->view('pages/404');
    }
}