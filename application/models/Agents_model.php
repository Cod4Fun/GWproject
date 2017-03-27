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
    

    

    public function ajout_user($nom, $pays, $localisation, $email, $numero, $profil, $pin, $type)
    { 
      if ( $this->session->userdata('type') == "ADMIN_PAYS") {
        $code =  md5($pin);
        $this->db->set('type', $type)
                  ->set('nom', $nom)
                  ->set('id_pays',  $this->session->userdata('country'))
                  ->set('localication', $localisation)
                  ->set('email',$email)
                  ->set('numero',$numero)
                  ->set('profil',$profil)
                  ->set('pin', $code)
                  ->set('etat',"0")
                  ->insert($this->table_users);
      }else{
        $code =  md5("admin");
        $this->db->set('type', $type)
                  ->set('nom', $nom)
                  ->set('id_pays',  $pays)
                  ->set('localication', $localisation)
                  ->set('email',$email)
                  ->set('numero',$numero)
                  ->set('profil',$profil)
                  ->set('pin', $code)
                  ->set('etat',"0")
                  ->insert($this->table_users);
      }
        
    } 
    Public function Ajout_collaborateur($nom, $pays, $localisation, $email, $numero)
    {
      if ( $this->session->userdata('type') == "ADMIN_PAYS") {
          $code =  md5("admin");
          $this->db->set('type', "COLLABORATEUR")
                      ->set('nom', $nom)
                      ->set('id_pays',  $this->session->userdata("country"))
                      ->set('localication', $localisation)
                      ->set('email',$email)
                      ->set('numero',$numero)
                      ->set('pin', $code)
                      ->set('etat',"0")
                      ->insert($this->table_users);
     }else{
          $code =  md5("admin");
          $this->db->set('type', "COLLABORATEUR")
                      ->set('nom', $nom)
                      ->set('id_pays',  $pays)
                      ->set('localication', $localisation)
                      ->set('email',$email)
                      ->set('numero',$numero)
                      ->set('pin', $code)
                      ->set('etat',"0")
                      ->insert($this->table_users);
      }
    }
      


/***
Nbr abonne par groupe
***/
   
      public function verif_seuil($debut, $fin){

        $query = $this->db->select('U.id_user, U.type, U.nom, U.id_pays, U.localication, U.email, U.numero, U.profil, U.etat, P.profils, P.commission, P.seuil_hebdo, SUM(T.type_carte) as total, T.date_transaction')
                             ->from('user U')
                             ->join('profils P', 'U.profil = P.id_profils')
                             ->join('transactions T', 'T.user_id = U.id_user')
                             ->where('T.date_transaction >=', $debut)
                             ->where('T.date_transaction <=', $fin)
                             ->where('U.id_pays', $this->session->userdata('country'))
                             ->group_by('U.id_user')
                             ->get();
             return $query->result();
      }


     

/****
     liste des groupe
     ****/

    public function liste_user()
         {
              $query = $this->db->select('U.id_user, U.type, U.nom, U.id_pays, U.localication, U.email, U.numero, U.profil, U.etat, P.profils, P.commission')
                             ->from('user U')
                             ->join('profils P', 'U.profil = P.id_profils')
                             ->where('U.type <>', "COLLABORATEUR")
                             ->where('U.id_pays', $this->session->userdata('country'))
                             ->get();
             return $query->result();
         }

    public function liste_collaborateur()
         {
              $query = $this->db->select('id_user, type, nom, id_pays, localication, email, numero, etat')
                             ->from('user')
                             ->where('type', "COLLABORATEUR")
                             ->where('id_pays', $this->session->userdata('country'))
                             ->get();
             return $query->result();
         }

         public function liste_collaborateur_ind($id)
         {
              $query = $this->db->select('id_user, type, nom, id_pays, localication, email, numero, etat')
                             ->from('user')
                             //->where('type', "COLLABORATEUR")
                             ->where('id_user', $id)
                             ->get();
             return $query->result();
         }
          public function liste_agent_ind($id)
         {
              $query = $this->db->select('id_user, type, nom, id_pays, localication, email, numero, etat, profil')
                             ->from('user')
                             ->where('type', "AGENT")
                             ->where('id_user', $id)
                             ->get();
             return $query->result();
         }


      public function Update_compte($user_id, $password)
    {
        $pass = md5($password);
         return $this->db->set('pin',$pass)
                         ->where('id_user',$user_id)
                         ->update($this->table_users);
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

    public function supprimer($id)
        {
            $this->db->set('etat', "0")
                            ->where('id_user', $id)
                            ->update($this->table_users);
        }
    public function activer($id)
        {
          $this->db->set('etat', "A")
                            ->where('id_user', $id)
                            ->update($this->table_users);
        }

    public function update_agents($id, $nom, $localisation, $email, $contact, $profil)
        {
            // if($actif == "on") {$doc = "1";} else {$doc = "0";}
             $this->db->set('nom', $nom)
                            ->set('localication', $localisation)
                            ->set('email', $email)
                            ->set('numero', $contact)
                            ->set('profil', $profil)
                            ->where('id_user', $id)
                            ->update($this->table_users);
        }

    public function update_collaborateurs($id, $nom, $localisation, $email, $contact)
        {
            // if($actif == "on") {$doc = "1";} else {$doc = "0";}
             $this->db->set('nom', $nom)
                            ->set('localication', $localisation)
                            ->set('email', $email)
                            ->set('numero', $contact)
                            ->where('id_user', $id)
                            ->update($this->table_users);
        }

    /*
     * Focntion de recherche d'existence du nom d'un template dans le dossier
     */

    public function existing_collaborateur($email)
    {
        //$session_customer = $this->session->userdata('customer_id');
        $query = $this->db->select('email')
                        ->from($this->table_users)
                        ->where('email', $email)
                        ->where('type', "COLLABORATEUR")
                        ->get()
                        ->row();
            if($query == null)
            {$rs = "0"; } else {
                {$rs = "1";}
            }
        return $rs;
    }
    public function existing_user($email)
    {
        //$session_customer = $this->session->userdata('customer_id');
        $query = $this->db->select('numero')
                        ->from($this->table_users)
                        ->where('numero', $email)
                        ->where('type', "AGENT")
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
                        ->where('type', "AGENT")
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