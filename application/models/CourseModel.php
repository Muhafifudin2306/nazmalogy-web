<?php
class CourseModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // Admin and User Dashboard Index
    public function count_all()
    {
        return $this->db->count_all('courses');
    }

    public function getVideoCountsByCategory()
    {
        $query = $this->db->select('c.name as category_name, COUNT(chc.id_course) as video_count')
            ->from('categories c')
            ->join('course_has_category chc', 'c.id = chc.id_category', 'left')
            ->group_by('c.id')
            ->get();
        return $query->result();
    }

    public function getCourseCount($userId)
    {
        $this->db->where('id_user', $userId);
        $this->db->from('user_has_course');
        return $this->db->count_all_results();
    }

    public function getCourseCompletionCount($userId)
    {
        $this->db->where('progress', 100);
        $this->db->where('id_user', $userId);
        $this->db->from('user_has_course');
        return $this->db->count_all_results();
    }
    public function get_all_user()
    {
        $this->db->select('users.*, roles.id AS id_role, roles.name AS roles_name, ');
        $this->db->join('roles', 'users.id_role = roles.id');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_course_by_user_id($user_id)
    {
        $this->db->select('courses.*, user_has_course.progress');
        $this->db->from('user_has_course');
        $this->db->join('courses', 'courses.id = user_has_course.id_course');
        $this->db->where('user_has_course.id_user', $user_id);
        $query = $this->db->get();
        return $query->result();
    }

    // Admin and User Dashboard Index

    public function get_course($id)
    {
        // $query = $this->db->get('courses');
        // return $query->result();

        $this->db->select('c.*, GROUP_CONCAT(categories.name) as category, COUNT(uhc.id_user) as has_relation');
        $this->db->from('courses c');
        // $this->db->join('course_has_category', 'courses.id = course_has_category.id_course');
        $this->db->join('course_has_category chc', 'c.id = chc.id_course');
        $this->db->join('categories', 'chc.id_category = categories.id');
        $this->db->join('user_has_course_saved uhc', 'c.id = uhc.id_course AND uhc.id_user = ' . $this->session->userdata('id'), 'left');

        $this->db->group_by('c.id');
        $this->db->where('uhc.id_user', $id);
        $this->db->order_by('created_at', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_data_course_admin()
    {
        // $query = $this->db->get('courses');
        // return $query->result();

        $this->db->select('c.*, GROUP_CONCAT(categories.name) as category, COUNT(uhc.id_user) as has_relation');
        $this->db->from('courses c');
        // $this->db->join('course_has_category', 'courses.id = course_has_category.id_course');
        $this->db->join('course_has_category chc', 'c.id = chc.id_course');
        $this->db->join('categories', 'chc.id_category = categories.id');
        $this->db->join('user_has_course_saved uhc', 'c.id = uhc.id_course AND uhc.id_user = ' . $this->session->userdata('id'), 'left');
        $this->db->group_by('c.id');
        $this->db->order_by('created_at', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_data_course()
    {
        $this->db->select('c.*, GROUP_CONCAT(categories.name) as category, COUNT(uhc.id_user) as has_relation');
        $this->db->from('courses c');
        $this->db->join('course_has_category chc', 'c.id = chc.id_course');
        $this->db->join('categories', 'chc.id_category = categories.id');
        $this->db->join('user_has_course_saved uhc', 'c.id = uhc.id_course AND uhc.id_user = ' . $this->session->userdata('id'), 'left');
        $this->db->group_by('c.id');
        $this->db->order_by('created_at', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_data_course_non_auth()
    {
        $this->db->select('c.*, GROUP_CONCAT(categories.name) as category');
        $this->db->from('courses c');
        $this->db->join('course_has_category chc', 'c.id = chc.id_course');
        $this->db->join('categories', 'chc.id_category = categories.id');
        $this->db->group_by('c.id');
        $this->db->order_by('created_at', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_data_course_asc()
    {
        $this->db->select('c.*, GROUP_CONCAT(categories.name) as category, COUNT(uhc.id_user) as has_relation');
        $this->db->from('courses c');
        $this->db->join('course_has_category chc', 'c.id = chc.id_course');
        $this->db->join('categories', 'chc.id_category = categories.id');
        $this->db->join('user_has_course_saved uhc', 'c.id = uhc.id_course AND uhc.id_user = ' . $this->session->userdata('id'), 'left');
        $this->db->group_by('c.id');
        $this->db->order_by('created_at', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_data_course_asc_non_auth()
    {
        $this->db->select('c.*, GROUP_CONCAT(categories.name) as category');
        $this->db->from('courses c');
        $this->db->join('course_has_category chc', 'c.id = chc.id_course');
        $this->db->join('categories', 'chc.id_category = categories.id');
        $this->db->group_by('c.id');
        $this->db->order_by('created_at', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_data_course_az()
    {
        $this->db->select('c.*, GROUP_CONCAT(categories.name) as category, COUNT(uhc.id_user) as has_relation');
        $this->db->from('courses c');
        $this->db->join('course_has_category chc', 'c.id = chc.id_course');
        $this->db->join('categories', 'chc.id_category = categories.id');
        $this->db->join('user_has_course_saved uhc', 'c.id = uhc.id_course AND uhc.id_user = ' . $this->session->userdata('id'), 'left');
        $this->db->group_by('c.id');
        $this->db->order_by('title', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_data_course_za()
    {
        $this->db->select('c.*, GROUP_CONCAT(categories.name) as category, COUNT(uhc.id_user) as has_relation');
        $this->db->from('courses c');
        $this->db->join('course_has_category chc', 'c.id = chc.id_course');
        $this->db->join('categories', 'chc.id_category = categories.id');
        $this->db->join('user_has_course_saved uhc', 'c.id = uhc.id_course AND uhc.id_user = ' . $this->session->userdata('id'), 'left');
        $this->db->group_by('c.id');
        $this->db->order_by('title', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_data_course_az_non_auth()
    {
        $this->db->select('c.*, GROUP_CONCAT(categories.name) as category');
        $this->db->from('courses c');
        $this->db->join('course_has_category chc', 'c.id = chc.id_course');
        $this->db->join('categories', 'chc.id_category = categories.id');
        $this->db->group_by('c.id');
        $this->db->order_by('title', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_data_course_za_non_auth()
    {
        $this->db->select('c.*, GROUP_CONCAT(categories.name) as category');
        $this->db->from('courses c');
        $this->db->join('course_has_category chc', 'c.id = chc.id_course');
        $this->db->join('categories', 'chc.id_category = categories.id');
        $this->db->group_by('c.id');
        $this->db->order_by('title', 'desc');
        $query = $this->db->get();
        return $query->result();
    }


    public function insert_data_course($data)
    {
        return $this->db->insert('courses', $data);
    }
    public function save_category_relation($data)
    {
        $this->db->insert('course_has_category', $data);
    }
    public function save_playlist_relation($data)
    {
        $this->db->insert('course_has_playlist', $data);
    }
    public function delete_category_relation($id)
    {
        $this->db->where('id_course', $id);
        $this->db->delete('course_has_category');
    }
    public function delete_course($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('courses');
    }

    public function get_course_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('courses');

        return $query->row(); // mengembalikan sebuah objek hasil query
    }

    public function get_category_by_id($id)
    {
        $this->db->select('courses.*, GROUP_CONCAT(course_has_category.id_course) AS course_ids, GROUP_CONCAT(course_has_category.id_category) AS category_ids');
        $this->db->from('courses');
        $this->db->join('course_has_category', 'courses.id = course_has_category.id_course', 'left');
        $this->db->where('courses.id', $id);
        $this->db->group_by('courses.id');
        $query = $this->db->get();
        return $query->row();
    }
    public function get_playlist_by_id_course($id)
    {
        $this->db->select('courses.*, GROUP_CONCAT(course_has_playlist.id_course) AS course_ids, GROUP_CONCAT(course_has_playlist.id_playlist) AS playlist_ids');
        $this->db->from('courses');
        $this->db->join('course_has_playlist', 'courses.id = course_has_playlist.id_course', 'left');
        $this->db->where('courses.id', $id);
        $this->db->group_by('courses.id');
        $query = $this->db->get();
        return $query->row();
    }
    public function updateCourse($id, $data)
    {
        $title = $data['title'];
        $instructor = $data['instructor'];
        $summary = $data['summary'];
        $intro_link = $data['intro_link'];
        $mentoring_link = $data['mentoring_link'];
        $intro_duration = $data['intro_duration'];
        $id = $data['id'];
        $this->db->where('id', $id);
        $course = $this->db->get('courses')->row();
        $cover = $course->cover;


        $config['upload_path'] = './assets/images/admin/course/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000;

        $this->load->library('upload', $config);
        //konfigurasi upload
        if ($this->upload->do_upload('cover')) {

            $data = array(
                'title' => $title,
                'instructor' => $instructor,
                'summary' => $summary,
                'intro_link' => $intro_link,
                'mentoring_link' => $mentoring_link,
                'intro_duration' => $intro_duration,
                'cover' => $this->upload->data('file_name')

            );
            $this->db->where('id', $id);
            $this->db->update('courses', $data);
        } else {
            $data = array(
                'title' => $title,
                'intro_link' => $intro_link,
                'summary' => $summary,
                'mentoring_link' => $mentoring_link,
                'intro_duration' => $intro_duration,
                'instructor' => $instructor,
                'cover' => $cover

            );
            $this->db->where('id', $id);
            $this->db->update('courses', $data);
        }
    }

    // Detail Class
    public function get_course_by_id_detail($course_id)
    {
        $this->db->where('id', $course_id);
        $query = $this->db->get('courses');
        return $query->row();
    }

    public function get_playlists_by_course_id($course_id)
    {
        $this->db->select('playlists.*');
        $this->db->from('course_has_playlist');
        $this->db->join('playlists', 'playlists.id = course_has_playlist.id_playlist');
        $this->db->where('course_has_playlist.id_course', $course_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_playlist_by_id($playlist_id)
    {
        $this->db->where('id', $playlist_id);
        $query = $this->db->get('playlists');
        return $query->row();
    }

    public function get_videos_by_playlist_id($playlist_id)
    {
        $this->db->where('id_playlist', $playlist_id);
        $query = $this->db->get('videos');
        return $query->result();
    }

    public function get_detail_videos_by_playlist_id($playlist_id)
    {
        $this->db->where('id_playlist', $playlist_id);
        $query = $this->db->get('videos');
        return $query->result();
    }
    public function get_video_by_id($video_id)
    {
        $this->db->where('id', $video_id);
        $query = $this->db->get('videos');
        return $query->row();
    }

    public function count_course()
    {
        return $this->db->count_all('courses');
    }

    public function getVideoCount($id_course)
    {
        $this->db->select('COUNT(*) as videos');
        $this->db->join('course_has_playlist', 'course_has_playlist.id_playlist = playlists.id');
        $this->db->join('videos', 'videos.id_playlist = playlists.id');
        $this->db->where('course_has_playlist.id_course', $id_course);
        $this->db->from('playlists');
        return $this->db->get()->row()->videos;
    }


    public function updateUserCourse($course, $user, $data)
    {
        $progress = $data['progress'];

        $data = array(
            'progress' => $progress
        );
        $this->db->where('id_course', $course);
        $this->db->where('id_user', $user);
        $this->db->update('user_has_course', $data);
    }

    public function updateFeedback($course, $user, $data)
    {
        $rating = $data['rating'];
        $feedback = $data['feedback'];

        $data = array(
            'rating' => $rating,
            'feedback' => $feedback
        );
        $this->db->where('id_course', $course);
        $this->db->where('id_user', $user);
        $this->db->update('user_has_course', $data);
    }

    public function get_feedback_by_id($courseID, $userID)
    {
        $this->db->where('id_course', $courseID);
        $this->db->where('id_user', $userID);
        $query = $this->db->get('user_has_course');
        return $query->row();
    }

    public function get_data_user_has_course()
    {
        $this->db->select('user_has_course.*, users.id AS id_user, users.name AS user_name, courses.id AS id_course, courses.title AS course_name, courses.instructor AS instructor_name ');
        $this->db->join('users', 'user_has_course.id_user = users.id');
        $this->db->join('courses', 'user_has_course.id_course = courses.id');
        $this->db->order_by('created_at', 'desc');
        $this->db->from('user_has_course');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_data_member()
    {
        $this->db->select('members.*, users.id AS id_user, users.name AS user_name');
        $this->db->join('users', 'members.id_user = users.id');
        $this->db->order_by('created_at', 'desc');
        $this->db->from('members');
        $query = $this->db->get();
        return $query->result();
    }
}
