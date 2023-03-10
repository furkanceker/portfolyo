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
		$pass = md5($this->input->post('password')); 
		
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
    public function about(){
		$data['head'] = "Hakkımda Kısmı";
		$data['about'] = About::find(1);
		$this->load->view('admin/about',$data);
	}
    public function panelpost(){
		$config = Ayarlar::find(1);

		$data = ['name'=>postvalue('name'),
				 'mail'=>postvalue('mail'),
				 'github'=>postvalue('github'),
				 'twitter'=>postvalue('twitter'),
				 'instagram'=>postvalue('instagram'),
				 'linkedin'=>postvalue('linkedin'),
				];
/* 		if($_FILES['logo']['size']>0){
			$data['logo']=imageupload('logo','config');
			unlink($config->logo);
		}
		if($_FILES['icon']['size']>0){
			$data['icon']=imageupload('icon','config');
			unlink($config->icon);
		} */
		Ayarlar::update(1,$data);
		flash('success','check','İşlem Başarılı');
		back();
	}
    public function aboutpost(){
		$data = ['info'=>postvalue('info'),
				 'textShort'=>postvalue('textShort'),
				 'textLong'=>postvalue('textLong'),
				 'birthday'=>postvalue('birthday'),
				 'website'=>postvalue('website'),
				 'phone'=>postvalue('phone'),
				 'age'=>postvalue('age'),
				 'degree'=>postvalue('degree'),
				 'city'=>postvalue('city'),
				 'freelance'=>postvalue('freelance'),
				];

		About::update(1,$data);
		flash('success','check','İşlem Başarılı');
		back();
	}

    public function sifre(){
		$data['head'] = "Şifre Değiştirme";
		$this->load->view('admin/sifre',$data);
	}
    public function contact(){
		$data['head'] = "İletişim";
		$this->load->view('admin/contact',$data);
	}
	public function sifrepost(){
		$pass = md5($this->input->post('oldpass'));
		$exist = Yonetim::find(['password'=>$pass]);
		if($exist){
			$data = ['password'=>md5(postvalue('newpass'))];

			Yonetim::update(1,$data);
			flash('success','check','İşlem Başarılı');
			back();
		} else {
			flash('danger','ban','İşlem Başarısız');
			back();
		}

	}

    public function logout(){
		$this->session->sess_destroy();
		redirect('admin');
	}
}