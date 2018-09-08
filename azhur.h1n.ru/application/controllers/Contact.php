<?php
class Contact extends CI_Controller{

    //просто грузим страничку
    public function index($page = 'index'){

        if ( $page!=='index')
        {
            show_404();
        }

        $this->load->helper('url');
        $this->load->view('templates/header');
        $this->load->view('pages/contact');
        $this->load->view('templates/footer');
    }
}