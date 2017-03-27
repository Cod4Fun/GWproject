<?php
    
     /**
	 * 
	 */
	class Transactions_model extends CI_Model { 
		
		public function __construct()
	    {
	        parent::__construct();
	    }
			
		protected $table_transaction = "transactions";
        protected $table_cards = "cards";
        protected $table_agents ="user";

		/*
		*
		* Selectionnner tous les clients
		*
		*/
		public function select_agent()
		{
			$query = $this->db->select('id_user, nom, type')
			        ->from($this->table_agents)
			        ->where('type', "AGENT")
					->get();
			        return $query->result();

		}

		public function select_cards()
		{
			$query = $this->db->select('card_type, id_cards')
			        ->from($this->table_cards)
			        ->group_by('card_type')
			        ->get();
			        return $query->result();

		}
		
		/*
		 * 
		 * Recherche des transactions
		 * 
		 */

		


		 public function recherche($agent, $date_min, $date_max, $exp)
		 {


           if($agent != "0")
		       {
		       	  
			                   $query =  $this->db->select('transaction_id, user_id, type_carte, T.commission, T.date_transaction, T.etat, U.nom, U.numero')
			  					->from('transactions T')
			  					->join('user U', 'U.id_user = T.user_id')
			  					->where('T.date_transaction >=', $date_min)
			  					->where('T.date_transaction <=', $date_max)
			  					//->where('T.type_carte', $card)
							    ->where('T.user_id', $agent)
							    ->where('U.id_pays', $this->session->userdata('country'))
							    ->get();
			       
                 }
			 else{
                              $query =  $this->db->select('transaction_id, user_id, type_carte, T.commission, T.date_transaction, T.etat, U.nom, U.numero')
			  					->from('transactions T')
			  					->join('user U', 'U.id_user = T.user_id')
			  					->where('T.date_transaction >=', $date_min)
			  					->where('T.date_transaction <=', $date_max)
			  					//->where('T.type_carte', $card)
			  					->where('U.id_pays', $this->session->userdata('country'))
							    ->get();
			       

			       }
			 if ($exp == "")
			 {
				 return $query->result();
			 }
			 else {
				 return $query;
			 }
		 }

		 public function recherche_stat($agent, $card, $date_min, $date_max, $exp)
		 {


           if($agent != "0")
		       {
		       	  if($card !="0")
		       	  {
			                   $query =  $this->db->select('transaction_id, user_id, type_carte, T.commission, T.date_transaction, T.etat, U.nom, U.numero')
			  					->from('transactions T')
			  					->join('user U', 'U.id_user = T.user_id')
			  					->where('T.date_transaction >=', $date_min)
			  					->where('T.date_transaction <=', $date_max)
			  					->where('T.type_carte', $card)
							    ->where('T.user_id',$agent)
							    ->where('U.id_pays', $this->session->userdata('country'))
							    ->get();
			        } else {
                               $query =  $this->db->select('transaction_id, user_id, type_carte, T.commission, T.date_transaction, T.etat, U.nom, U.numero')
			  					->from('transactions T')
			  					->join('user U', 'U.id_user = T.user_id')
			  					->where('T.date_transaction >=', $date_min)
			  					->where('T.date_transaction <=', $date_max)
			  					->where('T.user_id',$agent)
			  					->where('U.id_pays', $this->session->userdata('country'))
							    ->get();

			               } 
                 }
			    elseif($card !="0") {
                              $query =  $this->db->select('transaction_id, user_id, type_carte, T.commission, T.date_transaction, T.etat, U.nom, U.numero')
			  					->from('transactions T')
			  					->join('user U', 'U.id_user = T.user_id')
			  					->where('T.date_transaction >=', $date_min)
			  					->where('T.date_transaction <=', $date_max)
			  					->where('T.type_carte', $card)
			  					->where('U.id_pays', $this->session->userdata('country'))
							    ->get();
			       

			       }else{

                         $query =  $this->db->select('transaction_id, user_id, type_carte, T.commission, T.date_transaction, T.etat, U.nom, U.numero')
			  					->from('transactions T')
			  					->join('user U', 'U.id_user = T.user_id')
			  					->where('T.date_transaction >=', $date_min)
			  					->where('T.date_transaction <=', $date_max)
			  					->where('U.id_pays', $this->session->userdata('country'))
			  					->get();



			       }
			 if ($exp == "")
			 {
				 return $query->result();
			 }
			 else {
				 return $query;
			 }
		 }

		  /* Recherche des transactions
		 * 
		 */
			public function stat_dash ($agent, $date_min, $date_max)
		  {
		  	if ($agent !="0") {

		  		
		  			$query = $this->db->select('SUM(T.type_carte) as montant, SUM(T.commission) as commution, COUNT(T.transaction_id) as total, T.date_transaction as date')
			  					->from('transactions T')
			  					->join('user U', 'U.id_user = T.user_id')
			  					->where('T.date_transaction >=', $date_min)
			  					->where('T.date_transaction <=', $date_max)
			  					//->where('T.type_carte', $carte)
							    ->where('T.user_id',$agent)
							    ->where('U.id_pays', $this->session->userdata('country'))
							    ->get();
		  		
		  	}else{
		  			$query = $this->db->select('SUM(T.type_carte) as montant, SUM(T.commission) as commution, COUNT(T.transaction_id) as total, T.date_transaction as date')
			  					->from('transactions T')
			  					->join('user U', 'U.id_user = T.user_id')
			  					->where('T.date_transaction >=', $date_min)
			  					->where('T.date_transaction <=', $date_max)
			  					->where('U.id_pays', $this->session->userdata('country'))
			  					->get();

		  	}
		  		  	
			if (!is_null($query)) {
				
				foreach ($query->result() as $row){
			 	    $top[1] = $row->total;

				 if( $top[1] == 0)
				 {
				 	$top[0] = 0;
				 	$top[2] = 0;
				 	$top[3] = 0;
				 }
				 else {
					 $top[0] = $row->montant;
					 $top[2] = $row->commution;
					 $top[3] = $row->date;
					 
				 }            
			 }
			 
			  return $top;
			}else{
			 		$top[0] = $top[1] = $top[2] = $top[3] = 0;
			 		 
					return $top;
		     }
	   }




		/*
		 * 
		 *Nombre de client en fonction de la période spécifié 
		 * 
		 * 
		 */
		 public function client($transaction, $mindate, $maxdate)
		 {
		 	$query = $this->db->select('COUNT( DISTINCT T.transaction_Sender_Mobile) as total')
			  					->from('transactions T')
			  					->join('customers C', 'C.customer_id = T.transaction_marchand_id')
								->where('C.customer_country_code', $this->session->userdata('country'))
							    ->where('transaction_type', $transaction)
							    ->where('transaction_date >=', $mindate)
							    ->where('transaction_date <=', $maxdate)
							    ->get();
			foreach ($query->result() as $row){
			 	$top[0] = $row->total;				             
			 }
			  return $top;
		 }

		 
		 /*
		  * 
		  * Somme et nombre de transaction
		  * 
		  */
		  public function total ($customer_id, $transaction, $mindate, $maxdate, $status)
		  {
		  	if($status != "0")
		       {
		       	  if($customer_id !="0")
		       	  {
			                   $query = $this->db->select('SUM(T.transaction_amount) as montant, COUNT(T.transaction_marchand_id) as total')
			  					->from('transactions T')
								->join('customers C', 'C.customer_id = T.transaction_marchand_id')
								->where('C.customer_country_code', $this->session->userdata('country'))
								->where('T.transaction_marchand_id', $customer_id)
							    ->where('T.transaction_type', $transaction)
							    ->where('T.transaction_date >=', $mindate)
							    ->where('T.transaction_date <=', $maxdate)
								->where('T.transaction_status',$status)
							    ->get();
			        } else {
                               $query = $this->db->select('SUM(T.transaction_amount) as montant, COUNT(T.transaction_marchand_id) as total')
			  					->from('transactions T')
								->join('customers C', 'C.customer_id = T.transaction_marchand_id')
								->where('C.customer_country_code', $this->session->userdata('country'))
								->where('T.transaction_type', $transaction)
							    ->where('T.transaction_date >=', $mindate)
							    ->where('T.transaction_date <=', $maxdate)
								->where('T.transaction_status',$status)
							    ->get();

			               } 
                 }
			    elseif($customer_id !="0") {
                              $query = $this->db->select('SUM(T.transaction_amount) as montant, COUNT(T.transaction_marchand_id) as total')
			  					->from('transactions T')
								->join('customers C', 'C.customer_id = T.transaction_marchand_id')
								->where('C.customer_country_code', $this->session->userdata('country'))
								->where('T.transaction_marchand_id', $customer_id)
							    ->where('T.transaction_type', $transaction)
							    ->where('T.transaction_date >=', $mindate)
							    ->where('T.transaction_date <=', $maxdate)
								->get();
			       

			       }else{

                         $query = $this->db->select('SUM(T.transaction_amount) as montant, COUNT(T.transaction_marchand_id) as total')
			  					->from('transactions T')
								->join('customers C', 'C.customer_id = T.transaction_marchand_id')
								->where('C.customer_country_code', $this->session->userdata('country'))
								->where('T.transaction_type', $transaction)
							    ->where('T.transaction_date >=', $mindate)
							    ->where('T.transaction_date <=', $maxdate)
								->get();



			       }

			     
			
			if ($query != null) {
				
			
			 foreach ($query->result() as $row){
			 	$top[1] = $row->total;
			 	
				 if( $top[1] == 0)
				 {
				 	$top[0] = 0;
				 }
				 else {
					 $top[0] = $row->montant;
				 }
				            
			 }
			  return $top;
		  }
		  }


/****
total recherche
*/
public function total1 ($transaction, $mindate, $maxdate, $status)
		  {
		  	if($status != "0")
			{
			  $query = $this->db->select('SUM(transaction_amount) as montant, COUNT(transaction_marchand_id) as total')
			  					->from($this->table_transaction)
								//->where('transaction_marchand_id', $customer_id)
							    ->where('transaction_type', $transaction)
							    ->where('transaction_date >=', $mindate)
							    ->where('transaction_date <=', $maxdate)
								->where('transaction_status',$status)
							    ->get();
			}
			else {
				$query = $this->db->select('SUM(transaction_amount) as montant, COUNT(transaction_marchand_id) as total')
			  					->from($this->table_transaction)
								//->where('transaction_marchand_id', $customer_id)
							    ->where('transaction_type', $transaction)
							    ->where('transaction_date >=', $mindate)
							    ->where('transaction_date <=', $maxdate)
							    ->get();
			}
			if ($query != null) {
				
			}
			 foreach ($query->result() as $row){
			 	$top[1] = $row->total;
				 if( $top[1] == 0)
				 {
				 	$top[0] = 0;
				 }
				 else {
					 $top[0] = $row->montant;
				 }            
			 }
			  return $top;
		  }

		 /*
		  * 
		  * Repartition et part de chaque opérateur
		  * 
		  */
			public function point_cash ($transaction, $mindate, $maxdate)
			{
				$query = $this->db->select('SUM(T.transaction_amount) as montant, COUNT(T.transaction_id) as total')
			  					->from('transactions T')
			  					->join('customers C', 'C.customer_id = T.transaction_marchand_id')
								->where('C.customer_country_code', $this->session->userdata('country'))
							    ->where('T.transaction_type', $transaction)
								->where('T.transaction_method', 'CashCI')
							    ->where('T.transaction_date >=', $mindate)
							    ->where('T.transaction_date <=', $maxdate)
								->where('T.transaction_status','2')
							    ->get();
				/* var_dump($query);
				 echo $mindate;
				 echo $maxdate;*/
				if (!is_null($query)) {
					foreach ($query->result() as $row){
						$top[1] = $row->total;
						if( $top[1] == 0)
						{
							$top[0] = 0;
						}
						else {
							$top[0] = $row->montant;
						}
					}
					return $top;
				} else {
					$top[0] = $top[1] = 0;
					return $top;
				}
			}
		public function point_uba ($transaction, $mindate, $maxdate)
		{
			$query = $this->db->select('SUM(T.transaction_amount) as montant, COUNT(T.transaction_id) as total')
			  					->from('transactions T')
			  					->join('customers C', 'C.customer_id = T.transaction_marchand_id')
								->where('C.customer_country_code', $this->session->userdata('country'))
							    ->where('T.transaction_type', $transaction)
								->where('T.transaction_method', 'UbillsCI')
							    ->where('T.transaction_date >=', $mindate)
							    ->where('T.transaction_date <=', $maxdate)
								->where('T.transaction_status','2')
							    ->get();
			/* var_dump($query);
             echo $mindate;
             echo $maxdate;*/
			if (!is_null($query)) {
				foreach ($query->result() as $row){
					$top[1] = $row->total;
					if( $top[1] == 0)
					{
						$top[0] = 0;
					}
					else {
						$top[0] = $row->montant;
					}
				}
				return $top;
			} else {
				$top[0] = $top[1] = 0;
				return $top;
			}
		}

		  public function point_mtn ($transaction, $mindate, $maxdate)
		  {
			  $query = $this->db->select('SUM(T.transaction_amount) as montant, COUNT(T.transaction_id) as total')
			  					->from('transactions T')
			  					->join('customers C', 'C.customer_id = T.transaction_marchand_id')
								->where('C.customer_country_code', $this->session->userdata('country'))
							    ->where('T.transaction_type', $transaction)
								->where('T.transaction_method', 'MtnCI')
							    ->where('T.transaction_date >=', $mindate)
							    ->where('T.transaction_date <=', $maxdate)
								->where('T.transaction_status','2')
							    ->get();
			/* var_dump($query);
			 echo $mindate;
			 echo $maxdate;*/
			  if (!is_null($query)) {
				 foreach ($query->result() as $row){
				 	$top[1] = $row->total;
					 if( $top[1] == 0)
					 {
					 	$top[0] = 0;
					 }
					 else{
						 $top[0] = $row->montant;
					 }            
				 }
				 return $top;
			  }else {
				  $top[0] = $top[1] = 0;
				  return $top;
			    }
		  }
		  public function point_orange($transaction, $mindate, $maxdate)
		  {
			  $query = $this->db->select('SUM(T.transaction_amount) as montant, COUNT(T.transaction_id) as total')
			  					->from('transactions T')
			  					->join('customers C', 'C.customer_id = T.transaction_marchand_id')
								->where('C.customer_country_code', $this->session->userdata('country'))
							    ->where('T.transaction_type', $transaction)
								->where('T.transaction_method', 'OrangeCI')
							    ->where('T.transaction_date >=', $mindate)
							    ->where('T.transaction_date <=', $maxdate)
								->where('T.transaction_status','2')
							    ->get();
			 //var_dump($query);
			  if (!is_null($query)) {
				 foreach ($query->result() as $row){
				 	$top[1] = $row->total;
					 if( $top[1] == 0)
					 {
					 	$top[0] = 0;
					 }
					 else {
						 $top[0] = $row->montant;
					 }            
				 }
				 return $top;
			  } else {
				  $top[0] = $top[1] = 0;
				  return $top;
			  }
		  }
		  public function point_moov($transaction, $mindate, $maxdate)
		  {
			  $query = $this->db->select('SUM(T.transaction_amount) as montant, COUNT(T.transaction_id) as total')
			  					->from('transactions T')
			  					->join('customers C', 'C.customer_id = T.transaction_marchand_id')
								->where('C.customer_country_code', $this->session->userdata('country'))
							    ->where('T.transaction_type', $transaction)
								->where('T.transaction_method', 'Moov_CI')
							    ->where('T.transaction_date >=', $mindate)
							    ->where('T.transaction_date <=', $maxdate)
								->where('T.transaction_status','2')
							    ->get();
			 //var_dump($query);
			  if (!is_null($query)) {
				 foreach ($query->result() as $row){
				 	$top[1] = $row->total;
					 if( $top[1] == 0)
					 {
					 	$top[0] = 0;
					 }
					 else {
						 $top[0] = $row->montant;
					 }            
				 }
				 return $top;
			  } else {
				  $top[0] = $top[1] = 0;
				  return $top;
			  }
		  }
		  public function point_paypal($transaction, $mindate, $maxdate)
		  {
			  $query = $this->db->select('SUM(T.transaction_amount) as montant, COUNT(T.transaction_id) as total')
			  					->from('transactions T')
			  					->join('customers C', 'C.customer_id = T.transaction_marchand_id')
								->where('C.customer_country_code', $this->session->userdata('country'))
							    ->where('T.transaction_type', $transaction)
								->where('T.transaction_method', 'Paypal_CI')
							    ->where('T.transaction_date >=', $mindate)
							    ->where('T.transaction_date <=', $maxdate)
								->where('T.transaction_status','2')
							    ->get();
			 //var_dump($query);
			  if (!is_null($query)) {
				 foreach ($query->result() as $row){
				 	$top[1] = $row->total;
					 if( $top[1] == 0)
					 {
					 	$top[0] = 0;
					 }
					 else {
						 $top[0] = $row->montant;
					 }            
				 }
				 return $top;
			  } else {
				  $top[0] = $top[1] = 0;
				  return $top;
			  }
		  }



		  /****
		  pooint du senegal
		  **/



		  public function point_cash_sn ($transaction, $mindate, $maxdate)
			{
				$query = $this->db->select('SUM(T.transaction_amount) as montant, COUNT(T.transaction_id) as total')
			  					->from('transactions T')
			  					->join('customers C', 'C.customer_id = T.transaction_marchand_id')
								->where('C.customer_country_code', $this->session->userdata('country'))
							    ->where('T.transaction_type', $transaction)
								->where('T.transaction_method', 'CashSN')
							    ->where('T.transaction_date >=', $mindate)
							    ->where('T.transaction_date <=', $maxdate)
								->where('T.transaction_status','2')
							    ->get();
				/* var_dump($query);
				 echo $mindate;
				 echo $maxdate;*/
				if (!is_null($query)) {
					foreach ($query->result() as $row){
						$top[1] = $row->total;
						if( $top[1] == 0)
						{
							$top[0] = 0;
						}
						else {
							$top[0] = $row->montant;
						}
					}
					return $top;
				} else {
					$top[0] = $top[1] = 0;
					return $top;
				}
			}
		public function point_uba_sn ($transaction, $mindate, $maxdate)
		{
			$query = $this->db->select('SUM(T.transaction_amount) as montant, COUNT(T.transaction_id) as total')
			  					->from('transactions T')
			  					->join('customers C', 'C.customer_id = T.transaction_marchand_id')
								->where('C.customer_country_code', $this->session->userdata('country'))
							    ->where('T.transaction_type', $transaction)
								->where('T.transaction_method', 'UbillsSN')
							    ->where('T.transaction_date >=', $mindate)
							    ->where('T.transaction_date <=', $maxdate)
								->where('T.transaction_status','2')
							    ->get();
			/* var_dump($query);
             echo $mindate;
             echo $maxdate;*/
			if (!is_null($query)) {
				foreach ($query->result() as $row){
					$top[1] = $row->total;
					if( $top[1] == 0)
					{
						$top[0] = 0;
					}
					else {
						$top[0] = $row->montant;
					}
				}
				return $top;
			} else {
				$top[0] = $top[1] = 0;
				return $top;
			}
		}
		public function point_joni_sn ($transaction, $mindate, $maxdate)
		{
			$query = $this->db->select('SUM(T.transaction_amount) as montant, COUNT(T.transaction_id) as total')
			  					->from('transactions T')
			  					->join('customers C', 'C.customer_id = T.transaction_marchand_id')
								->where('C.customer_country_code', $this->session->userdata('country'))
							    ->where('T.transaction_type', $transaction)
								->where('T.transaction_method', 'JonijoniSN')
							    ->where('T.transaction_date >=', $mindate)
							    ->where('T.transaction_date <=', $maxdate)
								->where('T.transaction_status','2')
							    ->get();
			/* var_dump($query);
             echo $mindate;
             echo $maxdate;*/
			if (!is_null($query)) {
				foreach ($query->result() as $row){
					$top[1] = $row->total;
					if( $top[1] == 0)
					{
						$top[0] = 0;
					}
					else {
						$top[0] = $row->montant;
					}
				}
				return $top;
			} else {
				$top[0] = $top[1] = 0;
				return $top;
			}
		}

		  
		  public function point_orange_sn ($transaction, $mindate, $maxdate)
		  {
			  $query = $this->db->select('SUM(T.transaction_amount) as montant, COUNT(T.transaction_id) as total')
			  					->from('transactions T')
			  					->join('customers C', 'C.customer_id = T.transaction_marchand_id')
								->where('C.customer_country_code', $this->session->userdata('country'))
							    ->where('T.transaction_type', $transaction)
								->where('T.transaction_method', 'OrangeSN')
							    ->where('T.transaction_date >=', $mindate)
							    ->where('T.transaction_date <=', $maxdate)
								->where('T.transaction_status','2')
							    ->get();
			 //var_dump($query);
			  if (!is_null($query)) {
				 foreach ($query->result() as $row){
				 	$top[1] = $row->total;
					 if( $top[1] == 0)
					 {
					 	$top[0] = 0;
					 }
					 else {
						 $top[0] = $row->montant;
					 }            
				 }
				 return $top;
			  } else {
				  $top[0] = $top[1] = 0;
				  return $top;
			  }
		  }
		  public function point_Tigo_sn($transaction, $mindate, $maxdate)
		  {
			  $query = $this->db->select('SUM(T.transaction_amount) as montant, COUNT(T.transaction_id) as total')
			  					->from('transactions T')
			  					->join('customers C', 'C.customer_id = T.transaction_marchand_id')
								->where('C.customer_country_code', $this->session->userdata('country'))
							    ->where('T.transaction_type', $transaction)
								->where('T.transaction_method', 'TigoSN')
							    ->where('T.transaction_date >=', $mindate)
							    ->where('T.transaction_date <=', $maxdate)
								->where('T.transaction_status','2')
							    ->get();
			 //var_dump($query);
			  if (!is_null($query)) {
				 foreach ($query->result() as $row){
				 	$top[1] = $row->total;
					 if( $top[1] == 0)
					 {
					 	$top[0] = 0;
					 }
					 else {
						 $top[0] = $row->montant;
					 }            
				 }
				 return $top;
			  } else {
				  $top[0] = $top[1] = 0;
				  return $top;
			  }
		  }
		  public function point_paypal_sn($transaction, $mindate, $maxdate)
		  {
			  $query = $this->db->select('SUM(T.transaction_amount) as montant, COUNT(T.transaction_id) as total')
			  					->from('transactions T')
			  					->join('customers C', 'C.customer_id = T.transaction_marchand_id')
								->where('C.customer_country_code', $this->session->userdata('country'))
							    ->where('T.transaction_type', $transaction)
								->where('T.transaction_method', 'PaypalSN')
							    ->where('T.transaction_date >=', $mindate)
							    ->where('T.transaction_date <=', $maxdate)
								->where('T.transaction_status','2')
							    ->get();
			 //var_dump($query);
			  if (!is_null($query)) {
				 foreach ($query->result() as $row){
				 	$top[1] = $row->total;
					 if( $top[1] == 0)
					 {
					 	$top[0] = 0;
					 }
					 else {
						 $top[0] = $row->montant;
					 }            
				 }
				 return $top;
			  } else {
				  $top[0] = $top[1] = 0;
				  return $top;
			  }
		  }
			public function print_report()
			{
			    return $query = $this->db->query("SELECT * FROM transactions");
			} 
	}
?>