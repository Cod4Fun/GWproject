<?php
/**
 * Created by PhpStorm.
 * User: ericzile
 * Date: 06/01/2017
 * Time: 12:11
 */defined('BASEPATH') OR exit ('No direct script access allowed');

class Maps extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //	Chargement des ressources pour tout le contrôleur
        $this->load->helper(array('url', 'assets'));
        $this->load->model('Maps_model', 'MapsModel');
    }

    public function index()
    {
        $this->acceuil();
    }

    public function acceuil()
    {
        $this->load->library('googlemaps');

        $config['center'] = 'auto';
       // $config['zoom'] = 'auto';
        $this->googlemaps->initialize($config);

        $marker = array();
        $marker['position'] = '5.3345316,-3.9986976';
        $marker['places'] = TRUE;
        $marker['title'] = 'Texte 1';
        $marker['infowindow_content'] = 'Syca Pay\n ok ok ';
        $marker['animation'] = 'BOUNCE';
        $this->googlemaps->add_marker($marker);

        $marker = array();
        $marker['position'] = '5.3249316,-3.9486076';
        $marker['title'] = 'Texte 2';
        $marker['places'] = TRUE;
        $marker['infowindow_content'] = 'Point 2';
        $marker['animation'] = 'BOUNCE';
        $this->googlemaps->add_marker($marker);

        $marker = array();
        $marker['position'] = '5.3345816,-3.9286976';
        $marker['cursor'] = 'Texte 3';
        $marker['places'] = TRUE;
        $marker['infowindow_content'] = 'Point 3';
        $marker['animation'] = 'BOUNCE';
        $this->googlemaps->add_marker($marker);

        $data['map'] = $this->googlemaps->create_map();
        $this->load->view('scrashboard/maps',$data);
    }
}