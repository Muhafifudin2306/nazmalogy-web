<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{
      function __construct()
      {
            parent::__construct();
            $this->load->model('FrontModel');
            $this->load->model('UserModel');
            $this->load->model('CourseModel');
            $this->load->model('CategoryModel');
      }
      public function index()
      {
            $data = [
                  'testimonials' => $this->FrontModel->get_data_testimony()
            ];
            $this->load->view('pages/member/home', $data);
      }

      public function support()
      {
            $this->load->view('pages/member/support');
      }

      public function listClass()
      {
            $data = [
                  'categories' => $this->CategoryModel->get_data_category(),
                  'course' => $this->CourseModel->get_data_course_non_auth()
            ];
            // Loop melalui data kelas
            foreach ($data['course'] as &$class) {
                  $userHasCourse = $this->UserModel->getUserHasCourse($this->session->userdata('id'), $class->id);

                  if ($userHasCourse && $userHasCourse->status == 1) {
                        $class->button_label = 'Lanjutkan';
                  } else {
                        $class->button_label = 'Ikuti Kelas';
                  }
            }
            $this->load->view('pages/member/course_list', $data);
      }

      public function listClassAsc()
      {
            $data = [
                  'categories' => $this->CategoryModel->get_data_category(),
                  'course' => $this->CourseModel->get_data_course_asc_non_auth()
            ];
            // Loop melalui data kelas
            foreach ($data['course'] as &$class) {
                  $userHasCourse = $this->UserModel->getUserHasCourse($this->session->userdata('id'), $class->id);

                  if ($userHasCourse && $userHasCourse->status == 1) {
                        $class->button_label = 'Lanjutkan';
                  } else {
                        $class->button_label = 'Ikuti Kelas';
                  }
            }
            $this->load->view('pages/member/course_list', $data);
      }


      public function listClassAZ()
      {
            $data = [
                  'categories' => $this->CategoryModel->get_data_category(),
                  'course' => $this->CourseModel->get_data_course_az_non_auth()
            ];
            // Loop melalui data kelas
            foreach ($data['course'] as &$class) {
                  $userHasCourse = $this->UserModel->getUserHasCourse($this->session->userdata('id'), $class->id);

                  if ($userHasCourse && $userHasCourse->status == 1) {
                        $class->button_label = 'Lanjutkan';
                  } else {
                        $class->button_label = 'Ikuti Kelas';
                  }
            }
            $this->load->view('pages/member/course_list', $data);
      }

      public function listClassZA()
      {
            $data = [
                  'categories' => $this->CategoryModel->get_data_category(),
                  'course' => $this->CourseModel->get_data_course_za_non_auth()
            ];
            // Loop melalui data kelas
            foreach ($data['course'] as &$class) {
                  $userHasCourse = $this->UserModel->getUserHasCourse($this->session->userdata('id'), $class->id);

                  if ($userHasCourse && $userHasCourse->status == 1) {
                        $class->button_label = 'Lanjutkan';
                  } else {
                        $class->button_label = 'Ikuti Kelas';
                  }
            }
            $this->load->view('pages/member/course_list', $data);
      }

      public function course_filter_by_category()
      {

            $categories = $this->input->post('category');

            $this->db->select('c.*, GROUP_CONCAT(categories.name) as category');
            $this->db->from('courses c');
            $this->db->join('course_has_category chc', 'c.id = chc.id_course');
            $this->db->join('categories', 'chc.id_category = categories.id');
            $this->db->group_by('c.id');
            $this->db->order_by('created_at', 'desc');

            if (!empty($categories)) {
                  $this->db->where_in('chc.id_category', $categories);
            }


            $query = $this->db->get();

            $data = [
                  'categories' => $this->CategoryModel->get_data_category(),
                  'course' => $query->result(),
                  'selected_categories' => $categories
            ];
            // Loop melalui data kelas
            foreach ($data['course'] as &$class) {
                  $userHasCourse = $this->UserModel->getUserHasCourse($this->session->userdata('id'), $class->id);

                  if ($userHasCourse && $userHasCourse->status == 1) {
                        $class->button_label = 'Lanjutkan';
                  } else {
                        $class->button_label = 'Ikuti Kelas';
                  }
            }
            $this->load->view('pages/member/course_list', $data);
      }

      public function courseSearch()
      {
            $keyword = $this->input->get('searchTitle');
            $this->db->select('c.*, GROUP_CONCAT(categories.name) as category');
            $this->db->from('courses c');
            $this->db->join('course_has_category chc', 'c.id = chc.id_course');
            $this->db->join('categories', 'chc.id_category = categories.id');
            $this->db->group_by('c.id');
            $this->db->order_by('created_at', 'desc');

            if (!empty($keyword)) {
                  $this->db->like('c.title', $keyword);
            }

            $this->db->group_by('c.id');
            $query = $this->db->get()->result();
            $data = [
                  'categories' => $this->CategoryModel->get_data_category(),
                  'course' => $query
            ];
            // Loop melalui data kelas
            foreach ($data['course'] as &$class) {
                  $userHasCourse = $this->UserModel->getUserHasCourse($this->session->userdata('id'), $class->id);

                  if ($userHasCourse && $userHasCourse->status == 1) {
                        $class->button_label = 'Lanjutkan';
                  } else {
                        $class->button_label = 'Ikuti Kelas';
                  }
            }
            $this->load->view('pages/member/course_list', $data);
      }

      public function save_subscribe()
      {
            $email = $this->input->post('email');
            $emaildata = array('email' => $email);
            $checkData = $this->FrontModel->get_simmilar_data('subscribes', $emaildata);

            if ($email == NULL) {
                  redirect('front');
            } else {
                  if ($checkData->num_rows() == 1) {
                        $this->session->set_flashdata('success', 'Email Terkirim');
                        redirect('front');
                  } else {
                        $this->session->set_flashdata('success', 'Email Terkirim');
                        $this->FrontModel->insert_data_subscribe($emaildata);
                        redirect('front');
                  }
            }
      }
}
