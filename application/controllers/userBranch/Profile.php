<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('UserModel');
        $this->load->model('CourseModel');
        $this->load->model('PlaylistModel');
        $this->load->model('CategoryModel');
        $this->load->library('pagination');

        if (empty($this->session->userdata('is_login'))) {
            $this->session->set_flashdata('end_session', 'User Belum Login');
            redirect('auth/login_page');
        } elseif ($this->session->userdata('id_role') == 1) {
            $this->session->set_flashdata('end_session', 'Akses Diblokir');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function index()
    {
        $data = [
            'id_user' => $this->session->userdata('id'),
            'name' => $this->session->userdata('name'),
            'email' => $this->session->userdata('email'),
            'id_role' => $this->session->userdata('id_role'),
            'user' => $this->UserModel->get_data_user_by_id($this->session->userdata('id')),
            'member' => $this->UserModel->getMemberBySessionId($this->session->userdata('id'))
        ];
        $this->load->view('pages/admin/user/profile', $data);
    }
    public function save_profile()
    {
        //load library upload
        $this->load->library('upload');

        //konfigurasi upload
        $config['upload_path'] = './assets/images/profile/cropped/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000;

        //inisialisasi upload
        $this->upload->initialize($config);

        //jika gagal upload
        if (!$this->upload->do_upload('image')) {
            $data = array(
                'summary' => $this->input->post('summary', TRUE),
                'job' => $this->input->post('job', TRUE),
                'id_user' => $this->input->post('id_user', TRUE),
                'instagram' => $this->input->post('instagram', TRUE),
                'linkedin' => $this->input->post('linkedin', TRUE),
                'address' => $this->input->post('address', TRUE),
                'district' => $this->input->post('district', TRUE),
                'region' => $this->input->post('region', TRUE),
                'province' => $this->input->post('province', TRUE),
                'posCode' => $this->input->post('posCode', TRUE)
            );


            if ($this->UserModel->insert_data_profile($data)) {
                $this->session->set_flashdata(
                    'success_add',
                    'Success Add Profile'
                );
                redirect('userBranch/profile');
            }
        }
        //jika berhasil upload
        else {
            $data = array(
                'summary' => $this->input->post('summary', TRUE),
                'job' => $this->input->post('job', TRUE),
                'id_user' => $this->input->post('id_user', TRUE),
                'instagram' => $this->input->post('instagram', TRUE),
                'linkedin' => $this->input->post('linkedin', TRUE),
                'address' => $this->input->post('address', TRUE),
                'district' => $this->input->post('district', TRUE),
                'region' => $this->input->post('region', TRUE),
                'province' => $this->input->post('province', TRUE),
                'posCode' => $this->input->post('posCode', TRUE),
                'image' => $this->upload->data('file_name')
            );
            // Mengubah ukuran gambar menggunakan GD atau Imagick
            $this->resize_image($this->upload->data('file_name'));

            // Tampilkan pesan sukses


            if ($this->UserModel->insert_data_profile($data)) {
                $this->session->set_flashdata(
                    'success_add',
                    'Success Add Profile'
                );
                redirect('userBranch/profile');
            }
        }
    }

    public function save_address()
    {
        $data = array(
            'id_user' => $this->input->post('id_user', TRUE),
            'address' => $this->input->post('address', TRUE),
            'district' => $this->input->post('district', TRUE),
            'region' => $this->input->post('region', TRUE),
            'province' => $this->input->post('province', TRUE),
            'posCode' => $this->input->post('posCode', TRUE)
        );
        $privateData = array(
            'email' => $this->input->post('email'),
            'id' => $this->session->userdata('id')
        );
        $this->UserModel->update_email_from_profile($privateData, $this->session->userdata('id'));
        if ($this->UserModel->insert_data_profile($data)) {
            $this->session->set_flashdata(
                'success_add',
                'Success Add Profile'
            );
            redirect('userBranch/profile');
        }
    }


    private function resize_image($image_path)
    {
        // Load library GD atau Imagick
        $this->load->library('image_lib');

        // Konfigurasi resize
        $config['image_library'] = 'gd2'; // atau 'imagick' jika menggunakan Imagick
        $config['source_image'] = $image_path;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 200;
        $config['height'] = 200;

        $this->image_lib->initialize($config);

        if (!$this->image_lib->resize()) {
            // Jika resize gagal, tampilkan pesan error
            echo $this->image_lib->display_errors();
        }

        // Hapus file gambar asli
        unlink($image_path);
    }

    public function update_profile($id_user)
    {
        $data = array(
            'summary' => $this->input->post('summary', TRUE),
            'job' => $this->input->post('job', TRUE),
            'instagram' => $this->input->post('instagram', TRUE),
            'linkedin' => $this->input->post('linkedin', TRUE)
        );
        $privateData = array(
            'name' => $this->input->post('name'),
            'id' => $this->session->userdata('id')
        );
        $this->UserModel->update_name_from_profile($privateData, $this->session->userdata('id'));
        $this->UserModel->updateProfile($id_user, $data);

        $this->session->set_flashdata('success_update', 'Data berhasil diupdate');

        redirect('userBranch/profile');
    }


    public function update_address($id_user)
    {
        $this->load->library('form_validation');

        // Set rules validation
        $this->form_validation->set_rules('email', 'Email', 'trim|min_length[1]|max_length[255]');

        // Check if email value is changed
        $input_email = $this->input->post('email', TRUE);
        $userData = $this->UserModel->get_data_user_by_id($id_user);
        $current_email = $userData->email;
        if ($input_email != $current_email) {
            // If email is changed, apply unique validation rule
            $this->form_validation->set_rules('email', 'Email', 'is_unique[users.email]');
        }

        // Run validation
        if ($this->form_validation->run() == false) {
            $data = [
                'id_user' => $this->session->userdata('id'),
                'name' => $this->session->userdata('name'),
                'email' => $this->session->userdata('email'),
                'id_role' => $this->session->userdata('id_role'),
                'user' => $this->UserModel->get_data_user_by_id($this->session->userdata('id')),
                'member' => $this->UserModel->getMemberBySessionId($this->session->userdata('id')),
                'error' => validation_errors()
            ];
            $this->load->view('pages/admin/user/profile', $data);
        } else {
            // Update address data
            $data = [
                'address' => $this->input->post('address', TRUE),
                'district' => $this->input->post('district', TRUE),
                'region' => $this->input->post('region', TRUE),
                'province' => $this->input->post('province', TRUE),
                'posCode' => $this->input->post('posCode', TRUE),
                'id_user' => $this->input->post('id_user', TRUE)
            ];
            $this->UserModel->updateAddress($id_user, $data);

            // Update email if changed
            if ($input_email != $current_email) {
                $privateData = array(
                    'email' => $input_email
                );
                $this->UserModel->update_email_from_profile($privateData, $this->session->userdata('id'));
            }

            $this->session->set_flashdata('success_update', 'Data berhasil diupdate');

            redirect('userBranch/profile');
        }
    }
}
