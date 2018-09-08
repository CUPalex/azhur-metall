<?php
class Email_model extends CI_Model {

    public function verify($token){
        $this->db->where('token', $token);
        $query = $this->db->get('comment');
        if ($query->num_rows() > 0 )
        {
            $data = array(
                'verified' => 1,
                'token' => NULL
            );

            $this->db->where('id', $query->row()->id);
            $this->db->update('comment', $data);
            return true;
        }
        else {
            return false;
        }
    }
}