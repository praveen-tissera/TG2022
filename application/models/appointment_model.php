<?php

class Appointment_Model extends CI_Model
{
    // this function will return all the active doctors
    public function active_doctors(){
        // SELECT * FROM `agent_detail` WHERE status='active'
        $condition = "status='active'";
        $this->db->select('*');
        $this->db->from('agent_detail');
        $this->db->where($condition);
        // run above query in mysql server. return data will be store in the query variable
        $query = $this->db->get();
        // we can expect two types of resutle
        //1. not found(empty) 2. found we need to check for that
        if($query->num_rows() == 0){
            return false;
        }else{
            return $query->result();
        }

    }
    public function agent_slots_search($data)
    {
        // print_r($data);

        $condition = "doctor_id ='{$data['doctor_id']}' && date='{$data['date']}'";
        $this->db->select('*');
        $this->db->from('agent_slots');
        $this->db->where($condition);
        
        $query = $this->db->get();
        $this->db->last_query();
        if($query->num_rows() == 0){
            return false;
        }else{
            return $query->result();
        }
    }

    public function doctor_search_slotid($data)
    {
        // print_r($data);

        $condition = "slot_id ='{$data['slotId']}'";
        $this->db->select('*');
        $this->db->from('agent_slots');
        $this->db->where($condition);
        
        $query = $this->db->get();
        $this->db->last_query();
        if($query->num_rows() == 0){
            return false;
        }else{
            return $query->result();
        }
    }
    public function booking_details_insert($data){
        $this->db->insert('booking_details', $data);
        if ($this->db->affected_rows() > 0) {
            $datatoUpdate = array(
                'status'=>'not available'
            );
            $bookingid = $this->db->insert_id();
            $this->slot_update($datatoUpdate, $data['slot_id']);
            return $bookingid;
            // return true;
        }else{
            return false;
        }
    }

    // update slot details
    public function slot_update($data,$slotid) {
        
        $this->db->where('slot_id', $slotid);
        $this->db->update('agent_slots', $data);
        return true;
    }


    // Insert registration data in database
    public function registration_insert($data)
    {
        // get last inserted id
        $this->db->insert_id();

        // Query to check whether username already exist or not
        $condition = "user_name =" . "'" . $data['user_name'] . "'";
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {

            // Query to insert data in database
            $this->db->insert('user_login', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        } else {
            return false;
        }
    }

    // Read data using username and password
    public function login($data)
    {
        // SELECT * FROM `user_login` WHERE user_name = 'nuwan' && user_password='123456'

        $condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where($condition);
        $this->db->limit(1);
        // run this query to get result
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    // Read data from database to show data in admin page
    public function read_user_information($username)
    {

        $condition = "user_name =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}
