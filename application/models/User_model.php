<?php 
class User_model extends CI_Model
{
    public function get_catagories(){
        $condition ="availability = 'yes'";
        $this->db->select('*');
        $this->db->from('tbl_product_catagory');
        $this->db->where($condition);
        // $this->db->select('*');
        // $this->db->from('tbl_product_catagory');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } 
        else {
            return 'none';
        }      
    }
    /**
     * get products order by category id
     */
    public function get_products($catagory_id){
        $condition ="category_id =" . "'" . $catagory_id . "' AND availability = 'yes'";
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where($condition);
        //$this->db->order_by("schedule_date", "desc");
        $query_products = $this->db->get();
         //echo $this->db->last_query();
         
        if ($query_products->num_rows() > 0) {
            return $query_products->result();
            
        } 
        elseif($query_products->num_rows() == 0){
            return 'empty';
        }
        else{
            return  false;
        }
    }
    /**
     * get products order by category id
     */
    public function get_product_item($product_id){
        $condition ="product_id =" . "'" . $product_id . "'";
        $this->db->select('*');
        $this->db->from('tbl_product_item');
        $this->db->where($condition);
        //$this->db->order_by("schedule_date", "desc");
        $query_product_item = $this->db->get();
         //echo $this->db->last_query();
         
        if ($query_product_item->num_rows() > 0) {
            $result_product_items = $query_product_item->result();
            
            foreach ($result_product_items as $key => $value) {
             //print_r($value->item_id);
             $condition ="item_id =" . "'" . $value->item_id . "'";
            $this->db->select('item_title');
            $this->db->from('tbl_item');
            $this->db->where($condition);
            $query_item_title = $this->db->get();
             $result_item_title = $query_item_title->result();
            
             $result_product_items[$key]->item_title = $result_item_title[0]->item_title;
            }
            return $result_product_items;
            
        } 
        // elseif($query_products->num_rows() == 0){
        //     return 'empty';
        // }
        // else{
        //     return  false;
        // }
    }

    public function get_product($product_id){
        $condition ="product_id =" . "'" . $product_id . "'";
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where($condition);
        //$this->db->order_by("schedule_date", "desc");
        $query_products = $this->db->get();
        if ($query_products->num_rows() > 0) {
            return $query_products->result();
            
        } else{
            return false;
        }
    }
    public function user_registration($data){
        print_r($data);
        $condition = "email =" . "'" . $data['email'] . "'";
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            
            
            // Query to insert data into database
            $this->db->insert('tbl_user', $data);
            
            if ($this->db->affected_rows() > 0) {
                $insert_id = $this->db->insert_id();
                return $insert_id;
            }
        } 
        else {
            return 'error';
        }      
    }
    public function get_new_orders(){
        $condition ="order_status ='new'";
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where($condition);
        $this->db->order_by("order_place_date", "desc");
        //$this->db->order_by("schedule_date", "desc");
        $query_orders = $this->db->get();
        if ($query_orders->num_rows() > 0) {
            return $query_orders->result();
            
        } else{
            return false;
        }
    }
    public function get_my_orders($staffid){
        $condition ="staff_id ='$staffid'";
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where($condition);
        //$this->db->order_by("schedule_date", "desc");
        $query_orders = $this->db->get();
        if ($query_orders->num_rows() > 0) {
            return $query_orders->result();
            
        } else{
            return false;
        }
    }
    public function get_all_processing_orders(){
        $condition ="order_status !='new'";
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where($condition);
        //$this->db->order_by("schedule_date", "desc");
        $query_orders = $this->db->get();
        if ($query_orders->num_rows() > 0) {
            return $query_orders->result();
            
        } else{
            return false;
        }
    }
    
    public function place_order($data){
        //print_r($this->session->userdata());
            // Query to insert order data into database
            $this->db->insert('tbl_order', $data);
            
            if ($this->db->affected_rows() > 0) {
                $order_id = $this->db->insert_id();
                foreach ($this->session->userdata()['cart'] as $key => $value) {
                    print_r($value);
                    $data = array(
                        'order_id'=> $order_id,
                        'product_id'=> $value['product_id'],
                        'user_id'=> $this->session->userdata()['userid'],
                        'quantity'=> $value['quantity'],
                    );
                    $this->db->insert('tbl_cart', $data);
                }
                return $order_id;
            }else{
                return false;
            }
            
    }
    public function get_user_details($user_id){
        $condition ="user_id ='$user_id'";
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where($condition);
        //$this->db->order_by("schedule_date", "desc");
        $query_user = $this->db->get();
        if ($query_user->num_rows() > 0) {
            return $query_user->result();
            
        } else{
            return false;
        }
    }
    // staff login
    public function staff_user_login($data){
        //lawyer login
        $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('tbl_staff');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        $query->num_rows();
        if ($query->num_rows() == 1) {
            return $query->result();
        } 
        else {
            return false;
        }
    }
    /**
     * get staff details by id
     */
    public function staff_detail($staffid){
        $condition = "staff_id =" . "'" . $staffid . "'";
        $this->db->select('*');
        $this->db->from('tbl_staff');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        $query->num_rows();
        if ($query->num_rows() == 1) {
            return $query->result();
        } 
        else {
            return false;
        }
    }
    // customer login
    public function customer_login($data){
        //lawyer login
        $condition = "email =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        //echo $this->db->last_query();
        $query->num_rows();
        if ($query->num_rows() == 1) {
            return $query->result();
        } 
        else {
            return false;
        }
    }
    public function getCustomerOrders($customerid){
       
        $condition = "user_id =" . "'" . $customerid . "'";
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where($condition);
        
        $query = $this->db->get();
        //echo $this->db->last_query();
        $query->num_rows();
        if ($query->num_rows() > 0) {
            return $query->result();
        } 
        else {
            return false;
        }
    }
    /**
     * load all active categories
     */
    public function get_all_categories(){
        $this->db->select('*');
        $this->db->from('tbl_product_catagory');
        
        
        $query = $this->db->get();
        //echo $this->db->last_query();
        $query->num_rows();
        if ($query->num_rows() > 0) {
            return $query->result();
        } 
        else {
            return false;
        }
    }

     /**
     * load all active items
     */
    public function get_all_items(){
        $condition = "availability = 'yes'";
        $this->db->select('*');
        $this->db->from('tbl_item');
        $this->db->where($condition);
        
        
        $query = $this->db->get();
        //echo $this->db->last_query();
        $query->num_rows();
        if ($query->num_rows() > 0) {
            return $query->result();
        } 
        else {
            return false;
        }
    }

    /**
     * add new product to the db
     */
    public function add_new_product($data){
        $this->db->insert('tbl_product', $data);
            
        if ($this->db->affected_rows() > 0) {
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }
    }

     /**
     * add new product to the db
     */
    public function add_product_own_item($insert_id,$item_list){
        foreach ($item_list as $key => $value) {
            $data  = array(
                'product_id' => $insert_id,
                'item_id' => $value
            );    
            $this->db->insert('tbl_product_item', $data);
        }
        return TRUE;
        
    }

      /**
     * add new category to the db
     */
    public function add_new_category($data){
        $condition = "category_name =" . "'" . $data['category_name'] . "'";
        $this->db->select('*');
        $this->db->from('tbl_product_catagory');
        $this->db->where($condition);
        
        
        $query = $this->db->get();
        //echo $this->db->last_query();
        $query->num_rows();
        if ($query->num_rows() > 0) {
            //return $query->result();
            return 'DUPLICATE';
        } 
        else {
            $this->db->insert('tbl_product_catagory', $data);
            
            if ($this->db->affected_rows() > 0) {
                $insert_id = $this->db->insert_id();
                return $insert_id;
            }
        }
        
    }

      /**
     * add new item to the db
     */
    public function add_new_item($data){
        $condition = "item_title =" . "'" . $data['item_title'] . "'";
        $this->db->select('*');
        $this->db->from('tbl_item');
        $this->db->where($condition);
        
        
        $query = $this->db->get();
        // echo $this->db->last_query();
        // echo $query->num_rows();
        if ($query->num_rows() > 0) {
            //return $query->result();
            return 'DUPLICATE';
        } 
        else {
            $this->db->insert('tbl_item', $data);
            
            if ($this->db->affected_rows() > 0) {
                $insert_id = $this->db->insert_id();
                return $insert_id;
            }
        }
        
    }

    public function load_all_products(){
        $this->db->select('*');
        $this->db->from('tbl_product');
        
        $this->db->order_by("product_id", "desc");
        $query = $this->db->get();
        //echo $this->db->last_query();
        $query->num_rows();
        if ($query->num_rows() > 0) {
            return $query->result();
        } 
        else {
            return false;
        }
    }
    /**
     * load all product catagories from db
     */
    public function load_all_products_category(){
        $this->db->select('*');
        $this->db->from('tbl_product_catagory');
        
        $this->db->order_by("category_name", "ASC");
        $query = $this->db->get();
        //echo $this->db->last_query();
        $query->num_rows();
        if ($query->num_rows() > 0) {
            return $query->result();
        } 
        else {
            return false;
        }
    }

 /**
     * load all items from db
     */
    public function load_all_item(){
        $this->db->select('*');
        $this->db->from('tbl_item');
        
        $this->db->order_by("item_title", "ASC");
        $query = $this->db->get();
        //echo $this->db->last_query();
        $query->num_rows();
        if ($query->num_rows() > 0) {
            return $query->result();
        } 
        else {
            return false;
        }
    }


    /**
     * load single product from db
     */
    public function load_single_products($product_id){
        $condition = "product_id = " . "'". $product_id. "'";  
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where($condition);
        
        $query = $this->db->get();
        //echo $this->db->last_query();
        $query->num_rows();
        if ($query->num_rows() > 0) {
            return $query->result();
        } 
        else {
            return false;
        }
    }
    /**
     * load single category by category id
     */
    public function load_single_products_category($category_id){
        $condition = "catagory_id = " . "'". $category_id. "'";  
        $this->db->select('*');
        $this->db->from('tbl_product_catagory');
        $this->db->where($condition);
        
        $query = $this->db->get();
        //echo $this->db->last_query();
        $query->num_rows();
        if ($query->num_rows() > 0) {
            return $query->result();
        } 
        else {
            return false;
        }
    }

     /**
     * load single item by item id
     */
    public function load_single_item($item_id){
        $condition = "item_id = " . "'". $item_id. "'";  
        $this->db->select('*');
        $this->db->from('tbl_item');
        $this->db->where($condition);
        
        $query = $this->db->get();
        //echo $this->db->last_query();
        $query->num_rows();
        if ($query->num_rows() > 0) {
            return $query->result();
        } 
        else {
            return false;
        }
    }


    public function category_name($categoryid){
        $condition = "catagory_id =" . "'" . $categoryid . "'";
        $this->db->select('category_name');
        $this->db->from('tbl_product_catagory');
        $this->db->where($condition);
        
        $query = $this->db->get();
        //echo $this->db->last_query();
        $query->num_rows();
        if ($query->num_rows() > 0) {
            return $query->result();
        } 
        else {
            return false;
        }
    }
    public function get_order_details($orderid){
        $condition = "order_id =" . "'" . $orderid . "'";
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where($condition);
        
        $query = $this->db->get();
        //echo $this->db->last_query();
        $query->num_rows();
        if ($query->num_rows() > 0) {
            return $query->result();
        } 
        else {
            return false;
        }
    }
    public function get_cart_details($orderid){
        $condition = "order_id =" . "'" . $orderid . "'";
        $this->db->select('product_id,quantity');
        $this->db->from('tbl_cart');
        $this->db->where($condition);
        
        $query = $this->db->get();
        //echo $this->db->last_query();
        $query->num_rows();
        if ($query->num_rows() > 0) {
            return $query->result();
        } 
        else {
            return false;
        }
    }
    public function get_product_details($productid){
        $condition = "product_id =" . "'" . $productid . "'";
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where($condition);
        
        $query = $this->db->get();
        //echo $this->db->last_query();
        $query->num_rows();
        if ($query->num_rows() > 0) {
            return $query->result();
        } 
        else {
            return false;
        }
    }
    public function update_order_allocation($orderid){
        $this->db->set('staff_id', $this->session->userdata['staffuser']->staff_id);
        $this->db->where('order_id', $orderid);
        $this->db->update('tbl_order');
        
        if ($this->db->affected_rows() > 0) {
            return TRUE;
            //echo "success";
        }else{
            //echo "error";
            return FALSE;
        }
    }

    public function add_registered_user_details($data){
        
        // Query to insert user data into database
        //$this->db->insert('tbl_user', $data);
       // print_r($data);
        
        $condition = "email =" . "'" . $data['email'] . "'";
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where($condition);
    
        $query = $this->db->get();
        //echo $this->db->last_query();
        $query->num_rows();
        if ($query->num_rows() == 0) {
            $this->db->insert('tbl_user', $data);
            return TRUE;
        } 
        else {
            return FALSE;
        }
    }

    public function update_order_status($status, $orderid){
        if($status == 'dispatch'){
            $this->db->set('dispatch_time', date('H:i A'));
        }
        $this->db->set('order_status', $status);
        $this->db->where('order_id', $orderid);
        $this->db->update('tbl_order');
        
        if ($this->db->affected_rows() > 0) {
            return TRUE;
            //echo "success";
        }else{
            //echo "error";
            return FALSE;
        }
    }
    /**
     * update product details
     */
    public function update_product($data){
        $this->db->set('category_id', $data['category_id']);
        $this->db->set('product_title', $data['product_title']);
        $this->db->set('product_description', $data['product_description']);
        $this->db->set('availability', $data['availability']);
        $this->db->set('currency', $data['currency']);
        $this->db->set('price', $data['price']);
        if($data['product_image']){
            $this->db->set('product_image', $data['product_image']);  
        }

        $this->db->where('product_id', $data['product_id']);
        $this->db->update('tbl_product');
        // $this->db->set('staff_id', $this->session->userdata['staffuser']->staff_id);
        // $this->db->where('order_id', $product_id);
        // $this->db->update('tbl_order');
        
        if ($this->db->affected_rows() > 0) {
            return TRUE;
            //echo "success";
        }else{
            //echo "error";
            return FALSE;
        }
    }
     /**
     * update category details
     */
    public function update_category($data){
        $this->db->set('category_name', $data['category_name']);
        $this->db->set('availability', $data['availability']);
       
       
        $this->db->where('catagory_id', $data['category_id']);
        $this->db->update('tbl_product_catagory');
        // $this->db->set('staff_id', $this->session->userdata['staffuser']->staff_id);
        // $this->db->where('order_id', $product_id);
        // $this->db->update('tbl_order');
        //echo $this->db->last_query();
        if ($this->db->affected_rows() > 0) {
            return TRUE;
            //echo "success";
        }else{
            //echo "error";
            return FALSE;
        }
    }
      /**
     * update item details
     */
    public function update_item($data){

        // $condition = "item_title =" . "'" . $data['item_title'] . "'";
        // $this->db->select('*');
        // $this->db->from('tbl_item');
        // $this->db->where($condition);
        
        
        // $query = $this->db->get();
        // // echo $this->db->last_query();
        // // echo $query->num_rows();
        // if ($query->num_rows() > 0) {
        //     //return $query->result();
        //     return 'DUPLICATE';
        // } 



        $this->db->set('item_title', $data['item_title']);
        $this->db->set('availability', $data['availability']);
       
       
        $this->db->where('item_id', $data['item_id']);
        $this->db->update('tbl_item');
    
        if ($this->db->affected_rows() > 0) {
            return TRUE;
            //echo "success";
        }else{
            //echo "error";
            return FALSE;
        }
    }
    public function get_all_staff(){
        $condition = "staff_role =" . "'staff'";
        $this->db->select('*');
        $this->db->from('tbl_staff');
        $this->db->where($condition);
        
        $query = $this->db->get();
        //echo $this->db->last_query();
        $query->num_rows();
        if ($query->num_rows() > 0) {
            return $query->result();
        } 
        else {
            return false;
        }
    }
    public function get_staff_order_by_date_range($staffid,$date_start,$date_end){
        $condition = "order_place_date <=" . "'". $date_start ."'".  " AND ".  "order_place_date >=". "'" . $date_end . "'" . " AND " . "staff_id=" . "'" . $staffid . "'";
       $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where($condition);
        
        $query = $this->db->get();
        //echo $this->db->last_query();
        $query->num_rows();
        if ($query->num_rows() > 0) {
            return $query->result();
        } 
        else {
            return false;
        }
    }

    public function get_sales($date_start,$date_end){
        $condition = "order_place_date <=" . "'". $date_start ."'".  " AND ".  "order_place_date >=". "'" . $date_end . "'".    " AND ". "order_status=" . " 'dispatch' ";
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where($condition);
        $query = $this->db->get();
        //echo $this->db->last_query();
        $query->num_rows();
        if ($query->num_rows() > 0) {
            return $query->result();
        } 
        else {
            return false;
        }

    }
    public function add_new_promotion($data){
        $this->db->insert('tbl_promotion', $data);
            
        if ($this->db->affected_rows() > 0) {
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }
    }
    public function get_promotion(){
        $condition = "status =" . "'active'";
        $this->db->select('*');
        $this->db->from('tbl_promotion');
        $this->db->where($condition);
        $this->db->limit(1);
        $this->db->order_by("promotion_id", "desc");
        $query_promotion = $this->db->get();
          $this->db->last_query();
         
        if ($query_promotion->num_rows() > 0) {
            return $query_promotion->result();
            
        } 
        elseif($query_promotion->num_rows() == 0){
            return 'empty';
        }
        else{
            return  false;
        }
    }
}