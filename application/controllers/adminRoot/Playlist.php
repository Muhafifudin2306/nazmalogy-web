<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Playlist extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('UserModel');
        $this->load->model('PlaylistModel');
        $this->load->model('CourseModel');

        if (empty($this->session->userdata('is_login'))) {
            $this->session->set_flashdata('end_session', 'User Belum Login');
            redirect('auth/login_page');
        } elseif ($this->session->userdata('id_role') != 1) {
            $this->session->set_flashdata('end_session', 'Akses Diblokir');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function video_admin()
    {
        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_role' => $this->session->userdata('id_role'),
            'playlists' => $this->PlaylistModel->get_data_playlist(),
            'videos' => $this->PlaylistModel->get_all_video()
        ];
        $this->load->view('pages/admin/superadmin/playlist/index', $data);
    }

    public function add_playlist()
    {
        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_role' => $this->session->userdata('id_role')
        ];
        $this->load->view('pages/admin/superadmin/playlist/add', $data);
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
    public function save_playlist()
    {
        //load library form validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nama Playlist', 'trim|required|min_length[5]');
        //jika validasi gagal
        if ($this->form_validation->run() == false) {
            $data['error'] = validation_errors();
            $data['id_user'] = $this->session->userdata('id');
            $data['id_role'] = $this->session->userdata('id_role');
            $this->load->view('pages/admin/superadmin/playlist/add', $data);
        } else {
            $data = array(
                'name' => $this->input->post('name')
                // dan seterusnya
            );
            $insert_id = $this->PlaylistModel->insert_data_playlist($data);
            if ($insert_id) {
                $this->session->set_flashdata('success_add', 'Playlist berhasil ditambahkan');
                redirect('adminRoot/playlist/video_admin');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan playlist');
                redirect('adminRoot/playlist/add_playlist');
            }
        }
    }

    public function delete_playlist($id)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('playlists');
        // Menampilkan pesan sukses dan redirect ke halaman lain
        $this->session->set_flashdata('success_delete', 'Data berhasil dihapus');
        redirect('adminRoot/playlist/video_admin');
    }

    public function edit_playlist($id)
    {
        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_role' => $this->session->userdata('id_role'),
            'playlist' => $this->PlaylistModel->get_playlist_by_id($id)
        ];
        $this->load->view('pages/admin/superadmin/playlist/edit', $data);
    }

    public function update_playlist($id)
    {
        //load library form validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nama Playlist', 'trim|required|min_length[5]');
        //jika validasi gagal
        if ($this->form_validation->run() == false) {
            $data['error'] = validation_errors();
            $data['id_user'] = $this->session->userdata('id');
            $data['id_role'] = $this->session->userdata('id_role');
            $data['playlist'] =  $this->PlaylistModel->get_playlist_by_id($id);
            $this->load->view('pages/admin/superadmin/playlist/edit', $data);
        } else {
            $name = $this->input->post('name');
            $data = array(
                'name' => $name,
                'id' => $id
            );
            $this->PlaylistModel->updatePlaylist($data);
            // Menampilkan pesan sukses dan redirect ke halaman lain
            $this->session->set_flashdata('success_update', 'Data berhasil diupdate');
            redirect('adminRoot/playlist/video_admin');
        }
    }

    // CRUD Video
    public function add_video()
    {
        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_role' => $this->session->userdata('id_role'),
            'playlists' => $this->PlaylistModel->get_data_playlist(),
        ];
        $this->load->view('pages/admin/superadmin/video/add', $data);
    }
    public function save_video()
    {
        //load library form validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('link', 'Link Video', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('title', 'Judul Video', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('duration', 'Durasi', 'trim|required');
        $this->form_validation->set_rules('id_playlist', 'id playlist', 'trim|required');
        //jika validasi gagal
        if ($this->form_validation->run() == false) {
            $data['error'] = validation_errors();
            $data['id_user'] = $this->session->userdata('id');
            $data['id_role'] = $this->session->userdata('id_role');
            $data['playlists'] = $this->PlaylistModel->get_data_playlist();
            $this->load->view('pages/admin/superadmin/video/add', $data);
        } else {
            $data = array(
                'link' => $this->input->post('link'),
                'duration' => $this->input->post('duration'),
                'id_playlist' => $this->input->post('id_playlist'),
                'title' => $this->input->post('title')
            );
            $insert_id = $this->PlaylistModel->insert_data_video($data);
            if ($insert_id) {
                $this->session->set_flashdata('success_add', 'email atau Password salah');
                redirect('adminRoot/playlist/video_admin');
            } else {
                $this->session->set_flashdata('error', 'input salah');
                redirect('adminRoot/playlist/add_playlist');
            }
        }
    }

    public function delete_video($id)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('videos');
        // Menampilkan pesan sukses dan redirect ke halaman lain
        $this->session->set_flashdata('success_delete', 'Data berhasil dihapus');
        redirect('adminRoot/playlist/video_admin');
    }

    public function edit_video($id)
    {
        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_role' => $this->session->userdata('id_role'),
            'video' => $this->PlaylistModel->get_video_by_id($id),
            'playlists' => $this->PlaylistModel->get_data_playlist()
        ];
        $this->load->view('pages/admin/superadmin/video/edit', $data);
    }

    public function update_video($id)
    {
        //load library form validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('link', 'Link Video', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('title', 'Judul Video', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('duration', 'Durasi', 'trim|required');
        $this->form_validation->set_rules('id_playlist', 'id playlist', 'trim|required');
        //jika validasi gagal
        if ($this->form_validation->run() == false) {
            $data['error'] = validation_errors();
            $data['id_user'] = $this->session->userdata('id');
            $data['id_role'] = $this->session->userdata('id_role');
            $data['playlists'] = $this->PlaylistModel->get_data_playlist();
            $data['video'] = $this->PlaylistModel->get_video_by_id($id);
            $this->load->view('pages/admin/superadmin/video/edit', $data);
        } else {
            $data = array(
                'link' => $this->input->post('link'),
                'duration' => $this->input->post('duration'),
                'id_playlist' => $this->input->post('id_playlist'),
                'title' => $this->input->post('title'),
                'id' => $id
            );
            $this->PlaylistModel->updateVideo($data);
            // Menampilkan pesan sukses dan redirect ke halaman lain
            $this->session->set_flashdata('success_update', 'Data berhasil diupdate');
            redirect('adminRoot/playlist/video_admin');
        }
    }
}
