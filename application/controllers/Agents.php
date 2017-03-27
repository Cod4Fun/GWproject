<?php
/**
 * Created by PhpStorm.
 * User: ericzile
 * Date: 14/12/2016
 * Time: 12:32
 */defined('BASEPATH') OR exit ('No direct script access allowed');

class Agents extends CI_Controller
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
    		    $query = $this->AgentModel->liste_user();
	          	$data['error'] = $this->session->flashdata('error');	
				$data['agents'] = $query;
                //$error_msg = $this->session->flashdata('error');
				$this->load->view('scrashboard/agents',$data);
        }
    }

    public function objectifs($id = null)
    {
            if ($id == "0") {
                $day = date("Y-m-d");
                // Calcul de l'écart entre le jour de $day et le lundi (=1) 
                $rel = 1 - date('N', strtotime ($day)); 
                //calcul du lundi avec cet écart 
                $datedebu = date('Y-m-d', strtotime("$rel days", strtotime($day))); 
                //$datedeb = date('Y-m-d', strtotime('last monday'));
                $p_auj = date('N', strtotime ($day));
                if($p_auj == 1){
                  $datefin = date('Y-m-d',strtotime($day.' + 6 day'));
                }
                else if($p_auj == 7){
                  $datefin = $day;
                }
                else{
                  $datefin = date('Y-m-d',strtotime($day.' + '.(7-$p_auj).' day'));
                }
                $query = $this->AgentModel->verif_seuil($datedebu, $datefin);
                $data['error'] = "";    
                $data['agents'] = $query;
                $data['select'] = $id;
                if (count($query) == 0){$data['error'] = "vide";}
                $this->load->view('scrashboard/objectifs',$data);
            }elseif($id == "1")
            {

                $day = date("Y-m-d");
                // Calcul de l'écart entre le jour de $day et le lundi (=1) 
                $rel = 1 - date('N', strtotime ($day)); 
                //calcul du lundi avec cet écart 
                $datedeb = date('Y-m-d', strtotime("$rel days", strtotime($day))); 
                //$datedeb = date('Y-m-d', strtotime('last monday'));
                $p_auj = date('N', strtotime ($day));
                if($p_auj == 1){
                  $datefin = date('Y-m-d',strtotime($day.' + 6 day'));
                }
                else if($p_auj == 7){
                  $datefin = $day;
                }
                else{
                  $datefin = date('Y-m-d',strtotime($day.' + '.(7-$p_auj).' day'));
                }
                $datedebu = date('Y-m-d', strtotime($datedeb. "-7 days"));
                $datefint = date('Y-m-d', strtotime($datefin. "-7 days"));
                //var_dump($datedebu);
                //var_dump($datefint);
                $query = $this->AgentModel->verif_seuil($datedebu, $datefint);
                //var_dump($query);
                $data['error'] = "";    
                $data['agents'] = $query;
                $data['select'] = $id;
                if (count($query) == 0){$data['error'] = "vide";}
                $this->load->view('scrashboard/objectifs',$data);
            }elseif($id == "2"){
                $day = date("Y-m-d");
                // Calcul de l'écart entre le jour de $day et le lundi (=1) 
                $rel = 1 - date('N', strtotime ($day)); 
                //calcul du lundi avec cet écart 
                $datedeb = date('Y-m-d', strtotime("$rel days", strtotime($day))); 
                //$datedeb = date('Y-m-d', strtotime('last monday'));
                $p_auj = date('N', strtotime ($day));
                if($p_auj == 1){
                  $datefin = date('Y-m-d',strtotime($day.' + 6 day'));
                }
                else if($p_auj == 7){
                  $datefin = $day;
                }
                else{
                  $datefin = date('Y-m-d',strtotime($day.' + '.(7-$p_auj).' day'));
                }
                $datedebu = date('Y-m-d', strtotime($datedeb. "-14 days"));
                $datefint = date('Y-m-d', strtotime($datefin. "-14 days"));
                //var_dump($datedebu);
                //var_dump($datefint);
                $query = $this->AgentModel->verif_seuil($datedebu, $datefint);

                $data['error'] = "";    
                $data['agents'] = $query;
                $data['select'] = $id;
                if (count($query) == 0){$data['error'] = "vide";}
                $this->load->view('scrashboard/objectifs',$data);
            }

    }
    public function new_agent()
    {
    	        $query = $this->ProfilModel->liste_profils();
    	        $data['error'] = "";	
				$data['profils'] = $query;
			    $this->load->view('scrashboard/create_agent',$data);
    }
    public function insertion()
    {
        if ($this->session->userdata('type') != "ADMIN_PAYS") {
          
    		$rs = $this->AgentModel->existing_user($this->input->post('mobile'));
	   		//$ml = $this->AgentModel->existing_pin($this->input->post('pin'));
            
	   		if ($rs == "0") {
	   			$this->AgentModel->ajout_user($this->input->post('nom'), $this->input->post('pays'), $this->input->post('localisation'), $this->input->post('email'), $this->input->post('mobile'), $this->input->post('profil'), $this->input->post('pin'), $this->input->post('type'));
	   			$query = $this->ProfilModel->liste_profils();
	   			$this->initialize($this->input->post('email'));
	          	$data['error'] = "success";	
				$data['profils'] = $query;
			    $this->load->view('scrashboard/create_agent',$data);
	   		}else{
	   			$query = $this->ProfilModel->liste_profils();
	   			
	          	$data['error'] = "doublon";	
				$data['profils'] = $query;
			    $this->load->view('scrashboard/create_agent',$data);
	   			}
        }else{
                $rs = $this->AgentModel->existing_user($this->input->post('mobile'));
            //$ml = $this->AgentModel->existing_pin($this->input->post('pin'));

            if ($rs == "0") {
                $this->AgentModel->ajout_user($this->input->post('nom'),  $this->input->post('pays'), $this->input->post('localisation'), $this->input->post('email'), $this->input->post('mobile'), $this->input->post('profil'), $this->input->post('pin'), $this->input->post('type'));
                $query = $this->ProfilModel->liste_profils();
                $data['error'] = "success"; 
                $data['profils'] = $query;
                $this->load->view('scrashboard/create_agent',$data);
            }else{
                $query = $this->ProfilModel->liste_profils();
                $data['error'] = "doublon"; 
                $data['profils'] = $query;
                $this->load->view('scrashboard/create_agent',$data);
                }
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
    public function supprimer($id = null)
    {
        
        $this->AgentModel->supprimer($id);
        $this->session->set_flashdata('error', 'desable');
        redirect('Agents');             
    }
    public function activer($id = null)
    {
        
        $this->AgentModel->activer($id);
        $this->session->set_flashdata('error', 'actif');
        redirect('Agents');         
    }

    public function modifier($id = null)
    {
        $query = $this->AgentModel->liste_agent_ind($id);
        $query2 = $this->ProfilModel->liste_profils();
        
        $data['profils'] = $query2;
        $data['profil'] = $query;
        $data['error'] ="";
        //$data['infos_compte'] = $query2;
        $this->load->view('scrashboard/modifier_agent',$data);
    }

    public function update ($id = null)
        {
          if(($this->input->post('nom') != "") and ($this->input->post('localisation') != "") and ($this->input->post('email') != "") and ($this->input->post('contact') != "") and ($this->input->post('profil') != ""))
          {
            $this->AgentModel->update_agents($id, $this->input->post('nom'),
                                            $this->input->post('localisation'),
                                            $this->input->post('email'),
                                            $this->input->post('contact'),
                                            $this->input->post('profil')
                                             );
                
                    $query = $this->AgentModel->liste_agent_ind($id);
                    $query2 = $this->ProfilModel->liste_profils();
                    $data['profil'] = $query;
                    $data['profils'] = $query2;
                    $data['error'] = "update";
                 $this->load->view('scrashboard/modifier_agent',$data);
          }else{    
                 $query = $this->AgentModel->liste_agent_ind($id);
                 $query2 = $this->ProfilModel->liste_profils();
                    $data['profils'] = $query2;
                    $data['profil'] = $query;
                 $data['error'] = "error";
                 $this->load->view('scrashboard/modifier_agent',$data);
                }
        }
}