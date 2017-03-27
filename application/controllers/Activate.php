<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

	class Activate extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
		
			//	Chargement des ressources pour tout le contrôleur
			$this->load->helper(array('url', 'assets'));
			$this->load->model('Auth_client', 'authModel');
			$this->load->model('Profils_model', 'ProfilModel');
        	$this->load->model('Agents_model', 'AgentModel');
			
		}
		
		public function index($email = null)
		{
			$res = str_replace("At", "@", $email);
			$data['mail'] = $res;
			$this->load->view('password',$data);
		}
		public function active($id = null)
		{
			$destin = str_replace("At", "@", $id);
			$this->authModel->activer($destin);
			redirect(site_url('Welcome'));
		}

		public function abo_change_password()
		{
			$this->session->sess_destroy();
			//echo $this->input->post('email')."Autre".$this->input->post('rpassword');
			$this->authModel->changer($this->input->post('mail'),$this->input->post('rpassword'));
			/*$data = $this->usersModel->login($this->input->post('mail'),$this->input->post('rpassword'));
			//si l'utilisateur existe on sauvegarde ses données dans une session
			if ($data) {
					$userdata = array(
						'id' => $data->users_id,
						'nom' => $data->user_nom,
						'prenom' => $data->user_prenom,
						'login'  => $data->user_email,
						'profil' => $data->type_user,
						'entreprise_id' => $data->id_ent,
						'logged_in' => TRUE);
					//$this->session->sess_destroy();
					$this->session->set_userdata($userdata);
					redirect(site_url('Welcome'));
				} else{*/
					redirect(site_url('Welcome'));
		 }
		
		
		public function change_password()
		{
			//echo $this->input->post('email')."Autre".$this->input->post('rpassword');
			$this->authModel->changer($this->input->post('mail'),$this->input->post('rpassword'));
			/*$data = $this->usersModel->login($this->input->post('mail'),$this->input->post('rpassword'));
				//si l'utilisateur existe on sauvegarde ses données dans une session
				if ($data) {
					$info = $this->entrepriseModel->rechercher($data->id_ent);
					if($info) {
						$userdata = array(
									'id' => $data->users_id,
									'nom' => $data->user_nom,
									'prenom' => $data->user_prenom,
									'country' => $info->pays,
									'login'  => $data->user_email,
									'profil' => $data->type_user,
									'entreprise' => $info->libelle,
									'entreprise_id' => $data->id_ent,
				                   'logged_in' => TRUE
								   );
					//$this->session->sess_destroy();		   								   
					$this->session->set_userdata($userdata);
					redirect(site_url('Dashboard'));
				} else{
					redirect(site_url('Dashboard'));
				}
			}else{
				
			}*/
			redirect(site_url('Welcome'));
		}
	}
?>