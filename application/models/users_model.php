<?php
	
	class Users_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
 
		public function login($email, $password){
			$query = $this->db->get_where('users', array('email'=>$email, 'password'=>$password,'estado'=>'Activo'));
			return $query->row_array();
		}
		
		function logLoginLogoutInsert($user_id,$tipo){
			$data = array('user_id'=> $user_id,'mensaje'=>$tipo);
			$this->db->insert('log_ingresos',$data);
			return $this->db->insert_id(); 
		}

		function getlogLogin($id){
			$this->db->select('mensaje,datetime');
			$this->db->from('log_ingresos');
			$this->db->where('user_id',$id);
			$query = $this->db->get();
			$query = $query->result();
			return $query;
		}

		function insertUser($data){
			$data = array(
				'nombres' => $data['Nombres'],
				'apellidos' => $data['Apellidos'],
				'email' => $data['Email'],
				'password' => md5($data['Password']),
				'id_rol' => $data['Rol'],
				'estado' => $data['Activo']
			);
			$this->db->insert('users',$data);
			return $this->db->insert_id(); 
		}

		function selectUsuarios(){
			$this->db->select('*');
			$this->db->from('users');
			$query = $this->db->get();
			$query = $query->result();
			return $query;
		}

		function selectpagos(){
			$this->db->select('users.nombres,pagos.cantidad, pagos.fecha, pagos.monto_pagar,pagos.comentario');
			$this->db->from('pagos');
			$this->db->join('users', 'pagos.user_id = users.id');
			$query = $this->db->get();
			$query = $query->result();
			return $query;
		}
	
		public function delete_row($id){
			$this->db->where('id',$id);
			$this->db->delete('users');
		}

		function registrarPago($data){
			$data = array(
				'user_id' => $data['user_id'],
				'cantidad' => $data['Cantidad'],
				'monto_pagar' => $data['MontoPorPagar'],
				'fecha' => date('Y-m-d',strtotime($data['FechaPagar'])),
				'comentario' => $data['Comentarios'],
			);
			$this->db->insert('pagos',$data);
			return $this->db->insert_id(); 
		}
	}
?>