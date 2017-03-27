<?php
/**
 * Created by PhpStorm.
 * User: ericzile
 * Date: 03/05/2016
 * Time: 12:10
 */
class Cards_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    protected $table_cards = "cards";
    

    

    public function ajout_cards($type, $token, $currency)
    { 
        $code =  base64_encode($token);
        $this->db->set('card_type', $type)
                  ->set('token', $code)
                  ->set('currency', $currency)
                  ->set('picked',"0")
                  ->insert($this->table_cards);
    }
    
    public function liste_card()
    {
      $query = $this->db->select('C.card_id, C.balance, C.datecreated, C.currencycode, C.dateexpired, C.dateactivated, P.libelle')
                             ->from('cards C')
                             ->join('pays P', 'C.currencycode = P.id_pays')
                             ->where('C.currencycode', $this->session->userdata('country'))
                             ->get();
             return $query->result();
    }

/***
Nbr abonne par groupe
***/
   



     

/****
     liste des groupe
     ****/

    

  public function listing($id)
  {
    $query = $this->db->select('*')
                             ->from($this->table_profils)
                             ->where('id_profil', $id)
                             ->get();
             return $query;

  }
        
        
      public function total_groupe ()
      {
        $session_customer = $this->session->userdata('customer_id');
        $query = $this->db->select('nom, COUNT(id) as nombre')
                  ->from($this->table_groupe)
                  ->where('customer_id', $session_customer)
                  ->get();
       
      if ($query != null) {
        
      
       foreach ($query->result() as $row){
        $top[1] = $row->nombre;
         if( $top[1] == 0)
         {
          $top[0] = 0;
         }
           
         }         
       }
        return $top;
      }
    /*
        *
        * Fonction GUID
        *
        */
    public function Guid($racine)
    {
        $lettre = uniqid("",FALSE);
        $chiffre = mt_rand(0, 65535);
        return strtoupper($racine.$lettre);

    }

    /****
    supprimer abonner du groupe
    ***/
    public function supprimer_goupe($id)
        {
            return $this->db->where('ID', $id)
                ->delete($this->table_mailing);
        }

    /***
    suprimer groupe

    ****/
    public function supprimer($id)
        {
            $this->db->set('Actif', "0")
                            ->where('id', $id)
                            ->update($this->table_groupe);
        }
    public function search($id)
        {
            $session_customer = $this->session->userdata('customer_id');
            $query2 = $this->db->select('id, nom, datecreation, actif')
                ->from($this->table_groupe)
                ->where('id', $id)
                ->get();
            return $query2->result();
        }    
    
    public function update($id, $nom, $actif)
        {
             if($actif == "on") {$doc = "1";} else {$doc = "0";}
             $this->db->set('nom', $nom)
                            ->set('actif', $doc)
                            ->where('id', $id)
                            ->update($this->table_groupe);
        }

    /*
     * Focntion de recherche d'existence du nom d'un template dans le dossier
     */
    public function existingtext($token, $pays)
    {
          $code = base64_encode($token);
        //$session_customer = $this->session->userdata('customer_id');
        $query = $this->db->select('token, currency')
                        ->from($this->table_cards)
                        ->where('token', $code)
                        ->where('currency', $pays)
                        ->get()
                        ->row();
            if($query == null)
            {$rs = "0"; } else {
                {$rs = "1";}
            }
        return $rs;

    }
   

}