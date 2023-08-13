<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('CourseModel');
        if (empty($this->session->userdata('is_login'))) {
            $this->session->set_flashdata('end_session', 'User Belum Login');
            redirect('auth/login_page');
        } elseif ($this->session->userdata('id_role') != 1) {
            $this->session->set_flashdata('end_session', 'Akses Diblokir');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    // Admin and User Dashboard Index
    public function page()
    {
        $role_admin = 1;
        $role_instructor = 2;
        $role_member = 3;


        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_role' => $this->session->userdata('id_role'),
            'user_count' => $this->UserModel->count_all(),
            'admin_count' => $this->UserModel->get_users_role($role_admin),
            'instructor_count' => $this->UserModel->get_users_role($role_instructor),
            'member_count' => $this->UserModel->get_users_role($role_member),
            'course_count' => $this->CourseModel->count_all(),
            'video_counts' => $this->CourseModel->getVideoCountsByCategory()
        ];

        $views = [
            'pages/admin/superadmin/dashboard'
        ];

        $data['course_count_user'] = $this->CourseModel->getCourseCount($this->session->userdata('id'));
        $data['course_finish'] = $this->CourseModel->getCourseCompletionCount($this->session->userdata('id'));
        $data['courses'] = $this->CourseModel->get_course_by_user_id($this->session->userdata('id'));

        foreach ($views as $view) {
            $this->load->view($view, $data);
        }
    }

    function edit_user($id)
    {
        $data = [
            'id_role' => $this->session->userdata('id_role'),
            'user' => $this->UserModel->get_role_by_id($id)
        ];
        $this->load->view('pages/admin/superadmin/setting/edit', $data);
    }

    public function delete_user($id)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('users');
        // Menampilkan pesan sukses dan redirect ke halaman lain
        $this->session->set_flashdata('success_delete', 'Data berhasil diupdate');
        redirect('adminRoot/setting');
    }

    public function update_user($id)
    {
        //load library form validation
        $this->load->library('form_validation');
        // Validasi form di sini
        $this->form_validation->set_rules('name', 'Nama', 'required|min_length[5]');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('id_role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $data['error'] = validation_errors();
            $data = [
                'id_role' => $this->session->userdata('id_role'),
                'user' => $this->UserModel->get_role_by_id($id)
            ];
            $this->load->view('pages/admin/superadmin/setting/edit', $data);
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'id_role' => $this->input->post('id_role'),
                'id' => $id
            );
            $this->UserModel->updateUser($data);

            // Menampilkan pesan sukses dan redirect ke halaman lain
            $this->session->set_flashdata('success_update', 'Data berhasil diupdate');
            redirect('adminRoot/setting');
        }
    }
}
