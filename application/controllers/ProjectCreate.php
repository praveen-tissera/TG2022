<?php
class ProjectCreate extends CI_Controller {

	public function __construct()
			{
					parent::__construct();
					$this->load->model('project_model');
					$this->load->helper('url_helper');
					$this->load->library('session');
				
			}
			
			
	public function check_restricted() {

			$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
			if( empty($this->session->userdata('logged_in'))){	
				if(strpos($url,'/login') == false) {
					$data['title'] = 'Restricted Page, Please log in';
					$this->load->view('templates/header', $data);
					$this->load->view('templates/footer');
										
					redirect('login', 'refresh');
					//$this->output->set_header('refresh:3; url='.site_url('login'));
				}
				return false;					
			}
			return true;
	}

	public function projectCreate(){
		if($this->check_restricted() == false) {return;};
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = 'Creating Project';
		
		$this->form_validation->set_rules('projectTitle', 'Project Title', 'required');
		$this->form_validation->set_rules('projectType', 'Project Type', 'required');
		
		$this->form_validation->set_rules('startDate', 'Start Date', 'required');
		$this->form_validation->set_rules('endDate', 'End Date', 'required');
		$this->form_validation->set_rules('projectBudget', 'Budget', 'required');

		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/profile_header', $data);
			$this->load->view('pages/project/createProject', $data);
			$this->load->view('templates/footer');

		}
		else
		{
			$session_data= $this->project_model->set_project();
			$this->session->set_userdata("projectID", $session_data);
			redirect('create_tasks', $data);
		} 
    }


public function createTasks(){
		if($this->check_restricted() == false) {return;};
		$this->load->helper('form');
		$this->load->library('form_validation');

		$task = $this->input->post('task');
		print_r ($task);
		 //$roles[] = array();
		if(!empty($task))
		{
			echo "<br>".sizeof($task);
			// Loop through hotels and add the validation
			foreach($task as $id => $data)
			{
				$this->form_validation->set_rules('task[' . $id . '][title]', 'Name'. $id , 'required');
				$this->form_validation->set_rules('task[' . $id . '][startDate]', 'Cost'. $id , 'required');
				$this->form_validation->set_rules('task[' . $id . '][endDate]', 'City'. $id , 'required');
				$role = $this->input->post('task[' . $id . '][role]');
				//unset($roles);
				//$roles[] = array();
				foreach($role as $id2 => $role)
				{
					$this->form_validation->set_rules('task[' . $id . '][role]['.$id2.'][name]', 'Task '.$id.' Role name '. $id2 , 'required');
					$this->form_validation->set_rules('task[' . $id . '][role]['.$id2.'][numPeople]', 'Task '.$id.' Number of People '. $id2 , 'required');
					$this->form_validation->set_rules('task[' . $id . '][role]['.$id2.'][skill][0][skillID]', 'Task '.$id.' A Skill for Role '. $id2 , 'required');


				}
			}
		}
	
			
		

		if ($this->form_validation->run() === FALSE)
		{
			$data['title'] = 'Setting Tasks and Roles';
		
			$data['skills'] =  $this->project_model->load_skills();
		
			$this->load->view('templates/profile_header', $data);
			$this->load->view('pages/project/createTasks', $data);
			$this->load->view('templates/footer');

		}
		else
		{
			$this->project_model->set_tasks();
			redirect('project_allocation');
		} 
    }
    
    public function allocation()
{        
	    if($this->check_restricted() == false) {return;};
		$projectID = ($this->session->projectID);
		$this->check_restricted();
		$this->load->helper('form');
		$this->load->library('form_validation');
		

		//$data['find'] = true;
		$assigns = $this->input->post('assign');
		if(!empty($assigns))
			foreach($assigns as $id => $a)
			{
						$this->form_validation->set_rules('assign[' . $id . '][roleID]', 'Role ID' , 'required');
						$this->form_validation->set_rules('assign[' . $id . '][accountID]', 'Account ID' , 'required');
			}
		
		if ($this->form_validation->run() === FALSE){
					
			$data['title'] = 'Select Roles';
			$data['info'] = $this->project_model->join_find_project($projectID);
			$data['tasks'] = $this->project_model->find_tasks($projectID);
			$data['roles'] = $this->project_model->find_roles_alloc($projectID);
			$data['match'] = $this->project_model->search_algorithm();
			$data['candidates'] = $this->project_model->allCandidates();
			$data['projectID'] = $projectID;
					
			$this->load->view('templates/profile_header', $data);
			$this->load->view('pages/project/role_select');
			$this->load->view('templates/footer');
			
		}else{
			$this->project_model->assignSelectedProject($projectID);
			redirect('find_project/'.$projectID);	
		}
		


}


    
 public function allocationOld(){
    	
    	if($this->check_restricted() == false) {return;};
    	$this->load->helper('form');
    	
		$data['query'] = $this->project_model->search_algorithm();
    	
    	$this->load->view('templates/profile_header');
		$this->load->view('pages/project/role_select', $data);
		$this->load->view('templates/footer');
    	
    }

}
?>
