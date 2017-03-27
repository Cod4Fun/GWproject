<?php
/**
 * Created by PhpStorm.
 * User: ericzile
 * Date: 14/12/2016
 * Time: 12:33
 */defined('BASEPATH') OR exit ('No direct script access allowed');

class Collaborateur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //	Chargement des ressources pour tout le contrôleur
        $this->load->helper(array('url', 'assets'));
        $this->load->model('Profils_model', 'ProfilModel');
        $this->load->model('Agents_model', 'AgentModel');
    } 
    public function index()
    {
    	$this->acceuil();
    }
    public function acceuil()
    {           
         $session_login = $this->session->userdata('email');

        if ($session_login == NULL)
        {
            redirect(site_url('Welcome'));
        }
        else
        {
    		    $query = $this->AgentModel->liste_collaborateur();
	          	$data['error'] = $this->session->flashdata('error');	
				$data['agents'] = $query;
				$this->load->view('scrashboard/collaborateur',$data);
        }        
    }
    public function insertion()
    {       
    		$rs = $this->AgentModel->existing_collaborateur($this->input->post('email'));
	   		//$ml = $this->AgentModel->existing_pin($this->input->post('pin'));

	   		if ($rs == "0") {
	   			$this->AgentModel->Ajout_collaborateur($this->input->post('nom'), $this->input->post('pays'), $this->input->post('localisation'), $this->input->post('email'), $this->input->post('numero'));
	   			$this->session->set_flashdata('error', 'success');
                $this->initialize($this->input->post('email'));
                redirect('Collaborateur');
           		    
	   		}else{
	   			$this->session->set_flashdata('error', 'doublon');
                redirect('Collaborateur');
	   			}

    }

    public function supprimer($id = null)
    {
        $this->AgentModel->supprimer($id);
        $this->session->set_flashdata('error', 'desable');
        redirect('Collaborateur');           
    }
    public function activer($id = null)
    {
        
                    //redirect(site_url('Groupe'));
        $this->AgentModel->activer($id);
        $this->session->set_flashdata('error', 'actif');
        redirect('Collaborateur');   
    }

    public function modifier($id = null)
    {
        $query = $this->AgentModel->liste_collaborateur_ind($id);
        //$query2 = $this->ProfilModel->liste_profils();              
        //$data['profils'] = $query2;
        $data['profil'] = $query;
        $data['error'] ="";
        //$data['infos_compte'] = $query2;
        $this->load->view('scrashboard/modifier_collaborateur',$data);
    }

    public function update ($id = null)
        {
          if(($this->input->post('nom') != "") and ($this->input->post('localisation') != "") and ($this->input->post('email') != "") and ($this->input->post('contact') != ""))
          {
            $this->AgentModel->update_collaborateurs($id, $this->input->post('nom'),
                                            $this->input->post('localisation'),
                                            $this->input->post('email'),
                                            $this->input->post('contact') 
                                             );
                //redirect(site_url('Collaborateurs'));
                 $query = $this->AgentModel->liste_collaborateur_ind($id);
                 $data['profil'] = $query;
                 $data['error'] = "update";
                 $this->load->view('scrashboard/modifier_collaborateur',$data);
          }else{    
                 $query = $this->AgentModel->liste_collaborateur_ind($id);
                 $data['profil'] = $query;
                 $data['error'] = "error";
                 $this->load->view('scrashboard/modifier_collaborateur',$data);
                }
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
        if($this->usersModel->login_check($mail) == TRUE){
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