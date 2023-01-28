<?php
class Project_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		public function get_news($slug = FALSE)
{
        if ($slug === FALSE)
        {
                $query = $this->db->get('news');
                return $query->result_array();
        }

        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
}

public function set_login()

{
	$username = $this->input->post('username');
	$password = $this->input->post('password');
	$this->db->select('accountID','username', 'password');
	$this->db->	from('user_account');
	$this->db->	where('username',$username);
	$this->db->	where('password',$password);
	$this->db->limit(1);
	
	$query = $this->db->get();
	
	if($query-> num_rows() == 1){
		$accountID = $query->result()[0]->accountID;
		$newsession = array(
		  'accountID' => $accountID,
        'username'  => $username,
        'logged_in' => TRUE
		);

		$this->session->set_userdata($newsession);
		return $query->result();

	}else{
		return FALSE;			
	}


    $this->load->helper('url');
   

}

public function set_logout(){	


	$this->session->unset_userdata('username');
	$this->session->unset_userdata('logged_in');
	
	$this->session->sess_destroy();
	}

public function set_account()
{
    $this->load->helper('url');
    

    $accountData = array(
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password'),
        'email' => $this->input->post('emailAddress'),
        'typeID' => $this->input->post('type')
    );
    

	
	$a = $this->db->insert('user_account', $accountData);

    return $a;
}

	
	public function load_skills(){
		//query existing skill names
		$this->db-> select('skillName');
		$this->db->	from('skills');
		
		$query = $this->db->get();
		
		if($query-> num_rows()  == 0){
			return;
		}
		$skillNames = $query->result_array();
		
        
        //query existing skill levels
		$this->db-> select('level');
		$this->db->	from('skillLevel');
 
		
		$query = $this->db->get();
		
		if($query-> num_rows() == 0){
			return;
		}
		$skillLevels = $query->result_array();
		//put skill names and levels into an array
		$skills =  array(
			'names' => $skillNames, 
			'levels' => $skillLevels
		);
		
		return $skills;
	}
	

	public function edit_profile()
	{
	    $this->load->helper('url');
	    
	   $accountID = $this->session->accountID;
	    
	   $this->db->select('addressID');
		$this->db->	from('person');
		$this->db->	where('accountID',$accountID);
		$this->db->limit(1);
		
		$query = $this->db->get();
		
		if($query-> num_rows() == 1){
			$addressID = $query->result()[0]->addressID;
		}
	    
		$addressData = array(
				'country' => $this->input->post('country'),
				'city' => $this->input->post('city'),
				'postcode' => $this->input->post('postcode'),
				'streetName' => $this->input->post('streetName'),
				'country' => $this->input->post('country'),
				'buldingNumber' => $this->input->post('buildingNumber')
			);
			
		$this->db->	where('addressID',$addressID);	
		$this->db->update('address', $addressData);

		
		echo $accountID. ' '. $addressID;
			
		$profileData = array(
				'accountID' => ($accountID),
	         'firstname' => $this->input->post('fname'),
	         'lastname' => $this->input->post('sname'),
				'addressID' => ($addressID),
	         'dob' => $this->input->post('dob'),
	         'religion' => $this->input->post('religion'),
	         'locationFlexibility' => $this->input->post('locationFlex') == "able" ? 1 : 0
	    );
	    
	  	$this->db->	where('accountID',$accountID);	
	  	$this->db->update('person', $profileData);

	}




public function set_project()
{
    $this->load->helper('url');
    
   $accountID = $this->session->accountID;
   
   $addressData = array(
	'city' => $this->input->post('city'),
	'postcode' => $this->input->post('postcode'),
	'streetName' => $this->input->post('streetName'),
	'country' => $this->input->post('country'),
	'buldingNumber' => $this->input->post('buildingNumber')
);
		$this->db->insert('address', $addressData);
		$addressID = $this->db->insert_id();

//    projectID managerID	title	startDate	endDate	budget	projectTypeID	completed
	$projectData = array(
			'title' => $this->input->post('projectTitle'),
            'managerID' => ($accountID),
			'addressID' => ($addressID),
			'startDate' => $this->input->post('startDate'),
			'endDate' => $this->input->post('endDate'),
			'budget' => $this->input->post('projectBudget'),
			'projectTypeID' => $this->input->post('projectType')
		);
		
		
	$this->db->insert('project', $projectData);
	$projectID = $this->db->insert_id();
	$skillIDs = $this->input->post("skillID");
	$skillLevels = $this->input->post("skillLevel");
	$skillNumPeoples = $this->input->post("skillNumPeople");

	//~ //projectReq	skillID	skillLevel	numPeople
	//~ for ($i=0; $i < count($skillIDs); $i++) {
         //~ $skillsData[] = array(
			//~ 'projectReq'=>$projectID,
			//~ 'skillID'=>$skillIDs[$i],
			//~ 'skillLevel'=>$skillLevels[$i],
			//~ 'numPeople'=>$skillNumPeoples[$i],
         //~ ); // store values in array  
	//~ }
	//~ $this->db->insert_batch('project_skills_required', $skillsData);
	return $projectID;

}



public function set_tasks()
{
    $this->load->helper('url');
    
   $accountID = $this->session->accountID;
	$tasks = $this->input->post('task');
	$projectID = ( $this->session->projectID);
	echo $projectID;
		//taskID 	projectID 	title 	startDate 	endDate
	foreach($tasks as $id4 => $task){
		$taskData[] = array(
			'projectID'=>$projectID,
			'title' => 	$task['title'],			//$this->input->post('task[][title]'),
			'startDate' => 	$task['startDate'],	// $this->input->post('task[][startDate]'),
			'endDate' => $task['endDate'] 		//$this->i nput->post('task[][endDate]'),
		);
		$this->db->insert_batch('project_tasks', $taskData);
		$taskID = $this->db->insert_id();
		if(isset($roleData))
			unset($roleData);
		$roles = $this->input->post('task[' . $id4 . '][role]');
		foreach($roles as $id2 => $role){
			$roleData[] = array(
				'projectID' => $projectID,
				'taskID' => $taskID,
				'roleName' => 	$role['name'],			//$this->input->post('task[][title]'),
				'numPeople' => 	$role['numPeople'],	// $this->input->post('task[][startDate]'),
			);
			$this->db->insert_batch('project_roles', $roleData);
			echo "<<<<<<<<<<< Project role db";
			print_r($this->db->last_query());
			$roleID = $this->db->insert_id();
			
			if(isset($skillData))
				unset($skillData);
			$skills = $this->input->post('task[' . $id4 . '][role]['.$id2.'][skill]');
			//~ $skillData[] = array();
			foreach($skills as $id3 => $skill){
				$skillData[] = array(
					'roleID' => $roleID,
					'skillID' => 	$skill['skillID'],			//$this->input->post('task[][title]'),
					'skillLevel' => 	$skill['skillLevel'],	// $this->input->post('task[][startDate]'),
				);
			}
			echo "<br> skills entry <br>";
			print_r ($skillData);
			$this->db->insert_batch('role_skills_required', $skillData);

		}
	}

}

public function search_algorithm(){
	/*
		1. take in tasks. For each task, query the database for someone with the skills required to do the task.
		2. return a person appropriate to the task.
		3. Insert into the database the person associated to the task and project.
	*/
	
	//get project ID
	//get roles in project
	 
	//$projectID = $this->session->userdata('projectID');	

	/*$this->db->select('projectID');
	$this->db->from('project');
	$this->db->where('project.projectID', '1');
	$projectID = $this->db->get()->result();
	*/
	
	/*$projectID = 1;*/
	$projectID = ( $this->session->projectID);
	//print_r($projectID);
	
	$this->db-> select('taskID');
	$this->db-> from('project_roles');
	$this->db-> where('projectID', $projectID);
	$tasks = $this->db->get()->result_array();
	
	//print_r($tasks);

	foreach($tasks as $t){
		print_r($t);
		$this->db-> select('roleID');
		$this->db-> from('project_roles');
		$this->db-> where('taskID', $t['taskID']);
		//$this->db-> where('projectID',$projectID);
		$roles = $this->db->get()->result_array();
		
		foreach($roles as $r){
			
				$this->db-> select('skillID');
				$this->db-> from ('role_skills_required');
				$this->db-> where('roleID',$r['roleID']);
				$skill_required = $this->db->get()->result_array();
			
			foreach($skill_required as $skill){
		
				/*$this->db-> select('*');
				$this->db->	from('person', 'user_account');
				$this->db-> join('user_account', 'person.accountID = user_account.accountID');
				$this->db-> join('address', 'person.addressID = address.addressID');
				$this->db-> join('user_skills', 'person.accountID = user_skills.accountID');
				$this->db->	where('user_skills.skillID',$skill['skillID']); //where each element of skills required array 	
				//$this->db->	where('person.availability','0');
				*/
				
				$this->db->select('user_account.accountID');
				$this->db->from('user_account');
				$this->db->join('user_skills', 'user_skills.accountID = user_account.accountID');
				$this->db->where('user_skills.skillID', $skill['skillID']);
				$this->db-> limit(1);
				
				$accountID = $this->db->get()->row();
				echo "count details";
				print_r($accountID);
				if(count((array)$accountID) < 1){
					echo 'No match of person that fulfills the roles skill requirements!';
					return;
				}
			
				$employee_assignment = array(
					'accountID' => $accountID->accountID,
		            'roleID' => $r['roleID']
				);

				
				$this->db->insert('employee_assignment', $employee_assignment);
				
			}
		}
	}
	
	
	/*$this->db-> select('*');
	$this->db-> from ('user_account acc', 'person p', 'project_roles pr', 'project_assignment pa', 'project_tasks pt');
	$this->db-> join('user_account', 'p.accountID = acc.accountID'); 
	$this->db-> join('employee_assignment', 'pa.accountID = acc.accountID'); 
	$this->db-> join('project_roles','pa.roleID = pr.roleID');
	$this->db-> join('project_tasks', '
	*/
	
	$this->db->select('taskID');
	$this->db->from ('project_roles');
	$this->db->where ('projectID', $projectID);
	$tasks = $this->db->get()->result_array();

	// $assigned_data[] = array();
	foreach($tasks as $t){
		
		$this->db-> select('roleID');
		$this->db-> from('project_roles');
		$this->db-> where('taskID', $t['taskID']);
		$roles = $this->db->get()->result_array();
		
		foreach($roles as $r){
				$this->db->select('accountID');
				$this->db->from('employee_assignment');
				$this->db->where('roleID', $r['roleID']);
				$accounts_assigned = $this->db->get()->result_array();

				foreach($accounts_assigned as $accounts){

					$this->db->select('*');
					$this->db->from ('user_account', 'person');
					$this->db->join('person', 'user_account.accountID = person.accountID');
					$this->db->where('person.accountID', $accounts['accountID']);
					$query = $this->db->get()->result_array();
					print_r($this->db->last_query());
					echo "hello///////////";
					print_r($query);
					$assigned_data[] = $query;
					print_r($assigned_data);
					/*'username', 'person.accountID', 'email', 'firstname', 'lastname'
					$this->db->select('user_account.accountID');
					$this->db->from('user_account');
					$this->db->join('user_skills', 'user_skills.accountID = user_account.accountID');
					$this->db->where('user_skills.skillID', $skill['skillID']);
					$query = $this->db-> limit(1);
					$query = $this->db->get()->result();*/

					
					}

			}		

		}
		echo "//////////////////////////";
		
				return $assigned_data;
	
	
	/*$this->db->select('*');
	$this->db->from('employee_assignment');
	$roleID = $this->db->get()->reslt_array();
		
	*/
	
}
public function join_find_project($projectID)
	{

		$this->db->select('*');
		$this->db->from('project');
		$this->db->join('user_account', 'project.managerID = user_account.accountID');
		$this->db->join('person', 'project.managerID = person.accountID');
		$this->db->join('address', 'project.addressID = address.addressID');
		$this->db->where('project.projectID', $projectID);
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() != 1) {
			return;
		}

		return $query->result_array();
	}
	public function find_tasks($projectID)
	{
		$this->db->select('*');
		$this->db->from('project_tasks');
		$this->db->where('project_tasks.projectID', $projectID);

		$query = $this->db->get();

		return $query->result_array();
	}
	public function find_roles_alloc($projectID)
	{
		$this->db->select('*');
		$this->db->from('project_roles');
		$this->db->where('project_roles.projectID', $projectID);
		$tasks = $this->db->get()->result_array();
		$roles = array();
		// print_r($tasks);
		foreach ($tasks as $t) {
			//print_r($t);
			$this->db->select('pr.*');
			$this->db->from('project_roles as pr');
			//		$this->db-> join('project_tasks','pr.taskID = project_tasks.taskID');
			//		$this->db-> join('project','project.projectID = project_tasks.projectID');
			$this->db->where('pr.taskID', $t['taskID']);
			//$this->db-> where('projectID',$projectID);
			$roles[] = $this->db->get()->result_array();
		}
		//	print_r($roles);
		//echo "hello";
		return $roles;
	}
	public function allCandidates()
	{

		/* Current expenditure on employees for the project // project ID */
		$budgetExpenditure = 0;
		$projectID = ($this->session->projectID);

		/* Get the budget for the project */
		$this->db->select('budget');
		$this->db->from('project');
		$this->db->where('projectID', $projectID);

		$budgetLimit = (int)($this->db->get()->result()[0]->budget);

		/* Return all tasks in project into an array */
		$this->db->select('taskID');
		$this->db->from('project_roles');
		$this->db->where('projectID', $projectID);
		$taskArray = $this->db->get()->result_array();


		$candidateArray = array();
		// $rolesArray = array();


		/* Loop through tasks to get all roles  */
		foreach ($taskArray as $t) {
			$this->db->select('roleID,numPeople');
			$this->db->from('project_roles');
			$this->db->where('taskID', $t['taskID']);
			$query = $this->db->get();
			$rolesArray = $query->result_array();
			// $taskStartDate = $t['startDate'];
			// $taskEndDate   = $t['endDate'];

			// array_push($rolesArray, $this->db->get()->result_array());

			/* Loop through roles and get the skills required for them */
			foreach ($rolesArray as $r) {

				$this->db->select('skillID,skillLevel');
				$this->db->from('role_skills_required');
				$this->db->where('roleID', $r['roleID']);
				$skills_required = $this->db->get()->result();
				$skillslist = array();
				foreach ($skills_required as $sr)
					$skillslist[] = $sr->skillID;


				$this->db->select('user_account.accountID, firstname,lastname, address.*');
				$this->db->from('user_account');
				$this->db->join('user_skills', 'user_skills.accountID = user_account.accountID');
				$this->db->join('person', 'person.accountID = user_account.accountID');
				$this->db->join('address', 'person.addressID = address.addressID');
				$this->db->where_in('user_skills.skillID', $skillslist);



				$candidates = $this->db->get()->result();
				array_push(
					$candidateArray,
					array(
						'roleID' => $r['roleID'],
						'candidates' => $candidates
					)
				);
			}
		}

		return $candidateArray;
	}


}



