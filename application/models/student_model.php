<?php

Class Student_Model extends CI_Model{
    public function insert_task($data){
        $this->db->insert('task_list', $data);
        if($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }

    public function get_taskby_id($id){
        $condition= "task_id= " . "'" . $id . "'";
        $this->db->select('*');
        $this->db->from('task_list');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }
    public function get_task(){

        $this->db->select('*');
        $this->db->from('task_list');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }
    
    public function remove_task($id){
        $result = $this->db->delete('task_list', array('task_id' => $id));
        if($result){
            return true;
        }
        else{
            return false;
        }
     }
}