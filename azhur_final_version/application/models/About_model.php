<?php

class About_model extends CI_Model
{

    public function get_places()
    {
        $query = $this->db->get('places');
        return $query->result();
    }

    public function get_people()
    {
        $query = $this->db->get('people');
        return $query->result();
    }

    public function get_comment()
    {
        $this->db->where('verified', 1);
        $query = $this->db->get('comment');
        return $query->result();
    }

    public function insert_comment($name, $text, $date, $contact, $token, $image = 'img/man4.jpg')
    {
        $data = array(
            'name' => $name,
            'text' => $text,
            'img' => $image,
            'contact' => $contact,
        );
        $this->db->where($data);
        $query = $this->db->get('comment');
        if ($query->num_rows() > 0) {
            return 'Ошибка: повторное отправление отзыва';
        }
        $data['date'] = $date;
        $data['token'] = $token;
        $this->db->insert('comment', $data);
        return '';
    }

    public function generate_str($length = 16)
    {
        $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        return $string;
    }

    public function send_email($name, $cont, $token)
    {
        $this->load->library('email');

        $this->email->from('send@azhur.h1n.ru', $name);
        $this->email->to($cont);

        $this->email->subject('Подтверждение email');

        $this->email->message("Для подтверждения email перейдите по ссылке\n" . base_url() . 'email/verification/' . $token);

        $this->email->send();
    }
}