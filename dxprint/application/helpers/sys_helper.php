<?php if (!defined('BASEPATH'))
exit('No direct script access allowed');

function load_instance()
{
    $ci =& get_instance();
    return $ci;
}

function getRandomString($n) {
    $times   = strtotime(date('Y-m-d H:i:s'));
    $bin2hex = bin2hex(random_bytes($n / 2));
    $rand    = $bin2hex . $times;
    return $rand;
}

function current_dt()
{
    $now = date('Y-m-d H:i:s');
    return $now;
}

function insert_any_table($data_insert, $table)
{
    $ci = load_instance();
    $ci->load->database();

    $ci->db->insert($table, $data_insert);
    return $ci->db->affected_rows();
}

function update_any_table($data_upd, $data_where, $table)
{
    $ci = load_instance();
    $ci->load->database();

    $ci->db->set($data_upd);
    $ci->db->where($data_where);
    $ci->db->update($table);
    return $ci->db->affected_rows();
}

function get_any_table_row($data_where, $table, $order_latest = false)
{
    $ci = load_instance();
    $ci->load->database();

    $ci->db->select('*');
    $ci->db->where($data_where);
    if ($order_latest <> false) {
        $ci->db->order_by($order_latest, 'desc');
    }
    $query = $ci->db->get($table);

    if ($query->num_rows() > 0) { return $query->row_array(); }

    return false;
}

function encode($str)
{
    if ($str == "false") {
        $str = array('status' => false);
    }
    if ($str == "true") {
        $str = array('status' => true);
    }
    $return = json_encode($str, JSON_PRETTY_PRINT);
    return $return;
}

function get_any_table_array($data_where = false, $table = false, $col_sort = false, $type_sort = false)
{
    $ci = load_instance();
    $ci->load->database();

    $ci->db->select('*');
    if($data_where <> false){
        $ci->db->where($data_where);
    }
    
    if ($col_sort <> false) {
        $sort = ($type_sort == false) ? "desc" : $type_sort;
        $ci->db->order_by($col_sort, $sort);
    }
    $query = $ci->db->get($table);

    if ($query->num_rows() > 0) {
        return $query->result_array();
    } else {
        return false;
    }
}

function get_keytab_value($key)
{
    $ci = load_instance();
    $ci->load->database();

    $ci->db->select('*');
    $ci->db->where(array('key_type' => $key));
    $query = $ci->db->get('keytab');

    if ($query->num_rows() > 0) {
        $result = $query->row();
        update_keytab_value($key, $result->key_val);
        return $result->key_val;
    } else {
        return false;
    }
}

function update_keytab_value($key, $val)
{
    $ci = load_instance();
    $ci->load->database();

    $ci->db->set(array('key_val' => $val + 1));
    $ci->db->where(array('key_type' => $key));
    $ci->db->update('keytab');

    return $ci->db->affected_rows();
}

function get_value_from_any_table($tbl, $col, $where, $order_by = false)
{
    $ci = load_instance();
    $ci->load->database();

    $ci->db->select($col);
    $ci->db->where($where);
    if ($order_by <> false) {
        $ci->db->order_by($order_by, 'DESC');
        $ci->db->limit(1);
    }
    $query = $ci->db->get($tbl);

    if ($query->num_rows() > 0) {
        $result = $query->row();
        return $result->$col;
    } else {
        return false;
    }
}

function count_any_table($where, $table)
{   
    $ci = load_instance();
    $ci->load->database();

    $ci->db->select('*');
    $ci->db->from($table);
    $ci->db->where($where);
    $query = $ci->db->get();
   
    $row_count = $query->num_rows();
    return $row_count;
    
}

function get_ref_code($module, $code)
{
    $ci = load_instance();
    $ci->load->database();

    $ci->db->select('*');
    $ci->db->where(array('module' => $module));
    $ci->db->where(array('code_id' => $code));
    $query = $ci->db->get('ref_code');

    if ($query->num_rows() > 0) {
        $result = $query->row();
        return $result->code_desc;
    } else {
        return false;
    }
}

function dmy($p_ymd, $p_sep = "/")
{
    $yy = substr($p_ymd, 0, 4);
    $mm = substr($p_ymd, 5, 2);
    $dd = substr($p_ymd, 8, 2);

    $r_dmy = $dd . $p_sep . $mm . $p_sep . $yy;

    if ($r_dmy == $p_sep . $p_sep or $r_dmy == "00" . $p_sep . "00" . $p_sep . "0000") {
        $r_dmy = "";
    }

    return $r_dmy;
}

function display_current_dt()
{
    $now = date('d F Y');
    return $now;
}

function datetime($date)
{
    $dateTime = new DateTime($date);

    $formattedDateTime = $dateTime->format('d-m-Y g:i A');

    return $formattedDateTime;
}

function delete_any_table($where, $table)
{
    $ci = load_instance();
    $ci->load->database();
    $ci->db->delete($table, $where);
    return $ci->db->affected_rows();
}

/*









function view_profile_picture($data)
{
    $url = $data['path'] . "/" . $data['filename'];
    
    $filename = basename($url);

    if (file_exists($url)) {
        # Has image
        $file_extension = strtolower(substr(strrchr($filename,"."),1));
            switch( $file_extension ) {
            case "gif": $ctype="image/gif"; break;
            case "png": $ctype="image/png"; break;
            case "jpeg":
            case "jpg": $ctype="image/jpg"; break;
            default:
        }

        $data   = file_get_contents($url);
        $base64 = 'data:image/' . $file_extension . ';base64,' . base64_encode($data);

        return $base64;
    }else{
        # No image
    }
}

function get_any_table_array($data_where = false, $table = false, $col_sort = false, $type_sort = false)
{
    $tco = load_instance();
    $tco->load->database();

    $tco->db->select('*');
    if($data_where <> false){
        $tco->db->where($data_where);
    }
    
    if ($col_sort <> false) {
        $sort = ($type_sort == false) ? "desc" : $type_sort;
        $tco->db->order_by($col_sort, $sort);
    }
    $query = $tco->db->get($table);

    if ($query->num_rows() > 0) {
        return $query->result_array();
    } else {
        return false;
    }
}



function get_keytab_value($key)
{
    $tco = load_instance();
    $tco->load->database();

    $tco->db->select('*');
    $tco->db->where(array('type' => $key));
    $query = $tco->db->get('keytab');

    if ($query->num_rows() > 0) {
        $result = $query->row();
        update_keytab_value($key, $result->key_num);
        return $result->key_num;
    } else {
        return false;
    }
}

function update_keytab_value($key, $val)
{
    $tco = load_instance();
    $tco->load->database();

    $tco->db->set(array('key_num' => $val + 1));
    $tco->db->where(array('type' => $key));
    $tco->db->update('keytab');

    return $tco->db->affected_rows();
}

function get_ref_subject($code)
{
    $tco = load_instance();
    $tco->load->database();

    $tco->db->select('*');
    $tco->db->where(array('code' => $code));
    $query = $tco->db->get('ref_subject');

    if ($query->num_rows() > 0) {
        $result = $query->row();
        return $result->descs;
    } else {
        return false;
    }
}

function get_class_ref($id)
{
    $tco = load_instance();
    $tco->load->database();

    $tco->db->select('*');
    $tco->db->where(array('id' => $id));
    $query = $tco->db->get('class');

    if ($query->num_rows() > 0) {
        $result = $query->row();
        return $result->name;
    } else {
        return false;
    }
}

function get_ref_tutor($id)
{
    $tco = load_instance();
    $tco->load->database();

    $tco->db->select('*');
    $tco->db->where(array('tutor_id' => $id));
    $query = $tco->db->get('tutor');

    if ($query->num_rows() > 0) {
        $result = $query->row();
        return $result->name;
    } else {
        return false;
    }
}



function getWeekendDates($startDate, $days = 30) {
    // Create a DateTime object from the provided start date
    $date = new DateTime($startDate);
    
    // Array to hold weekend dates
    $weekendDates = [];

    // Loop through the next 30 days
    for ($i = 0; $i < $days; $i++) {
        // Check if the current day is a Friday, Saturday, or Sunday
        $dayOfWeek = $date->format('N'); // N returns 1 (Monday) through 7 (Sunday)
        
        if ($dayOfWeek == 5 || $dayOfWeek == 6 || $dayOfWeek == 7) {
            $weekendDates[] = $date->format('Y-m-d');
        }
        
        // Move to the next day
        $date->modify('+1 day');
    }

    return $weekendDates;
}

function getDay($date)
{
    // Create a DateTime object from the given date
    $date = new DateTime($date); // Replace with your desired date

    // Get the day of the week
    $dayOfWeek = $date->format('l'); // 'l' returns the full day name (e.g., "Monday", "Tuesday")

    return $dayOfWeek;
}

function checking_slot($date, $time, $student_id, $tuition_id)
{
    $tco = load_instance();
    $tco->load->database();

    $tco->db->select('id');
    $tco->db->where('class_dt', $date);
    $tco->db->where('class_time', $time);
    $tco->db->where('student_id', $student_id);
    $tco->db->where('tuition_id', $tuition_id);
    $query = $tco->db->get('student_timetable');
    

    if ($query->num_rows() > 0) {
        echo 'disabled';
    } else {
        //echo 'disabled';
    }
}

function current_date(){
    $current_date = date("Y-m-d");
    return $current_date;
}

function get_day_only($date)
{
    $day = date("d", strtotime($date));  // Extract the day (01-31)

    return $day;
}

function get_month_only($date)
{
    $month_name = date("M", strtotime($date));
    return $month_name;
}

function count_student_inClass($id)
{   
    $tco = load_instance();
    $tco->load->database();

    $tco->db->select('*');
    $tco->db->from('student_class');
    $tco->db->where('class_id', $id);
    $tco->db->group_by('student_id');
    $query = $tco->db->get();

    //if ($query->num_rows() > 0) {
        $row_count = $query->num_rows();
        return $row_count;
    // } else {
    //     return '0';
    // }
}

function count_tutor_inClass($class_id)
{
    $tco = load_instance();
    $tco->load->database();

    $tco->db->select('*');
    $tco->db->from('tutor');
    $tco->db->where('assign_class', $class_id);
    $query = $tco->db->get();

    $row_count = $query->num_rows();
    return $row_count;
    
}

function count_any_table($where, $table)
{   
    $tco = load_instance();
    $tco->load->database();

    $tco->db->select('*');
    $tco->db->from($table);
    $tco->db->where($where);
    $query = $tco->db->get();
   
    $row_count = $query->num_rows();
    return $row_count;
    
}

function count_student_form($loopStudents, $form)
{   

    $student_detail = array();
    foreach ($loopStudents as $key) {
        $student_detail[] = get_any_table_row(array('student_id' => $key['student_id'], 'form' => $form), 'student_information');
    }


    // print_r($student_detail);

    // Count the number of student details after the loop
    $count = count(array_filter($student_detail));
    return $count;
}


function count_student_complete($loopStudents, $homework_id)
{
    $student_detail       = array();
    foreach ($loopStudents as $key) {
        $student_detail[] = get_any_table_row(array('student_id' => $key['student_id'], 'homework_id' => $homework_id, 'status' => '1'), 'homework_status');
    }

    // Count the number of student details after the loop
    $count = count(array_filter($student_detail));
    return $count;
}


*/





