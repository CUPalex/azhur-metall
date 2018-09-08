<?php
class Catalog_model extends CI_Model {

    public function get_catalog(){
        $query = $this->db->get('catalog');
        return $query->result();
    }

    public function category_exists($category) {
        $this->db->from('catalog');
        $this->db->where('title', $category);
        $query = $this->db->get();
        if ($query->num_rows() > 0 )
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function get_items($category)
    {
        $query = $this->db->get($category);
        return $query->result();
    }

}