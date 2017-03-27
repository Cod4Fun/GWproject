<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
		
			//	Chargement des ressources pour tout le contrôleur
			$this->load->helper(array('url', 'assets'));
			$this->load->model('Auth_client', 'authModel');
			$this->load->model('Profils_model', 'ProfilModel');
        	$this->load->model('Agents_model', 'AgentModel');
		}
		public function index ()
		{
			$this->accueil();
		}  
		
		public function accueil()
		{
			$data["error"] = "";
			$this->load->view('login',$data);
		}

		public function connecter()
	{
		//on vérifie si une session existe 
		$session_login = $this->session->userdata('login');
		
		if ($session_login != NULL)
		{
			redirect(site_url('Dashboard'));
		}
		else
		{
			$this->load->library('form_validation');
			//	Cette méthode permet de changer les délimiteurs par défaut des messages d'erreur (<p></p>).
			$this->form_validation->set_error_delimiters('<p class="form_erreur">', '</p>');
			
			//	Mise en place des règles de validation du formulaire
			//	Nombre de caractères : [3,25] pour le login et [3,3000] pour le password
			//	Uniquement des caractères alphanumériques, des tirets et des underscores pour le pseudo
			$this->form_validation->set_rules('login',  '"Login"',  'required');
			$this->form_validation->set_rules('password', '"Password"', 'required');			
			if ($this->form_validation->run())
			{
				$data = $this->authModel->login($this->input->post('login'),$this->input->post('password'));
				//var_dump($this->input->post('password'));
				//si l'utilisateur existe on sauvegarde ses données dans une session
				if ($data) {
					
						$userdata = array(
								   'id' => $data->id_user,
								   'type' => $data->type,	
								   'country' => $data->id_pays,
								   'email'  => $data->email,
				                   'profil' => $data->profil_id,
				                   'nom' => $data->nom,
				                   'logged_in' => TRUE
								   );
					//$this->session->sess_destroy();			   								   
					$this->session->set_userdata($userdata);
					//var_dump($userdata);
					redirect(site_url('Dashboard'));
				
			}else{
				   $data['error'] = "error";
					$this->load->view('login',$data);
				}
					
			}else{
				$data['error'] = "error";
				$this->load->view('login',$data);
			}	
		}	   					   
	}		


		public function connecte()
		{
			redirect(site_url('Dashboard'));
		}

		public function initialize($dest)
    {
        $destin = str_replace("@", "At", $dest);    
        $message = " <p>Bonjour cher Agent, </p>
                    
                    <span>Pour le changement de votre mot de passe, </span> <br/>
                    
                    <span>Cliquez sur ce lien : <a href=\"".site_url('Activate/index/').'/'.$destin."\">Activation du compte Illicash <a> </span> <br />
                    
                    <span>Veuillez noter que cette adresse mail et le mot de passe que vous avez choisi vous serviront à vous connecter au Scrashboard.</span> <br \>
                    <span>Cordialement, </span> <br /> <br />               
                    
                    <p>L'équipe  Illicash</p>
                    <p>Cet e-mail a été envoyé automatiquement. Merci de ne pas y répondre. Ce message est un e-mail du service Illicash</p>";
                        
            $this->load->library('email');
            $this->email->from('contact@sycapay.com', 'Illicash');
            $this->email->to($dest);
            $this->email->subject("Création de votre compte Illicash");
            $this->email->message($message); //('Bonjour cher client, Pour definir votre mot de passe veuillez vous rendre à cette adresse : '.site_url('Activate/index/').'/'.$destin.' Merci pour votre confiance!  Notre équipe');
            $this->email->send(); 
        
    }
        
        
    public function passwords()
    {
        $mail = $this->input->post('email');
        if($this->authModel->login_check($mail) == TRUE){
            $this->initialize($mail);
            redirect(site_url('Welcome'));
        }
        else {
            $data['error_send'] = "Cette adresse est incorrecte";
            $data['error'] = "";
            $this->load->view('login',$data);
        }
        
    }
}
?>
