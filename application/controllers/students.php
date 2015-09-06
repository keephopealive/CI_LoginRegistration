<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library("form_validation");
		$this->load->model('users');
	}

	public function index()
	{
		$this->load->view('home');
	}

	public function welcome()
	{
		$this->load->view('welcome', $this->session->userdata('user'));
	}

	public function login()
	{

		$result = $this->users->login(
			$this->input->post('email'),
			$this->input->post('password')
		);
		if($result)
		{
			$this->session->set_userdata('user', $result);
			$this->session->set_flashdata('login_attempt', "Success! Credentials Match.");
			redirect("/welcome");
		}
		else
		{
			$this->session->set_flashdata('login_attempt', "Failed - Credentials do NOT match.");
			redirect("/");
		}
	}

	public function logoff()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

	public function registration()
	{
		// SET VALIDATION RULES
		// Array of validations:
		$config = array(
			array(
				'field' => 'first_name',
				'label' => 'First Name',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'last_name',
				'label' => 'Last Name',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|valid_email|is_unique[users.email]'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|min_length[8]|matches[confirm_password]'
			),
			array(
				'field' => 'confirm_password',
				'label' => 'Confirm Password',
				'rules' => 'required'
			)
		);
		// Or each one in line like this example:
		// $this->form_validation->set_rules('first_name', 'First name', 'required|trim');

		$this->form_validation->set_rules($config);

		$this->form_validation->set_error_delimiters('<h1 class="">','</h1>');


		// VALIDATE
		if ($this->form_validation->run() == FALSE )
		{
			$this->session->set_flashdata('registration_errors', validation_errors());
			redirect('/');  
		}
		else
		{
			$result = $this->users->registration(
				$this->input->post('email'),
				$this->input->post('first_name'),
				$this->input->post('last_name'),
				$this->input->post('password')
			);
			if($result)
			{
				$this->session->set_flashdata('registration_attempt', 'Successful Registration!');
				redirect('/');
			}
			else
			{
				$this->session->set_flashdata('registration_attempt', 'Registration Failed.');
				redirect('/');	
			}
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */