<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('adminlogin') && $this->uri->segment(2) && $this->uri->segment(2) != "login"){
			redirect('admin');
		} 
	}

	public function index()
	{
		if($this->session->userdata('adminlogin')){
			redirect('admin/panel');
		}
		$this->load->view('admin/login');
		
	}

    public function login(){
		$username = $this->input->post('username');
		$pass = $this->input->post('password'); 
		
		$exist = Yonetim::find(['username'=>$username,'password'=>$pass]);
		if($exist){
			$this->session->set_userdata('adminlogin',true);
			$this->session->set_userdata('admininfo',$exist);
			redirect('admin/panel');
		}else{
			$error = "E-Posta veya Şifre Hatalı";
			$this->session->set_flashdata('error',$error);
			redirect('admin');
		}
	}

    public function panel(){
		$data['head'] = "Site Ayarları";
		$data['config'] = Ayarlar::find(1);
		$this->load->view('admin/panel',$data);
	}
}