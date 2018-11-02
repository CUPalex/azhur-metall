<?php

class Order_phone extends CI_Controller
{

    public function index($page = 'index')
    {

        if ($page !== 'index') {
            show_404();
        }

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        // проверяем, пуста ли форма. Если да, грузим обычную страницу; иначе посылаем имейл и грузим страницу успеха
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header');
            $this->load->view('pages/order_phone');
            $this->load->view('templates/footer');
        } else {
            $this->load->library('email');

            $this->email->from('send@azhur.h1n.ru', $this->input->post('name'));
            $this->email->to('abakalova@azhur.h1n.ru');

            $this->email->subject("Order");

            $this->email->message($this->input->post('comment') . "\nКонтакты:\n" . $this->input->post('phone') . "\n" . $this->input->post('email'));

            $this->email->send();


            $data['message'] = 'Ваше письмо было успешно отправлено! Спасибо!';
            $this->load->view('templates/header');
            $this->load->view('pages/success', $data);
            $this->load->view('templates/footer');
        }
    }


}