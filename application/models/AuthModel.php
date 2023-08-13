<?php
class AuthModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    function register($email, $password, $name, $id_role)
    {
        $data_user = array(
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'name' => $name,
            'id_role' => $id_role
        );
        $this->db->insert('users', $data_user);
    }

    public function getUserByUsername($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        return $query->row();
    }
}
