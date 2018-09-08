<?php
class About extends CI_Controller{

    public function index($page = 'index'){

        if ( $page!=='index')
        {
            show_404();
        }

        //Заполняем страничку
        $this->load->model('About_model', '', TRUE);
        $data['places'] = $this->About_model->get_places();
        $data['people'] = $this->About_model->get_people();
        $data['comments'] = $this->About_model->get_comment();
        //Это становится не нулл, если комментарий повторно отправлен
        $data['comment_error'] = null;
        // Это аватарка, которая будет, если пользователь прокомментирует
        $data['image'] = 'img/avatar'.rand(1, 8).'.jpg';

        // Если был отправлен комментарий, идем сюда
        if ($this->input->post('usr')) {

            $token = $this->About_model->generateStr();
            $insert  = $this->About_model->insert_comment($this->input->post('usr'), $this->input->post('comment'), date('Y-m-j'),$this->input->post('cont'), $token,$this->input->post('image'));

            //Если не получилось корректно добавить, заполняем comment_error и загружаем страницу
            if ($insert!==''){
                $data['comment_error'] = $insert;
                $this->load->helper('url');
                $this->load->view('templates/header');
                $this->load->view('pages/about', $data);
                $this->load->view('templates/footer');
            }

            //Если получилось корректно добавить, просим пользователя подтвердить имейл и направляем его на страницу успеха
            else {
                $this->load->helper('url');
                $this->About_model->send_email($this->input->post('name'), $this->input->post('cont'), $token);
                $data['message'] = "Спасибо за Ваш отзыв! Чтобы он отображался на сайте, пожалуйста, подтвердите свой email, пройдя по ссылке в письме.";
                $this->load->helper('url');
                $this->load->view('templates/header');
                $this->load->view('pages/success', $data);
                $this->load->view('templates/footer');
            }

        }
        //Если комментария не было, просто загружаем страницу
        else {

            $this->load->helper('url');
            $this->load->view('templates/header');
            $this->load->view('pages/about', $data);
            $this->load->view('templates/footer');
        }
    }
}