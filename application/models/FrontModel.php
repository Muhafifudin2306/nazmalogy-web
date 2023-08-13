<?php
class FrontModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_data_testimony()
    {
        $this->db->where('status', 1); // Menambahkan kondisi WHERE untuk kolom "status" dengan nilai 1
        $this->db->order_by('created_at', 'desc');
        $this->db->limit(3);
        $query = $this->db->get('testimonies');
        return $query->result();
    }
    public function insert_data_subscribe($data)
    {
        $this->db->insert('subscribes', $data);
        return $this->db->insert_id();
    }
    public function get_simmilar_data($tabel, $data)
    {
        return $this->db->get_where($tabel, $data);
    }
}
