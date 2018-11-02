<?php

class Order extends CI_Controller
{

    public function index($page = 'index')
    {

        $data['id'] = '';

        if ($page !== 'index') {
            //если пришли сюда из каталога, то ID передлось в адресной строке, мы его цепляем оттуда
            if (!ctype_digit($page)) {
                show_404();
            } else {
                $data['id'] = $page;
            }
        }

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        // проверяем, пуста ли форма. Если да, грузим обычную страницу; иначе посылаем имейл и грузим страницу успеха
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header');
            $this->load->view('pages/order', $data);
            $this->load->view('templates/footer');
        } else {

            $this->load->library('email');

            $this->email->from('send@azhur.h1n.ru', $this->input->post('name'));
            $this->email->to('abakalova@azhur.h1n.ru');

            $this->email->subject($this->input->post('product_name') . " " . $this->input->post('id'));

            $this->email->message($this->input->post('comment') . "\nКонтакты:\n" . $this->input->post('phone') . "\n" . $this->input->post('email'));

            $this->email->send();


            $data['message'] = 'Ваше письмо было успешно отправлено! Спасибо!';
            $this->load->view('templates/header');
            $this->load->view('pages/success', $data);
            $this->load->view('templates/footer');
        }
    }


}