<?php
/**
 * Created by PhpStorm.
 * User: ericzile
 * Date: 14/12/2016
 * Time: 12:33
 */defined('BASEPATH') OR exit ('No direct script access allowed');

class Profils extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //	Chargement des ressources pour tout le contrôleur
        $this->load->helper(array('url', 'assets'));
        $this->load->model('Profils_model', 'ProfilModel');
    }


    public function index(){
    	$this->accueil();
    }

    public function accueil()
    {      
     $session_login = $this->session->userdata('email');

        if ($session_login == NULL)
        {
            redirect(site_url('Welcome'));
        }
        else
        {
    	    $query = $this->ProfilModel->liste_profils();
	        $data['error'] = $this->session->flashdata('error');	
			$data['profils'] = $query;
			$this->load->view('scrashboard/profils',$data);
		}		
				//$this->load->view('scrashboard/profils');
    }


    public function insert()
    {
    	        $profil   = $this->input->post('profil');
	          	$commission = $this->input->post('commission');
	            $seuil = $this->input->post('seuil');
				$seuil_hebdo = $this->input->post('seuil_hebdo');
	            $rs = $this->ProfilModel->existingprofils($profil);

	         if ($rs == 0) {
		         	if ((is_numeric($commission)) and (is_numeric($seuil)) and (is_numeric($seuil_hebdo))) {
		         		    $this->ProfilModel->ajout_profils($profil,$this->input->post('commission'),$this->input->post('seuil'), $seuil_hebdo);
				          	$this->session->set_flashdata('error', 'insert');
            				redirect('Profils');
		          	}else{
				          	$this->session->set_flashdata('error', 'numeric');
            				redirect('Profils');
		          	}
	         }else{
		         	$this->session->set_flashdata('error', 'exist');
            		redirect('Profils');
	              }
	}

	public function supprimer($id = null)
    {
    	$rs  = $this->ProfilModel->existingid($id);
    	if ($rs == "0") {
    		$this->ProfilModel->supprimer($id);
    		//$query = $this->ProfilModel->liste_profils();
    		$this->session->set_flashdata('error', 'delete');
            redirect('Profils');
		          	
    	}else{
    		$this->session->set_flashdata('error', 'nodelete');
            redirect('Profils');

    	}
            
    }

	public function modifier($id)
	{
		$query = $this->ProfilModel->listing($id);
			$data['profil'] = $query;
			$data['error'] ="";
			//$data['infos_compte'] = $query2;
			$this->load->view('scrashboard/modifier_profils',$data);
	}

	 public function update ($id = null)
		{
          if(($this->input->post('profil') != "") and ($this->input->post('seuil') != "") and ($this->input->post('commission') != "") and ($this->input->post('seuil_hebdo') !=""))
          {

			$this->ProfilModel->Update($id, $this->input->post('profil'),
											$this->input->post('seuil'),
											$this->input->post('commission'),
											$this->input->post('seuil_hebdo')
										);
				//redirect(site_url('Collaborateurs'));
			     $query = $this->ProfilModel->listing($id);
				 $data['profil'] = $query;
			     $data['error'] = "update";
			     $this->load->view('scrashboard/modifier_profils',$data);
		  }else{	

			 	 $query = $this->ProfilModel->listing($id);
				 $data['profil'] = $query;
			     $data['error'] = "error";
			     $this->load->view('scrashboard/modifier_profils',$data);
			     }
		}

}