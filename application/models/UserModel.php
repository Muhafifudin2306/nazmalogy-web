<?php
class UserModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // Admin Dashboard
    public function count_all()
    {
        return $this->db->count_all('users');
    }
    function get_users_role($id_role)
    {
        $this->db->from('users');
        $this->db->where('id_role', $id_role);
        return $this->db->count_all_results();
    }
    // Admin Dashboard


    public function get_data_user()
    {
        return $this->db->get('users')->result_array();
    }

    public function get_data_user_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('users');

        return $query->row(); // mengembalikan sebuah objek hasil query
    }

    public function insert_data_course($data)
    {
        return $this->db->insert('user_has_course', $data);
    }

    public function insert_data_saved_course($data)
    {
        return $this->db->insert('user_has_course_saved', $data);
    }

    public function insert_data_every_video($data)
    {
        return $this->db->insert('user_has_video', $data);
    }

    public function get_all_user()
    {
        $this->db->select('users.*, roles.id AS id_role, roles.name AS roles_name, ');
        $this->db->join('roles', 'users.id_role = roles.id');
        $this->db->order_by('created_at', 'desc');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_subscribe()
    {
        $this->db->order_by('created_at', 'desc');
        $query = $this->db->get('subscribes');
        return $query->result();
    }

    public function get_all_testimony()
    {
        $this->db->order_by('created_at', 'desc');
        $query = $this->db->get('testimonies');
        return $query->result();
    }


    function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function get_role_by_id($id)
    {
        $this->db->select('users.*, roles.id AS id_role, roles.name AS roles_name');
        $this->db->from('users');
        $this->db->join('roles', 'users.id_role = roles.id');
        $this->db->where('users.id', $id);
        $query = $this->db->get();

        return $query->row(); // mengembalikan sebuah objek hasil query
    }

    public function updateUser($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $id_role = $data['id_role'];
        $id = $data['id'];

        $data = array(
            'name' => $name,
            'email' => $email,
            'id_role' => $id_role
        );

        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function update_email_from_profile($data, $id)
    {
        $email = $data['email'];

        $data = array(
            'email' => $email
        );

        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }
    public function update_name_from_profile($data, $id)
    {
        $name = $data['name'];

        $data = array(
            'name' => $name
        );

        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }
    public function getUserVideoStatus($id_user, $id_video)
    {
        // Perform database query to check user-video relationship
        // Example code:
        $query = $this->db->get_where('user_has_video', array('id_user' => $id_user, 'id_video' => $id_video));
        $result = $query->row();

        if ($result) {
            return 1; // User-video relationship exists
        }

        return 0; // User-video relationship does not exist
    }
    public function getUserCourseStatus($id_user, $id_course)
    {
        // Perform database query to check user-video relationship
        // Example code:
        $query = $this->db->get_where('user_has_course', array('id_user' => $id_user, 'id_course' => $id_course));
        $result = $query->row();

        if ($result) {
            return 1; // User-video relationship exists
        }

        return 0; // User-video relationship does not exist
    }

    public function checkUserHasCourse($id_user, $id_course)
    {
        // Query untuk memeriksa apakah ada relasi antara user dan course
        $query = $this->db->get_where('user_has_course', array('id_user' => $id_user, 'id_course' => $id_course));

        // Mengembalikan true jika relasi ditemukan, false jika tidak
        return $query->num_rows() > 0;
    }

    public function checkUserHasVideo($id_user, $id_video)
    {
        // Query untuk memeriksa apakah ada relasi antara user dan course
        $query = $this->db->get_where('user_has_video', array('id_user' => $id_user, 'id_video' => $id_video));

        // Mengembalikan true jika relasi ditemukan, false jika tidak
        return $query->num_rows() > 0;
    }

    public function getUserVideo($user_id)
    {
        $this->db->select('videos.id');
        $this->db->from('user_has_video');
        $this->db->join('videos', 'videos.id = user_has_video.id_video');
        $this->db->where('user_has_video.id_user', $user_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function getCompletedClasses($id, $userId)
    {
        $this->db->where('id_course', $id);
        $this->db->where('id_user', $userId);
        $this->db->where('status', 1);
        $this->db->from('user_has_video');
        return $this->db->count_all_results();
    }

    public function getUserHasCourse($id_user, $id_course)
    {
        $this->db->where('id_user', $id_user);
        $this->db->where('id_course', $id_course);
        return $this->db->get('user_has_course')->row();
    }

    public function addUserHasCourse($id_user, $id_course, $status)
    {
        $data = array(
            'id_user' => $id_user,
            'id_course' => $id_course,
            'status' => $status
        );
        $this->db->insert('user_has_course', $data);
    }

    public function insert_data_testimony($data)
    {
        return $this->db->insert('testimonies', $data);
    }

    public function get_testimony_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('testimonies');

        return $query->row(); // mengembalikan sebuah objek hasil query
    }

    public function updateTestimony($id, $data)
    {
        $author = $data['author'];
        $job = $data['job'];
        $message = $data['message'];
        $status = $data['status'];
        $rating = $data['rating'];
        // $id = $data['id'];
        $this->db->where('id', $id);
        $testimony = $this->db->get('testimonies')->row();
        $image = $testimony->image;


        $config['upload_path'] = './assets/images/admin/testimony/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000;

        $this->load->library('upload', $config);
        //konfigurasi upload
        if ($this->upload->do_upload('image')) {

            $data = array(
                'author' => $author,
                'job' => $job,
                'status' => $status,
                'message' => $message,
                'rating' => $rating,
                'image' => $this->upload->data('file_name')

            );
            $this->db->where('id', $id);
            $this->db->update('testimonies', $data);
        } else {
            $data = array(
                'author' => $author,
                'message' => $message,
                'status' => $status,
                'rating' => $rating,
                'job' => $job,
                'image' => $image

            );
            $this->db->where('id', $id);
            $this->db->update('testimonies', $data);
        }
    }

    public function getMemberBySessionId($idSession)
    {
        $this->db->select('*');
        $this->db->from('members');
        $this->db->where('id_user', $idSession);
        $query = $this->db->get();
        return $query->row();
    }

    public function insert_data_profile($data)
    {
        return $this->db->insert('members', $data);
    }

    public function updateProfile($id, $data)
    {
        $summary = $data['summary'];
        $job = $data['job'];
        $instagram = $data['instagram'];
        $linkedin = $data['linkedin'];
        $this->db->where('id_user', $id);
        $member = $this->db->get('members')->row();
        $image = $member->image;

        $config['upload_path'] = './assets/images/profile/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000;


        $this->load->library('upload', $config);
        //konfigurasi upload
        if ($this->upload->do_upload('image')) {
            $data = array(
                'summary' => $summary,
                'job' => $job,
                'linkedin' => $linkedin,
                'instagram' => $instagram,
                'image' => $this->upload->data('file_name')

            );
            $this->db->where('id_user', $id);
            $this->db->update('members', $data);
        } else {
            $data = array(
                'summary' => $summary,
                'job' => $job,
                'instagram' => $instagram,
                'linkedin' => $linkedin,
                'image' => $image
            );
        }
        $this->db->where('id_user', $id);
        $this->db->update('members', $data);
    }





    public function updateAddress($id, $data)
    {
        $address = $data['address'];
        $district = $data['district'];
        $region = $data['region'];
        $province = $data['province'];
        $posCode = $data['posCode'];
        $id = $data['id_user'];
        $this->db->where('id_user', $id);

        $data = array(
            'address' => $address,
            'district' => $district,
            'region' => $region,
            'province' => $province,
            'posCode' => $posCode,
        );
        $this->db->where('id_user', $id);
        $this->db->update('members', $data);
    }

    public function updateLastLogin($user_id) {
        $this->db->set('last_login', 'NOW()', false);
        $this->db->set('created_at', 'created_at', false);
        $this->db->where('id', $user_id);
        $this->db->update('users');
    }

    public function getRecentlyLoggedInUsers() {
        $this->db->select('id, name, email, last_login');
        $this->db->where('last_login > DATE_SUB(NOW(), INTERVAL 1 DAY)'); // Adjust the time frame as needed
        $query = $this->db->get('users');
        return $query->result(); 
    }
    
}