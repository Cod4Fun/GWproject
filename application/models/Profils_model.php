<?php
/**
 * Created by PhpStorm.
 * User: ericzile
 * Date: 03/05/2016
 * Time: 12:10
 */
class Profils_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    protected $table_profils = "profils";
    protected $table_user = "user";
    

    

    public function ajout_profils($nom, $commission, $seuil, $seuil_hebdo)
    {
        
        $this->db->set('profils', $nom)
                ->set('commission', $commission)
                ->set('seuil',  $seuil)
                ->set('seuil_hebdo', $seuil_hebdo)
                ->insert($this->table_profils);
    }
    


/***
Nbr abonne par groupe
***/
   



     

/****
     liste des groupe
     ****/

    public function liste_profils()
         {
              $query = $this->db->select('*')
                             ->from($this->table_profils)
                             ->get();
             return $query->result();
         }

  public function listing($id)
  {
    $query = $this->db->select('*')
                             ->from($this->table_profils)
                             ->where('id_profils', $id)
                             ->get();
             return $query->result();

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
    

    /***
    suprimer groupe

    ****/
    public function supprimer($id)
        {
            return $this->db->where('id_profils', $id)
                ->delete($this->table_profils);
        }
   
    
    public function update($id, $profils, $seuil, $commission, $seuil_hebdo)
        {
            // if($actif == "on") {$doc = "1";} else {$doc = "0";}
             $this->db->set('profils', $profils)
                            ->set('seuil', $seuil)
                            ->set('commission', $commission)
                            ->set('seuil_hebdo', $seuil_hebdo)
                            ->where('id_profils', $id)
                            ->update($this->table_profils);
        }

    /*
     * Focntion de recherche d'existence du nom d'un template dans le dossier
     */
    public function existingprofils($email)
    {
        //$session_customer = $this->session->userdata('customer_id');
        $query = $this->db->select('profils')
                        ->from($this->table_profils)
                        ->where('profils', $email)
                        //->where('customer_id', $session_customer)
                        ->get()
                        ->row();
            if($query == null)
            {$rs = "0"; } else {
                {$rs = "1";}
            }
        return $rs;

    }

    public function existingid($id)
    {
        //$session_customer = $this->session->userdata('customer_id');
        $query = $this->db->select('*')
                        ->from($this->table_user)
                        ->where('profil', $id)
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