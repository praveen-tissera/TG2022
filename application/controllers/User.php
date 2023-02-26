<?php

require_once(APPPATH . 'libraries/paypal-php-sdk/paypal/rest-api-sdk-php/sample/bootstrap.php'); // require paypal files

use PayPal\Api\ItemList;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Amount;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RefundRequest;
use PayPal\Api\Sale;

Class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Load form helper library
        $this->load->helper('form');
        // Load form validation library
        $this->load->library('form_validation');
        // Load session library
        $this->load->library('session');
        //load url library
        $this->load->helper('url');
        // Load database
        $this->load->model('User_model');
        $this->load->model('paypal_model', 'paypal');
        // paypal credentials
        $this->config->load('paypal');
        
        $this->_api_context = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $this->config->item('client_id'), $this->config->item('secret')
            )
        );
        date_default_timezone_set("Asia/colombo");
    
        $this->load->library('upload');
    // loading index page
        
    } 
    public function index(){
        $this->load->view('home');
    }

    // loading registration page
    public function register(){
        $this->load->view('register');
    }
    // process the submission of the registration form

    public function userRegister(){
    
        $data = array(
            'email'=> $_POST['email'],
            'title'=> $_POST['title'],
            'first_name'=>$_POST ['firstname'],
            'last_name'=> $_POST['lastname'],
            'phone_number'=>$_POST['contactnumber'],
            'register_date'=>date("Y-m-d"),
            'password'=>$_POST['password'],
            'user_type'=>'register',
            'status'=>'active'
    );
    $result = $this->User_model->add_registered_user_details($data);
        if ($result) {
            
            $data['success_message_display'] = "You Have Registered Succesfully";
             $this->load->view('login',$data);             
        }
        else {
            $data['error_message_display'] = "Sorry! You Have Already Registered !";
            $this->load->view('register',$data);
        }
}
 // loading Login page
    public function login(){
        $this->load->view('login');
        }
// Manager login page
        public function mgtLogin(){
            
            if (isset($this->session->userdata['staffuser']) && $this->session->userdata['staffuser']->staff_role=='manager') {
                $this->dashboard();
            }else{
                $this->load->view('mgt-login');
            }
        }
// Staff login page

        public function stafflogin(){
            if (isset($this->session->userdata['staffuser']) && $this->session->userdata['staffuser']->staff_role=='staff') {
                $this->dashboard();
            }else{
                $this->load->view('staff-login');
            }
        
        }
// Staff Logout page

        public function staffLogout(){
        
            if (isset($this->session->userdata['staffuser']) && $this->session->userdata['staffuser']->staff_role=='staff') {
                $this->session->unset_userdata('staffuser');
                $data['success_message_display'] = 'Log out sucessfully';
                $this->load->view('staff-login', $data);
            }else if(isset($this->session->userdata['staffuser']) && $this->session->userdata['staffuser']->staff_role=='manager'){
                $data['success_message_display'] = 'Log out sucessfully';
                $this->load->view('mgt-login', $data);
            }
        }
//Loading dashboard

    public function dashboard(){
        if (!isset($this->session->userdata()['staffuser'])) {
            redirect('/user/stafflogin/');
        }else{
            /**
             * Get new orders
             */
            $new_orders = $this->User_model->get_new_orders();
        
            
            foreach ($new_orders as $key => $value) {
                $user_details = $this->User_model->get_user_details($value->user_id);
                $new_orders[$key]->user_name =$user_details[0]->title .'&nbsp;'. $user_details[0]->first_name;
                if($value->staff_id > 0){
                    $staff_details = $this->User_model->staff_detail($value->staff_id);
                    $new_orders[$key]->staff_details = $staff_details;
                }
            
            }
            
            $data['result_new_orders'] = $new_orders;
            /**
             * if logged user is a staff member gets his order processing history
             */
            if ($this->session->userdata()['staffuser']->staff_role == 'staff') {
                $my_orders = $this->User_model->get_my_orders($this->session->userdata()['staffuser']->staff_id);
                if($my_orders){

                    foreach ($my_orders as $key => $value) {
                        $user_details = $this->User_model->get_user_details($value->user_id);
                        $my_orders[$key]->user_name =$user_details[0]->title .'&nbsp;'. $user_details[0]->first_name;
                        if($value->staff_id > 0){
                            $staff_details = $this->User_model->staff_detail($value->staff_id);
                            $my_orders[$key]->staff_details = $staff_details;
                        }
                    
                    }


                    $data['result_my_orders'] = $my_orders;
                }else{
                    $data['result_my_orders'] = 'No records found';
                }
            }else if($this->session->userdata()['staffuser']->staff_role == 'manager'){

                $all_processing_orders = $this->User_model->get_all_processing_orders();
                if($all_processing_orders){

                    foreach ($all_processing_orders as $key => $value) {
                        $user_details = $this->User_model->get_user_details($value->user_id);
                        $all_processing_orders[$key]->user_name =$user_details[0]->title .'&nbsp;'. $user_details[0]->first_name;
                        if($value->staff_id > 0){
                            $staff_details = $this->User_model->staff_detail($value->staff_id);
                            $all_processing_orders[$key]->staff_details = $staff_details;
                        }
                    
                    }


                    $data['result_all_processing_orders'] = $all_processing_orders;
                }else{
                    $data['result_all_processing_orders'] = 'No records found';
                }

            }

            
        $this->load->view('dashboard',$data);
        }
                
    }
// Load Products

public function productList(){
        
        $result_catagories =$this->User_model->get_catagories();
        $data['category_heading'] = array();//
        foreach($result_catagories as $key=>$value){
            $data['category_heading'][] = $value->category_name;
                
            $result_products = $this->User_model->get_products($value->catagory_id);
            foreach ($result_products as $index=>$product) {
                $result_products_items = $this->User_model->get_product_item($product->product_id);
                $result_products[$index]->items_details = $result_products_items;
            }
            $data[$value->category_name] = $result_products;
            
            
            
        }
        $this->load->view('product-list',$data);
    }
//Load Location 

    public function location(){
        $this->load->view('location');
    }
//Load about us page
    
    public function aboutus(){
            $this->load->view('aboutus');
        
    }
//Load Careers page

    public function careers(){
        $this->load->view('career');
    }
//Cart page

    public function myCart(){
        $success = $this->session->flashdata('success_message_display');
        $error = $this->session->flashdata('error_message_display');
        if(!empty($success)){
            $data['success_message_display'] = $success;
            $this->load->view('my-cart',$data);
        }else if(!empty($error)){
            $data['error_message_display'] = $error;
            $this->load->view('my-cart',$data);
        }
        else{
            $this->load->view('my-cart');
        }
        
    }








//Add to cart

    public function addToCart($productId=0,$itemquantity=0){
        if($productId>0 && $itemquantity>0){
            $_POST['product_id'] = $productId;
            $_POST['quantity'] = $itemquantity;
            $_POST['time']  = $this->session->userdata()['cart'][0]['time'];
        }
        
        if(isset($_POST['pickup']) && $_POST['pickup'] == 'picklater'){
        }else{
    
            }
            if(isset($this->session->userdata()['cart'])){
                echo "<hr>";
                $product_found = FALSE;
                $new_product = $this->session->userdata()['cart'];
                foreach ($new_product as $key => $value) {
                
                    if ($value['product_id'] == $_POST['product_id']) {
                        $product_found = TRUE;
                    }
                }
                if($product_found){
                    $this->session->set_userdata('cart', $new_product);
                    redirect('/user/myCart');
                }else{
                    $result_product_details = $this->User_model->get_product($_POST['product_id']);
                            $qty_price = $_POST['quantity'] * $result_product_details[0]->price;
                            $product_details = array(
                                'category_id'=>$result_product_details[0]->category_id,
                                'product_title'=>$result_product_details[0]->product_title,
                                'product_image'=>$result_product_details[0]->product_image,
                                'availability'=>$result_product_details[0]->availability,
                                'currency'=>$result_product_details[0]->currency,
                                'price'=>$result_product_details[0]->price,
                                'qty_total_price' => $qty_price
                            );
                            $new_product[] = array_merge($_POST,$product_details);
                   
                    $this->session->set_userdata('cart', $new_product);
                    redirect('/user/myCart');
                
                }
            }else{
                $result_product_details = $this->User_model->get_product($_POST['product_id']);
                if($_POST['product_id'] == $result_product_details[0]->product_id){
                    $qty_price = $_POST['quantity'] * $result_product_details[0]->price;
                    $product_details = array(
                        'category_id'=>$result_product_details[0]->category_id,
                        'product_title'=>$result_product_details[0]->product_title,
                        'product_image'=>$result_product_details[0]->product_image,
                        'availability'=>$result_product_details[0]->availability,
                        'currency'=>$result_product_details[0]->currency,
                        'price'=>$result_product_details[0]->price,
                        'qty_total_price' => $qty_price
                    );
                    $products = array();
                    $products[] = array_merge($_POST,$product_details);
                    $this->session->set_userdata('cart', $products);
                    redirect('/user/myCart');   
                }
    
            }
    }
//delete cart products

    public function deleteCartProduct($id){
        
        foreach ($this->session->userdata()['cart'] as $key => $value) {
            $product_found = FALSE;
            if($value['product_id'] == $id){
                unset($_SESSION['cart'][$key]);
                $product_found = TRUE;  
                break;
            }
        }
        if($product_found == TRUE){
            $this->session->set_flashdata('success_message_display','Deleted Successfully');
            redirect('/user/myCart');
        }else{
            $this->session->set_flashdata('error_message_display','Error while deleting the menu. Try again');
            redirect('/user/myCart');
            //pass with the error message
        }
    }
//View orders of the users logged in
    public function selectUser($productId=0,$quantity=0){
        if(isset($this->session->userdata()['usertype']) && $this->session->userdata()['usertype']=='guest'){
            $this->guestUser($productId,$quantity);
        }else if(isset($this->session->userdata()['usertype']) && $this->session->userdata()['usertype']=='register'){
            $this->guestUser($productId,$quantity);
        }else{
            $data_product_id = array(
                'productid' => $productId,
                'quantity' => $quantity
            );
            $this->load->view('select-user',$data_product_id);
        }
        
        
    }
//Loading guest user details
    public function guestUser($productId,$quantity){
        if(isset($this->session->userdata()['usertype']) && $this->session->userdata()['usertype'] == 'register'){
            $this->session->set_userdata('usertype', 'register');
        }else{
            $this->session->set_userdata('usertype', 'guest');
        }
        
        
                    $data_product_id = array(
                        'productid' => $productId,
                        'quantity' => $quantity
                    );
                    if($productId == 0 && $quantity == 0){
                        $this->productList();
                    
                    }else if(isset($this->session->userdata()['cart'][0]['time'])){
                                //if cart set we do not need to shoe pickup page to get confirmation delivery time
                        $this->addToCart($productId,$quantity);
                    }else{
                        
                        $this->load->view('pickup',$data_product_id);
                    }
            
        // }
        
    }
/**
 * customer login
 */
    public function userLogin($productId=0,$quantity=0){
        
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if($this->form_validation->run() == FALSE){
                $this->load->view('login');
        }else{
                $data = array(
                        'username' => $this->input->post('username'),
                        'password' => $this->input->post('password'),
                );
                $result = $this->User_model->customer_login($data);
                if($result){
                        $data_product_id = array(
                            'productid' => $productId,
                            'quantity' => $quantity
                        );
                        $this->session->set_userdata('usertype', 'register');
                        $this->session->set_userdata('userid', $result[0]->user_id);
                        
                        if($productId == 0 && $quantity == 0){
                            $this->productList();
                        
                        }else if(isset($this->session->userdata()['cart'][0]['time'])){
                                    //if cart set we do not need to shoe pickup page to get confirmation delivery time
                            $this->addToCart($productId,$quantity);
                        }else{
                            
                            $this->load->view('pickup',$data_product_id);
                        }
                }else{
                    $data['error_message_display'] = "Invalid login details";
                $this->load->view('login',$data);
                }
                
                
    }
}
/**
 * manager login
 */
public function managerLogin(){
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if($this->form_validation->run() == FALSE){
            $this->load->view('mgt-login');
    }else{
            $data = array(
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password')
            );
            $result = $this->User_model->staff_user_login($data);
            if ($result) {
                if($result[0]->staff_role == 'manager'){
                    $this->session->set_userdata('staffuser', $result[0]);
                    $this->dashboard();
                }else{
                    $data['error_message_display'] = "Invalid login details";
                    $this->load->view('mgt-login',$data);
                }
                
            }else{
                $data['error_message_display'] = "Invalid login details";
                $this->load->view('mgt-login',$data);
                
            }
    }
}
// staff login
public function staffUserLogin(){
        
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if($this->form_validation->run() == FALSE){
            $this->load->view('staff-login');
    }else{
            $data = array(
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password')
            );
            $result = $this->User_model->staff_user_login($data);
            if ($result) {
                if($result[0]->staff_role == 'staff'){
                    $this->session->set_userdata('staffuser', $result[0]);
                    $this->dashboard();
                }else{
                    $data['error_message_display'] = "Invalid login details";
                    $this->load->view('staff-login',$data);
                }
                
            }else{
                $data['error_message_display'] = "Invalid login details";
                $this->load->view('staff-login',$data);
                
            }
    }
}
//Proceed order
    public function orderProceed(){
        
/**
             * paypal integration
             * 
             */
            //guest user and not userid 
                if(isset($this->session->userdata()['usertype']) && $this->session->userdata()['usertype'] == 'guest' && !isset($this->session->userdata()['userid'])){
            
            $this->load->view('guest_information');
        }


        else{
            $cart_total = 0;
            $cart_total_quantity = 0;
            foreach ($this->session->userdata()['cart'] as $key => $value) {
                $cart_total = $cart_total + $value['qty_total_price'];
                $cart_total_quantity = $cart_total_quantity + $value['quantity'];
            }
    
            /***
             * call paypla payment gateway
             */
            $this->create_payment_with_paypal();
    
        }


        
    }
    public function guestUserRegister(){
        
    
        $data = array(
            'email' => $_POST['email'],
            'title' => $_POST['title'],
            'first_name' => $_POST['firstname'],
            'last_name' => $_POST['lastname'],
            'phone_number' => $_POST['contactno'],
            'register_date' => date("Y-m-d"),
            'user_type' => $this->session->userdata()['usertype'],
            'status' => 'active'
            
        );
        $result = $this->User_model->user_registration($data);
        if ($result>0) {
            //create session adding usreid
            $this->session->set_userdata('userid', $result);
            $this->orderProceed();
        }else{
            echo "error in registration";
        }
        
    }


    /**
     * show all products
     */
    public function showAllProducts(){
        
        $products = $this->User_model->load_all_products();
        foreach ($products as $key => $value) {
            
            $category_name = $this->User_model->category_name($value->category_id);
        
            $products[$key]->category_name = $category_name[0]->category_name;
        
        }
        $data['all_products'] = $products;
        $success = $this->session->flashdata('success_message_display');
        $error = $this->session->flashdata('error_message_display');
        if(!empty($success)){
            $data['success_message_display'] = $success;
            $this->load->view('all-products',$data);
        }else if(!empty($error)){
            $data['error_message_display'] = $error;
            $this->load->view('all-products',$data);
        }
        else{
            $this->load->view('all-products',$data);
        }
    
    }
    /**
     * show all products
     */
    public function showAllProductsCategory(){
        
        $products_category = $this->User_model->load_all_products_category();
        $data['all_products_category'] = $products_category;
        $success = $this->session->flashdata('success_message_display');
        $error = $this->session->flashdata('error_message_display');
        if(!empty($success)){
            $data['success_message_display'] = $success;
            $this->load->view('all-products-category',$data);
        }else if(!empty($error)){
            $data['error_message_display'] = $error;
            $this->load->view('all-products-category',$data);
        }
        else{
            $this->load->view('all-products-category',$data);
        }
    
    }

    /**
     * show all items
     */
    public function showAllItem(){
        
        $item = $this->User_model->load_all_item();

        $data['all_item'] = $item;
        $success = $this->session->flashdata('success_message_display');
        $error = $this->session->flashdata('error_message_display');
        if(!empty($success)){
            $data['success_message_display'] = $success;
            $this->load->view('all-itme',$data);
        }else if(!empty($error)){
            $data['error_message_display'] = $error;
            $this->load->view('all-item',$data);
        }
        else{
            $this->load->view('all-item',$data);
        }
    
    }

    /**
     * show all Suppliers
     */
    public function showAllISuppliers(){
        
        $item = $this->User_model->load_all_suppliers();

        $data['all_item'] = $item;
        $success = $this->session->flashdata('success_message_display');
        $error = $this->session->flashdata('error_message_display');
        if(!empty($success)){
            $data['success_message_display'] = $success;
            $this->load->view('all-suppliers',$data);
        }else if(!empty($error)){
            $data['error_message_display'] = $error;
            $this->load->view('all-suppliers',$data);
        }
        else{
            $this->load->view('all-suppliers',$data);
        }
    
    }
    /**
     * get single product
     */
    public function showSingleProduct($productId){
        $product = $this->User_model->load_single_products($productId);

        if($product){
            foreach ($product as $key => $value) {
            
                $category_name = $this->User_model->category_name($value->category_id);
            
                $product[$key]->category_name = $category_name[0]->category_name;
            
            }
            $data['all_categories'] = $this->User_model->get_all_categories();
            $data['product_details']  = $product;
            $success = $this->session->flashdata('success_message_display');
            $error = $this->session->flashdata('error_message_display');    
            if(!empty($success)){
                $data['success_message_display'] = $success;
                $this->load->view('edit-menu',$data);
            }else if(!empty($error)){
                $data['error_message_display'] = $error;
                $this->load->view('edit-menu',$data);
            }
            else{
                $this->load->view('edit-menu',$data);
            }
            
        }
        
        

    }



	
	
/**
	 * get single Suppeier details
	 */
	public function showSingleSupplier($supplierId){
		$item = $this->User_model->load_single_supplier($supplierId);
		$all_category = $this->User_model->load_all_products_category();
		
		if($item){
			
			$data['item']  = $item;
			$data['all_cat'] = $all_category;
			$success = $this->session->flashdata('success_message_display');
			$error = $this->session->flashdata('error_message_display');	
			if(!empty($success)){
				$data['success_message_display'] = $success;
				
				$this->load->view('edit-supplier',$data);
			}else if(!empty($error)){
				$data['error_message_display'] = $error;
				$this->load->view('edit-supplier',$data);
			}
			else{
				$this->load->view('edit-supplier',$data);
			}
			
		}
		
		

	}

/**
     * get single product category details
     */
    public function showSingleCategory($categoryId){
        $category = $this->User_model->load_single_products_category($categoryId);

        if($category){
            $data['category']  = $category;
            $success = $this->session->flashdata('success_message_display');
            $error = $this->session->flashdata('error_message_display');    
            if(!empty($success)){
                $data['success_message_display'] = $success;
                $this->load->view('edit-category',$data);
            }else if(!empty($error)){
                $data['error_message_display'] = $error;
                $this->load->view('edit-category',$data);
            }
            else{
                $this->load->view('edit-category',$data);
            }
            
        }
        
        

    }

    /**
     * update the product 
     */
    public function updateProduct(){
        $imageExsit = ($_FILES['userfile']['error'] == 0) ? time().$_FILES["userfile"]['name'] : FALSE ;
        
        $data = array(
            'product_id' => $_POST['product_id'],
            'category_id' => $_POST['product_category'],
            'product_title' =>$_POST['product_name'],
            'product_image' =>$imageExsit,
            'availability' =>$_POST['availability'],
            'currency' =>$_POST['currency'],
            'price' =>$_POST['product_price'],
        );
        $config = array(
            'upload_path' => './assets/images/food/',
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024",
            'file_name' => $imageExsit
            );
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if($_FILES['userfile']['error'] == 0){
                if($this->upload->do_upload()){

                }else{
                    $this->session->set_flashdata('error_message_display','Error when uploading the image');
                    redirect('user/showSingleProduct/'.$_POST['product_id']);   
                }
            }

            $result_update = $this->User_model->update_product($data);
                if($result_update){
                    $this->session->set_flashdata('success_message_display','Product updated sucessfully');
                    redirect('user/showSingleProduct/'.$_POST['product_id']);   
                }else{
                    $this->session->set_flashdata('error_message_display','Something wet wrong! Try again');
                    redirect('user/showSingleProduct/'.$_POST['product_id']);   
                }
            
    }
    /**
     * update the Category details 
     */
    public function updateCategory(){        
        $data = array(
            
            'category_id' => $_POST['category_id'],
            'category_name' =>$_POST['category_name'],
            'availability' =>$_POST['availability'],
        );

            $result_update = $this->User_model->update_category($data);
                if($result_update){
                    $this->session->set_flashdata('success_message_display','Product updated sucessfully');
                    redirect('user/showSingleCategory/'.$_POST['category_id']); 
                }else{
                    $this->session->set_flashdata('error_message_display','Something went wrong! Try again');
                    redirect('user/showSingleCategory/'.$_POST['category_id']); 
                }
            
    }


	/**
	 * update the supplier details 
	 */
	public function updateSupplier(){
		//print_r($_FILES);
		//$imageExsit = ($_FILES['userfile']['error'] == 0) ? time().$_FILES["userfile"]['name'] : FALSE ;
		
		$data = array(
			
			'supplier_id' => $_POST['supplier_id'],
			'supplier_name' =>$_POST['supplier_title'],
			'product_items' =>$_POST['product_items'],
			'category_id' =>$_POST['category'],
		);

print_r($data);
			$result_update = $this->User_model->update_supplier($data);
				if($result_update){
					$this->session->set_flashdata('success_message_display','Item updated sucessfully');
					redirect('user/showSingleSupplier/'.$_POST['supplier_id']);	
				}else{
					$this->session->set_flashdata('error_message_display','Something wet wrong! Try again');
					redirect('user/showSingleSupplier/'.$_POST['supplier_id']);	
				}
			
	}

	/**
	 * update the item details 
	 */
	public function updateItem(){
		//print_r($_FILES);
		//$imageExsit = ($_FILES['userfile']['error'] == 0) ? time().$_FILES["userfile"]['name'] : FALSE ;
		
		$data = array(
			
			'item_id' => $_POST['item_id'],
			'item_title' =>$_POST['item_title'],
			'availability' =>$_POST['availability'],
		);


			$result_update = $this->User_model->update_item($data);
				if($result_update){
					$this->session->set_flashdata('success_message_display','Item updated sucessfully');
					redirect('user/showSingleItem/'.$_POST['item_id']);	
				}else{
					$this->session->set_flashdata('error_message_display','Something wet wrong! Try again');
					redirect('user/showSingleItem/'.$_POST['item_id']);	
				}
			
	}
    //load view so that the manager to add new Product
    public function createMenu(){
        $data['all_categories'] = $this->User_model->get_all_categories();
        $this->load->view('create-menu',$data);
    }
    //load view so that the manager to add new category
    public function createCategory(){
        $success = $this->session->flashdata('success_message_display');
        $error = $this->session->flashdata('error_message_display');    
            if(!empty($success)){
                $data['success_message_display'] = $success;
                $this->load->view('create-category',$data);
            }else if(!empty($error)){
                $data['error_message_display'] = $error;
                $this->load->view('create-category',$data);
            }
            else{
                $this->load->view('create-category');
            }
        
    }








        
    /**
     * add new menu
     */
    public function addNewMenu(){
        $new_name = time().$_FILES["userfile"]['name'];
        $config = array(
        'upload_path' => './assets/images/food/',
        'allowed_types' => "gif|jpg|png|jpeg|pdf",
        'overwrite' => TRUE,
        'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
        'max_height' => "768",
        'max_width' => "1024",
        'file_name' => $new_name
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if($this->upload->do_upload())
        {
        $data = array('upload_data' => $this->upload->data());
        $data = array(
            'category_id' => $_POST['product_category'],
            'product_title' =>$_POST['product_name'],
            'product_image' =>$new_name,
            'availability' =>$_POST['availability'],
            'currency' =>$_POST['currency'],
            'price' =>$_POST['product_price'],
        );
        echo $insert_id = $this->User_model->add_new_product($data);
        
        if($insert_id >0){
            $result = $this->User_model->add_product_own_item($insert_id,$_POST['item_list']);
        }
        $this->session->set_flashdata('success_message_display','New product added sucessfully');
        redirect('user/showAllProducts');
        }
        else
        {
        $error = array('error' => $this->upload->display_errors());
        print_r($error);
        }
    }

    
    /**
     * add new category
     */
    public function addNewCategory(){
        $success = $this->session->flashdata('success_message_display');
        $error = $this->session->flashdata('error_message_display');
            if(!empty($success)){
                $data['success_message_display'] = $success;
                $this->load->view('create-category',$data);
            }else if(!empty($error)){
                $data['error_message_display'] = $error;
                $this->load->view('create-category',$data);
            }
            else{
                $this->load->view('create-category');
            }
        
        
        if(isset($_POST['submit']))
        {
        $data = array(
            'category_name' => $_POST['category_name'],
            'availability' =>$_POST['availability'],
        );
        echo $insert_id = $this->User_model->add_new_category($data);
        if($insert_id > 0){
            $this->session->set_flashdata('success_message_display','New category added sucessfully');
            redirect('user/showAllProductsCategory');
        }elseif($insert_id == 'DUPLICATE'){
            $this->session->set_flashdata('error_message_display','Duplicate entry');
            redirect('user/addNewCategory');
            
        }
        
        
        }

    }




//Load customer profile
    public function customerProfile(){
            $data['result_customer_orders'] = $this->User_model->getCustomerOrders($this->session->userdata()['userid']);
            $this->load->view('customer-orders',$data);
    }
    public function customerLogOut(){
        if (isset($this->session->userdata['userid'])) {
            $this->session->unset_userdata('userid');
            $this->session->unset_userdata('usertype');
            $data['success_message_display'] = 'Log out sucessfully';
            $this->load->view('login', $data);
        }else{
            $this->load->view('login');
        }
    }
    /**
     * show indivual order details
     */
    public function orderDetails($orderid){
        $result_order_details = $this->User_model->get_order_details($orderid);
        $data['order_details'] = $result_order_details;
        
        if($result_order_details[0]->staff_id>0){
            $data['staff_detail'] =$this->User_model->staff_detail($result_order_details[0]->staff_id);
        }
        $user_details = $this->User_model->get_user_details($result_order_details[0]->user_id);
        $result_order_details[0]->title =$user_details[0]->title;
        $result_order_details[0]->first_name =$user_details[0]->first_name;
        $result_order_details[0]->last_name =$user_details[0]->last_name;
        $result_order_details[0]->email = $user_details[0]->email;
        $result_order_details[0]->phone_number = $user_details[0]->phone_number;
        $result_order_details[0]->user_type = $user_details[0]->user_type;
        
        $result_cart_details = $this->User_model->get_cart_details($orderid);
        
        foreach ($result_cart_details as $key => $value) {
            
            $result_cart_details[$key]->product_details =$this->User_model->get_product_details($value->product_id)[0];
        
        }
        $data['order_products_details'] = $result_cart_details;
        $this->load->view('order-details',$data);
    }
//Allocate order to staff
    public function orderAllocation($orderid){
        $result = $this->User_model->update_order_allocation($orderid);
        if($result){
            redirect('user/orderDetails/'.$orderid);
        }
    }
//Update status
    
    public function updateOrderStatus($orderstatus, $orderid){
        $result = $this->User_model->update_order_status($orderstatus,$orderid);
        if($result){
            redirect('user/orderDetails/'.$orderid);
        }
    }
//Load orders by staff
    public function ordersByStaff(){
        $data['staff_details'] = $this->User_model->get_all_staff();
        if(isset($_POST['staff_id'])){
            
            if($_POST['dayrange'] == 1){
                $date_start = date('Y-m-d');
                $date_end = date('Y-m-d');
            }elseif($_POST['dayrange'] == 2){
                $date_start = date('Y-m-d');
                $date_end = date('Y-m-d',strtotime("-1 days"));
            }elseif($_POST['dayrange'] == 3){
                $date_start = date('Y-m-d');
                $date_end = date('Y-m-d',strtotime('-7 days'));
            }elseif($_POST['dayrange'] == 4){
                $date_start = date('Y-m-d');
                $date_end = date('Y-m-d',strtotime("-30 days"));
            }
            echo $date_end;
            $result_staff_oder_date = $this->User_model->get_staff_order_by_date_range($_POST['staff_id'],$date_start,$date_end);
            if($result_staff_oder_date){
                $data['result_staff_oder_date'] = $result_staff_oder_date;
            }
            else{
                $data['result_staff_oder_date'] = "No result found";
            }
            $this->load->view('report-order-staff',$data);
        }   
        else{
            //get staff information
            
            
            $this->load->view('report-order-staff',$data);
        }
    }
//Loading total sales
public function totalSales(){
    if(isset($_POST['dayrange'])){
        
        if($_POST['dayrange'] == 1){
            $date_start = date('Y-m-d');
            $date_end = date('Y-m-d');
        }elseif($_POST['dayrange'] == 2){
            $date_start = date('Y-m-d');
            $date_end = date('Y-m-d',strtotime("-1 days"));
        }elseif($_POST['dayrange'] == 3){
            $date_start = date('Y-m-d');
            $date_end = date('Y-m-d',strtotime('-7 days'));
        }elseif($_POST['dayrange'] == 4){
            $date_start = date('Y-m-d');
            $date_end = date('Y-m-d',strtotime("-30 days"));
        }
            $data['sales_details'] = $this->User_model->get_sales($date_start,$date_end);
            //print_r($data['sales_details']);
            if($data['sales_details']){
                $this->load->view('sales-report',$data);
            }
            else{
                $data['sales_details']="No result found";
                $this->load->view('sales-report',$data);
            }
    }
    else{
        $this->load->view('sales-report');
    }
    
}




//Edit staff

    public function editStaff(){
        $data['staff_details'] = $this->User_model->get_all_staff();
        //print_r($_POST);
            if(isset($_POST['staff_id'])){
                $data['staff_detail']=$this->User_model->staff_detail($_POST['staff_id']);
                $this->load->view('edit-staff',$data);
            }else{
                $this->load->view('edit-staff',$data);
            }
    }

    //load view manager to add promotion
    public function createPromotion(){
        $success = $this->session->flashdata('success_message_display');
            $error = $this->session->flashdata('error_message_display');    
            if(!empty($success)){
                $data['success_message_display'] = $success;
                $this->load->view('create-promotion',$data);
            }else if(!empty($error)){
                $data['error_message_display'] = $error;
                $this->load->view('create-promotion',$data);
            }
            else{
                $this->load->view('create-promotion');
            }
        $this->load->view('create-promotion');
    }
    public function addNewPromotion(){
        
        $new_name = time().$_FILES["userfile"]['name'];
        $config = array(
        'upload_path' => './assets/images/food/',
        'allowed_types' => "gif|jpg|png|jpeg|pdf",
        'overwrite' => TRUE,
        'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
        'max_height' => "768",
        'max_width' => "1024",
        'file_name' => $new_name
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if($this->upload->do_upload())
        {
        $data = array('upload_data' => $this->upload->data());
        $data = array(
            
            'promotion_title' =>$_POST['promotion_name'],
            'promotion_image' =>$new_name,
            'status' =>'active',
            
        );
        echo $isnert_id = $this->User_model->add_new_promotion($data);
        
        $this->session->set_flashdata('success_message_display','Promotion added sucessfully');
        redirect('user/createPromotion');
        }
        else
        {
        $error = array('error' => $this->upload->display_errors());
        print_r($error);
        }
    }
    public function showAllPromoption(){

    }






	
	/************************************************
	 * paypal code
	 */

	function create_payment_with_paypal()
    {

        // setup PayPal api context
        $this->_api_context->setConfig($this->config->item('settings'));


// ### Payer
// A resource representing a Payer that funds a payment
// For direct credit card payments, set payment method
// to 'credit_card' and add an array of funding instruments.

        $payer['payment_method'] = 'paypal';

// ### Itemized information
// (Optional) Lets you specify item wise
// information
        // $item1["name"] = $this->input->post('item_name');
        // $item1["sku"] = $this->input->post('item_number');  // Similar to `item_number` in Classic API
        // $item1["description"] = $this->input->post('item_description');
        // $item1["currency"] ="USD";
        // $item1["quantity"] =1;
		// $item1["price"] = $this->input->post('item_price');
		
		$cart_total = 0;
		$cart_total_quantity = 0;
		$cart_description = '';
			foreach ($this->session->userdata()['cart'] as $key => $value) {
				$cart_total = $cart_total + $value['qty_total_price'];
				$cart_total_quantity = $cart_total_quantity + $value['quantity'];
				$cart_description = $cart_description . $value['product_title'] . ' X ' . $value['quantity'] . ',';
			}

		
        $item1["name"] = $this->session->userdata()['cart'][0]['product_title'];
        $item1["sku"] = $this->session->userdata()['cart'][0]['product_id'];  // Similar to `item_number` in Classic API
        $item1["description"] = $cart_description;
        $item1["currency"] ="USD";
        $item1["quantity"] = 1;
		$item1["price"] = $cart_total;
		





        $itemList = new ItemList();
        $itemList->setItems(array($item1));

// ### Additional payment details
// Use this optional field to set additional
// payment information such as tax, shipping
// charges etc.
        $details['tax'] = 0;
        $details['subtotal'] = $cart_total;
// ### Amount
// Lets you specify a payment amount.
// You can also specify additional details
// such as shipping, tax.
        $amount['currency'] = "USD";
        $amount['total'] = $details['tax'] + $details['subtotal'];
        $amount['details'] = $details;
// ### Transaction
// A transaction defines the contract of a
// payment - what is the payment for and who
// is fulfilling it.
        $transaction['description'] ='Payment description';
        $transaction['amount'] = $amount;
        $transaction['invoice_number'] = uniqid();
        $transaction['item_list'] = $itemList;

        // ### Redirect urls
// Set the urls that the buyer must be redirected to after
// payment approval/ cancellation.
        $baseUrl = base_url();
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($baseUrl."index.php/user/getPaymentStatus")
            ->setCancelUrl($baseUrl."index.php/user/getPaymentStatus");

// ### Payment
// A Payment Resource; create one using
// the above types and intent set to sale 'sale'
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);
        } catch (Exception $ex) {
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            ResultPrinter::printError("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", null, $ex);
            exit(1);
        }
        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        if(isset($redirect_url)) {
            /** redirect to paypal **/
            redirect($redirect_url);
        }

        $this->session->set_flashdata('success_msg','Unknown error occurred');
        redirect('user/index');

    }

	public function getPaymentStatus()
    {

        // paypal credentials

        /** Get the payment ID before session clear **/
        $payment_id = $this->input->get("paymentId") ;
        $PayerID = $this->input->get("PayerID") ;
        $token = $this->input->get("token") ;
        /** clear the session payment ID **/

        if (empty($PayerID) || empty($token)) {
            $this->session->set_flashdata('error_message_display','Payment failed');
            redirect('user/myCart');
        }

        $payment = Payment::get($payment_id,$this->_api_context);


        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId($this->input->get('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution,$this->_api_context);



        //  DEBUG RESULT, remove it later **/
        if ($result->getState() == 'approved') {
            $trans = $result->getTransactions();

            // item info
            $Subtotal = $trans[0]->getAmount()->getDetails()->getSubtotal();
            $Tax = $trans[0]->getAmount()->getDetails()->getTax();

            $payer = $result->getPayer();
            // payer info //
            $PaymentMethod =$payer->getPaymentMethod();
            $PayerStatus =$payer->getStatus();
            $PayerMail =$payer->getPayerInfo()->getEmail();

            $relatedResources = $trans[0]->getRelatedResources();
            $sale = $relatedResources[0]->getSale();
            // sale info //
            $saleId = $sale->getId();
            $CreateTime = $sale->getCreateTime();
            $UpdateTime = $sale->getUpdateTime();
            $State = $sale->getState();
            $Total = $sale->getAmount()->getTotal();
            /** it's all right **/
            /** Here Write your database logic like that insert record or value in database if you want **/
            $payment_id = $this->paypal->create($Total,$Subtotal,$Tax,$PaymentMethod,$PayerStatus,$PayerMail,$saleId,$CreateTime,$UpdateTime,$State);
			//$this->session->set_flashdata('success_message_display','Payment success');
			//return 'success';






			$cart = $this->session->userdata()['cart'];
			$cart_total = 0;
			foreach ($this->session->userdata()['cart'] as $key => $value) {
				$cart_total = $cart_total + $value['qty_total_price'];
			}
			
			$data = array(
				'user_id' => $this->session->userdata()['userid'],
				'total' => $cart_total,
				'order_place_date'=> date("Y-m-d"),
				'order_place_time'=> date('H:i A'),
				'pickup_time'=> $cart[0]['time'],
				'staff_id'=>0,
				'order_placed'=>'placed',
				'order_status'=>'new',
				'payment_id'=> $payment_id
			);




			$result_order = $this->User_model->place_order($data);
			
			
			//submit the order to local db
			if($result_order>0){
				$result_order = sprintf('%04d', $result_order);
				$product_found = FALSE;
						foreach ($this->session->userdata()['cart'] as $key => $value) {
								unset($_SESSION['cart'][$key]);
								$product_found = TRUE;
						}
					if($product_found == TRUE){
						$this->session->set_flashdata('success_message_display','Your order placed successfully: Order No: '.$result_order);
						redirect('user/myCart');
					}else{
						//pass with the error message
					}
			}

            //redirect('paypal/success');
        }
        $this->session->set_flashdata('error_message_display','Payment failed');
        redirect('user/myCart');
	}
	function success(){
        $this->load->view("content/success");
    }
    function cancel(){
        $this->load->view("content/cancel");
    }

    function load_refund_form(){
        $this->load->view('content/Refund_payment_form');
	}
	function refund_payment(){
        $refund_amount = $this->input->post('refund_amount');
        $saleId = $this->input->post('sale_id');
        $paymentValue =  (string) round($refund_amount,2); ;

// ### Refund amount
// Includes both the refunded amount (to Payer)
// and refunded fee (to Payee). Use the $amt->details
// field to mention fees refund details.
        $amt = new Amount();
        $amt->setCurrency('USD')
            ->setTotal($paymentValue);

// ### Refund object
        $refundRequest = new RefundRequest();
        $refundRequest->setAmount($amt);

// ###Sale
// A sale transaction.
// Create a Sale object with the
// given sale transaction id.
        $sale = new Sale();
        $sale->setId($saleId);
        try {
            // Refund the sale
            // (See bootstrap.php for more on `ApiContext`)
            $refundedSale = $sale->refundSale($refundRequest, $this->_api_context);
        } catch (Exception $ex) {
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            ResultPrinter::printError("Refund Sale", "Sale", null, $refundRequest, $ex);
            exit(1);
        }

// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
        ResultPrinter::printResult("Refund Sale", "Sale", $refundedSale->getId(), $refundRequest, $refundedSale);

        return $refundedSale;
    }
/********************** end of paypal code */

}