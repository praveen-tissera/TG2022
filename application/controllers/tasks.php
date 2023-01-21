<?php

class Tasks extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // Load form helper library
        $this->load->helper('form');

        // Load form validation library
        $this->load->library('form_validation');

        // Load session library
        $this->load->library('session');

        // Load database
        $this->load->model('task_model');
    }
    public function index()
    {
        
    }
    public function add_task($step=0){
        if($step == 0){
            $this->load->view('task_add');
        }else if($step==1){
            print_r($_POST);
            $data = array (
                'task_description'=> $_POST['taskDescription'],
                'status'=>'new',
                'created_date'=>date('Y-m-d')
            );
            $result = $this->task_model->insert_task($data);
            if($result){
                $data = array(
                    'message_display'=> 'Task Added Successfully'
                );
                $this->load->view('task_add',$data);
                echo 'inserted';

            }else {
                $data = array(
                    'error_message'=> 'Error on adding the task'
                );
                $this->load->view('task_add',$data);
                echo 'error';
            }
        }
        
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
        $result = $this->task_model->get_taskby_id($id);
        $data = array(
            'task_detail' => $result
        );
        print_r($result);
        $this->load->view('single_task_edit_view',$data);
    }
}
