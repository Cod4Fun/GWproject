<?php
/**
 * Created by PhpStorm.
 * User: ericzile
 * Date: 30/12/2016
 * Time: 12:02
 */defined('BASEPATH') OR exit ('No direct script access allowed');

class Alertes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //	Chargement des ressources pour tout le contrôleur
        $this->load->helper(array('url', 'assets'));
        $this->load->model('Alertes_model', 'AlertesModel');
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
        $query = $this->AlertesModel->liste_alertes();
        $data['error'] = $this->session->flashdata('error');
        $data['vider'] ="";
        if($query == null) {$data['vider'] = "vide";}
        $data['alertes'] = $query;
        $this->load->view('scrashboard/Alertes',$data);
        }
    }

    public function supprimer($id = null)
    {

        //redirect(site_url('Groupe'));
        $this->AlertesModel->supprimer($id);
        $this->session->set_flashdata('error', 'desable');
        redirect('Alertes');;



    }
}