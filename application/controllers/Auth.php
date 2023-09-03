<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


      function __construct()
      {
            parent::__construct();
            $this->load->model('AuthModel');
      }

      public function login_page()
      {
            $this->load->view('pages/auth/login');
      }

      public function register_page()
      {

            $this->load->view('pages/auth/register');
      }

      // Register 
      public function register_proccess()
      {
            $rules = [
                  [
                        'field' => 'email',
                        'label' => 'email',
                        'rules' => 'trim|required|min_length[1]|max_length[255]|is_unique[users.email]'
                  ],
                  [
                        'field' => 'password',
                        'label' => 'password',
                        'rules' => 'trim|required|min_length[8]|max_length[255]'
                  ],
                  [
                        'field' => 'name',
                        'label' => 'name',
                        'rules' => 'trim|required|min_length[3]|max_length[255]'
                  ],
            ];

            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() == true) {
                  $data = [
                        'email' => $this->input->post('email'),
                        'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                        'name' => $this->input->post('name'),
                        'id_role' => 3
                  ];

                  $this->db->insert('users', $data);
                 
                  
                  // Mengirim email selamat datang
                    $this->load->library('email');
                
                    // Konfigurasi email
                    $config['protocol'] = 'smtp';
                    $config['smtp_host'] = 'mail.nazmaoffice.com'; // Sesuaikan dengan pengaturan SMTP hosting email Anda
                    $config['smtp_port'] = 587; // Sesuaikan dengan pengaturan port SMTP hosting email Anda
                    $config['smtp_user'] = 'nazmalogy@nazmaoffice.com'; // Sesuaikan dengan alamat email pengirim
                    $config['smtp_pass'] = 'Kamunanya2023'; // Sesuaikan dengan kata sandi email pengirim
                    $config['mailtype'] = 'html';
                
                    $this->email->initialize($config);
                
                    $this->email->from('nazmalogy@nazmaoffice.com', 'NaZMaLogy'); // Sesuaikan dengan alamat email dan nama pengirim
                    $this->email->to($this->input->post('email')); // Alamat email penerima
                    $this->email->subject('Welcome to NaZMaLogy!!'); // Subjek email
                
                    $message = 'Dear ' . $this->input->post('name') . ',<br><br>';
                    $message .= 'Welcome to NaZMaLogy! Thank you for registering.<br><br>';
                    $message .= 'Best regards,<br>NaZMaLogy Team';
                
                    $this->email->message($message); // Isi pesan email
                
                    if (!$this->email->send()) {
                        // Jika terjadi kesalahan dalam mengirim email, tangani di sini
                        echo $this->email->print_debugger(); // Tampilkan informasi error
                    } else {
                        // Tampilkan pesan sukses dan redirect ke halaman lain jika perlu
                         $this->session->set_flashdata('success_register', 'Register Berhasil');
                        redirect('auth/login_page');    
                    }
            } else {
                  $this->session->set_flashdata('error', 'Email Sudah Terdaftar!');
                  redirect('auth/register_page');
            }
      }
      // Register 

      // Login
      public function login_proccess()
      {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $query = $this->db->get_where('users', array('email' => $email));
        
            if ($query->num_rows() > 0) {
                $data_user = $query->row();
                if (password_verify($password, $data_user->password)) {
                    // Load the UserModel here
                    $this->load->model('UserModel');
        
                    // Pass the user's ID to the updateLastLogin method
                    $this->UserModel->updateLastLogin($data_user->id);
        
                    $session_data = array(
                        'email' => $email,
                        'name' => $data_user->name,
                        'id' => $data_user->id,
                        'id_role' => $data_user->id_role,
                        'is_login' => TRUE
                    );
                    $this->session->set_userdata($session_data);
                    $this->session->set_flashdata('success_login', 'Login Berhasil');
                    $user = $this->AuthModel->getUserByUsername($email);
                    if ($user->id_role == 1) {
                        redirect('adminRoot/user/page');
                    } else {
                        redirect('userBranch/user/page');
                    }
                }
            }
        
            $this->session->set_flashdata('error_login', 'Email atau Password Salah');
            redirect('auth/login_page');
      }
      // Login

      public function logout()
      {
            $this->session->sess_destroy();
            redirect('auth/login_page');
      }
}