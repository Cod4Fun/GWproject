<?php
/**
 * Created by PhpStorm.
 * User: ericzile
 * Date: 03/05/2016
 * Time: 12:10
 */
class Agents_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    protected $table_users = "user";
    

    

    public function ajout_user($nom, $pays, $localisation, $email, $numero, $profil, $pin)
    { 
        $code =  md5($pin);
        $this->db->set('type', "agent")
                  ->set('nom', $nom)
                  ->set('id_pays',  $pays)
                  ->set('localication', $localisation)
                 //->set('longitude',)
                 //->set('latitude',)
                  ->set('email',$email)
                  ->set('numero',$numero)
                  ->set('profil',$profil)
                  ->set('pin', $code)
                  ->set('etat',"0")
                  ->insert($this->table_users);
    }
    


/***
Nbr abonne par groupe
***/
   



     

/****
     liste des groupe
     ****/

    public function liste_user()
         {
              $query = $this->db->select('U.id_user, U.type, U.nom, U.id_pays, U.localication, U.email, U.numero, U.profil, U.etat, P.profils, P.commission')
                             ->from('user U')
                             ->join('profils P', 'U.profil = P.id_profils')
                             ->where('U.type', "AGENT")
                             ->get();
             return $query->result();
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
    public function existing_user($email)
    {
        //$session_customer = $this->session->userdata('customer_id');
        $query = $this->db->select('numero')
                        ->from($this->table_users)
                        ->where('numero', $email)
                        //->where('customer_id', $session_customer)
                        ->get()
                        ->row();
            if($query == null)
            {$rs = "0"; } else {
                {$rs = "1";}
            }
        return $rs;
    }
   

   public function existing_pin($email)
    {
        //$session_customer = $this->session->userdata('customer_id');
        $query = $this->db->select('pin')
                        ->from($this->table_users)
                        ->where('pin', $email)
                        //->where('customer_id', $session_customer)
                        ->get()
                        ->row();
            if($query == null)
            {$rs = "0"; } else {
                {$rs = "1";}
            }
        return $rs;
    }
   

}