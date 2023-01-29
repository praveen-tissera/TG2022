<?php

    class DashboardController extends CI_Controller{

        public function __construct(){
            parent::__construct();

            //load form helper library
            $this->load->helper('form');

            //load form validation library
            $this->load->library('form_validation');

            //load session library
            $this->load->library('session');

            //load database
            $this->load->model('student_model');
        }
    
        public function index(){
            
        }

        public function student_details(){
            $this->load->view('student_details');
        }

        public function view_tasks(){
            $result = $this->task_model->get_task();
            $data['task_list'] = $result;
    
            // print_r($result);
            $this->load->view('task_view',$data);
        }

        public function delete_tasks($id){
            $result_delete = $this->task_model->remove_task($id);
            $result_tasks = $this->task_model->get_task();
            if($result_delete){
                $data = array(
                    'message_display'=> 'Task Deleted Successfully',
                    'task_list'=>$result_tasks
                );
            }else{
                $data = array(
                    'error_message'=> 'Unable to delete try again.',
                    'task_list'=>$result_tasks
                ); 
            }
            
            

            // print_r($result);
            $this->load->view('task_view',$data);
        }

        public function edit_tasks($id){
            $result= $this->task_model->get_taskby_id($id);
            $data= array('task_detail' => $result);
            print_r($result);
            $this->load->view('single_task_edit_view', $data);
        }
         
}