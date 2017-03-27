<?php
    /**
	 * 
	 */
	class Transactions extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
		
			//	Chargement des ressources pour tout le contrôleur
			//$this->load->library('session');
			$this->load->library('gcharts');
			$this->load->helper(array('url', 'assets'));
			$this->load->model('Transactions_model', 'transactionsModel');
		}
		public function index ()
		{
			$this->accueil();
		}
		
		public function accueil()
		{
			//on vérifie si une session existe 
			//$session_login = $this->session->userdata('login');
				//$min_date = 
				//$max_date = 
				$last = date("Y-m-d");
				$today = date("Y-m-d");
				//$this->donutcharts("0", "0", "0");
	 			//$this->columncharts("0", "0", "0");
	 			$query = $this->transactionsModel->select_agent(); 
	 			//$query2 = $this->transactionsModel->select_cards(); 
	 			$query3 = $this->transactionsModel->recherche("0", $last." 00:00:00", $today." 23:59:59 ", "");
	 			
	 			
	 			//var_dump($id);
	 			$date_data = array(
								   'min_date' => $last,
								   'max_date' => $today,
								   'clie' => "0",
								   'perio' => "0",
								   );								   								   
				$this->session->set_userdata($date_data);
				//$customer_id = $this->input->post('client');
				//var_dump($query3);
				$data['select'] ="0";				
				$data['list'] = $query3;	
				$data['agent'] = $query;	
				//$data['card'] = $query2;
				//$data['somme'] = $query3[0];
				//$data['total'] = $query3[1];

				$data['success'] = "vrai";
				if(count($query3) == 0){
				   $data['success'] = "faux";
				}
				 
					
					
				$this->load->view('scrashboard/transactions', $data);
			
		}

		public function periode($id = null)
		{ 
				

			if ( $id == '1')
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
			}elseif ($id == '2')
			{
				$datedeb = date('Y-m')."-01";
				$datefin = date('Y-m')."-31";
			} elseif ($id == '3') 
			{
				$datedeb = date('Y')."-01-01";
				$datefin = date('Y')."-12-31";
			} else {
				$datedeb = date("Y-m-d");
				$datefin = date("Y-m-d");
			}
				$card = $this->session->userdata('stat');
				$agent = $this->session->userdata('clie');	
				if ((!is_null($agent)) && (!is_null($card))){
				$query3 = $this->transactionsModel->recherche($agent, $datedeb." 00:00:00",$datefin." 23:59:59", "");			
				$this->donutcharts($id, $agent, $card);
	 			$this->columncharts($id, $agent, $card);
				}else{
				$query3 = $this->transactionsModel->recherche("0", $datedeb." 00:00:00",$datefin." 23:59:59", "");			
				$this->donutcharts($id, "0","0");
	 			$this->columncharts($id, "0", "0");
				}			
			    $query = $this->transactionsModel->select_agent(); 
	 			//$query2 = $this->transactionsModel->select_cards();
	 			
				
				//var_dump($id);
				$data['select'] = $id;
				$data['list'] = $query3;	
				$data['agent'] = $query;	
				//$data['card'] = $query2;

				//$data['somme'] = $query3[0];
				//$data['total'] = $query3[1];
				
			$data['success'] = "vrai";
				if(count($query3) == 0){
				   $data['success'] = "faux";
				}
			   $data_periode = array('perio' => $id, 'date_deb' => $datedeb,  'date_fin' => $datefin,);								   								   
				$this->session->set_userdata($data_periode);
		//	var_dump($this->session->userdata('perio'));
			$this->load->view('scrashboard/transactions',$data);	
			
		}
		
		public function search()
		{
			//on vérifie si une session existe 
			    $id = $this->session->userdata('perio');	
				//var_dump($id);
			
				$query = $this->transactionsModel->select_agent(); 
	 			//$query2 = $this->transactionsModel->select_cards(); 
	 			
				
				$min_date = $this->session->userdata('date_deb');
				$max_date = $this->session->userdata('date_fin');
				//var_dump($min_date);
				$agent = $this->input->post('agent');				
				//$card = $this->input->post('card');
				//$this->donutcharts($id, $agent);
	 			//$this->columncharts($id, $agent);							   								   
				$query3 = $this->transactionsModel->recherche($agent, $min_date." 00:01:00", $max_date." 23:59:00", "");	
				//$customer_id = $this->session->userdata('customer_id');
				//$query3 = $this->transactionsModel->total($customer_id, "payement", $min_date." 00:01:00", $max_date." 23:59:00",$status);
				//$query = $this->transactionsModel->recherche($customer_id, "payement", $min_date." 00:01:00", $max_date." 23:59:00",$status,"");
				
				$date_data = array(
								   'clie'  => $agent,
								    );
				$this->session->set_userdata($date_data);
          
				$data['select'] = $id;
				$data['list'] = $query3;	
				$data['agent'] = $query;	
				//$data['card'] = $query2;
				//$data['somme'] = $query3[0];
				//$data['total'] = $query3[1];

				$data['success'] = "vrai";
				if(count($query3) == 0){
				   $data['success'] = "faux";
				}
		
				
					
				$this->load->view('scrashboard/transactions', $data);
				
			
		}
         public function export_csv()
         {
           $this->load->dbutil();
           $this->load->helper('file');
		    /* get the object   */
		   $this->load->helper('download');
		  	   
		  	//$query = $this->session->userdata('resultat');
		  	$query = $this->transactionsModel->recherche($this->session->userdata('clie'), "payement", $this->session->userdata('min_date')." 00:01:00", $this->session->userdata('max_date')." 23:59:00",$this->session->userdata('stat'),"exp");
		  		
          // $query = $this->transactionsModel->print_report();
           $delimiter = ";";
           $newline = "\r\n";
          
           $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
           //var_dump($query);
           force_download('CSV_Report_transactions.csv', $data);
         }
    
      	public function export_pdf()
      	{

		     $query = $this->transactionsModel->recherche($this->session->userdata('clie'), "payement", $this->session->userdata('min_date')." 00:01:00", $this->session->userdata('max_date')." 23:59:00",$this->session->userdata('stat'),"exp");
		     $data['payment'] = $query->result();
		     //$html = $this->load->view('pdf_report', $data);
		       
					    ini_set('memory_limit','64M'); // boost the memory limit if it's low <img class="emoji" draggable="false" alt="😉" src="https://s.w.org/images/core/emoji/72x72/1f609.png">
					    $html = $this->load->view('marchands/pdf_report', $data, true); // render the view into HTML
					     
					    $this->load->library('Pdf');
					    $pdf = $this->Pdf->load();
					    $pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure <img class="emoji" draggable="false" alt="😉" src="https://s.w.org/images/core/emoji/72x72/1f609.png">
					    $pdf->WriteHTML($html); // write the HTML into the PDF
					    $pdf->Output('pdftransactions.pdf', 'I'); // save to file because we can
					
					 
		}
    



	private function donutcharts($id, $agent, $card)
		{
			
			//$total =  (int)$mtn[1]+(int)$orange[1]+(int)$moov[1]+(int)$paypal[1];
				$this->gcharts->load('PieChart');
			if ($id == '0' ) {
				
                //echo $id;
                $today = date("Y-m-d");
                $date_min1 = $today." 00:00:00 ";
                $date_max1 = $today." 23:59:59 ";
                $tranche1 = $this->transactionsModel->stat_dash($agent, $card, $date_min1, $date_max1);
                /*
                $date_min2 = $today." 10:00:00 ";
                $date_max2 = $today." 11:59:59 ";
                $tranche2 = $this->transactionsModel->stat_dash($agent, $card, $date_min2, $date_max2);
                $date_min3 = $today." 12:00:00 ";
                $date_max3 = $today." 13:59:59 ";
                $tranche3 = $this->transactionsModel->stat_dash($agent, $card, $date_min3, $date_max3);
                $date_min4 = $today." 14:00:00 ";
                $date_max4 = $today." 15:59:59 ";
                $tranche4 = $this->transactionsModel->stat_dash($agent, $card, $date_min4, $date_max4);
                $date_min5 = $today." 16:00:00 ";
                $date_max5 = $today." 17:59:59 ";
                $tranche5 = $this->transactionsModel->stat_dash($agent, $card, $date_min5, $date_max5);*/
				$date = date("Y-m-d");
				$heure = date("H:i:s");
				$encours = $date." ".$heure." ";
				
				//if (($encours >= $date_min1) && ($encours <= $date_max1)) {
				$slicesn1 = intval($tranche1[0] - $tranche1[2]);
				$slicesn2 = intval($tranche1[2]);
				$this->gcharts->DataTable('Foods')
					->addColumn('string', 'Foods', 'food')
					->addColumn('string', 'Amount', 'amount')
					->addRow(array('Cartes', $slicesn1))
					->addRow(array('commission', $slicesn2));
				//}
				
				
				}elseif($id == '1'){
					 //echo $id;
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

				$jour = $this->transactionsModel->stat_dash($agent, $card, $datedeb." 00:00:00", $datefin." 23:59:59");
						
					$slicesn1 = intval($jour[0] - $jour[2]);
					$slicesn2 = intval($jour[2]);
					$this->gcharts->DataTable('Foods')
					->addColumn('string', 'Foods', 'food')
					->addColumn('string', 'Amount', 'amount')
					->addRow(array('Cartes', $slicesn1))
					->addRow(array('commission', $slicesn2));
				
				
				}elseif ($id =='2'){
					 //echo $id;
				$datedeb = date('Y-m')."-01";
				$datefin = date('Y-m')."-31";
				$jour = $this->transactionsModel->stat_dash($agent, $card, $datedeb." 00:00:00", $datefin." 23:59:59");		 
				$slicesn1 = intval($jour[0] - $jour[2]);
				$slicesn2 = intval($jour[2]);
				$this->gcharts->DataTable('Foods')
					->addColumn('string', 'Foods', 'food')
					->addColumn('string', 'Amount', 'amount')
					->addRow(array('Cartes', $slicesn1))
					->addRow(array('commission', $slicesn2));
				}elseif ($id =='3'){
					//echo $id;
				$datedeb = date('Y')."-01-01";
				$datefin = date('Y')."-12-31";
				$jour = $this->transactionsModel->stat_dash($agent, $card, $datedeb." 00:00:00", $datefin." 23:59:59");
				
					$slicesn1 = intval($jour[0] - $jour[2]);
					$slicesn2 = intval($jour[2]);
					$this->gcharts->DataTable('Foods')
					->addColumn('string', 'Foods', 'food')
					->addColumn('string', 'Amount', 'amount')
					->addRow(array('Cartes', $slicesn1))
					->addRow(array('commission', $slicesn2));
				
				}

				
									

			$config = array(
			    'is3D' => TRUE
			);

			$this->gcharts->PieChart('Foods')->setConfig($config);
		}

		private function columncharts($id, $agent, $card)
		{
			if ($id=='0') {
				
                //$card = $this->session->userdata('stat');
                //$agent = $this->session->userdata('clie');
                //var_dump($agent);
                $today = date("Y-m-d");
                $date_min1 = $today." 08:00:00 ";
                $date_max1 = $today." 09:59:59 ";
                $tranche1 = $this->transactionsModel->stat_dash($agent, $card, $date_min1, $date_max1);
                $date_min2 = $today." 10:00:00 ";
                $date_max2 = $today." 11:59:59 ";
                $tranche2 = $this->transactionsModel->stat_dash($agent, $card, $date_min2, $date_max2);
                $date_min3 = $today." 12:00:00 ";
                $date_max3 = $today." 13:59:59 ";
                $tranche3 = $this->transactionsModel->stat_dash($agent, $card, $date_min3, $date_max3);
                $date_min4 = $today." 14:00:00 ";
                $date_max4 = $today." 15:59:59 ";
                $tranche4 = $this->transactionsModel->stat_dash($agent, $card, $date_min4, $date_max4);
                $date_min5 = $today." 16:00:00 ";
                $date_max5 = $today." 17:59:59 ";
                $tranche5 = $this->transactionsModel->stat_dash($agent, $card, $date_min5, $date_max5);
                $date_min6 = $today." 18:00:00 ";
                $date_max6 = $today." 19:59:59 ";
                $tranche6 = $this->transactionsModel->stat_dash($agent, $card, $date_min6, $date_max6);
                $date_min7 = $today." 20:00:00 ";
                $date_max7 = $today." 21:59:59 ";
                $tranche7 = $this->transactionsModel->stat_dash($agent, $card, $date_min7, $date_max7);
				
				//echo $card;
				//echo $agent;

				$slice1 = $tranche1[1];
				$slice2 = $tranche2[1];
				$slice3 = $tranche3[1];
				$slice4 = $tranche4[1];
				$slice5 = $tranche5[1];
				$slice6 = $tranche6[1];
				$slice7 = $tranche7[1];

				//var_dump($date_min5);
				//$slice6 = 1;
				$this->gcharts->load('ColumnChart');
				$this->gcharts->DataTable('Repartition')
							  ->addColumn('string', 'Classroom', 'class')
							  ->addColumn('number', '08h-10h', 'orange')
							  ->addColumn('number', '10h-12h', 'mtn')
							  ->addColumn('number', '12h-14h', 'moov')
							  ->addColumn('number', '14h-16h', 'cash')
							  ->addColumn('number', '16h-18h', 'uba')
							  ->addColumn('number', '18h-20h', 'tranche6')
							  ->addColumn('number', '20h-22hh', 'tranche7')
							  ->addRow(array(
								  'Nombre de transactions par tranche horaire',
								  $slice1,
								  $slice2,
								  $slice3,
								  $slice4,
								  $slice5,
								  $slice6,
								  $slice7
							  ));
			}elseif($id=='1'){
				
				//$card = $this->session->userdata('stat');
                //$agent = $this->session->userdata('clie');
                //var_dump($agent);
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

				$dabu1 = $datedeb;
				$dafin1 = $datefin;
				$jour1 = $this->transactionsModel->stat_dash($agent, $card, $dabu1." 00:00:00", $dabu1." 23:59:59");
				
				$dabu2 = date('Y-m-d', strtotime($datedeb. "+1 days"));
				$dafin2 = $datefin;
				$jour2 = $this->transactionsModel->stat_dash($agent, $card, $dabu2." 00:00:00", $dabu2." 23:59:59");
				
				$dabu3 = date('Y-m-d', strtotime($datedeb. "+2 days"));
				$dafin3 = $datefin;
				$jour3 = $this->transactionsModel->stat_dash($agent, $card, $dabu3." 00:00:00", $dabu3." 23:59:59");
				
				$dabu4 = date('Y-m-d', strtotime($datedeb. "+3 days"));
				$dafin4 = $datefin;
				$jour4 = $this->transactionsModel->stat_dash($agent, $card, $dabu4." 00:00:00", $dabu4." 23:59:59");
				
				$dabu5 = date('Y-m-d', strtotime($datedeb. "+4 days"));
				$dafin5 = $datefin;
				$jour5 = $this->transactionsModel->stat_dash($agent, $card, $dabu5." 00:00:00", $dabu5." 23:59:59");
				
				$dabu6 = date('Y-m-d', strtotime($datedeb. "+5 days"));
				$dafin6 = $datefin;
				$jour6 = $this->transactionsModel->stat_dash($agent, $card, $dabu6." 00:00:00", $dabu6." 23:59:59");
				
				$dabu7 = date('Y-m-d', strtotime($datedeb. "+6 days"));
				$dafin7 = $datefin;
				$jour7 = $this->transactionsModel->stat_dash($agent, $card, $datefin." 00:00:00", $datefin." 23:59:59");
				//var_dump($dabu1);
				
				//echo $card;
				//echo $agent;


				$slice1 = $jour1[1];
				$slice2 = $jour2[1];
				$slice3 = $jour3[1];
				$slice4 = $jour4[1];
				$slice5 = $jour5[1];
				$slice6 = $jour6[1];
				$slice7 = $jour7[1];
				

				$this->gcharts->load('ColumnChart');
				$this->gcharts->DataTable('Repartition')
							  ->addColumn('string', 'Classroom', 'class')
							  ->addColumn('number', 'Lundi', 'paypal')
							  ->addColumn('number', 'Mardi', 'orange')
							  ->addColumn('number', 'Mercredi', 'mtn')
							  ->addColumn('number', 'Jeudi', 'moov')
							  ->addColumn('number', 'Vendredi', 'cash')
							  ->addColumn('number', 'Samedi', 'uba')
							  ->addColumn('number', 'Dimanche', 'dimanche')
							  ->addRow(array(
								  'Nombre de transactions par jour',
								  $slice1,
								  $slice2,
								  $slice3,
								  $slice4,
								  $slice5,
								  $slice6,
								  $slice7,
							  ));
			}elseif($id=='2'){
				
				$datedeb = date('Y-m')."-01";
				$datefin = date('Y-m')."-31";
				$datedeb1 = $datedeb;
			
				$jour1 = $this->transactionsModel->stat_dash($agent, $card, $datedeb1." 00:00:00", $datedeb1." 23:59:59");

				$datedeb2 = date('Y-m-d', strtotime($datedeb. "+1 days"));
				$jour2 = $this->transactionsModel->stat_dash($agent, $card, $datedeb2." 00:00:00", $datedeb2." 23:59:59");

				$datedeb3 = date('Y-m-d', strtotime($datedeb. "+2 days"));
				$jour3 = $this->transactionsModel->stat_dash($agent, $card, $datedeb3." 00:00:00", $datedeb3." 23:59:59");
				
				$datedeb4 = date('Y-m-d', strtotime($datedeb. "+3 days"));
				$jour4 = $this->transactionsModel->stat_dash($agent, $card, $datedeb4." 00:00:00", $datedeb4." 23:59:59");

				$datedeb5 = date('Y-m-d', strtotime($datedeb. "+4 days"));
				$jour5 = $this->transactionsModel->stat_dash($agent, $card, $datedeb5." 00:00:00", $datedeb5." 23:59:59");

				$datedeb6 = date('Y-m-d', strtotime($datedeb. "+5 days"));
				$jour6 = $this->transactionsModel->stat_dash($agent, $card, $datedeb6." 00:00:00", $datedeb6." 23:59:59");
				
				$datedeb7 = date('Y-m-d', strtotime($datedeb. "+6 days"));
				$jour7 = $this->transactionsModel->stat_dash($agent, $card, $datedeb7." 00:00:00", $datedeb7." 23:59:59");
				
				$datedeb8 = date('Y-m-d', strtotime($datedeb. "+7 days"));
				$jour8 = $this->transactionsModel->stat_dash($agent, $card, $datedeb8." 00:00:00", $datedeb8." 23:59:59");

				$datedeb9 = date('Y-m-d', strtotime($datedeb. "+8 days"));
				$jour9 = $this->transactionsModel->stat_dash($agent, $card, $datedeb9." 00:00:00", $datedeb9." 23:59:59");

				$datedeb10 = date('Y-m-d', strtotime($datedeb. "+9 days"));
				$jour10 = $this->transactionsModel->stat_dash($agent, $card, $datedeb10." 00:00:00", $datedeb10." 23:59:59");

				$datedeb11 = date('Y-m-d', strtotime($datedeb. "+10 days"));
				$jour11 = $this->transactionsModel->stat_dash($agent, $card, $datedeb11." 00:00:00", $datedeb11." 23:59:59");

				$datedeb12 = date('Y-m-d', strtotime($datedeb. "+11 days"));
				$jour12 = $this->transactionsModel->stat_dash($agent, $card, $datedeb12." 00:00:00", $datedeb12." 23:59:59");

				$datedeb13 = date('Y-m-d', strtotime($datedeb. "+12 days"));
				$jour13 = $this->transactionsModel->stat_dash($agent, $card, $datedeb13." 00:00:00", $datedeb13." 23:59:59");

				$datedeb14 = date('Y-m-d', strtotime($datedeb. "+13 days"));
				$jour14 = $this->transactionsModel->stat_dash($agent, $card, $datedeb14." 00:00:00", $datedeb14." 23:59:59");

				$datedeb15 = date('Y-m-d', strtotime($datedeb. "+14 days"));
				$jour15 = $this->transactionsModel->stat_dash($agent, $card, $datedeb15." 00:00:00", $datedeb15." 23:59:59");

				$datedeb16 = date('Y-m-d', strtotime($datedeb. "+15 days"));
				$jour16 = $this->transactionsModel->stat_dash($agent, $card, $datedeb16." 00:00:00", $datedeb16." 23:59:59");

				$datedeb17 = date('Y-m-d', strtotime($datedeb. "+16 days"));
				$jour17 = $this->transactionsModel->stat_dash($agent, $card, $datedeb17." 00:00:00", $datedeb17." 23:59:59");

				$datedeb18 = date('Y-m-d', strtotime($datedeb. "+17 days"));
				$jour18 = $this->transactionsModel->stat_dash($agent, $card, $datedeb18." 00:00:00", $datedeb18." 23:59:59");

				$datedeb19 = date('Y-m-d', strtotime($datedeb. "+18 days"));
				$jour19 = $this->transactionsModel->stat_dash($agent, $card, $datedeb19." 00:00:00", $datedeb19." 23:59:59");

				$datedeb20 = date('Y-m-d', strtotime($datedeb. "+19 days"));
				$jour20 = $this->transactionsModel->stat_dash($agent, $card, $datedeb20." 00:00:00", $datedeb20." 23:59:59");

				$datedeb21= date('Y-m-d', strtotime($datedeb. "+20 days"));
				$jour21 = $this->transactionsModel->stat_dash($agent, $card, $datedeb21." 00:00:00", $datedeb21." 23:59:59");

				$datedeb22 = date('Y-m-d', strtotime($datedeb. "+21 days"));
				$jour22 = $this->transactionsModel->stat_dash($agent, $card, $datedeb22." 00:00:00", $datedeb22." 23:59:59");

				$datedeb23 = date('Y-m-d', strtotime($datedeb. "+22 days"));
				$jour23 = $this->transactionsModel->stat_dash($agent, $card, $datedeb23." 00:00:00", $datedeb23." 23:59:59");

				$datedeb24 = date('Y-m-d', strtotime($datedeb. "+23 days"));
				$jour24 = $this->transactionsModel->stat_dash($agent, $card, $datedeb24." 00:00:00", $datedeb24." 23:59:59");

				$datedeb25 = date('Y-m-d', strtotime($datedeb. "+24 days"));
				$jour25 = $this->transactionsModel->stat_dash($agent, $card, $datedeb25." 00:00:00", $datedeb25." 23:59:59");

				$datedeb26 = date('Y-m-d', strtotime($datedeb. "+25 days"));
				$jour26 = $this->transactionsModel->stat_dash($agent, $card, $datedeb26." 00:00:00", $datedeb26." 23:59:59");

				$datedeb27 = date('Y-m-d', strtotime($datedeb. "+26 days"));
				$jour27 = $this->transactionsModel->stat_dash($agent, $card, $datedeb27." 00:00:00", $datedeb27." 23:59:59");

				$datedeb28 = date('Y-m-d', strtotime($datedeb. "+27 days"));
				$jour28 = $this->transactionsModel->stat_dash($agent, $card, $datedeb28." 00:00:00", $datedeb28." 23:59:59");

				$datedeb29 = date('Y-m-d', strtotime($datedeb. "+28 days"));
				$jour29 = $this->transactionsModel->stat_dash($agent, $card, $datedeb29." 00:00:00", $datedeb29." 23:59:59");

				$datedeb30 = date('Y-m-d', strtotime($datedeb. "+29 days"));
				$jour30 = $this->transactionsModel->stat_dash($agent, $card, $datedeb30." 00:00:00", $datedeb30." 23:59:59");
				
				$datedeb31 = date('Y-m-d', strtotime($datedeb. "+30 days"));
				$jour31 = $this->transactionsModel->stat_dash($agent, $card, $datedeb31." 00:00:00", $datedeb31." 23:59:59");

		

		
				//echo $card;
				//echo $agent;

				//var_dump($day);
				

				$slice1 = $jour1[1];
				$slice2 = $jour2[1];
				$slice3 = $jour3[1];
				$slice4 = $jour4[1];
				$slice5 = $jour5[1];
				$slice6 = $jour6[1];
				$slice7 = $jour7[1];
				$slice8 = $jour8[1];
				$slice9 = $jour9[1];
				$slice10 = $jour10[1];
				$slice11 = $jour11[1];
				$slice12 = $jour12[1];
				$slice13 = $jour13[1];
				$slice14 = $jour14[1];
				$slice15 = $jour15[1];
				$slice16 = $jour16[1];
				$slice17 = $jour17[1];
				$slice18 = $jour18[1];
				$slice19 = $jour19[1];
				$slice20 = $jour20[1];
				$slice21 = $jour21[1];
				$slice22 = $jour22[1];
				$slice23 = $jour23[1];
				$slice24 = $jour24[1];
				$slice25 = $jour25[1];
				$slice26 = $jour26[1];
				$slice27 = $jour27[1];
				$slice28 = $jour28[1];
				$slice29 = $jour29[1];
				$slice30 = $jour30[1];
				$slice31 = $jour31[1];
				
				$this->gcharts->load('ColumnChart');
				$this->gcharts->DataTable('Repartition')
							  ->addColumn('string', 'Classroom', 'class')
							  ->addColumn('number', 'Jour1', 'paypal')
							  ->addColumn('number', 'Jour2', 'orange')
							  ->addColumn('number', 'Jour3', 'mtn')
							  ->addColumn('number', 'Jour4', 'moov')
							  ->addColumn('number', 'Jour5', 'jour5')
							  ->addColumn('number', 'Jour6', 'jour6')
							  ->addColumn('number', 'Jour7', 'jour7')
							  ->addColumn('number', 'Jour8', 'jour8')
							  ->addColumn('number', 'Jour9', 'jour9')
							  ->addColumn('number', 'Jour10', 'jour10')
							  ->addColumn('number', 'Jour11', 'jour11')
							  ->addColumn('number', 'Jour12', 'jour12')
							  ->addColumn('number', 'Jour13', 'jour13')
							  ->addColumn('number', 'Jour14', 'jour14')
							  ->addColumn('number', 'Jour15', 'jour15')
							  ->addColumn('number', 'Jour16', 'jour16')
							  ->addColumn('number', 'Jour17', 'jour17')
							  ->addColumn('number', 'Jour18', 'jour18')
							  ->addColumn('number', 'Jour19', 'jour19')
							  ->addColumn('number', 'Jour20', 'jour20')
							  ->addColumn('number', 'Jour21', 'jour21')
							  ->addColumn('number', 'Jour22', 'jour22')
							  ->addColumn('number', 'Jour23', 'jour23')
							  ->addColumn('number', 'Jour24', 'jour24')
							  ->addColumn('number', 'Jour25', 'jour25')
							  ->addColumn('number', 'Jour26', 'jour26')
							  ->addColumn('number', 'Jour27', 'jour27')
							  ->addColumn('number', 'Jour28', 'jour28')
							  ->addColumn('number', 'Jour29', 'jour29')
							  ->addColumn('number', 'Jour30', 'jour30')
							  ->addColumn('number', 'Jour31', 'jour31')
							  ->addRow(array(
								  'Nombre de transactions par Jour',
								  $slice1,
								  $slice2,
								  $slice3,
								  $slice4,
								  $slice5,
								  $slice6,
								  $slice7,
								  $slice8,
								  $slice9,
								  $slice10,
								  $slice11,
								  $slice12,
								  $slice13,
								  $slice14,
								  $slice15,
								  $slice16,
								  $slice17,
								  $slice18,
								  $slice19,
								  $slice20,
								  $slice21,
								  $slice22,
								  $slice23,
								  $slice24,
								  $slice25,
								  $slice26,
								  $slice27,
								  $slice28,
								  $slice29,
								  $slice30,
								  $slice31
								  ));
			}elseif($id=='3'){
				
				$datedeb = date('Y')."-01-01";
				$datefin = date('Y')."-12-31";
				$daf1 = date('Y')."-01-31"; 
				$jour1 = $this->transactionsModel->stat_dash($agent, $card, $datedeb." 00:00:00", $daf1." 23:59:59");
				$dab2 = date('Y-m-d', strtotime($datedeb. "+1 month"));
				$daf2 = date('Y')."-02-28";
				$jour2 = $this->transactionsModel->stat_dash($agent, $card, $dab2." 00:00:00", $daf2." 23:59:59");

				$dab3 = date('Y-m-d', strtotime($datedeb. "+2 month"));
				$daf3 = date('Y')."-03-31";
				$jour3 = $this->transactionsModel->stat_dash($agent, $card, $dab3." 00:00:00", $daf3." 23:59:59");
				
				$dab4 = date('Y-m-d', strtotime($datedeb. "+3 month"));
				$daf4 = date('Y')."-04-30";
				$jour4 = $this->transactionsModel->stat_dash($agent, $card, $dab4." 00:00:00", $daf4." 23:59:59");

				$dab5 = date('Y-m-d', strtotime($datedeb. "+4 month"));
				$daf5 = date('Y')."-05-31";
				$jour5 = $this->transactionsModel->stat_dash($agent, $card, $dab5." 00:00:00", $daf5." 23:59:59");
				
				$dab6 = date('Y-m-d', strtotime($datedeb. "+5 month"));
				$daf6 = date('Y')."-06-30";
				$jour6 = $this->transactionsModel->stat_dash($agent, $card, $dab6." 00:00:00", $daf6." 23:59:59");

				$dab7 = date('Y-m-d', strtotime($datedeb. "+6 month"));
				$daf7 = date('Y')."-07-31";
				$jour7 = $this->transactionsModel->stat_dash($agent, $card, $dab7." 00:00:00", $daf7." 23:59:59");

				$dab8 = date('Y-m-d', strtotime($datedeb. "+7 month"));
				$daf8 = date('Y')."-08-31";
				$jour8 = $this->transactionsModel->stat_dash($agent, $card, $dab8." 00:00:00", $daf8." 23:59:59");
				
				$dab9 = date('Y-m-d', strtotime($datedeb. "+8 month"));
				$daf9 = date('Y')."-09-30";
				$jour9 = $this->transactionsModel->stat_dash($agent, $card, $dab9." 00:00:00", $daf9." 23:59:59");

				$dab10 = date('Y-m-d', strtotime($datedeb. "+9 month"));
				$daf10 = date('Y')."-10-31";
				$jour10 = $this->transactionsModel->stat_dash($agent, $card, $dab10." 00:00:00", $daf10." 23:59:59");

				$dab11 = date('Y-m-d', strtotime($datedeb. "+10 month"));
				$daf11 = date('Y')."-11-30";
				$jour11 = $this->transactionsModel->stat_dash($agent, $card, $dab11." 00:00:00", $daf11." 23:59:59");

				$dab12 = date('Y-m-d', strtotime($datedeb. "+11 month"));
				$daf12 = date('Y')."-12-31";
				$jour12 = $this->transactionsModel->stat_dash($agent, $card, $dab12." 00:00:00", $daf12." 23:59:59");

		     	//var_dump($day);
				//echo $agent;
				//echo $card;

				$slice1 = $jour1[1];
				$slice2 = $jour2[1];
				$slice3 = $jour3[1];
				$slice4 = $jour4[1];
				$slice5 = $jour5[1];
				$slice6 = $jour6[1];
				$slice7 = $jour7[1];
				$slice8 = $jour8[1];
				$slice9 = $jour9[1];
				$slice10 = $jour10[1];
				$slice11 = $jour11[1];
				$slice12 = $jour12[1];
				$this->gcharts->load('ColumnChart');
				$this->gcharts->DataTable('Repartition')
							  ->addColumn('string', 'Classroom', 'class')
							  ->addColumn('number', 'Janvier', 'paypal')
							  ->addColumn('number', 'Fevrier', 'orange')
							  ->addColumn('number', 'Mars', 'mtn')
							  ->addColumn('number', 'Avril', 'moov')
							  ->addColumn('number', 'Mai', 'cash')
							  ->addColumn('number', 'Juin', 'uba')
							  ->addColumn('number', 'Juillet', 'juillet')
							  ->addColumn('number', 'Août', 'aout')
							  ->addColumn('number', 'Septembre', 'septembre')
							  ->addColumn('number', 'Octobre', 'octobre')
							  ->addColumn('number', 'Novembre', 'novembre')
							  ->addColumn('number', 'Decmebre', 'decembre')
							  ->addRow(array(
								  'Nombre de transactions par mois',
								  $slice1,
								  $slice2,
								  $slice3,
								  $slice4,
								  $slice5,
								  $slice6,
								  $slice7,
								  $slice8,
								  $slice9,
								  $slice10,
								  $slice11,
								  $slice12
							  ));
			}
				
			

			
			$config = array(
			    'title' => 'Nombre de transactions'
			);
			
			$this->gcharts->ColumnChart('Repartition')->setConfig($config);
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
			$this->email->from('contact@sycapay.com', 'Illicash');
			$this->email->to($dest);
			$this->email->subject("Invitation Syca Pay");
			$this->email->message($message); //('Bonjour cher client, Pour definir votre mot de passe veuillez vous rendre à cette adresse : '.site_url('Activate/index/').'/'.$destin.' Merci pour votre confiance!  Notre équipe');                        
			$this->email->send();
			
		}

	}
?>