<?php
/**
 * Created by PhpStorm.
 * User: ericzile
 * Date: 14/12/2016
 * Time: 12:33
 */defined('BASEPATH') OR exit ('No direct script access allowed');

class Cards extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //	Chargement des ressources pour tout le contrôleur
        $this->load->helper(array('url', 'assets'));
        $this->load->model('Profils_model', 'ProfilModel');
        $this->load->model('Cards_model', 'CardsModel');
    }

    public function index()
    {
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
    	$query = $this->CardsModel->liste_card();
    	$data['error'] = "";
    	$data['liste'] = $query;
    	$this->load->view('scrashboard/cards', $data);
        }
    }
    public function new_card(){
    	$data['error']="";
    	$this->load->view('scrashboard/add_cards', $data);
    }

    public function bulkinsert()
    {
        $config['upload_path']   = '././uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size']      = 2048;
        $config['encrypt_name']  = 'true';
        $config['overwrite']     = 'true';
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('fichier')) {
            //$error = array('error' => $this->upload->display_errors());
            $data['error'] = "load";
            $this->load->view('scrashboard/add_cards', $data);
        }
       else {
        //$session_customer = $this->session->userdata('customer_id');
       // if ($session_customer != null)
        //{

            $save = 0;
            $ligne = 1; // compteur de ligne
            $fic = fopen("././uploads/".$this->upload->data('file_name'), "a+");
              while($tab=fgetcsv($fic,9999999,';'))
                {
                $champs = count($tab);//nombre de champ   
                

                //affectation de chaque champ de la ligne en question
               
            if ($champs == 3) {
		                  $type[$ligne] = $tab[0];
		                  $token[$ligne] = $tab[1];
		                  $pays[$ligne] =  $tab[2];
		                  $rs = $this->CardsModel->existingtext($token[$ligne], $pays[$ligne]);
		            if ($rs == "0")
		            {
		                $template = $this->CardsModel->ajout_cards($type[$ligne],
		                                                                    $token[$ligne],
		                                                                    $pays[$ligne]
		                                                                    );
		                $save++;
		            }
		            
            }
            $ligne++;
        //}
        }
        fclose($fic);
        if ($save != 0) {
          // redirect(site_url('Subscribers'));
        	$data['error'] = "success";
        	$this->load->view('scrashboard/add_cards', $data);
        }else {
                $data['error'] ="error";
        	    $this->load->view('scrashboard/add_cards', $data);
            
            }
        
              

     } 
        
    }
}