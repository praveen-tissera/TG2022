<?php

//session_start(); //we need to start session in order to access it through CI

Class Appointment extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('appointment_model');
	}
	public function index(){
		// calling active doctors function to retrive dr details
		$result = $this->appointment_model->active_doctors();
		// echo '<pre>';
		// print_r($result);
		// echo '</pre>';
		// php array
		$data['doctor_details'] = $result; 
		// load the appointment view file
		$this->load->view('appointment_form',$data);
	}
	public function appointment_show(){
		$this->load->view('appointment_form');
	}
	public function appointment_booking_view(){
		// print_r($_POST);
		// todo: validate if date is higher than current date
		// pass these data to model
		$data = array(
			'doctor_id' => $this->input->post('doctorid'),
			'date' => $this->input->post('date')
			);
		$result = $this->appointment_model->doctor_slots_search($data);
		// print_r($result);
		if(gettype($result) == 'boolean' && !$result){
			$data['doctor_appointment_slots'] = 'No Records Found for this doctor';
		}else{
			$data['doctor_appointment_slots'] = $result;
		}
		
	
		$this->load->view('appointment_slots',$data);




	}
	public function booking($slotId){
		// if user session not exist show guest registration.  otherwise use current session details
		$data['slotId'] = $slotId;
		$result = $this->appointment_model->doctor_search_slotid($data);
		$data['slotDetails'] = $result;
		$this->load->view('appointment_guest_registraion',$data);
	}

	public function register_patient(){
		// print_r($_POST);
		$data = array(
			'slot_id'=>$_POST['slotid'],
			'name' => $_POST['name'],
			'age'=> $_POST['age'],
			'contact_number' => $_POST['contactNumber'],
			'staus'=>'active',
			'created_date' => date('Y-m-d')
		);
		// print_r($data);
		$result = $this->appointment_model->booking_details_insert($data);
		// collect date and time
		$dataslotId = array(
			'slotId'=> $_POST['slotid']
		);
		$result_slot = $this->appointment_model->doctor_search_slotid($dataslotId);
		// print_r($result_slot);
		// print_r($result);
		$bookingData = array(
			'bookingnumber'=> $result,
			'slotnumber' => $_POST['slotid'],
			'date'=> $result_slot[0]->date,
			'time'=> $result_slot[0]->time
		);
		// print_r($bookingData);
		$this->load->view('appointment_complete',$bookingData);
	}
		
	
}

?>