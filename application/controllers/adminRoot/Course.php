<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Course extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('UserModel');
        $this->load->model('CategoryModel');
        $this->load->model('CourseModel');
        $this->load->model('PlaylistModel');
        if (empty($this->session->userdata('is_login'))) {
            $this->session->set_flashdata('end_session', 'User Belum Login');
            redirect('auth/login_page');
        } elseif ($this->session->userdata('id_role') != 1) {
            $this->session->set_flashdata('end_session', 'Akses Diblokir');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function class_admin()
    {
        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_role' => $this->session->userdata('id_role'),
            'categories' => $this->CategoryModel->get_data_category(),
            'course' => $this->CourseModel->get_data_course_admin(),
            'user_has_course' => $this->CourseModel->get_data_user_has_course(),
            'member' => $this->CourseModel->get_data_member()
        ];
        $this->load->view('pages/admin/superadmin/course/index', $data);
    }

    public function add_category()
    {
        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_role' => $this->session->userdata('id_role')
        ];
        $this->load->view('pages/admin/superadmin/category/add', $data);
    }

    public function save_category()
    {
        //load library form validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nama Playlist', 'trim|required|min_length[5]');
        //jika validasi gagal
        if ($this->form_validation->run() == false) {
            $data['error'] = validation_errors();
            $data['id_user'] = $this->session->userdata('id');
            $data['id_role'] = $this->session->userdata('id_role');
            $this->load->view('pages/admin/superadmin/category/add', $data);
        } else {
            $data = array(
                'name' => $this->input->post('name')
                // dan seterusnya
            );
            $insert_id = $this->CategoryModel->insert_data_category($data);
            if ($insert_id) {
                $this->session->set_flashdata('success_add', 'email atau Password salah');
                redirect('adminRoot/course/class_admin');
            } else {
                $this->session->set_flashdata('error_login', 'email atau Password salah');
                redirect('adminRoot/course/add_category');
            }
        }
    }


    public function edit_category($id)
    {
        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_role' => $this->session->userdata('id_role'),
            'category' => $this->CategoryModel->get_category_by_id($id)
        ];
        $this->load->view('pages/admin/superadmin/category/edit', $data);
    }

    public function delete_category($id)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('categories');
        // Menampilkan pesan sukses dan redirect ke halaman lain
        $this->session->set_flashdata('success_delete', 'Data berhasil dihapus');
        redirect('adminRoot/course/class_admin');
    }


    public function update_category($id)
    {
        //load library form validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nama Playlist', 'trim|required|min_length[5]');
        //jika validasi gagal
        if ($this->form_validation->run() == false) {
            $data['error'] = validation_errors();
            $data['id_user'] = $this->session->userdata('id');
            $data['category'] = $this->CategoryModel->get_category_by_id($id);
            $data['id_role'] = $this->session->userdata('id_role');
            $this->load->view('pages/admin/superadmin/category/edit', $data);
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'id' => $id
            );
            $this->CategoryModel->updateCategory($data);
            // Menampilkan pesan sukses dan redirect ke halaman lain
            $this->session->set_flashdata('success_update', 'Data berhasil diupdate');
            redirect('adminRoot/course/class_admin');
        }
    }

    // Course
    public function delete_course($id)
    {
        // Hapus data dari tabel pivot terlebih dahulu
        $this->CourseModel->delete_category_relation($id);

        // Hapus data dari tabel kursus
        $this->CourseModel->delete_course($id);

        // Menampilkan pesan sukses dan redirect ke halaman lain
        $this->session->set_flashdata('success_delete', 'Data berhasil dihapus');
        redirect('adminRoot/course/class_admin');
    }



    // Add Class Page
    public function add_course()
    {
        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_role' => $this->session->userdata('id_role'),
            'categories' => $this->CategoryModel->get_data_category(),
            'playlist' => $this->PlaylistModel->get_data_playlist()
        ];
        $this->load->view('pages/admin/superadmin/course/add', $data);
    }

    public function save_course()
    {
        //load library upload
        $this->load->library('upload');

        //konfigurasi upload
        $config['upload_path'] = './assets/images/admin/course/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000;

        //inisialisasi upload
        $this->upload->initialize($config);

        //jika gagal upload
        if (!$this->upload->do_upload('cover')) {
            $error = array('error' => $this->upload->display_errors());
            redirect('adminRoot/course/class_admin', $error);
        }
        //jika berhasil upload
        else {
            $data = array(
                'title' => $this->input->post('title', TRUE),
                'summary' => $this->input->post('summary', TRUE),
                'instructor' => $this->input->post('instructor', TRUE),
                'intro_link' => $this->input->post('intro_link', TRUE),
                'intro_duration' => $this->input->post('intro_duration', TRUE),
                'mentoring_link' => $this->input->post('mentoring_link', TRUE),
                'cover' => $this->upload->data('file_name')
            );


            if ($this->CourseModel->insert_data_course($data)) {
                $this->session->set_flashdata(
                    'success_add',
                    'Success Add Project Data'
                );

                //menyimpan relasi antara kategori dan data
                $id_data = $this->db->insert_id();
                $category = $this->input->post('category');
                foreach ($category as $row) {
                    $data_category = array(
                        'id_course' => $id_data,
                        'id_category' => $row
                    );
                    $this->CourseModel->save_category_relation($data_category);
                }

                $playlist = $this->input->post('playlist');
                foreach ($playlist as $row) {
                    $data_playlist = array(
                        'id_course' => $id_data,
                        'id_playlist' => $row
                    );
                    $this->CourseModel->save_playlist_relation($data_playlist);
                }

                redirect('adminRoot/course/class_admin');
            }
        }
    }

    public function edit_course($id)
    {
        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_role' => $this->session->userdata('id_role'),
            'course' => $this->CourseModel->get_course_by_id($id),
            'categories' => $this->CategoryModel->get_data_category(),
            'playlists' => $this->PlaylistModel->get_data_playlist(),
            'detail_category' => $this->CourseModel->get_category_by_id($id),
            'detail_playlist' => $this->CourseModel->get_playlist_by_id_course($id)
        ];
        $this->load->view('pages/admin/superadmin/course/edit', $data);
    }

    public function detail_course($id)
    {
        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_role' => $this->session->userdata('id_role'),
            'course' => $this->CourseModel->get_course_by_id($id),
            'categories' => $this->CategoryModel->get_data_category(),
            'playlists' => $this->PlaylistModel->get_data_playlist(),
            'detail_category' => $this->CourseModel->get_category_by_id($id),
            'detail_playlist' => $this->CourseModel->get_playlist_by_id_course($id)
        ];
        $this->load->view('pages/admin/superadmin/course/detail', $data);
    }
    public function update_course($id)
    {
        $this->CourseModel->delete_category_relation($id);
        $this->PlaylistModel->delete_playlist_relation($id);

        // //inisialisasi upload
        // $this->upload->initialize($config);

        $data = array(
            'title' => $this->input->post('title', TRUE),
            'instructor' => $this->input->post('instructor', TRUE),
            'mentoring_link' => $this->input->post('mentoring_link', TRUE),
            'summary' => $this->input->post('summary', TRUE),
            'intro_link' => $this->input->post('intro_link', TRUE),
            'intro_duration' => $this->input->post('intro_duration', TRUE),
            'id' => $id

        );
        $this->CourseModel->updateCourse($id, $data);

        $category = $this->input->post('category');
        foreach ($category as $row) {
            $data_category = array(
                'id_course' => $id,
                'id_category' => $row
            );
            $this->CourseModel->save_category_relation($data_category);
        }

        $playlist = $this->input->post('playlist');
        foreach ($playlist as $row) {
            $data_playlist = array(
                'id_course' => $id,
                'id_playlist' => $row
            );
            $this->CourseModel->save_playlist_relation($data_playlist);
        }
        $this->session->set_flashdata('success_update', 'Data berhasil diupdate');

        redirect('adminRoot/course/class_admin');
    }
}
