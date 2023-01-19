<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		$data['config'] = Ayarlar::find(1);
		$data['about'] = About::find(1);
		$this->load->view('onyuz/index',$data);
	}

	public function contactpost(){
		$data = ['name'=>postvalue('name'),
			'email'=>postvalue('email'),
			'subject'=>postvalue('subject'),
			'message'=>postvalue('message'),
	   	];
		Contact::insert($data);
		back();
	}
}
