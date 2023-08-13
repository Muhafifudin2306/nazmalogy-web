<?php
class CategoryModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function get_data_category()
    {
        $this->db->order_by('created_at', 'desc');
        $query = $this->db->get('categories');
        return $query->result();
    }

    public function insert_data_category($data)
    {
        $this->db->insert('categories', $data);
        return $this->db->insert_id();
    }

    public function get_category_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('categories');

        return $query->row(); // mengembalikan sebuah objek hasil query
    }

    public function updateCategory($data)
    {
        $name = $data['name'];
        $id = $data['id'];

        $data = array(
            'name' => $name
        );

        $this->db->where('id', $id);
        $this->db->update('categories', $data);
    }
}
