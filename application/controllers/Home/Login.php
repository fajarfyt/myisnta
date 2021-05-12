<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Login');
    }

	public function index()
	{
		$this->load->view('login/v_login');
	}

	public function verify()
	{
		if($this->uri->segment(4)){
			$verification_key = $this->uri->segment(4);
			// var_dump($verification_key);die();
			
			$this->M_Login->verify($verification_key);

			redirect('login');
		}
	}

	public function register()
	{
		$this->load->view('login/v_register');
	}

	public function signin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$result = $this->M_Login->login($username, $password);
		// var_dump($result);die();

		if($result == ''){
			// redirect();
			var_dump($this->session->userdata('username'));die();
		} else{
			$this->session->set_flashdata('message',$result);
			redirect('login');
		}

		return true;
	}

	public function signup()
	{	
		$validation = $this->form_validation; 

        $validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
        $validation->set_rules('fullname', 'Fullname', 'required');
        $validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $validation->set_rules('password', 'Password', 'required');

        if($validation->run() == FALSE) 
        {
            $this->load->view('login/v_register');
        } else {

			$verification_key = md5($this->input->post('email'));
			$password_ecnrypt = bin2hex($this->input->post('password'));
			
			$data = [
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'fullname' => $this->input->post('fullname'),
				'password' => $password_ecnrypt,
				'verification_key' => $verification_key,
			];

			$id = $this->M_Login->add($data);
			// var_dump($id);die();
			if ($id > 0 ) {
				$subject = "MyInsta verify email login";
				$message = "
					<p> Hai ".$this->input->post('fullname')."</p>
					<p> Please click this button to verify your account for login in myinsta</p>
					<a class='btn btn-primary' href='".base_url()."home/login/verify/".$verification_key."'> Verify </a>
				";

				$config = [
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.gmail.com',
					'smtp_port' =>  465,
					'smtp_user' => 'fajarfyt@gmail.com',
					'smtp_pass' => 'asemlogila12',
					'mailtype'  => 'html', 
					'charset'   => 'iso-8859-1'
				];
				
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");

				$this->email->from('fajarfyt@gmail.com');
				$this->email->to($this->input->post('email'));
				$this->email->subject($subject);
				$this->email->message($message);

				// $this->email->send();
				// var_dump($this->email->send());die();
				if($this->email->send()){
					$this->session->set_flashdata('message', 'Check your email ');
					redirect('register');
				}

			}
			redirect('login');
		}
	}

	
}
