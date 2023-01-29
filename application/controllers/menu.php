<?php

class Menu extends CI_Controller{

    public function index(){
        $this->load->view('product');
    }

    public function contact(){
        $this->load->view('contact');
    }

    public function product(){
        $this->load->view('product');
    }
}