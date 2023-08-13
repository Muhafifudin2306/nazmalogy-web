<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Classpath extends CI_Controller
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

    public function listClass()
    {
        $data = [
            'id_role' => $this->session->userdata('id_role'),
            'id_user' => $this->session->userdata('id'),
            'categories' => $this->CategoryModel->get_data_category(),
            'course' => $this->CourseModel->get_data_course()
        ];

        // Loop melalui data kelas
        foreach ($data['course'] as &$class) {
            $userHasCourse = $this->UserModel->getUserHasCourse($data['id_user'], $class->id);

            if ($userHasCourse && $userHasCourse->status == 1) {
                $class->button_label = 'Lanjutkan';
            } else {
                $class->button_label = 'Ikuti Kelas';
            }
        }

        $this->load->view('pages/admin/user/course_list', $data);
    }

    public function detail_course($id)
    {
        $data = [
            'id_role' => $this->session->userdata('id_role'),
            'id_user' => $this->session->userdata('id'),
            'id_name' => $this->session->userdata('name'),
            'id_video' => $this->CourseModel->get_video_by_id($id),
            'feedback' => $this->CourseModel->get_feedback_by_id($id, $this->session->userdata('id'))
        ];
        $has_relation = $this->UserModel->checkUserHasCourse($this->session->userdata('id'), $id);
        $data['course'] = $this->CourseModel->get_course_by_id_detail($id);
        $data['has_relation'] = $has_relation;
        $data['playlists'] = $this->CourseModel->get_playlists_by_course_id($id);
        $videoCount = $this->CourseModel->getVideoCount($id);
        $completedClasses = $this->UserModel->getCompletedClasses($id, $this->session->userdata('id'));

        $data['progress'] = ($completedClasses / $videoCount) * 100;

        foreach ($data['playlists'] as $playlist) {
            $playlist->videos = $this->CourseModel->get_videos_by_playlist_id($playlist->id);
            foreach ($playlist->videos as $video) {
                $video->detail = $this->CourseModel->get_video_by_id($video->id);
                $video->status = $this->UserModel->getUserVideoStatus($this->session->userdata('id'), $video->id);
            }
        }

        $this->load->view('pages/admin/user/detail_course', $data);
    }


    public function listClassAsc()
    {
        $data = [
            'id_role' => $this->session->userdata('id_role'),
            'id_user' => $this->session->userdata('id'),
            'categories' => $this->CategoryModel->get_data_category(),
            'course' => $this->CourseModel->get_data_course_asc()
        ];

        // Loop melalui data kelas
        foreach ($data['course'] as &$class) {
            $userHasCourse = $this->UserModel->getUserHasCourse($data['id_user'], $class->id);

            if ($userHasCourse && $userHasCourse->status == 1) {
                $class->button_label = 'Lanjutkan';
            } else {
                $class->button_label = '+ Ikuti Kelas';
            }
        }

        $this->load->view('pages/admin/user/course_list', $data);
    }

    public function listClassAZ()
    {
        $data = [
            'id_role' => $this->session->userdata('id_role'),
            'id_user' => $this->session->userdata('id'),
            'categories' => $this->CategoryModel->get_data_category(),
            'course' => $this->CourseModel->get_data_course_az()
        ];

        // Loop melalui data kelas
        foreach ($data['course'] as &$class) {
            $userHasCourse = $this->UserModel->getUserHasCourse($data['id_user'], $class->id);

            if ($userHasCourse && $userHasCourse->status == 1) {
                $class->button_label = 'Lanjutkan';
            } else {
                $class->button_label = '+ Ikuti Kelas';
            }
        }
        $this->load->view('pages/admin/user/course_list', $data);
    }

    public function listClassZA()
    {
        $data = [
            'id_role' => $this->session->userdata('id_role'),
            'id_user' => $this->session->userdata('id'),
            'categories' => $this->CategoryModel->get_data_category(),
            'course' => $this->CourseModel->get_data_course_ZA()
        ];
        // Loop melalui data kelas
        foreach ($data['course'] as &$class) {
            $userHasCourse = $this->UserModel->getUserHasCourse($data['id_user'], $class->id);

            if ($userHasCourse && $userHasCourse->status == 1) {
                $class->button_label = 'Lanjutkan';
            } else {
                $class->button_label = '+ Ikuti Kelas';
            }
        }
        $this->load->view('pages/admin/user/course_list', $data);
    }


    public function detail_video_course($id_link, $id)
    {
        $data = [
            'id_role' => $this->session->userdata('id_role'),
            'id_user' => $this->session->userdata('id'),
            'id_name' => $this->session->userdata('name'),
            'id_video' => $this->CourseModel->get_video_by_id($id),
            'feedback' => $this->CourseModel->get_feedback_by_id($id_link, $this->session->userdata('id'))
        ];
        $data['course'] = $this->CourseModel->get_course_by_id_detail($id_link);
        $data['playlists'] = $this->CourseModel->get_playlists_by_course_id($id_link);
        $has_relation = $this->UserModel->checkUserHasCourse($this->session->userdata('id'), $id_link);
        $data['has_relation'] = $has_relation;
        $videoCount = $this->CourseModel->getVideoCount($id_link);
        $completedClasses = $this->UserModel->getCompletedClasses($id_link, $this->session->userdata('id'));


        $data['progress'] = ($completedClasses / $videoCount) * 100;
        $data['class_progress'] = (($completedClasses + 1) / $videoCount) * 100;

        foreach ($data['playlists'] as $playlist) {
            $playlist->videos = $this->CourseModel->get_videos_by_playlist_id($playlist->id);
            foreach ($playlist->videos as $video) {
                $video->detail = $this->CourseModel->get_video_by_id($video->id);
                $video->status = $this->UserModel->getUserVideoStatus($this->session->userdata('id'), $video->id);
            }
        }
        $this->load->view('pages/admin/user/detail_video', $data);
    }

    public function filter_by_category()
    {

        $categories = $this->input->post('category');

        $this->db->select('c.*, GROUP_CONCAT(categories.name) as category, COUNT(uhc.id_user) as has_relation');
        $this->db->from('courses c');
        $this->db->join('course_has_category chc', 'c.id = chc.id_course');
        $this->db->join('categories', 'chc.id_category = categories.id');
        $this->db->join('user_has_course_saved uhc', 'c.id = uhc.id_course AND uhc.id_user = ' . $this->session->userdata('id'), 'left');
        $this->db->group_by('c.id');
        $this->db->order_by('created_at', 'desc');

        if (!empty($categories)) {
            $this->db->where_in('chc.id_category', $categories);
        }


        $query = $this->db->get();

        $data = [
            'id_role' => $this->session->userdata('id_role'),
            'id_user' => $this->session->userdata('id'),
            'categories' => $this->CategoryModel->get_data_category(),
            'course' => $query->result(),
            'selected_categories' => $categories
        ];

        // Loop melalui data kelas
        foreach ($data['course'] as &$class) {
            $userHasCourse = $this->UserModel->getUserHasCourse($data['id_user'], $class->id);

            if ($userHasCourse && $userHasCourse->status == 1) {
                $class->button_label = 'Lanjutkan';
            } else {
                $class->button_label = '+ Ikuti Kelas';
            }
        }

        $this->load->view('pages/admin/user/course_list', $data);
    }
    public function classSearch()
    {
        // Ambil keyword pencarian dari form
        $keyword = $this->input->get('searchTitle');

        // Cari data course yang sesuai dengan keyword pencarian

        $this->db->select('c.*, GROUP_CONCAT(categories.name) as category, COUNT(uhc.id_user) as has_relation');
        $this->db->from('courses c');
        // $this->db->join('course_has_category', 'courses.id = course_has_category.id_course');
        $this->db->join('course_has_category chc', 'c.id = chc.id_course');
        $this->db->join('categories', 'chc.id_category = categories.id');
        $this->db->join('user_has_course_saved uhc', 'c.id = uhc.id_course AND uhc.id_user = ' . $this->session->userdata('id'), 'left');
        $this->db->group_by('c.id');
        $this->db->order_by('created_at', 'desc');


        // Filter berdasarkan keyword pencarian
        if (!empty($keyword)) {
            $this->db->like('c.title', $keyword);
        }

        $this->db->group_by('c.id');
        $query = $this->db->get()->result();
        // $course = $this->db->get('courses')->result();
        $data = [
            'id_role' => $this->session->userdata('id_role'),
            'id_user' => $this->session->userdata('id'),
            'categories' => $this->CategoryModel->get_data_category(),
            'course' => $query
        ];

        // Loop melalui data kelas
        foreach ($data['course'] as &$class) {
            $userHasCourse = $this->UserModel->getUserHasCourse($data['id_user'], $class->id);

            if ($userHasCourse && $userHasCourse->status == 1) {
                $class->button_label = 'Lanjutkan';
            } else {
                $class->button_label = '+ Ikuti Kelas';
            }
        }


        $this->load->view('pages/admin/user/course_list', $data);
    }

    public function save_course()
    {
        $id_user = $this->input->post('id_user');
        $id_course = $this->input->post('id_course');
        $data = array(
            'id_user' => $id_user,
            'id_course' => $id_course,
            // dan seterusnya
        );
        $insert_id = $this->UserModel->insert_data_saved_course($data);
        if ($insert_id) {
            $this->session->set_flashdata('success_add', 'email atau Password salah');
            redirect('userBranch/classpath/listClass');
        } else {
            $this->session->set_flashdata('error_login', 'email atau Password salah');
            redirect('userBranch/course/add_category');
        }
    }

    public function delete_user_has_bio()
    {
        $id_user = $this->input->post('id_user');
        $id_bio = $this->input->post('id_bio');

        if (!empty($id_user)) {
            $this->db->where('id_user', $id_user);
        }
        if (!empty($id_bio)) {
            $this->db->where('id_bio', $id_bio);
        }

        $this->db->delete('user_has_bio');

        redirect('controller_name/index'); // Ganti dengan nama controller dan method yang sesuai
    }
    public function delete_course()
    {
        $id_user = $this->input->post('id_user');
        $id_course = $this->input->post('id_course');
        $this->db->where('id_user', $id_user);
        $this->db->where('id_course', $id_course);
        $this->db->delete('user_has_course_saved');
        // $insert_id = $this->UserModel->insert_data_saved_course($data);

        $this->session->set_flashdata('success_delete', 'email atau Password salah');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function user_has_course()
    {
        $id_user = $this->input->post('id_user');
        $id_course = $this->input->post('id_course');
        $status = $this->input->post('status');
        $data = array(
            'id_user' => $id_user,
            'id_course' => $id_course,
            'status' => $status
        );
        $insert_id = $this->UserModel->insert_data_course($data);
        if ($insert_id) {
            $this->session->set_flashdata('success', 'email atau Password salah');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', 'email atau Password salah');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function user_has_video()
    {
        $id_user = $this->input->post('id_user');
        $id_course = $this->input->post('id_course');
        $id_video = $this->input->post('id_video');
        $status = $this->input->post('status');
        $data = array(
            'id_user' => $id_user,
            'id_course' => $id_course,
            'id_video' => $id_video,
            'status' => $status
        );
        $insert_id = $this->UserModel->insert_data_every_video($data);

        $data = array(
            'progress' => $this->input->post('progress', TRUE),
            'id_course' => $id_course,
            'id_user' => $id_user
        );
        $this->CourseModel->updateUserCourse($id_course, $id_user, $data);

        if ($insert_id) {
            $this->session->set_flashdata('success', 'email atau Password salah');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', 'email atau Password salah');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function save_feedback()
    {
        $id_user = $this->input->post('id_user');
        $id_course = $this->input->post('id_course');
        $rating = $this->input->post('rating');
        $feedback = $this->input->post('feedback');

        $data = array(
            'rating' => $rating,
            'feedback' => $feedback,
            'id_course' => $id_course,
            'id_user' => $id_user
        );
        $this->CourseModel->updateFeedback($id_course, $id_user, $data);

        $this->session->set_flashdata('feedback', 'Feedback Terkirim');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
