<?php
    /**
     * 
     */
    class Dashboard extends CI_Controller {
        
        public function __construct()
        {
            parent::__construct();
        
            //  Chargement des ressources pour tout le contrôleur
            //$this->load->library('session');
            $this->load->library('gcharts');
            $this->load->helper(array('url', 'assets'));
            $this->load->model('Transactions_model', 'transactionsModel');
        }
        public function index ()
        {
            $this->accueil();
        }

        private function donutcharts($id, $agent, $card)
        {

            //$total =  (int)$mtn[1]+(int)$orange[1]+(int)$moov[1]+(int)$paypal[1];
            $this->gcharts->load('PieChart');
                //echo $id;
                $today = date("Y-m-d");
                $date_min1 = $today." 00:00:00 ";
                $date_max1 = $today." 23:59:59 ";
                $date = date("Y-m-d");
                $heure = date("H:i:s");
                $encours = $date." ".$heure." ";

                //if (($encours >= $date_min1) && ($encours <= $date_max1)) {
                $slicesn1 = 40;
                $slicesn2 = 50;
                $this->gcharts->DataTable('Foods')
                    ->addColumn('string', 'Foods', 'food')
                    ->addColumn('string', 'Amount', 'amount')
                    ->addRow(array('Hommes', $slicesn1))
                    ->addRow(array('Femmes', $slicesn2));
                //}


            $config = array(
                'is3D' => TRUE
            );

            $this->gcharts->PieChart('Foods')->setConfig($config);
        }

        private function columncharts($id, $agent, $card)
        {
                $today = date("Y-m-d");
                $slice1 = 15;
                $slice2 = 30;
                $slice3 = 99;


                //var_dump($date_min5);
                //$slice6 = 1;
                $this->gcharts->load('ColumnChart');
                $this->gcharts->DataTable('Repartition')
                    ->addColumn('string', 'Classroom', 'class')
                    ->addColumn('number', 'Hommes', 'orange')
                    ->addColumn('number', 'Femmes', 'mtn')
                    ->addColumn('number', 'Enfants', 'moov')
                    ->addRow(array(
                        'Repartition par genre',
                        $slice1,
                        $slice2,
                        $slice3
                    ));
            $config = array(
                'title' => 'Number of transactions'
            );

            $this->gcharts->ColumnChart('Repartition')->setConfig($config);
        }
        
        public function accueil()
        {
            //on vérifie si une session existe 
            //$session_login = $this->session->userdata('login');
                //$min_date = 
                //$max_date = 
                $last = date("Y-m-d");
                $today = date("Y-m-d");
                $this->donutcharts("0", "0", "oui");
                $this->columncharts("0", "0", "oui");
                
                //var_dump($id);
                $date_data = array(
                                   'date_deb' => $last,
                                   'date_fin' => $today,
                                   'stat' => "0",
                                   'clie' => "0",
                                   'perio' => "0",
                                   );                                                                  
                $this->session->set_userdata($date_data);
                //$customer_id = $this->input->post('client');
                //var_dump($query3);
                $data['select'] ="0";
               // $data['card'] = $query2;
                $data['nombre'] = 10;
                $data['somme'] = 10000;
                $data['commution'] = 5600;
                $data['option'] = "oui";

                $data['success'] = "vrai";
                 
                    
                    
                $this->load->view('scrashboard/dashboard', $data);
            
        }
        public function refresh($id = null)
        {
            /*$userdata = array(
                                   'country' => $id
                                   );*/ 
            $this->session->set_userdata('country', $id);                      
                    
            Redirect(site_url('Dashboard'));
        }

        public function initialize($dest, $prenom, $nom, $id)
        {
            
            $destin = str_replace("@", "At", $dest);
            $message = " <p>Bonjour cher ".$nom." ".$prenom.", </p>

                    <span>Nous venons de proceder au remboursement de la transaction demandé :".$id." </span> <br />
                                    
                    <p>L'équipe  Syca Pay</p>
                    <p>Cet e-mail a été envoyé automatiquement. Merci de ne pas y répondre. Ce message est un e-mail du service  Syca Pay</p>";
            $this->load->library('email');
            $this->email->from('contact@sycapay.com', 'SycaPay');
            $this->email->to($dest);
            $this->email->subject("Invitation Syca Pay");
            $this->email->message($message); //('Bonjour cher client, Pour definir votre mot de passe veuillez vous rendre à cette adresse : '.site_url('Activate/index/').'/'.$destin.' Merci pour votre confiance!  Notre équipe');                        
            $this->email->send();
            
        }
        public function initialize_user($dest, $prenom, $nom, $id)
        {
            
            $destin = str_replace("@", "At", $dest);
            $message = " <p>Bonjour cher ".$prenom." , </p>
                    
                    <span>Nous venons de proceder au remboursement de la transaction demandé :".$id." </span> <br />

                 <span>Login du marchand :".$nom." </span> <br />
                                    
                    <p>L'équipe  Syca Pay</p>
                    <p>Cet e-mail a été envoyé automatiquement. Merci de ne pas y répondre. Ce message est un e-mail du service  Syca Pay</p>";
            $this->load->library('email');
            $this->email->from('contact@sycapay.com', 'SycaPay');
            $this->email->to($dest);
            $this->email->subject("Invitation Syca Pay");
            $this->email->message($message); //('Bonjour cher client, Pour definir votre mot de passe veuillez vous rendre à cette adresse : '.site_url('Activate/index/').'/'.$destin.' Merci pour votre confiance!  Notre équipe');                        
            $this->email->send();
            
        }

    }
?>