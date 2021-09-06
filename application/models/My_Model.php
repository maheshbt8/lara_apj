<?php

class My_Model extends Crud_Model
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Common crud
     * **************************************************************************************
     */
    function get_type_row_by_where($type, $where_column = 'id', $type_id = '')
    {
        if ($type_id != '') {
            $l = $this->db->get_where($type, array(
                $where_column => $type_id
            ));
            $n = $l->num_rows();
            if ($n > 0) {
                return $l->row();
            }else{
                return FALSE;
            }
        }
    }
    
    /*exam_plan_relation
     * Main user crud
     * *************************************************************************************************************************
     */
    
    function get_mainexams_info(){
        $user_details=$this->get_user_details($this->login_id);
        $this->db->select('p.id, p.type, p.course_id, p.plan_id, p.subject_id')->from('users_plan_relation up')->join('packages p', 'up.package_id = p.id')->where(array('up.row_status' => 1, 'up.user_id'=>$this->login_id))->order_by('p.id','DESC');
        $packages = $this->db->get()->result_array();
        
        $exams_list = array();
        foreach ($packages as $package){
            $ids = array();
            if($package['type'] == 0){
                $this->db->where(array('e.row_status !=' => 0, 'e.course_id'=>$user_details['exam_type'], "e.subject_id" =>$package['subject_id']));
            }elseif($package['type'] == 1){
                $group1_ids = $this->db->select('id')->get_where('subjects', ['type' => 1, 'row_status' => 1])->result_array();
                foreach ($group1_ids as $g1){
                     $ids[] =  $g1['id']; 
                }
                $this->db->where_in("e.subject_id ", $ids);
                $this->db->where(array('e.row_status !=' => 0, 'e.course_id'=>$user_details['exam_type']));
            }elseif($package['type'] == 2){
                $group1_ids = $this->db->select('id')->get_where('subjects', ['type' => 2, 'row_status' => 1])->result_array();
                foreach ($group1_ids as $g1){
                    $ids[] =  $g1['id'];
                }
                $this->db->where_in("e.subject_id ", $ids);
                $this->db->where(array('e.row_status !=' => 0, 'e.course_id'=>$user_details['exam_type']));
            }elseif($package['type'] == 3){
                $group1_ids = $this->db->select('id')->where_in('type', [1,2])->where('row_status', 1)->get('subjects')->result_array();
                foreach ($group1_ids as $g1){
                    $ids[] =  $g1['id'];
                }
                $this->db->where_in("e.subject_id ", $ids);
                $this->db->where(array('e.row_status !=' => 0, 'e.course_id'=>$user_details['exam_type']));
            }
            $this->db->select('c.course, e.id, e.subject_code,  s.subject,  e.created_at, e.scheduled_date, pl.plan_type, e.time_out, ed.created_at as downloaded_time');
            $this->db->from('exams e');
            $this->db->distinct();
            $this->db->join('courses c', 'c.id = e.course_id');
            $this->db->join('exam_plan_relation ep', 'ep.exam_id = e.id');
            $this->db->join('exam_downloads ed', 'ed.exam_id = e.id','left');
            $this->db->join('plans pl', 'ep.plan_id = pl.id');
            $this->db->join('packages p', 'ep.exam_id = p.id');
            $this->db->join('subjects s', 'e.subject_id = s.id');
            $this->db->order_by('e.id','DESC');
            $exams = $this->db->get();
            if($exams->num_rows() != 0)
                array_push($exams_list, $exams->result_array());
        }
        $final_exams_list = array();
        foreach ($exams_list as $list){
            for($i = 0; $i < count($list); $i++){
                $final_exams_list[] = $list[$i];
            }
        }
        $unique = array_map("unserialize", array_unique(array_map("serialize", $final_exams_list)));
        if(count($unique) != 0)
            return $unique;
        else
          return FALSE;
    }
    
    function fetch_main_exam_downloaded_list($exam_type = '', $start_time = '2019-08-29', $end_time = ''){
        $this->db->select('ed.id, ed.exam_id, ed.created_at,, e.time_out, u.unique_id, u.first_name, u.mobile, ed.marks, ed.out_of, ed.row_status, e.subject_code,e.max_marks');
        $this->db->from('exam_downloads ed');
        $this->db->join('users u', 'u.id = ed.user_id');
        $this->db->join('exams e', 'e.id = ed.exam_id');
        if($exam_type != '')
            $this->db->where(['e.course' => $exam_type, 'ed.creat_at >=' => date('Y-m-d H:i:s', strtotime($start_time)), 'ed.creat_at <=' => date('Y-m-d H:i:s', strtotime(($end_time == '') ? date('Y-m-d'): $end_time))]);
            
            $this->db->where(['ed.user_id' =>$this->session->userdata('login_id')]);
            $this->db->order_by('ed.id', 'DESC');
            $query = $this->db->get();
            //print_r($this->db->last_query());
            if($query->num_rows() != 0)
                return $query->result_array();
                else
                    return FALSE;
                    
    }
    function get_user_notes_info(){
        $user_details=$this->get_user_details($this->login_id);
        $this->db->select('p.id, p.type, p.course_id, p.plan_id, p.subject_id')->from('users_plan_relation up')->join('packages p', 'up.package_id = p.id')->where(array('up.row_status' => 1, 'up.user_id'=>$this->login_id))->order_by('p.id','DESC');
        $packages = $this->db->get()->result_array();
        $exams_list = array();
       /* echo "<pre>";
        print_r($packages);
        echo "<pre>";
        print_r($user_details);*/
        foreach ($packages as $package){
            $ids = array();
            if($package['type'] == 0){
                $this->db->where(array('no.row_status' => 1, 'no.course_id'=>$user_details['exam_type'], "no.subject_id" =>$package['subject_id']));
            }elseif($package['type'] == 1){
                $group1_ids = $this->db->select('id')->get_where('subjects', ['type' => 1, 'row_status' => 1])->result_array();
                foreach ($group1_ids as $g1){
                     $ids[] =  $g1['id']; 
                }
                $this->db->where_in("no.subject_id ", $ids);
                $this->db->where(array('no.row_status' => 1, 'no.course_id'=>$user_details['exam_type']));
            }elseif($package['type'] == 2){
                $group1_ids = $this->db->select('id')->get_where('subjects', ['type' => 2, 'row_status' => 1])->result_array();
                foreach ($group1_ids as $g1){
                    $ids[] =  $g1['id'];
                }
                $this->db->where_in("no.subject_id ", $ids);
                $this->db->where(array('no.row_status' => 1, 'no.course_id'=>$user_details['exam_type']));
            }elseif($package['type'] == 3){
                $group1_ids = $this->db->select('id')->where_in('type', [1,2])->where('row_status', 1)->get('subjects')->result_array();
                foreach ($group1_ids as $g1){
                    $ids[] =  $g1['id'];
                }
                $this->db->where_in("no.subject_id ", $ids);
                $this->db->where(array('no.row_status' => 1, 'no.course_id'=>$user_details['exam_type']));
            }
            $this->db->select('c.course, no.id,  s.subject, no.title, no.created_at');
            $this->db->from('notes no');
            $this->db->distinct();
            $this->db->join('courses c', 'c.id = no.course_id');
            $this->db->join('subjects s', 'no.subject_id = s.id');
            $this->db->order_by('no.id','DESC');
            $exams = $this->db->get();
            if($exams->num_rows() != 0)
                array_push($exams_list, $exams->result_array());
        }
        $final_exams_list = array();
        foreach ($exams_list as $list){
            for($i = 0; $i < count($list); $i++){
                $final_exams_list[] = $list[$i];
            }
        }
        $unique = array_map("unserialize", array_unique(array_map("serialize", $final_exams_list)));
        if(count($unique) != 0)
            return $unique;
        else
          return FALSE;
    }
    function get_single_note_info($note_id){
            $this->db->where(array('no.row_status' => 1,"no.id "=> $note_id));
            $this->db->select('c.course, no.id,  s.subject, no.title, no.created_at');
            $this->db->from('notes no');
            $this->db->distinct();
            $this->db->join('courses c', 'c.id = no.course_id');
            $this->db->join('subjects s', 'no.subject_id = s.id');
        $notes = $this->db->get()->row_array();
        if(count($notes) != 0)
            return $notes;
        else
          return FALSE;
    }
    function get_user_main_videos_info(){
        $user_details=$this->get_user_details($this->login_id);
        $this->db->select('p.id, p.type, p.course_id, p.plan_id, p.subject_id')->from('users_plan_relation up')->join('packages p', 'up.package_id = p.id')->where(array('up.row_status' => 1, 'up.user_id'=>$this->login_id))->order_by('p.id','DESC');
        $packages = $this->db->get()->result_array();
        $exams_list = array();
        foreach ($packages as $package){
            $ids = array();
            if($package['type'] == 0){
                $this->db->where(array('no.row_status' => 1, 'no.course_id'=>$user_details['exam_type'], "no.subject_id" =>$package['subject_id']));
            }elseif($package['type'] == 1){
                $group1_ids = $this->db->select('id')->get_where('subjects', ['type' => 1, 'row_status' => 1])->result_array();
                foreach ($group1_ids as $g1){
                     $ids[] =  $g1['id']; 
                }
                $this->db->where_in("no.subject_id ", $ids);
                $this->db->where(array('no.row_status' => 1, 'no.course_id'=>$user_details['exam_type']));
            }elseif($package['type'] == 2){
                $group1_ids = $this->db->select('id')->get_where('subjects', ['type' => 2, 'row_status' => 1])->result_array();
                foreach ($group1_ids as $g1){
                    $ids[] =  $g1['id'];
                }
                $this->db->where_in("no.subject_id ", $ids);
                $this->db->where(array('no.row_status' => 1, 'no.course_id'=>$user_details['exam_type']));
            }elseif($package['type'] == 3){
                $group1_ids = $this->db->select('id')->where_in('type', [1,2])->where('row_status', 1)->get('subjects')->result_array();
                foreach ($group1_ids as $g1){
                    $ids[] =  $g1['id'];
                }
                $this->db->where_in("no.subject_id ", $ids);
                $this->db->where(array('no.row_status' => 1, 'no.course_id'=>$user_details['exam_type']));
            }
            $this->db->select('c.course, no.id,  s.subject, no.title, no.url, no.created_at');
            $this->db->from('main_videos no');
            $this->db->distinct();
            $this->db->join('courses c', 'c.id = no.course_id');
            $this->db->join('subjects s', 'no.subject_id = s.id');
            $this->db->order_by('no.id','DESC');
            $exams = $this->db->get();
            if($exams->num_rows() != 0)
                array_push($exams_list, $exams->result_array());
        }
        $final_exams_list = array();
        foreach ($exams_list as $list){
            for($i = 0; $i < count($list); $i++){
                $final_exams_list[] = $list[$i];
            }
        }
        $unique = array_map("unserialize", array_unique(array_map("serialize", $final_exams_list)));
        if(count($unique) != 0)
            return $unique;
        else
          return FALSE;
    }
}

