<?php
/**
 * Created by PhpStorm.
 * User: ericzile
 * Date: 14/12/2016
 * Time: 12:34
 */defined('BASEPATH') OR exit ('No direct script access allowed');

class Compte extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //	Chargement des ressources pour tout le contrôleur
        $this->load->helper(array('url', 'assets'));
        $this->load->model('Profils_model', 'ProfilModel');
        $this->load->model('Agents_model', 'AgentModel');
        
    }

    public function modifier ($id = null)
		{
			//$query2 = $this->AgentModel->Liste_compte();
			$query = $this->AgentModel->liste_collaborateur_ind($id);
			$data['users'] = $query;
			$data['error'] ="";
			//$data['infos_compte'] = $query2;
			$this->load->view('scrashboard/compte',$data);
			
		}


    public function update ($id = null)
		{
          if($this->input->post('rpassword') == $this->input->post('password') and ($this->input->post('rpassword') != "") and ($this->input->post('password') != "") )
          {

			$this->AgentModel->Update_compte($id,
									 		 $this->input->post('rpassword') 
									         );
				//redirect(site_url('Collaborateurs'));
			     $query = $this->AgentModel->liste_collaborateur_ind($id);
			     $data['users'] = $query;
			     $data['error'] = "update";
			     $this->load->view('scrashboard/compte',$data);
		  }else{	

			 	 $query = $this->AgentModel->liste_collaborateur_ind($id);
			     $data['users'] = $query;
			     $data['error'] = "error";
			     $this->load->view('scrashboard/compte',$data);
			     }
		}
}