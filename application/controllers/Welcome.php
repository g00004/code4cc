<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('users_model');
	}
	
	public function index(){
		$this->load->library('session');
 
		if($this->session->userdata('user')){
			redirect('home');
		}
		else{
			$data['title'] = 'Iniciar Sesión';
			$this->load->view('login',$data);
		}
	}
 
	public function login(){
		$this->load->library('session');
 
		$email = $_POST['email'];
		$password = md5($_POST['password']);
 
		$data = $this->users_model->login($email, $password);
 
		if($data){
			$this->session->set_userdata('user', $data);
			$return = array(
				'type' => 'success',
				'mensaje' => 'Login true',
				'redirect' => base_url().'index.php/welcome/home'
			);

			$logLogin = $this->users_model->logLoginLogoutInsert($data['id'], 'Inicio Sesion');

			echo json_encode($return);
		}else{
			// header('location:'.base_url().$this->index());
			// $this->session->set_flashdata('error','Invalid login. User not found');
			$return = array(
				'type' => 'error',
				'mensaje' => 'Credenciales incorrectas',
				'redirect' => 'null'
			);
			echo json_encode($return);
		} 
	}
 
	public function home(){
		$this->load->library('session');
 
		if($this->session->userdata('user')){


			$data['tipoPage'] = 'login-page';
			$data['session'] = $this->session->userdata('user');
			$data2['session_sidebar'] = $this->session->userdata('user');
			$data2['title'] = 'Inicio';
			
			$this->load->view('components/header',$data2);
			$this->load->view('home',$data);
			$this->load->view('components/footer');
	
		}
		else{
			redirect('/');
		}
 
	}
 
	public function logout(){
		$this->load->library('session');
		$data = $this->session->userdata('user');
		$this->session->unset_userdata('user');
		$logLogout = $this->users_model->logLoginLogoutInsert($data['id'], 'Cerro Sesion');
		redirect('/');
	}
 
	public function logIngresos(){
		$this->load->library('session');
 
		if($this->session->userdata('user')){

			$logs = $this->users_model->getlogLogin($this->session->userdata('user')['id']);
			// echo '<pre>';
			// echo json_encode($logs);
			// echo '</pre>';

			$template['tipoPage'] = 'sidebar-mini dx-viewport';
			$template['session_sidebar'] = $this->session->userdata('user');
			$template['title'] = 'Ingresos';

			$data['session'] = $this->session->userdata('user');
			$data['table'] = json_encode($logs);
			
			$this->load->view('components/header',$template);
			$this->load->view('logIngresos',$data);
			$this->load->view('components/footer');
	
		}
		else{
			redirect('/');
		}
 
	}

	public function allusuarios(){
		$this->load->library('session');
 
		if($this->session->userdata('user')){

			$usuarios = $this->users_model->selectUsuarios();
			
			$template['tipoPage'] = 'sidebar-mini dx-viewport';
			$template['session_sidebar'] = $this->session->userdata('user');
			$template['title'] = 'Usuarios Registrados';

			$data['session'] = $this->session->userdata('user');
			$data['table'] = json_encode($usuarios);
			
			$this->load->view('components/header',$template);
			$this->load->view('allusers',$data);
			$this->load->view('components/footer');
	
		}
		else{
			redirect('/');
		}
 
	}

	public function usuarios(){
		$this->load->library('session');
 
		if($this->session->userdata('user')){

			$template['tipoPage'] = 'sidebar-mini dx-viewport';
			$template['session_sidebar'] = $this->session->userdata('user');
			$template['title'] = 'Usuarios';

			$data['session'] = $this->session->userdata('user');
			
			
			$this->load->view('components/header',$template);
			$this->load->view('usuarios',$data);
			$this->load->view('components/footer');
	
		}
		else{
			redirect('/');
		}
	}

	public function registrarUsuario(){
		$data = $_POST;
		$registrar = $this->users_model->insertUser($data);
		$return = array(
			'type' => 'success',
			'mensaje' => 'Usuario Creado',
			'redirect' => 'null'
		);
		echo json_encode($return);
	}

	public function deleteUser(){
		$data = $_POST['id'];
		$registrar = $this->users_model->delete_row($data);
		$return = array(
			'type' => 'success',
			'mensaje' => 'Usuario eliminado',
			'redirect' => 'null'
		);
		echo json_encode($return);
	}

	public function pagos(){
		$this->load->library('session');
 
		if($this->session->userdata('user')){
			
			$usuarios = $this->users_model->selectUsuarios();
			$data['usuarios'] = $usuarios;

			$template['tipoPage'] = 'sidebar-mini dx-viewport';
			$template['session_sidebar'] = $this->session->userdata('user');
			$template['title'] = 'Registrar Pagos';

			$data['session'] = $this->session->userdata('user');
			
			
			$this->load->view('components/header',$template);
			$this->load->view('pagos',$data);
			$this->load->view('components/footer');
	
		}
		else{
			redirect('/');
		}
	}

	public function registrarPago(){
		$data = $_POST;
		$registrar = $this->users_model->registrarPago($data);
		$return = array(
			'type' => 'success',
			'mensaje' => 'Pago Registrado',
			'redirect' => 'null'
		);
		echo json_encode($return);
	}
	
	public function allpagos(){
		$this->load->library('session');
 
		if($this->session->userdata('user')){

			$pagos = $this->users_model->selectpagos();
			
			$template['tipoPage'] = 'sidebar-mini dx-viewport';
			$template['session_sidebar'] = $this->session->userdata('user');
			$template['title'] = 'Pagos Registrados';

			$data['session'] = $this->session->userdata('user');
			$data['table'] = json_encode($pagos);
			
			$this->load->view('components/header',$template);
			$this->load->view('allpagos',$data);
			$this->load->view('components/footer');
	
		}
		else{
			redirect('/');
		}
 
	}
}