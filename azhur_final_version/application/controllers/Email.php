<?php

class Email extends CI_Controller
{

    //контроллер для верификации имейла для отзывов. здесь важен токен

    public function index()
    {
        show_404();
    }

    public function verification($token = NULL)
    {
        if ($token == NULL) {
            show_404();
        }
        $this->load->model('Email_model', '', TRUE);
        //Если мы успешно поймали токен и он есть в базе данных с комментариями, то подтверждаем имейл и грузим страницу успеха; иначе - 404
        if (!$this->Email_model->verify($token)) {
            show_404();
        } else {
            $this->load->helper('url');
            $data['message'] = "Email успешно подтвержден!\n Теперь Ваш отзыв отображается на сайте.";
            $this->load->view('templates/header');
            $this->load->view('pages/success', $data);
            $this->load->view('templates/footer');
        }
    }
}